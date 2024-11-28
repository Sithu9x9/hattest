<?php

namespace App\Observers;

use App\Models\Client;
use Illuminate\Support\Facades\Cache;

class ClientObserver
{
    public function created(Client $client): void
    {
        Cache::forget('clients');
    }

    public function updated(Client $client): void
    {
        Cache::forget('clients');
    }

    public function deleted(Client $client): void
    {
        Cache::forget('clients');
    }
}
