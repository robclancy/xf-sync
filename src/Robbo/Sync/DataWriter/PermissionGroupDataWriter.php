<?php namespace Sync;

class PermissionGroupDataWriter extends XFCP_PermissionGroupDataWriter {

	protected function _postSave()
	{
		parent::_postSave();
		
		XenForoSync::export('Permissions');
	}
}
