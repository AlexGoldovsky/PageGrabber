<?php namespace AlexGoldovsky\PageGrabber;

class PageGrabber {
	
	private $title;
	function __construct ($url) {
		$doc = new DOMDocument();
		@$doc->loadHTMLFile($url);
		$this->title = $doc;
	}

	public function getTitle() {
		return $this->title;
	}

}#
?>
