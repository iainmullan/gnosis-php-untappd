<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/10/15
 * Time: 11:06 AM
 */

namespace Gnosis\Untappd;

class BeerSearchRequest implements IBeerSearchRequest {
    public $sort = 'checkin';
    public $offset = 0;
    public $limit = 25;
    public $query = '';

    public function __construct($query) {
        $this->query = $query;
    }

    public function getQuery() {
        return $this->query;
    }

    public function getSort() {
        return $this->sort;
    }

    public function getLimit() {
        return $this->limit;
    }

    public function getOffset() {
        return $this->offset;
    }
} 