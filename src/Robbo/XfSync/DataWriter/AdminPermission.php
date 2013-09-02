<?php namespace Robbo\XfSync\DataWriter;

class AdminPermission extends XFCP_AdminPermission {

    use CommonTrait;

    protected $syncResource = 'AdminPermissions';
}
