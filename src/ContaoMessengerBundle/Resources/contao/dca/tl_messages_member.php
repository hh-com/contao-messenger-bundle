<?php 

/**
 * Table tl_messages aa aa fd
 * sd
 */
$GLOBALS['TL_DCA']['tl_messages_member'] = array
(

	// Config
	'config' => array
	(
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'tstamp' => 'index',
				'sender' => 'index',
				'recipient' => 'index'
			)
		)
	),
	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_messages']['tstamp'],
			'exclude'                 => true,
			'inputType'               => 'text',
            'eval'                    => array('maxlength'=>10, 'rgxp'=>'date', 'style'=>'" disabled="disabled'),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'sender' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_messages']['sender'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'recipient' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_messages']['recipient'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'membertext',
			'foreignKey'			  => 'tl_member.username',
            'eval'                    => array('mandatory'=>true),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'message' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_messages']['message'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'sql'                     => "mediumtext NULL"
		),
		'status' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_messages']['status'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'select',
			'options'				  => array(0, 1, 2, 4),
			'reference'				  => &$GLOBALS['TL_LANG']['tl_messages']['status_options'],
            'eval'					  => array(),
            'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),
		'senderDeleted' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_messages']['senderDeleted'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
            'eval'					  => array('style'=>'" disabled="disabled'),
            'sql'                     => "char(1) NOT NULL default ''"
		),
		'recipientDeleted' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_messages']['recipientDeleted'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
            'eval'					  => array('style'=>'" disabled="disabled'),
            'sql'                     => "char(1) NOT NULL default ''"
		),
	)
);
