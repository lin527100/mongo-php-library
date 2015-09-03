<?php

namespace MongoDB\Tests\Operation;

use MongoDB\Operation\ReplaceOne;

class ReplaceOneTest extends TestCase
{
    /**
     * @expectedException MongoDB\Exception\InvalidArgumentTypeException
     * @dataProvider provideInvalidDocumentValues
     */
    public function testConstructorFilterArgumentTypeCheck($filter)
    {
        new ReplaceOne($this->getDatabaseName(), $this->getCollectionName(), $filter, array('y' => 1));
    }

    /**
     * @expectedException MongoDB\Exception\InvalidArgumentTypeException
     * @dataProvider provideInvalidDocumentValues
     */
    public function testConstructorReplacementArgumentTypeCheck($replacement)
    {
        new ReplaceOne($this->getDatabaseName(), $this->getCollectionName(), array('x' => 1), $replacement);
    }

    /**
     * @expectedException MongoDB\Exception\InvalidArgumentException
     * @expectedExceptionMessage First key in $replacement argument is an update operator
     */
    public function testConstructorReplacementArgumentRequiresNoOperators()
    {
        new ReplaceOne($this->getDatabaseName(), $this->getCollectionName(), array('x' => 1), array('$set' => array('x' => 1)));
    }
}
