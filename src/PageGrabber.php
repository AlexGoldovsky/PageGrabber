<?php namespace PageGrabber;

require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception;
use PageGrabber\Exception\UrlException;

class PageGrabber {

	private $pageHtml;
	private $url;

	function __construct ($url) {

		if (filter_var($url, FILTER_VALIDATE_URL)) {
			$this->url = $url;
			$this->getPageData();
		} else {
			throw new UrlException("Error: Input must be URL");
		}
	}

	public function getTitle() {
		$titleNode = $this->extractDataByTag("title");
		$title = $titleNode->item(0)->nodeValue;
		return $title;
	}

	private function extractDataByTag($tag) {
		$doc = new \DOMDocument();
		@$doc->loadHTML($this->pageHtml);
		return $nodes = $doc->getElementsByTagName($tag);
	}

	private function getPageData(){
		try {
			$client = new Client([
				'base_url'=>$this->url
                        ]);
                        $request = new Request('GET', $this->url);
                        $response = $client->send($request, ['timeout'=>10]);
                        $result = $response->getBody();
                        $this->pageHtml = $result;
                } catch(Exception $e) {
                        echo "Error in Guzzle: " . $e->getMessage();
                }
	}

}#
?>
