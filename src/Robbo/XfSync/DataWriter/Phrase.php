<?php namespace Robbo\XfSync\DataWriter;

use Robbo\Sync\XenForoSync;

class Phrase extends XFCP_Phrase {

	use CommonTrait;

	protected $syncResource = 'Phrases';
}
