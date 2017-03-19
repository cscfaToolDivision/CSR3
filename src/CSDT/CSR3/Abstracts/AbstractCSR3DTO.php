<?php
/**
 * This file is part of CSR3-DataTransferObject.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.1
 *
 * @category Abstract
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR3\Abstracts;

use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR3\Traits\CSR3DTOTrait;

/**
 * AbstractCSR3DTO.php
 *
 * The AbstractCSR3DTO abstract class define the basic usage of the CSR3DTOInterface
 *
 * @category Abstract
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractCSR3DTO implements CSR3DTOInterface
{
    use CSR3DTOTrait;

    /**
     * Attributes
     *
     * This property store the attributes of the DTO
     *
     * @var                                        array
     * @SuppressWarnings(PHPMD.UnusedPrivateField)
     */
    private $attributes = [];

    /**
     * Traversing position
     *
     * This property store the current traversing position of the DTO
     *
     * @var                                        integer
     * @SuppressWarnings(PHPMD.UnusedPrivateField)
     */
    private $traversingPosition = 0;
}
