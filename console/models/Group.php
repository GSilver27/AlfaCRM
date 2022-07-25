<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string|null $b_date
 * @property string|null $branch_ids
 * @property int|null $company_id
 * @property string|null $e_date
 * @property int|null $crm_id
 * @property int|null $level_id
 * @property int|null $limit
 * @property string|null $name
 * @property string|null $note
 * @property int|null $status_id
 * @property int|null $streaming_id
 * @property string|null $teacher_ids
 * @property string|null $teachers
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['b_date', 'e_date'], 'safe'],
            [['company_id', 'crm_id', 'level_id', 'limit', 'status_id', 'streaming_id'], 'integer'],
            [['teachers'], 'string'],
            [['branch_ids', 'name'], 'string', 'max' => 255],
            [['note', 'teacher_ids'], 'string', 'max' => 1023],
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
            'branch_ids' => 'Branch Ids',
            'company_id' => 'Company ID',
            'e_date' => 'E Date',
            'crm_id' => 'Crm ID',
            'level_id' => 'Level ID',
            'limit' => 'Limit',
            'name' => 'Name',
            'note' => 'Note',
            'status_id' => 'Status ID',
            'streaming_id' => 'Streaming ID',
            'teacher_ids' => 'Teacher Ids',
            'teachers' => 'Teachers',
        ];
    }
}
