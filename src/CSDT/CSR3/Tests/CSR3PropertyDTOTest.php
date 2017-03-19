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
namespace CSDT\CSR3\Tests;

use CSDT\CSR3\Tests\CSR3GenericDTOTest;
use CSDT\CSR3\Tests\Utils\TestPropertyDTO;
use CSDT\CSR3\Abstracts\AbstractCSR3PropertyDTO;

/**
 * CSR3PropertyDTOTest.php
 *
 * This class validate the CSR3PropertyDTO logic
 *
 * @category Test
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class CSR3PropertyDTOTest extends CSR3GenericDTOTest
{
    /**
     * Reflex class
     *
     * This property store the class to be used for reflexion.
     *
     * @var string
     */
    protected $reflexClass;

    /**
     * Array attributes provider
     *
     * This method return the data for the attribute tests
     *
     * @return array
     */
    public function arrayAttributesProvider() : array
    {
        return [
            [
                [
                    'title' => 'title_value',
                    'subject' => 'subject_value',
                    'number' => 16,
                    'class' => new \stdClass(),
                    'float' => 14.40,
                    'propertyA' => 'foo',
                    'propertyB' => 'bar'
                ]
            ]
        ];
    }

    /**
     * Set up
     *
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->instance = new TestPropertyDTO();
        $this->masterClass = AbstractCSR3PropertyDTO::class;
        $this->reflexClass = TestPropertyDTO::class;
    }

    /**
     * Set iteration attributes
     *
     * This method set the iteration attributes before a test
     *
     * @param array $attributes The attributes to set as attributes
     *
     * @return void
     */
    protected function setIterationAttributes(array $attributes)
    {
        $reflex = new \ReflectionClass($this->reflexClass);

        $innerAAttrProp = $reflex->getProperty('propertyA');
        $innerAAttrProp->setAccessible(true);
        $innerAAttrProp->setValue($this->instance, $attributes['propertyA']);

        $innerBAttrProp = $reflex->getProperty('propertyB');
        $innerBAttrProp->setAccessible(true);
        $innerBAttrProp->setValue($this->instance, $attributes['propertyB']);

        unset($attributes['propertyA']);
        unset($attributes['propertyB']);

        parent::setIterationAttributes($attributes);
    }

    /**
     * Validate attribute method
     *
     * This method validate that the instance has a property with a certain value
     *
     * @param array $attributes The attributes name to validate
     *
     * @return void
     */
    protected function validateAttributesMethod(array $attributes)
    {
        $this->assertEquals($attributes, $this->instance->getAttributes());

        unset($attributes['propertyA']);
        unset($attributes['propertyB']);

        $reflex = new \ReflectionClass($this->masterClass);
        $innerAttrProp = $reflex->getProperty(self::PROP_ATTRIBUTE);

        $innerAttrProp->setAccessible(true);
        $innerAttr = $innerAttrProp->getValue($this->instance);

        $this->assertEquals($attributes, $innerAttr);
    }

    /**
     * Validate attribute method
     *
     * This method validate that the instance has a property with a certain value
     *
     * @param string $attributeName  The attribute name to validate
     * @param mixed  $attributeValue The attribute value to validate
     *
     * @return void
     */
    protected function validateAttributeMethod(
        string $attributeName,
        $attributeValue
    ) {
        if (!in_array($attributeName, ['propertyA', 'propertyB'])) {
            parent::validateAttributeMethod($attributeName, $attributeValue);
        }
    }

    /**
     * Validate offset method
     *
     * This method validate that the instance has a property with a certain value
     *
     * @param string $attributeName  The attribute name to validate
     * @param mixed  $attributeValue The attribute value to validate
     *
     * @return void
     */
    protected function validateOffsetMethod(string $attributeName, $attributeValue)
    {
        if (!in_array($attributeName, ['propertyA', 'propertyB'])) {
            return parent::validateOffsetMethod($attributeName, $attributeValue);
        }

        $this->assertTrue(isset($this->instance[$attributeName]));

        $this->instance[$attributeName] = $attributeValue;

        $reflex = new \ReflectionClass($this->reflexClass);
        $innerAttrProp = $reflex->getProperty($attributeName);

        $innerAttrProp->setAccessible(true);
        $innerAttr = $innerAttrProp->getValue($this->instance);

        $this->assertEquals($attributeValue, $innerAttr);

        $this->assertEquals($attributeValue, $this->instance[$attributeName]);

        unset($this->instance[$attributeName]);

        $innerAttr = $innerAttrProp->getValue($this->instance);
        $this->assertNull($innerAttr);

        $this->assertTrue(isset($this->instance[$attributeName]));
    }
}
