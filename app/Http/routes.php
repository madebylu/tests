<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('home', function() {
    return view('home');
});

Route::get('auth_failure', function() {
    return view('nope');
});

Route::group(['middleware' => ['auth']], function() {

    //quiz routes
    Route::get('quiz/add', 'QuizController@create');
    Route::get('quiz/index', 'QuizController@index');
    Route::get('quiz/view/{id}', 'QuizController@show');
    Route::post('quiz/store', 'QuizController@store');
    Route::get('quiz/edit/{id}', 'QuizController@edit');
    Route::post('quiz/update/{id}', 'QuizController@update');
    Route::post('quiz/validate_code/{code}', 'QuizController@validate_code');

    
    //question routes
    Route::get('question/view/{id}', 'QuestionController@show');
    Route::get('question/add/{quiz_id}', 'QuestionController@create');
    Route::get('question/add_draggable/{quiz_id}', 
        'QuestionController@create_draggable');
    Route::post('question/store/{quiz_id}', 'QuestionController@store');
    Route::post('question/store_draggable/{quiz_id}', 
        'QuestionController@store_draggable');
    Route::get('question/edit/{id}', 'QuestionController@edit');
    Route::post('question/update/{id}', 'QuestionController@update');
    Route::get('question/delete/{id}', 'QuestionController@destroy');
    
    // answer routes
    Route::get('answer/add/{question_id}', 'AnswerController@create');
    Route::post('answer/store/{question_id}', 'AnswerController@store');
    Route::get('answer/edit/{id}', 'AnswerController@edit');
    Route::post('answer/update/{id}', 'AnswerController@update');
    Route::get('answer/delete/{id}', 'AnswerController@destroy');
    
    //draggable  routes
    Route::get('draggable/add/{question_id}', 'DraggableController@create');
    Route::post('draggable/add/{question_id}', 'DraggableController@store');
    Route::get('draggable/edit/{id}', 'DraggableController@edit');
    Route::post('draggable/update/{id}', 'DraggableController@update');
    Route::get('draggable/delete/{id}', 'DraggableController@destroy');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//quiz routes
Route::get('quiz/sit/{id}', 'QuizController@sit');
Route::get('quiz/code_redirect/{code}', 'QuizController@code_redirect');


