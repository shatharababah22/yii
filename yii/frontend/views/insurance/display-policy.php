<?php

/** @var yii\web\View $this */
/** @var \common\models\Policy[] $policies */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Your Policy';
?>
<div class="pattern-square"></div>
<section class="pt-10 pb-10 bg-dark text-center">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 class="mb-3 text-white-stable"><span class="text-warning">Your</span> Policies</h1>
            </div>
        </div>
    </div>
</section>






<section class="mb-xl-9 my-5">
  <!-- Card -->
  <div class="card d-flex justify-content-center m-auto" style="width: 80%;">
    <!-- Header -->
    <!-- <div class="card-header card-header-content-md-between">
      <div class="mb-2 mb-md-0">

      </div>
      <div class="d-grid d-sm-flex gap-2">
        <button class="btn btn-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEcommerceProductFilter" aria-controls="offcanvasEcommerceProductFilter">
          <i class="bi-filter me-1"></i> Filters
        </button>


      </div>
    </div> -->
    <!-- End Header -->

    <!-- Table -->
    <div class="table-responsive datatable-custom">

      <table class="table">
        <thead class="thead-light" >
          <tr >
            <th scope="col" class="table-column-pe-0">
              <div class="form-check">
                <!-- <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                <label class="form-check-label"></label> -->
              </div>
            </th>

            <th class="text-bold"><?= Yii::t('app', 'Your email') ?></th>
            <th><?= Yii::t('app', 'Your Phone') ?></th>
            <th><?= Yii::t('app', 'From Country') ?></th>
            <th><?= Yii::t('app', 'To Country') ?></th>
            <th><?= Yii::t('app', 'Departure Date') ?></th>
            <th><?= Yii::t('app', 'Return Date') ?></th>
   
            <th><?= Yii::t('app', 'Price') ?></th>
            <th><?= Yii::t('app', 'Status') ?></th>
<th><?= Yii::t('app', 'Your Policy') ?></th>
          </tr>
        </thead>
        <tbody>
        <?php if (!empty($policies)): ?>
            <?php foreach ($policies as $policy): ?>
              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                  
                  </div>
                </td>

                <td><?= Html::encode($policy->customer->email) ?></td>
                <td><?= Html::encode($policy->customer->mobile) ?></td>
                <td><?= Html::encode($policy->from_airport) ?></td>
                <td><?= Html::encode($policy->going_to) ?></td>
                <td><?= Html::encode($policy->departure_date) ?></td>
                <td><?= Html::encode($policy->return_date) ?></td>
                <td><?= $policy->price ?> JD</td>
                <td><?= Html::encode($policy->status === 0 ? "Processing" : "Completed") ?></td>
                <td>
                <?php if (!empty($policy->PolicyURLLink)): ?>
    <?= Html::a(
        '<i class="bi bi-file-pdf-fill"></i> Download',
        $policy->PolicyURLLink,
        [
            'target' => '_blank',
            'download' => true,
            'data-pjax' => '0',
        ]
    ); ?>
<?php else: ?>
    <p>No PDF available for download.</p>
<?php endif; ?>

    <!-- <i class="bi bi-file-pdf-fill me-2"></i> -->

</td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr class="odd">
              <td valign="top" colspan="17" class="dataTables_empty">
                <div class="text-center p-4">
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
    <!-- End Table -->





    <!-- <div class="col-sm-auto">
      <div class="d-flex justify-content-center justify-content-sm-end">
        <nav id="datatablePagination" aria-label="Activity pagination"></nav>
      </div>
    </div> -->
    <!-- End Col -->
  </div>
</section>



  