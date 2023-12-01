<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class ProcessTestData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $currentTime;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->currentTime = Carbon::now()->toTimeString();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger(__METHOD__);

        $key = 'key' . $this->currentTime;
        $value = 'value_' . $this->currentTime;

        Cache::put($key, $value, 300);
        $value = Cache::get('key' . $this->currentTime);

        logger('Test data processed: ' . $value);
        logger(__METHOD__ . '--- END ---');
    }
}
