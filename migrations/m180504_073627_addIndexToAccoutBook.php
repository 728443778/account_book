<?php

use yii\db\Migration;

/**
 * Class m180504_073627_addIndexToAccoutBook
 */
class m180504_073627_addIndexToAccoutBook extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('index_created_at', \app\tools\Table::TABLE_ACCOUNT_BOOK, 'created_at', false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index_created_at', \app\tools\Table::TABLE_ACCOUNT_BOOK);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180504_073627_addIndexToAccoutBook cannot be reverted.\n";

        return false;
    }
    */
}
