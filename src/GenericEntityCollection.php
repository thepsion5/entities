<?php
namespace Thepsion5\Entities;


class GenericEntityCollection extends AbstractEntityCollection
{

    public function add(EntityInterface $entity)
    {
        return $this->addEntity($entity);
    }

    public function has(EntityInterface $entity)
    {
        return $this->hasEntity($entity);
    }

    public function get($id)
    {
        return $this->getEntity($id);
    }

    public function offsetSet($offset, $value)
    {
        $this->validateOffsetToAdd($offset, $value);
        $this->add($value);
    }

    protected function validateOffsetToAdd($offset, $value)
    {
        if(!$value instanceof EntityInterface) {
            throw new \InvalidArgumentException('Only entities may be added to this collection.');
        }
        if($offset != $value->getId()) {
            throw new \InvalidArgumentException('The offset being set must match the entity\'s id');
        }
        $this->add($value);
    }
}
