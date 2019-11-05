<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 * - `{{%user}}`
 */
class m191105_093355_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'rating' => $this->integer(),
            'description' => $this->text(),
            'tasty' => $this->string(50),
            'product_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-review-product_id}}',
            '{{%review}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-review-product_id}}',
            '{{%review}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-review-author_id}}',
            '{{%review}}',
            'author_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-review-author_id}}',
            '{{%review}}',
            'author_id',
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
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-review-product_id}}',
            '{{%review}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-review-product_id}}',
            '{{%review}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-review-author_id}}',
            '{{%review}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-review-author_id}}',
            '{{%review}}'
        );

        $this->dropTable('{{%review}}');
    }
}
