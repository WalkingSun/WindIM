<?php
/**
 * Created by PhpStorm.
 * User: WalkingSun
 * Date: 2019/1/8
 * Time: 18:25
 */
namespace app\modules\v1;

class Module extends \yii\base\Module{

    public $controllerNamespace = 'app\modules\v1\controllers';

    public function init(){
        parent::init();
    }

}