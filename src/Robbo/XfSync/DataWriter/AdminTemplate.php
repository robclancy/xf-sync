<?php namespace Robbo\XfSync\DataWriter;

use Robbo\Sync\XenForoSync;

class AdminTemplate extends XFCP_AdminTemplate {

	use CommonTrait;

	protected $syncResource = 'AdminTemplates';
}
