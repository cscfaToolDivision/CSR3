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

use PHPUnit\Framework\TestCase;
use CSDT\CSR3\CSR3GenericDTO;
use CSDT\CSR3\Abstracts\AbstractCSR3DTO;

/**
 * CSR3GenericDTOTest.php
 *
 * The CSR3GenericDTOTest validate the CSR3GenericDTO logic
 *
 * @category Test
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class CSR3GenericDTOTest extends TestCase
{

    /**
     * PROP_ATTRIBUTE
     *
     * The attribute property name
     *
     * @var string
     */
    const PROP_ATTRIBUTE = 'attributes';

    /**
     * PROP_POSITION
     *
     * The traversingPosition property name
     *
     * @var string
     */
    const PROP_POSITION = 'traversingPosition';

    /**
     * Instance
     *
     * The tested instance
     *
     * @var CSR3GenericDTO
     */
    protected $instance;

    /**
     * Master class
     *
     * The tested instance master class
     *
     * @var string
     */
    protected $masterClass;

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
                    'float' => 14.40
                ]
            ]
        ];
    }

    /**
     * Test attributes method
     *
     * This method validate the CSR3GenericDTO attributes methods
     *
     * @param array $attributes The attributes to set as attributes
     *
     * @dataProvider arrayAttributesProvider
     * @return       void
     */
    public function testAttributesMethod(array $attributes)
    {
        $this->instance->setAttributes($attributes);

        $this->validateAttributesMethod($attributes);
    }

    /**
     * Test attribute method
     *
     * This method validate the CSR3GenericDTO attribute methods
     *
     * @param array $attributes The attributes to set as attributes
     *
     * @dataProvider arrayAttributesProvider
     * @return       void
     */
    public function testAttributeMethod(array $attributes)
    {
        foreach ($attributes as $attributeName => $attributeValue) {
            $this->validateAttributeMethod($attributeName, $attributeValue);
        }

        $tname = '';
        while (in_array($tname = md5(random_bytes(5)), array_keys($attributes))) {
        }

        $this->assertNull($this->instance->getAttribute($tname));
    }

    /**
     * Test offset methods
     *
     * This method validate the CSR3GenericDTO offset methods
     *
     * @param array $attributes The attributes to set as offset
     *
     * @dataProvider arrayAttributesProvider
     * @return       void
     */
    public function testOffsetMethods(array $attributes)
    {
        foreach ($attributes as $attributeName => $attributeValue) {
            $this->validateOffsetMethod($attributeName, $attributeValue);
        }
    }

    /**
     * Test iteration methods
     *
     * This method validate the CSR3GenericDTO iteration methods
     *
     * @param array $attributes The attributes to set as attributes
     *
     * @dataProvider arrayAttributesProvider
     * @return       void
     */
    public function testIterationMethods(array $attributes)
    {
        $this->setIterationAttributes($attributes);

        $attrIndex = 0;
        $initAttributeKeys = array_keys($attributes);
        foreach ($this->instance as $attributeName => $attributeValue) {
            $this->validateIterationValue(
                $attributes,
                $initAttributeKeys,
                $attributeName,
                $attributeValue,
                $attrIndex
            );

            $attrIndex++;
        }

        $this->assertFalse(isset($initAttributeKeys[$attrIndex]));

        $this->instance->rewind();

        $reflex = new \ReflectionClass($this->masterClass);
        $innerPosProp = $reflex->getProperty(self::PROP_POSITION);
        $innerPosProp->setAccessible(true);
        $this->assertEquals(0, $innerPosProp->getValue($this->instance));
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
        $reflex = new \ReflectionClass($this->masterClass);
        $innerAttrProp = $reflex->getProperty(self::PROP_ATTRIBUTE);

        $innerAttrProp->setAccessible(true);
        $innerAttrProp->setValue($this->instance, $attributes);
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
        $this->instance = new CSR3GenericDTO();
        $this->masterClass = AbstractCSR3DTO::class;
    }

    /**
     * Validate iteration value
     *
     * This method perfor a validation under an iteration result
     *
     * @param array  $attributes        The attributes to use as setter
     * @param array  $initAttributeKeys The initial attributes keys
     * @param string $attributeName     The current attribute name to validate
     * @param mixed  $attributeValue    The current attribute value to validate
     * @param int    $attrIndex         The current validation index
     *
     * @return void
     */
    protected function validateIterationValue(
        array $attributes,
        array $initAttributeKeys,
        string $attributeName,
        $attributeValue,
        int $attrIndex
    ) {
        $this->assertTrue(isset($initAttributeKeys[$attrIndex]));
        $initAttributeKey = $initAttributeKeys[$attrIndex];

        $this->assertEquals($initAttributeKey, $attributeName);

        $initAttributeValue = $attributes[$initAttributeKey];
        $this->assertEquals($initAttributeValue, $attributeValue);
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
        $this->assertFalse(isset($this->instance[$attributeName]));

        $this->instance[$attributeName] = $attributeValue;

        $this->assertTrue(isset($this->instance[$attributeName]));

        $reflex = new \ReflectionClass($this->masterClass);
        $innerAttrProp = $reflex->getProperty(self::PROP_ATTRIBUTE);

        $innerAttrProp->setAccessible(true);
        $innerAttr = $innerAttrProp->getValue($this->instance);

        $this->assertArrayHasKey($attributeName, $innerAttr);
        $this->assertEquals($attributeValue, $innerAttr[$attributeName]);

        $this->assertEquals($attributeValue, $this->instance[$attributeName]);

        unset($this->instance[$attributeName]);

        $innerAttr = $innerAttrProp->getValue($this->instance);
        $this->assertArrayNotHasKey($attributeName, $innerAttr);

        $this->assertFalse(isset($this->instance[$attributeName]));
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
        $this->instance->setAttribute($attributeName, $attributeValue);

        $reflex = new \ReflectionClass($this->masterClass);
        $innerAttrProp = $reflex->getProperty(self::PROP_ATTRIBUTE);

        $innerAttrProp->setAccessible(true);
        $innerAttr = $innerAttrProp->getValue($this->instance);

        $this->assertArrayHasKey($attributeName, $innerAttr);
        $this->assertEquals($attributeValue, $innerAttr[$attributeName]);

        $this->assertEquals(
            $attributeValue,
            $this->instance->getAttribute($attributeName)
        );
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
        $reflex = new \ReflectionClass($this->masterClass);
        $innerAttrProp = $reflex->getProperty(self::PROP_ATTRIBUTE);

        $innerAttrProp->setAccessible(true);
        $innerAttr = $innerAttrProp->getValue($this->instance);

        $this->assertEquals($attributes, $innerAttr);

        $this->assertEquals($attributes, $this->instance->getAttributes());
    }
}
