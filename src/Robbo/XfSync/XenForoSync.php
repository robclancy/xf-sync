<?php namespace Robbo\XfSync;

class XenForoSync {

	protected $config;

	protected static $instance;

	public function __construct($directory)
	{
		static::$instance = $this;

		$this->loadConfig($directory);

		\XenForo_CodeEvent::addListener('load_class_datawriter', 'Robbo\XfSync\Listener::extendClass');
	}

	public static function export($dataType)
	{
		if (method_exists(__CLASS__, 'export'.$dataType))
		{
			static::$instance->{'export'.$dataType}();
			return;
		}

		// If the export method doesn't exist then the type is consistant so we can use a generic method
		static::$instance->exportGeneric($dataType);
	}

	protected function exportAdminTemplates()
	{
		$this->writeTemplates(true);
	}

	protected function exportTemplates()
	{
		$this->writeTemplates();
	}

	protected function writeTemplates($admin = false)
	{
		$templates = $this->getTemplates($admin ? -1 : 0);

		foreach ($templates AS $template)
		{
			if ($template['addon_id'] != $this->config->id)
			{
				continue;
			}

			$path = $this->config->templates.'/'.($admin ? 'admin/' : '').$template['title'].'.xml';

			if ( ! file_exists(dirname($path)))
			{
				$this->fileSystem->makeDirectory(dirname($path), 0777, true);
			}

			$xml = '<template title="'.$template['title'].'"';
			if ( ! $admin)
			{
				$xml .= ' version_id="'.$template['version_id'].'" version_string="'.$template['version_string'].'"';
			}

			$xml .= '><![CDATA['.$template['template'].']]></template>';

			file_put_contents($path, $xml);
		}
	}

	protected function getTemplates($styleId)
	{
		if ($styleId == -1)
		{
			return $this->getDb()->fetchAll('
				SELECT *, -1 AS style_id
				FROM xf_admin_template
			');
		}

		return $this->getDb()->fetchAll('
			SELECT *
			FROM xf_template
			WHERE style_id = ?
		', $styleId);
	}

	protected function getDb()
	{
		return \XenForo_Application::getDb();
	}

	protected function exportAdminPermissions()
	{
		$model = $this->getModel('Admin');
		list ($dom, $root) = $this->createNewDom('admin_permissions');

		$model->appendAdminPermissionsAddOnXml($root, $this->config->id);

		return $this->saveDom($this->config->data.'/admin_permissions.xml', $dom);
	}

	protected function exportRoutePrefixes()
	{
		$model = $this->getModel('RoutePrefix');
		list ($dom, $root) = $this->createNewDom('route_prefixes');

		$model->appendPrefixesAddOnXml($root, $this->config->id);

		$this->saveDom($this->config->data.'/route_prefixes.xml', $dom);
	}

	protected function exportCodeEvents()
	{
		$model = $this->getModel('CodeEvent');
		list ($dom, $root) = $this->createNewDom('code_events');

		$model->appendEventsAddOnXml($root, $this->config->id);

		return $this->saveDom($this->config->data.'/code_events.xml', $dom);
	}

	protected function exportCodeEventListeners()
	{
		$model = $this->getModel('CodeEvent');
		list ($dom, $root) = $this->createNewDom('code_event_listeners');

		$model->appendEventListenersAddOnXml($root, $this->config->id);

		return $this->saveDom($this->config->data.'/code_event_listeners.xml', $dom);
	}

	protected function exportOptions()
	{
		$model = $this->getModel('Option');
		list ($dom, $root) = $this->createNewDom('optiongroups');

		$model->appendOptionsAddOnXml($root, $this->config->id);

		return $this->saveDom($this->config->data.'/options.xml', $dom);
	}

	protected function exportCron()
	{
		$model = $this->getModel('Cron');
		list ($dom, $root) = $this->createNewDom('cron');

		$model->appendCronEntriesAddOnXml($root, $this->config->id);

		return $this->saveDom($this->config->data.'/cron.xml', $dom);
	}

	protected function exportGeneric($type)
	{
		$snake = strtolower(\Zend_Filter::filterStatic($type, 'Word_CamelCaseToUnderscore'));
		list ($dom, $root) = $this->createNewDom($snake);

		$model = $type;
		if (substr($model, strlen($model)-1) == 's')
		{
			$model = substr($model, 0, -1);
		}
		$model = $this->getModel($model);

		$model->{'append'.$type.'AddOnXml'}($root, $this->config->id);

		$this->saveDom($this->config->data.'/'.$snake.'.xml', $dom);
	}

	protected function getModel($model)
	{
		if (strpos($model, '_') === false)
		{
			$model = 'XenForo_Model_'.$model;
		}

		return \XenForo_Model::create($model);
	}

	protected function createNewDom($rootName)
	{
		$dom = new \DOMDocument('1.0', 'utf-8');
		$dom->formatOutput = true;
		$root = $dom->createElement($rootName);
		$dom->appendChild($root);

		return array($dom, $root);
	}

	protected function saveDom($path, $dom)
	{
		@unlink($path);

		file_put_contents($path, $dom->saveXml());
	}

	protected function loadConfig($directory)
	{
		if ( ! file_exists($directory))
		{
			throw new \RuntimeException('Directory doesn\'t exist');
		}

		// We require a build.json file to get information about the add-on from
		if ( ! file_exists($directory.'/addon.json'))
		{
			throw new \RuntimeException('addon.json not found.');
		}

		$config = json_decode(file_get_contents($directory.'/addon.json'));
		if (is_null($config))
		{
			throw new \RuntimeException('addon.json doesn\'t contain valid json');
		}

		$required = array('id', 'name', 'version');
		foreach ($required AS $r)
		{
			if ( ! isset($config->$r))
			{
				throw new \RuntimeException('build.json is invalid, '.$r.' needs to be defined');
			}
		}

		$defaults = array(
			'version_id' => '{revision}',
			'library' => false,
			'installer' => false,
			'website' => '',
			'data' => $directory.'/addon',
			'templates' => $directory.'/addon/templates',
			'composer' => false,
			'installer' => false,
			'includes' => array(),
		);

		foreach ($defaults AS $key => $value)
		{
			if ( ! isset($config->$key))
			{
				$config->$key = $value;
			}
		}

		if ($config->library AND ! $config->installer AND file_exists($directory.'/'.$config->library.'/Installer.php'))
		{
			$config->installer = $config->library.'/Installer.php';
		}

		$this->config = $config;
	}
}

