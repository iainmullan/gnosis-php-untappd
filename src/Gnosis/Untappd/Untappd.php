<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/10/15
 * Time: 10:25 AM
 */

namespace Gnosis\Untappd;


class Untappd {
    private $clientId = '';
    private $clientSecret = '';

	public function __construct($clientId = NULL, $clientSecret = NULL) {
		if ($clientId == NULL) {
			$clientId = \Config::get('untappd.clientId');
		}
		if ($clientSecret == NULL) {
			$clientSecret = \Config::get('untappd.clientSecret');
		}

		$this->clientId = $clientId;
		$this->clientSecret = $clientSecret;
	}

	public function getUserFriends(IUserFriendsRequest $request) {
		return $this->doGet('user/friends/' . $request->getUsername(), [
			'limit' => $request->getLimit(),
			'offset' => $request->getOffset()
		])['response']['items'];
	}

    public function searchBeer(IBeerSearchRequest $request) {
        return $this->doGet('search/beer', [
		    'q' => $request->getQuery(),
		    'sort' => $request->getSort(),
		    'limit' => $request->getLimit(),
		    'offset' => $request->getOffset(),
	    ])->response;
    }

	public function getManyBeerActivityFeed($beerId, $limit) {
		$firstRequest = new BeerActivityFeedRequest($beerId);
		$previousResponse = $result = $this->getBeerActivityFeed($firstRequest);

		$n = ceil($limit / 25);
		for ($i = 0; $i < $n - 1; $i++) {
			$request = new BeerActivityFeedRequest($beerId);
			$request->maxId = $previousResponse[24]->checkin_id;
			$previousResponse = $response = $this->getBeerActivityFeed($request);
			$result = array_merge($result, $response);
		}

		return $result;
	}

	public function getBeerActivityFeed(IBeerActivityFeedRequest $request) {
		return $this->doGet('beer/checkins/' . ((string)$request->getBeerId()), [
			'limit' => $request->getLimit(),
			'max_id' => $request->getMaxId(),
			'min_id' => $request->getMinId()
		])->response->checkins->items;
	}

	public function getUserActivityFeed(IUserActivityFeedRequest $request) {
		$result = $this->getUserActivityFeedHelper($request);

		if (!isset($result['checkins'])) {
			return [];
		}
		if (!isset($result['checkins']['items'])) {
			return [];
		}

		return $result['checkins']['items'];
	}

	public function getManyUserActivityFeed($username, $limit) {
		$request = new UserActivityFeedRequest($username);
		$response = $this->getUserActivityFeedHelper($request);
		$result = $response['checkins']['items'];

		for ($i = 1; $i < ($limit/25); $i++) {
			print "$i: " . $response['pagination']['max_id'] . "\n";
			$request->maxId = $response['pagination']['max_id'];
			$response = $this->getUserActivityFeedHelper($request);
			$result = array_merge($result, $response['checkins']['items']);
		}

		return $result;
	}

	public function getActivityFeed(IActivityFeedRequest $request) {
		return $this->doGet('checkins', [
			'limit' => $request->getLimit(),
			'max_id' => $request->getMaxId(),
			'min_id' => $request->getMinId()
		]);
	}

	public function getLocal(ILocalRequest $request) {
		return $this->doGet('thepub/local', [
			'lat' => $request->getLatitude(),
			'lng' => $request->getLongitude()
		])->response->checkins->items;
	}

	private function getUserActivityFeedHelper(IUserActivityFeedRequest $request) {
		return $this->doGet('user/checkins/' . $request->getUsername(), [
			'limit' => $request->getLimit(),
			'max_id' => $request->getMaxId(),
			'min_id' => $request->getMinId()
		])['response'];
	}

	private function doGet($path, $query) {
	    $query['client_id'] = $this->clientId;
	    $query['client_secret'] = $this->clientSecret;

	    $guzzle = new \GuzzleHttp\Client();

	    $response = $guzzle->get(
		    "https://api.untappd.com/v4/$path",
		    [
			    'verify' => false,
			    'query' => $query
		    ]
	    );

	    return $response->json();
    }
} 