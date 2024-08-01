<?php

/** @var yii\web\View $this */
/** @var \frontend\models\InquiryForm $model */

use common\models\Plans;
use common\models\PlansCoverage;
use common\models\Pricing;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Plan Details';

// $this->registerJs("
//   $(document).ready(function() {
//             $('.clickable-row').on('click', function() {
//                 var index = $(this).data('index');
//                 $('.details-row-' + index).toggle();
//                  var icon = $(this).find('i');

//             icon.toggleClass('bi-caret-down-fill bi-caret-up-fill');
//             });

//         });

// ");
?>


<!--Hero start-->
<section class="bg-primary-dark pt-10 right-slant-shape" data-cue="fadeIn">
    <div class="container">
        <div class="row align-items-center"><?php if (!empty($options)): ?>
            <div class="col-lg-5 col-12">
                <div class="text-center text-lg-start mb-7 mb-lg-0" data-cues="slideInDown">
                    <div class="mb-4">
                        <h3 class="text-white-50"></h3>
                        <h1 class="mb-5 display-5 text-white-stable">
                            <span class="text-warning">New</span>
                               <?= $insuranceTitle ?>
         
                        </h1>
                        <p class="mb-0 text-white">
                            <span class="text-white-50">From</span> <?= $fromCountryName ?> <span class="text-white-50">To</span> <?= $toCountryName ?>
                            <a href="javascript:void(0);" onclick="history.back();" class="btn btn-link text-white-50 px-0 me-3"><i class="bi bi-pencil-square"></i></a>
                            <br />
                            <span class="text-white-50">Departure Date:</span> <?= $model->date ?> (<?= $model->duration ?> days)<br />
                            <span class="text-white-50">Passengers:</span>
                            <?php if (isset($model->adult)) : ?>
                                <?= $model->adult ?> Adult
                            <?php endif; ?>

                            <?php if (isset($model->children)) : ?>
                                <span class="text-muted">|</span>
                                <?php if ($model->children < 1) : ?>
                                    <?= $model->children ?> Child
                                <?php else : ?>
                                    <?= $model->children ?> Children
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if (isset($model->infants)) : ?>
                                <span class="text-muted">|</span>
                                <?= $model->infants ?> Infant
                            <?php endif; ?>
                        </p>

                    </div>
                    <?php if (isset($insuranceCountry->id)) : ?>
                        <div data-cues="slideInDown">
                            <img src="<?= Yii::$app->request->baseUrl ?>/dashboard/images/<?= $insuranceCountry->company_logo ?>"  class="img-thumbnail" alt="logo" height="160" width="140">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="offset-lg-1 col-lg-5 col-12">
                <div class="position-relative z-1 pt-lg-9" data-cue="slideInRight">
                    <div class="position-relative">
                    <?php $form = ActiveForm::begin(['options' => ['class' => 'row needs-validation g-3']]) ?>
<div class="offer-box shadow-lg elevate p4 multiple-options">
    <div class="accordion"> 
        <div class="head">
            <h4>Choose a plan</h4>
            <p>Select a plan that suits you and your options</p>
        </div>
        <div class="options">
           
                <?= $form->field($model, 'plan')->radioList($options, [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        $return = '<div class="purchasing-option"><div class="border-content">';
                        $return .= '<label class="radio">';
                        $return .= '<span class="radio-input">';
                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . ($checked ? "checked" : "") . '>';
                        $return .= '<span class="radio-control"></span>';
                        $return .= '</span>';
                        $return .= '<span class="radio-label"><h5 id="buyNowHeading">' . ucwords($label['name']) .
                            ' <small class="subscript" style="font-size: 11px;"><a href="#benefits"><x2>Check Benefits</x2></a></small>' . '</h5>';

                        if ($label['discount_price'] && $label['status']) {
                            $return .= '<div class="price has_subscript">';
                            $return .= '<h5><span style="font-size:15px;">$' . $label['discount_price'] . '</span><br><strike style="font-size:13px">$' . $label['price'] . '</strike></h5>';
                            $return .= '<div class="subscript">per person</div>';
                            $return .= '</div>';
                        } else {
                            $return .= '<div class="price has_subscript">';
                            $return .= '<h5>$' . $label['price'] . '</h5>';
                            $return .= '<div class="subscript">per person</div>';
                            $return .= '</div>';
                        }

                        $return .= '</span></label></div></div>';
                        return $return;
                    },
                ])->label(false); ?>
                <div class="next-button">
                    <?= Html::submitButton('Next', ['class' => 'btn w-100 btn-warning ', 'name' => 'login-button']) ?>
                </div>
  
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>

                    </div>
                </div>
            </div>
        </div>    <?php else: ?>
            <section class="py-5 mt-4">
    <div class="container">
      
        <!-- <div class="row">
            <div class="col-lg-6 mx-auto">
                <header class="text-center pb-5">
                    <h1 class="h2">Bootstrap custom quote</h1>
                    <p>Build a nicely styled quote in Bootstrap 4.<br>Bootstrap snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-warning">Bootstrapious</a></p>
                </header>
            </div>
        </div> -->


        <div class="row">
            <div class="col-lg-6 mx-auto">

                <!-- CUSTOM BLOCKQUOTE -->
                <blockquote class=" bg-white p-5 shadow rounded text-center">Your trip from
    <!-- Optional: Custom icon can be added here -->
    <!-- <div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa fa-quote-left text-white"></i></div> -->
    <p class="mb-0 mt-2 text-center">
        <span class="text-warning"><?= $fromCountryName ?> to <?= $toCountryName ?></span><br />
        Departure Date: <span class="text-warning"><?= $model->date ?> (<?= $model->duration ?> days)</span><br />
        Passengers:
        <?php if (isset($model->adult)) : ?>
            <span class="text-warning"><?= $model->adult ?> Adult</span>
        <?php endif; ?>

        <?php if (isset($model->children)) : ?>
            <?php if ($model->children < 1) : ?>
                <span class="text-warning">| <?= $model->children ?> Child</span>
            <?php else : ?>
                <span class="text-warning">| <?= $model->children ?> Children</span>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($model->infants)) : ?>
            <span class="text-warning">| <?= $model->infants ?> Infant</span>
        <?php endif; ?><br> is not valid
    </p>
    <footer class="blockquote-footer pt-4 mt-4 border-top">
        <a href="javascript:void(0);" onclick="history.back();" class="btn btn-link text-warning px-0 me-3">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
        <cite title="Source Title">Try again</cite>
    </footer>
