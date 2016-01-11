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
//Route belongs to ViewTraineeReportController
Route::get('select_training', 'ViewTraineeReportController@select_training');
Route::get('select_course/{training_id}', 'ViewTraineeReportController@select_course');
Route::get('view_trainee_report/{course_id}', 'ViewTraineeReportController@view_trainee_report');
Route::get('/view_health_report/{id}', 'ViewTraineeReportController@healthInfos');
Route::get('/view_single_report/{id}', 'ViewTraineeReportController@healthView');
Route::get('/trainingId/{id}', 'ViewTraineeReportController@trainer_by_training_id');
Route::get('/trainersFeedback/{id}', 'ViewTraineeReportController@trainersFeedback');
Route::get('admin/yearly_report', 'ViewTraineeReportController@yearly_report');

//Route belongs to SliderController  by polo dev
Route::get('slider/all', 'SliderController@slider_index');
Route::get('slider/create', 'SliderController@upload_slider_image');
Route::post('slider/create', 'SliderController@slider_image_store');
Route::post('slider/{id}/delete', 'SliderController@destroy');
Route::post('increase_slider_position/{position}', 'SliderController@increase_slider_position');
Route::post('decrease_slider_position/{position}', 'SliderController@decrease_slider_position');

//Route belongs to BardFrontendController by polo dev
Route::get('/', 'BardFrontendController@index');
Route::get('/trainingss', 'BardFrontendController@trainings');
Route::get('/faculty', 'BardFrontendController@faculty');
Route::get('/about', 'BardFrontendController@about');
Route::get('yearly_report', 'BardFrontendController@yearly_report');

//Route belongs to BardNewsletterController by polo dev
Route::get('/clients/create_newsletter', 'BardNewsletterController@create_newsletter');
Route::post('/clients/create_newsletter', 'BardNewsletterController@newsletter_save_and_send');
//Route belongs to BardCourseController by polo dev
Route::get('/clients', 'BardClientsController@index');
Route::get('admin/clients', 'BardClientsController@admin_clients');
Route::get('/clients/create', 'BardClientsController@create');
Route::post('/clients/create', 'BardClientsController@store');
Route::get('/clients/{id}', 'BardClientsController@show');
Route::get('/clients/{id}/edit', 'BardClientsController@edit');
Route::post('/clients/{id}/edit', 'BardClientsController@update');
Route::post('/clients/{id}/delete', 'BardClientsController@destroy');
//UsersController by polo dev
Route::get('/user/registration', 'UsersController@show_user_registration_form');
Route::post('/user/registration', 'UsersController@store_user_and_assign_role_to_them');
Route::get('/user/create_user_role', 'UsersController@create_user_role');
Route::post('user/create_user_role', 'UsersController@store_user_role');
Route::get('/user/all', 'UsersController@all_user');
Route::get('/user/single/{id}', 'UsersController@single_user');
Route::get('/user/single/{id}/edit', 'UsersController@edit_user');
Route::post('/user/single/{id}/edit', 'UsersController@update_user');
Route::post('/user/single/{id}/delete', 'UsersController@deleteUser');
Route::post('/user/search', 'UsersController@user_search');
//for redirection after login
Route::get('/redirection_page', 'UsersController@redirection_page');

//route belongs to CoursePublicController by papia
Route::get('/public_courses', 'CoursePublicController@index');
Route::get('/public_courses/{id?}', 'CoursePublicController@show');
//file created by Shameem
Route::get('notallowed/{role}', 'UsersController@not_allowed');

//auth route
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);





//Route belongs to RegistrationController by Hasib
Route::resource('registration','RegistrationController');
Route::resource('calendar','CalenderController');
Route::resource('exam','ExamController');

Route::resource('/marksheet','MarkSheetController');
Route::get('marksheet/{id?}/{courseId?}/traineesOfThatExam','MarkSheetController@getTrainee');
Route::get('listOfstudentsAndMarks/{id?}','MarkSheetController@listOfstudentsAndMarks');
Route::get('MarksheetAdmin/{id?}/listTraineesForMarks','MarksheetAdminController@index');
Route::get('marksheetTrainee/{id?}/all','MarksheetTraineeController@index');
Route::resource('marksheetAdmin','MarksheetAdminController');


Route::resource('/traineeCourse','traineeCoursesController');
//Route::get('/traineeCourse','traineeCoursesController@index');
Route::get('selectTraining','traineeCoursesController@selectTraining');
Route::get('traineeCourse/{id?}/training','traineeCoursesController@selectTrack');
Route::get('track/{courseId?}/{TrainingId?}','traineeCoursesController@create');

