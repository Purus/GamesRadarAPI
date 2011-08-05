<?php

namespace GamesRadar;

class DataMapperFactory
{
	/**
	 * @var array {@see AbstractMapper}
	 */
	private static $dataMappers = array();

	/**
	 * @param string $name
	 * @return GamesRadar\DataMapper\AbstractMapper
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
}