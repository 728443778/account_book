<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <div id="statistics">
        <span style="margin-right: 5px">本月累计支出:</span><span style="margin-right: 30px" id="statistics_month_pay"></span>
        <span style="margin-right: 5px">本月累计收入:</span><span style="margin-right: 30px" id="statistics_month_revenue"></span>
        <span style="margin-right: 5px">累计支出:</span><span style="margin-right: 30px" id="statistics_pay"></span>
        <span style="margin-right: 5px">累计收入:</span><span style="margin-right: 30px" id="statistics_revenue"></span>
    </div>
    </p>

    <p>
        <?= Html::a('Create Account Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'type',
                'value' => 'typeName'
            ],
            [
                'attribute' => 'type_info_id',
                'value' => 'typeInfoName'
            ],
            'amount',
            'comment',
            'created_at:datetime',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<script>
    xmlhttpPay = new XMLHttpRequest();
    xmlHttpRevenue = new XMLHttpRequest();
    xmlHttpCurrentMonthPay = new XMLHttpRequest();
    xmlHttpCurrentMonthRevenue = new XMLHttpRequest();
    xmlhttpPay.open("GET", "<?=\yii\helpers\Url::to('/account-book/statistics-pay')?>", true)
    xmlHttpRevenue.open("GET", "<?=\yii\helpers\Url::to('/account-book/statistics-revenue')?>", true)
    xmlHttpCurrentMonthPay.open("GET", "<?=\yii\helpers\Url::to('/account-book/statistics-current-month-pay')?>", true)
    xmlHttpCurrentMonthRevenue.open("GET", "<?=\yii\helpers\Url::to('/account-book/statistics-current-month-revenue')?>", true);
    xmlhttpPay.send()
    xmlHttpCurrentMonthRevenue.send()
    xmlHttpCurrentMonthPay.send()
    xmlHttpRevenue.send()
    xmlhttpPay.onreadystatechange = function () {
        if (xmlhttpPay.readyState == 4 && xmlhttpPay.status == 200) {
            data = eval("(" + xmlhttpPay.responseText + ")")
            document.getElementById("statistics_pay").innerText = data.amount;
        }
    }
    xmlHttpRevenue.onreadystatechange = function () {
        if (xmlHttpRevenue.readyState == 4 && xmlHttpRevenue.status == 200) {
            data = eval("(" + xmlHttpRevenue.responseText + ")")
            document.getElementById("statistics_revenue").innerText = data.amount;
        }
    }
    xmlHttpCurrentMonthPay.onreadystatechange = function () {
        if (xmlHttpCurrentMonthPay.readyState == 4 && xmlHttpCurrentMonthPay.status == 200) {
            data = eval("(" + xmlHttpCurrentMonthPay.responseText + ")")
            document.getElementById("statistics_month_pay").innerText = data.amount;
        }
    }
    xmlHttpCurrentMonthRevenue.onreadystatechange = function () {
        if (xmlHttpCurrentMonthRevenue.readyState == 4 && xmlHttpCurrentMonthRevenue.status == 200) {
            data = eval("(" + xmlHttpCurrentMonthRevenue.responseText + ")")
            document.getElementById("statistics_month_revenue").innerText = data.amount;
        }
    }
</script>
