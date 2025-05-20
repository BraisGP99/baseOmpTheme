<?php

namespace APP\plugins\themes\baseOmpTheme;

use APP\core\Application;
use PKP\facades\Locale;
use PKP\plugins\ThemePlugin;

class BaseOmpThemePlugin extends ThemePlugin {
	public function init() {
		$request = Application::get()->getRequest();
		$locale = Locale::getLocale();
		$localeMetadata = Locale::getMetadata($locale);

	
		// RTL
		if ($localeMetadata->isRightToLeft()) {
			$this->addStyle('bootstrap-rtl', 'styles/bootstrap-rtl.min.css');
		}

		// Bootstrap 5 -> To add new styles or templates using BootStrap 5 
		$this->addStyle('bootstrap5', 'bootstrap/css/bootstrap.min.css');
		$this->addStyle('styles', 'styles/styles.css');
		$this->addScript('bootstrap5', 'bootstrap/js/bootstrap.bundle.min.js');

		// Load icon font FontAwesome - http://fontawesome.io/
        $this->addStyle(
            'fontAwesome',
            $request->getBaseUrl() . '/lib/pkp/styles/fontawesome/fontawesome.css',
            ['baseUrl' => '']
        );

		$this->addMenuArea(['primary', 'user']);

		
	}

	function getDisplayName() {
		return __('plugins.themes.baseOmpTheme.name');
	}

	function getDescription() {
		return __('plugins.themes.baseOmpTheme.description');
	}
}

if (!PKP_STRICT_MODE) {
    class_alias('\APP\plugins\themes\baseOmpTheme\BaseOmpThemePlugin', '\BaseOmpThemePlugin');
}
