<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class RoutePrefix extends XFCP_RoutePrefix {

	use CommonTrait;

	protected $syncResource = 'RoutePrefixes';
}
