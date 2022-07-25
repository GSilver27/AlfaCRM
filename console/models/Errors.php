<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "errors".
 *
 * @property int $id
 * @property string|null $table
 * @property string|null $error
 * @property int|null $error_id
 * @property string|null $date
 */
class Errors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'errors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['error'], 'string'],
            [['error_id'], 'integer'],
            [['date'], 'safe'],
            [['table'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table' => 'Table',
            'error' => 'Error',
            'error_id' => 'Error ID',
            'date' => 'Date',
        ];
    }
}
