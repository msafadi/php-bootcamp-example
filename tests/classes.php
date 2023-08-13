<?php

class Person
{
    public string $name;
    public readonly int $age;

    public static $country = 'Palestine';

    public function __construct(string $name, DateTime $birthday)
    {
        $this->name = $name;
        $this->age = date('Y') - $birthday->format('Y');
    }

    public static function getCountry(): string
    {
        return Person::$country;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setBirthday($birthday)
    {
        return $this;
    }
}

$person  = new Person('Mohammed', new DateTime('2000-10-10'));

$person->setName('Ahlam')
       ->setBirthday('2011-2-22');

$person2 = new Person('Ahmed', new DateTime('1999-11-11'));
$person3 = $person;
$person4 = &$person;
$person5 = clone $person;

$person->name = 'Ali';
//$person->age = 20;
echo $person->age;

//$person = null;
Person::$country = 'Jordan';

echo Person::getCountry();

echo '<pre>';
var_dump($person, $person2, $person3, $person4, $person5);







