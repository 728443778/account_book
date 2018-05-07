<?php

namespace app\services;

use app\models\AccountBook;
use sevenUtils\traits\SingleInstance;
use yii\db\Query;

class AccountBookStatistics
{
    use SingleInstance;

    /**
     * 统计支出信息
     */
    public function statisticsPay(int $createdAtStart = 0, int $createdAtEnd = 0, int $typeInfoId = 0)
    {
        $query = new Query();
        $query->from(AccountBook::tableName())->where(['type' => AccountBook::TYPE_ZHICHU]);
        if ($createdAtStart > 0) {
            $query->andWhere(['>', 'created_at', $createdAtStart]);
        }
        if ($createdAtEnd > 0) {
            $query->andWhere(['<=', 'created_at', $createdAtEnd]);
        }
        if ($typeInfoId > 0) {
            $query->andWhere(['type_info_id' => $typeInfoId]);
        }
        return $query->sum('amount');
    }

    /**
     * 统计收入信息
     */
    public function statisticsRevenue(int $createdAtStart = 0, int $createdAtEnd = 0, int $typeInfoId = 0)
    {
        $query = new Query();
        $query->from(AccountBook::tableName())->where(['type' => AccountBook::TYPE_SHOURU]);
        if ($createdAtStart > 0) {
            $query->andWhere(['>', 'created_at', $createdAtStart]);
        }
        if ($createdAtEnd > 0) {
            $query->andWhere(['<=', 'created_at', $createdAtEnd]);
        }
        if ($typeInfoId > 0) {
            $query->andWhere(['type_info_id' => $typeInfoId]);
        }
        return $query->sum('amount');
    }
}
