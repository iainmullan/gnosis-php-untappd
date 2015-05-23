<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/10/15
 * Time: 11:56 AM
 */

namespace Gnosis\Untappd;


interface IBeerSearchRequest {
    function getQuery();
    function getLimit();
    function getSort();
    function getOffset();
} 