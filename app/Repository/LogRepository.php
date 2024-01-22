<?php

namespace App\Repository;

use App\Models\Log;
use Illuminate\Database\Eloquent\Collection;

class LogRepository
{

    public function add($log):void
    {
        Log::create([
            'content'=> json_encode($log, JSON_FORCE_OBJECT)
        ]);
    }

    public function getLogs(): Collection
    {
        return Log::all();
    }

}
