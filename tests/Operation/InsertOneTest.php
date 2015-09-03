<?php

namespace MongoDB\Tests\Operation;

use MongoDB\Operation\InsertOne;

class InsertOneTest extends TestCase
{
    /**
     * @expectedException MongoDB\Exception\InvalidArgumentTypeException
     * @dataProvider provideInvalidDocumentValues
     */
    public function testConstructorDocumentArgumentTypeCheck($document)
    {
        new InsertOne($this->getDatabaseName(), $this->getCollectionName(), $document);
    }

    /**
     * @expectedException MongoDB\Exception\InvalidArgumentTypeException
     * @dataProvider provideInvalidConstructorOptions
     */
    public function testConstructorOptionTypeChecks(array $options)
    {
        new InsertOne($this->getDatabaseName(), $this->getCollectionName(), array('x' => 1), $options);
    }

    public function provideInvalidConstructorOptions()
    {
        $options = array();

        foreach ($this->getInvalidWriteConcernValues() as $value) {
            $options[][] = array('writeConcern' => $value);
        }

        return $options;
    }
}
