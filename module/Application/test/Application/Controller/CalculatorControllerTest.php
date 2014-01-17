<?php

namespace Application\Controller;

class CalculatorControllerTest extends \PHPUnit_Framework_TestCase {
	
	public function testIsAnAbstractActionController(){
		$controller = new CalculatorController();
		$this->assertInstanceOf('Application\Controller\AbstractActionController', $controller);
	}

	public function testIndexActionReturnsAViewModel(){
		$view_model = new \Zend\View\Model\ViewModel();
		$controller = new CalculatorController();

		$this->assertEquals($view_model, $controller->indexAction());
	}
}