<?php namespace Robbo\XfSync;

class Listener {

	public static function extendClass($class, array &$extend)
	{
		$writers = [
			'RoutePrefix', 'Permission', 'PermissionGroup', 'PermissionInterfaceGroup',
			'Template', 'AdminTemplate', 'EmailTemplate', 'Phrase', 'CodeEvent', 
			'CodeEventListener', 'Option', 'OptionGroup', 'CronEntry', 'AdminNavigation',
		];

		$dataType = str_replace('XenForo_DataWriter_', '', $class);
		if (in_array($dataType, $writers))
		{
			$extend[] = 'Robbo\\XfSync\\DataWriter\\'.$dataType;
		}
	}
}