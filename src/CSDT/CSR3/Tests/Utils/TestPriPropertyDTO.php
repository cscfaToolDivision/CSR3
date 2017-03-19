<?php
/**
 * This file is part of CSR3-DataTransferObject.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.1
 *
 * @category Test
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR3\Tests\Utils;

use CSDT\CSR3\Abstracts\AbstractCSR3PropertyDTO;

/**
 * TestPriPropertyDTO.php
 *
 * The test property dto allow to validate the PropertyDTO logic in
 * private properties use case.
 *
 * @category Test
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
final class TestPriPropertyDTO extends AbstractCSR3PropertyDTO
{

    /**
     * PropertyA
     *
     * This property is a test property
     *
     * @var mixed
     */
    private $propertyA;

    /**
     * PropertyB
     *
     * This property is a test property
     *
     * @var mixed
     */
    private $propertyB;

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
        $privateArray = ['propertyA', 'propertyB'];

        return array_merge(
            parent::getProperties(),
            $privateArray
        );
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
        if (in_array($propertyName, ['propertyA', 'propertyB'])) {
            $method = 'set'.ucfirst($propertyName);
            $this->$method($propertyValue);
            return $this;
        }

        return parent::setProperty($propertyName, $propertyValue);
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
        if (in_array($propertyName, ['propertyA', 'propertyB'])) {
            $method = 'get'.ucfirst($propertyName);
            return $this->$method();
        }

        return parent::getProperty($propertyName);
    }

    /**
     * Get propertyA
     *
     * This method return the value of the propertyA
     *
     * @return mixed
     */
    public function getPropertyA()
    {
        return $this->propertyA;
    }

    /**
     * Set propertyA
     *
     * This method inject a given value into the propertyA
     *
     * @param mixed $propertyA The value to inject into the propertyA
     *
     * @return $this
     */
    public function setPropertyA($propertyA)
    {
        $this->propertyA = $propertyA;
        return $this;
    }

    /**
     * Get propertyB
     *
     * This method return the value of the propertyB
     *
     * @return mixed
     */
    public function getPropertyB()
    {
        return $this->propertyB;
    }

    /**
     * Set propertyB
     *
     * This method inject a given value into the propertyB
     *
     * @param mixed $propertyB The value to inject into the propertyB
     *
     * @return $this
     */
    public function setPropertyB($propertyB)
    {
        $this->propertyB = $propertyB;
        return $this;
    }
}
