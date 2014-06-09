<?php
namespace Thepsion5\Entities\Traits;

trait EnumTrait
{
    use SimpleValueObjectTrait;

    /**
     * @return array
     */
    public static function toArray()
    {
        $rc = new \ReflectionClass(get_called_class());
        return $rc->getConstants();
    }

    /**
     * @param $value
     * @return bool
     */
    protected function isValid($value)
    {
        $enums = static::toArray();
        return in_array($value, $enums);
    }

    /**
     * @param $label
     * @throws \InvalidArgumentException
     */
    protected static function validateLabel($label)
    {
        $enums = static::toArray();
        if(!array_key_exists($label, $enums)) {
            throw new \InvalidArgumentException("The label [$label] is not valid for this enum.");
        }
    }

    /**
     * @param $label
     * @return bool
     */
    public function is($label)
    {
        static::validateLabel($label);
        $enums = static::toArray();
        return ($this->value == $enums[$label]);
    }

    public static function __callStatic($name, $args)
    {
        $enums = static::toArray();
        static::validateLabel($name);
        return new static($enums[$name]);
    }
} 