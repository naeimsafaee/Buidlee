<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\ClientTransaction;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PromoteController extends Controller {

    public function promote_one($id) {

        $employer = Employer::query()->findOrFail(auth()->guard('employer')->user()->id);
        $job = Job::query()->findOrFail($id);

        Address::query()->where([
            'client_id' => $employer->id,
            'job_id' => $id,
        ])->delete();

        $response = Http::withHeaders(["X-CC-Api-Key" => config('Constants.coin_base')])->
        post('https://api.commerce.coinbase.com/charges', [
            "name" => setting('promote.coinbase_title'),
            "description" =>  setting('promote.coinbase_desc'),
            "local_price" => [
                "amount" => setting('promote.price1'),
                "currency" => "USD"
            ],
            "redirect_url"=> route('pay_success'),
            "cancel_url"=> route('pay_unsuccessful'),
            "pricing_type" => "fixed_price",
            "metadata" => [
                "customer_id" => $employer->id,
                "customer_name" => $employer->company_name
            ]
        ]);

        $response = json_decode($response, true);
        $url = $response["data"]["hosted_url"];
        $code = $response["data"]["code"];

        ClientTransaction::query()->create([
            'code' => $code,
            'client_id' => $employer->id,
            'job_id' => $job->id,
            'amount' => setting('promote.price1'),
            'paid' => false,
        ]);

        return redirect($url);
    }

    public function check_trans(Request $request) {


        /*Category::query()->create([
            'name' => 'zzzzzzzzzz'
        ]);*/

        Report::query()->create([
            'name' => json_encode($request->all())
        ]);

        $type = $request['event']['type'];

        //        if($type === "charge:confirmed" || $type === "charge:delayed"){
        if($type === "charge:confirmed" || $type === "charge:resolved"){

            $code = $request['event']['data']['code'];

//            $meta_data = $request->event->data->metadata;

            $transaction = ClientTransaction::query()->where('code' , $code)->first();

//            die(json_encode($transaction));

            if($transaction->is_job_pay == true && $transaction->amount == setting('job.job_price')){

                $job = Job::query()->findOrFail($transaction->job_id);
                $job->is_pay = true;
                $job->save();

                $transaction->paid = true;
                $transaction->save();

            } elseif($transaction->amount === setting('promote.price1')){

                $job = Job::query()->findOrFail($transaction->job_id);
                $job->promote_in_home = true;
                $job->expiry_at= Carbon::now()->addDays(30);
                $job->save();

                $transaction->paid = true;
                $transaction->save();

            } elseif($transaction->amount === setting('promote.price2')){

                $job = Job::query()->findOrFail($transaction->job_id);
                $job->promote_in_category = true;
                $job->expiry_at= Carbon::now()->addDays(30);
                $job->save();

                $transaction->paid = true;
                $transaction->save();
            }

        }

        return;
    }

    public function promote_two($id) {

        $employer = Employer::query()->findOrFail(auth()->guard('employer')->user()->id);
        $job = Job::query()->findOrFail($id);

        Address::query()->where([
            'client_id' => $employer->id,
            'job_id' => $id,
        ])->delete();

        $response = Http::withHeaders(["X-CC-Api-Key" => config('Constants.coin_base')])->post('https://api.commerce.coinbase.com/charges', [
            "name" => setting('promote.coinbase_title'),
            "description" =>  setting('promote.coinbase_desc'),
            "local_price" => [
                "amount" => setting('promote.price2'),
                "currency" => "USD"
            ],
            "redirect_url"=> route('pay_success'),
            "cancel_url"=> route('pay_unsuccessful'),
            "pricing_type" => "fixed_price",
            "metadata" => [
                "customer_id" => $employer->id,
                "customer_name" => $employer->company_name
            ]
        ]);

        $response = json_decode($response, true);

        $url = $response["data"]["hosted_url"];
        $code = $response["data"]["code"];

        ClientTransaction::query()->create([
            'code' => $code,
            'client_id' => $employer->id,
            'job_id' => $job->id,
            'amount' => setting('promote.price2'),
            'paid' => false,
        ]);

        return redirect($url);
    }

}
