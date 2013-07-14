<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class PermissionGroup extends XFCP_PermissionGroup {

	use CommonTrait;

	protected $syncResource = 'Permissions';
}
