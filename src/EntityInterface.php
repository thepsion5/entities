<?php
namespace Thepsion5\Entities;

interface EntityInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $id
     */
    public function setId($id);
} 