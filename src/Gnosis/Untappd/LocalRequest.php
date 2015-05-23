<?php
/**
 * Created by PhpStorm.
 * User: CElston
 * Date: 5/10/15
 * Time: 3:48 PM
 */

namespace Gnosis\Untappd;


class LocalRequest implements ILocalRequest {
	public $latitude;
	public $longitude;

	public function __construct($latitude, $longitude) {
		$this->latitude = $latitude;
		$this->longitude = $longitude;
	}

	public function getLatitude() {
		return $this->latitude;
	}

	public function getLongitude() {
		return $this->longitude;
	}
} 