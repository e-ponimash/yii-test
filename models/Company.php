<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $director
 * @property string $INN
 * @property string|null $address
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%company}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'director', 'INN'], 'required'],
            [['name', 'director', 'INN', 'address'], 'string', 'max' => 255],
            [['INN'], 'unique'],
            [['INN'], 'string', 'max' => '10'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название компании',
            'director' => 'Директор',
            'INN' => 'ИНН',
            'address' => 'Адрес',
        ];
    }
}
