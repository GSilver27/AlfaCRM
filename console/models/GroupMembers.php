<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "group_members".
 *
 * @property int $id
 * @property string|null $b_date
 * @property int|null $customer_id
 * @property string|null $e_date
 * @property int|null $group_id
 * @property int|null $crm_id
 */
class GroupMembers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['b_date'], 'safe'],
            [['customer_id', 'group_id', 'crm_id'], 'integer'],
            [['e_date'], 'string', 'max' => 1023],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'b_date' => 'B Date',
            'customer_id' => 'Customer ID',
            'e_date' => 'E Date',
            'group_id' => 'Group ID',
            'crm_id' => 'Crm ID',
        ];
    }
}
