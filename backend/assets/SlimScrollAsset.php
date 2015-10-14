<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Jorry <980522557@qq.com>
 * @since 2.0
 */
 
class SlimScrollAsset extends AssetBundle
{
    public $sourcePath = '@bower/AdminLTE/plugins/slimScroll';
    public $js = [
        'jquery.slimscroll.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}


