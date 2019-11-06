<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%product}}`
 */
class m191105_094057_create_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history}}', [
            'id' => $this->primaryKey(),
            'product_href' => $this->text()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-history-user_id}}',
            '{{%history}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-history-user_id}}',
            '{{%history}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-history-product_id}}',
            '{{%history}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-history-product_id}}',
            '{{%history}}',
            'product_id',
            '{{%product}}',
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
            '{{%fk-history-user_id}}',
            '{{%history}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-history-user_id}}',
            '{{%history}}'
        );

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-history-product_id}}',
            '{{%history}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-history-product_id}}',
            '{{%history}}'
        );

        $this->dropTable('{{%history}}');
    }
}
