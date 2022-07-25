<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "lessons".
 *
 * @property int $id
 * @property int|null $branch_id
 * @property string|null $customer_ids
 * @property string|null $date
 * @property string|null $details
 * @property string|null $group_ids
 * @property int|null $crm_id
 * @property int|null $lesson_type_id
 * @property string|null $note
 * @property int|null $room_id
 * @property int|null $status
 * @property string|null $streaming
 * @property int|null $subject_id
 * @property string|null $teacher_ids
 * @property string|null $time_from
 * @property string|null $time_to
 * @property string|null $topic
 */
class Lessons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lessons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_id', 'crm_id', 'lesson_type_id', 'room_id', 'status', 'subject_id'], 'integer'],
            [['date', 'time_from', 'time_to'], 'safe'],
            [['details'], 'string'],
            [['customer_ids', 'group_ids', 'teacher_ids', 'topic'], 'string', 'max' => 255],
            [['note', 'streaming'], 'string', 'max' => 1023],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'branch_id' => 'Branch ID',
            'customer_ids' => 'Customer Ids',
            'date' => 'Date',
            'details' => 'Details',
            'group_ids' => 'Group Ids',
            'crm_id' => 'Crm ID',
            'lesson_type_id' => 'Lesson Type ID',
            'note' => 'Note',
            'room_id' => 'Room ID',
            'status' => 'Status',
            'streaming' => 'Streaming',
            'subject_id' => 'Subject ID',
            'teacher_ids' => 'Teacher Ids',
            'time_from' => 'Time From',
            'time_to' => 'Time To',
            'topic' => 'Topic',
        ];
    }
}
