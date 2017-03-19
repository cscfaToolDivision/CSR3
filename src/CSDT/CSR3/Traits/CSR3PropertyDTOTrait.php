<?php
/**
 * This file is part of CSR3-DataTransferObject.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.1
 *
 * @category Trait
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR3\Traits;

use CSDT\CSR3\Interfaces\CSR3DTOInterface;

/**
 * CSR3PropertyDTOTrait.php
 *
 * The CSR3PropertyDTOTrait allow to use custom DTO with properties as attribute
 *
 * @category Trait
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait CSR3PropertyDTOTrait
{
    /**
     * Attribute container
     *
     * This property store the attribute container property name
     *
     * @var string
     */
    protected $attributeContainer = 'attributes';

    /**
     * Position container
     *
     * This property store the position container property name
     *
     * @var string
     */
    protected $positionContainer = 'traversingPosition';

    /**
     * Set attribute
     *
     * This method allow to set or add an attribute to the DTO
     *
     * @param string $attributeName  The attribute to set
     * @param mixed  $attributeValue The value to set
     *
     * @return $this
     */
    public function setAttribute(
        string $attributeName,
        $attributeValue
    ): CSR3DTOInterface {
        if ($this->propertyExist($attributeName)) {
            $this->setProperty($attributeName, $attributeValue);
            return $this;
        }

        $this->{$this->attributeContainer}[$attributeName] = $attributeValue;

        return $this;
    }

    /**
     * Get attribute
     *
     * This method allow to retreive a value from a named attribute of the DTO
     *
     * @param string $attributeName The name of the attribute whence return the value
     *
     * @return mixed
     */
    public function getAttribute(string $attributeName)
    {
        if ($this->propertyExist($attributeName)) {
            return $this->getProperty($attributeName);
        }

        if (isset($this[$attributeName])) {
            return $this->{$this->attributeContainer}[$attributeName];
        }

        return null;
    }

    /**
     * Set attributes
     *
     * This method allow to set the attributes of the DTO from an associative array
     *
     * @param array $attributes The associative array of attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes) : CSR3DTOInterface
    {
        foreach ($attributes as $attributeName => $attributeValue) {
            $this->setAttribute($attributeName, $attributeValue);
        }

        return $this;
    }

    /**
     * Get attributes
     *
     * This method return the attributes as array from the DTO
     *
     * @return array
     */
    public function getAttributes(): array
    {
        $attributes = $this->{$this->attributeContainer};

        foreach ($this->getProperties() as $propertyName) {
            $attributes[$propertyName] = $this->getProperty($propertyName);
        }

        return $attributes;
    }

    /**
     * Offset exist
     *
     * This method validate the existence of an offset
     *
     * @param mixed $offset The offset to validate
     *
     * @return bool
     */
    public function offsetExists($offset) : bool
    {
        if ($this->propertyExist($offset)) {
            return true;
        }

        return isset($this->{$this->attributeContainer}[$offset]);
    }

    /**
     * Offset get
     *
     * This method return an offset value
     *
     * @param mixed $offset The offset whence retreive the value
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->getAttribute($offset);
    }

    /**
     * Offset set
     *
     * This method allow to set a value at an offset place
     *
     * @param mixed $offset The offset where set the value
     * @param mixed $value  The value to inject
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->setAttribute($offset, $value);
    }

    /**
     * Offset unset
     *
     * This method remove an offset
     *
     * @param mixed $offset The offset to remove
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        if ($this->propertyExist($offset)) {
            $this->setAttribute($offset, null);
        }

        unset($this->{$this->attributeContainer}[$offset]);
    }

    /**
     * Current
     *
     * This method return the current iterated value
     *
     * @return mixed
     */
    public function current()
    {
        return $this->getAttributes()[$this->key()];
    }

    /**
     * Next
     *
     * This method advance the internal pointer by one step
     *
     * @return void
     */
    public function next()
    {
        $this->{$this->positionContainer} ++;
    }

    /**
     * Key
     *
     * This method return the current iterated key
     *
     * @return string
     */
    public function key()
    {
        return array_keys($this->getAttributes())[$this->{$this->positionContainer}];
    }

    /**
     * Valid
     *
     * This method validate the current internal position existence
     *
     * @return bool
     */
    public function valid() : bool
    {
        return isset(
            array_keys($this->getAttributes())[$this->{$this->positionContainer}]
        );
    }

    /**
     * Rewind
     *
     * This method reinitialize the internal position
     *
     * @return void
     */
    public function rewind()
    {
        $this->{$this->positionContainer} = 0;
    }

    /**
     * Property exist
     *
     * This method validate that a given property name is part of the current class.
     * This validation allow to the DTO to store a value direcly into an object
     * property instead of the default storage array.
     *
     * @param string $propertyName The name of the property to check
     *
     * @return boolean
     */
    protected function propertyExist(string $propertyName) : bool
    {
        return in_array($propertyName, $this->getProperties());
    }

    /**
     * Get properties
     *
     * This method return the existants properties of the current DTO object. It
     * unset the attribute management properties to allow the only return  of
     * storage properties.
     *
     * By overriding it you can specify any private properties that you want to use
     * inside the final DTO object. This feature must be used with the override of
     * the setProperty() method and getProperty() method.
     *
     * exemple :
     * <pre>
     * protected function getProperties()
     * {
     *      $privateArray = ['propA', 'propB'];
     *
     *      return array_merge(
     *          parent::getProperties(),
     *          $privateArray
     *      );
     * }
     * </pre>
     *
     * @return array
     */
    protected function getProperties() : array
    {
        $invalidArray = [
            $this->attributeContainer,
            $this->positionContainer,
            'attributeContainer',
            'positionContainer',
        ];

        return array_diff(array_keys(get_class_vars(static::class)), $invalidArray);
    }

    /**
     * Set property
     *
     * This method inject a value into an existing class property. This offer to the
     * DTO to store a value into object properties since current attribute
     * container.
     *
     * By overriding this method you can store a value into a private class
     * property. This feature must be used in addition with the override of
     * the getProperties() method and getProperty() method.
     *
     * exemple :
     * <pre>
     * protected function setProperty(string $propertyName, $propertyValue)
     * {
     *      if (in_array($propertyName, ['privatePropA', 'privatePropB'])) {
     *          $method = 'set'.ucfirst($propertyName);
     *          $this->$method($propertyValue);
     *          return $this;
     *      }
     *
     *      return parent::setProperty($propertyName, $propertyValue);
     * }
     * </pre>
     *
     * @param string $propertyName  The property name where inject the value
     * @param mixed  $propertyValue The value to inject inside the property
     *
     * @return $this
     */
    protected function setProperty(string $propertyName, $propertyValue)
    {
        $this->{$propertyName} = $propertyValue;

        return $this;
    }

    /**
     * Get property
     *
     * This method return a value contained into any existing property of the
     * current DTO.
     *
     * By overriding this method you can extract a value from a private class
     * property. This feature must be used with the override of the getProperties()
     * method and setProperty() method.
     *
     * exemple :
     * <pre>
     * protected function getProperty(string $propertyName)
     * {
     *      if (in_array($propertyName, ['privatePropA', 'privatePropB'])) {
     *          $method = 'get'.ucfirst($propertyName);
     *          return $this->$method();
     *      }
     *
     *      return parent::getProperty($propertyName);
     * }
     * </pre>
     *
     * @param string $propertyName The property whence extract the value
     *
     * @return mixed
     */
    protected function getProperty(string $propertyName)
    {
        return $this->{$propertyName};
    }
}
