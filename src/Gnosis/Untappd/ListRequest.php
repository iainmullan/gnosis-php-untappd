<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/14/15
 * Time: 9:07 PM
 */

namespace Gnosis\Untappd;


abstract class ListRequest implements IListRequest {
	public $limit = 25;

	public function getLimit() {
		return $this->limit;
	}
} 