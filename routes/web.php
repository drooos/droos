<?php
// auth routs <login - signup>
Auth::routes();
//default route logic "not finished"
Route::get  ('/'                            , function () {return view('layout');}      );
// routes for accounts
Route::get  ('/home'                        , 'users@redirectUser'                      );
Route::post ('/home/ChangePic'             , 'HomeController@ChangePic'                 );
Route::post ('Profile/Edit'                 , 'HomeController@updateTeacher'            );
Route::get  ('Profile'                      , 'users@redirectUser'                      );
Route::get  ('/logout'                      , 'users@logout'                            );
//parent modules
Route::view ('parent/linkSon'               , 'parentModules.link_son'                  )->middleware('parent');
Route::post ('parent/linkSon'               , 'parents@link_parent_to_son'              )->middleware('parent');
Route::post ('parent/finishLink'            , 'parents@finish_link'                     )->middleware('parent');
Route::get  ('parent/mySons'                , 'parents@parent_sons'                     )->middleware('parent');
Route::get  ('sons/timeTable/{studentId}'   , 'course@get_sons_time_table'               )->middleware('parent');
//teacher modules
Route::get  ('teacher/addCourse'            , 'course@get_new_course_form'              )->middleware('teacher');
Route::get  ('teacher/TimeTabel'            , 'course@get_my_time_table'                )->middleware('teacher');
Route::post ('teacher/addCourse'            , 'course@add_new_course'                   )->middleware('teacher');
Route::get  ('teacher/teacherCourses'       , 'course@get_my_courses'                   )->middleware('teacher');
Route::get  ('teacher/courses/addGroup/{id}', 'course@go_to_add_group_form'             )->middleware('teacher');
Route::post ('teacher/courses/addGroup'     , 'course@add_new_group'                    )->middleware('teacher');
//coures modules
Route::get  ('course/show/{id}'             , 'course@get_course_full_details_by_Id'    );
Route::get  ('course/groups/pending'        , 'course@get_pending_requests_for_teacher' )->middleware('teacher');
Route::post ('course/show/addmaterial'      , 'course@addMaterial'                      )->middleware('teacher');    ///////////////
Route::get  ('/section/new/{id}'            , 'section@create_new_section'              )->middleware('teacher');
Route::post ('/section/takeAttendance'      , 'section@take_attendance'                 )->middleware('teacher');
Route::get  ('/group/{action}/{id}/{group}' , 'group@action_on_pending_account'         )->middleware('teacher');
Route::get  ('course/{id}'                  , 'course@get_course_details_with_groups'   );
//admin routs
Route::get  ('manage_users'                 , 'admin@getPending'                        )->middleware('admin');
Route::post ('manage_users'                 , 'admin@verifyAccount'                     )->middleware('admin');
//student modules
Route::get  ('student/parent'               , 'student@get_my_parent'                   )->middleware('student');
Route::get  ('student/timeTable'            , 'course@get_student_time_table'           )->middleware('student');
Route::get  ('student/courses'              , 'course@get_student_courses'              )->middleware('student');
Route::get  ('student/course/{id}/leave'    , 'group@student_leave_group_by_group_id'   )->middleware('student');
Route::get  ( 'student_course_show'         , 'course@getstudentscourses'               )->middleware('student');
Route::get  ( 'allcourses'                  , 'course@getallcourses'                    );
Route::get  ('student/join/course/{id}'     , 'student@joinGroup'                       )->middleware('student'); ///////////////////////
// testing routs
Route::get  ('testc'                        , 'users@getInfoForActiveUser'              );
Route::view ('test'                         , 'courses.teacherShowCourse'               );
Route::get('signup',function(){
    return view('auth.register');});
//Profile
Route::get  ('/profile/{id}'                , 'users@VisitProfile'                      )->middleware('auth');