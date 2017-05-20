<?php

Route::get('/', 'UserController@index')->name('index');
Route::get('AboutUs', 'UserController@getAboutUs');
Route::get('HowToUseDiamond', 'UserController@getHowToUseDiamond');
Route::get('Rules', 'UserController@getRules');
Route::get('contact', 'UserController@getContact');
Route::get('HowToUnlockStory', 'UserController@getHowToUnlockStory');
Route::get('forgot_password', 'UserController@getForgotPassword');
Route::post('forgot_password', 'UserController@postForgotPassword');

Route::group(['prefix' => 'banner'], function () {
    Route::get('1', 'BannerController@getBanner1');
    Route::get('2', 'BannerController@getBanner2');
    Route::get('3', 'BannerController@getBanner3');
});

Route::get('login/facebook', 'UserController@redirectToProvider');
Route::get('login/facebook/callback', 'UserController@handleProviderCallback');

/* Route User */

Route::group(['prefix' => 'user'], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', 'UserAuthController@postRegister');
        Route::post('login', 'UserAuthController@postLogin');
        Route::get('logout', 'UserAuthController@logout');
    });

    Route::get('profile', 'ProfileController@getProfile')->name('profile');
    Route::get('profile/{author}', 'ProfileController@getProfileAuthor');


    Route::get('read/story/{id}', 'StoryController@getReadStory')->name('main_story');
    Route::get('read/story/detail/{id}', 'StoryController@getReadStoryDetail');
    Route::get('write/story', 'StoryController@getWriteStory');
    Route::post('write/story', 'StoryController@postWriteStory');
    Route::get('write/story/sub/{id}', 'StoryController@getWriteSubStory');
    Route::post('write/story/sub/{id}', 'StoryController@postInsertSubStory');

    Route::post('comment/story/{id}', 'StoryController@postInsertStoryComment');
    Route::post('reply/comment/story/{id}', 'StoryController@postInsertReplyCommentStory');

    Route::post('comment/sub_story/{id}', 'StoryController@postInsertSubStoryComment');
    Route::post('reply/comment/sub_story/{id}', 'StoryController@postInsertReplyCommentSubStory');

    Route::get('love/story/{id}', 'StoryController@getLoveStory');
    Route::post('search', 'SearchController@postSearch');
    Route::post('profile/comment', 'StoryController@postProfileComment');
    Route::get('announce/create', 'AnnounceController@getCreateAnnounce');
    Route::post('announce/create', 'AnnounceController@postCreateAnnounce');
    Route::get('announce/read/{id}', 'AnnounceController@getReadAnnounce');
    Route::get('topup', 'CashCardController@getTopup');
    Route::get('topup/form', 'CashCardController@getFormTopup')->name('topup/form');
    Route::post('topup/form', 'CashCardController@postFormTopup');

    Route::group(['prefix' => 'register'], function () {
        Route::get('writer', 'UserController@getRegisterWriter');
        Route::post('post/writer', 'UserController@postRegisterWriter');
    });

    Route::group(['prefix' => 'like'], function () {
        Route::post('story/{story_id}', 'StoryController@LikeStoryUpdate');
        Route::post('sub_story/{subStoryId}', 'StoryController@LikeSubStoryUpdate');
    });

    Route::group(['prefix' => 'update'], function () {
        Route::get('profile', 'ProfileController@getProfileUpdate');
        Route::post('profile', 'ProfileController@postProfileUpdate');
        Route::post('profile/facebook', 'ProfileController@postProfileUpdateByFacebook');
        Route::get('story/{id}', 'StoryController@getUpdateStory');
        Route::post('story/{id}', 'StoryController@postUpdateStory');
        Route::get('sub_story/{id}', 'StoryController@getUpdateSubStory');
        Route::post('sub_story/{id}', 'StoryController@postUpdateSubStory');
    });

});

/* End Route User */

