<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%token}}`.
 */
class m220629_114523_create_token_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%token}}', [
            'id' => $this->primaryKey(),
            'token_old' => $this->string(1023),
            'token_new' => $this->text(),
            'refresh_token' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%token}}');
    }
}
