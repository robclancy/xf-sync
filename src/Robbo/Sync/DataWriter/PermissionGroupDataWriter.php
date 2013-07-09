<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class PermissionGroupDataWriter extends XFCP_PermissionGroupDataWriter {

	protected function _postSave()
	{
		parent::_postSave();
		
		XenForoSync::export('Permissions');
	}
}
