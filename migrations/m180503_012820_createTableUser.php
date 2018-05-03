<?php

use yii\db\Migration;

/**
 * Class m180503_012820_createTableUser
 */
class m180503_012820_createTableUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(\app\tools\Table::TABLE_USER, [
            'id' => $this->primaryKey(32)->unsigned(),
            'username' => $this->string(32)->unique()->notNull(),
            'password' => $this->string(255)->notNull(),
            'status' => $this->tinyInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer(32)->notNull(),
            'updated_at' => $this->integer(32)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(\app\tools\Table::TABLE_USER);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180503_012820_createTableUser cannot be reverted.\n";

        return false;
    }
    */
}
