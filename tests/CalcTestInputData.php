<?php
/**
 * Created by PhpStorm.
 * User: MechanicPro
 * Date: 18.02.2018
 * Time: 1:17
 */

use PHPUnit\Framework\TestCase;

require dirname(__FILE__) . '/../calc.php';

class CalcTestInputData extends TestCase
{
    protected $email;
    protected $notEmail;

    protected function setUp()
    {
        $this->email = ["email@mail.ru"];
        $this->notEmail = ["email@@@@mail"];
    }

    function testDataEmpty()
    {
        $calcEmpty = new calc();
        $this->assertNotEmpty(!$calcEmpty->getResult());
    }

    function testDataNotEmpty()
    {
        $calcNotEmpty = new calc($this->email);
        $this->assertNotEmpty($calcNotEmpty->getResult());
    }

    function testTrueEmail()
    {
        $calcTrueEmail = new calc($this->email);
        $email = stristr($this->email[0], '@');
        $email = str_replace("@", "", $email);
        $email = [$email => 1];
        $this->assertEquals($email, $calcTrueEmail->getResult());
    }

    function testFalseEmail()
    {
        $calcFalseEmail = new calc($this->notEmail);
        $this->assertNotEmpty($calcFalseEmail->getResult());
    }
}
