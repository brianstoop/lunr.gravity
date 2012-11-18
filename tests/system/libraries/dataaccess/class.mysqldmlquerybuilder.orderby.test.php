<?php

/**
 * This file contains the MySQLDMLQueryBuilderOrderByTest class.
 *
 * PHP Version 5.3
 *
 * @category   Libraries
 * @package    DataAccess
 * @subpackage Tests
 * @author     Olivier Wizen <olivier@m2mobi.com>
 * @copyright  2012, M2Mobi BV, Amsterdam, The Netherlands
 * @license    http://lunr.nl/LICENSE MIT License
 */

namespace Lunr\Libraries\DataAccess;

/**
 * This class contains the tests for the query parts necessary to build
 * order by statements.
 *
 * @category   Libraries
 * @package    DataAccess
 * @subpackage Tests
 * @author     Olivier Wizen <olivier@m2mobi.com>
 * @covers     Lunr\Libraries\DataAccess\MySQLDMLQueryBuilder
 */
class MySQLDMLQueryBuilderOrderByTest extends MySQLDMLQueryBuilderTest
{

    /**
     * Test specifying the order by part of a query.
     *
     * @covers  Lunr\Libraries\DataAccess\MysqlDMLQueryBuilder::order_by
     */
    public function testOrderByWithDefaultOrder()
    {
        $property = $this->builder_reflection->getProperty('order_by');
        $property->setAccessible(TRUE);

        $this->builder->order_by('col');

        $this->assertEquals('ORDER BY col ASC', $property->getValue($this->builder));
    }

    /**
     * Test specifying the order by part of a query.
     *
     * @covers  Lunr\Libraries\DataAccess\MysqlDMLQueryBuilder::order_by
     */
    public function testOrderByWithCustomOrder()
    {
        $property = $this->builder_reflection->getProperty('order_by');
        $property->setAccessible(TRUE);

        $this->builder->order_by('col', FALSE);

        $this->assertEquals('ORDER BY col DESC', $property->getValue($this->builder));
    }

    /**
     * Test fluid interface of the order_by method.
     *
     * @covers  Lunr\Libraries\DataAccess\MySQLDMLQueryBuilder::order_by
     */
    public function testOrderByReturnsSelfReference()
    {
        $return = $this->builder->order_by( 'col' );

        $this->assertInstanceOf('Lunr\Libraries\DataAccess\MySQLDMLQueryBuilder', $return);
        $this->assertSame($this->builder, $return);
    }

}
