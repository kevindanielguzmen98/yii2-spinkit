<?php
use yii\web\View;

$jsLoad = <<<JS
    let spinnerHtml = `$spinner`;
    function spinnerStart() {
        if (document.getElementsByClassName('spinner-container').length == 0) {
            document.body.innerHTML = spinnerHtml + document.body.innerHTML;
        }
        document.getElementsByClassName('spinner-container')[0].style.display = 'flex';
    }

    function spinnerStop() {
        document.getElementsByClassName('spinner-container')[0].style.display = 'none';
    }

    window.onload = function () {
        setTimeout(function() {
            spinnerStop();
        }, 500);
    }
    spinnerStart();
JS;
$this->registerJs($jsLoad, View::POS_BEGIN);

if ($ajax) {
    $jsAjax = <<<JS
    $(document).ajaxStart(function(){
        spinnerStart();
    }).ajaxStop(function(){
        spinnerStop();
    });
JS;
    $this->registerJs($jsAjax, View::POS_END);
}
?>
