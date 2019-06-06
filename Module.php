<?php

namespace wdmg\reposts;

/**
 * Yii2 Reposts
 *
 * @category        Module
 * @version         0.0.6
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-reposts
 * @copyright       Copyright (c) 2019 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use Yii;
use wdmg\base\BaseModule;
use wdmg\reposts\components\Reposts;

/**
 * Reposts module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'wdmg\reposts\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = "reposts/index";

    /**
     * @var string, the name of module
     */
    public $name = "Reposts";

    /**
     * @var string, the description of module
     */
    public $description = "Repost counting module";

    /**
     * @var string the module version
     */
    private $version = "0.0.6";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 10;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // Set version of current module
        $this->setVersion($this->version);

        // Set priority of current module
        $this->setPriority($this->priority);

    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        parent::bootstrap($app);

        // Configure options component
        $app->setComponents([
            'reposts' => [
                'class' => Reposts::className()
            ]
        ]);
    }
}