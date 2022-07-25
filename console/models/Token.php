<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "token".
 *
 * @property int $id
 * @property string|null $token
 */
class Token extends \yii\db\ActiveRecord
{

    const DATA = ['email' => 'Kochetkova.zhanna@gmail.com', 'api_key' => 'a116d655-83ab-11ea-a443-ac1f6b478310'],
          HOST = 'https://pythonica.s20.online',
          BRANCH = '1';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'token';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token'], 'string', 'max' => 1023],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
        ];
    }
}
