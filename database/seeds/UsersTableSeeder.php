<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Data Demo User 1
        DB::table('users')->insert([
          'nama' => 'Ali Bin Abu',
          'email' => 'ali@gmail.com',
          'password' => bcrypt('admin'),
          'jantina' => 'LELAKI',
          'no_kp' => '801205-08-6666',
          'no_telefon' => '0123456789',
          'alamat' => 'No. 123 Taman ABC 70000 Kuala Lumpur',
          'role' => 'admin'
        ]);

        # Data Demo User 2
        DB::table('users')->insert([
          'nama' => 'Ahmad Bin Abu',
          'email' => 'ahmad@gmail.com',
          'password' => bcrypt('staff'),
          'jantina' => 'LELAKI',
          'no_kp' => '801205-08-5555',
          'no_telefon' => '0123456789',
          'alamat' => 'No. 123 Taman ABC 70000 Kuala Lumpur',
          'role' => 'staff'
        ]);

        # Data Demo User 3
        DB::table('users')->insert([
          'nama' => 'Amir Bin Abu',
          'email' => 'amir@gmail.com',
          'password' => bcrypt('student'),
          'jantina' => 'LELAKI',
          'no_kp' => '901205-08-3334',
          'no_telefon' => '0123456789',
          'alamat' => 'No. 123 Taman ABC 70000 Kuala Lumpur',
          'role' => 'student'
        ]);
    }
}
