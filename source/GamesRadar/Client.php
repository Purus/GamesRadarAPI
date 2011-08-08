<?php
/**
 * @package GamesRadar
 */

namespace GamesRadar;
use SimpleXMLElement;
use GamesRadar\Requester;
use GamesRadar\ExceptionFactory;
use GamesRadar\DataMapperFactory;

/**
 * GamesRadar client
 */
class Client
{
	/**
	 * @var Requester
	 */
	private $requester;

	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * @param Requester $requester
	 */
	public function __construct(Requester $requester, $apiKey)
	{
		$this->apiKey = $apiKey;
		$this->requester = $requester;
	}

	/**
	 * @param string $resource
	 * @param array $args
	 * @return mixed
	 */
	private function request($resource, array $args = array())
	{
		$args += array(
			'api_key' => $this->apiKey,
		);
		$xml = $this->requester->request($resource, $args);
		$data = $this->processResponse($xml, $resource);
		return $data;
	}

	/**
	 * @param SimpleXMLElement $xml
	 * @param string $uri
	 * @return SimpleXMLElement
	 * @throws GamesRadar\Exception\Base
	 */
	private function processResponse(SimpleXMLElement $xml, $uri)
	{
		// check for errors
		if ('error' === ($resource = $xml->getName())) {
			throw ExceptionFactory::createFromXml($xml);
		}

		// get custom data mapper
		if (false === strpos($uri, 'search/gameName')) {
			$dataMapper = DataMapperFactory::getFromXml($xml, $uri);

		} else {
			$dataMapper = DataMapperFactory::getDataMapper('search');
		}

		if (null === $dataMapper) {
			$data = $xml;

		} else {
			$data = $dataMapper->fromXml($xml);
		}

		return $data;
	}

	/**
	 * @param array $options
	 * @return array
	 */
	private static function processOptions(array $options)
	{
		$args = array();

		if (isset($options['platform'])) {
			$args['platform'] = $options['platform'];
		}

		if (isset($options['genre'])) {
			$args['genre'] = $options['genre'];
		}

		if (isset($options['gamename'])) {
			$args['game_name'] = $options['game_name'];
		}

		if (isset($options['page'])) {
			$args['page_num'] = $options['page'];
		}

		if (isset($options['limit'])) {
			$args['page_size'] = $options['limit'];
		}

		if (isset($options['sort'])) {
			$args['sort'] = $options['sort'];
		}

		if (isset($options['unique'])) {
			$args['unique_game'] = $options['unique'] ? 'true' : 'false';
		}

		if (isset($options['content'])) {
			$args['content'] = $options['content'];
		}

		return $args;
	}

	/**
	 * @param GamesRadar\Entity\Game\Game|string|int $game
	 * @return string
	 */
	private static function getGameId($game)
	{
		if ($game instanceof GamesRadar\Entity\Game\Game) {
			$id = $game->id;

		} else {
			$id = (string) $game;
		}

		return $id;
	}

	/**
	 * Get games list.
	 *
	 * @param array $options
	 *
	 * @param string $options['platform']
	 * @param string $options['genre']
	 * @param string $options['gamename']
	 * @param int $options['page']
	 * @param int $options['limit']
	 * @param string $options['sort']
	 * @return array {@link GamesRadar\Entity\Game\Games}
	 */
	public function games(array $options = array())
	{
		$args = self::processOptions($options);
		$data = $this->request('games', $args);
		return $data;
	}

	/**
	 * @param Game|string|int $game
	 * @return GamesRadar\Entity\Game\Details
	 */
	public function game($game)
	{
		$resource = 'game/' . self::getGameId($game);
		$data = $this->request($resource);
		return $data;
	}

	/**
	 * @param string $platform
	 * @param string $prefix
	 * @param string $region
	 * @return array {@see GamesRadar\Entity\Game\Search}
	 */
	public function search($platform, $prefix, $region = null)
	{
		$resource = "search/gameName/{$platform}/{$prefix}";

		$args = array();
		if ($region) {
			$args['region'] = $region;
		}

		$xml = $this->request($resource, $args);
		return $xml;
	}

	/**
	 * @return array {@link GamesRadar\Entity\Platform}
	 */
	public function platforms()
	{
		$data = $this->request('platforms');
		return $data;
	}

	/**
	 * @return array {@link GamesRadar\Entity\Genre}
	 */
	public function genres()
	{
		$data = $this->request('genres');
		return $data;
	}

	/**
	 * @return array {@link GamesRadar\Entity\Franchise}
	 */
	public function franchises()
	{
		$data = $this->request('franchises');
		return $data;
	}

	/**
	 * @return array {@link GamesRadar\Entity\Company}
	 */
	public function developers()
	{
		$data = $this->request('developers');
		return $data;
	}

	/**
	 * @return array {@link GamesRadar\Entity\Company}
	 */
	public function publishers()
	{
		$data = $this->request('publishers');
		return $data;
	}

	/**
	 * @param array $options
	 * @param string $options['region']
	 * @param string $options['platform']
	 * @param string $options['genre']
	 * @param string $options['gamename']
	 * @param int $options['page']
	 * @param int $options['limit]
	 * @param string $options['sort']
	 * @return array {@link GamesRadar\Entity\Article}
	 */
	public function news(array $options = array())
	{
		$args = self::processOptions($options);
		$data = $this->request('news', $args);
		return $data;
	}

	/**
	 * @param array $options
	 * @param string $options['region']
	 * @param string $options['platform']
	 * @param string $options['genre']
	 * @param string $options['gamename']
	 * @param int $options['page']
	 * @param int $options['limit]
	 * @param string $options['sort']
	 * @return array {@link GamesRadar\Entity\Article}
	 */
	public function previews(array $options = array())
	{
		$args = self::processOptions($options);
		$data = $this->request('previews', $args);
		return $data;
	}

