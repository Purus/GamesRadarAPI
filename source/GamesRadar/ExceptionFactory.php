<?php
/**
 * @package GamesRadar
 */

namespace GamesRadar;
use SimpleXMLElement;
use GamesRadar\Exception\Communication as CommunicationException;

/**
 * Exception factory
 */
class ExceptionFactory
{
	/**
	 * Unknown error template
	 */
	const UNKNOWN_ERROR = 'Unknown error happens, code %u';

	/**
	 * Map XML errors to exceptions
	 *
	 * @var array
	 */
	private static $map = array(
		11000 => 'RestrictedAccess',
	);

	/**
	 * @param string $msg
	 * @return GamesRadar\Exception\Communication
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

		if ($xml->message) {
			$message = (string) $xml->message;

		} else if ($xml->messages) {

			$messages = array();
			foreach ($xml->messages->message as $message) {
				$messages[] = (string) $message;
			}

			$message = implode("\n", $messages);

		} else {
			$message = sprintf(self::UNKNOWN_ERROR, $code);
		}

		if (isset(self::$map[$code])) {
			$classname = 'GamesRadar\Exception\\' . self::$map[$code];

		} else {
			$classname = 'GamesRadar\Exception\Unknown';
		}

		$exception = new $classname($message, $code);
		return $exception;
	}
}