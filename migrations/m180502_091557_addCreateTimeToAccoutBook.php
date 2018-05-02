<?php

use yii\db\Migration;

/**
 * Class m180502_091557_addCreateTimeToAccoutBook
 */
class m180502_091557_addCreateTimeToAccoutBook extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\app\tools\Table::TABLE_ACCOUNT_BOOK, 'created_at', $this->integer(32)->unsigned());
        $this->addColumn(\app\tools\Table::TABLE_ACCOUNT_BOOK, 'updated_at', $this->integer(32)->unsigned());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(\app\tools\Table::TABLE_ACCOUNT_BOOK, 'created_at');
        $this->dropColumn(\app\tools\Table::TABLE_ACCOUNT_BOOK, 'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180502_091557_addCreateTimeToAccoutBook cannot be reverted.\n";

        return false;
    }
    */
}
