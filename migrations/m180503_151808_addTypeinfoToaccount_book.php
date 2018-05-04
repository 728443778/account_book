<?php

use yii\db\Migration;

/**
 * Class m180503_151808_addTypeinfoToaccount_book
 */
class m180503_151808_addTypeinfoToaccount_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\app\tools\Table::TABLE_ACCOUNT_BOOK, 'type_info_id', $this->integer()->unsigned());;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(\app\tools\Table::TABLE_ACCOUNT_BOOK, 'type_info_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180503_151808_addTypeinfoToaccount_book cannot be reverted.\n";

        return false;
    }
    */
}
