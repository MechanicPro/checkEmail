<?php
/**
 * Created by PhpStorm.
 * User: MechanicPro
 * Date: 18.02.2018
 * Time: 0:52
 */

use PHPUnit\Framework\TestCase;

require dirname(__FILE__) . '/../calc.php';

class CalcTestGetResult extends TestCase
{
    private $calc;
    protected $email;

    protected function setUp()
    {
        $this->email = ["mail@mail.ru"];
        $this->calc = new Calc($this->email);
    }

    protected function tearDown()
    {
        $this->calc = NULL;
    }

    public function testGetResult()
    {
        $result = $this->calc->getResult();
        $email = stristr($this->email[0], '@');
        $email = str_replace("@", "", $email);
        $email = [$email => 1];
        $this->assertEquals($email, $result);
    }
}
