<?php namespace PageGrabber;

class PageGrabberTest extends \PHPUnit_Framework_TestCase {

public function testConstructor () {
	$grabber = new PageGrabber("what");
	//$this->assertInstanceOf("AlexGoldovsky\PageGrabber", $grabber);
	$title = $grabber->getTitle();
	$this->assertEquals("hello", $title);
	echo "title = ".$title;
}
}#
