<?php namespace Robbo\XfSync\DataWriter;

class Permission extends XFCP_Permission {

	use CommonTrait;

	protected $syncResource = 'Permissions';
}
