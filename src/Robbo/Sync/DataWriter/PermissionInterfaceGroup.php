<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class PermissionInterfaceGroup extends XFCP_PermissionInterfaceGroup {

	protected function _postSave()
	{
		parent::_postSave();
		
		XenForoSync::export('Permissions');
	}
}
