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
        if (property_exists($this, $attributeName)) {
            $this->$attributeName = $attributeValue;

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
        if (property_exists($this, $attributeName)) {
            return $this->$attributeName;
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
            if (property_exists($this, $attributeName)) {
                $this->setAttribute($attributeName, $attributeValue);
                continue;
            }

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
        $validArray = [
            $this->attributeContainer,
            $this->positionContainer,
            'attributeContainer',
            'positionContainer',
        ];

        foreach (get_object_vars($this) as $propertyName => $propertyValue) {
            if (in_array($propertyName, $validArray)) {
                continue;
            }

            $attributes[$propertyName] = $propertyValue;
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
        if (property_exists($this, $offset)) {
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
        if (property_exists($this, $offset)) {
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
     * @return void
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
}
