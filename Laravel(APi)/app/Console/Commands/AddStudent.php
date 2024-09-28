<?php

namespace App\Console\Commands;

use App\Models\Models\Student;
use Illuminate\Console\Command;

class AddStudent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:add {name_en=mohammed}{name_ar=محمد} {address_en=cairo} {address_ar=القاهره} {mobile=01026621966}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command to Add Student I n Databas';

    /**
     * Execute the console command.
     */
    #{name_en="mohammed"}{name_ar="محمد"} {address_en="cairo"} {address_ar="القاهره"} {mobile="01026621966"}'
    public function handle()
    {
        $name_en = $this->argument('name_en');
        $name_ar = $this->argument('name_ar');
        $address_en = $this->argument('address_en');
        $address_ar = $this->argument('address_ar');
        $mobile = $this->argument('mobile');

        $this->add($name_en, $name_ar, $address_en, $address_ar, $mobile);
    }

    public function add($name_en, $name_ar, $address_en, $address_ar, $mobile)
    {
        Student::create([
            'name_en' => $name_en,
            'name_ar' => $name_ar,
            'address_en' => $address_en,
            'address_ar' => $address_ar,
            'mobile' => $mobile,
        ]);
        $this->info("Added Successfully");
    }
}
