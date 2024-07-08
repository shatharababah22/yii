<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\PlansCoverage $model */
/** @var yii\widgets\ActiveForm $form */

// Adjust these URLs to match your Yii controller and action names
$urlFetchInsuranceId = Url::to(['/coverage/fetch-insurance']); 
$urlFetchPlans = Url::to(['/coverage/fetch-plans']); 

$script = <<< JS
$(document).ready(function() {
    $('#item-id-dropdown').change(function() {
        var itemId = $(this).val();
        $.ajax({
            url: '{$urlFetchInsuranceId}',
            type: 'GET',
            data: {item_id: itemId},
            success: function(response) {
                var insuranceId = response.insurance_id;
                $.ajax({
                    url: '{$urlFetchPlans}',
                    type: 'GET',
                    data: {insurance_id: insuranceId},
                    success: function(plans) {
                        $('#plan-id-dropdown').empty();
                        $.each(plans, function(id, name) {
                            $('#plan-id-dropdown').append('<option value="' + id + '">' + name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Failed to fetch plans.');
                    }
                });
            },
            error: function() {
                alert('Failed to fetch insurance information.');
            }
        });
    });
});
JS;

$this->registerJs($script);
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
        ['class' => 'form-select', 'id' => 'item-id-dropdown']
    ) ?>
    <?= $form->field($model, 'YorN', ['options' => ['class' => 'col-sm-6']])->dropDownList(
        [
            'Active' => 'Yes',
            'Inactive' => 'No',
        ],
        ['class' => 'form-select']
    ) ?>
</div>

<div class="row mb-2">
    <?= $form->field($model, 'plan_id', ['options' => ['class' => 'col-sm-6']])->dropDownList(
        [], 
        ['class' => 'form-control', 'id' => 'plan-id-dropdown']
    ) ?>

<?= $form->field($model, 'description', ['options' => ['class' => 'col-sm-6']]) ?>

</div>


<div class="form-group d-flex justify-content-end">
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary save-button']) ?>
</div>

<?php ActiveForm::end(); ?>
