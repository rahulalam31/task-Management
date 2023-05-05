<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tasks;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $task1 = Tasks::create([
            'subject' => 'Complete project report',
            'description' => 'Write a report on the project progress and next steps',
            'start_date' => '2023-05-01',
            'due_date' => '2023-05-10',
            'status' => 'Incomplete',
            'priority' => 'High',
        ]);

        $task2 = Tasks::create([
            'subject' => 'Prepare for meeting',
            'description' => 'Review the agenda and prepare talking points',
            'start_date' => '2023-05-05',
            'due_date' => '2023-05-08',
            'status' => 'New',
            'priority' => 'Medium',
        ]);

        $task3 = Tasks::create([
            'subject' => 'Send follow-up email',
            'description' => 'Send an email to follow up on the project status',
            'start_date' => '2023-05-09',
            'due_date' => '2023-05-11',
            'status' => 'New',
            'priority' => 'Low',
        ]);

        $task1->notes()->createMany([
            [
                'subject' => 'Meeting notes',
                'note' => 'Discussed project timeline and budget',
            ],
            [
                'subject' => 'Action items',
                'note' => 'Assign tasks to team members',
            ],
        ]);
        $task2->notes()->createMany([
            [
                'subject' => 'Agenda items',
                'note' => 'Discuss project status, budget, and timeline',
            ],
        ]);

        $task3->notes()->createMany([
            [
                'subject' => 'Follow-up email',
                'note' => 'Check in on project status and next steps',
            ],
        ]);
    }
}
