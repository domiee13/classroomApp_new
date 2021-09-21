<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = [
            [
                'name' => 'Nguyễn Văn A',
                'username' => "admin",
                'email' => "admin@test.com",
                'password' => bcrypt('12345'),
                'phone' => "0909090090",
                'role' => 0,
            ],
            [
                'name' => 'Nguyễn Trấn Tuấn Dũng',
                'username' => "domiee13",
                'email' => "domiee13@test.com",
                'password' => bcrypt('12345'),
                'phone' => "0963947598",
                'role' => 1,
            ],
            [
                'name' => 'Nguyễn Văn B',
                'username' => "test",
                'email' => "test@test.com",
                'password' => bcrypt('12345'),
                'phone' => "1234567891",
                'role' => 1,
            ],
            
        ];
        
        DB::table('users')->insert($data);
    }
}
