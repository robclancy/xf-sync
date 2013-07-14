<?php namespace Robbo\Sync\DataWriter;

use Robbo\Sync\XenForoSync;

class EmailTemplate extends XFCP_EmailTemplate {

	use CommonTrait;

	protected $syncResource = 'EmailTemplates';
}
