<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class AdminTemplate extends XFCP_AdminTemplate {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('AdminTemplates');
	}

	protected function _postDelete()
	{
		parent::_postDelete();

		XenForoSync::export('AdminTemplates');
	}
}
