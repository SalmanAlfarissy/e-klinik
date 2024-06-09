<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'E-Klinik',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.commands.shell.*',
		'system.utils.CPasswordHelper',
		'application.modules.srbac.controllers.SBaseController',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'salman26',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'srbac' => array(
            'class' => 'application.modules.srbac.SrbacModule',
            'userclass' => 'User',
            'userid' => 'id',
            'username' => 'username',
            'debug' => true,
            'pageSize' => 10,
            'superUser' => 'Admin', 
            'css' => 'srbac.css',
            'layout' => 'application.views.layouts.main',
            'notAuthorizedView' => 'application.views.site.unauthorized',
            'alwaysAllowed' => array(
                'SiteLogin', 'SiteLogout', 'SiteIndex', 'SiteAdmin', 'SiteError', 'SiteContact'
            ), 
            'userActions' => array('Show', 'View', 'List'),
            'listBoxNumberOfLines' => 15, 
            'imagesPath' => 'srbac.images', 
            'imagesPack' => 'noia', 
            'iconText' => true, 
            'header' => 'srbac.views.authitem.header',
            'footer' => 'srbac.views.authitem.footer',
            'showHeader' => true, 
            'showFooter' => true, 
            'alwaysAllowedPath' => 'srbac.components',
        ),
	
	),

	// application components
	'components'=>array(

		'authManager' => array(
            'class' => 'CDbAuthManager', 
            'connectionID' => 'db', 
            'itemTable' => 'AuthItem', 
            'assignmentTable' => 'AuthAssignment', 
            'itemChildTable' => 'AuthItemChild', 
        ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules'=>array(
				'site/page/<view:\w+>' => 'site/page',
				'gii' => 'gii',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
