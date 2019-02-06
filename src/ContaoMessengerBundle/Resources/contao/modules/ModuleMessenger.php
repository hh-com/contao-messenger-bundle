<?php

namespace ContaoMessengerBundle;

class ModuleMessenger extends \ModuleMessenger
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
		if (FE_USER_LOGGED_IN !== true) 
		{
			die("Please log in!");
		}

		$user = \Contao\FrontendUser::getInstance();




		$usrDrop = $this->getAllUsersOrFollowers($user, true);
		var_dump($usrDrop);
		exit;
        $this->Template->userDropdown = $this->getAllUsersOrFollowers($user, true);
	}


	public function getAllUsersOrFollowers($currentLoggedin, $allUsers = false)
	{

		if ($allUsers == false)
		{

		}
		else{

			$objMem = \Database::getInstance()
			->prepare("SELECT * FROM tl_member WHERE id != disabled = ?")
			->execute( $currentLoggedin-> id, "" )
			->fetchAllAssoc();
		}

		return $objMem;

	}
	
}