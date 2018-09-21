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

// Route::get('/', function () {
//     return view('pages.admin');
// });

Route::get('/', 'PagesController@index');
Route::get('/dashboard', 'PagesController@dashboard');
Route::get('/user', 'PagesController@user');
Route::get('/courses', 'PagesController@course');
Route::get('/announcement', 'PagesController@announcement');
Route::get('/my', 'PagesController@profile');
Route::get('/home', 'PagesController@home');
// Route::get('topic/course/{id}', 'TopicsController@getCourseID');
Route::get('/topicback/{id}', 'TopicsController@showback');
Route::get('/subtopic/create/{id}', 'SubTopicsController@create')->name('subtopic.create');
Route::get('/subquiz/create/{id}', 'SubQuizesController@create')->name('subquiz.create');
Route::get('/topicquiz/create/{id}', 'TopicQuizesController@create')->name('topicquiz.create');
Route::get('/topic/create/{id}', 'TopicsController@create')->name('topic.create');
Route::get('/quiz/create/{id}', 'QuizesController@create')->name('quiz.create');

Route::post('courses/{id}', 'CoursesController@enable');
Route::post('course/createajax', 'CoursesController@createajax');
Route::post('notes/ajaxupdate', 'NotesController@ajaxupdate');
Route::post('course/publish', 'CoursesController@publish');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('courses', 'CoursesController');
Route::resource('announcements', 'AnnouncementsController');
Route::resource('notes', 'NotesController');
Route::resource('content', 'CourseContentController');
Route::resource('quiz', 'QuizesController', ['except' => ['create']]);
Route::resource('topic', 'TopicsController', ['except' => ['create']]);
Route::resource('subtopic', 'SubTopicsController', ['except' => ['create']]);
Route::resource('subquiz', 'SubQuizesController', ['except' => ['create']]);
Route::resource('topicquiz', 'TopicQuizesController', ['except' => ['create']]);
Route::resource('notes', 'NotesController');
Route::resource('newsfeed', 'NewsfeedsController');
Route::resource('user', 'UsersController');