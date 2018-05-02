<?php

use yii\db\Migration;

/**
 * Class m180502_082111_account_book
 */
class m180502_082111_account_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(\app\tools\Table::TABLE_ACCOUNT_BOOK, [
            'id' => $this->primaryKey(32)->unsigned(),
            'type' => $this->smallInteger()->comment('1是支出，2是收入'),
            'amount' => $this->float()->comment('金额'),
            'comment' => $this->string(512)->comment('杂项')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(\app\tools\Table::TABLE_ACCOUNT_BOOK);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180502_082111_account_book cannot be reverted.\n";

        return false;
    }
    */
}
