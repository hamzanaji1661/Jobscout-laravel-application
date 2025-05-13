<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\JobCategoryController;
use App\Http\Controllers\Frontend\RecoverController;
use App\Http\Controllers\Frontend\SigninController;
use App\Http\Controllers\Frontend\SignupController;
use App\Http\Controllers\Frontend\JobController;
use App\Http\Controllers\Frontend\JobSearchController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeEditController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminJobLocationController;
use App\Http\Controllers\Admin\AdminJobTypeController;
use App\Http\Controllers\Admin\AdminExperienceController;
use App\Http\Controllers\Admin\AdminEmployerLocationController;
use App\Http\Controllers\Admin\AdminEmployerIndustryController;
use App\Http\Controllers\Admin\AdminEmployerSizeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\ActivityLogController;

use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employer\EmployerProfileController;
use App\Http\Controllers\Employer\RequirementCheckController;
use App\Http\Controllers\Employer\EmployerHiringController;
use App\Http\Controllers\Frontend\EmployerDetailsController;


use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\EmployeeResumeController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;


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

Route::get('/chat', function () {
    return view('Frontend.chat');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');
Route::get('/categories', [JobCategoryController::class, 'categories'])->name('category');
Route::get('/post/{slug}', [PostController::class, 'postDetails'])->name('post');
Route::get('/job/{id}', [JobController::class, 'jobDetails'])->name('jobs');
Route::get('/jobs', [JobSearchController::class, 'index'])->name('job.search');
Route::get('/employer/details/{id}', [EmployerDetailsController::class, 'employerDetails'])->name('employer.details');
Route::get('/employer/browse', [EmployerDetailsController::class, 'browseEmployer'])->name('employer.browse');


Route::get('admin/invalid', function () {
    return view('admin.linkexpired');
})->name('admin.invalid');
Route::get('/verify', function () {
    return view('frontend.verify');
})->name('email.verify');
Route::get('/verified', function () {
    return view('frontend.verified');
})->name('email.verified');

Route::get('employer/verify', function () {
    return view('frontend.verifyemployer');
})->name('email.verifyemployer');
Route::get('employer/verified', function () {
    return view('frontend.verifiedemployer');
})->name('email.verifiedemployer');

Route::get('employee/resume',  [EmployeeResumeController::class, 'resumeView'])->name('employer.resume');

Route::get('/resume/download', [EmployeeResumeController::class, 'generatePDF'])->name('resume.download');


/*
 * Admin Routes
 */

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin/loginSubmit', [AdminLoginController::class, 'loginSubmitPost'])->name('admin.login.submit');
Route::get('/admin/recover', [AdminLoginController::class, 'recoverPassword'])->name('admin.recover');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
Route::post('/admin/recoverSubmit', [AdminLoginController::class, 'recoverSubmitPost'])->name('admin.recover.submit');
Route::get('/admin/recoverPassword/{token}/{email}', [AdminLoginController::class, 'resetPassword'])->name('admin.recoverPassword');
Route::post('/admin/recoverPasswordSubmit', [AdminLoginController::class, 'resetPasswordSubmit'])->name('admin.recoverPassword.submit');
Route::get('/admin/otp-authentication', [AdminLoginController::class, 'sosLogin'])->name('admin.soslogin');
Route::post('/admin/otploginSubmit', [AdminLoginController::class, 'sosLoginSubmitPost'])->name('admin.soslogin.submit');
Route::get('/admin/validateOTPassword/{token}', [AdminLoginController::class, 'enterOTPassword'])->name('admin.enterOTPassword');
Route::post('/admin/validateOTPasswordSubmit', [AdminLoginController::class, 'validateOTPasswordSubmit'])->name('admin.validateOTPassword.submit');


Route::middleware(['admin:admin'])->group(function () {
    Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::post('/admin/adminProfileSubmit', [AdminProfileController::class, 'editProfileSubmit'])->name('admin.profile.submit');
    Route::get('/admin/homepage/edit', [AdminHomeEditController::class, 'index'])->name('admin.homepage.edit');
    Route::post('/admin/updateHomepage', [AdminHomeEditController::class, 'update'])->name('admin.updateHomepage');

    Route::get('/admin/category/view', [AdminJobCategoryController::class, 'index'])->name('admin.job.category');
    Route::post('/admin/category/create', [AdminJobCategoryController::class, 'create'])->name('admin.job.category.create');
    Route::get('/admin/category/edit/{id}', [AdminJobCategoryController::class, 'edit'])->name('admin.job.category.edit');
    Route::post('/admin/jobCategoryEdit/{id}', [AdminJobCategoryController::class, 'editCategory'])->name('admin.job.category.edit.submit');
    Route::get('/admin/category/delete/{id}', [AdminJobCategoryController::class, 'delete'])->name('admin.job.category.delete');

    Route::get('/admin/location/view', [AdminJobLocationController::class, 'index'])->name('admin.job.location');
    Route::post('/admin/location/create', [AdminJobLocationController::class, 'create'])->name('admin.job.location.create');
    Route::get('/admin/location/edit/{id}', [AdminJobLocationController::class, 'edit'])->name('admin.job.location.edit');
    Route::post('/admin/jobLocationEdit/{id}', [AdminJobLocationController::class, 'update'])->name('admin.job.location.edit.submit');
    Route::get('/admin/location/delete/{id}', [AdminJobLocationController::class, 'destroy'])->name('admin.job.location.delete');

    Route::get('/admin/type/view', [AdminJobTypeController::class, 'index'])->name('admin.job.type');
    Route::post('/admin/type/create', [AdminJobTypeController::class, 'create'])->name('admin.job.type.create');
    Route::get('/admin/type/edit/{id}', [AdminJobTypeController::class, 'edit'])->name('admin.job.type.edit');
    Route::post('/admin/jobTypeEdit/{id}', [AdminJobTypeController::class, 'update'])->name('admin.job.type.edit.submit');
    Route::get('/admin/type/delete/{id}', [AdminJobTypeController::class, 'delete'])->name('admin.job.type.delete');

    Route::get('/admin/experience/view', [AdminExperienceController::class, 'index'])->name('admin.job.experience');
    Route::post('/admin/experience/create', [AdminExperienceController::class, 'create'])->name('admin.job.experience.create');
    Route::get('/admin/experience/edit/{id}', [AdminExperienceController::class, 'edit'])->name('admin.job.experience.edit');
    Route::post('/admin/jobExperienceEdit/{id}', [AdminExperienceController::class, 'update'])->name('admin.job.experience.edit.submit');
    Route::get('/admin/experience/delete/{id}', [AdminExperienceController::class, 'delete'])->name('admin.job.experience.delete');

    Route::get('/admin/post/view', [AdminPostController::class, 'index'])->name('admin.post');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin.post.create');
    Route::post('/admin/post/createSubmit', [AdminPostController::class, 'createSubmit'])->name('admin.post.create.submit');
    Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin.post.edit');
    Route::post('/admin/post/editSubmit/{id}', [AdminPostController::class, 'editSubmit'])->name('admin.post.edit.submit');
    Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin.post.delete');

    Route::get('/admin/package/view', [AdminPackageController::class, 'index'])->name('admin.package');
    //Route::get('/admin/package/create', [AdminPackageController::class, 'createFeatured'])->name('admin.post.featured.create');
    Route::post('/admin/package/createSubmit', [AdminPackageController::class, 'createPackageSubmit'])->name('admin.package.create.submit');
    Route::get('/admin/package/edit/{id}', [AdminPackageController::class, 'editPackage'])->name('admin.package.edit');
    Route::post('/admin/package/editSubmit/{id}', [AdminPackageController::class, 'editPackageSubmit'])->name('admin.package.edit.submit');
    Route::get('/admin/package/delete/{id}', [AdminPackageController::class, 'deletePackage'])->name('admin.package.delete');

    Route::get('/admin/employer/location/view', [AdminEmployerLocationController::class, 'index'])->name('admin.employer.location');
    Route::post('/admin/employer/location/create', [AdminEmployerLocationController::class, 'create'])->name('admin.employer.location.create');
    Route::get('/admin/employer/location/edit/{id}', [AdminEmployerLocationController::class, 'edit'])->name('admin.employer.location.edit');
    Route::post('/admin/employer/jobLocationEdit/{id}', [AdminEmployerLocationController::class, 'update'])->name('admin.employer.location.edit.submit');
    Route::get('/admin/employer/location/delete/{id}', [AdminEmployerLocationController::class, 'destroy'])->name('admin.employer.location.delete');

    Route::get('/admin/industry/view', [AdminEmployerIndustryController::class, 'index'])->name('admin.industry');
    Route::post('/admin/industry/create', [AdminEmployerIndustryController::class, 'create'])->name('admin.industry.create');
    Route::get('/admin/industry/edit/{id}', [AdminEmployerIndustryController::class, 'edit'])->name('admin.industry.edit');
    Route::post('/admin/industryEdit/{id}', [AdminEmployerIndustryController::class, 'update'])->name('admin.industry.edit.submit');
    Route::get('/admin/industry/delete/{id}', [AdminEmployerIndustryController::class, 'delete'])->name('admin.industry.delete');

    Route::get('/admin/employer/size/view', [AdminEmployerSizeController::class, 'index'])->name('admin.employer.size');
    Route::post('/admin/employer/size/create', [AdminEmployerSizeController::class, 'create'])->name('admin.employer.size.create');
    Route::get('/admin/employer/size/edit/{id}', [AdminEmployerSizeController::class, 'edit'])->name('admin.employer.size.edit');
    Route::post('/admin/employer/SizeEdit/{id}', [AdminEmployerSizeController::class, 'update'])->name('admin.employer.size.edit.submit');
    Route::get('/admin/employer/size/delete/{id}', [AdminEmployerSizeController::class, 'destroy'])->name('admin.employer.size.delete');


    Route::get('/admin/employer/manage', [AdminUserController::class, 'listEmployers'])->name('admin.employer.manage');
    Route::get('/admin/employee/manage', [AdminUserController::class, 'listEmployees'])->name('admin.employee.manage');
    Route::get('/admin/employer/suspend/{id}', [AdminUserController::class, 'suspendEmployer'])->name('admin.employer.suspend');
    Route::get('/admin/employer/unsuspend/{id}', [AdminUserController::class, 'unsuspendEmployer'])->name('admin.employer.unsuspend');
    Route::get('/admin/employer/delete/{id}', [AdminUserController::class, 'terminateEmployer'])->name('admin.employer.delete');
    Route::get('/admin/log/activity', [ActivityLogController::class, 'showLogs'])->name('admin.activitylog.view');

    Route::get('/admin/topbar/edit', [AdminHomeEditController::class, 'topbar'])->name('admin.topbar.edit');
    Route::post('/admin/topbar/editSubmit', [AdminHomeEditController::class, 'topbarSubmit'])->name('admin.topbar.edit.submit');


    
    


});

/*
 * Employer Routes
 */

 Route::get('/employer/signin', [SigninController::class, 'index'])->name('employer.signin');
 Route::get('/employer/signup', [SignupController::class, 'index'])->name('employer.signup');
 Route::get('/employer/recover', [RecoverController::class, 'recoverEmployer'])->name('employer.recover');
 Route::get('/employer/verify-email/{token}/{email}', [SignupController::class, 'verifyEmail'])->name('verify.email');
 Route::get('/employer/logout', [SigninController::class, 'employerLogout'])->name('employer.logout');
 Route::get('/employer/recover/{token}/{email}', [RecoverController::class, 'resetPassword'])->name('employer.recover.password');
 Route::post('/employer/signinSubmit', [SigninController::class, 'signinSubmit'])->name('employer.signin.submit');
 Route::post('/employer/recoverSubmit', [RecoverController::class, 'recoverEmployerSubmit'])->name('employer.recover.submit');
 Route::post('/employer/recoverPasswordSubmit', [RecoverController::class, 'resetPasswordSubmit'])->name('employer.recover.password.submit');
 Route::post('/employer/signupSubmit', [SignupController::class, 'signupSubmit'])->name('employer.signup.submit');


 Route::middleware(['employer:employer'])->group(function () {

    Route::get('/employer/dashboard', [EmployerController::class, 'index'])->name('employer.dashboard');
    Route::get('/employer/payment', [EmployerController::class, 'payment'])->name('employer.payment');
    Route::get('/employer/profile', [EmployerProfileController::class, 'index'])->name('employer.profile');
    Route::post('/employer/profile/edit', [EmployerProfileController::class, 'edit'])->name('employer.profile.edit');
    Route::post('/employer/profile/openinghour/edit', [EmployerProfileController::class, 'openingHours'])->name('employer.profile.openinghour.edit');
    Route::post('/employer/profile/sociallinks/edit', [EmployerProfileController::class, 'socialLinks'])->name('employer.profile.sociallink.edit');
    Route::post('/employer/profile/contact/edit', [EmployerProfileController::class, 'contact'])->name('employer.profile.contact.edit');
    Route::post('/employer/requirement/post', [RequirementCheckController::class, 'addData'])->name('employer.requirement.add');
    Route::get('/employer/requirement/add', [RequirementCheckController::class, 'index'])->name('employer.requirement.view');
    Route::get('/employer/hiring/post', [EmployerHiringController::class, 'index'])->name('employer.hiring.view');
    Route::post('/employer/hiring/add', [EmployerHiringController::class, 'addData'])->name('employer.hiring.add');
    Route::get('/employer/hirings/', [EmployerHiringController::class, 'viewData'])->name('employer.hiring.list');
    Route::get('/employer/hiring/edit/{id}', [EmployerHiringController::class, 'editData'])->name('employer.hiring.edit');
    Route::post('/employer/hiring/update/{id}', [EmployerHiringController::class, 'updateData'])->name('employer.hiring.update');
    Route::get('/employer/hiring/delete/{id}', [EmployerHiringController::class, 'deleteDataRequirement'])->name('employer.requirement.delete');

    Route::get('/employer/hiring/applications', [EmployerController::class, 'viewApplications'])->name('employer.hiring.applications');
    Route::get('/employer/applicants/job/{id}', [EmployerController::class, 'viewApplicants'])->name('employer.hiring.applicants');

    Route::get('/employer/hiring/approve/{id}', [EmployerHiringController::class, 'ApproveJob'])->name('employer.hiring.applicant.approve');
    Route::get('/employer/hiring/reject/{id}', [EmployerHiringController::class, 'RejectJob'])->name('employer.hiring.applicant.reject');


    Route::get('/employer/chat/{key?}', Main::class)->name('chat');
    Route::get('/employer/applicants', CreateChat::class)->name('manage.applications');

    Route::get('/employer/boost', [EmployerHiringController::class, 'viewDatas'])->name('employer.employee.boost');
    Route::get('/employer/boost/{id}', [EmployerHiringController::class, 'boostData'])->name('employer.employee.boost.submit');
    Route::get('/verify/paypal', [App\Http\Controllers\PaymentController::class, 'verifyPaypal'])->name('verify.paypal');

    Route::get('/employer/password/change', [SigninController::class, 'changePasswordEmployer'])->name('employer.password.change');
    Route::post('/employer/password/change/confirm', [SigninController::class, 'changePasswordEmployerConfirm'])->name('employer.password.change.confirm');



 
 });

 /*
  * Employee Routes
  */ 

  Route::get('/employee/signin', [SigninController::class, 'employee'])->name('employee.signin');
  Route::get('/employee/signup', [SignupController::class, 'employee'])->name('employee.signup');
  Route::get('/employee/verify-email/{token}/{email}', [SignupController::class, 'verifyEmailEmployee'])->name('verify.email.employee');
  Route::get('/employee/logout', [SigninController::class, 'employeeLogout'])->name('employee.logout');
  Route::get('/employee/recover', [RecoverController::class, 'recoverEmployee'])->name('employee.recover');
  Route::post('/employee/recoverSubmit', [RecoverController::class, 'recoverEmployeeSubmit'])->name('employee.recover.submit');
  Route::post('/employee/recoverPasswordSubmit', [RecoverController::class, 'resetEmployeePasswordSubmit'])->name('employee.recover.password.submit');
  Route::get('/employee/recover/{token}/{email}', [RecoverController::class, 'resetEmployeePassword'])->name('employee.recover.password');

  Route::post('/employee/signupSubmit', [SignupController::class, 'signupSubmitEmployee'])->name('employee.signup.submit');
  Route::post('/employee/signinSubmit', [SigninController::class, 'signinSubmitEmployee'])->name('employee.signin.submit');

  Route::middleware(['employee:employee'])->group(function () {

    Route::get('/employee/dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
    Route::get('/employee/apply/{id}', [EmployeeController::class, 'apply'])->name('employee.apply');
    Route::post('/employee/apply/confirm/{id}', [EmployeeController::class, 'applyConfirm'])->name('employee.apply.confirm');
    Route::get('/employee/job/applied', [JobController::class, 'getApplied'])->name('employee.job.applied');
    Route::get('/employee/job/bookmark/{id}', [EmployeeController::class, 'addBookmark'])->name('employee.job.bookmark');
    Route::get('/employee/job/bookmarks', [EmployeeController::class, 'checkBookmark'])->name('employee.job.bookmarks');
    Route::get('/employee/job/bookmark/delete/{id}', [EmployeeController::class, 'deleteBookmark'])->name('bookmark.delete');
    Route::get('/employee/resume/create', [EmployeeResumeController::class, 'create'])->name('employee.resume.create');
    Route::post('/employee/resume/education', [EmployeeResumeController::class, 'createEducation'])->name('employee.resume.create.education');
    Route::post('/employee/resume/experience', [EmployeeResumeController::class, 'createExperience'])->name('employee.resume.create.experience');
    Route::post('/employee/resume/skill', [EmployeeResumeController::class, 'createSkill'])->name('employee.resume.create.skill');
    Route::get('/employee/profile', [EmployeeController::class, 'updateProfile'])->name('employee.profile');
    Route::post('/employee/profile/edit', [EmployeeController::class, 'updateProfileConfirm'])->name('employee.profile.edit');
    Route::post('/employee/profile/social/edit', [EmployeeController::class, 'updateProfileSocial'])->name('employee.profile.social.edit');
    Route::get('/employee/delete', function () {return view('employee.deleteaccount');})->name('employee.delete');
    Route::get('/employee/password/change', [SigninController::class, 'changePasswordEmployee'])->name('employee.password.change');
    Route::post('/employee/password/change/confirm', [SigninController::class, 'changePasswordEmployeeConfirm'])->name('employee.password.change.confirm');


    Route::get('/admin/employee/delete/{id}', [EmployeeController::class, 'terminateEmployee'])->name('admin.employee.delete');
 });

/*
Message Routes
*/






