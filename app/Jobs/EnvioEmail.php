<?php

namespace App\Jobs;

use App\Mail\EnvioEmail as MailEnvioEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EnvioEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $codigo;
    public function __construct($request)
    {
        $this->codigo = $request;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::send(new MailEnvioEmail($this->codigo));
    }
}
