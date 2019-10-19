<?php
Auth::routes();
Route::get('/', function(){
	return view('welcome');
});
//ProfileController
Route::Resource('profiles','ProfileController');
Route::get('logout','ProfileController@logout');
Route::post('dashboard','ProfileController@verify');
Route::get('/home', 'ProfileController@home');
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
//Member Controller
Route::Resource('members','MemberController')->except('store','create','destroy');
Route::get('delete-member/{id}','MemberController@destroy');
Route::get('add-members/{id}','MemberController@create');
Route::post('save-member/{id}','MemberController@store');
//ProjectController
Route::Resource('projects','ProjectController')->except('create','store');
Route::get('add-projects/{id}','ProjectController@create');
Route::get('delete-projects/{id}','ProjectController@destroy');
Route::get('status/{id}','ProjectController@status');
Route::post('save-projects/{id}','ProjectController@store');
//TaskController
Route::Resource('tasks','TaskController')->except('create','store','destroy');
Route::get('add-task/{id}','TaskController@create');
Route::get('delete-task/{id}','TaskController@destroy');
Route::post('save-task/{id}','TaskController@store');
Route::get('progress/{id}','TaskController@progress');
Route::get('task-files/{id}', 'TaskController@download');
//SuperController
Route::get('user_list','SuperController@userList');
Route::get('project_list','SuperController@projectList');
Route::get('team_list','SuperController@teamList');
Route::get('incomplete','SuperController@incompleteList');
//files
Route::Resource('files', 'FileController')->except('create','store');
Route::get('file_delete/{id}', 'FileController@delete');
Route::get('file_download/{id}', 'FileController@download');
