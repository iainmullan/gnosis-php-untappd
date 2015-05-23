<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/10/15
 * Time: 12:03 PM
 */

namespace Gnosis\Untappd;


class BeerActivityFeedRequest extends FeedRequest implements IBeerActivityFeedRequest {
	public $beerId;

	public function __construct($beerId) {
		$this->beerId = $beerId;
	}

	public function getBeerId() {
		return $this->beerId;
	}
} 