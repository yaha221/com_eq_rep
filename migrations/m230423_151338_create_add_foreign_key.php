<?php

use yii\db\Migration;

/**
 * Class m230423_151338_create_add_foreign_key
 */
class m230423_151338_create_add_foreign_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {   
        // bid->list-bid-payments
        $this->addForeignKey(
            'fk-bid-to-payments',
            'list_bid_payments',
            'bid_id',
            'bid',
            'bid_id',
            'CASCADE'
        );

        // payment->list-bid-payments
        $this->addForeignKey(
            'fk-payments-to-bid',
            'list_bid_payments',
            'payment_id',
            'payment',
            'payment_id',
            'CASCADE'
        );

        // work_on_request->list-work_on_request-spares
        $this->addForeignKey(
            'fk-work_on_request-to-spares',
            'list_work_on_request_spares',
            'work_on_request_id',
            'work_on_request',
            'work_on_request_id',
            'CASCADE'
        );

        // spare->list-work_on_request-spares
        $this->addForeignKey(
            'fk-spares-to-work_on_request',
            'list_work_on_request_spares',
            'spare_id',
            'spares',
            'spare_id',
            'CASCADE'
        );

        // bid->list-bid-masters
        $this->addForeignKey(
            'fk-bid-to-master',
            'list_bid_masters',
            'bid_id',
            'bid',
            'bid_id',
            'CASCADE'
        );

        // master->list-bid-masters
        $this->addForeignKey(
            'fk-master-to-bid',
            'list_bid_masters',
            'master_id',
            'masters',
            'master_id',
            'CASCADE'
        );

        // work_on_request->list_bid_work_on_request
        $this->addForeignKey(
            'fk-work_on_request-to-bid',
            'list_bid_work_on_request',
            'work_on_request_id',
            'work_on_request',
            'work_on_request_id',
            'CASCADE'
        );
        
        // bid->list_bid_work_on_request
        $this->addForeignKey(
            'fk-bid-to-work_on_request',
            'list_bid_work_on_request',
            'bid_id',
            'bid',
            'bid_id',
            'CASCADE'
        );
        
        // work_on_request->price_list
        $this->addForeignKey(
            'fk-price_list-work_on_request',
            'work_on_request',
            'price_list_id',
            'price_list',
            'price_list_id',
            'CASCADE'
        );

        // client->bids
        $this->addForeignKey(
            'fk-client-bids',
            'bid',
            'client_id',
            'client',
            'client_id',
            'CASCADE'
        );

        // equipment->bids
        $this->addForeignKey(
            'fk-equipment-bids',
            'bid',
            'equipment_id',
            'equipment',
            'equipment_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //list_bid_payments
        $this->dropForeignKey('fk-bid-to-payments', 'list_bid_payments');
        $this->dropForeignKey('fk-payments-to-bid', 'list_bid_payments');

        //list_work_on_request_spares
        $this->dropForeignKey('fk-work_on_request-to-spares', 'list_work_on_request_spares');
        $this->dropForeignKey('fk-spares-to-work_on_request', 'list_work_on_request_spares');

        //list_bid-masters
        $this->dropForeignKey('fk-bid-to-master', 'list_bid_masters');
        $this->dropForeignKey('fk-master-to-bid', 'list_bid_masters');

        //list_bid_work_on_request
        $this->dropForeignKey('fk-work_on_request-to-bid', 'list_bid_work_on_request');
        $this->dropForeignKey('fk-bid-to-work_on_request', 'list_bid_work_on_request');

        // client->bids
        $this->dropForeignKey('fk-client-bids', 'bid');

        // equipment->bids
        $this->dropForeignKey('fk-equipment-bids', 'bid');

        // work_on_request->price_list
        $this->dropForeignKey('fk-price_list-work_on_request', 'price_list');

        // supplier->spares
        $this->dropForeignKey('fk-supplier-spares', 'spares');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230421_110619_add_foreign_key cannot be reverted.\n";

        return false;
    }
    */
}
