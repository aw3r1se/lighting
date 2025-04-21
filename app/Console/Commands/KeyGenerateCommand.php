<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\KeyGenerateCommand as Base;

class KeyGenerateCommand extends Base
{
    protected $signature = 'key:generate
                    {--show : Display the key instead of modifying files}
                    {--force : Force the operation to run when in production}
                    {--if-not-exist : Don\'t generate when filled}';

    public function handle(): void
    {
        if (
            $this->option('if-not-exist')
            && config('app.key')
        ) {
            $this->comment('App key already exists. Skipping...');

            return;
        }

        parent::handle();
    }
}
