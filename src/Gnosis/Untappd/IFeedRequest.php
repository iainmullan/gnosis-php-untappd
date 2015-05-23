<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/12/15
 * Time: 4:47 PM
 */

namespace Gnosis\Untappd;


interface IFeedRequest extends IListRequest {
	function getMaxId();
	function getMinId();
} 