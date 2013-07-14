<?php namespace Robbo\XfSync\DataWriter;

use Robbo\Sync\XenForoSync;

class CodeEventListener extends XFCP_CodeEventListener {

	use CommonTrait;

	protected $syncResource = 'CodeEventListeners';
}
