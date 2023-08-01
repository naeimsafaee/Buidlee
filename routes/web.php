<?php

use App\Http\Controllers\Auth\EmployerController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\JobSeekerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Employer\ChangePasswordController;
use App\Http\Controllers\Employer\CreateController;
use App\Http\Controllers\Employer\EditProfileController;
use App\Http\Controllers\Employer\GalleryController;
use App\Http\Controllers\Employer\ProfileController;
use App\Http\Controllers\Employer\PromoteController;
use App\Http\Controllers\Employer\RequestsController;
use App\Http\Controllers\Job\PayController;
use App\Http\Controllers\Job\SingleJobController;
use App\Http\Controllers\Pages\ContactUsController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/make_jobs', function () {
    $jobs = \App\Models\Job::all();
    foreach ($jobs as $job){
        $job->promote_in_home = true;
        $job->save();
    }

})->name('pay_success');


Route::get('/pay_success', function () {
    return view('pages.pay_success');
})->name('pay_success');

Route::get('/pay_unsuccessful', function () {
    return view('pages.pay_unsuccessful');
})->name('pay_unsuccessful');

Route::get('/', HomeController::class)->name('home');
Route::get('/contact_us', ContactUsController::class)->name('contact_us');
Route::post('/contact_us', [ContactUsController::class , 'submit'])->name('contact_us');
Route::get('/page/{slug}', PageController::class)->name('page');
Route::get('/job/{id?}', SingleJobController::class)->name('single_job');
Route::get('/pay_job/{id?}', PayController::class)->name('job_pay');
Route::get('/pay__job/{id?}', [PayController::class , 'pay'])->name('pay__job');



Route::get('/job/delete/{id?}', [SingleJobController::class , 'delete'])->name('delete_job');


//login and register
Route::get('/login', LoginController::class)->middleware('login')->name('login');
Route::get('/login-employer', [EmployerController::class , 'login'])->middleware('login')->name('login_employer');
Route::post('/login-employer', [EmployerController::class , 'login_submit'])->middleware('login')->name('login_employer');
Route::get('/register-employer', [EmployerController::class ,'register'])->middleware('login')->name('register_employer');
Route::post('/register-employer', [EmployerController::class ,'register_submit'])->middleware('login')->name('register_employer');
Route::get('/login-jobseeker', [JobSeekerController::class ,'login'])->middleware('login')->name('login_jobseeker');
Route::get('/register-jobseeker', [JobSeekerController::class ,'register'])->middleware('login')->name('register_jobseeker');
Route::post('/register-jobseeker', [JobSeekerController::class ,'register_submit'])->middleware('login')->name('register_jobseeker');
Route::post('/login-jobseeker', [JobSeekerController::class ,'login_submit'])->middleware('login')->name('login_jobseeker');
Route::get('/logout', [LoginController::class ,'logout'])->name('logout');

Route::get('/forget/jobseeker', [ForgetPasswordController::class , 'step_1'])->name('forget_jobseeker');
Route::get('/forget/employer', [ForgetPasswordController::class , 'step_1'])->name('forget_employer');
Route::post('/forget/jobseeker', [ForgetPasswordController::class , 'jobseeker_submit'])->name('forget_jobseeker');
Route::post('/forget/employer', [ForgetPasswordController::class , 'employer_submit'])->name('forget_employer');
Route::get('/forget/2', [ForgetPasswordController::class , 'step_2'])->name('forget2');
Route::get('/forget/3/{reset_link}', [ForgetPasswordController::class , 'step_3'])->name('forget3');

Route::post('/forget', [ForgetPasswordController::class , 'forget'])->name('forget');


//employer
Route::get('/employer/profile', ProfileController::class)->middleware('employer_logged_in')->name('employer_profile');
Route::get('/employer/edit-profile', EditProfileController::class)->middleware('employer_logged_in')->name('employer_edit_profile');
Route::post('/employer/edit-profile', [EditProfileController::class , 'edit'])->middleware('employer_logged_in')->name('employer_edit_profile');
Route::post('/employer/avatar', [ProfileController::class , 'avatar'])->middleware('employer_logged_in')->name('employer_avatar');
Route::get('/employer/requests', RequestsController::class)->middleware('employer_logged_in')->name('employer_requests');
Route::post('/employer/requests', [RequestsController::class , 'submit'])->middleware('employer_logged_in')->name('employer_requests');
Route::get('/employer/create', CreateController::class)->middleware('employer_logged_in')->name('employer_create');
Route::post('/employer/create', [CreateController::class , 'create_submit'])->middleware('employer_logged_in')->name('employer_create');
Route::get('/employer/create/promote/{id?}', [CreateController::class , 'promote'])->middleware('employer_logged_in')->name('employer_promote');
Route::get('/employer/create/promote1/{id?}', [PromoteController::class , 'promote_one'])->middleware('employer_logged_in')->name('employer_promote1');
Route::get('/employer/create/promote2/{id?}', [PromoteController::class , 'promote_two'])->middleware('employer_logged_in')->name('employer_promote2');



Route::get('/employer/change-password', ChangePasswordController::class)->middleware('employer_logged_in')->name('employer_change_password');
Route::post('/employer/change-password', [ChangePasswordController::class ,'submit'])->middleware('employer_logged_in')->name('employer_change_password');
Route::post('/employer/gallery', [GalleryController::class , 'index'])->middleware('employer_logged_in')->name('gallery_submit');

//job seeker
Route::get('/jobseeker/profile', \App\Http\Controllers\JobSeeker\ProfileController::class)->middleware('jobseeker_logged_in')->name('jobseeker_profile');
Route::post('/jobseeker/profile', [\App\Http\Controllers\JobSeeker\ProfileController::class , 'profile_submit'])->middleware('jobseeker_logged_in')->name('jobseeker_profile');
Route::get('/jobseeker/requests', \App\Http\Controllers\JobSeeker\RequestsController::class)->middleware('jobseeker_logged_in')->name('jobseeker_requests');
Route::post('/jobseeker/avatar', [\App\Http\Controllers\JobSeeker\ProfileController::class , 'avatar_submit'])->middleware('jobseeker_logged_in')->name('jobseeker_avatar');
Route::post('/jobseeker/apply/{id?}', [\App\Http\Controllers\JobSeeker\ProfileController::class , 'apply'])->middleware('jobseeker_logged_in')->name('jobseeker_apply');
Route::get('/jobseeker/delete_cv', [\App\Http\Controllers\JobSeeker\ProfileController::class , 'delete_cv'])->middleware('jobseeker_logged_in')->name('delete_cv');
Route::get('/jobseeker/change-password', [\App\Http\Controllers\JobSeeker\ChangePasswordController::class , 'index' ])->middleware('jobseeker_logged_in')->name('jobseeker_change_password');
Route::post('/jobseeker/change-password', [\App\Http\Controllers\JobSeeker\ChangePasswordController::class  , 'submit'])->middleware('jobseeker_logged_in')->name('jobseeker_change_password');

Route::get('/home_job/{id?}', [SingleJobController::class , 'home'])->name('single_job_home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('migrate', function(){
    Artisan::call('migrate');
    return redirect()->route('home');

});

Route::get('seed', function(){
    Artisan::call('db:seed', ['--class' => 'SettingsTableSeeder']);
    return redirect()->route('home');
});
