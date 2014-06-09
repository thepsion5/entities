<?php
namespace Thepsion5\Entities\Traits;

trait EntityTrait
{
    protected $id;

    protected function generateId($prefix = '')
    {
        $this->id = uniqid($prefix, true);
    }

    public function getId()
    {
        if(!$this->id) {
            $this->generateId();
        }
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}