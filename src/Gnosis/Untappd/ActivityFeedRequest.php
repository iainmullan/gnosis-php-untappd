<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/10/15
 * Time: 3:29 PM
 */

namespace Gnosis\Untappd;


class ActivityFeedRequest implements IActivityFeedRequest {
	public $maxId;
	public $minId;
	public $limit = 25;

	public function getMaxId() {
		return $this->maxId;
	}

	public function getMinId() {
		return $this->minId;
	}

	public function getLimit() {
		return $this->limit;
	}
} 