	/**
	 * @param array $options
	 * @param array $options
	 * @param string $options['region']
	 * @param string $options['platform']
	 * @param string $options['genre']
	 * @param string $options['gamename']
	 * @param int $options['page']
	 * @param int $options['limit]
	 * @param string $options['sort']
	 * @return array {@link GamesRadar\Entity\Article}
	 */
	public function reviews(array $options = array())
	{
		$args = self::processOptions($options);
		$data = $this->request('reviews', $args);
		return $data;
	}

	/**
	 * @param array $options
	 * @param string $options['region']
	 * @param string $options['platform']
	 * @param string $options['genre']
	 * @param string $options['gamename']
	 * @param int $options['page']
	 * @param int $options['limit]
	 * @param string $options['sort']
	 * @return array {@link GamesRadar\Entity\Article}
	 */
	public function features(array $options = array())
	{
		$args = self::processOptions($options);
		$data = $this->request('features', $args);
		return $data;
	}

	/**
	 * @param array $options
	 * @param string $options['region']
	 * @param string $options['platform']
	 * @param string $options['genre']
	 * @param string $options['gamename']
	 * @param int $options['page']
	 * @param int $options['limit]
	 * @param string $options['sort']
	 * @return array {@link GamesRadar\Entity\Video}
	 */
	public function videos(array $options = array())
	{
		$args = self::processOptions($options);
		$data = $this->request('videos', $args);
		return $data;
	}

	/**
	 * @param array $options
	 * @param string $options['region']
	 * @param string $options['platform']
	 * @param string $options['genre']
	 * @param string $options['gamename']
	 * @param bool $options['unique']
	 * @param int $options['page']
	 * @param int $options['limit]
	 * @param string $options['sort']
	 * @return array {@link GamesRadar\Entity\Screenshot}
	 */
	public function screenshots(array $options = array())
	{
		$args = self::processOptions($options);
		$data = $this->request('screenshots', $args);
		return $data;
	}

	/**
	 * @param array $options
	 * 	string $options['region']
	 * 	string $options['platform']
	 * 	string $options['genre']
	 * 	string $options['gamename']
	 * 	int $options['page']
	 * 	int $options['limit]
	 * 	string $options['sort']
	 * @return array
	 */
	public function cheats(array $options = array())
	{
		$args = self::processOptions($options);
		$data = $this->request('cheats', $args);
		return $data;
	}

	/**
	 * @param array $options
	 * @param string $options['region']
	 * @param string $options['platform']
	 * @param string $options['genre']
	 * @param string $options['gamename']
	 * @param int $options['page']
	 * @param int $options['limit]
	 * @param string $options['sort']
	 * @return array {@link GamesRadar\Entity\Cheat}
	 */
	public function faqs(array $options = array())
	{
		$args = self::processOptions($options);
		$data = $this->request('guidesandfaqs', $args);
		return $data;
	}

	/**
	 * @param Game $game
	 * @param array $options
	 * @return array {@link GamesRadar\Entity\Article}
	 */
	public function gameNews($game, array $options = array())
	{
		$resource = 'game/news/' . self::getGameId($game);
		$args = self::processOptions($options);
		$data = $this->requester->request($resource, $args);
		return $data;
	}

	/**
	 * @param Game $game
	 * @param array $options
	 * @return array {@link GamesRadar\Entity\Article}
	 */
	public function gamePreviews($game, array $options = array())
	{
		$resource = 'game/previews/' . self::getGameId($game);
		$args = self::processOptions($options);
		$data = $this->requester->request($resource, $args);
		return $data;
	}

	/**
	 * @param Game $game
	 * @param array $options
	 * @return array {@link GamesRadar\Entity\Article}
	 */
	public function gameReviews($game, array $options = array())
	{
		$resource = 'game/reviews/' . self::getGameId($game);
		$args = self::processOptions($options);
		$data = $this->requester->request($resource, $args);
		return $data;
	}

	/**
	 * @param Game $game
	 * @param array $options
	 * @return array {@link GamesRadar\Entity\Article}
	 */
	public function gameFeatures($game, array $options = array())
	{
		$resource = 'game/features/' . self::getGameId($game);
		$args = self::processOptions($options);
		$data = $this->requester->request($resource, $args);
		return $data;
	}

	/**
	 * @param Game $game
	 * @param array $options
	 * @return array {@link GamesRadar\Entity\Video}
	 */
	public function gameVideos($game, array $options = array())
	{
		$resource = 'game/videos/' . self::getGameId($game);
		$args = self::processOptions($options);
		$data = $this->requester->request($resource, $args);
		return $data;
	}

	/**
	 * @param Game $game
	 * @param array $options
	 * @return array {@link GamesRadar\Entity\Screenshot}
	 */
	public function gameScreenshots($game, array $options = array())
	{
		$resource = 'game/screenshots/' . self::getGameId($game);
		$args = self::processOptions($options);
		$data = $this->requester->request($resource, $args);
		return $data;
	}

	/**
	 * @param Game $game
	 * @param array $options
	 * @return array {@link GamesRadar\Entity\Cheat}
	 */
	public function gameCheats($game, array $options = array())
	{
		$resource = 'game/cheats/' . self::getGameId($game);
		$args = self::processOptions($options);
		$data = $this->requester->request($resource, $args);
		return $data;
	}

	/**
	 * @param Game $game
	 * @param array $options
	 * @return array {@link GamesRadar\Entity\Cheat}
	 */
	public function gameFaqs($game, array $options = array())
	{
		$resource = 'game/guidesandfaqs/' . self::getGameId($game);
		$args = self::processOptions($options);
		$data = $this->requester->request($resource, $args);
		return $data;
	}
}