Route::resource('/trainer_course','TrainerCourseController');
Route::resource('user_traininginfo','UserTrainingController');

Route::get('public_journal','publicJournalController@index');
Route::get('public_journal/{id?}/Volumes','publicJournalController@Volumes');
Route::get('Volume/{id?}/issues','publicJournalController@issues');
Route::get('file/{id?}/list','publicJournalController@file');
Route::get('public_project','publicJournalController@public_project');
Route::get('public_modules/{id?}/details','publicJournalController@public_modules');
Route::get('public_category','publicJournalController@public_category');
Route::get('public_book/{id?}/details','publicJournalController@public_book');
Route::get('calendar_public','publicJournalController@calendar_public');

Route::resource('BARD_journal','JournalController');
Route::resource('volume','VolController');
Route::resource('issue','IssueController');
Route::resource('file','FileController');
Route::resource('project','ProjectsController');
Route::resource('BARD_modules','ModulesController');
Route::resource('/category','CategoryController');
Route::resource('/BARD_book','BookController');



//Route belongs to HealthController by Sajib
Route::get('/UserHealthCreate', 'HealthController@create');
Route::post('/UserHealthCreate', 'HealthController@store');
Route::get('/UserHealthInfos', 'HealthController@index');
Route::get('/UserHealthInfo/{id?}', 'HealthController@show');
Route::get('/UserHealthInfo/{id?}/edit', 'HealthController@edit');
Route::post('/UserHealthInfo/{id?}/edit', 'HealthController@update');


//route belongs to arif
//for trainings
//route belongs to TrainingsController by arif
Route::get('/training_info', 'TrainingsController@training_info');
Route::post('/training_info', 'TrainingsController@store');
Route::get('/trainings', 'TrainingsController@index');
Route::get('/training_status/{id?}','TrainingsController@statusUpdate');
//Route::post('/training/{id?}','TrainingsController@active_status_update');
//Route::post('/training/{id?}','TrainingsController@inactive_status_update');
Route::get('/training/{id?}', 'TrainingsController@show');
Route::get('/training/{id?}/edit','TrainingsController@edit');
Route::post('/training/{id?}/edit','TrainingsController@update');
Route::get('/training/{id?}/delete','TrainingsController@destroy');
//Route::post('/training/{id?}/delete','TrainingsController@destroy');

//for training public pages
Route::get('/public_trainings', 'TrainingsController@publicIndex');
Route::get('/public_training/{id?}', 'TrainingsController@publicShow');


//for announcement for AnnouncementController
Route::get('/announcement_create', 'AnnouncementController@announcement');
Route::post('/announcement_create', 'AnnouncementController@store');
Route::get('/announcements', 'AnnouncementController@index');
Route::get('/announcement/{id?}', 'AnnouncementController@show');
Route::get('/announcement/{id?}/edit','AnnouncementController@edit');
Route::post('/announcement/{id?}/edit','AnnouncementController@update');
Route::get('/announcement/{id?}/delete','AnnouncementController@destroy');
//for public announcement pages
Route::get('/public_announcements', 'AnnouncementController@publicIndex');
Route::get('/public_announcement/{id?}', 'AnnouncementController@publicShow');

//routes belong to Testimonial
Route::get('/create_testimonial', 'TestimonialController@create');
Route::post('/create_testimonial', 'TestimonialController@store');
Route::get('/testimonials', 'TestimonialController@show');
Route::post('/training_testimonial/{id?}/delete','TestimonialController@destroy');

//routes belong to FAQs
Route::get('/create_frequently_asked_question', 'FAQsController@create');
Route::post('/create_frequently_asked_question', 'FAQsController@store');
Route::get('/frequently_asked_questions', 'FAQsController@adminList');
Route::get('/frequently_asked_question/{id?}/edit', 'FAQsController@edit');
Route::post('/frequently_asked_question/{id?}/edit', 'FAQsController@update');
Route::get('/frequently_asked_question/{id?}/delete', 'FAQsController@destroy');

//for attendance
//for attendance (monitor or trainer
Route::get('/attendance_preform', 'AttendanceController@preform_fill');
Route::post('/attendance_preform', 'AttendanceController@show_attendance_form_function');
Route::post('/attendance_create', 'AttendanceController@store_attendance');
Route::post('/editattendance', 'AttendanceController@editAttendance');
Route::post('/updateattendance', 'AttendanceController@updateAttendance');
//for admin
//Route::get('/contact', ['middleware'=>'auth','users'=>'TicketsController@store']);

