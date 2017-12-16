<?php

namespace dominus77\svg;

use yii\web\JsExpression;

/**
 * Class SvgWidget
 * @package dominus77\svg
 */
class SvgWidget extends \yii\base\Widget
{
    /** @var  string */
    public $elementId;
    public $clientScript;

    public function run()
    {
        $this->registerAssets();
    }

    public function registerAssets()
    {
        $view = $this->getView();
        SvgAsset::register($view);
        $script = new JsExpression("
            if (SVG.supported) {
                var draw = SVG('{$this->elementId}');
                {$this->clientScript}
            } else {
                alert('SVG not supported');
            }
        ");
        $view->registerJs($script);
    }
}
