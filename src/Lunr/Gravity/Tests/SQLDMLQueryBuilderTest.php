<?php

/**
 * This file contains the SQLDMLQueryBuilderTest class.
 *
 * SPDX-FileCopyrightText: Copyright 2013 M2mobi B.V., Amsterdam, The Netherlands
 * SPDX-FileCopyrightText: Copyright 2022 Move Agency Group B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Gravity\Tests;

use Lunr\Gravity\SQLDMLQueryBuilder;
use Lunr\Halo\LunrBaseTest;
use ReflectionClass;

/**
 * This class contains common setup routines, providers
 * and shared attributes for testing the SQLDMLQueryBuilder class.
 *
 * @covers Lunr\Gravity\SQLDMLQueryBuilder
 */
abstract class SQLDMLQueryBuilderTest extends LunrBaseTest
{

     /**
     * TestCase Constructor.
     */
    public function setUp(): void
    {
        $this->class = $this->getMockBuilder('Lunr\Gravity\SQLDMLQueryBuilder')
                            ->getMockForAbstractClass();

        $this->reflection = new ReflectionClass('Lunr\Gravity\SQLDMLQueryBuilder');
    }

    /**
     * TestCase Destructor.
     */
    public function tearDown(): void
    {
        unset($this->class);
        unset($this->reflection);
    }

}

?>
