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



    Auth::routes();

/*this is for the exam test controller*/
/*----admin controller-----*/

//admin home
    Route::get('/admin','AdminController@index')->name('admin');

/*admin test start*/

    Route::get('/admin/test-list','TestListController@index')->name('test_list');

    Route::get('/admin/test','TestController@index')->name('createTestPage');

    Route::post('/admin/test','TestController@create')->name('createTest');

    //this for adding exam to test

        Route::get('/admin/test/add/{id}','ExamAddingToTestController@index')->name('addingExamToTest');
        Route::get('/admin/test/add/{id}/{examId}','ExamAddingToTestController@addExam')->name('addingExamToTestSend');
    //this is for showing the tests exam which are added to test and also operations
        Route::get('admin/test/{id}/exams','AddedExamsOperationController@index')->name('addedExamsHome');
        Route::get('admin/test/{id}/exams/{exam_id}','AddedExamsOperationController@remove')->name('addedExamRemove');



/*admin test end*/

/*start admin exam controller  */

    Route::get('/admin/exam/','ExamController@index')->name('examIndex');

    Route::get('/admin/exam/create','ExamController@createPage')->name('examCreatePage');

    Route::post('/admin/exam/create','ExamController@createExam')->name('createExam');

    Route::get('/admin/exam/exam-list','ExamController@examList')->name('examList');

    //show exams steps like listening , reading , writing

    

/*end admin exam controller  */






/*======end admin controller========*/


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','HomeController@welcome')->name('welcome');
