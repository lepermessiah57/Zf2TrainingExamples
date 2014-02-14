<?php


namespace Calculator\Services;


abstract class OperationTestCase extends \PHPUnit_Framework_TestCase{

    protected $operation;

    public function setUp(){
        $this->operation = $this->getOperation();
    }

    abstract function getOperation();

    public function testIsAnOperation(){
        $this->assertInstanceOf('Calculator\Services\Operation', $this->operation);
    }
}