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
<<<<<<< HEAD
<?php \dominus77\svg\SvgWidget::widget([
    'elementId' => 'svg_map_russia',
    'clientScript' => new \yii\web\JsExpression("
        var mapDraw = draw.size(1000, 600);
        var data = {$data};
=======

<?php \dominus77\svg\SvgWidget::widget([
    'elementId' => 'svg_map_russia',
    'clientScript' => new \yii\web\JsExpression("
        var data = {$data};
        var mapDraw = draw.size(1000, 550);
>>>>>>> example
        // draw individual data
        for(var i = 0, il = data.length; i < il; i++){
            mapDraw.path(data[i]['d'])
                .fill('none')
                .stroke({color: data[i]['stroke'], width: data[i]['stroke-width']});

        }
    "),
]); ?>
```
<<<<<<< HEAD
=======
Render interactive map
```
<div style="position: absolute" id="info"></div>
<div style="border:1px solid #ccc; width:502px;" id="svg_interactive_map_russia"></div>

<?php \dominus77\svg\SvgWidget::widget([
    'elementId' => 'svg_interactive_map_russia',
    'panZoom' => true, // on svg.panzoom.js plugin
    'clientScript' => new \yii\web\JsExpression("
        var data = {$data};
        var info = document.getElementById('info');

        // color region
        var colorOut = '#fff';
        var colorOver = '#ccc';

        // create draw
        var mapDraw = draw.size(500, 300).viewbox(0, 0, 1000, 550);

        // svg.panzoom.js plugin
        mapDraw.panZoom({zoomMin: 0.5, zoomMax: 20});
        mapDraw.zoom(0.5)
            .animate()
            .zoom(2, {x:50, y:280});

        // draw individual data
        for	(var i = 0, il = data.length; i < il; i++) {
            var region = mapDraw.path(data[i]['d'])
                .id(data[i]['id'])
                .fill(colorOut)
                .style('cursor', 'pointer')
                .stroke({color: data[i]['stroke'], width: data[i]['stroke-width']});

            // add attribute title in path
            var title = data[i]['title'];
            region.attr({title: title});

            region.mouseover(function(e) {
                var elem = document.getElementById(e.target.id);
                var title = elem.getAttribute('title');
                info.innerHTML = e.target.id + ' - ' + title;
                this.fill({color: colorOver});
            });

            region.mouseout(function(e) {
                this.fill({color: colorOut});
                info.innerHTML = '';
            });

            region.click(function(e) {
                var elem = document.getElementById(e.target.id);
                var title = elem.getAttribute('title');
                console.log(e.target.id + ' - ' + title);
            });
        }
    "),
]); ?>
```
>>>>>>> example

More Information
-----
Please, check the [SVG.js](http://svgjs.com)

License
-----
The BSD License (BSD). Please see [License File](https://github.com/Dominus77/yii2-svg-widget/blob/master/LICENSE.md) for more information.
