<?php

namespace DragonCode\EnvSync\Frameworks\Laravel\Console;

use DragonCode\EnvSync\Services\Syncer;
use Illuminate\Console\Command;

class Sync extends Command
{
    protected $signature = 'env:sync'
                           . ' {--path= : Gets the path to scan for files}'
                           . ' {--with-env : Determines whether to update the .env file}';

    protected $description = 'Synchronizing environment settings with a preset';

    public function handle(Syncer $syncer)
    {
        if ($this->option('with-env')) {
            $this->sync($syncer, '.env', true);
        }

        $this->sync($syncer, '.env.example');
    }

    protected function sync(Syncer $syncer, string $filename, bool $sync = false): void
    {
        $this->info('Sync ' . $filename . '...');

        $syncer
            ->path($this->path())
            ->filename($filename, $sync)
            ->store();

        $this->info("The found keys were successfully saved to the $filename file.");
    }

    protected function path(): string
    {
        return $this->option('path') ?: base_path();
    }
}
