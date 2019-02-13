<?php 

/**
 * Table tl_pm 
 */
$GLOBALS['TL_DCA']['tl_messages'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'switchToEdit'                => false,
		'enableVersioning'            => false,
		'closed'					  => true,
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('tstamp'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('tstamp'),
			'format'                  => '%s',
			'label_callback'		  => array('tl_pm', 'labelCallback'),
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_pm']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_pm']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => 'sender,recipient,tstamp;message;status,senderDeleted,recipientDeleted'
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
			'label'                   => &$GLOBALS['TL_LANG']['tl_pm']['tstamp'],
			'exclude'                 => true,
			'inputType'               => 'text',
            'eval'                    => array('maxlength'=>10, 'rgxp'=>'date', 'style'=>'" disabled="disabled'),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'sender' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pm']['sender'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'recipient' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pm']['recipient'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'membertext',
			'foreignKey'			  => 'tl_member.username',
            'eval'                    => array('mandatory'=>true),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'message' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pm']['message'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'sql'                     => "mediumtext NULL"
		),
		'status' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pm']['status'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'select',
			'options'				  => array(0, 1, 2),
			'reference'				  => &$GLOBALS['TL_LANG']['tl_pm']['status_options'],
            'eval'					  => array(),
            'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),
		'senderDeleted' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pm']['senderDeleted'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
            'eval'					  => array('style'=>'" disabled="disabled'),
            'sql'                     => "char(1) NOT NULL default ''"
		),
		'recipientDeleted' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pm']['recipientDeleted'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
            'eval'					  => array('style'=>'" disabled="disabled'),
            'sql'                     => "char(1) NOT NULL default ''"
		),
	)
);
