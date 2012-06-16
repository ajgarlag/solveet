<?php

/*
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
 */

/**
 * Class to bootstrap the tests
 */
abstract class PHPUnitBootstrap
{
    protected static $initialized = false;

    protected static function init()
    {
        if (!self::$initialized) {
            // Ensure src/ is on include_path
            set_include_path(
                implode(
                    PATH_SEPARATOR,
                    array(
                        realpath(__DIR__ . '/../src'),
                        get_include_path(),
                    )
                )
            );
            require_once 'PHPUnit/Autoload.php';
            /* @var $loader \Composer\Autoload\ClassLoader */
            $loader = require __DIR__.'/../vendor/autoload.php';
            $loader->add('Ajgl', __DIR__ . '/src');
        }
        self::$initialized = true;
    }

    /**
     * Set up the bootstrap
     */
    public static function setUp()
    {
        self::init();
    }
}

PHPUnitBootstrap::setUp();