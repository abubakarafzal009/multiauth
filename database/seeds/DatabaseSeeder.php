<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
        
    // }
    public function run()
    {
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);
        Permission::create(['name' => 'Read articles']);


        // create roles and assign created permissions

        // this can be done as separate statements
        // $role = Role::create(['name' => 'writer']);
        // $role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role = Role::create(['name' => 'SuperAdmin'])
            ->givePermissionTo(['publish articles', 'unpublish articles','delete articles','edit articles']);

        $role = Role::create(['name' => 'Admin'])
           ->givePermissionTo(['Read articles']);
        // $role->givePermissionTo(Permission::all());
       $user = User::create([ 'name' => 'John', 'email' => 'admn@example.com', 'password' => bcrypt('password'), 'created_at' => '2019-05-28 04:45:27', 'updated_at' => '2019-05-28 04:45:27' ]); 
       $user->assignRole('Admin');
$user1 = User::create([ 'name' => 'John Doe', 'email' => 'superadmin@example.com', 'password' => bcrypt('password'), 'created_at' => '2019-05-28 04:45:27', 'updated_at' => '2019-05-28 04:45:27' ]);
 $user1->assignRole('SuperAdmin');
    }
}
