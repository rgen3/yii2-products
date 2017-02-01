<?php

class m170201_000000_product_types_and_delivery extends \yii\db\Migration
{
    public function up()
    {
        $options = null;
        if ($this->db->driverName === 'mysql')
        {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1';
        }

        $this->addColumn('{{%product_item}}', 'type', $this->string(20));

        $this->dropColumn('{{%product_order}}', 'product_id');

        $this->createTable('{{%product_order_item}}', [
            'product_id' => $this->integer(),
            'order_id' => $this->integer(),
            'price' => $this->float(2),
            'discounted_price' => $this->float(2),
            'quantity' => $this->integer(),
            'date_created' => $this->timestamp()->defaultValue(new \yii\db\Expression('CURRENT_TIMESTAMP'))
        ], $options);

        $this->addPrimaryKey('pk-product-order-item', '{{%product_order_item}}', ['product_id', 'order_id']);
        $this->addForeignKey('fk-product-order-item-to-order', '{{%product_order_item}}', 'order_id', '{{%product_order}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-product-order-item-to-product', '{{%product_order_item}}', 'product_id', '{{%product_item}}', 'id', 'RESTRICT', 'RESTRICT');

        $this->createTable('{{%product_order_delivery}}',
            [
                'order_id'      => $this->integer()->notNull()->unique(),
                'delivery_cost' => $this->float(2),
                'total_price'   => $this->float(2),
                'delivery_date' => $this->dateTime(),
                'country_id'    => $this->integer(),
                'region'        => $this->string(),
                'city'          => $this->string(),
                'street'        => $this->string(),
                'house'         => $this->string(),
                'building'      => $this->string(),
                'flat'          => $this->string(),
                'zip'           => $this->string(20),
                'address'       => $this->string(),
                'raw_name'      => $this->string(),
                'firstname'     => $this->string(50),
                'lastname'      => $this->string(50),
                'middlename'    => $this->string(50),
                'phone'         => $this->string(20),
                'email'         => $this->string(),
                'comment'       => $this->text()
            ],
            $options);

        $this->addForeignKey('fk-product-order-delivery-to-order', '{{%product_order_delivery}}', 'order_id', '{{%product_order}}', 'id');

        $this->createTable('{{%product_order_info}}', [
            'order_id'          => $this->integer()->notNull()->unique(),
            'host'              => $this->string(255),
            'cookies'           => $this->string(255),
            'hash'              => $this->string(255),
            'traf'              => $this->integer(),
            'user_device'       => $this->string(255),
            'ip_address'        => 'BIGINT'
        ], $options);

        $this->addForeignKey('fk-product-order-info-to-order', '{{%product_order_info}}', 'order_id', '{{%product_order}}', 'id');

        $this->addColumn('{{%product_order}}', 'is_spam', $this->boolean());
        $this->addColumn('{{%product_order}}', 'currency', $this->string(4));
        $this->addColumn('{{%product_order}}', 'status', $this->integer());
        $this->addColumn('{{%product_order}}', 'lid_price', $this->float(2));
        $this->addColumn('{{%product_order}}', 'click_id', $this->integer());
        $this->addColumn('{{%product_order}}', 'updated_by', $this->integer());
        $this->addColumn('{{%product_order}}', 'updated_at', $this->timestamp());

        $this->createTable('{{%product_order_notification}}',
            [
                'order_id'              => $this->integer(),
                'notified_by'           => $this->integer(),
                'notification_type'     => $this->text(),
                'notification_date'     => $this->dateTime(),
                'notificationi_status'  => $this->integer()
            ], $options);

        $this->addForeignKey('fk-product-order-notification-to-order', '{{%product_order_notification}}', 'order_id', '{{%product_order}}', 'id');

        $this->createTable('{{%product_order_payment}}', [
            'order_id'      => $this->integer(),
            'payment_type'  => $this->integer(),
            'payment_sum'   => $this->float(2),
            'is_paid'       => $this->boolean()->defaultValue(new \yii\db\Expression('FALSE'))
        ], $options);

        $this->addForeignKey('fk-product-order-payment-to-order', '{{%product_order_payment}}', 'order_id', '{{%product_order}}', 'id');
    }


    public function down()
    {
        return false;
    }
}