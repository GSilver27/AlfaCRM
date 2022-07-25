<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property int $id
 * @property string|null $addr
 * @property string|null $branch_ids
 * @property string|null $dob
 * @property string|null $email
 * @property int|null $gender
 * @property int|null $crm_id
 * @property string|null $name
 * @property string|null $note
 * @property string|null $phone
 * @property int|null $streaming_id
 * @property string|null $web
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dob'], 'safe'],
            [['gender', 'crm_id', 'streaming_id'], 'integer'],
            [['addr', 'email', 'note'], 'string', 'max' => 1023],
            [['branch_ids', 'name', 'phone', 'web'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'addr' => 'Addr',
            'branch_ids' => 'Branch Ids',
            'dob' => 'Dob',
            'email' => 'Email',
            'gender' => 'Gender',
            'crm_id' => 'Crm ID',
            'name' => 'Name',
            'note' => 'Note',
            'phone' => 'Phone',
            'streaming_id' => 'Streaming ID',
            'web' => 'Web',
        ];
    }
}
