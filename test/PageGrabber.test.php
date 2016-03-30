<?php namespace PageGrabber;

class PageGrabberTest extends \PHPUnit_Framework_TestCase {

public function testConstructor () {
	$grabber = new PageGrabber("http://blazemeter.com");
	//$this->assertInstanceOf("AlexGoldovsky\PageGrabber", $grabber);
	$title = $grabber->getTitle();
}
}#
