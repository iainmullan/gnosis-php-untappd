<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/10/15
 * Time: 12:02 PM
 */

namespace Gnosis\Untappd;


interface IBeerActivityFeedRequest extends IFeedRequest {
    function getBeerId();
} 