<?php namespace Robbo\XfSync\DataWriter;

class PermissionInterfaceGroup extends XFCP_PermissionInterfaceGroup {

	use CommonTrait;

	protected $syncResource = 'Permissions';
}
