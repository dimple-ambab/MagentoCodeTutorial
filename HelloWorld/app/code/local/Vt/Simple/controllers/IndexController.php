<?php
class Vt_Simple_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		echo "Hello Developer...";
		$this->loadLayout();
		$this->renderLayout();
	}
	public function sayHelloAction()
	{
		echo "Hello one more time";
	}
}