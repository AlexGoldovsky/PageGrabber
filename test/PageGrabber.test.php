<?php namespace PageGrabber;

use PageGrabber\Exception\UrlException;

class PageGrabberTest extends \PHPUnit_Framework_TestCase {

	public function testConstructorWorksWithValidURL() {
		$grabber = new PageGrabber("http://blazemeter.com");
		$this->assertInstanceOf('\PageGrabber\PageGrabber', $grabber);
	}

	public function testConstractorWithInvalidUrlThrowsUrlException () {
		try {
			$grabber = new PageGrabber("avs");
		} catch (UrlException $e) {
			$this->assertInstanceOf('\PageGrabber\Exception\UrlException', $e);
		}
	}

	public function testTitleIsCorrect() {
		$grabber = new PageGrabber("http://blazemeter.com");
		$title = $grabber->getTitle();
		$this->assertEquals("JMeter, Load & Continuous Performance Testing Platform", $title);
	}

}#
