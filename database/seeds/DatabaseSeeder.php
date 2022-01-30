<?php

use App\Company;
use App\Employee;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        Company::truncate();

        Company::create([
            'name' => 'ProTracked',
            'email' => 'protracked@info.in',
            'logo' => 'test.png',
            'website' => 'https://protracked.in/'
        ]);

        factory(Company::class, 50)->create();

        Employee::truncate();

        Employee::create([
            'first_name' => 'Devassy',
            'last_name' => 'Nelvin',
            'email' => 'devassy@gmail.com',
            'company_id' => 1,
            'phone' => '+91 9605985857'
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
