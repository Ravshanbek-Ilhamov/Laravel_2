<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($level = 1; $level <= 4; $level++) {
            Course::factory()->create([
                'level' => $level . '-level',
            ]);
        }
    }
}
