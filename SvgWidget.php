<?php

namespace dominus77\svg;

use yii\web\JsExpression;
use yii\base\InvalidConfigException;

/**
 * Class SvgWidget
 * @package dominus77\svg
 */
class SvgWidget extends \yii\base\Widget
{
    /** @var  string */
    public $elementId;

    /**
     * Plugin svg.panzoom.js
     * @var bool
     */
    public $panZoom = false;

    /** @var  string */
    public $clientScript;

    public function init()
    {
        parent::init();
        if (empty($this->elementId))
            throw new InvalidConfigException('The "elementId" property must be set.');
    }

    public function run()
    {
        $this->registerAssets();
    }

    public function registerAssets()
    {
        $view = $this->getView();
        SvgAsset::register($view);
        if($this->panZoom) {
            SvgPanZoomAsset::register($view);
        }
        $script = new JsExpression("
            if (SVG.supported) {
                var draw = SVG('{$this->elementId}');
                {$this->clientScript}
            } else {
                var elementId = document.getElementById('{$this->elementId}'),
                msg = 'SVG not supported';
                elementId.innerHTML = msg;
            }
        ");
        $view->registerJs($script);
    }
}
