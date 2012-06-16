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
 * @subpackage ArbolDeNavidad
 * @author     Antonio J. García Lagar <aj@garcialagar.es>
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace Ajgl\Solveet\ArbolDeNavidad;

/**
 * Tree class
 *
 * @category   Ajgl
 * @package    Ajgl\Solveet
 * @subpackage ArbolDeNavidad
 * @author     Antonio J. García Lagar <aj@garcialagar.es>
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 * @see        http://www.solveet.com/exercises/Arbol-de-Navidad/23
 */
class Tree
{
    /**
     * @var integer
     */
    protected $seed;

    /**
     * @var boolean
     */
    protected $watered = false;

    /**
     * @var array
     */
    protected $flowerpott = array();

    /**
     * @param  integer                   $seed
     * @return Tree
     * @throws \InvalidArgumentException if the seed is lesser than 1
     */
    protected function setSeed($seed)
    {
        $seed = (integer) $seed;

        if ($seed < 1) {
            throw new \InvalidArgumentException(
                "Cannot plant the given seed '$seed'. It must be greater than '0'"
            );
        }

        $this->seed = $seed;

        return $this;
    }

    /**
     * @param integer $seed
     */
    public function __construct($seed)
    {
        $this->setSeed($seed);
    }

    /**
     * @return Tree
     */
    protected function water()
    {
        // Avoid excesive watering
        if (!$this->watered) {
            while (count($this->flowerpott) < $this->seed) {
                $branchPosition = count($this->flowerpott) + 1;
                $this->flowerpott[] = rtrim($this->getBranch($branchPosition));
            }
            $this->watered = true;
        }

        return $this;
    }

    /**
     * The branch has trailing spaces to allow you to insert the tree into a custom text
     *
     * Something like
     *   $tree = new Tree(3);
     *   $line1 = $tree->getBranch(1) . "My custom line 1"
     *   $line2 = $tree->getBranch(2) . "My custom line 1"
     *   $line3 = $tree->getBranch(3) . "My custom line 1"
     *
     * @param  integer $position
     * @return string
     */
    public function getBranch($position)
    {
        $position = (integer) $position;

        if ($position < 1) {
            throw new \InvalidArgumentException(
                "The branch cannot grow at position '$position'. It must be greater than '0'"
            );
        }

        if ($position > $this->seed) {
            throw new \InvalidArgumentException(
                "The branch cannot grow under the ground at position '$position'. It must be lesser than '{$this->$seed}'"
            );
        }

        $leafs = str_pad('', 2 * $position - 1, '*');
        $branch = str_pad($leafs, 2 * $this->seed - 1, ' ', STR_PAD_BOTH);

        return $branch;
    }

    /**
     * The tree has no trailing spaces in branches
     *
     * @return string
     */
    public function __toString()
    {
        $this->water();

        return implode("\n", $this->flowerpott) . "\n";
    }
}
