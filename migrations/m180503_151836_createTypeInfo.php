<?php

use yii\db\Migration;

/**
 * Class m180503_151836_createTypeInfo
 */
class m180503_151836_createTypeInfo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(\app\tools\Table::TABLE_TYPE_INFO, [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(\app\tools\Table::TABLE_TYPE_INFO);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180503_151836_createTypeInfo cannot be reverted.\n";

        return false;
    }
    */
}
