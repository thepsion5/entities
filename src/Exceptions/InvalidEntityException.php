<?php
namespace Thepsion5\Entities\Exceptions;

class InvalidEntityException extends \InvalidArgumentException
{
    /**
     * @var array
     */
    protected $input = array();

    /**
     * @var array
     */
    protected $errors = array();

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return array
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param array $input
     */
    public function setInput(array $input)
    {
        $this->input = $input;
    }
} 