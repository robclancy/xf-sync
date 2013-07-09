<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class PermissionDataWriter extends XFCP_PermissionDataWriter {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('Permissions');
	}
}
