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
                    'nouveauVille' => 'villes/create', 

                    'api/v1/ville/<id:\d+>/<key>' => 'villes/ville',
                    'api/v1/villes/<page:\d+>/<key>' => 'villes/list-villes',


                    'pays' => 'pays/index', 'api/v1/pays/<id:\d+>/<key>' => 'pays/pays',
                    'pays' => 'pays/index', 'api/v1/allpays/<page:\d+>/<key>' => 'pays/list-pays',

                    'salles' => 'salles/index', 'api/v1/salle/<id:\d+>/<key>' => 'cinema-salles/salle',
                    'salles' => 'salles/index', 'api/v1/salles/<page:\d+>/<key>' => 'cinema-salles/list-salles',

                    'metiers' => 'metiers/index', 'api/v1/metier/<id:\d+>/<key>' => 'cinema-metiers/metier',
                    'metiers' =>  'metiers/index', 'api/v1/metiers/<page:\d+>/<key>' => 'cinema-metiers/list-metiers',

                    'genres' =>  'genres/index', 'api/v1/genre/<id:\d+>/<key>' => 'cinema-genres/genre',
                    'genres' =>  'genres/index', 'api/v1/genres/<page:\d+>/<key>' => 'cinema-genres/list-genres',

                    'equipes' =>  'equipes/index', 'api/v1/equipe/<id:\d+>/<key>' => 'cinema-equipes/equipe',
                    'equipes' =>  'equipes/index', 'api/v1/equipes/<page:\d+>/<key>' => 'cinema-equipes/list-equipes',

                    'films' =>  'films/index', 'api/v1/film/<id:\d+>/<key>' => 'cinema-films/film',
                    'films' =>  'films/index', 'api/v1/films/<page:\d+>/<key>' => 'cinema-films/list-films',

                    
            ],
        ],*/

        
        
    ],
    'params' => $params,
];
