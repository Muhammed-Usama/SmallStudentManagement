<?php

namespace App\Console\Commands;

use App\Models\Models\Course;
use Illuminate\Console\Command;

class Courses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'course:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Courses';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $this->insertt();
    }
    public function insertt()
    {
        $data[] = [
            'name' => "Math",
        ];
        Course::insert($data);
        $this->info('Added Successfully');
    }
}
