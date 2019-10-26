<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Route;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       $superuser= User::create([
        	'name'=>'Tanvir',
        	'username'=>'tanvir',
        	'email'=>'tanvir@gmail.com',
        	'password'=>bcrypt('000000'),
        ]);
       $adminuser= User::create([
            'name'=>'Tanvir Ahmed',
            'username'=>'hera',
            'email'=>'tanvir59@gmail.com',
            'password'=>bcrypt('000000'),
        ]);
       $memberuser= User::create([
            'name'=>'Tanvir Ahmed Hera',
            'username'=>'hira',
            'email'=>'tanvir1@gmail.com',
            'password'=>bcrypt('000000'),
        ]);
       $superrole= Role::create([
            'name'=>'super admin',
        ]);
       $adminrole= Role::create([
            'name'=>'admin',
        ]);
       $memberrole= Role::create([
            'name'=>'member',
        ]);
       $superuser->roles()->attach($superrole);
       $adminuser->roles()->attach($adminrole);
       $memberuser->roles()->attach($memberrole);

        $permission = array(
        array('name' => 'user_create'),
        array('name' => 'project_create'),
        array('name' => 'team_create'),
        array('name' => 'user_view'),
        array('name' => 'team_view'),
        array('name' => 'project_view'),
        array('name' => 'user_edit'),
        array('name' => 'project_edit'),
        array('name' => 'team_edit'),
        array('name' => 'user_delete'),
        array('name' => 'project_delete'),
        array('name' => 'team_delete')
        );
       Permission::insert($permission);
       $superrole->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11,12]);

    }
}
