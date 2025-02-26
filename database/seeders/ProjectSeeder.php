<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()
            ->count(6)
            ->sequence(
                ['status' => 'open'],
                ['status' => 'close']
            )
            ->has(Task::factory()
                    ->count(4)
                    ->state(function (array $attributes, Project $project) {
                return ['user_id' => $project->user_id, 'client_id' => $project->client_id];
                })
                ->sequence(
                    ['status' => 'open'],
                    ['status' => 'close']
                )
            )
            ->create();
    }
}
