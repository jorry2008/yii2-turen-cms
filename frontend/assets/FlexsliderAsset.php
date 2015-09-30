<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FlexsliderAsset extends AssetBundle
{
    public $sourcePath = '@bower/flexslider';
    public $css = [
        'flexslider.css',
    ];
    public $js = [
    	'jquery.flexslider-min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
