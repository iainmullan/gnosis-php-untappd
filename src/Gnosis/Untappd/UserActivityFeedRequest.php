<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/12/15
 * Time: 4:13 PM
 */

namespace Gnosis\Untappd;


class UserActivityFeedRequest extends FeedRequest implements IUserActivityFeedRequest {
	public $username;

	public function __construct($username) {
		$this->username = $username;
	}

	public function getUsername() {
		return $this->username;
	}
} 