# Class Alias Maker
Class Alias Maker

## Usage
```php
class Person
{
    public function getFullName()
    {
        return 'Sohel Amin';
    }
}

class PersonFacade extends \Appzcoder\Aliasify\Facade
{
    public static function getFacadeAccessor()
    {
        return 'person';
    }
}

var_dump(PersonFacade::getFullName());
```

##Author

[Sohel Amin](http://www.sohelamin.com)
