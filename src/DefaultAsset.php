<?php

namespace kevocode\spinkit;

use Yii;

/**
 * Bundle por defecto para el widget.
 *
 * @package kevocode
 * @subpackage spinkit
 * @category Bundles
 *
 * @author Kevin Daniel Guzman Delgadillo <kevindanielguzmen98@gmail.com>
 * @version 0.0.1
 * @since 1.0.0
 */
class DefaultAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/spinkit';
    public $baseUrl = '@web';
    public $css = [
        'css/spinkit.css'
    ];
    public $js = [];
    public $dependences = [];
}