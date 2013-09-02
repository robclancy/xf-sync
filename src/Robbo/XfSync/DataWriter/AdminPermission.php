<?php namespace Robbo\XfSync\DataWriter;

class AdminPermission extends XFCP_Permission {

    use CommonTrait;

    protected $syncResource = 'AdminPermissions';
}
