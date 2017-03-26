<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \Kodeine\Acl\Models\Eloquent\Role;
use \Kodeine\Acl\Models\Eloquent\User;
use Kodeine\Acl\Models\Eloquent\Permission;
class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $permission1 = Permission::create([
            'name' => "message.list",
            'slug' => "message.list",
            'description' => "message.list", 
        ]);
      $permission2 = Permission::create([
            'name' => "message.compose",
            'slug' => "message.compose",
            'description' => "message.compose",
        ]);
      $permission3 =  Permission::create([
            'name' => "message.send",
            'slug' => "message.send",
            'description' => "message.send",
        ]);
       
        $role1 = Role::create([
            'name' => "admin",
            'slug' => "admin",
            'description' => "admin",
        ]);
        $role2 = Role::create([
            'name' => "normal",
            'slug' => "normal",
            'description' => "normal",
        ]);
        $role2->assignPermission(array($permission1->id,$permission2->id,$permission3->id));
        $role3 = Role::create([
            'name' => "guest",
            'slug' => "guest",
            'description' => "guest",
        ]);
        
        $user1 = User::create([
            'username' => "admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt("admin"),
        ]);
        $user1->assignRole($role1->id);
        $user2 = User::create([
            'username' => "vishal",
            'email' => "vishal@gmail.com",
            'password' => bcrypt("vishal"),
        ]);
        $user2->assignRole($role2->id);
        $user3 = User::create([
            'username' => "guest",
            'email' => "guest@gmail.com",
            'password' => bcrypt("guest"),
        ]);
        $user3->assignRole($role3->id);        
    }
}
