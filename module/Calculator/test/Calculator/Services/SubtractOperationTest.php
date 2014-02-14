<?php
/**
 * Created by PhpStorm.
 * User: matthill
 * Date: 2/14/14
 * Time: 9:15 AM
 */

namespace Calculator\Services;


class SubtractOperationTest extends OperationTestCase {

    public function testCanSubtract2From5(){
        $a = 5;
        $b = 2;
        $expected = 3;

        $actual = $this->operation->execute($a, $b);

        $this->assertEquals($expected, $actual);
    }

    function getOperation() {
        return new SubtractOperation();
    }
}

