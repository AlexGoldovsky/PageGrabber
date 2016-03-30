<?php namespace PageGrabber;

require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception;

class PageGrabber {

	private $pageHtml;

	function __construct ($url) {
		try {
			$client = new Client([
				'base_url'=>$url
			]);
			$request = new Request('GET', $url);
			$response = $client->send($request, ['timeout'=>10]);
			$result = $response->getBody();
			$this->pageHtml = $result;
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getTitle() {
		$titleNode = $this->extractDataByTag("title");
		$title = $titleNode->item(0)->nodeValue;
		echo $title;
		return $title;
	}
	
	private function extractDataByTag($tag) {
		$doc = new \DOMDocument();
		@$doc->loadHTML($this->pageHtml);
		return $nodes = $doc->getElementsByTagName($tag);
	}

}#
?>
