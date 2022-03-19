<?php

declare(strict_types=1);

namespace Tests\Unit;

use DragonCode\EnvSync\Frameworks\Laravel\Console\Sync;
use DragonCode\Support\Facades\Helpers\Filesystem\File;
use Tests\TestCase;

class WithEnvTest extends TestCase
{
    protected $fixture_expected = 'expected-sync';

    protected $filename = '.env';

    public function testWithEnv()
    {
        $this->copyFixture();

        $this->artisan(Sync::class, [
            '--path'     => $this->path,
            '--with-env' => true,
        ])
            ->assertExitCode(0)
            ->run();

        $this->assertFileExists($this->targetPath());
        $this->assertFileEquals($this->expected(), $this->targetPath());
    }

    protected function copyFixture()
    {
        File::copy(__DIR__ . '/../fixtures/source/sync-env', $this->targetPath());
    }
}
