<?php

namespace App\Http\Controllers;

use App\Jobs\NotInterestingProcess;
use App\Jobs\ProcessTestData;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function addToQueue(): string
    {
        ProcessTestData::dispatch(); // Dispatch the job to the queue
        NotInterestingProcess::dispatch(); // Dispatch the job to the queue

        return 'Job added to the queue!';
    }

    public function queueFlush(): string
    {
        Cache::flush();
        return 'Queue flushed!';
    }
}
