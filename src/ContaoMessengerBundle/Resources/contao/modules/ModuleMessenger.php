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
		echo 222222222222222222222222222222;
		echo "verwende das andere file -.......";
		exit;
		if (FE_USER_LOGGED_IN !== true) 
		{
			die("Please log in!");
		}

		$user = \Contao\FrontendUser::getInstance();




		$usrDrop = $this->getAllUsersOrFollowers($user, true);
		
        $this->Template->userDropdown = $this->getAllUsersOrFollowers($user, true);
	}


	public function getAllUsersOrFollowers($currentLoggedin, $allUsers = false)
	{

		if ($allUsers == false)
		{
			$objMem = \Database::getInstance()
			->prepare("SELECT * FROM tl_member_follow WHERE id != ? or followThis = ? ")
			-> limit(50)
			->execute( $currentLoggedin->id, $currentLoggedin->uniqueID )
			->fetchAllAssoc();
		}
		else{

			$objMem = \Database::getInstance()
			->prepare("SELECT * FROM tl_member WHERE id != ? AND disable = ? ")
			-> limit(50)
			->execute( $currentLoggedin->id, "" )
			->fetchAllAssoc();
		}

		return $objMem;

	}
	
}