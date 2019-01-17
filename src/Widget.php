<?php

namespace fv\yii\geocomplete;

use yii\helpers\Html;
use yii\helpers\Json;

class Widget extends \yii\widgets\InputWidget
{
    public $options;

    public $container;

    public $geocompleteOptions = [];


    public function init()
    {
        parent::init();

        Html::addCssClass($this->options, ['form-control']);
    }


    public function run()
    {
        Asset::register($this->view);

        if ($this->hasModel()) {
            echo Html::activeInput(
                'text',
                $this->model,
                $this->attribute,
                $this->options
            );
        } else {
            echo Html::input(
                'text',
                $this->name,
                $this->value,
                $this->options
            );
        }

        $selector = '#' . $this->options['id'];

        $container = ($this->container ?:
                      new \yii\web\JsExpression(
                          'jQuery('
                          . Json::encode($selector)
                          . ').parents("form")[0]'
                      ));

        $this->geocompleteOptions['details'] = $container;
        $this->geocompleteOptions['detailsAttribute'] = 'data-geocomplete';

        $this->registerScript($selector);
    }


    protected function registerScript($selector) {
        $js = 'jQuery(' . Json::encode($selector) . ').geocomplete(';
        if ($this->geocompleteOptions) {
            $js .= Json::encode($this->geocompleteOptions);
        }
        $js .= ');';

        $this->view->registerJs($js);
    }
}
