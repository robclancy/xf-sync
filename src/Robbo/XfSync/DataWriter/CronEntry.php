<?php namespace Robbo\XfSync\DataWriter;

class CronEntry extends XFCP_CronEntry {

	use CommonTrait;

	protected $syncResource = 'Cron';
}
