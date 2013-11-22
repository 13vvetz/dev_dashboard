<?php
// Supposedly Eloquent updates created_at and updated_at timestamp fields
// automatically

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'Brent Weston'
        ));
        User::create(array(
            'email' => 'test@yahoo.com',
            'password' => Hash::make('yahoo'),
            'name' => 'Brett Wetzell'
        ));

    }
}
