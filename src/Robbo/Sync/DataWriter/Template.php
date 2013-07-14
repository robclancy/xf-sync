<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class Template extends XFCP_Template {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('Templates');
	}
}
