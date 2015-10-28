<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use common\helpers\General;
use common\models\extend\LinkType;
/* @var $this yii\web\View */
/* @var $model common\models\extend\LinkType */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord) {
	$model->status = true;
	$model->order = 10;
}
?>

<div class="row link-type-form">
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
		
	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	    
	    <?= $form->field($model, 'short_code')->hint('<i class="fa fa-info-circle"></i> '.Yii::t('extend', 'Frontend call basis for Developer'))->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 'order')->input('number') ?>
	
		<?= $form->field($model, 'status')->hint('<i class="fa fa-info-circle"></i> '.Yii::t('common', 'Don\'t show in the frontend,If you don\'t choose'))->radioList([1=>Yii::t('common', 'Yes'), 0=>Yii::t('common', 'No')]) ?>
	
	    <div class="form-group">
	        <div class="col-sm-8 col-sm-offset-2">
	        	<?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
        </div>
    
        <?php ActiveForm::end(); ?>
    </div>
</div>
