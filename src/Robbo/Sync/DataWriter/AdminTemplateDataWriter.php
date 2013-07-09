<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class AdminTemplateDataWriter extends XFCP_AdminTemplateDataWriter {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('AdminTemplates');
	}
}
