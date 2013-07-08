<?php namespace Sync;

class AdminTemplateDataWriter extends XFCP_AdminTemplateDataWriter {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('AdminTemplates');
	}
}
