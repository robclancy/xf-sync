<?php namespace Robbo\XfSync\DataWriter;

use Robbo\Sync\XenForoSync;

class OptionGroup extends XFCP_OptionGroup {

	use CommonTrait;

	protected $syncResource = 'Options';
}
