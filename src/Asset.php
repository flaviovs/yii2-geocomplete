<?php

namespace fv\yii\geocomplete;

class Asset extends \yii\web\AssetBundle
{
    public $mapsApiKey;

    public $sessionToken;

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

        $url = '//maps.googleapis.com/maps/api/js?libraries=places&key='
            . urlencode($this->mapsApiKey);

        if ($this->sessionToken === null) {
            $url .= '&sessiontoken='
                . urlencode(uniqid(base_convert(mt_rand(), 10, 36), true));
        }

        $this->js[] = $url;

    }
}
