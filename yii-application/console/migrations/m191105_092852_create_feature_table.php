<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feature}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 */
class m191105_092852_create_feature_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feature}}', [
            'id' => $this->primaryKey(),
            'experience' => $this->string(50),
            'budget' => $this->string(50),
            'strength' => $this->string(50),
            'product_id' => $this->integer()->notNull(),
            'persons' => $this->string(50),
            'case' => $this->string(50),
            'tasty' => $this->string(50),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-feature-product_id}}',
            '{{%feature}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-feature-product_id}}',
            '{{%feature}}',
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
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-feature-product_id}}',
            '{{%feature}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-feature-product_id}}',
            '{{%feature}}'
        );

        $this->dropTable('{{%feature}}');
    }
}
