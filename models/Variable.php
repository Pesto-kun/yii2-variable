<?php

namespace pesto\variable\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "variables".
 *
 * @property string $name
 * @property string $value
 */
class Variable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'variables';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'value' => 'Value',
        ];
    }

    public static function primaryKey() {
        return ['name'];
    }
}
