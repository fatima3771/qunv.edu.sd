<?php 
Route::prefix('mtCPanel')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('mtCPanel.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('mtCPanel.login.submit');

    Route::group(['middleware' => ['auth:admin']], function(){
        Route::get('/', 'AdminController@index')->name('mtCPanel.dashboard');

        Route::get('sendFirebaseNotifications', function () {
          return view('mtCPanel.firebase_notification');
      });
     
      Route::post('sendFirebaseNotifications','MyController@sendFirebaseNotifications')->name('sendFirebaseNotifications');

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
        // Route::post('locales/dropzone','MTCPanelLocalesController@dropzone')->name('mtCPanel.locales.dropzone');
        // Route::post('locales/dropzone/remove','MTCPanelLocalesController@dropzoneRemove')->name('mtCPanel.locales.dropzone.remove');
        // Route::resource('locales', 'MTCPanelLocalesController', ['as' => 'mtCPanel']);

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
        Route::post('Conferences/dropzone','MTCPanelConferencesController@dropzone')->name('mtCPanel.Conferences.dropzone');
        Route::post('Conferences/dropzone/remove','MTCPanelConferencesController@dropzoneRemove')->name('mtCPanel.Conferences.dropzone.remove');
        Route::resource('conferences', 'MTCPanelConferencesController', ['as' => 'mtCPanel']);
        
        //-- Jobs Control ---------------------------------------------------------------------------//
        Route::post('jobs/dropzone','MTCPanelJobsController@dropzone')->name('mtCPanel.jobs.dropzone');
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