//Route::get('/AdminAttendanceFill/{course_id?}', ['middleware'=>'admin','users'=>'AttendanceController@AdminAllAttendance']);
/*//Route::get('/AdminAttendanceShowTrainee/{course_id}/{session_name}/{date}', ['middleware'=>'admin','users'=>'AttendanceController@AdminAttendanceShowTrainee']);
Route::post('/AdminDateAttendanceView', ['middleware'=>'admin','users'=>'AttendanceController@showDateAdminAttendance']);
Route::get('/DateWiseAttendance/{course_id}/{session_name}/{date}', ['middleware'=>'admin','user'=>'AttendanceController@DateWiseAttendance']);
*/
Route::get('/AdminAttendanceFill/{course_id?}','AttendanceController@AdminAllAttendance');
Route::get('/AdminAttendanceShowTrainee/{course_id}/{session_name}/{date}', 'AttendanceController@AdminAttendanceShowTrainee');
Route::post('/AdminDateAttendanceView', 'AttendanceController@showDateAdminAttendance');
Route::get('/DateWiseAttendance/{course_id}/{session_name}/{date}', 'AttendanceController@DateWiseAttendance');

//route belongs to Hasan vai
Route::get('/trainee_create', 'InfosController@create');
Route::post('/trainee_create', 'InfosController@store');
Route::get('/trainees', 'InfosController@index');
//Route::get('/trainee_show/{id?}/edit', 'InfosController@show');
//Route::post('/trainee_show/{id?}/edit','InfosController@update');
Route::get('/trainee', 'InfosController@traineeHome');
//Route::get('trainee',function(){
//    return view(('trainee.trainee'));
//});
/*Route::get('trainee',function(){
    $info = Info::whereId($id)->firstOrFail();
    return view('trainee.trainee', compact('info'));
});
*/

Route::get('trainee_profile/{id?}/show_profile', 'InfosController@show_profile');
Route::get('trainee_profile/{id?}/edit_profile','InfosController@edit_profile');
Route::post('trainee_profile/{id?}/edit_profile','InfosController@update_profile');


//route belongs to TrainersController by Hasan vai
Route::get('/trainer_create', 'TrainersController@create');
Route::post('/trainer_create', 'TrainersController@store');
Route::get('/trainers', 'TrainersController@index');
Route::get('/trainer_show/{id?}', 'TrainersController@show');
Route::get('/trainer_show/{id?}/edit','TrainersController@edit');
Route::post('/trainer_show/{id?}/edit','TrainersController@update');

/*Route::get('trainer',function(){
    return view(('trainer'));
});*/

Route::get('/trainer', 'TrainersController@trainerHome');
//Route::get('trainer',function(){
//    return view(('trainer'))->with('trainer', 'active');
//});

// health info edit by trainer
Route::get('/trainingsList', 'TrainersController@trainings');
Route::get('/trainingsCourse', 'TrainersController@trainingsCourse');
Route::get('/traineeReport/{course_id}', 'TrainersController@view_trainee_report');
Route::get('/traineeReportView/{trainee_id}', 'TrainersController@healthView');
Route::get('/traineeHealthInfo/{id?}/edit', 'TrainersController@editHealth');
Route::post('/traineeHealthInfo/{id?}/edit', 'TrainersController@updateHealth');

//info update in trainer panel

Route::get('/trainees_info/{trainer_id}', 'TrainersController@trainees_info');
Route::get('show_info/{id?}/show_profile', 'TrainersController@show_info');
Route::get('update_info/{id?}/edit_profile','TrainersController@edit_info');
Route::post('update_info/{id?}/edit_profile','TrainersController@update_info');


//for Trainer Profile CRUD in Admin by 5 apaches


//Route::get('/trainer_create', 'AdminTrainersController@create');
//Route::get('/trainers', 'AdminTrainersController@index');
//Route::get('/trainer_show/{id?}/edit','AdminTrainersController@edit');
//Route::post('/trainer_show/{id?}/edit','AdminTrainersController@update');

Route::get('/adminTrainer_create', 'AdminTrainersController@adminCreate');
Route::post('/adminTrainer_create', 'AdminTrainersController@adminStore');
Route::get('/adminTrainers', 'AdminTrainersController@adminIndex');
Route::get('/admin_trainer_show/{id?}', 'AdminTrainersController@admin_trainer_show');
Route::get('/admin_trainer_show/{id?}/edit','AdminTrainersController@adminEdit');
Route::post('/admin_trainer_show/{id?}/edit','AdminTrainersController@adminUpdate');






//route belongs to ContactController by shamim
Route::get('/contact', 'ContactController@showForm');
Route::post('/contact', 'ContactController@store');

// routes for feedback
Route::get('/feedbackCreate', 'FeedbacksController@create');
Route::post('/feedbackCreate', 'FeedbacksController@store');



