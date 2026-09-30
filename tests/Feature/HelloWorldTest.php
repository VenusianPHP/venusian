<?php

use Symfony\Component\Process\Process;

it('runs the hello-world sketch through rocket', function () {
    $process = new Process([PHP_BINARY, 'rocket', 'hello-world'], dirname(__DIR__, 2));

    $process->run();

    expect($process->getExitCode())->toBe(0)
        ->and($process->getOutput())->toContain('Hello, world.');
});
