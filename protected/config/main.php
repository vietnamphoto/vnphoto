<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');

return array(
    'theme' => 'vnphoto', // requires you to copy the theme under your themes directory
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => "VietNam's Photo",
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'bootstrap.helpers.TbHtml',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
        'application.widgets.Bootstrap.*',
        'application.extensions.EAjaxUpload.*',
    ),
    'aliases' => array(
        'xupload' => 'ext.xupload',
    ),
    'defaultController' => 'image',
    'modules' => array(
        'payPal'=>array(
        'env'=>'sandbox',
        'account'=>array(
            'username'=>'nhaqueonline_24h_api1.yahoo.com.vn',
            'password'=>'RHUCKFYAYCHBJQXT',
            'signature'=>'AiPC9BjkCyDFQXbSkoZcgqH3hpacATCzrIdq66SJEQONBSQhSVAYAVgJ',
            'email'=>'nhaqueonline_24h@yahoo.com.vn',
            'identityToken'=>'W2EEGSPLCNPHE',
        ),
        'components'=>array(
            'buttonManager'=>array(
                'class'=>'payPal.components.PPDbButtonManager',
                //'class'=>'payPal.components.PPPhpButtonManager',
             ),
        ),
    ),
        'user' => array(
            'tableUsers' => 'users',
            'tableProfiles' => 'profiles',
            'tableProfileFields' => 'profiles_fields',
            # encrypting method (php hash function)
            'hash' => 'md5',
            # send activation email
            'sendActivationMail' => true,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
            # automatically login from registration
            'autoLogin' => true,
            # registrationLogin path
            'registrationloginUrl' => array('/user/Registerb'),
            # registration path
            'registrationUrl' => array('/user/Registerb'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/user/Registerb'),
            # page after login
            'returnUrl' => array('//site/Administrator'),
            # page after logout
            'returnLogoutUrl' => array('/image/index'),
        ),
        'rights' => array(
            'superuserName' => 'Admin', // Name of the role with super user privileges. 
            'authenticatedName' => 'Authenticated', // Name of the authenticated user role. 
            'userIdColumn' => 'id', // Name of the user id column in the database. 
            'userNameColumn' => 'username', // Name of the user name column in the database. 
            'enableBizRule' => true, // Whether to enable authorization item business rules. 
            'enableBizRuleData' => true, // Whether to enable data for business rules. 
            'displayDescription' => true, // Whether to use item description instead of name. 
            'flashSuccessKey' => 'RightsSuccess', // Key to use for setting success flash messages. 
            'flashErrorKey' => 'RightsError', // Key to use for setting error flash messages. 
            'baseUrl' => '/rights', // Base URL for Rights. Change if module is nested. 
            'layout' => 'rights.views.layouts.main', // Layout to use for displaying Rights. 
            'appLayout' => 'application.views.layouts.main', // Application layout. 
            'cssFile' => 'rights.css', // Style sheet file to use for Rights. 
            'install' => false, // Whether to enable installer. 
            'debug' => false,
        ),
        'gii' => array(
            'generatorPaths' => array('bootstrap.gii',),
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'db' => array(
            #...
            'tablePrefix' => 'tbl_',
        #...
        ),
        #...
        'user' => array(
            'class' => 'RWebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('/user/login'),
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager',
            'connectionID' => 'db',
            'defaultRoles' => array('Authenticated', 'Guest'),
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
        'search' => array(
            'class' => 'application.components.DGSphinxSearch',
            'server' => '127.0.0.1',
            'port' => 9312,
            'maxQueryTime' => 3000,
            'enableProfiling' => 0,
            'enableResultTrace' => 0,
            'fieldWeights' => array(
                'name' => 10000,
                'keywords' => 100,
            ),
        ),
        // uncomment the following to enable URLs in path-format
//        'urlManager' => array(
//            'urlFormat' => 'path',
//            'rules' => array(
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
//                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//            ),
//        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=vietnamphoto',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'vnphoto_',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
//        'Paypal' => array(
//    'class'=>'application.components.Paypal',
//    'apiUsername' => 'admin',
//    'apiPassword' => 'admin',
//    'apiSignature' => 'admin',
//    'apiLive' => false,
// 
//    'returnUrl' => 'paypal/confirm/', //regardless of url management component
//    'cancelUrl' => 'paypal/cancel/', //regardless of url management component
// 
//    // Default currency to use, if not set USD is the default
//    'currency' => 'USD',
// 
//    // Default description to use, defaults to an empty string
//    //'defaultDescription' => '',
// 
//    // Default Quantity to use, defaults to 1
//    //'defaultQuantity' => '1',
// 
//    //The version of the paypal api to use, defaults to '3.0' (review PayPal documentation to include a valid API version)
//    //'version' => '3.0',
//),
        'curl' => array(
            'class' => 'application.extensions.curl.Curl',
            'options' => array(
                'timeout' => 0,
                'cookie' => array(
                    'set' => 'cookie'
                ),
                'login' => array(
                    'username' => 'myuser',
                    'password' => 'mypass'
                ),
                'proxy' => array(
                    'url' => 'someproxy.com',
                    'port' => 80
                ),
                'proxylogin' => array(
                    'username' => 'someuser',
                    'password' => 'somepasswords'
                ),
                'setOptions' => array(
                    CURLOPT_UPLOAD => true,
                    CURLOPT_USERAGENT => Yii::app()->params['agent']
                ),
            )
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
