<?php

namespace fv\yii\geocomplete;

class Asset extends \yii\web\AssetBundle
{
    public $mapsApiKey;

    public $sourcePath = '@bower/jquery-geocomplete';

    public $js = [
        'jquery.geocomplete.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];


    public function init()
    {
        parent::init();

        if (!$this->mapsApiKey) {
            \Yii::warning(
                "No API key defined -- geocoding is unlikely to work",
                __METHOD__
            );
        }

        $this->js[] = '//maps.googleapis.com/maps/api/js?key='
            . urlencode($this->mapsApiKey);
    }
}
