<?php namespace Sync;

class PermissionDataWriter extends XFCP_PermissionDataWriter {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('Permissions');
	}
}
