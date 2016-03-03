<?php

namespace pesto\variable;

use Yii;
use yii\base\Component;
use yii\helpers\Json;

class Variable extends Component {

    public $data;

    /**
     * Сохранение значения переменной
     *
     * @param $name
     * @param $value
     *
     * @return bool
     */
    public function set($name, $value) {

        /** @var \pesto\variable\models\Variable $model */
        $model = \pesto\variable\models\Variable::findOne($name);

        if(!$model) {
            $model = new \pesto\variable\models\Variable();
            $model->name = $name;
        }
        if(is_array($value)) {
            $value = Json::encode($value);
        }
        $model->value = (string)$value;
        if($model->save()) {
            $this->data[$name] = $value;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Получение значения переменной
     *
     * @param $name
     * @param null $default
     *
     * @return mixed|null
     */
    public function get($name, $default = null) {

        if(!isset($this->data[$name])) {

            /** @var \pesto\variable\models\Variable $model */
            $model = \pesto\variable\models\Variable::findOne($name);
            if(isset($model->value)) {
                if($json = Json::decode($model->value)) {
                    $this->data[$name] = $json;
                } else {
                    $this->data[$name] = $model->value;
                }
            } else {
                $this->data[$name] = $default;
            }
        }

        return $this->data[$name];
    }
}