<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Insurances $model */

$this->title = 'Create Insurances';
$this->params['breadcrumbs'][] = ['label' => 'Insurances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurances-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
