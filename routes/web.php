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
Route::get('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{sub_section_id}/drop-down/create','ReadingSubsectionDropDownController@create')->name('reading.sub-section.dropdown.create');

/*this is for the exam test controller*/
/*----admin controller-----*/

//admin home
    Route::get('/admin','AdminController@index')->name('admin');

/*admin test start*/

    Route::get('/admin/test-list','TestListController@index')->name('test_list');

    Route::get('/admin/test','TestController@index')->name('createTestPage');

    Route::post('/admin/test','TestController@create')->name('createTest');

    //this for adding exam to test

/* creating exam steps */

    //reading steps

    Route::get('/admin/create-reading','AdminReadingTestController@createPage')->name('createReadingIndex');

    Route::post('/admin/create-reading','AdminReadingTestController@create')->name('createReading');

    //show all the steps

    Route::get('/admin/show-all-steps','AllStepsController@index')->name('showAllSteps');

        /* section for the reading exam*/



        //showing a specific section
        Route::post('/admin/show-all-steps/add-section/{reading_id}/update-section/{section_id}','ReadingSectionController@update')->name('reading.updatePost.section');

        Route::get('/admin/show-all-steps/add-section/{reading_id}/update-section/{section_id}','ReadingSectionController@updateSection')->name('reading.update.section');

        Route::get('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}','ReadingSectionController@showSection')->name('reading.show.section');

        Route::get('/admin/show-all-steps/add-section/{reading_id}','ReadingSectionController@index')->name('reading.add-section');

        Route::get('/admin/show-all-steps/add-section/{reading_id}/form','ReadingSectionController@sectionForm')->name('reading.section-form');

        Route::post('/admin/show-all-steps/add-section/{reading_id}/form','ReadingSectionController@create')->name('reading.section-form.create');
            /*sub sections for readin exam */
                Route::get('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/create','ReadingSubSectionController@create')->name('reading.sub-section.create');
                Route::post('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/create','ReadingSubSectionController@store')->name('reading.sub-section.store');

                    /*start dropdown for sub-section*/

                        Route::get('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{sub_section_id}/drop-down/create','ReadingSubsectionDropDownController@create')->name('reading.sub-section.dropdown.create');
                        Route::post('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{sub_section_id}/drop-down/create','ReadingSubsectionDropDownController@store')->name('reading.sub-section.dropdown.store');



                    /*end dropdown for sub-section*/


                    /*start question for */

                        Route::get('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/drop-down','ReadingSubsectionQuestionController@index')->name('reading.sub-section.question.index');
                        Route::post('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/drop-down','ReadingSubsectionQuestionController@addDropDownTypeQuestion')->name('reading.sub-section.question.store');

                        /* checkbox start*/

                            Route::get('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/check-box','ReadingSubsectionQuestionController@checkboxIndex')->name('reading.sub-section.question.checkbox');
                            Route::post('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/check-box','ReadingSubsectionQuestionController@checkboxStore')->name('reading.sub-section.question.checkbox.store');

                        /*checkbox end*/
                            Route::get('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/radio','ReadingSubsectionQuestionController@radioIndex')->name('reading.sub-section.question.radio');

                        /*radio start*/


                        /*radion end*/

                    /*end question adding*/


            /*end of sub-section for reading exam*/

        /*end of section for reading exam */

        Route::get('check','ReadingSubsectionDropDownController@create')->name('check');




/* end exam steps*/

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

    Route::get('/admin/exam/exam-list/{exam_id}','ExamStepController@index')->name('ExamStepsIndex');

    //adding steps to reading

    Route::get('/admin/exam/exam-list/{exam_id}/reading-steps','ExamStepController@addReadingPage')->name('addReadingPage');

    Route::get('/admin/exam/exam-list/{exam_id}/reading-steps/{reading_id}','ExamStepController@addReadingToExam')->name('addReadingToExam');

    //update reading steps
    Route::get('/admin/exam/exam-list/{exam_id}/update-reading-steps','ExamStepController@updateReadingPage')->name('updateReadingPage');

    Route::get('/admin/exam/exam-list/{exam_id}/reading/{reading_id}','ExamStepController@updateReadingToExam')->name('updateReadingToExam');






/*end admin exam controller  */






/*======end admin controller========*/


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','HomeController@welcome')->name('welcome');
