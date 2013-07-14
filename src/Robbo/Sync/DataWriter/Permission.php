<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class Permission extends XFCP_Permission {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('Permissions');
	}
}
