<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\customer\CustomerAddress */

$this->title = Yii::t('customer', 'Update {modelClass}: ', [
    'modelClass' => 'Customer Address',
]) . ' ' . $model->consignee;
$this->params['breadcrumbs'][] = ['label' => Yii::t('customer', 'Customer Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('customer', 'Update');
?>

<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li data-original-title="<?= Yii::t('common', 'Click').'('.Yii::t('common', 'Index').')'?>" data-toggle="tooltip">
                    <?= Html::a(Yii::t('common', 'Index'), ['index']) ?>
               </li>
               <li data-original-title="<?= Yii::t('common', 'Click').'('.Yii::t('common', 'Create').')'?>" data-toggle="tooltip">
                    <?= Html::a(Yii::t('common', 'Create'), ['create']) ?>
               </li>
               <li class="active">
                   <?= Html::a(Yii::t('common', 'Update'), 'javascript:;') ?>
               </li>
               
            </ul>
           
            <div class="tab-content clearfix">
                <div class="tab-pane active customer-address-update">
                    
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

