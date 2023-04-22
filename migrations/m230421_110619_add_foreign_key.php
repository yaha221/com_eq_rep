<?php

use yii\db\Migration;

/**
 * Class m230421_110619_add_foreign_key
 */
class m230421_110619_add_foreign_key extends Migration
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

        // work_on_request->list-work_on_request-employees
        $this->addForeignKey(
            'fk-work_on_request-to-employee',
            'list_work_on_request_employees',
            'work_on_request_id',
            'work_on_request',
            'work_on_request_id',
            'CASCADE'
        );

        // employee->list-work_on_request-employees
        $this->addForeignKey(
            'fk-employee-to-work_on_request',
            'list_work_on_request_employees',
            'employee_id',
            'employees',
            'employee_id',
            'CASCADE'
        );

        // bid->list_work_on_request_price_list
        $this->addForeignKey(
            'fk-work_on_request-to-price_list',
            'list_work_on_request_price_list',
            'work_on_request_id',
            'work_on_request',
            'work_on_request_id',
            'CASCADE'
        );

        // bid->list_work_on_request_price_list
        $this->addForeignKey(
            'fk-price_list-to-work_on_request',
            'list_work_on_request_price_list',
            'price_list_id',
            'price_list',
            'price_list_id',
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

        // profession->employees
        $this->addForeignKey(
            'fk-profession-employees',
            'employees',
            'profession_id',
            'profession',
            'profession_id',
            'CASCADE'
        );

        // supplier->spares
        $this->addForeignKey(
            'fk-supplier-spares',
            'spares',
            'supplier_id',
            'supplier',
            'supplier_id',
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

        //list_work_on_request-employees
        $this->dropForeignKey('fk-work_on_request-to-employee', 'list_work_on_request_employees');
        $this->dropForeignKey('fk-employee-to-work_on_request', 'list_work_on_request_employees');

        //list_work_on_request_price_list
        $this->dropForeignKey('fk-work_on_request-to-price_list', 'list_work_on_request_price_list');
        $this->dropForeignKey('fk-price_list-to-work_on_request', 'list_work_on_request_price_list');

        //list_bid_work_on_request
        $this->dropForeignKey('fk-work_on_request-to-bid', 'list_bid_work_on_request');
        $this->dropForeignKey('fk-bid-to-work_on_request', 'list_bid_work_on_request');

        // client->bids
        $this->dropForeignKey('fk-client-bids', 'bid');

        // equipment->bids
        $this->dropForeignKey('fk-equipment-bids', 'bid');

        // profession->employees
        $this->dropForeignKey('fk-profession-employees', 'employees');

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
