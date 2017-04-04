<?php
namespace AppBundle\Utility;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Utility\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase{
	 public function testAdd(){
		$stub = $this->getMockBuilder(Calculator::class)->getMock();
        $stub->expects($this->once())->method('add')->will($this->returnValue(6));

        $suma = new Calculator();
        $result = $suma->add();

		$this->assertEquals($result, $stub->add());
	}
}
?>