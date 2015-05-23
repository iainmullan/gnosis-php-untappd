<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/14/15
 * Time: 9:13 PM
 */

namespace Gnosis\Untappd;


class UserFriendsRequest extends ListRequest implements IUserFriendsRequest {
	public $username;
	public $offset;

	public function __construct($username) {
		$this->username = $username;
	}

	public function getUsername() {
		return $this->username;
	}

	public function getOffset() {
		return $this->offset;
	}
} 