<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap5\ActiveForm;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var common\models\PlansCoverage $model */
/** @var yii\widgets\ActiveForm $form */
?>








<?php $form = ActiveForm::begin(); ?>


<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 0.75rem;"></button>
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<div class="row mb-2">

    <?= $form->field($model, 'item_id', ['options' => ['class' => 'col-sm-6']])->dropDownList(
        \yii\helpers\ArrayHelper::map(
            \common\models\PlansItems::find()->all(),
            'id',
            'title'
        ),
        ['class' => 'form-select']
    ) ?>
    <?= $form->field($model, 'YorN', ['options' => ['class' => 'col-sm-6']])->dropDownList(
        [
            'Active' => 'Yes',
            'Inactive' => 'No',
        ],
        ['class' => 'form-select']
    ) ?>
</div>


<label class="form-label">Description <span class="form-label-secondary">(Optional)</span></label>

<?= $form->field($model, 'description')->textarea([
    'class' => 'form-control',
    'rows' => '7',
])->label(false) ?>




<div class="form-group d-flex justify-content-end ">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary save-button']) ?>
   
    </div>
<?php ActiveForm::end(); ?>