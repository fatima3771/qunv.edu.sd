<?php

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

use GuzzleHttp\Client;

Route::get('/', function () {
  return redirect(app()->getLocale());
});

Route::get('/getPicUrl', function(){
	//return Config::get('mtcpanel.intranetPublicUrl').'slides/slide2.jpg';
	Storage::disk('local');
	$url = Storage::temporaryUrl(
		Config::get('mtcpanel.intranetPublicUrl').'slides/slide2.jpg', \Carbon\Carbon::now()->addMinutes(5)
	);
	dd($url);
});

Route::prefix('api')->group( function() {
	Route::get('/v2/news', function(){
		$client = new GuzzleHttp\Client(['base_uri' => Config::get('mtcpanel.intranetUrl')]);
		$response = $client->request('GET', 'news');
		//echo $response->getStatusCode();
		header('Access-Control-Allow-Origin: *');
		return json_decode($response->getBody(),true);
	});

  Route::get('/v2/slides', function(){
		$client = new GuzzleHttp\Client(['base_uri' => Config::get('mtcpanel.intranetUrl')]);
		$response = $client->request('GET', 'slides');
		//echo $response->getStatusCode();
		header('Access-Control-Allow-Origin: *');
		return json_decode($response->getBody(),true);
	});

  Route::get('/v2/careers', function(){
		$client = new GuzzleHttp\Client(['base_uri' => Config::get('mtcpanel.intranetUrl')]);
		$response = $client->request('GET', 'careers');
		//echo $response->getStatusCode();
		header('Access-Control-Allow-Origin: *');
		return json_decode($response->getBody(),true);
	});

});

