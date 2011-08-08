<?php
/**
 * @package GamesRadar\DataMapper
 */

namespace GamesRadar\DataMapper;
use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Game\Details as GameDetails;

/**
 * Game data mapper
 */
class Game extends AbstractMapper
{
	/**
	 * @param SimpleXMLElement $xml
	 * @return GamesRadar\Entity\Game\Details
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$entity = new GameDetails;

		$entity->id = (int) $xml->id;

		$entity->name['us'] = (string) $xml->name->us;
		$entity->name['uk'] = (string) $xml->name->uk;

		$entity->description      = (string) $xml->description;
		$entity->alternativeNames = (string) $xml->alternative_names;
		$entity->designer         = (string) $xml->designer;
		$entity->platform         = (string) $xml->platform->name;
		$entity->genre            = (string) $xml->genre->name;

		if ((int) $xml->franchise->id) {
			$entity->franchise = array(
				'uk' => (string) $xml->franchise->name->uk,
				'us' => (string) $xml->franchise->name->us,
			);
		}


		if ($xml->developers->company) {
			foreach ($xml->developers->company as $node) {
				$entity->developers[] = (string) $node->name;
			}
		}

		if ($xml->publishers) {
			if ($xml->publishers->us && $xml->publishers->us->company) {
				foreach ($xml->publishers->us->company as $node) {
					$entity->publishers['us'][] = (string) $node->name;
				}
			}

			if ($xml->publishers->uk && $xml->publishers->uk->company) {
				foreach ($xml->publishers->uk->company as $node) {
					$entity->publishers['uk'][] = (string) $node->name;
				}
			}
		}

		$entity->expectedReleaseDate['us'] = (string) $xml->expected_release_date->us;
		$entity->expectedReleaseDate['uk'] = (string) $xml->expected_release_date->uk;

		$entity->releaseDate['us'] = strtotime($xml->release_date->us);
		$entity->releaseDate['uk'] = strtotime($xml->release_date->uk);

		$entity->updatedDate = strtotime($xml->updated_date);

		$entity->upc['us'] = (int) $xml->upc->us;
		$entity->upc['uk'] = (int) $xml->upc->uk;

		$entity->officialSite['us'] = (string) $xml->official_site->us;
		$entity->officialSite['uk'] = (string) $xml->official_site->uk;

		if ((int) $xml->score->id) {
			$entity->score = (string) $xml->score->name;
		}

		$entity->url = (string) $xml->url;

		$entity->images['thumbnail'] = (string) $xml->images->thumbnail;

		if ($xml->images->box_art && $xml->images->box_art->us) {
			$entity->images['boxart']['us'] = (string) $xml->images->box_art->us;
		}
		if ($xml->images->box_art && $xml->images->box_art->uk) {
			$entity->images['boxart']['uk'] = (string) $xml->images->box_art->uk;
		}

		$entity->technicalFeatures = (string) $xml->technical_features;
		$entity->minimalSystemSpecs = (string) $xml->min_system_specs;
		$entity->recommendedSystemSpecs = (string) $xml->recommended_system_specs;

		if ($xml->links) {
			foreach ($xml->links->children() as $node) {
				/* @var $node SimpleXMLElement */
				$entity->links[$node->getName()] = (string) $node;
			}
		}

		if ($xml->multiplayer_modes->online) {
			foreach ($xml->multiplayer_modes->online as $node) {
				$entity->multiplayerModes['online'][] = (string) $node;
			}
		}

		if ($xml->multiplayer_modes->offline) {
			foreach ($xml->multiplayer_modes->offline as $node) {
				$entity->multiplayerModes['offline'][] = (string) $node;
			}
		}

		if ($xml->censorship) {
			foreach ($xml->censorship->children() as $node) {
				/* @var $node SimpleXMLElement */
				$name = $node->getName();
				$entity->censorship[$name] = array(
					'rating' => (string) $node->rating,
					'descriptors' => array(),
				);
				foreach ($node->descriptor as $node2) {
					$entity->censorship[$name]['descriptors'][] = (string) $node2;
				}
			}
		}

		return $entity;
	}
}