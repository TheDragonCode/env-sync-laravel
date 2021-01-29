<?php

namespace Tests\Unit;

use Helldar\Support\Exceptions\DirectoryNotFoundException;
use Tests\TestCase;

final class MainTest extends TestCase
{
    protected $type = 'laravel';

    public function testCustomPath()
    {
        $this->artisan('env:sync', ['--path' => $this->path])
            ->assertExitCode(0)
            ->run();

        $this->assertFileExists($this->targetPath());
        $this->assertFileEquals($this->expected(), $this->targetPath());
    }

    public function testCustomPathFailed()
    {
        $this->expectException(DirectoryNotFoundException::class);

        $this->artisan('env:sync', ['--path' => base_path('foo')])->run();
    }
}
