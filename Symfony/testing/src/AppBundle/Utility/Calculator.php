<?php
// src/Acme/DemoBundle/Utility/Calculator.php
namespace AppBundle\Utility;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
 
class Calculator{
    public function add(){
    	$a=2;
    	$b=4;
        return $a + $b;
    }
}
?>