//route belongs to CourseController by localhost
Route::get('/create_course', 'CourseController@create');
Route::post('/create_course', 'CourseController@store');
Route::get('/courses', 'CourseController@index');
Route::get('/courses/{id?}', 'CourseController@show');
Route::get('/courses/{id?}/edit','CourseController@edit');
Route::post('/courses/{id?}/edit','CourseController@update');
Route::post('/courses/{id?}/delete','CourseController@destroy');



//AdminPanel Demo View With test work(Sajib)
Route::get('master', ['middleware'=>'admin',function () {
    return view('admin.layouts.master');
}]);


//Route::get('/feedbackView',['middleware'=>'admin','uses'=>'AdminController@feedbackIndex']);
//Route::get('/feedbackInfo/{id?}', ['middleware'=>'admin', 'uses'=>'AdminController@feedbackShow']);

Route::get('/healthCreate', 'AdminController@create');
Route::post('/healthCreate', 'AdminController@store');
Route::get('/adminHealthInfos', 'AdminController@index');


//attendance by 5 apaches

//Route::get('/UserHealthCreate', 'AdminController@create');
//Route::post('/UserHealthCreate', 'AdminController@store');
//Route::get('/UserHealthInfos', ['middleware'=>'admin','uses'=>'AdminController@index']);
//Route::get('/UserHealthInfo/{id?}',['middleware'=>'admin','uses'=>'AdminController@show']);
//Route::get('/UserHealthInfo/{id?}/edit', 'AdminController@edit');
//Route::post('/UserHealthInfo/{id?}/edit', 'AdminController@update');

//BARD   trainer

Route::get('/bardtrainer_create', 'BardTrainersController@create');
Route::post('/bardtrainer_create', 'BardTrainersController@store');
Route::get('/bardtrainers', 'BardTrainersController@index');
Route::get('/bardtrainer', 'BardTrainersController@faculty');
Route::get('/bardtrainer_show/{id?}', 'BardTrainersController@show');
Route::get('/bardtrainer_show/{id?}/edit','BardTrainersController@edit');
Route::post('/bardtrainer_show/{id?}/edit','BardTrainersController@update');
Route::get('/bardtrainer_show/{id?}/delete','BardTrainersController@destroy');

/*Route::get('bardtrainer',function(){
    return view(('bardtrainer'));
});
});*/
//routes by nirupam

Route::get('/show_trainee_list/{course_id}','AdminController@trainees_by_course_id');
Route::get('/trainee_view/{trainee_id?}', 'AdminController@trainee_by_user_id');

//by tahmina for trainer
Route::resource('/exam_create','ExamController@create');

//Route::get('/notallowed/{role?}','');

// Image gallery by tahmina
Route::get('/gallery','GalleryController@gallery');
Route::get('/gallery/img','GalleryController@img');
Route::get('/gallery/cafeteria','GalleryController@cafeteria');
Route::get('/gallery/tour','GalleryController@tour');
Route::get('/gallery/site','GalleryController@site');
Route::get('/gallery/traininging','GalleryController@traininging');
Route::get('/gallery/program','GalleryController@program');
//for course resourses by papia
Route::get('/resources','CourseResourcesController@create');
Route::post('/resources','CourseResourcesController@store');
Route::get('/allresources','CourseResourcesController@index');
Route::get('/allresources/{id?}/edit','CourseResourcesController@edit');
Route::get('/allresources/{id?}', 'CourseResourcesController@show');
Route::post('/allresources/{id?}/edit','CourseResourcesController@update');
Route::post('/allresources/{id?}/delete','CourseResourcesController@destroy');

//resource for trainee
Route::get('/allresources_trainee','CourseResourcesController@resource_list_for_trainee');
Route::get('/allresources_trainee/{course_resource_id}', 'CourseResourcesController@single_resource_for_trainee');

Route::get('aboutus',function(){
    return view('aboutus.functionss');
});

//route dfor forum by sanjida
Route::get('/forums', 'ForumController@forums');
Route::get('/forum_create', 'ForumController@create');
Route::post('/forum_create', 'ForumController@store');
Route::get('/forumIndex/{id}', 'ForumController@index');
Route::get('/forum_create/{id}', 'ForumController@create');
Route::post('/forum_create/{id}', 'ForumController@store');
Route::get('/forumInfos', 'ForumController@home');
Route::get('/forumInfos/{id?}', 'ForumController@show');
Route::get('/forumInfos/{id?}/edit', 'ForumController@edit');
Route::post('/forumInfos/{id?}/edit', 'ForumController@update');
// for comment
Route::post('/comment', 'CommentsController@newComment');
