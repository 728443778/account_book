<?php

namespace app\models;

use app\tools\Table;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "account_book".
 *
 * @property int $id
 * @property int $type 1是支出，2是收入
 * @property double $amount 金额
 * @property string $comment 杂项
 * @property int $type_info_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class AccountBook extends \yii\db\ActiveRecord
{

    const TYPE_SHOURU = 1;

    const TYPE_ZHICHU = 2;

    public static $types = [
        1 => '支出',
        2 => '收入'
    ];

    public static $typeInfos = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return Table::TABLE_ACCOUNT_BOOK;
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'amount', 'comment', 'type_info_id'], 'required'],
            [['type'], 'in', 'range' => [self::TYPE_SHOURU, self::TYPE_ZHICHU]],
            [['amount'], 'number'],
            [['comment'], 'string', 'max' => 512],
            ['type_info_id', 'exist', 'targetClass' => TypeInfo::class, 'targetAttribute' => ['type_info_id' => 'id']],
        ];
    }

    public function getTypeName()
    {
        return self::$types[$this->type];
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At'
        ];
    }

    public static function getTypeInfos()
    {
        if (static::$typeInfos) {
            return static::$typeInfos;
        }
        static::$typeInfos = [];
        $results = TypeInfo::find()->where('1=1')->all();
        foreach ($results as $result) {
            static::$typeInfos[$result->id] = $result->name;
        }
        return static::$typeInfos;
    }

    public function getTypeInfoName()
    {
        $typeInfos = static::getTypeInfos();
        if (isset($typeInfos[$this->type_info_id])) {
            return $typeInfos[$this->type_info_id];
        }
        return '';
    }
}
