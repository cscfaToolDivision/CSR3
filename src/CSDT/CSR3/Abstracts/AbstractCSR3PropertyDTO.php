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
use CSDT\CSR3\Traits\CSR3PropertyDTOTrait;

/**
 * AbstractCSR3PropertyDTO.php
 *
 * The AbstractCSR3PropertyDTO define the base implémentation of the
 * CSR3DTOInterface with property definition capability
 *
 * @category Abstract
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class AbstractCSR3PropertyDTO implements CSR3DTOInterface
{
    use CSR3PropertyDTOTrait;

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
