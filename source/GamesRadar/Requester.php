<?php
/**
 * @package GamesRadar
 */

namespace GamesRadar;
use GamesRadar\ExceptionFactory;

/**
 * RESTful client to GamesRadar resources
 */
class Requester
{
	/**
	 * GamesRadarAPI endpoint URL
	 */
	const ENDPOINT_URL = 'http://api.gamesradar.com/';

	/**
	 * CURL handler
	 *
	 * @var resource
	 */
	private $ch;

	/**
	 * Free CURL handler resource
	 */
	public function __desctruct()
	{
		if ($this->ch) {
			curl_close($this->ch);
		}
	}

	/**
	 * Lazy access to CURL handler.
	 *
	 * By default CURL not initialized, it will be initialized before first
	 * request.
	 *
	 * @return resource
	 */
	private function getCurl()
	{
		if (null === $this->ch) {
			$this->ch = curl_init();
		}
		return $this->ch;
	}

	/**
	 * @param string $resource
	 * @param array $args
	 * @return SimpleXMLElement
	 * @throws CommunicationException
	 */
	public function request($resource, array $args = array())
	{
		// make URL
		$url = self::ENDPOINT_URL . $resource . '?' . http_build_query($args);

		// set up CURL handler
		$ch = $this->getCurl();

		curl_setopt_array($ch, array(
			CURLOPT_URL            => $url,
			CURLOPT_RETURNTRANSFER => true,
		));

		// execute request
		$response = curl_exec($ch);

		// check content length
		if (0 === strlen($response)) {
			$msg = 'Zero-length content returned';
			throw new CommunicationException($msg);
		}

		// convert response to SimpleXMLElement
		if (false === ($xml = simplexml_load_string($response))) {
			$msg = "Mailformed XML returned\n\n{$response}";
			throw ExceptionFactory::createConnectionException($msg);
		}

		return $xml;
	}
}