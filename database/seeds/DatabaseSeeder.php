<?php

use Illuminate\Database\Seeder;

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
        DB::table('categorias')->insert([
          [
            'nombre' => 'Smartphone',
            'icon' => 'fas fa-mobile',
          ],
          [
            'nombre' => 'Tablet',
            'icon' => 'fas fa-tablet',
          ],
          [
            'nombre' => 'Smartwatch',
            'icon' => 'fas fa-clock',
          ],
        ]);
        DB::table('users')->insert([
          'name' => 'Elmas',
          'apellido' => 'Capo',
          'email' => 'admin@admin.com',
          'password' => Hash::make('admin1234'),
          'avatar' => null,
          'admin' => 1,
        ]);
    }
}
