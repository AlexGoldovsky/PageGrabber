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

	/*
		note: in order to perform this test you need to find a website that has no title tag
		or you may want to add a custom url in the /etc/hosts file, and then remove the mark
	*/
	public function testValidUrlNoTitleTag () {
		$this->markTestSkipped(
              'Test Web page without title tag.'
		);
		//$grabber = new PageGrabber("http://notitletag.com");
		//$title = $grabber->getTitle();
		//$this->assertEquals($title, "");
	}

	public function testTitleIsCorrect() {
		$grabber = new PageGrabber("http://blazemeter.com");
		$title = $grabber->getTitle();
		$this->assertEquals("JMeter, Load & Continuous Performance Testing Platform", $title);
	}

}#
