<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m191105_093709_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey()->notNull(),
            'theme' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'status' => $this->integer(16)->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-question-user_id}}',
            '{{%question}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-question-user_id}}',
            '{{%question}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-question-user_id}}',
            '{{%question}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-question-user_id}}',
            '{{%question}}'
        );

        $this->dropTable('{{%question}}');
    }
}
