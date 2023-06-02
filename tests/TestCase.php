<?php

namespace Tests;

use DragonCode\EnvSync\Frameworks\Laravel\ServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Tests\Concerns\Configurable;
use Tests\Concerns\Files;

abstract class TestCase extends BaseTestCase
{
    use Configurable;

    use Files;

    protected function setUp(): void
    {
        parent::setUp();

        $this->clean();
    }

    protected function getPackageProviders($app): array
    {
        return [ServiceProvider::class];
    }

    protected function clean(): void
    {
        $this->deleteFiles();
    }

    protected function deleteFiles(): void
    {
        if (file_exists($this->targetPath())) {
            unlink($this->targetPath());
        }
    }
}
