<?php

namespace Astrogoat\Osano\Commands;

use Illuminate\Console\Command;

class OsanoCommand extends Command
{
    public $signature = 'osano';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
