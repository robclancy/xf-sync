<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class PermissionInterfaceGroup extends XFCP_PermissionInterfaceGroup {

	use CommonTrait;

	protected $syncResource = 'Permissions';
}
