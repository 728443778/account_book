<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_book".
 *
 * @property int $id
 * @property int $type 1是支出，2是收入
 * @property double $amount 金额
 * @property string $comment 杂项
 */
class AccountBook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'default', 'value' => null],
            [['type'], 'integer'],
            [['amount'], 'number'],
            [['comment'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'amount' => 'Amount',
            'comment' => 'Comment',
        ];
    }
}
