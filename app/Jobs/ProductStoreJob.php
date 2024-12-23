<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class ProductStoreJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    const product_prefix = 'product:';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $redis = Redis::connection();
        if ($redis->exists(self::product_prefix.'all')) {
            $redis->del(self::product_prefix.'all');

            $redis->set(self::product_prefix.'all', Product::all());
        }else{
            $redis->set(self::product_prefix.'all', Product::all());
        }
    }
}
