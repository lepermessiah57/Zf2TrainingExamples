<?php
/**
 * Created by PhpStorm.
 * User: matthill
 * Date: 2/14/14
 * Time: 8:36 AM
 */

namespace Calculator\Services;

class CalculatorTest extends \PHPUnit_Framework_TestCase {

    private $calculator;

    public function setUp(){
        $this->calculator = new Calculator();
    }

    public function testAdd1To1(){
        $operation = "1 + 1";
        $expected = 2;

        $actual = $this->calculator->calculateString($operation);

        $this->assertEquals($expected, $actual);
    }

    public function testAddNegative1To1(){
        $operation = "-1 + 1";
        $expected = 0;

        $actual = $this->calculator->calculateString($operation);

        $this->assertEquals($expected, $actual);
    }

    public function testAdd1To1WithVerbPlus(){
        $operation = "1 plus 1";
        $expected = 2;

        $actual = $this->calculator->calculateString($operation);

        $this->assertEquals($expected, $actual);
    }

    public function testSubtract1From2(){
        $operation = "1 - 2";
        $expected = -1;

        $actual = $this->calculator->calculateString($operation);

        $this->assertEquals($expected, $actual);
    }

    public function testMultiply5Times2(){
        $operation = "5 * 2";
        $expected = 10;

        $actual = $this->calculator->calculateString($operation);

        $this->assertEquals($expected, $actual);
    }

    public function testDivide10By2(){
        $operation = "10 / 2";
        $expected = 5;

        $actual = $this->calculator->calculateString($operation);

        $this->assertEquals($expected, $actual);
    }

}

 