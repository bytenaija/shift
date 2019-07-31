<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/questions', 'QuestionsController@index')->name('questions.index');

Route::post('/questions', 'QuestionsController@store')->name('questions.store');

Route::get('/questions/{question}', 'QuestionsController@show')->name('questions.show');

Route::put('/questions/{question}', 'QuestionsController@update')->name('questions.update');

Route::delete('/questions/{question}', 'QuestionsController@destory')->name('questions.destroy');



Route::get('/answers', 'AnswersController@index')->name('answers.index');

Route::post('/answers', 'AnswersController@store')->name('answers.store');

Route::get('/answers/{task}', 'AnswersController@show')->name('answers.show');

Route::put('/answers/{task}', 'AnswersController@update')->name('answers.update');

Route::delete('/answers/{task}', 'AnswersController@destory')->name('answers.destroy');