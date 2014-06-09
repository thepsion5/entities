#Entities

A simple repository to aid in managing entities and value objects.

##Installation

Add thepsion5/menuizer as a requirement to your composer.json:

````{
    "require": {
        "thepsion5/entity" : "dev-master"
    }
}````
Then run composer update

##Entities

Add the EntityTrait to the relevant class:
````php
class User implements \Thepsion5\Entities\EntityInterface
{
    use \Thepsion5\Entities\EntityTrait;

    /* snip */
}
````

Now, your User class will have functions to get and set the ID. If there isn't an ID already defined
for this entity via `setId()`, a new uuid will automatically be generated automatically using
PHP's [uniqid function](php.net/uniqid).

##Value Objects

Creating a generic Value Object is as simple as creating a class and using the correct trait:
````php
class Title
{
    use \Thepsion5\Entities\Traits\SimpleValueObjectTrait;
}
````
Using them is equally simple:
````php
$title = new Title('This is a title');
$invalidTitle = new Title(''); //will throw an invalid argument exception
print $title; //converts the value back to a string
````
You can also define more complex rules for whether a VO is valid:

````php
class Email
{
    use \Thepsion5\Entities\Traits\SimpleValueObjectTrait;

    protected function isValid($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    protected function onInvalid($value)
    {
        throw new \InvalidArgumentException("The email [$value] is not a valid email address.");
    }
}
````

##Todo
* Documentation for Enums
* Implement generic Entity Collections
* Pre-defined value objects for common use-cases