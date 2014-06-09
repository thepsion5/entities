<?php
namespace Thepsion5\Entities\Tests\Traits;

use Thepsion5\Entities\Tests\Stubs\StubSimpleValueObjectWithEmpty;
use Thepsion5\Entities\Tests\TestCase,
    Thepsion5\Entities\Tests\Stubs\StubSimpleValueObject;

class SimpleValueObjectTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function it_throws_exception_when_constructed_with_empty_string()
    {
        new StubSimpleValueObject('');
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function it_throws_exception_when_constructed_with_null()
    {
       new StubSimpleValueObject(null);
    }

    /**
     * @test
     */
    public function it_can_be_constructed_with_zero_value()
    {
        $stub = new StubSimpleValueObject(0);
        $this->assertNotNull($stub);
    }

    /** @test */
    public function it_can_be_cast_as_a_string()
    {
        $expectedValue = 'test';

        $stub = new StubSimpleValueObject('test');
        $actualValue = $stub . '';

        $this->assertEquals($expectedValue, $actualValue);
    }
}
