<?php



Route::get('/', function () {
    return view('welcome');
});
// User
Route::group(['as' => 'client.', 'middleware' => ['auth']], function () {

    Route::get('req03', 'Req03Controller@index')->name('req03');
    Route::post('req03', 'Req03Controller@reco')->name('req03.reco');
    Route::get('home', 'HomeController@redirect');
    Route::get('recfacial', 'RecfacialController@index')->name('recfacial');
    Route::post('recfacial', 'RecfacialController@reco')->name('recfacial.reco');
    Route::get('dashboard', 'HomeController@index')->name('home');
    Route::get('change-password', 'ChangePasswordController@create')->name('password.create');
    Route::post('change-password', 'ChangePasswordController@update')->name('password.update');


    Route::get('start-test', 'TestsController@start')->name('starttest');
    Route::post('check-marqueds/{id}', 'TestsController@checkMarqueds')->name('checkMarqueds');
    Route::get('test', 'TestsController@index')->name('test');
    Route::post('test', 'TestsController@store')->name('test.store');
    Route::get('finish-exam/{id}', 'TestsController@finish')->name('test.finish');
    Route::get('results/{result_id}', 'ResultsController@show')->name('results.show');
    Route::get('send/{result_id}', 'ResultsController@send')->name('results.send');
});

Auth::routes();
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');



    Route::resource('quizz', 'QuizzController');
    Route::get('quizz-result/{id}','QuizzController@results')->name('quizz.result');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionsController');

    // Options
    Route::delete('options/destroy', 'OptionsController@massDestroy')->name('options.massDestroy');
    Route::resource('options', 'OptionsController');

    // Results
    Route::delete('results/destroy', 'ResultsController@massDestroy')->name('results.massDestroy');
    Route::resource('results', 'ResultsController');

    //BLOCAPP
    Route::get('blocapp', 'BlocappController@index')->name('blocapp');
    Route::get('blocapp-results/{id}', 'BlocappController@results')->name('blocappresults');
    Route::get('blocapp-apps/', 'BlocappController@resultsapps')->name('blocappresultsapps');
    //Route::resource('resultsb', 'BlocappController@results');

//    Route::get('/admin/blocapp', function () {
//        return view('blocapp.index');
Route::post('recognitions/req05', 'RecognitionController@recognitions')->name('recognitions');
    
Route::get('recognitions/req05', 'RecognitionController@req05')->name('recognitions.req05');
Route::delete('recognitions/req05/{id}', 'RecognitionController@destroy')->name('recognitions.destroy');
});
