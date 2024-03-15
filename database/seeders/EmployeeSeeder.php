<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Employee;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Define how many fake employee records you want to generate
        $numEmployees = 10;

        // Generate fake employee data
        for ($i = 0; $i < $numEmployees; $i++) {
            Employee::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'department' => $faker->randomElement(['IT', 'HR', 'Finance', 'Marketing']),
                'designation' => $faker->jobTitle,
                'salary' => $faker->numberBetween(40000, 100000),
            ]);
        }
    }
}
