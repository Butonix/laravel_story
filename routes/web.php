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

Route::group(['prefix' => 'user'], function() {
  Route::post('register', 'UserController@postRegister');
  Route::post('login', 'UserController@postLogin');
  Route::get('logout', 'UserController@logout');
  Route::get('profile', 'UserController@getProfile')->name('profile');
  Route::get('read/story/{id}', 'UserController@getReadStory');
  Route::get('read/story/detail/{id}', 'UserController@getReadStoryDetail');
  Route::get('write/story', 'UserController@getWriteStory');
  Route::post('write/story', 'UserController@postWriteStory');
  Route::get('write/story/sub/{id}', 'UserController@getWriteStorySub');
  Route::get('love/story/{id}' ,'UserController@getLoveStory');
});

Route::group(['prefix' => 'category'], function() {
  Route::get('{id}', 'UserController@getCategory');
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
  Route::get('visit/all', 'AdminController@getVisitAll');
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
    // $info = json_decode($json_facebook_info);
    // $user_id = $info->{'facebook_user_id'};
    // Auth::User($user_id);

    // $member = new App\User;
    // $member->setFacebookLogin($user_id);

    // return redirect('/')->with('message', 'Successfully logged in with Facebook');
    return redirect()->route('index');
    // return $user_id;
});
