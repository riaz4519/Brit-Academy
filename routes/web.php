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

        Route::get('/ad min/show-all-steps/add-section/{reading_id}/update-section/{section_id}','ReadingSectionController@updateSection')->name('reading.update.section');

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


                        /*radio start*/
                            Route::get('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/radio','ReadingSubsectionQuestionController@radioIndex')->name('reading.sub-section.question.radio');
                            Route::post('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/radio','ReadingSubsectionQuestionController@radioStore')->name('reading.sub-section.question.radio.store');



                        /*radion end*/

                        /*passage gap start*/

                            Route::get('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/passage-gap','ReadingSubsectionQuestionController@passageGapIndex')->name('reading.sub-section.question.passageGap');
                            Route::post('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/passage-gap','ReadingSubsectionQuestionController@passageGapStore')->name('reading.sub-section.question.passageGap.store');

                        /*passage gap end*/
                        /*passage gap start*/

                            Route::get('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/passage-drop-down','ReadingSubsectionQuestionController@passageDropDownIndex')->name('reading.sub-section.question.passageDrop');
                            Route::post('/admin/show-all-steps/add-section/{reading_id}/show-section/{section_id}/sub-section/{rsub_id}/question/passage-drop-down','ReadingSubsectionQuestionController@passageDropDownStore')->name('reading.sub-section.question.passageDrop.store');

                        /*passage gap end*/

                    /*end question adding*/


            /*end of sub-section for reading exam*/

        /*end of section for reading exam */

        /*start section for writing exam*/

            //create
            Route::get('admin/create-writing','AdminWritingTestController@create')->name('create.writing.index');
            Route::post('admin/create-writing','AdminWritingTestController@store')->name('create.writing.store');

                /*start writing section*/

                Route::get('admin/writing/{writing_id}/section','WritingSectionController@index')->name('writing.section.index');

                Route::get('admin/writing/{writing_id}/section/create','WritingSectionController@create')->name('writing.section.create');

                Route::post('admin/writing/{writing_id}/section/create','WritingSectionController@store')->name('writing.section.store');

                /*edit writing*/

                Route::get('admin/writing/{writing_id}/section/{section_id}/edit','WritingSectionController@edit')->name('writing.section.edit');

                /*edit store*/
                Route::post('admin/writing/{writing_id}/section/{section_id}/edit','WritingSectionController@update')->name('writing.section.edit.store');

                /*delete wsection*/
                Route::get('admin/writing/{writing_id}/section/{section_id}/delete','WritingSectionController@destroy')->name('writing.section.edit.delete');





/*end writing section*/






        /*end section for writing exam*/

        Route::get('check','checkController@check')->name('check');

