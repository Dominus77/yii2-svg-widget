Yii2 SVG Widget
===============

The lightweight library for manipulating and animating SVG for Yii2.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dominus77/yii2-svg-widget "*"
```

or add

```
"dominus77/yii2-svg-widget": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by:

```
<div id="drawing"></div>
<?php \dominus77\svg\SvgWidget::widget([
    'elementId' => 'drawing',
    'clientScript' => new \yii\web\JsExpression("
        draw.rect(100, 100).move(100, 50).fill('#f06');
    "),
]); ?>
```
Example:
-----
Render map
```
<?php
// This get demo data
$fileName = 'russia'; // russia or world
$file = Yii::getAlias('@dominus77/svg/example') . "/" . $fileName . ".json";
$data = file_get_contents($file);
?>

<div id="svg_map_russia"></div>
<?php \dominus77\svg\SvgWidget::widget([
    'elementId' => 'svg_map_russia',
    'clientScript' => new \yii\web\JsExpression("
        var mapDraw = draw.size(1000, 600);
        var data = {$data};
        // draw individual data
        for	(var i = 0, il = data.length; i < il; i++) {
            mapDraw.path(data[i]['d'])
                .fill('none')
                .stroke({ color: data[i]['stroke'], width: data[i]['stroke-width'] });

        }
    "),
]); ?>
```

More Information
-----
Please, check the [SVG.js](http://svgjs.com)

License
-----
The BSD License (BSD). Please see [License File](https://github.com/Dominus77/yii2-svg-widget/blob/master/LICENSE.md) for more information.
