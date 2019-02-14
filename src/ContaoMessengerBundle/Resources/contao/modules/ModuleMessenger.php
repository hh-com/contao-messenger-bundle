<?php

namespace ContaoMessengerBundle;

class ModuleMessenger extends \Module
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

	
	public function getAllFollowingsAndFollowersFromArtist($artistArray)
	{

		$return = array();

		$ursArr = array(
			'follows' => array(),
			'following' => array()
		);

		$iFollowsObj = \Database::getInstance()
		->prepare("SELECT  m.* FROM tl_member_follow f
				INNER JOIN tl_member m
					ON (f.followThis = m.uniqueID )
			WHERE f.pid = ? "
			)
		->execute( $artistArray['id'] );

		$followIngObj = \Database::getInstance()
		->prepare("SELECT  m.* FROM tl_member_follow f
				INNER JOIN tl_member m
					ON (f.pid = m.id )
			WHERE f.followThis = ? "
			)
		->execute( $artistArray['uniqueID']  );

		if ($iFollowsObj->numRows > 0 )
		{
			$ursArr['follows'] = $iFollowsObj->fetchAllAssoc();
		}

		if ($followIngObj->numRows > 0 )
		{
			$ursArr['following'] = $followIngObj->fetchAllAssoc();
		}
		
		foreach ( $ursArr['follows'] as $tmp1 )
			$return[] = $tmp1 ;

		foreach ( $ursArr['following'] as $tmp2 )
			$return[] = $tmp1 ;

		return $return;

	}
	
	
}