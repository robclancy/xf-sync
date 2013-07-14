<?php namespace Robbo\Sync\DataWriter;

// I am sick of copy pasting all the things, let's just use a trait

trait CommonTrait {

	protected function _postSave()
	{
		parent::_postSave();

		if ( ! is_null($this->syncResource))
		{
			XenForoSync::export($this->syncResource);
		}
	}

	protected function _postDelete()
	{
		parent::_postDelete();

		if ( ! is_null($this->syncResource))
		{
			XenForoSync::export($this->syncResource);
		}
	}
}