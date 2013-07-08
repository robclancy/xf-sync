<?php namespace Sync;

class TemplateDataWriter extends XFCP_TemplateDataWriter {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('Templates');
	}
}
