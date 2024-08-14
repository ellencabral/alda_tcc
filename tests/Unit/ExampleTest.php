<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

# php artisan test --filter=ExampleTest
class ExampleTest extends TestCase
{
    # php artisan test --filter=ExampleTest::test_that_true_is_true
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }
}
