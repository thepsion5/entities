<?php
namespace Thepsion5\Entities\Tests\Traits;

use Thepsion5\Entities\Tests\Stubs\StubEnum;
use Thepsion5\Entities\Tests\TestCase;

class EnumTest extends TestCase
{
    /** @test */
    public function it_can_be_converted_to_an_array()
    {
        $expected = array(
            'ENUM_VALUE_A'   => 1,
            'ENUM_VALUE_B'   => 2,
            'ENUM_VALUE_C'   => 3
        );

        $actual = StubEnum::toArray();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function it_throws_an_exception_if_constructed_with_an_undefined_value()
    {
        new StubEnum(4);
    }

    /** @test */
    public function it_checks_to_see_if_it_matches_a_current_label()
    {
        $enum = new StubEnum(1);

        $results = array(
            $enum->is('ENUM_VALUE_A'),
            $enum->is('ENUM_VALUE_B')
        );

        $this->assertTrue($results[0]);
        $this->assertFalse($results[1]);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function it_throws_an_exception_if_checked_with_an_invalid_label()
    {
        $enum = new StubEnum(1);
        $enum->is('INVALID_LABEL');
    }

    /** @test */
    public function it_creates_new_instances_if_called_statically_with_label()
    {
        $expectedEnums = array(
            new StubEnum(1),
            new StubEnum(2),
            new StubEnum(3)
        );

        $actualEnums = array(
            StubEnum::ENUM_VALUE_A(),
            StubEnum::ENUM_VALUE_B(),
            StubEnum::ENUM_VALUE_C()
        );

        $this->assertEquals($expectedEnums, $actualEnums);


    }




}
