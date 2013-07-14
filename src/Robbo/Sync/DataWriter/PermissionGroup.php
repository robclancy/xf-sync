<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class PermissionGroup extends XFCP_PermissionGroup {

	protected function _postSave()
	{
		parent::_postSave();
		
		XenForoSync::export('Permissions');
	}
}
