<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.12.2019
 * Time: 12:30
 */

namespace app\widgets\modal;
use yii\base\widget;

class modal extends widget
{
    public $model;

    public function run(){
        return $this->render('modalWindow', ['model' => $this->model]);
    }
}