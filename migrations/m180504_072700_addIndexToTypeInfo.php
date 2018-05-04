<?php

use yii\db\Migration;

/**
 * Class m180504_072700_addIndexToTypeInfo
 */
class m180504_072700_addIndexToTypeInfo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('unique_type_info_name', \app\tools\Table::TABLE_TYPE_INFO, 'name', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('unique_type_info_name', \app\tools\Table::TABLE_TYPE_INFO);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180504_072700_addIndexToTypeInfo cannot be reverted.\n";

        return false;
    }
    */
}
