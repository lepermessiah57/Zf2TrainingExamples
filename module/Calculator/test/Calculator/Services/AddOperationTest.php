<?php
/**
 * Created by PhpStorm.
 * User: matthill
 * Date: 2/14/14
 * Time: 9:04 AM
 */

namespace Calculator\Services;

class AddOperationTest extends OperationTestCase{



    public function testExecuteWillAdd1To1(){
        $a = 1;
        $b = 1;
        $expected = 2;

        $actual = $this->operation->execute($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testExecuteWillAdd1ToNegative1(){
        $a = 1;
        $b = -1;
        $expected = 0;

        $actual = $this->operation->execute($a, $b);

        $this->assertEquals($expected, $actual);
    }

    function getOperation() {
        return new AddOperation();
    }
}
 