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

use CSDT\CSR3\Tests\CSR3PropertyDTOTest;
use CSDT\CSR3\Tests\Utils\TestProPropertyDTO;
use CSDT\CSR3\Abstracts\AbstractCSR3PropertyDTO;

/**
 * CSR3ProPropertyDTOTest.php
 *
 * This class validate the CSR3PropertyDTO logic in protected
 * class property use case.
 *
 * @category Test
 * @package  CSR3-DataTransferObject
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class CSR3ProPropertyDTOTest extends CSR3PropertyDTOTest
{

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
        $this->instance = new TestProPropertyDTO();
        $this->masterClass = AbstractCSR3PropertyDTO::class;
        $this->reflexClass = TestProPropertyDTO::class;
    }
}
