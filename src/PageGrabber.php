<?php namespace PageGrabber;

class PageGrabber {
	
	private $title;

	function __construct ($url) {
		//$doc = new DOMDocument();
		//@$doc->loadHTMLFile($url);
		$this->title = "hello";
	}

	public function getTitle() {
		return $this->title;
	}

}#
?>
