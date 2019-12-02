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

        // Categorias por defecto
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

        // Marcas por defecto
        DB::table('marcas')->insert([
          [
            'nombre' => 'Samsung',
            'imagen' => 'https://cdn.samsung.com/etc/designs/smg/global/imgs/logo-square-letter.png',
          ],
          [
            'nombre' => 'Apple',
            'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Logo_apple_pnh.png',
          ],
          [
            'nombre' => 'Xiaomi',
            'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Xiaomi_logo.svg/1024px-Xiaomi_logo.svg.png',
          ],
        ]);

        // Usuario administrador por defecto
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
