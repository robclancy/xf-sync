<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class CronEntry extends XFCP_CronEntry {

	use CommonTrait;

	protected $syncResource = 'Cron';
}
