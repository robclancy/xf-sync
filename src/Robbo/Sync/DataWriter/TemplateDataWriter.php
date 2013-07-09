<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class TemplateDataWriter extends XFCP_TemplateDataWriter {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('Templates');
	}
}
