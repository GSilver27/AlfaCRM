<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m220722_084422_add_balls_stage_columns_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'balls', $this->integer()->defaultValue(0));
        $this->addColumn('user', 'stage_status', $this->string()->defaultValue('Новичок в IT'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'balls');
        $this->dropColumn('user', 'stage_status');
    }
}
