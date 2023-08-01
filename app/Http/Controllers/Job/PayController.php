<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ClientTransaction;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PayController extends Controller
{
    public function __invoke(Request $request , $id)
    {
        return view('job.pay' , compact('id'));
    }

    public function pay($id)
    {

        $employer = Employer::query()->findOrFail(auth()->guard('employer')->user()->id);
        $job = Job::query()->findOrFail($id);

        $response = Http::withHeaders(["X-CC-Api-Key" => config('Constants.coin_base')])->
        post('https://api.commerce.coinbase.com/charges', [
            "name" => setting('promote.coinbase_title'),
            "description" =>  setting('promote.coinbase_desc'),
            "local_price" => [
                "amount" => setting('job.job_price'),
                "currency" => "USD"
            ],
            "redirect_url"=> route('pay_success'),
            "cancel_url"=> route('pay_unsuccessful'),
            "pricing_type" => "fixed_price",
            "metadata" => [
                "customer_id" => $employer->id,
                "customer_name" => $employer->company_name,
            ]
        ]);

        $response = json_decode($response, true);
        $url = $response["data"]["hosted_url"];
        $code = $response["data"]["code"];

        ClientTransaction::query()->create([
            'code' => $code,
            'client_id' => $employer->id,
            'job_id' => $job->id,
            'is_job_pay' => true,
            'amount' => setting('job.job_price'),
            'paid' => false,
        ]);

        return redirect($url);
    }


}
