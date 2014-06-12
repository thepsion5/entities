#Entities
A simple package to aid in managing entities and value objects.

![Build Status](https://travis-ci.org/thepsion5/menuizer.svg?branch=master) [![Coverage Status](https://img.shields.io/coveralls/thepsion5/entities.svg)](https://coveralls.io/r/thepsion5/entities)

##Installation

Add thepsion5/menuizer as a requirement to your composer.json:

````json
{
    "require": {
        "thepsion5/entity" : "dev-master"
    }
}
````

Then run composer update.

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

##Entity Collections

The `GenericEntityCollection` class provides a simple API for creating and maintaining collections
of entities. Entities are automatically indexed by their IDs. Furthermore, the abstract class
`AbstractEntityCollection` class is provided so that typehinted custom entity classes can
be created:

````php
class UserCollection extends AbstractEntityCollection
{

    public function __construct(array $users)
    {
        foreach($users as $user) {
            $this->add($user);
        }
    }

    public function add(UserEntity $user)
    {
        return $this->addEntity($user);
    }

    public function get($id)
    {
        return $this->getEntity($id);
    }

    public function has($entityOrId)
    {
        return $this->hasEntity($id);
    }
}
````

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

##Enums

An Enum trait is provided to make the implementation and use of enums simpler. All that's needed
is to define class constants representing the enum values and then use the trait:

````php
class UserStatus
{
    use \Thepsion5\Entity\Traits\EnumTrait;

    const BANNED        = -1;
    const UNACTIVATED   = 1;
    const ACTIVATE      = 2;
}

UseStatus::toArray(); //['BANNED' => -1, 'UNACTIVATED' => 1, 'ACTIVATED' => 2]
$banned = UserStatus::BANNED();
$banned == new UserStatus(UserStatus::BANNED); //true
$banned->is('BANNED'); //true
````

##Todo
* Pre-defined value objects for common use-cases
