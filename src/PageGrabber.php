<?php namespace PageGrabber;

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ConnectException;
use PageGrabber\Exception\UrlException;

class PageGrabber {

	private $pageHtml;
	private $url;

	function __construct ($url) {

		if (filter_var($url, FILTER_VALIDATE_URL)) {
			$this->url = $url;
			$html = $this->getPageData();
		    try {
				$doc = new \DOMDocument();
            	@$doc->loadHTML($html);
				$this->pageHtml = $doc;
        	} catch (\Exception $e) {
            	throw new UrlException("Error: Couldn't load html.");
        	}
		} else {
			throw new UrlException("Error: Input must be URL");
		}
	}

	public function getTitle() {
		$titleNode = $this->extractDataByTag("title");
		if ($titleNode->length > 0) {
			$title = $titleNode->item(0)->nodeValue;
		} else {
			$title ="";
		}
		return $title;
	}

	private function extractDataByTag($tag) {
		return $this->pageHtml->getElementsByTagName($tag);
	}

	private function getPageData(){
		try {
			$client = new Client([
				'base_url'=>$this->url
            ]);
			$request = new Request('GET', $this->url);
			$response = $client->send($request, ['timeout'=>10]);
			$result = $response->getBody();
			return $result;
		} catch(ConnectException $e) {
			throw new UrlException("Error: Couldn't establish Connection to ". $this->url);
		} catch (\Exception $e) {
			throw new \Exception("Unhandled error by Guzzle: ".$e->getMessage());
		}
	}

}#
?>
