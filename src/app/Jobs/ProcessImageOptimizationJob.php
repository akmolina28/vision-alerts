<?php

namespace App\Jobs;

use App\ImageFile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class ProcessImageOptimizationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public ImageFile $imageFile;

    /**
     * Create a new job instance.
     *
     * @param ImageFile $imageFile
     */
    public function __construct(ImageFile $imageFile)
    {
        $this->imageFile = $imageFile;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ImageOptimizer::optimize($this->imageFile->getAbsolutePath());
    }
}