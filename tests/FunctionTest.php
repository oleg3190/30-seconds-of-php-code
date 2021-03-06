<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAverage()
    {
        $compose = compose(
            // add 2
            function ($x) {
                return $x + 2;
            },
            // multiply 4
            function ($x) {
                return $x * 4;
            }
        );

        $this->assertEquals(
            20,
            $compose(3)
        );
    }

    public function testMemoize()
    {
        $memoizedAdd = memoize(
            function ($num) {
                return $num + 10;
            }
        );

        $this->assertEquals(
            ['result' => 15, 'cached' => false],
            $memoizedAdd(5)
        );

        $this->assertEquals(
            ['result' => 16, 'cached' => false],
            $memoizedAdd(6)
        );

        $this->assertEquals(
            ['result' => 15, 'cached' => true],
            $memoizedAdd(5)
        );
    }

    public function testCurry()
    {
        $curriedAdd = curry(
            function ($a, $b) {
                return $a + $b;
            }
        );
        
        $add10 = $curriedAdd(10);

        $this->assertEquals(25, $add10(15));
    }
}
