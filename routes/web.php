<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'UserController@index')->name('index');
Route::get('how_to_writing', 'UserController@getHowToWriting');
Route::get('how_to_register', 'UserController@getHowToRegister');
Route::get('how_to_support', 'UserController@getHowToSupport');
Route::get('contact', 'UserController@getContact');

Route::group(['prefix' => 'user'], function() {

    Route::group(['prefix' => 'auth'], function() {
        Route::post('register', 'UserAuthController@postRegister');
        Route::post('login', 'UserAuthController@postLogin');
        Route::get('logout', 'UserAuthController@logout');
    });

  Route::get('profile', 'ProfileController@getProfile')->name('profile');
  Route::get('read/story/{id}', 'StoryController@getReadStory');
  Route::get('read/story/detail/{id}', 'StoryController@getReadStoryDetail');
  Route::get('write/story', 'StoryController@getWriteStory');
  Route::post('write/story', 'StoryController@postWriteStory');
  Route::get('write/story/sub/{id}', 'StoryController@getWriteStorySub');
  Route::get('love/story/{id}' ,'StoryController@getLoveStory');
  Route::post('search', 'SearchController@postSearch');
  Route::post('story/comment', 'StoryController@postStoryComment');
  Route::get('announce/create', 'AnnounceController@getCreateAnnounce');
  Route::post('announce/create', 'AnnounceController@postCreateAnnounce');
  Route::get('announce/read/{id}', 'AnnounceController@getReadAnnounce');
  Route::get('topup', 'CashCardController@getTopup');
  Route::get('topup/form', 'CashCardController@getFormTopup')->name('topup/form');
  Route::post('topup/form', 'CashCardController@postFormTopup');
});

Route::group(['prefix' => 'category'], function() {
  Route::get('{id}', 'CategoryController@getCategory');
});

Route::group(['prefix' => 'admin'], function() {
  Route::get('main', 'AdminController@main');
  Route::get('member/all', 'AdminController@getAllMember')->name('member/all');
  Route::get('member/facebook', 'AdminController@getAllFacebook');
  Route::get('member/add', 'AdminController@getAddMember');
  Route::post('member/add', 'AdminController@postAddMember');
  Route::get('member/edit/{member_id}', 'AdminController@getEditMember');
  Route::post('member/edit', 'AdminController@postEditMember');
  Route::get('member/delete/{member_id}', 'AdminController@getDeleteMember');
  Route::get('category/all', 'AdminController@getAllCategory')->name('category/all');
  Route::get('category/add', 'AdminController@getAddCategory');
  Route::post('category/add', 'AdminController@postAddCategory');
  Route::get('category/edit/{category_id}', 'AdminController@getEditCategory');
  Route::post('category/edit', 'AdminController@postEditCategory');
  Route::get('category/delete/{category_id}', 'AdminController@getDeleteCategory');
  Route::get('promote/story', 'AdminController@getPromoteStory');
  Route::get('report/visit', 'AdminController@getReportVisit');
  Route::get('report/topup', 'AdminController@getReportTopup');
  Route::get('report/people', 'AdminController@getReportPeople');

  Route::get('editor/contact', 'AdminController@getEditorContact');
  Route::post('editor/contact', 'AdminController@postEditorContact');
});

Route::get('/facebook/login', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    // $login_link = $fb->getRedirectLoginHelper()->getLoginUrl('https://localhost/', ['email', 'user_events']);
    // echo '<a href="' . $login_link . '">Log in with Facebook</a>';
    $login_link = $fb->getLoginUrl();
    return redirect($login_link);
});

Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    // Obtain an access token.
    try {
        $token = $fb->getAccessTokenFromRedirect();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Access token will be null if the user denied the request
    // or if someone just hit this URL outside of the OAuth flow.
    if (! $token) {
        // Get the redirect helper
        $helper = $fb->getRedirectLoginHelper();

        if (! $helper->getError()) {
            abort(403, 'Unauthorized action.');
        }

        // User denied the request
        dd(
            $helper->getError(),
            $helper->getErrorCode(),
            $helper->getErrorReason(),
            $helper->getErrorDescription()
        );
    }

    if (! $token->isLongLived()) {
        // OAuth 2.0 client handler
        $oauth_client = $fb->getOAuth2Client();

        // Extend the access token.
        try {
            $token = $oauth_client->getLongLivedAccessToken($token);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);

    // Get basic info on the user from Facebook.
    try {
        $response = $fb->get('/me?fields=id,name,email');
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
    $facebook_user = $response->getGraphUser();

    // Create the user if it does not exist or update the existing entry.
    // This will only work if you've added the SyncableGraphNodeTrait to your User model.
    $json_facebook_info = App\FacebookLogin::createOrUpdateGraphNode($facebook_user);

    // Log the user into Laravel
    $info = json_decode($json_facebook_info);
    // $user_id = $info->{'facebook_user_id'};
    $user_id = $info->{'full_name'};
    // Auth::User($user_id);
    Session::put('facebook_login', $user_id);

    // $member = new App\User;
    // $member->setFacebookLogin($user_id);

    // return redirect('/')->with('message', 'Successfully logged in with Facebook');
    return redirect()->route('index');
    // return $user_id;
});
