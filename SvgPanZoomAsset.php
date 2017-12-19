<?php

namespace dominus77\svg;

use yii\web\AssetBundle;

/**
 * Class SvgPanZoomAsset
 * @package dominus77\svg
 */
class SvgPanZoomAsset extends AssetBundle
{
    public $sourcePath = '@bower/svg.panzoom.js/dist';
    public $js;

    public function init()
    {
        parent::init();
        $min = YII_ENV_DEV ? '' : '.min';
        $this->js = ['svg.panzoom' . $min . '.js'];
    }
}