<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\cms\CmsPage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Cms Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li data-original-title="<?= Yii::t('common', 'Click').'('.Yii::t('common', 'Index').')'?>" data-toggle="tooltip">
                    <?= Html::a(Yii::t('common', 'Index'), ['index']) ?>
               </li>
               <li class="active">
                   <?= Html::a(Yii::t('common', 'View'), 'javascript:;') ?>
               </li>
            </ul>
           
            <div class="tab-content clearfix">
                <div class="tab-pane active cms-page-view">
            <p>
                <?= Html::a(Yii::t('cms', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('cms', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('cms', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-hover table-striped table-bordered detail-view'],
                'attributes' => [
                    'id',
            'cms_class_id',
            'pic_url:url',
            'content:ntext',
            'order',
            'status',
            'updated_at:datetime',
            'created_at:datetime',
                ],
            ]) ?>
                </div>
            </div>
            
        </div>
    </div>
</div>


