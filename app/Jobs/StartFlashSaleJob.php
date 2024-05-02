<?php

namespace App\Jobs;

use App\Models\FlashSale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StartFlashSaleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $flashSale;
    public function __construct(FlashSale $flashSale)
    {
        //
        $this->flashSale = $flashSale;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $active_flashsale=$this->flashSale->where('active',1)->first();
    }
}
