<?php

namespace kevocode\spinkit;

use Yii;
use yii\helpers\Html;
use app\helpers\ArrayHelper;

/**
 * Widget para la implementación de spinners.
 *
 * @package kevocode
 * @subpackage spinkit
 * @category Widgets
 *
 * @author Kevin Daniel Guzman Delgadillo <kevindanielguzmen98@gmail.com>
 * @version 0.0.1
 * @since 1.0.0
 */
class Spinkit extends \yii\base\Widget
{
    /**
     * Asset para la carga de los estilos para los spinners
     * 
     * @var string
     */
    public $spinnerAsset = DefaultAsset::class;

    /**
     * Tipo de spinner que se desea utilizar
     * 
     * @var string
     */
    public $type = 'rotating-plane';

    /**
     * Determina si se quiere administrar Ajax con un spinner
     * 
     * @var boolean
     */
    public $ajax = true;

    /**
     * Array llave valor de los spinners que se pueden utilizar
     * 
     * @var array
     */
    public $spinners = [
        'rotating-plane' => 'sk-rotating-plane',
        'double-bounce' => 'sk-double-bounce',
        'wave' => 'sk-wave',
        'wandering-cubes' => 'sk-wandering-cubes',
        'spinner-pulse' => 'sk-spinner-pulse',
        'chasing-dots' => 'sk-chasing-dots',
        'three-bounce' => 'sk-three-bounce',
        'circle' => 'sk-circle',
        'cube-grid' => 'sk-cube-grid',
        'fading-circle' => 'sk-fading-circle',
        'folding-cube' => 'sk-folding-cube'
    ];

    /**
     * Opciones HTML para el spinner
     * 
     * @var array
     */
    public $spinnerOptions = [];

    /**
     * Método de ejecución del widget
     * 
     * @return mixed
     */
    public function run()
    {
        $this->spinnerAsset::register($this->view);
        BaseAsset::register($this->view);
        return $this->render('main', [
            'spinner' => Html::tag('div', $this->makeSpinner(), [
                'class' => 'spinner-container'
            ]),
            'ajax' => $this->ajax
        ]);
    }

    /**
     * Obtiene la clase del spinner según el tipo
     * 
     * @return
     */
    public function makeSpinner()
    {
        switch($this->type) {
            case 'double-bounce':
                $content = '<div class="sk-child sk-double-bounce1"></div>
                <div class="sk-child sk-double-bounce2"></div>';
                break;
            case 'wave':
                $content = '<div class="sk-rect sk-rect1"></div>
                <div class="sk-rect sk-rect2"></div>
                <div class="sk-rect sk-rect3"></div>
                <div class="sk-rect sk-rect4"></div>
                <div class="sk-rect sk-rect5"></div>';
                break;
            case 'wandering-cubes':
                $content = '<div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>';
                break;
            case 'chasing-dots':
                $content = '<div class="sk-child sk-dot1"></div>
                <div class="sk-child sk-dot2"></div>';
                break;
            case 'three-bounce':
                $content = '<div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>';
                break;
            case 'circle':
                $content = '<div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>';
                break;
            case 'cube-grid':
                $content = '<div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>
                <div class="sk-cube sk-cube3"></div>
                <div class="sk-cube sk-cube4"></div>
                <div class="sk-cube sk-cube5"></div>
                <div class="sk-cube sk-cube6"></div>
                <div class="sk-cube sk-cube7"></div>
                <div class="sk-cube sk-cube8"></div>
                <div class="sk-cube sk-cube9"></div>';
                break;
            case 'fading-circle':
                $content = '<div class="sk-circle1 sk-circle"></div>
                <div class="sk-circle2 sk-circle"></div>
                <div class="sk-circle3 sk-circle"></div>
                <div class="sk-circle4 sk-circle"></div>
                <div class="sk-circle5 sk-circle"></div>
                <div class="sk-circle6 sk-circle"></div>
                <div class="sk-circle7 sk-circle"></div>
                <div class="sk-circle8 sk-circle"></div>
                <div class="sk-circle9 sk-circle"></div>
                <div class="sk-circle10 sk-circle"></div>
                <div class="sk-circle11 sk-circle"></div>
                <div class="sk-circle12 sk-circle"></div>';
                break;
            case 'folding-cube':
                $content = '<div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>';
                break;
            default:
                $content = '';
                break;
        }
        return Html::tag('div', $content, ArrayHelper::merge($this->spinnerOptions, [
            'class' => ['spinner-item', $this->spinners[$this->type]]
        ]));
    }
}