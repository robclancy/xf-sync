<?php namespace Robbo\Sync;

class Listener {

	public static function extendClass($class, array &$extend)
	{
		$writers = [
			'RoutePrefix', 'Permission', 'PermissionGroup', 'PermissionInterfaceGroup',
			'Template', 'AdminTemplate', 'Phrase', 'CodeEvent', 'CodeEventListener',
		];

		$dataType = str_replace('XenForo_DataWriter_', '', $class);
		if (in_array($dataType, $writers))
		{
			$extend[] = 'Robbo\\Sync\\DataWriter\\'.$dataType;
		}
	}
}