Route::prefix('mtCPanel')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('mtCPanel.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('mtCPanel.login.submit');
    Route::get('/logout', function(){
      auth()->guard('admin')->logout();
      return redirect()->route('mtCPanel.login');
    })->name('mtCPanel.logout');

    Route::group(['middleware' => ['auth:admin']], function(){
      Route::get('/', 'AdminController@index')->name('mtCPanel.dashboard');

        

        //-- Pages Control ---------------------------------------------------------------------------//
        Route::any('languages_options', array('before' => 'auth.admin' ,'uses' => 'JTableControllerLanguages@languagesOptions'));

        //-- Dropzone Uploader -----------------------------------------------------------------------//
        Route::post('dropzone/upload', array('before' => 'auth.admin|admin.hasAuthToAccess:dropzone' ,'uses' => 'MTCPanelDropzoneController@upload'))->name('mtCPanel.dropzone.upload');
        Route::get('dropzone/get', function(){

          $a = [
            ["name" => "assaassasa",
            "size" => 1234,
            "filetype" => "image/jpeg"],
            ["name" => "assaassasa",
            "size" => 1234,
            "filetype" => "image/jpeg"],
            ["name" => "assaassasa",
            "size" => 1234,
            "filetype" => "image/jpeg"],
            ["name" => "assaassasa",
            "size" => 1234,
            "filetype" => "image/jpeg"],
          ];
          return json_encode($a);
        })->name('mtCPanel.dropzone.get');

        // Route::get('test', function(){
        //   return dd(mtGetRoute('show','mtCPanel.banners', 1));
        // });

        //-- Pages Control ---------------------------------------------------------------------------//
        Route::post('pages/dropzone','MTCPanelPagesController@dropzone')->name('mtCPanel.pages.dropzone');
        Route::post('pages/dropzone/remove','MTCPanelPagesController@dropzoneRemove')->name('mtCPanel.pages.dropzone.remove');
        Route::resource('pages', 'MTCPanelPagesController', ['as' => 'mtCPanel']);

        //-- News Control ---------------------------------------------------------------------------//
        Route::post('news/dropzone','MTCPanelNewsController@dropzone')->name('mtCPanel.news.dropzone');
        Route::post('news/dropzone/remove','MTCPanelNewsController@dropzoneRemove')->name('mtCPanel.news.dropzone.remove');
        Route::resource('news', 'MTCPanelNewsController', ['as' => 'mtCPanel']);

        //-- Managers Control ---------------------------------------------------------------------------//
        Route::post('managers/dropzone','MTCPanelManagersController@dropzone')->name('mtCPanel.managers.dropzone');
        Route::post('managers/dropzone/remove','MTCPanelManagersController@dropzoneRemove')->name('mtCPanel.managers.dropzone.remove');
        Route::resource('managers', 'MTCPanelManagersController', ['as' => 'mtCPanel']);

        //-- Banners Control ---------------------------------------------------------------------------//
        Route::post('banners/dropzone','MTCPanelBannersController@dropzone')->name('mtCPanel.banners.dropzone');
        Route::post('banners/dropzone/remove','MTCPanelBannersController@dropzoneRemove')->name('mtCPanel.banners.dropzone.remove');
        Route::resource('banners', 'MTCPanelBannersController', ['as' => 'mtCPanel']);

        //-- Locales Control ---------------------------------------------------------------------------//
        Route::post('locales/dropzone','MTCPanelLocalesController@dropzone')->name('mtCPanel.locales.dropzone');
        Route::post('locales/dropzone/remove','MTCPanelLocalesController@dropzoneRemove')->name('mtCPanel.locales.dropzone.remove');
        Route::resource('locales', 'MTCPanelLocalesController', ['as' => 'mtCPanel']);

        //-- Colleges Control ---------------------------------------------------------------------------//
        Route::post('colleges/dropzone','MTCPanelCollegesController@dropzone')->name('mtCPanel.colleges.dropzone');
        Route::post('colleges/dropzone/remove','MTCPanelCollegesController@dropzoneRemove')->name('mtCPanel.colleges.dropzone.remove');
        Route::resource('colleges', 'MTCPanelCollegesController', ['as' => 'mtCPanel']);
        Route::get('colleges/{id}/getDepartmentsList', 'MTCPanelCollegesController@getDepartmentsList');
        
        //-- College Departments Control ---------------------------------------------------------------------------//
        Route::post('colleges/departments/dropzone','MTCPanelCollegesDepartmentsController@dropzone')->name('mtCPanel.colleges.departments.dropzone');
        Route::post('colleges/departments/dropzone/remove','MTCPanelCollegesDepartmentsController@dropzoneRemove')->name('mtCPanel.colleges.departments.dropzone.remove');
        Route::resource('colleges.departments', 'MTCPanelCollegesDepartmentsController', ['as' => 'mtCPanel']);
        
        //-- College Staff Control ---------------------------------------------------------------------------//
        Route::post('colleges/staff/dropzone','MTCPanelCollegesStaffController@dropzone')->name('mtCPanel.colleges.staff.dropzone');
        Route::post('colleges/staff/dropzone/remove','MTCPanelCollegesStaffController@dropzoneRemove')->name('mtCPanel.colleges.staff.dropzone.remove');
        Route::resource('colleges.staff', 'MTCPanelCollegesStaffController', ['as' => 'mtCPanel']);
        
        //-- College Extra Contents Control ---------------------------------------------------------------------------//
        Route::post('colleges/extraContents/dropzone','MTCPanelCollegesExtraContentsController@dropzone')->name('mtCPanel.colleges.extraContents.dropzone');
        Route::post('colleges/extraContents/dropzone/remove','MTCPanelCollegesExtraContentsController@dropzoneRemove')->name('mtCPanel.colleges.extraContents.dropzone.remove');
        Route::resource('colleges.extraContents', 'MTCPanelCollegesExtraContentsController', ['as' => 'mtCPanel']);
        
        //-- College Details Control ---------------------------------------------------------------------------//
        Route::post('colleges/details/dropzone','MTCPanelCollegesDetailsController@dropzone')->name('mtCPanel.colleges.details.dropzone');
        Route::post('colleges/details/dropzone/remove','MTCPanelCollegesDetailsController@dropzoneRemove')->name('mtCPanel.colleges.details.dropzone.remove');
        Route::resource('colleges.details', 'MTCPanelCollegesDetailsController', ['as' => 'mtCPanel']);

        //-- College News Control ---------------------------------------------------------------------------//
        Route::post('colleges/news/dropzone','MTCPanelCollegesNewsController@dropzone')->name('mtCPanel.colleges.news.dropzone');
        Route::post('colleges/news/dropzone/remove','MTCPanelCollegesNewsController@dropzoneRemove')->name('mtCPanel.colleges.news.dropzone.remove');
        Route::resource('colleges.news', 'MTCPanelCollegesNewsController', ['as' => 'mtCPanel']);

        //-- College Slides Control ---------------------------------------------------------------------------//
        Route::post('colleges/slider/dropzone','MTCPanelCollegesSliderController@dropzone')->name('mtCPanel.colleges.slider.dropzone');
        Route::post('colleges/slider/dropzone/remove','MTCPanelCollegesSliderController@dropzoneRemove')->name('mtCPanel.colleges.slider.dropzone.remove');
        Route::resource('colleges.slider', 'MTCPanelCollegesSliderController', ['as' => 'mtCPanel']);

        //-- Slides Control ---------------------------------------------------------------------------//
        Route::post('slides/dropzone','MTCPanelSlidesController@dropzone')->name('mtCPanel.slides.dropzone');
        Route::post('slides/dropzone/remove','MTCPanelSlidesController@dropzoneRemove')->name('mtCPanel.slides.dropzone.remove');
        Route::resource('slides', 'MTCPanelSlidesController', ['as' => 'mtCPanel']);

        //-- Members Control ---------------------------------------------------------------------------//
        Route::post('members/dropzone','MTCPanelMembersController@dropzone')->name('mtCPanel.members.dropzone');
        Route::post('members/dropzone/remove','MTCPanelMembersController@dropzoneRemove')->name('mtCPanel.members.dropzone.remove');
        Route::resource('members', 'MTCPanelMembersController', ['as' => 'mtCPanel']);
        // Route::get('/members', 'AdminMemberController@show');
        
        //-- Members Registrations Control ---------------------------------------------------------------------------//
        Route::post('members_registrations/dropzone','MTCPanelMembershipRegistrationsController@dropzone')->name('mtCPanel.members_registrations.dropzone');
        Route::post('members_registrations/dropzone/remove','MTCPanelMembershipRegistrationsController@dropzoneRemove')->name('mtCPanel.members_registrations.dropzone.remove');
        Route::resource('members_registrations', 'MTCPanelMembershipRegistrationsController', ['as' => 'mtCPanel']);
        
        //-- Members Transactions Control ---------------------------------------------------------------------------//
        Route::post('transactions/dropzone','MTCPanelTransactionsController@dropzone')->name('mtCPanel.transactions.dropzone');
        Route::post('transactions/dropzone/remove','MTCPanelTransactionsController@dropzoneRemove')->name('mtCPanel.transactions.dropzone.remove');
        Route::resource('transactions', 'MTCPanelTransactionsController', ['as' => 'mtCPanel']);
        
        //-- Testamonials Control ---------------------------------------------------------------------------//
        Route::post('testamonials/dropzone','MTCPanelTestamonialsController@dropzone')->name('mtCPanel.testamonials.dropzone');
        Route::post('testamonials/dropzone/remove','MTCPanelTestamonialsController@dropzoneRemove')->name('mtCPanel.testamonials.dropzone.remove');
        Route::resource('testamonials', 'MTCPanelTestamonialsController', ['as' => 'mtCPanel']);
        
        //-- Services Control ---------------------------------------------------------------------------//
        Route::post('services/dropzone','MTCPanelServicesController@dropzone')->name('mtCPanel.services.dropzone');
        Route::post('services/dropzone/remove','MTCPanelServicesController@dropzoneRemove')->name('mtCPanel.services.dropzone.remove');
        Route::resource('services', 'MTCPanelServicesController', ['as' => 'mtCPanel']);


        //-- Conferences Control --BY FATIMA ---------------------------------------------------------------------------//
        Route::post('Conferences/dropzone','MTCPanelConferencesController@dropzone')->name('mtCPanel.conferences.dropzone');
        Route::post('Conferences/dropzone/remove','MTCPanelConferencesController@dropzoneRemove')->name('mtCPanel.conferences.dropzone.remove');
        Route::resource('conferences', 'MTCPanelConferencesController', ['as' => 'mtCPanel']);

       //-- Conference Details Control --BY FATIMA ----------------------------------------------------------------------//
        Route::post('Conferences/details/dropzone','MTCPanelConferencesDetailsController@dropzone')->name('mtCPanel.conferences.details.dropzone');
        Route::post('Conferences/details/dropzone/remove','MTCPanelConferencesDetailsController@dropzoneRemove')->name('mtCPanel.conferences.details.dropzone.remove');
        Route::resource('conferences.details', 'MTCPanelConferencesDetailsController', ['as' => 'mtCPanel']);


        //-- Conference Pictures Control --BY FATIMA ----------------------------------------------------------------------//
        Route::post('Conferences/pictures/dropzone','MTCPanelConferencesPicturesController@dropzone')->name('mtCPanel.conferences.pictures.dropzone');
        Route::post('Conferences/pictures/dropzone/remove','MTCPanelConferencesPicturesController@dropzoneRemove')->name('mtCPanel.conferences.pictures.dropzone.remove');
        Route::resource('conferences.pictures', 'MTCPanelConferencesPicturesController', ['as' => 'mtCPanel']);

       //-- Magazines Control ---------------------------------------------------------------------------//
        Route::post('magazines/dropzone','MTCPanelMagazinesController@dropzone')->name('mtCPanel.magazines.dropzone');
        Route::post('magazines/dropzone/remove','MTCPanelMagazinesController@dropzoneRemove')->name('mtCPanel.magazines.dropzone.remove');
        Route::post('magazines/issues/dropzone','MTCPanelMagazineIssuesController@dropzone')->name('mtCPanel.magazines.issues.dropzone');
        Route::post('magazines/issues/dropzone/remove','MTCPanelMagazineIssuesController@dropzoneRemove')->name('mtCPanel.magazines.issues.dropzone.remove');
        Route::post('magazines/issues/topics/dropzone','MTCPanelMagazineIssueTopicsController@dropzone')->name('mtCPanel.magazines.issues.topics.dropzone');
        Route::post('magazines/issues/topics/dropzone/remove','MTCPanelMagazineIssueTopicsController@dropzoneRemove')->name('mtCPanel.magazines.issues.topics.dropzone.remove');
        Route::resource('magazines', 'MTCPanelMagazinesController', ['as' => 'mtCPanel']);
        Route::resource('magazines.issues', 'MTCPanelMagazineIssuesController', ['as' => 'mtCPanel']);
        Route::resource('magazines.issues.topics', 'MTCPanelMagazineIssueTopicsController', ['as' => 'mtCPanel']);


        //-- Jobs Control ---------------------------------------------------------------------------//
        Route::post('jobs/dropzone','MTCPanelJobsController@dropzone')->name('mtCPanel.Conferencesjobs.dropzone');
        Route::post('jobs/dropzone/remove','MTCPanelJobsController@dropzoneRemove')->name('mtCPanel.jobs.dropzone.remove');
        Route::resource('jobs', 'MTCPanelJobsController', ['as' => 'mtCPanel']);
        
        //-- Polls Control ---------------------------------------------------------------------------//
        Route::post('polls/dropzone','MTCPanelTestamonialController@dropzone')->name('mtCPanel.polls.dropzone');
        Route::post('polls/dropzone/remove','MTCPanelTestamonialController@dropzoneRemove')->name('mtCPanel.polls.dropzone.remove');
        Route::post('polls/answers/dropzone','MTCPanelTestamonialController@dropzone')->name('mtCPanel.polls.answers.dropzone');
        Route::post('polls/answers/dropzone/remove','MTCPanelTestamonialController@dropzoneRemove')->name('mtCPanel.polls.answers.dropzone.remove');
        Route::resource('polls', 'MTCPanelPollsController', ['as' => 'mtCPanel']);
        Route::resource('polls.answers', 'MTCPanelPollsAnswersController', ['as' => 'mtCPanel']);

        // --------------------------- JTable Page Attachment-----------------------------------
        Route::any('attachments', 'JTableControllerAttachment@showAttachmentJTable');
        Route::any('attachments/list', 'JTableControllerAttachment@attachmentsList');
        Route::any('attachments/add', 'JTableControllerAttachment@attachmentsAdd');
        Route::any('attachments/update', 'JTableControllerAttachment@attachmentsUpdate');
        Route::any('attachments/delete', 'JTableControllerAttachment@attachmentsDelete');

    });

    
  });  

  Auth::routes();


