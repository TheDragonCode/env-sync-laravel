<?php

namespace Tests\Unit;

use DragonCode\EnvSync\Frameworks\Laravel\Console\Sync;
use DragonCode\Support\Exceptions\DirectoryNotFoundException;
use Tests\TestCase;

class ConfigurableTest extends TestCase
{
    protected $fixture_expected = 'expected-config';

    public function testCustomPath()
    {
        $this->artisan(Sync::class, ['--path' => $this->path])
            ->assertExitCode(0)
            ->run();

        $this->assertFileExists($this->targetPath());
        $this->assertFileEquals($this->expected(), $this->targetPath());
    }

    public function testCustomPathFailed()
    {
        $this->expectException(DirectoryNotFoundException::class);

        $this->artisan(Sync::class, ['--path' => base_path('foo')])->run();
    }

    protected function getEnvironmentSetUp($app)
    {
        /** @var \Illuminate\Config\Repository $config */
        $config = $app['config'];

        $config->set('env-sync', $this->config());
    }
}
