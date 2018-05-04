<?php

use yii\db\Migration;

/**
 * Class m180504_064755_insertDefaultData
 */
class m180504_064755_insertDefaultData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(\app\tools\Table::TABLE_TYPE_INFO, ['name'], [
            ['买彩票'],
            ['吃饭'],
            ['买生活用品'],
            ['买菜'],
            ['买水果'],
            ['买衣服裤子鞋子'],
            ['买健身用品'],
            ['买药'],
            ['看病'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180504_064755_insertDefaultData cannot be reverted.\n";
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180504_064755_insertDefaultData cannot be reverted.\n";

        return false;
    }
    */
}
