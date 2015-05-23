<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/12/15
 * Time: 4:51 PM
 */

namespace Gnosis\Untappd;


abstract class FeedRequest extends ListRequest {
	public $maxId;
	public $minId;

	public function getMaxId() {
		return $this->maxId;
	}

	public function getMinId() {
		return $this->minId;
	}
} 