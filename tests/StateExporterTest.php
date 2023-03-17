<?php

namespace Hubert\StateExporter\Tests;

use Hubert\StateExporter\Tests\mock\MockedClass;
use Hubert\StateExporter\Tests\mock\SecondMockedClass;
use PHPUnit\Framework\TestCase;

class StateExporterTest extends TestCase {

    public function testClasses() {
        $CACHE_FILE = __DIR__ . "/cache/test.php";
        try {
            $instances = array_map(fn() => new MockedClass("test", "test", 24, new SecondMockedClass("test", "test")),
                range(0, 1000));

            file_put_contents($CACHE_FILE, "<?php return\n" . var_export($instances, true) . ";\n");

            $instancesFromFile = @require_once $CACHE_FILE;

            self::assertEquals($instances, $instancesFromFile);
        } finally {
            unlink($CACHE_FILE);
        }
    }

}
