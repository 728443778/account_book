<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_info".
 *
 * @property int $id
 * @property string $name
 *
 * @property AccountBook[] $accountBooks
 */
class TypeInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            ['name', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBooks()
    {
        return $this->hasMany(AccountBook::className(), ['type_info_id' => 'id']);
    }
}
