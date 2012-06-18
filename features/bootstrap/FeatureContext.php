<?php
require_once 'bootstrap.php';

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Symfony\Component\Console\Application,
    Symfony\Component\Console\Command\Command as SymfonyCommand,
    Symfony\Component\Console\Tester\CommandTester;
use Assert\Assertion;
use Ajgl\Solveet;


/**
 * Features context.
 */
class FeatureContext extends BehatContext
{

    /**
     * @var Application
     */
    protected $application;

    /**
     * @var SymfonyCommand
     */
    protected $command;

    /**
     * @var CommandTester
     */
    protected $commandTester;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->application = new Application();
    }

    /**
     * @Given /^tengo que plantar un arbol$/
     */
    public function tengoQuePlantarUnArbol()
    {
        $this->application->add(new Solveet\ArbolDeNavidad\Command());
        $this->command = $this->application->find('arbolDeNavidad');
        $this->commandTester = new CommandTester($this->command);
    }

    /**
     * @Given /^planto una semilla "([^"]*)"$/
     */
    public function plantoUnaSemilla($arg1)
    {
        $this->commandTester->execute(
            array(
                'command' => $this->command->getName(),
                'semilla' => $arg1
            )
        );
    }

    /**
     * @Given /^crece el arbol:$/
     */
    public function creceElArbol(PyStringNode $string)
    {
        Assertion::true($string->__toString() === $this->commandTester->getDisplay());
    }


}
