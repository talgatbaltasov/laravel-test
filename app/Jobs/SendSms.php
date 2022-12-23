<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $account_id;
    public $content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($account_id, $content)
    {
        $this->account_id = $account_id;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $result = Http::post('https://example.com/sms', [
            'account_id' => $this->account_id,
            'content' => $this->content
        ]);

        Log::info($result->json());
    }
}