Route::group(['prefix' => 'category'], function () {
    Route::get('{id}', 'CategoryController@getCategory');
});

Route::get('admin', 'AdminAuthController@index')->name('auth');
Route::post('admin/auth', 'AdminAuthController@postLogin');
Route::group(['middleware' => ['AuthAdmin']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('change_password', 'AdminController@getFormChangePassword');
        Route::post('update/password', 'AdminController@postUpdatePassword');
        Route::get('logout', 'AdminAuthController@getLogout');
        Route::get('main', 'AdminController@main')->name('main');

        Route::group(['prefix' => 'member'], function () {
            Route::get('all', 'MemberController@getAllMember')->name('member/all');
            Route::get('facebook', 'MemberController@getAllFacebook');
            Route::get('add', 'MemberController@getAddMember');
            Route::post('add', 'MemberController@postAddMember');
            Route::get('edit/{member_id}', 'MemberController@getEditMember');
            Route::put('edit/{id}', 'MemberController@postEditMember');
            Route::get('delete/{member_id}', 'MemberController@getDeleteMember');
            Route::post('ban/{id}', 'MemberController@BanMember');
            Route::post('unban/{id}', 'MemberController@UnbanMember');
        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('all', 'CategoryController@getAllCategory')->name('category/all');
            Route::get('add', 'CategoryController@getAddCategory');
            Route::post('add', 'CategoryController@postAddCategory');
            Route::get('edit/{category_id}', 'CategoryController@getEditCategory');
            Route::post('edit', 'CategoryController@postEditCategory');
            Route::get('delete/{category_id}', 'CategoryController@getDeleteCategory');
        });

        Route::get('promote/story', 'PromoteController@getPromoteStory');

        Route::group(['prefix' => 'report'], function () {
            Route::get('visit', 'ReportController@getReportVisit');
            Route::get('topup', 'ReportController@getReportTopup');
            Route::get('people', 'ReportController@getReportPeople');
        });

        Route::group(['prefix' => 'change_ui'], function () {
            Route::get('contact', 'ChangeUIController@getContact');
            Route::post('update/contact', 'ChangeUIController@postUpdateContact');

            Route::get('banner', 'ChangeUIController@getBanner');
            Route::post('update/banner', 'ChangeUIController@postUpdateBanner');

            Route::get('AboutUs', 'ChangeUIController@getAboutUs');
            Route::post('update/AboutUs', 'ChangeUIController@postUpdateAboutUs');

            Route::get('HowToUseDiamond', 'ChangeUIController@getHowToUseDiamond');
            Route::post('update/HowToUseDiamond', 'ChangeUIController@postUpdateHowToUseDiamond');

            Route::get('Rules', 'ChangeUIController@getRules');
            Route::post('update/Rules', 'ChangeUIController@postUpdateRules');

            Route::get('HowToUnlockStory', 'ChangeUIController@getHowToUnlockStory');
            Route::post('update/HowToUnlockStory', 'ChangeUIController@postUpdateHowToUnlockStory');
        });

        Route::group(['prefix' => 'story'], function () {
            Route::get('all', 'StoryController@getStoryAll')->name('story');
            Route::get('update/{id}', 'StoryController@getUpdateStoryFromAdmin');
            Route::post('update/{id}', 'StoryController@postUpdateStoryFromAdmin');
            Route::post('ban/{id}', 'StoryController@postBanStory');
            Route::post('unban/{id}', 'StoryController@postUnbanStory');
        });

        Route::group(['prefix' => 'sub_story'], function () {
            Route::get('all', 'StoryController@getSubStoryAll')->name('sub_story');
            Route::get('update/{id}', 'StoryController@getUpdateSubStoryFromAdmin');
            Route::post('update/{id}', 'StoryController@postUpdateSubStoryFromAdmin');
            Route::post('ban/{id}', 'StoryController@postBanSubStory');
            Route::post('unban/{id}', 'StoryController@postUnbanSubStory');
        });


    });
});

