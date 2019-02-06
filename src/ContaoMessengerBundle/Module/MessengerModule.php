<?php

namespace ContaoMessengerBundle;

class MessengerModule extends \Module
{
    /**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_messenger';
	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			/** @var \BackendTemplate|object $objTemplate */
			$objTemplate = new \BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['breadcrumb'][0]) . ' ###';
			$objTemplate->title = "Contao Messenger";
			return $objTemplate->parse();
		}
		return parent::generate();
    }
    
    /**
     * Generates the module.
     */
    protected function compile()
    {
        $this->Template->message = 'Hello World';
    }

}