<?php

namespace App\Console\Commands;

use App\Models\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Data extends Command
{
    protected $signature = 'data:insert';
    protected $description = 'Insert records into DB';

    public function handle()
    {
        $this->info('Data insertion started.');
        $this->insert();
        $this->info('Data insertion completed.');
    }

    public function insert()
    {
        $batchSize = 10000; // Batch size
        $totalRecords = 1000000; // Total records

        $startTime = microtime(true);

        $data = [];
        try {
            for ($i = 0; $i < $totalRecords; $i++) {
                $data[] = [
                    'name_en' => "mohammed Usma-$i",
                    'name_ar' => "محمد اسامه-$i",
                    'address_en' => "9-cairo-$i",
                    'address_ar' => "9-مصر-$i",
                    'mobile' => "01022621966-$i",
                ];

                // Insert data in batches
                if (count($data) >= $batchSize) {
                    Student::insert($data);
                    $data = []; // Clear the batch
                }
            }

            // Insert any remaining data
            if (!empty($data)) {
                Student::insert($data);
            }
        } catch (\Exception $e) {
            Log::error('Data insertion failed: ' . $e->getMessage());
            $this->error('Data insertion failed: ' . $e->getMessage());
            return 1; // Indicate failure
        }

        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;

        $this->info("Batch Data Insertion Time: " . $executionTime . " seconds");
    }
}
