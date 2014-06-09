<?php
namespace Thepsion5\Entities\Tests\Stubs;

use Thepsion5\Entities\EntityInterface;
use Thepsion5\Entities\Traits\EntityTrait;

class StubEntity implements EntityInterface
{
    use EntityTrait;

    function generateIdUsingPrefix($prefix)
    {
        $this->generateId($prefix);
    }
} 