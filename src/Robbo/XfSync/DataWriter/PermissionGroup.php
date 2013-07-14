<?php namespace Robbo\XfSync\DataWriter;

class PermissionGroup extends XFCP_PermissionGroup {

	use CommonTrait;

	protected $syncResource = 'Permissions';
}
