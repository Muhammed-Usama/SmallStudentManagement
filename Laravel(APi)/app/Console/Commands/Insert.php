<?php

namespace App\Console\Commands;

use App\Models\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Insert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import student data from CSV';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Data insertion started.');
        $this->insert();
        $this->info('Data insertion completed.');
    }

    public function insert()
    {
        $files = storage_path('app/data.csv');
        $handle = fopen($files, 'r');

        if ($handle === false) {
            $this->error('Could not open the file!');
            return 1; // Indicate failure
        }

        // Skip the header row
        fgetcsv($handle);

        $batchSize = 1000;
        $startTime = microtime(true);
        $data = [];

        try {
            while (($row = fgetcsv($handle)) !== false) {
                // Map the CSV row to your model attributes if necessary
                $data[] = [
                    'name_en' => $row[0],
                    'name_ar' => $row[1],
                    'address_en' => $row[2],
                    'address_ar' => $row[3],
                    'mobile' => $row[4],
                    // Add other columns as needed
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

            fclose($handle);
        } catch (\Exception $e) {
            Log::error('Data insertion failed: ' . $e->getMessage());
            $this->error('Data insertion failed: ' . $e->getMessage());
            return 1; // Indicate failure
        }

        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;

        $this->info("Batch Data Insertion Time: " . $executionTime . " seconds");
        return 0; // Indicate success
    }
}
