<?php
Auth::routes();
Route::get('/', function(){
	return view('welcome');
});
//ProfileController
Route::Resource('profiles','ProfileController');
Route::get('logout','ProfileController@logout');
Route::post('dashboard','ProfileController@verify');
Route::get('/home', 'ProfileController@home')->middleware('roles');
//UserController
Route::resource('users','UserController')->except('delete');
Route::get('delete-users/{id}','UserController@destroy');
//RoleController
Route::Resource('roles','RoleController');
//PermissionController
Route::Resource('permissions','PermissionController')->except('create','store');
Route::get('add-permissions/{id}','PermissionController@create');
Route::post('save-permissions/{id}','PermissionController@store');
//TeamController
Route::Resource('teams','TeamController')->except('delete');
Route::get('delete-teams/{id}','TeamController@destroy');
Route::get('leader/{id}','TeamController@leader');
Route::get('team_details/{id}','TeamController@team');
//Member Controller
Route::Resource('members','MemberController')->except('index','store','create','destroy');
Route::get('delete-member/{id}','MemberController@destroy');
Route::get('team-members/{id}', 'MemberController@index');
Route::get('add-members/{id}','MemberController@create');
Route::post('save-member/{id}','MemberController@store');
//ProjectController
Route::Resource('projects','ProjectController')->except('create','store');
Route::get('add-projects/{id}','ProjectController@create');
Route::get('delete-projects/{id}','ProjectController@destroy');
Route::get('status/{id}','ProjectController@status');
Route::post('save-projects/{id}','ProjectController@store');
//files
Route::Resource('files', 'FileController')->except('create','store');
Route::get('file_delete/{id}', 'FileController@delete');
Route::get('file_download/{id}', 'FileController@download');
Route::get('file_view/{id}', 'FileController@view');
//TaskController
Route::Resource('tasks','TaskController')->except('create','store','destroy');
Route::get('add-task/{id}','TaskController@create');
Route::get('delete-task/{id}','TaskController@destroy');
Route::post('save-task/{id}','TaskController@store');
Route::get('ongoing/{id}','TaskController@ongoing');
Route::get('task_download/{id}', 'TaskController@download');
Route::get('task_view/{id}', 'TaskController@view');
Route::get('delete-file/{id}', 'TaskController@file');
Route::get('pending/{id}', 'TaskController@pending');
Route::get('approve', 'TaskController@approve');
Route::get('approved/{id}', 'TaskController@approved');
Route::get('team-task/{id}', 'TaskController@team');
//SuperController
Route::get('user_list','SuperController@userList');
Route::get('project_list','SuperController@projectList');
Route::get('team_list','SuperController@teamList');
Route::get('incomplete','SuperController@incompleteList');
//LeaderController
Route::get('member_list/{id}','LeaderController@memberList');
Route::get('team_projects/{id}','LeaderController@projectList');
Route::get('incomplete/{id}','LeaderController@incompleteList');
Route::get('task_list/{id}','LeaderController@taskList');
//MessageController
Route::get('messages','MessageController@fetch');
Route::post('messages','MessageController@sent');
