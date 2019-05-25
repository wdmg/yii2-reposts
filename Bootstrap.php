<?php

namespace wdmg\reposts;

/**
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @copyright       Copyright (c) 2019 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 */

use yii\base\BootstrapInterface;
use Yii;
use wdmg\reposts\components\Reposts;


class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        // Get the module instance
        $module = Yii::$app->getModule('reposts');

        // Get URL path prefix if exist
        $prefix = (isset($module->routePrefix) ? $module->routePrefix . '/' : '');

        // Add module URL rules
        $app->getUrlManager()->addRules(
            [
                $prefix . '<module:reposts>/' => '<module>/reposts/index',
                $prefix . '<module:reposts>/<controller:\w+>/' => '<module>/<controller>',
                $prefix . '<module:reposts>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                [
                    'pattern' => $prefix . '<module:likes>/',
                    'route' => '<module>/reposts/index',
                    'suffix' => '',
                ], [
                    'pattern' => $prefix . '<module:reposts>/<controller:\w+>/',
                    'route' => '<module>/<controller>',
                    'suffix' => '',
                ], [
                    'pattern' => $prefix . '<module:reposts>/<controller:\w+>/<action:\w+>',
                    'route' => '<module>/<controller>/<action>',
                    'suffix' => '',
                ],
            ],
            true
        );

        // Configure options component
        $app->setComponents([
            'reposts' => [
                'class' => Reposts::className()
            ]
        ]);
    }
}