<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\PhoneBrand;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $phoneBrands = [
            'Iphone',
            'Nokia',
            'Xiaomi',
            'Sony',
        ];

        foreach ($phoneBrands as $brand) {
            PhoneBrand::query()->firstOrCreate([
                'name' => $brand,
            ],
            [
                'name' => $brand,
            ]);
        }

        /*print_r(PhoneBrand::query()->select('id')
            ->get()->pluck('id')
            ->random());*/
        //User::factory(10)->create();
        User::factory()
            ->has(Phone::factory()->count(3),'phones')
            ->count(100)->create();//создание 100 тестовых пользователей командой db:seed

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
