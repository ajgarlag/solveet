<?php

/**
 * Copyright (c) 2012 Antonio J. García Lagar <aj@garcialagar.es>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category   Ajgl
 * @package    Ajgl\Solveet
 * @subpackage ArbolDeNavidad\Test
 * @author     Antonio J. García Lagar <aj@garcialagar.es>
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace Ajgl\Solveet\ArbolDeNavidad;

/**
 * Tree class test
 *
 * @category   Ajgl
 * @package    Ajgl\Solveet
 * @subpackage ArbolDeNavidad\Test
 * @author     Antonio J. García Lagar <aj@garcialagar.es>
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 */
class TreeTest
    extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Cannot plant the given seed '-42'. It must be non negative
     */
    public function testFailsWithNegativeSeed()
    {
        new Tree(-42);
    }

    public function testFailsWithSeedZero()
    {
        $tree = new Tree(0);
        $this->assertEmpty($tree->__toString());
    }

    public function testTree1()
    {
        $tree = new Tree(1);
        $this->assertEquals(
                file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'tree1.txt'),
                $tree->__toString()
        );
    }

    public function testTree2()
    {
        $tree = new Tree(2);
        $this->assertEquals(
                file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'tree2.txt'),
                $tree->__toString()
        );
    }

    public function testTree3()
    {
        $tree = new Tree(3);
        $this->assertEquals(
                file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'tree3.txt'),
                $tree->__toString()
        );
    }
}
