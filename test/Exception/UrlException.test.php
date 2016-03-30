<?php 
use PageGrabber\Exception\UrlException;

class UrlExceptionTest extends \PHPUnit_Framework_TestCase {
	public function testInstanceOfUrlExceptionIsUrlException() {
		$this->assertInstanceOf('\PageGrabber\Exception\UrlException', new UrlException());
	}

	/**
	  * @expectedException     \PageGrabber\Exception\UrlException
          */
	public function testUrlExceptionThrown() {
		throw new UrlException();
	}
}#
