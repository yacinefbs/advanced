<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\modules\api\Api',
        ],
        'markdown' => [
            // the module class
            'class' => 'kartik\markdown\Module',
     
            // the controller action route used for markdown editor preview
            'previewAction' => '/markdown/parse/preview',
     
            // the list of custom conversion patterns for post processing
            'customConversion' => [
                '<table>' => '<table class="table table-bordered table-striped">'
            ],
     
            // whether to use PHP SmartyPantsTypographer to process Markdown output
            'smartyPants' => true
     
        ],
        'ckeditor' => [
            'class'    => 'maxwen\ckeditor\controllers\EditorController',
            'viewPath' => '@vendor/maxwen/yii2-ckeditor-widget/views/editor'
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'todo'],
                    'villes' => 'villes/index',
                   'api/v1/villes/<id:\d+>/<key>' => 'villes/ville'
            ],
        ],
        */
        
    ],
    'params' => $params,
];