// Route::get('lang/{locale}', function ($locale) {
//     if (in_array($locale, \Config::get('app.locales'))) {
//       Session::put('locale', $locale);
//     }
//     return redirect()->back();
// });


Route::group([
  'prefix' => '{locale}', 
  'where' => ['locale' => '[a-zA-Z]{2}'], 
  'middleware' => 'setLocale'], function() {


// Route::get('apiTest', function(){
//     return view('site.apiTest');
// });

// Route::get('lang/{locale}', function ($locale) {
//     if (in_array($locale, \Config::get('app.locales'))) {
//       Session::put('locale', $locale);
//     }
//     return redirect()->back();
// });
// Route::get('formTest', function(){
//   return view('site.formTest');
// });
Route::get('/', function (){ return view('site.main'); })->name('home');
Route::get('/page/{id}', 'PageController@show')->name('page');
Route::get('/services', 'ServiceController@show')->name('services');
Route::get('/services/{id}', 'ServiceController@display')->name('service_display');
Route::get('/associations/{id}/news/{newsID}', 'AssociationController@displayNews');
Route::get('/associations/{id}/details/{aboutID}', 'AssociationController@displayDetails');
Route::post('/associations/likeThis', 'AssociationController@likeThis');
Route::get('/managers/profile/{id}', 'ManagerController@display');
Route::get('/managers/{id}', 'ManagerController@show');
Route::get('/managers', 'ManagerController@show');
Route::get('/council/{year?}', 'CouncilController@show');
Route::get('/news', 'NewsController@show')->name('news');
Route::get('/news/{newsID}/{title?}', 'NewsController@display')->name('news_display');
Route::get('/events', 'EventsController@show');
Route::get('/events/{eventsID}', 'EventsController@display');
Route::get('/polls', 'PollController@show');
Route::get('/polls/{polls}', 'PollController@display');
Route::post('/polls/voteNow', 'PollController@voteNow');
Route::get('/contactUs', 'PageController@showContactUs')->name('contactUs');
Route::get('/logout', 'HomeController@logout');
Route::get('/membership/students/registration', 'MembershipController@studentsRegistration')->name('membership.students.registration');
Route::post('/membership/students/registration', 'MembershipController@membershipRegistration');
Route::get('/membership/graduates/registration', 'MembershipController@graduatesRegistration')->name('membership.graduates.registration');
Route::post('/membership/graduates/registration', 'MembershipController@membershipRegistration');
Route::get('/login', 'MembershipController@showLogin')->name('login');
Route::post('/login', 'MembershipController@doLogin');
Route::get('/branches', 'BranchController@show')->name('branches');
Route::get('/atm', 'ATMController@show');
Route::get('/managers/{id}', 'ManagerController@show')->name('managers');
Route::get('/council/{year?}', 'CouncilController@show');
Route::get('/BoD/{year?}', 'CouncilController@show')->name('council');
Route::get('/annualReport/{year?}', 'AnnualReportController@show')->name('annualReport');
Route::get('/almal', 'PublicationController@showAlmal')->name('almal');
Route::get('/alrayed', 'PublicationController@showAlrayed')->name('alrayed');
Route::get('/careers', 'JobsController@show')->name('jobs');
Route::get('/careers/{jobID}/{slug?}', 'JobsController@display')->name('jobs_display');


Route::get('/termsOfUse', function(){
  return view('site.privacyPolicy');
})->name('termsOfUse');
Route::get('/privacyPolicy', function(){
  return view('site.privacyPolicy');
})->name('privacyPolicy');


Route::get('/home', 'HomeController@index');


// Route::prefix('userAccount')->middleware('auth:user')->group(function() {
//   Route::get('/', 'UserAccountController@home')->name('userAccount');
//   Route::get('/dashboard', 'UserAccountController@home')->name('userAccount.dashboard');
//   Route::get('/card', 'UserAccountController@showMemberCards')->name('userAccoubnt.membership-card');
//   Route::get('/connect', 'UserAccountController@showConnectCards')->name('userAccount.connect-card');
//   Route::get('/withYou', 'UserAccountController@showWithYou')->name('userAccount.with-you');
//   Route::get('/certificate', 'UserAccountController@showCertificate')->name('userAccount.certificate');
//   Route::get('/payment', 'UserAccountController@showPayment')->name('userAccount.payment');
//   Route::post('/payment', 'PaymentController@doPayment');
//   Route::get('/payment/notify', 'PaymentController@notify');
//   Route::post('/payment/notify', 'PaymentController@notify');
//   Route::post('/payment/cancel', 'PaymentController@doCancel');
//   Route::post('/payment/return', 'PaymentController@doReturn');
// });

// Route::get('/clear-cache', function() {
//     Artisan::call('cache:clear');
//     return "Cache is cleared";
// });
  Route::get('{slug?}/{section?}/{id?}/{deptSection?}/{cID?}', 'PageController@slugShow')->name('slug');
  // Route::get('/{slug}', 'PageController@slugShow')->name('slug');


  Route::get('/{any?}', function () {
    
      return view('site.main');

  })->where('any', '^(?!api\/)[\/\w\.-]*');

});

Route::get('/{any?}', function () {
    
  return view('site.main');

})->where('any', '^(?!api\/)[\/\w\.-]*');
