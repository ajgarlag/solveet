<?php
require_once 'bootstrap.php';

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Assert\Assertion;
use Ajgl\Solveet\ArbolDeNavidad;


/**
 * Features context.
 */
class FeatureContext extends BehatContext
{

    /**
     * @var ArbolDeNavidad\Tree
     */
    protected $tree;

    /**
     * @var string
     */
    protected $string;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @Given /^que planto un arbol de altura "([^"]*)"$/
     */
    public function quePlantoUnArbolDeAltura($arg1)
    {
        $this->tree = new ArbolDeNavidad\Tree($arg1);
    }

    /**
     * @Given /^convierto el arbol en una cadena$/
     */
    public function conviertoElArbolEnUnaCadena()
    {
        $this->string = $this->tree->__toString();
    }

    /**
     * @Given /^obtengo:$/
     */
    public function obtengo(PyStringNode $string)
    {
        Assertion::true($string->__toString() === $this->string);
    }
}
