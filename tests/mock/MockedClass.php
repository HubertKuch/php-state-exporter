<?php

namespace Hubert\StateExporter\Tests\mock;

use Hubert\StateExporter\UseState;

class MockedClass {

    use UseState;

    public function __construct(
        public string $test,
        public string $test2,
        public int $int,
        public SecondMockedClass $mockedClass2
    ) {}
}