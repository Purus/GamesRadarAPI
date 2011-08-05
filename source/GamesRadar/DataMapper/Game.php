<?php

namespace GamesRadar\DataMapper;

use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Game\Details as Game;
use GamesRadar\Entity\Platform;
use GamesRadar\Entity\Genre;
use GamesRadar\Entity\Franchise;
use GamesRadar\Entity\Company;

class Game extends AbstractMapper
{
	/**
	 * @param SimpleXMLElement $xml
	 * @return Details
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$entity = new Game();

		$entity->id = (int) $xml->id;

		$entity->name['us'] = (string) $xml->anem->us;
		$entity->name['uk'] = (string) $xml->anem->uk;

		$entity->description = (string) $xml->description;
		$entity->alternativeNames = (string) $xml->alternative_names;
		$entity->designer         = (string) $xml->designer;

		$entity->platform = new Platform();
		$entity->platform->id = (int) $xml->platform->id;
		$entity->platform->name = (string) $xml->platform->name;

		$entity->genre = new Genre();
		$entity->genre->id = (int) $xml->genre->id;
		$entity->genre->name = (string) $xml->genre->name;

		$entity->franchise = new Franchise();
		$entity->franchise->id = (int) $xml->franchise->id;
		$entity->franchise->name['us'] = (string) $xml->franchise->name->us;
		$entity->franchise->name['uk'] = (string) $xml->franchise->name->uk;

		$entity->developers = array();
		foreach ($xml->developers->company as $node) {
			$company = new Company();
			$company->id = (int) $company->id;
			$company->name = (string) $company->name;
			$entity->developers[] = $company;
		}

		foreach ($xml->publishers->us->company as $node) {
			$company = new Company();
			$company->id = (int) $company->id;
			$company->name = (string) $company->name;
			$entity->publishers['us'] = $company;
		}

		foreach ($xml->publishers->uk->company as $node) {
			$company = new Company();
			$company->id = (int) $company->id;
			$company->name = (string) $company->name;
			$entity->publishers['uk'] = $company;
		}

		return $entity;
	}
}