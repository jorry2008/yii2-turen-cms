<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use common\components\helpers\General;
use common\models\extend\Nav;

/* @var $this yii\web\View */
/* @var $model common\models\extend\Nav */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord) {
	$model->status = true;
	$model->order = 10;
}

$parentIds = ArrayHelper::merge(['0'=>Yii::t('extend', 'Top Nav')], ArrayHelper::map(General::recursiveObj(Nav::find()->orderBy(['order'=>SORT_ASC])->all()), 'id', 'name'));
?>

<div class="row nav-form">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin([
			'layout' => 'horizontal',
			'fieldConfig' => [
				'template' => "{label} {beginWrapper} {input} {hint} {error} {endWrapper}",
				'horizontalCssClasses' => [
					'label' => 'col-sm-2',
					'offset' => 'col-sm-offset-2',
					'wrapper' => 'col-sm-8',
					'error' => '',//col-sm-8 col-sm-offset-2
					'hint' => '',//col-sm-8 col-sm-offset-2
				],
			],
		]);
		?>
    	
        <?= $form->field($model, 'parent_id')->dropDownList($parentIds) ?>

	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 'link_url')->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 're_link_url')->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 'pic_url')->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 'order')->input('number', ['maxlength' => true]) ?>
		
		<?= $form->field($model, 'status')->hint('<i class="fa fa-info-circle"></i> '.Yii::t('common', 'Don\'t show in the frontend,If you don\'t choose'))->radioList([1=>Yii::t('common', 'Yes'), 0=>Yii::t('common', 'No')]) ?>
		
	    <div class="form-group">
	        <div class="col-sm-8 col-sm-offset-2">
	        	<?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
        </div>
    
        <?php ActiveForm::end(); ?>
    </div>
</div>
