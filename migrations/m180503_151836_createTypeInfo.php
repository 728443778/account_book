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

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180503_151836_createTypeInfo cannot be reverted.\n";

        return false;
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
