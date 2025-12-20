<?php

namespace App\Models;

class Job 
{
    public static function all(): array {
        return [
            ['id' => 1, 'title' => 'Software Engineer', 'description' => 'We are looking for a skilled software engineer to join our team.'],
            ['id' => 2, 'title' => 'Data Analyst', 'description' => 'If you have a passion for data and analytics, we have an opening for you.'],
            ['id' => 3, 'title' => 'Marketing Specialist', 'description' => 'Join our marketing team and help us grow our brand.']
        ];
    }
}