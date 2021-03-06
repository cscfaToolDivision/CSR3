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
 * TestPropertyDTO.php
 *
 * The test property dto allow to validate the PropertyDTO logic
 *
 * @category Test
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
final class TestPropertyDTO extends AbstractCSR3PropertyDTO
{

    /**
     * PropertyA
     *
     * This property is a test property
     *
     * @var mixed
     */
    public $propertyA;

    /**
     * PropertyB
     *
     * This property is a test property
     *
     * @var mixed
     */
    public $propertyB;
}
