<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class Permission extends XFCP_Permission {

	use CommonTrait;

	protected $syncResource = 'Permissions';
}
