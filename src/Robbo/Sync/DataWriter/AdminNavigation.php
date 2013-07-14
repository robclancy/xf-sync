<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class AdminNavigation extends XFCP_AdminNavigation {

	use CommonTrait;

	protected $syncResource = 'AdminNavigation';
}
