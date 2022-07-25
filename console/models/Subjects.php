<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property int $id
 * @property int|null $crm_id
 * @property string|null $name
 * @property int|null $weight
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['crm_id', 'weight'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'crm_id' => 'Crm ID',
            'name' => 'Name',
            'weight' => 'Weight',
        ];
    }
}
