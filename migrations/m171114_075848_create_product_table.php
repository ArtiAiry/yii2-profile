<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m171114_075848_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'name' => $this->string(),
            'content' => $this->text(),
            'price' => $this->integer()->notNull(),
            'active' => $this->smallInteger(1)->notNull()->defaultValue(0),
        ]);

        $this->createIndex(
            'idx-product-category_id',
            '{{%product}}',
            'category_id'
        );

        $this->createIndex(
            'idx-product-active',
            '{{%product}}',
            'active'
        );

        $this->addForeignKey(
            'fk-product-category',
            '{{%product}}',
            'category_id',
            '{{%category}}',
            'id',
            'SET NULL',
            'RESTRICT'

        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
