<?php
Route::get('/test', 'BookingsController@getPrices');

Route::view('/', 'homepage',['title' => 'Philippine Adventure Consultants'])->name('index');
Route::view('/messages', 'chat');
Route::get('/te',function() {
  var_dump(Auth::guard('admin')->id());
});


Route::view('/upload', 'crew.upload');
Route::post('/up/{pid}', 'ManagersController@upload');
Route::get('/updatepackage/{pid}', 'ManagersController@update');

// Auth-User - login - register
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();

// PACKAGES
Route::get('/adventures/{adv_type?}','PackagesController@index')->name('adventures');
Route::get('/loadpackages','PackagesController@loadpackages');
Route::get('/adventure/{pid}', 'PackagesController@loadPackage')->name('adventure'); 

// MANAGER
Route::view('/crew/dashboard', 'wsadmin.dashboard',['title' => 'Dashboard']);
Route::get('/crew/manage', 'ManagersController@manage');
Route::view('/crew/add', 'wsadmin.addpackage');
Route::post('/addpackage', 'ManagersController@addpackage');
Route::post('/additem/{pid}','ManagersController@addIncluded');
Route::post('/deleteitem/{iid}','ManagersController@deleteIncluded');
Route::get('/editpkg/{pid}', 'ManagersController@update');
Route::post('/addschedule/{pid}','ManagersController@addSchedule');
Route::post('/deleteschedule/{sid}','ManagersController@deleteSchedule');
Route::post('/upload/{pid}','ManagersController@upload');
Route::post('/deletephoto/{pid}','ManagersController@deletePhoto');
Route::post('/addvideo/{pid}','ManagersController@addVideo');
Route::post('/deletevideo/{id}','ManagersController@deleteVideo');
Route::post('/updatedetails/{pid}', 'ManagersController@updatepackage');	
Route::get('/getbookings/{pid}','ManagersController@packageBookings');
Route::delete('/deletepackage/{pid}', 'ManagersController@deletepackage');
Route::post('/updateitinerary/{pid}','ManagersController@updateItinerary');
Route::post('/addcontent/{pid}','ManagersController@addContent');
Route::post('/deletecontent/{pid}','ManagersController@deleteContent');
Route::post('/addadventuretype','ManagersController@addadventureType');

=======
Route::post('/notifications/get','ManagersController@getNotifications');
>>>>>>> 90f3dda47ef6dd09d5c5da10fd8f0242d620d37f
=======
Route::post('/notifications/get','ManagersController@getNotifications');
>>>>>>> 90f3dda47ef6dd09d5c5da10fd8f0242d620d37f
//BOOKING
Route::get('/book/review/{pid}', 'BookingsController@review')->name('book');
Route::post('/book/confirm/{pid}', 'BookingsController@confirm');
Route::post('/book/{pid}', 'BookingsController@book');
Route::post('/paymentg/{id}', 'BookingsController@getPrices');
Route::get('/asd', 'BookingsController@checkCC');

//SUPERADMIN
Route::post('/deleteuser/{id}','SuperAdminController@deleteAccAdventurer');
Route::post('/deletecrew/{id}','SuperAdminController@deleteAccCrew');
Route::post('/addmanager','SuperAdminController@addCrewManager');
Route::post('/addadventurer','SuperAdminController@addAccountUser');

// ADVENTURER
Route::resource('adventurer','AdventurerController');
Route::view('/dashboard', 'Adventurer.dashboard',['title' => 'Dashboard']);
Route::view('/trips', 'Adventurer.trips',['title' => 'Trips']);
Route::view('/changepassword', 'Adventurer.changepassword', ['title' => 'Change Password']);
Route::post('/updatepassword/{id}', 'AdventurerController@changePassword');
Route::post('/writecomment/{pid}/{uid}', 'AdventurerController@comment');
Route::get('/myadventures/', 'BookingsController@showUserBookings');
Route::post('/cancelbooking/{bid}', 'BookingsController@cancelBooking');
Route::post('/changeavatar','AdventurerController@updateAvatar');
Route::get('/user/{id}','AdventurerController@showProfile');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

//PAGES
Route::get('/about-us', 'PagesController@aboutus');
Route::get('/contact-us', 'PagesController@contactus')->name('contactus'); 
Route::view('/theteam', 'pages.theteam')->name('theteam');


Route::view('/ab','wsadmin.admin');
Route::view('/aba','wsadmin.rendertables');
Route::view('/abc','wsadmin.crewlayout');

Route::get('/bookings','ManagersController@loadPackagesBookings');





Route::group(['prefix' => 'superadmin'], function () {
  Route::get('/login', 'SuperadminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'SuperadminAuth\LoginController@login');
  Route::post('/logout', 'SuperadminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'SuperadminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'SuperadminAuth\RegisterController@register');

  Route::post('/password/email', 'SuperadminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'SuperadminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'SuperadminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'SuperadminAuth\ResetPasswordController@showResetForm');
});
