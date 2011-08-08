<?php
/**
 * @package GamesRadar
 */

namespace GamesRadar;
use GamesRadar\DataMapper\AbstractMapper;
use SimpleXMLElement;

/**
 * Data mapper factory
 */
class DataMapperFactory
{
	/**
	 * @var array {@see AbstractMapper}
	 */
	private static $dataMappers = array();

	/**
	 * @param string $name
	 * @return AbstractMapper
	 */
	public static function getDataMapper($name)
	{
		$key = strtolower($name);
		if (isset(self::$dataMappers[$key])) {
			$dataMapper = self::$dataMappers[$key];

		} else {
			$classname = 'GamesRadar\DataMapper\\' . ucfirst($key);

			if (class_exists($classname)) {
				$dataMapper = new $classname;

			} else {
				$dataMapper = null;
			}

			self::$dataMappers[$key] = $dataMapper;
		}

		return $dataMapper;
	}

	/**
	 * @param SimpleXMLElement $xml
	 * @param string $uri
	 * @return AbstractMapper
	 */
	public static function getFromXml(SimpleXMLElement $xml, $uri)
	{
		$name = $xml->getName();
		return self::getDataMapper($name);
	}
}