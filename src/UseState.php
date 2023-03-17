<?php

namespace Hubert\StateExporter;

use BackedEnum;
use Hubert\StateExporter\Tests\mock\MockedClass;
use Hubert\StateExporter\Tests\mock\SecondMockedClass;
use ReflectionClass;
use ReflectionEnum;
use ReflectionException as ReflectionExceptionAlias;
use ReflectionProperty;

trait UseState {

    private static object $instance;
    private static string $class;

    public static function __callStatic(string $name, array $arguments) {
        if ($name === "__set_state") {
            $ref = new ReflectionClass(get_called_class());
            $instance = $ref->newInstanceWithoutConstructor();

            $args = $arguments[0];

            foreach ($args as $name => $value) {
                $prop = $ref->getProperty($name);

                $prop->setValue($instance, $value);
            }

            return $instance;
        }
    }
}