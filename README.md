# CSR3 Data Transfer Object

This project is the PHP implementation of the **[csr3 specification](https://github.com/cscfaCsrDivision/CSR-3_DataTransferObject)**.

The data transfer objects are elements used to encapsulate the data when they must go through multiple elements of an application. The DTO acts as a container.

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/904a363e-f5bd-4fd4-a5c3-18ef2e523d13/big.png)](https://insight.sensiolabs.com/projects/904a363e-f5bd-4fd4-a5c3-18ef2e523d13)

## Basic usage

The CSR3 project define a generic DTO object :

```php
use CSDT\CSR3\CSR3GenericDTO;

$dto = new CSR3GenericDTO();
```

The CSR3GenericDTO is an instance that implement CSR3DTOInterface. This interface extend ArrayAccess and Iterator interfaces.

###### The ArrayAccess iplementation

By using the ArrayAccess interface, the CSR3GenericDTO allow to be used as an array.

```php
// ...

if (isset($user) && !empty($user)) {
    $dto['user_instance'] = $user;
}

// ...

if (isset($dto['user_instance']) {
    $user = $dto['user_instance'];
    
    if ($user->isLocked()) {
        unset($dto['user_instance']);
    }
}

```

###### The Iterator iplementation

By using the Iterator interface, the CSR3GenericDTO allow to be used as an iterator.

```php
$dto['hell'] = 'o w';
$dto['or'] = 'ld';

foreach ($dto as $key => $value) {
    echo $key . $value;
}

// Output : "hello world"
```

###### The CSR3DTOInterface iplementation

The CSR3DTOInterface is the default access feature of the CSR3 DTOs. It allow to set and get attributes.

```php
$dto->setAttributes(['a' => 1, 'b' => 2]);

var_dump($dto->getAttributes());
/* array(2) {
  ["a"]=>
  int(1)
  ["b"]=>
  int(2)
} */


$dto->setAttribute('a', 3);

var_dump($dto->getAttribute('b')); // int(2)
var_dump($dto->getAttributes());
/* array(2) {
  ["a"]=>
  int(3)
  ["b"]=>
  int(2)
} */
```

## Adding custom methods

The CSR3GenericDTO is a final class and cannot be extended as it. But it extend an abstract class : the __AbstractCSR3DTO__ that define all the logic needed to implement the __CSR3DTOInterface__.

Imagine you want to create a DTO that store a specific context and you want to be able to retreive this by a method call. You can create a DTO class as the following :

```php
use CSDT\CSR3\Abstracts\AbstractCSR3DTO;

class ContextDTO extends AbstractCSR3DTO
{
    public function setContext($context)
    {
        $this['context'] = $context;
    }
    
    public function getContext($context)
    {
        return $this['context'] ?? [];
    }
}
```

## Using custom class properties

As seen in the custom method addition, you'll must create your own class :

```php
use CSDT\CSR3\Abstracts\AbstractCSR3DTO;

class ContextDTO extends AbstractCSR3DTO
{
    protected $context = [];

    public function setContext($context)
    {
        $this->context = $context;
    }
    
    public function getContext($context)
    {
        return $this->context;
    }
}
```

The problem yu will discover by using this custom class is that the ArrayAccess and iterator property are not able to handle the `$context` property. To avoid this issue, you'll need to extend the `AbstractCSR3PropertyDTO` instead of the `AbstractCSR3DTO`.

```php
use CSDT\CSR3\Abstracts\AbstractCSR3DTO;

class ContextDTO extends AbstractCSR3PropertyDTO
{
    protected $context = [];

    public function setContext($context)
    {
        $this->['context'] = $context;
    }
    
    public function getContext($context)
    {
        return $this['context'];
    }
}
```

:anger: Note the AbstractCSR3PropertyDTO is not able to process private properties as it. This is in fact the POO structure of the PHP.

#### Using private properties

To be able to manage the private properties of your DTO's, you'll must override three methods of the `AbstractCSR3PropertyDTO` :


```php
use CSDT\CSR3\Abstracts\AbstractCSR3DTO;

class ContextDTO extends AbstractCSR3PropertyDTO
{
    private $context = [];
    
    protected function getProperties() : array
    {
        return array_merge(
            parent::getProperties(),
            ['context']
        );
    }
    
    protected function setProperty(string $propertyName, $propertyValue)
    {
        if ($propertyName == 'context') {
            $this->setContext($propertyValue);
            return $this;
        }

        return parent::setProperty($propertyName, $propertyValue);
    }

    protected function getProperty(string $propertyName)
    {
        if (propertyName == 'context') {
            return $this->getContext();
        }

        return parent::getProperty($propertyName);
    }

    public function setContext($context)
    {
        $this->context = $context;
    }
    
    public function getContext($context)
    {
        return $this->context;
    }
}
```

:grey_exclamation: These three methods work in cooperation and cannot be override without the other to enable the fully private property support.

## Internal key-words and how to override them

The `AbstractCSR3DTO` and `AbstractCSR3PropertyDTO` defines an __attributes__ and __traversingPosition__ properties. The first one store the attributes of the DTO, the second store the internal iteration pointer. It is possible to override them by setting a __attributeContainer__ and a __positionContainer__ properties that store the attributes names to use instead of the two initial properties.

:anger: The __attributeContainer__ and __positionContainer__ properties are key-words and cannot be overrides.

## Using logic without CSR3 interfaces

The complete logic of this implementation is encapsulated inside a `CSR3DTOTrait` and a `CSR3PropertyDTOTrait`.

```php
use CSDT\CSR3\Traits\CSR3DTOTrait;

class AttributeDTO
{
    use CSR3DTOTrait;

    private $attributes = [];
    
    private $traversingPosition = 0;
}
```

```php
use CSDT\CSR3\Traits\CSR3DTOPropertyTrait;

class ContextDTO
{
    use CSR3DTOPropertyTrait;

    private $attributes = [];
    
    private $traversingPosition = 0;
    
    private $context = [];
    
    protected function getProperties() : array
    {
        return array_merge(
            parent::getProperties(),
            ['context']
        );
    }
    
    protected function setProperty(string $propertyName, $propertyValue)
    {
        if ($propertyName == 'context') {
            $this->setContext($propertyValue);
            return $this;
        }

        return parent::setProperty($propertyName, $propertyValue);
    }

    protected function getProperty(string $propertyName)
    {
        if (propertyName == 'context') {
            return $this->getContext();
        }

        return parent::getProperty($propertyName);
    }

    public function setContext($context)
    {
        $this->context = $context;
    }
    
    public function getContext($context)
    {
        return $this->context;
    }
}
```
