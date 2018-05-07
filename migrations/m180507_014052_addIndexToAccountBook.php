<?php

use yii\db\Migration;

/**
 * Class m180507_014052_addIndexToAccountBook
 */
class m180507_014052_addIndexToAccountBook extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('index_type', \app\tools\Table::TABLE_ACCOUNT_BOOK, 'type', false);
        $this->createIndex('index_type_info', \app\tools\Table::TABLE_ACCOUNT_BOOK, 'type_info_id', false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index_type', \app\tools\Table::TABLE_ACCOUNT_BOOK);
        $this->dropIndex('index_type_info', \app\tools\Table::TABLE_ACCOUNT_BOOK);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180507_014052_addIndexToAccountBook cannot be reverted.\n";

        return false;
    }
    */
}
