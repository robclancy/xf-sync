<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class RoutePrefixDataWriter extends XFCP_RoutePrefixDataWriter {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('RoutePrefixes');
	}
}
