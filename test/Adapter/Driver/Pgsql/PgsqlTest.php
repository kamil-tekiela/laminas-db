<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\Db\Adapter\Driver\Pgsql;

use Laminas\Db\Adapter\Driver\Pgsql\Pgsql;

class PgsqlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Pgsql
     */
    protected $pgsql = null;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->pgsql = new Pgsql(array());
    }

    /**
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::checkEnvironment
     */
    public function testCheckEnvironment()
    {
        if (!extension_loaded('pgsql')) {
            $this->setExpectedException('Laminas\Db\Adapter\Exception\RuntimeException');
        }
        $this->pgsql->checkEnvironment();
        $this->assertTrue(true, 'No exception was thrown');
    }

    /**
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::registerConnection
     */
    public function testRegisterConnection()
    {
        $mockConnection = $this->getMockForAbstractClass('Laminas\Db\Adapter\Driver\Pgsql\Connection', array(array()), '', true, true, true, array('setDriver'));
        $mockConnection->expects($this->once())->method('setDriver')->with($this->equalTo($this->pgsql));
        $this->assertSame($this->pgsql, $this->pgsql->registerConnection($mockConnection));
    }

    /**
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::registerStatementPrototype
     */
    public function testRegisterStatementPrototype()
    {
        $this->pgsql = new Pgsql(array());
        $mockStatement = $this->getMockForAbstractClass('Laminas\Db\Adapter\Driver\Pgsql\Statement', array(), '', true, true, true, array('setDriver'));
        $mockStatement->expects($this->once())->method('setDriver')->with($this->equalTo($this->pgsql));
        $this->assertSame($this->pgsql, $this->pgsql->registerStatementPrototype($mockStatement));
    }

    /**
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::registerResultPrototype
     */
    public function testRegisterResultPrototype()
    {
        $this->pgsql = new Pgsql(array());
        $mockStatement = $this->getMockForAbstractClass('Laminas\Db\Adapter\Driver\Pgsql\Result', array(), '', true, true, true, array('setDriver'));
        $this->assertSame($this->pgsql, $this->pgsql->registerResultPrototype($mockStatement));
    }

    /**
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::getDatabasePlatformName
     */
    public function testGetDatabasePlatformName()
    {
        $this->pgsql = new Pgsql(array());
        $this->assertEquals('Postgresql', $this->pgsql->getDatabasePlatformName());
        $this->assertEquals('PostgreSQL', $this->pgsql->getDatabasePlatformName(Pgsql::NAME_FORMAT_NATURAL));
    }

    /**
     * @depends testRegisterConnection
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::getConnection
     */
    public function testGetConnection($mockConnection)
    {
        $conn = new \Laminas\Db\Adapter\Driver\Pgsql\Connection(array());
        $this->pgsql->registerConnection($conn);
        $this->assertSame($conn, $this->pgsql->getConnection());
    }

    /**
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::createStatement
     * @todo   Implement testGetPrepareType().
     */
    public function testCreateStatement()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::createResult
     * @todo   Implement testGetPrepareType().
     */
    public function testCreateResult()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::getPrepareType
     * @todo   Implement testGetPrepareType().
     */
    public function testGetPrepareType()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::formatParameterName
     * @todo   Implement testFormatParameterName().
     */
    public function testFormatParameterName()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Laminas\Db\Adapter\Driver\Pgsql\Pgsql::getLastGeneratedValue
     * @todo   Implement testGetLastGeneratedValue().
     */
    public function testGetLastGeneratedValue()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
