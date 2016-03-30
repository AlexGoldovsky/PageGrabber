<?php namespace PageGrabber;

use PageGrabber\Exception\UrlException;

class PageGrabberTest extends \PHPUnit_Framework_TestCase {

	public function testConstructorWorksWithValidURL() {
		$grabber = new PageGrabber("http://blazemeter.com");
		$this->assertInstanceOf('\PageGrabber\PageGrabber', $grabber);
	}

	/**
	 * @expectedException \PageGrabber\Exception\UrlException
	 */
	public function testConstractorWithInvalidUrlThrowsUrlException () {
		$grabber = new PageGrabber("avs");
	}

	/**
	 * @expectedException \PageGrabber\Exception\UrlException
	 */
	public function testValidUrlButSiteDoesntExsitThrowsUrlException () {
		$grabber = new PageGrabber("http://blalfsdkfjbn.com/");
	}

	public function testTitleIsCorrect() {
		$grabber = new PageGrabber("http://blazemeter.com");
		$title = $grabber->getTitle();
		$this->assertEquals("JMeter, Load & Continuous Performance Testing Platform", $title);
	}

}#
