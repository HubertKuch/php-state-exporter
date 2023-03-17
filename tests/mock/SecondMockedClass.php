<?php

namespace Hubert\StateExporter\Tests\mock;

use Hubert\StateExporter\UseState;

class SecondMockedClass {

    use UseState;

    public function __construct(
        public string $random,
        public string $test
    ) {}

}