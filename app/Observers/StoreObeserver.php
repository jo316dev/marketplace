<?php

namespace App\Observers;

use App\Models\Store;
use Illuminate\Support\Str;

class StoreObeserver
{
    /**
     * Handle the store "creating" event.
     *
     * @param  \App\Models\Store  $store
     * @return void
     */
    public function creating(Store $store)
    {
        
        $store->slug = Str::kebab($store->name);
        
    }

    /**
     * Handle the store "updating" event.
     *
     * @param  \App\Models\Store  $store
     * @return void
     */
    public function updating(Store $store)
    {
        $store->slug = Str::kebab($store->name);
    }

    /**
     * Handle the store "deleted" event.
     *
     * @param  \App\Models\Store  $store
     * @return void
     */
    public function deleted(Store $store)
    {
        //
    }

    /**
     * Handle the store "restored" event.
     *
     * @param  \App\Models\Store  $store
     * @return void
     */
    public function restored(Store $store)
    {
        //
    }

    /**
     * Handle the store "force deleted" event.
     *
     * @param  \App\Models\Store  $store
     * @return void
     */
    public function forceDeleted(Store $store)
    {
        //
    }
}
