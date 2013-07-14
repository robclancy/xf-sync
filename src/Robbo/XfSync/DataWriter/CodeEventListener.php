<?php namespace Robbo\XfSync\DataWriter;

class CodeEventListener extends XFCP_CodeEventListener {

	use CommonTrait;

	protected $syncResource = 'CodeEventListeners';
}
