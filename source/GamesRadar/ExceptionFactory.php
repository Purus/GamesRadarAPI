<?php

namespace GamesRadar;

use GamesRadar\Exception\Communication as CommunicationException;

class ExceptionFactory
{
	private static $map = array(
		11000 => 'RestrictedAccess',
	);

	/**
	 * @param string $msg
	 * @return CommunicationException
	 */
	public static function createConnectionException($msg)
	{
		return new CommunicationException($msg);
	}

	/**
	 * @param SimpleXMLElement $xml
	 * @return GamesRadar\Exception\Base
	 */
	public static function createFromXml(SimpleXMLElement $xml)
	{
		$code = (int) $xml->code;
		$message = (string) $xml->message;

		if (isset(self::$map[$code])) {
			$classname = 'GamesRadar\Exception\\' . self::$map[$code];

		} else {
			$classname = 'GamesRadar\Exception\Unknown';
		}

		$exception = new $classname($message, $code);
		return $exception;
	}
}