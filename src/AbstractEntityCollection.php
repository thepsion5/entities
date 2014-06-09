<?php
namespace Thepsion5\Entities;

use Thepsion5\Entities\Exceptions\EntityNotFoundException;

abstract class AbstractEntityCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    protected $entities = array();

    public function __construct(array $entities = array())
    {
        foreach($entities as $entity) {
            $this->addEntity($entity);
        }
    }

    /**
     * @param EntityInterface $entity
     * @return $this
     */
    protected function addEntity(EntityInterface $entity)
    {
        $this->entities[$entity->getId()] = $entity;
        return $this;
    }

    /**
     * @param string $index
     * @return bool
     */
    protected function hasEntity($index)
    {
        return isset($this->entities[$index]);
    }

    /**
     * @param string $index
     * @return EntityInterface
     * @throws \Thepsion5\Entities\Exceptions\EntityNotFoundException
     */
    protected function getEntity($index)
    {
        $this->validateEntityExists($index);
        return $this->entities[$index];
    }

    /**
     * @param string $entityId
     * @return $this
     * @throws \Thepsion5\Entities\Exceptions\EntityNotFoundException
     */
    protected function removeEntity($entityId)
    {
        $this->validateEntityExists($entityId);
        unset($this->entities[$entityId]);
        return $this;
    }

    /**
     * @param string $index
     * @throws \Thepsion5\Entities\Exceptions\EntityNotFoundException
     */
    protected function validateEntityExists($index)
    {
        if (!$this->hasEntity($index)) {
            throw new EntityNotFoundException;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->entities);
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->entities);
    }
}
