<?php
/**
 * This file is part of CSR3-DataTransferObject.
 *
 * As each files provides by CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category Interface
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR3\Interfaces;

/**
 * CSR3DTOInterface
 *
 * The CSR3DTOInterface define the base CSR3 data transfer object
 * interfae.
 *
 * @category Interface
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface CSR3DTOInterface extends \ArrayAccess, \Iterator
{
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
    ) : CSR3DTOInterface ;

    /**
     * Get attribute
     *
     * This method allow to retreive a value from a named attribute of the DTO
     *
     * @param string $attributeName The name of the attribute whence return the value
     *
     * @return mixed
     */
    public function getAttribute(string $attributeName);

    /**
     * Set attributes
     *
     * This method allow to set the attributes of the DTO from an associative array
     *
     * @param array $attributes The associative array of attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes) : CSR3DTOInterface ;

    /**
     * Get attributes
     *
     * This method return the attributes as array from the DTO
     *
     * @return array
     */
    public function getAttributes() : array ;
}
