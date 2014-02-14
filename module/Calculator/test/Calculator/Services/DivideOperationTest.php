<?php
/**
 * Created by PhpStorm.
 * User: matthill
 * Date: 2/14/14
 * Time: 9:15 AM
 */

namespace Calculator\Services;


class DivideOperationTest extends OperationTestCase {

    public function testCanDivide2From10(){
        $a = 10;
        $b = 2;
        $expected = 5;

        $actual = $this->operation->execute($a, $b);

        $this->assertEquals($expected, $actual);
    }

    function getOperation() {
        return new DivideOperation();
    }
}

