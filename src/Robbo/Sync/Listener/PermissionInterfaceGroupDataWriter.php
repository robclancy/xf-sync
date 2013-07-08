<?php namespace Sync;

class PermissionInterfaceGroupDataWriter extends XFCP_PermissionInterfaceGroupDataWriter {

	protected function _postSave()
	{
		parent::_postSave();
		
		XenForoSync::export('Permissions');
	}
}
