<?php

namespace Application\Controller;

use Zend\View\Model\ViewModel;

class CalculatorController extends AbstractActionController {

	public function indexAction(){
		return new ViewModel();
	}
	
}