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
        return $this->hasEntity($entity->getId());
    }

    public function get($id)
    {
        return $this->getEntity($id);
    }

    public function remove($id)
    {
        $entity = $this->get($id);
        $this->removeEntity($id);
        return $entity;
    }
}
