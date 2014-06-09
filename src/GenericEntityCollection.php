<?php
namespace Thepsion5\Entities;

use Traversable;

class GenericEntityCollection extends AbstractEntityCollection implements \ArrayAccess, \IteratorAggregate, \Countable
{

    public function offsetExists($offset)
    {
        return $this->hasEntity($offset);
    }

    public function offsetGet($offset)
    {
        return $this->getEntity($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->validateOffsetToAdd($offset, $value);
        $this->addEntity($value);
    }

    public function offsetUnset($offset)
    {
        $this->removeEntity($offset);
    }

    protected function validateOffsetToAdd($id, $entity)
    {
        if(!$entity instanceof EntityInterface) {
            throw new \InvalidArgumentException('Only entities can be added to this collection.');
        }
        if($id != $entity->getId()) {
            throw new \InvalidArgumentException('The index to set must match the entity\'s ID.');
        }
        return true;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     *
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     *       <b>Traversable</b>
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->all());
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     *       </p>
     *       <p>
     *       The return value is cast to an integer.
     */
    public function count()
    {
        // TODO: Implement count() method.
    }
}
