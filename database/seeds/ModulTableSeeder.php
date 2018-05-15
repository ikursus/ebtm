<?php

use Illuminate\Database\Seeder;

class ModulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modul')->insert([
          'nama' => 'HR',
        ]);

        DB::table('modul')->insert([
          'nama' => 'KEWANGAN',
        ]);

        DB::table('modul')->insert([
          'nama' => 'PELAJAR',
        ]);
    }
}