</blockquote>


            </div>
        </div>
    </div>
</section>            <?php endif; ?>
    </div>
</section>
<!--Hero start-->
<!--Compare plan start-->
<section class="my-xl-9 py-5" id="benefits">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="text-center mb-7">
                    <h2>Schedule of Benefits</h2>
                    <p class="mb-0">Travel with peace of mind with Tune Protect Travel Assurance. Available across the region, enjoy comprehensive benefits.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Striped rows -->
                <div class="table-responsive">
                    <table class="table table-striped text-nowrap table-lg table-borderless">
                        <thead>  <?php if (!empty($options)): ?>
                            <tr>
                                <th scope="col">
                                    <div class="fs-5 text-dark fw-semibold">Plans</div>
                                </th>    
                                <?php foreach (\common\models\Plans::find()->where(['insurance_id' => $model->type])->joinWith('pricings')->andWhere(['pricing.duration' => $model->duration])->andWhere([
                                    'or',
                                    ['pricing.passenger' => $adultPassenger],
                                    ['pricing.passenger' => $childrenPassenger],
                                    [
                                        'and',
                                        ['pricing.passenger' => $adultPassenger],
                                        ['pricing.passenger' => $childrenPassenger]
                                    ]
                                ])->all() as $plan) : ?>
                                    <th scope="col">
                                        <div class="fs-5 text-dark fw-semibold">
                                            <?= $plan->name ?>
                                        </div>
                                    </th>
                                <?php endforeach; ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (\common\models\PlansItems::find()->where(['insurance_id' => $model->type])->all() as $planitem) : ?>
                                <tr class="clickable-row">
                                    <td>
                                        <?= $planitem->title ?>
                                    </td>
                                    <?php foreach (\common\models\Plans::find()->where(['insurance_id' => $model->type])->joinWith('pricings')->andWhere(['pricing.duration' => $model->duration])->andWhere([
                                        'or',
                                        ['pricing.passenger' => $adultPassenger],
                                        ['pricing.passenger' => $childrenPassenger],
                                        [
                                            'and',
                                            ['pricing.passenger' => $adultPassenger],
                                            ['pricing.passenger' => $childrenPassenger]
                                        ]
                                    ])->all() as $plan) : ?> <td>
                                            <?php
                                            $planCoverage = \common\models\PlansCoverage::find()->where(['item_id' => $planitem->id, 'plan_id' => $plan->id])->one();
                                            if ($planCoverage) :
                                            ?>
                                                <?php if ($planCoverage->YorN == 'Active') : ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                        </svg>
                                                        <?php
$description = $planCoverage->description;
$maxLength =28; 

if (strlen($description) > $maxLength) {
    $splitPoint = strpos($description, ' ', $maxLength);
    if ($splitPoint === false) {
        $splitPoint = $maxLength;
    }
    $firstLine = substr($description, 0, $splitPoint);
    $secondLine = substr($description, $splitPoint);
} else {
    $firstLine = $description;
    $secondLine = '';
}
?>
<span class="ms-2">
    <?= htmlspecialchars($firstLine) ?><br>
  <span class="ms-4"><?= htmlspecialchars($secondLine) ?></span>  
</span>



                                                <?php else : ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-x-circle-fill text-danger" viewBox="0 0 16 16">
                                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                                        </svg>
                                                    </span>
                                                    <span class="ms-2">N/A</span>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-x-circle-fill text-danger" viewBox="0 0 16 16">
                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                                    </svg>
                                                </span>
                                                <span class="ms-2">N/A</span>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>        <?php else: ?>
                                <tr >
              <td  colspan="14" class="dataTables_empty">
                <div class="text-center ">
                <img class="mb-3" src="https://static.vecteezy.com/system/resources/previews/009/007/126/non_2x/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">

                  <!-- <img class="mb-3" src="https://as2.ftcdn.net/v2/jpg/02/34/31/27/1000_F_234312709_1CXqUZHqg62VE5VhsVEyQUmj69zZHwk9.jpg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default"> -->
                  <p class="mb-0">No data to show</p>
                </div>
              </td>
            </tr>
            <?php endif; ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>
<!--Compare plan end-->