<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/14/15
 * Time: 9:05 PM
 */

namespace Gnosis\Untappd;


interface IUserFriendsRequest extends IListRequest {
	function getUsername();
	function getOffset();
} 