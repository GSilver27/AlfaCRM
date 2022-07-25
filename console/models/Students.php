<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string|null $addr
 * @property int|null $assigned_id
 * @property string|null $b_date
 * @property int|null $balance
 * @property int|null $balance_base
 * @property int|null $balance_bonus
 * @property string|null $branch_ids
 * @property string|null $color
 * @property int|null $company_id
 * @property string|null $dob
 * @property string|null $e_date
 * @property string|null $email
 * @property int|null $crm_id
 * @property int|null $is_study
 * @property string|null $last_attend_date
 * @property int|null $lead_reject_id
 * @property int|null $lead_source_id
 * @property int|null $lead_status_id
 * @property string|null $legal_name
 * @property int|null $legal_type
 * @property string|null $name
 * @property string|null $next_lesson_date
 * @property string|null $note
 * @property int|null $paid_count
 * @property int|null $paid_lesson_count
 * @property string|null $paid_lesson_date
 * @property string|null $paid_till
 * @property string|null $phone
 * @property int|null $study_status_id
 * @property string|null $teacher_ids
 * @property string|null $web
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['assigned_id', 'balance', 'balance_base', 'balance_bonus', 'company_id', 'crm_id', 'is_study', 'lead_reject_id', 'lead_source_id', 'lead_status_id', 'legal_type', 'paid_count', 'paid_lesson_count', 'study_status_id'], 'integer'],
            [['b_date', 'dob', 'e_date', 'last_attend_date', 'next_lesson_date', 'paid_lesson_date'], 'safe'],
            [['addr', 'email', 'phone'], 'string', 'max' => 1023],
            [['branch_ids', 'color', 'legal_name', 'name', 'note', 'paid_till', 'teacher_ids', 'web'], 'string', 'max' => 255],
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
            'assigned_id' => 'Assigned ID',
            'b_date' => 'B Date',
            'balance' => 'Balance',
            'balance_base' => 'Balance Base',
            'balance_bonus' => 'Balance Bonus',
            'branch_ids' => 'Branch Ids',
            'color' => 'Color',
            'company_id' => 'Company ID',
            'dob' => 'Dob',
            'e_date' => 'E Date',
            'email' => 'Email',
            'crm_id' => 'Crm ID',
            'is_study' => 'Is Study',
            'last_attend_date' => 'Last Attend Date',
            'lead_reject_id' => 'Lead Reject ID',
            'lead_source_id' => 'Lead Source ID',
            'lead_status_id' => 'Lead Status ID',
            'legal_name' => 'Legal Name',
            'legal_type' => 'Legal Type',
            'name' => 'Name',
            'next_lesson_date' => 'Next Lesson Date',
            'note' => 'Note',
            'paid_count' => 'Paid Count',
            'paid_lesson_count' => 'Paid Lesson Count',
            'paid_lesson_date' => 'Paid Lesson Date',
            'paid_till' => 'Paid Till',
            'phone' => 'Phone',
            'study_status_id' => 'Study Status ID',
            'teacher_ids' => 'Teacher Ids',
            'web' => 'Web',
        ];
    }
}
