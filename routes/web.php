<?php
// auth routs <login - signup>
Auth::routes();

//default route logic "not finished"
Route::get  ('/'                            , function () {return view('layout');}      );

// routes for accounts
Route::get  ('/home'                        , 'users@redirectUser'                      );
Route::post ('/home/ChangePic'              , 'HomeController@ChangePic'                );
Route::post ('Profile/Edit'                 ,'HomeController@updateTeacher'             );
Route::get  ('/logout'                      , 'users@logout'                            );

//parent modules
Route::view ('parent/linkSon'               , 'parentModules.link_son'                  );
Route::post ('parent/linkSon'               , 'Parents@link_parent_to_son'              );
Route::post ('parent/finishLink'            , 'Parents@finish_link'                     );
Route::get  ('parent/mySons'                , 'parents@parent_sons'                     );
// time table
Route::get  ('timeTable'                    ,function(){return view('timeTable.timeTable');});

//teacher modules
Route::get  ('teacher/addCourse'            , 'Course@get_new_course_form'              );
Route::get  ('teacher/TimeTabel'            , 'Course@get_my_time_table'                );
Route::post ('teacher/addCourse'            , 'Course@add_new_course'                   );
Route::get  ('teacher/teacherCourses'       , 'Course@get_my_courses'                   );
Route::get  ('teacher/courses/addGroup/{id}', 'Course@go_to_add_group_form'             );
Route::post ('teacher/courses/addGroup'     , 'Course@add_new_group'                    );

//coures modules
Route::get  ('course/show/{id}'             , 'course@get_course_full_details_by_Id'    );
Route::post ('course/show/addmaterial'      , 'course@addMaterial');    ///////////////
Route::get  ('/section/new/{id}'            , 'section@create_new_section'              );
Route::post ('/section/takeAttendance'      , 'section@take_attendance'                 );

//admin routs
Route::get  ('manage_users'                 , 'admin@getPending'                        );
Route::post ('manage_users'                 , 'admin@verifyAccount'                     );

//student modules
Route::get  ('student/parent'               , 'student@get_my_parent'                   );
Route::get  ('student/join/course/{id}'     , 'student@joinGroup'); ///////////////////////

// testing routs
Route::get  ('testc'                        , 'users@getInfoForActiveUser'              );
Route::view ('test'                         , 'courses.teacherShowCourse'               );

//Profile
Route::get  ('/profile/{id}'                , 'users@VisitProfile'                      );

