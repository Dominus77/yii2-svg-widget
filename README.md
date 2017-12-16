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
More Information
-----
Please, check the [SVG.js](http://svgjs.com)

License
-----
The BSD License (BSD). Please see [License File](https://github.com/Dominus77/yii2-svg-widget/blob/master/LICENSE.md) for more information.