/*starting listening test exam */

    /*create listening */
     Route::get('listening/create','ListeningController@create')->name('listening.create');
     Route::post('listening/create','ListeningController@store')->name('listening.store');

        /*start add sec*/

        Route::get('admin/listening/{listening_id}/section','ListeningSectionController@index')->name('listening.section.index');

        Route::get('admin/listening/{listening_id}/section/create','ListeningSectionController@create')->name('listening.section.create');

        Route::post('admin/listening/{listening_id}/section/create','ListeningSectionController@store')->name('listening.section.store');

            /*listening sub section */

            Route::get('admin/listening/{listening_id}/section/{section_id}/create','LsubSectionController@create')->name('listening.section.sub.create');
            Route::post('admin/listening/{listening_id}/section/{section_id}/create','LsubSectionController@store')->name('listening.section.sub.store');


            /*prefix for adding listening question and drop down*/

            Route::group(['prefix'=>'admin/listening/{listening_id}/section/{section_id}/sub-section/{sub_section_id}/'],function (){

                    /*adding fill in the gaps single line*/

                    Route::get('question_single_line_gap','LquestionController@single_line_index')->name('listening.sub.single_line_q');
                    Route::post('question_single_line_gap','LquestionController@single_line_store')->name('listening.sub.single_line_store');

                    /*adding table with two row and left answer*/
                    Route::get('question_table_two_row_left_ans','LquestionController@table_two_row_left_ans')->name('listening.sub.table_row_two_left_ans_create');
                    Route::post('question_table_two_row_left_ans','LquestionController@table_two_row_left_ans_store')->name('listening.sub.table_row_two_left_ans_store');
                    /*adding radio type with self option*/
                    Route::get('question_radio_type_self_option','LquestionController@radio_type_self_option_index')->name('listening.sub.radio_type_self_option_index');
                    Route::post('question_radio_type_self_option','LquestionController@radio_type_self_option_store')->name('listening.sub.radio_type_self_option_store');

                    /*adding dropdown left single line*/
                    Route::get('question_single_line_drop_down_left','LquestionController@single_line_drop_down_left_index')->name('listening.sub.single_line_drop_down_left_index');
                    Route::post('question_single_line_drop_down_left','LquestionController@single_line_drop_down_left_store')->name('listening.sub.single_line_drop_down_store');

                    /*adding three column drop down*/
                    Route::get('question_three_column_random_drop','LquestionController@question_three_column_random_drop_index')->name('listening.sub.three_column_drop_down_random_index');
                    Route::post('question_three_column_random_drop','LquestionController@question_three_column_random_drop_store')->name('listening.sub.three_column_drop_down_random_store');

                    /*starting just answer model*/
                    Route::get('question_create_single_field_answer','LquestionController@single_label_answer_index')->name('listening.sub.single_label_answer_create');
                    Route::post('question_create_single_field_answer','LquestionController@single_label_answer_store')->name('listening.sub.single_label_answer_store');

                    /*single line with right gap */
                    Route::get('single_line_right_gap','LquestionController@single_line_right_gap_index')->name('listening.sub.single_line_right_gap_index');
                    Route::post('single_line_right_gap','LquestionController@single_line_right_gap_store')->name('listening.sub.single_line_right_gap_store');

                    /*single line with right gap */
                    Route::get('table_row_two_right_list_item','LquestionController@table_row_two_right_list_item_index')->name('listening.sub.table_row_two_right_list_item_index');
                    Route::post('single_line_right_gap','LquestionController@table_row_two_right_list_item_store')->name('listening.sub.table_row_two_right_list_item_store');





                /*start adding subsection drop down*/
                Route::get('create_drop_down','LsubsectiondropController@create')->name('listening.sub.drop.create');
                Route::post('create_drop_down','LsubsectiondropController@store')->name('listening.sub.drop.store');

                /*starting 3 column table with random drop down*/
                Route::get('create_drop_down_three_column_random','LsubThreeColumnTableDropdownController@create')->name('listening.sub.three_column_drop_create');
                Route::post('create_drop_down_three_column_random','LsubThreeColumnTableDropdownController@store')->name('listening.sub.three_column_drop_store');





            });













/*end listening sub section*/







        /*end add sec*/


/*end listening test exam */




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


/////////////////////////////////////////// Student ////////////////////////////////
/*start with student controller*/


Route::group(['prefix' => 'tests-library/'],function (){

    Route::get('{test_name}','StudentAllTestController@index')->name('test-library.index');
    Route::get('tests-room/{test_id}','StudentAllTestController@test_room')->name('test-library.test_room');
    Route::get('tests-room/take-reading-test/{test_id}','StudentAllTestController@take_test')->name('test-library.test.take-reading-test');

    Route::group(['prefix'=>'exam/'],function (){


        /*listening*/
        Route::get('listening/{listening_id}','StudentListeningExamController@index')->name('test-library.exam.listening-exam');
        Route::post('listening/{listening_id}','StudentListeningExamController@exam_finish')->name('test-library.exam.listening-exam.finish');

        /*writing*/

        Route::get('writing/{writing_id}','StudentWritingExamController@index')->name('test.library.exam.listening-exam');
        Route::post('writing/{writing_id}/{section_id}','StudentWritingExamController@finish')->name('test.library.exam.listening-exam.finish');



        /*reading*/
        Route::get('reading/{reading_id}','StudentReadingExamController@index')->name('test.library.exam.reading-exam');
        Route::post('reading/{reading_id}','StudentReadingExamController@finish')->name('test.library.exam.reading-exam.finish');



    });


});


/*end of student controller*/

////////////////////////////////////////////End student ///////////////////////////
/*give test for check*/
Route::get('/tests/exam','ExamForTestPurpose@index')->name('test.exam');
Route::get('/tests/exam/{reading_id}/give','ExamForTestPurpose@give')->name('test.give.index');
Route::post('/submit','ExamForTestPurpose@post')->name('post');


/*end */






/*======end admin controller========*/


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','HomeController@welcome')->name('welcome');
