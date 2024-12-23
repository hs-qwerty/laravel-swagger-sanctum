<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Redis;

class CategoryObserver
{
    const category_prefix = "category:";
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        $this->initCache();
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        $this->initCache();
    }

    public function updating(Category $category): void
    {
        $this->initCache();
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        $this->initCache();
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        //
    }
    protected function initCache()
    {
        $redis = Redis::connection();
        if ($redis->exists(self::category_prefix.'all')) {
            $redis->del(self::category_prefix.'all');
        }
    }
}
