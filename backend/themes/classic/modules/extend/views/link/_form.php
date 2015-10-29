<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use common\models\extend\LinkType;
use kartik\file\FileInput;
use common\helpers\General;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\extend\Link */
/* @var $form yii\widgets\ActiveForm */
if($model->isNewRecord) {
	$model->status = true;
	$model->order = 10;
}
?>

<div class="row link-form">
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
    
        <?= $form->field($model, 'link_type_id')->dropDownList(ArrayHelper::map(LinkType::find()->alive()->all(), 'id', 'name')) ?>

	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	    
	    <?= $form->field($model, 'link_url')->hint('<i class="fa fa-info-circle"></i> '.Yii::t('extend', 'Example:http://www.turen.pw'))->textInput(['maxlength' => true]) ?>
	    
	    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
	    
	    <?= $form->field($model, 'pic_url')->hint('<i class="fa fa-info-circle"></i> '.Yii::t('fileinput', 'Note: Limit upload one picture.'))->widget(FileInput::classname(), [
		    'options'=>[
	    		'accept' => 'image/*',//只接收图片类型
	    		'multiple' => false,//这里不需要多选
	    	],
	    	'pluginOptions' => [
	    		'uploadUrl' => Url::to(['/extend/link/file-upload']),
	    		'uploadAsync' => true,//异步上传
	    		'initialPreview' => General::showImages($model->pic_url),
	    		'initialPreviewConfig' => General::showLinks($model->pic_url, 'pic_url', 'link', '/extend/link/file-upload'),
	    		'previewFileType' => 'any',//预览所有类型文件
	    		//'initialCaption'=>"原有的图片",
	    		'overwriteInitial'=>true,//直接覆盖原有的图片
	    		'maxFileSize' => Yii::$app->params['config']['config_pic_size'],//限制大小
	    		'allowedFileExtensions' => explode(',', Yii::$app->params['config']['config_pic_extension']),//限制后缀名
	    		'allowedFileTypes' => ['image'],//限制文件类型（图片）
	    		'maxFileCount' => 1,//此处限制一张
	    		'uploadExtraData' => [
	    			'dir' => 'link',//目录标识，广告
	    			'name' => 'Link[pic_url]',//指定资源获取标识名
	    			'route' => '/extend/link/file-upload',
	    			'field' => 'pic_url',
	    		],
	    	],
		]) ?>
	    
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
