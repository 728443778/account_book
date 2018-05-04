<?php

use yii\db\Migration;

/**
 * Class m180504_064235_addForeigienKeyForAccountBook
 */
class m180504_064235_addForeigienKeyForAccountBook extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('ref_type_info_id', \app\tools\Table::TABLE_ACCOUNT_BOOK, 'type_info_id',
            \app\tools\Table::TABLE_TYPE_INFO, 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('ref_type_info_id', \app\tools\Table::TABLE_ACCOUNT_BOOK);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180504_064235_addForeigienKeyForAccountBook cannot be reverted.\n";

        return false;
    }
    */
}
