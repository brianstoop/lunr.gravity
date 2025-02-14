<?php

/**
 * This file contains the MySQLQueryResultTest class.
 *
 * SPDX-FileCopyrightText: Copyright 2012 M2mobi B.V., Amsterdam, The Netherlands
 * SPDX-FileCopyrightText: Copyright 2022 Move Agency Group B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Gravity\MySQL\Tests;

use Lunr\Gravity\MySQL\MySQLQueryResult;
use Lunr\Halo\LunrBaseTest;
use ReflectionClass;
use mysqli;
use mysqli_result;

/**
 * This class contains common constructors/destructors and data providers
 * for testing the MySQLQueryResult class.
 *
 * @covers Lunr\Gravity\MySQL\MySQLQueryResult
 */
abstract class MySQLQueryResultTest extends LunrBaseTest
{

    /**
     * Query result
     * @var mixed
     */
    protected $query_result;

    /**
     * Instance of the mysqli class.
     * @var mysqli
     */
    protected $mysqli;

    /**
     * The executed query.
     * @var String
     */
    protected $query;

    /**
     * TestCase Constructor passing a MySQLi_result object.
     *
     * @return void
     */
    public function resultSetSetup(): void
    {
        $this->mysqli = new MockMySQLiSuccessfulConnection($this->getMockBuilder('\mysqli')->getMock());

        $this->query_result = new MockMySQLiResult($this->getMockBuilder('mysqli_result')
                                                        ->disableOriginalConstructor()
                                                        ->getMock());

        $this->query = 'SELECT * FROM table';

        $this->class = new MySQLQueryResult($this->query, $this->query_result, $this->mysqli);

        $this->reflection = new ReflectionClass('Lunr\Gravity\MySQL\MySQLQueryResult');
    }

    /**
     * TestCase Constructor passing FALSE as query result.
     *
     * @return void
     */
    public function failedSetup(): void
    {
        $this->query_result = FALSE;

        $this->mysqli = new MockMySQLiFailedConnection($this->getMockBuilder('\mysqli')->getMock());

        $this->query = 'SELECT * FROM table';

        $this->class = new MySQLQueryResult($this->query, $this->query_result, $this->mysqli);

        $this->reflection = new ReflectionClass('Lunr\Gravity\MySQL\MySQLQueryResult');
    }

    /**
     * TestCase Constructor passing TRUE as query result.
     *
     * @return void
     */
    public function successfulSetup(): void
    {
        $this->query_result = TRUE;

        $this->mysqli = new MockMySQLiSuccessfulConnection($this->getMockBuilder('\mysqli')->getMock());

        $this->query = 'SELECT * FROM table';

        $this->class = new MySQLQueryResult($this->query, $this->query_result, $this->mysqli);

        $this->reflection = new ReflectionClass('Lunr\Gravity\MySQL\MySQLQueryResult');
    }

    /**
     * TestCase Constructor passing a MySQLi_result object with warnings.
     *
     * @return void
     */
    public function warningSetup(): void
    {
        $this->mysqli = new MockMySQLiSuccessfulWarningConnection($this->getMockBuilder('\mysqli')->getMock());

        $this->query_result = new MockMySQLiResult($this->getMockBuilder('mysqli_result')
                                                        ->disableOriginalConstructor()
                                                        ->getMock());

        $this->query = 'SELECT * FROM table';

        $this->class = new MySQLQueryResult($this->query, $this->query_result, $this->mysqli);

        $this->reflection = new ReflectionClass('Lunr\Gravity\MySQL\MySQLQueryResult');
    }

    /**
     * TestCase Destructor.
     */
    public function tearDown(): void
    {
        unset($this->mysqli);
        unset($this->query_result);
        unset($this->query);
        unset($this->class);
        unset($this->reflection);
    }

}

?>
