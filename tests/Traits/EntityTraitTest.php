<?php
namespace Thepsion5\Entities\Tests\Traits;

use Thepsion5\Entities\Tests\Stubs\StubEntity;
use Thepsion5\Entities\Tests\TestCase;

class EntityTraitTest extends TestCase
{
    /** @test */
    public function it_generates_an_id_if_one_is_not_set()
    {
        $entity = new StubEntity;

        $id = $entity->getId();

        $this->assertNotEmpty($id);
    }

    /** @test */
    public function it_retrieves_a_set_id()
    {
        $expectedId = 'test';
        $entity = new StubEntity();
        $entity->setId($expectedId);

        $actualId = $entity->getId();

        $this->assertEquals($expectedId, $actualId);
    }

    /** @test */
    public function it_generates_an_id_with_a_prefix()
    {
        $prefix = 'test_prefix_';

        $entity = new StubEntity();
        $entity->generateIdUsingPrefix($prefix);

        $id = $entity->getId();

        $this->assertStringStartsWith($prefix, $id);
    }
} 