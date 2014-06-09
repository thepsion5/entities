<?php
namespace Thepsion5\Entities\Traits;

trait SimpleValueObjectTrait
{
    protected $value;


    /**
     * @param $value
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        if(!$this->isValid($value)) {
            $this->onInvalid($value);
        }
        $this->value = $value;
    }

    /**
     * @param $value
     * @return bool
     */
    protected function isValid($value)
    {
        return ($value !== null && $value !== '');
    }

    /**
     * @param $value
     * @throws \InvalidArgumentException
     */
    protected function onInvalid($value)
    {
        throw new \InvalidArgumentException('This value cannot be empty.');
    }

    public function __toString()
    {
        return $this->value;
    }
} 