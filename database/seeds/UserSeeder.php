<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Role;
use \Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        \App\User::truncate();

        $adminRole = Role::create(['name' => 'admin']);
        $cloutRole = Role::create(['name' => 'clout']);
        $guestRole = Role::create(['name' => 'guest']);
        $managerRole= Role::create(['name' => 'manager']);

        // admin

        $admin = new \App\User;
        $admin->document = '111122223';
        $admin->documents_type_id = 1;
        $admin->name = ucwords('admin');
        $admin->last_name = ucwords('admin');
        $admin->email = 'admin@gmail.com';
        $admin->user_name = 'admin';
        $admin->phone = '318564382';
        $admin->gender_id = 1;
        $admin->slug = 'admin';
        $admin->password = bcrypt('secret');
        $admin->picture = '/assets/images/default.png';
        $admin->company_id = 2;
        $admin->save();
        $admin->assignRole([$adminRole]);

        //manger
        $manager = new \App\User;
        $manager->document = '111122223';
        $manager->documents_type_id = 1;
        $manager->name = ucwords('manager');
        $manager->last_name = ucwords('manager');
        $manager->email = 'manager@gmail.com';
        $manager->user_name = 'manager';
        $manager->phone = '318564382';
        $manager->gender_id = 1;
        $manager->slug = 'manager';
        $manager->password = bcrypt('secret');
        $manager->picture = '/assets/images/default.png';
        $manager->company_id = 2;
        $manager->save();
        $manager->assignRole([$managerRole]);

        //clout
        $clout = new \App\User;
        $clout->document = '111122223';
        $clout->documents_type_id = 1;
        $clout->name = ucwords('clout');
        $clout->last_name = ucwords('clout');
        $clout->email = 'clout@gmail.com';
        $clout->user_name = 'clout';
        $clout->phone = '318564382';
        $clout->gender_id = 1;
        $clout->slug = 'clout';
        $clout->password = bcrypt('secret');
        $clout->picture = '/assets/images/default.png';
        $clout->company_id = 2;
        $clout->save();
        $clout->assignRole([$cloutRole]);

        //guest
        $guest = new \App\User;
        $guest->document = '111122223';
        $guest->documents_type_id = 1;
        $guest->name = ucwords('guest');
        $guest->last_name = ucwords('guest');
        $guest->email = 'guest@gmail.com';
        $guest->user_name = 'guest';
        $guest->phone = '318564382';
        $guest->gender_id = 1;
        $guest->slug = 'guest';
        $guest->password = bcrypt('secret');
        $guest->picture = '/assets/images/default.png';
        $guest->company_id = 2;
        $guest->save();
        $guest->assignRole([$guestRole]);
    }
}
