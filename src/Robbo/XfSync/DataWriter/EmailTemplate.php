<?php namespace Robbo\XfSync\DataWriter;

class EmailTemplate extends XFCP_EmailTemplate {

	use CommonTrait;

	protected $syncResource = 'EmailTemplates';
}
