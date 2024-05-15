<?php

namespace App\Jobs;

use App\Models\News;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ChangeNews implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $news;
    /**
     * Create a new job instance.
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->news->photo = 'big_file';
        $this->news->save();
    }
}
