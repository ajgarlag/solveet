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

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Tree command
 *
 * @category   Ajgl
 * @package    Ajgl\Solveet
 * @subpackage ArbolDeNavidad
 * @author     Antonio J. García Lagar <aj@garcialagar.es>
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 * @see        http://www.solveet.com/exercises/Arbol-de-Navidad/23
 */
class Command
    extends SymfonyCommand
{
protected function configure()
    {
        $this->setName('arbolDeNavidad')
            ->setDescription('Dibuja un arbol de asteriscos')
            ->addArgument('semilla', InputArgument::REQUIRED, 'La altura será igual al tamaño de la semilla');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $seed = $input->getArgument('semilla');
        $tree = new Tree($seed);

        $output->writeln($tree->__toString());
    }
}
