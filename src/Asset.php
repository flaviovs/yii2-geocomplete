<?php

namespace fv\yii\geocomplete;

class Asset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/jquery-geocomplete';

    public $js = [
        'jquery.geocomplete.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
