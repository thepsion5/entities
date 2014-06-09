<?php
namespace Thepsion5\Entities\Tests;

use Thepsion5\Entities\GenericEntityCollection;
use Thepsion5\Entities\Tests\Stubs\StubEntity;

class GenericEntityCollectionTest extends TestCase
{
    /**
     * @var GenericEntityCollection
     */
    protected $collection;

    public function setUp()
    {
        $this->collection = new GenericEntityCollection;
    }

    /** @test */
    public function it_accepts_an_array_of_entities_when_constructed()
    {
        $entities = array(
            new StubEntity,
            new StubEntity,
            new StubEntity
        );

        new GenericEntityCollection($entities);
    }

    /** @test */
    public function it_allows_entities_to_be_added()
    {
        $this->collection
            ->add(new StubEntity)
            ->add(new StubEntity)
            ->add(new StubEntity);

        $this->assertCount(3, $this->collection);
    }

    /** @test */
    public function it_checks_for_the_existence_of_added_entities()
    {
        $entities = array(
            new StubEntity,
            new StubEntity,
            new StubEntity
        );

        $this->collection
            ->add($entities[0])
            ->add($entities[1])
            ->add($entities[2]);

        $this->assertTrue($this->collection->has($entities[0]));
        $this->assertTrue($this->collection->has($entities[1]));
        $this->assertTrue($this->collection->has($entities[2]));
    }

    /** @test */
    public function it_retrieves_added_entities()
    {
        $addedEntity = new StubEntity;

        $this->collection->add($addedEntity);
        $foundEntity = $this->collection->get($addedEntity->getId());

        $this->assertEquals($addedEntity, $foundEntity);
    }

    /** @test */
    public function it_allows_added_entities_to_be_removed()
    {
        $addedEntity = new StubEntity;

        $this->collection->add($addedEntity)
            ->remove($addedEntity->getId());
    }

    /**
     * @test
     * @expectedException \Thepsion5\Entities\Exceptions\EntityNotFoundException
     */
    public function it_throws_an_exception_when_getting_an_entity_that_does_not_exist()
    {
        $this->collection->get('not in collection');
    }

    /** @test */
    public function it_can_be_used_as_an_iterator()
    {
        $iterator = $this->collection->getIterator();
        $this->assertNotNull($iterator);
    }
} 