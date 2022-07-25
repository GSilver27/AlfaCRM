<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "token".
 *
 * @property int $id
 * @property string|null $token_old
 * @property string|null $token_new
 * @property string|null $refresh_token
 */
class Token extends \yii\db\ActiveRecord
{
    const DATA_OLD = ['email' => 'Kochetkova.zhanna@gmail.com', 'api_key' => 'a116d655-83ab-11ea-a443-ac1f6b478310'],
        HOST_OLD = 'https://pythonica.s20.online',
        HOST_NEW = 'https://api.alfacrm.pro/v396/',
        BRANCH = '1',
        DATA_NEW = ['username' => 'jtsu.c@yandex.ru', 'password' => 'mm5fNMoQl9'],
        KEY = 'X-APP-KEY: 471e706a808bb8efbff2f7872671fde7';


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
            [['token_new', 'refresh_token'], 'string'],
            [['token_old'], 'string', 'max' => 1023],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token_old' => 'Token Old',
            'token_new' => 'Token New',
            'refresh_token' => 'Refresh Token',
        ];
    }
}
