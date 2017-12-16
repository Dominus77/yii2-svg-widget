<?php

namespace dominus77\svg;

use yii\web\AssetBundle;

/**
 * Class SvgAsset
 * @package dominus77\svg
 */
class SvgAsset extends AssetBundle
{
    public $sourcePath = '@bower/svg.js/dist';
    public $js;

    public function init()
    {
        parent::init();
        $min = YII_ENV_DEV ? '' : '.min';
        $this->js = ['svg' . $min . '.js'];
    }
}