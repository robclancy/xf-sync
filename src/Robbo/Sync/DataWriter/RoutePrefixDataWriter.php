<?php namespace Sync;

class RoutePrefixDataWriter extends XFCP_RoutePrefixDataWriter {

	protected function _postSave()
	{
		parent::_postSave();

		XenForoSync::export('RoutePrefixes');
	}
}
