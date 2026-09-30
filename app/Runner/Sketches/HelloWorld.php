<?php

namespace App\Runner\Sketches;

use Voyager\Contracts\Sketches\SketchLoopResult;

class HelloWorld extends Sketch
{
    /**
     * The sketch description.
     *
     * @var string
     */
    protected string $description = 'Print a greeting and stop.';

    /**
     * Execute one cooperative tick of the sketch.
     */
    public function loop(array $mail = []): SketchLoopResult
    {
        $this->info('Hello, world.');

        return SketchLoopResult::STOP;
    }
}
