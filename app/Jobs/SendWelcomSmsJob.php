<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class SendWelcomSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $text;
    protected $phone;

    public $tries = 5;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($text, $phone)
    {
        $this->text = $text;
        $this->phone = $phone;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Smsirlaravel::send($this->text, $this->phone);
    }
}
