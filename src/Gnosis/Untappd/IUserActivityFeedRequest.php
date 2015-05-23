<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/12/15
 * Time: 4:09 PM
 */

namespace Gnosis\Untappd;


interface IUserActivityFeedRequest extends IFeedRequest {
	function getUsername();
}