<?php namespace Robbo\XfSync\DataWriter;

use Robbo\Sync\XenForoSync;

class CodeEvent extends XFCP_CodeEvent {

	use CommonTrait;

	protected $syncResource = 'CodeEvents';
}
