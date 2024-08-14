<?php

namespace App\Jobs;

use App\Models\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessCsv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $path;

    /**
     * Create a new job instance.
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = array_map('str_getcsv', file($this->path));
        $header = array_shift($data); // Remove header

        foreach ($data as $row) {
            $csvData = array_combine($header, $row);
            Contact::updateOrCreate(
                ['email' => $csvData['email']], // Unique constraint
                ['name' => $csvData['name'], 'phone' => $csvData['phone']]
            );
        }
    }
}
