<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StationType */

$this->title = 'Thêm mới loại trạm';
$this->params['breadcrumbs'][] = ['label' => 'DS Loại trạm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-type-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
