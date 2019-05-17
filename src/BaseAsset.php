<?php

namespace kevocode\spinkit;

use Yii;

/**
 * Bundle base para el widget.
 *
 * @package kevocode
 * @subpackage spinkit
 * @category Bundles
 *
 * @author Kevin Daniel Guzman Delgadillo <kevindanielguzmen98@gmail.com>
 * @version 0.0.1
 * @since 1.0.0
 */
class BaseAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/kevocode/yii2-spinkit/src/assets';
    public $baseUrl = '@web';
    public $css = [
        'main.css',
    ];
    public $js = [
        'main.js'
    ];
    public $dependences = [];
}