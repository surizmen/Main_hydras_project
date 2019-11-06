<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%collection}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%product}}`
 */
class m191105_094006_create_collection_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%collection}}', [
            'id' => $this->primaryKey(),
            'product_href' => $this->text()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-collection-user_id}}',
            '{{%collection}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-collection-user_id}}',
            '{{%collection}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-collection-product_id}}',
            '{{%collection}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-collection-product_id}}',
            '{{%collection}}',
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
            '{{%fk-collection-user_id}}',
            '{{%collection}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-collection-user_id}}',
            '{{%collection}}'
        );

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-collection-product_id}}',
            '{{%collection}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-collection-product_id}}',
            '{{%collection}}'
        );

        $this->dropTable('{{%collection}}');
    }
}
