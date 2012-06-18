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
 * @subpackage LaMinaDeDiamantes
 * @author     Antonio J. García Lagar <aj@garcialagar.es>
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace Ajgl\Solveet\LaMinaDeDiamantes;

/**
 * Mine class
 *
 * @category   Ajgl
 * @package    Ajgl\Solveet
 * @subpackage LaMinaDeDiamantes
 * @author     Antonio J. García Lagar <aj@garcialagar.es>
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 * @see        http://www.solveet.com/exercises/La-mina-de-diamantes/21
 */
class Mine
{
    const DIAMOND = '<>';

    public function countDiamonds($vein)
    {
        $this->validateVein($vein);
        $diamonds = 0;
        while ($pos = strpos($vein, self::DIAMOND) !== false) {
            $vein = str_replace(self::DIAMOND, '', $vein, $foundDiamonds);
            $diamonds += $foundDiamonds;
        }
        return $diamonds;
    }

    protected function validateVein($vein)
    {
        if (preg_match('/[^><]/', $vein, $matches)) {
            $impurity = $matches[0];
            $position = strpos($vein, $impurity);
            throw new \InvalidArgumentException(
                "The given vein has impurity '$impurity' at position '$position'"
            );
        }
    }
}
