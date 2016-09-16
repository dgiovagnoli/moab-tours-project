<?php
// register routes
$router->map('GET', '/register', 'Project\controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Project\controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET', '/verify-account', 'Project\controllers\RegisterController@getVerifyAccount', 'verify_account');

// review routes
$router->map('GET', '/reviews', 'Project\controllers\ReviewController@getShowReviews', 'reviews');


// logged in user routes
if (Project\Auth\LoggedIn::user()) {
  $router->map('GET', '/add-review', 'Project\controllers\ReviewController@getShowAdd', 'add_review');
  $router->map('POST', '/add-review', 'Project\controllers\ReviewController@postShowAdd', 'add_review_post');
}

// login/logout routes
$router->map('GET', '/login', 'Project\controllers\AuthenticationController@getShowLoginPage', 'login');
$router->map('POST', '/login', 'Project\controllers\AuthenticationController@postShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'Project\controllers\AuthenticationController@getLogout', 'logout');

// admin routes
if ((Project\auth\LoggedIn::user()) && (Project\auth\LoggedIn::user()->access_level == 2)) {
    $router->map('POST', '/admin/page/edit', 'Project\controllers\AdminController@postSavePage', 'save_page');
    $router->map('GET', '/admin/page/add', 'Project\controllers\AdminController@getAddPage', 'add_page');
}

// page routes
$router->map('GET', '/', 'Project\controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/page-not-found', 'Project\controllers\PageController@getShow404', '404');
$router->map('GET', '/[*]', 'Project\controllers\PageController@getShowPage', 'generic_page');
