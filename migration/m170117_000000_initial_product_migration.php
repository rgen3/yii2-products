<?php

class m170117_000000_initial_product_migration extends \yii\db\Migration
{
    public function up()
    {
        $options = null;
        if ($this->db->driverName === 'mysql'){

            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1';
        }

        $this->createTable('{{%product_item}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->char(255),
            'date_created' => $this->timestamp()->defaultValue(new \yii\db\Expression('CURRENT_TIMESTAMP'))
        ], $options);



        $this->createTable('{{%product_item_translation}}', [
            'product_id' => $this->integer(),
            'language_code' => $this->char(10)->defaultValue('default'),
            'title' => $this->text(),
            'description' => $this->text(),
            'image' => $this->char(255),
            'price' => $this->float(2)
        ], $options);

        $this->addPrimaryKey('pk-product_order', '{{%product_item_translation}}', ['product_id', 'language_code']);
        $this->addForeignKey('fk-product_item_translation_product_id', '{{%product_item_translation}}', 'product_id', '{{%product_item}}', 'id', 'CASCADE', 'CASCADE');

        $this->createTable('{{%product_order}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'user_id' => $this->integer()->defaultValue(null),
            'product_title' => $this->text(),
            'product_price' => $this->float(2),
            'email' => $this->char(255),
            'phone' => $this->char(255)
        ], $options);

        $this->addForeignKey('fk-product_order_to_item', '{{%product_order}}', 'product_id', '{{%product_item}}', 'id', 'SET NULL', 'SET NULL');
        $this->addForeignKey('fk-product_order_user_id', '{{%product_order}}', 'user_id', '{{%user}}', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        $this->dropForeignKey('fk-product_order_user_id', '{{%product_order}}');
        $this->dropForeignKey('fk-product_order_to_item', '{{%product_order}}');
        $this->dropTable('{{%product_order}}');
        $this->dropForeignKey('{{%fk-product_item_translation_product_id}}', '{{%product_item_translation}}');
        $this->dropTable('{{%product_item_translation}}');
        $this->dropTable('{{%product_item}}');
    }

}