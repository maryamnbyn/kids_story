<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class sendSMSVerificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $random_number;
    protected $phone;
    public $tries = 5;

    /**
     * Create a new job instance.
     *
     * @param $random_number
     * @param $phone
     */
    public function __construct($random_number,$phone)
    {
        $this->random_number = $random_number;
        $this->phone = $phone;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Smsirlaravel::sendVerification($this->random_number, $this->phone);
    }
}
