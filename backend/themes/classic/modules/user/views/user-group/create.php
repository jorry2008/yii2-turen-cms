<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\user\UserGroup */

$this->title = Yii::t('user-group', 'Create User Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user-group', 'User Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
               <li data-original-title="<?= Yii::t('common', 'Click').'('.Yii::t('common', 'Create').')'?>" data-toggle="tooltip">
                    <?= Html::a(Yii::t('common', 'Index'), ['index']) ?>
               </li>
               
               <li class="active">
                   <?= Html::a(Yii::t('common', 'Create'), 'javascript:;') ?>
               </li>
            </ul>
           
            <div class="tab-content clearfix">
                <div class="tab-pane active user-group-create">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
            

