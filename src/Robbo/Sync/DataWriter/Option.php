<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class Option extends XFCP_Option {

	use CommonTrait;

	protected $syncResource = 'Options';
}
