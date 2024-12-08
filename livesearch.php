<?php
	$xmlDoc = new DOMDocument;
	$xmlDoc->load('links.xml');

	$links = $xmlDoc->getElementsByTagName('link');

	//get the q parameter from URL
	$query = $_GET['q'];

	//lookup all links from the xml file if length of query>0
	if (strlen($query) > 0) {
		$hint = '';
		for ($i = 0; $i < $links->length; ++$i) {
			/** @var ?DOMElement */
			$item = $links->item($i);
			$title = $item->getElementsByTagName('title');
			$url = $item->getElementsByTagName('url');
			if ($title->item(0)?->nodeType == 1) {
				//find a link matching the search text
				if (stristr($title->item(0)->childNodes->item(0)->nodeValue, $query)) {
					if ($hint == "") {
						$hint = "<a href='" .
						$url->item(0)->childNodes->item(0)->nodeValue .
						"' target='_blank'>" .
						$title->item(0)->childNodes->item(0)->nodeValue . "</a>";
					} else {
						$hint = $hint . "<br /><a href='" .
						$url->item(0)->childNodes->item(0)->nodeValue .
						"' target='_blank'>" .
						$title->item(0)->childNodes->item(0)->nodeValue . "</a>";
					}
				}
			}
		}
	}

	// Set output to "no suggestion" if no hint was found

	// or to the correct values
	if ($hint == "") {
		$response = "no suggestion";
	} else {
		$response = $hint;
	}

	//output the response
	echo $response;
?>