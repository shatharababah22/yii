<?php

use common\models\Policy;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var common\models\PolicySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Policies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="policy-index">



  <!-- Page Header -->
  <div class="page-header">
    <div class="row align-items-center mb-3">
      <div class="col-sm mb-2 mb-sm-0">
        <h1 class="page-header-title">Policies <span class="badge bg-soft-dark text-dark ms-2"><?= Yii::$app->formatter->asInteger($dataProvider->totalCount) ?></span></h1>


   
      </div>
      <!-- End Col -->


    </div>
    <!-- End Row -->


  </div>
  <!-- End Page Header -->

  <div class="row justify-content-end mb-3">

  </div>



  <!-- Card -->
  <div class="card">
    <!-- Header -->
    <div class="card-header card-header-content-md-between">
      <div class="mb-2 mb-md-0">

      </div>
      <div class="d-grid d-sm-flex gap-2">
        <button class="btn btn-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEcommerceProductFilter" aria-controls="offcanvasEcommerceProductFilter">
          <i class="bi-filter me-1"></i> Filters
        </button>


      </div>
    </div>
    <!-- End Header -->

    <!-- Table -->
    <div class="table-responsive datatable-custom">

      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="table-column-pe-0">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                <label class="form-check-label"></label>
              </div>
            </th>

            <th><?= Yii::t('app', 'Customer email') ?></th>
            <th><?= Yii::t('app', 'Customer Phone') ?></th>
            <th><?= Yii::t('app', 'From Airport') ?></th>
            <th><?= Yii::t('app', 'Going To') ?></th>
            <th><?= Yii::t('app', 'Departure Date') ?></th>
            <th><?= Yii::t('app', 'Return Date') ?></th>
   
            <th><?= Yii::t('app', 'Price') ?></th>
            <th><?= Yii::t('app', 'Status') ?></th>

          </tr>
        </thead>
        <tbody>
          <?php if ($dataProvider->models) : ?>
            <?php foreach ($dataProvider->models as $policy) : ?>
              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="productsCheck<?= $policy->id ?>">
                    <label class="form-check-label" for="productsCheck<?= $policy->id ?>"></label>
                  </div>
                </td>

                <td><?= Html::encode($policy->customer->email) ?></td>
                <td><?= Html::encode($policy->customer->mobile) ?></td>

                <td><?= Html::encode($policy->from_airport) ?></td>
                <td><?= Html::encode($policy->going_to) ?></td>
                <td><?= Html::encode(Yii::$app->formatter->asDate($policy->departure_date)) ?></td>
              
        
                <td><?= Html::encode(Yii::$app->formatter->asDate($policy->return_date)) ?></td>
      
                <td><?= $policy->price ?></td>
                <td><?= Html::encode($policy->status == 0 ? "Inactive" : "Active") ?></td>
    

              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr class="odd">
              <td valign="top" colspan="17" class="dataTables_empty">
                <div class="text-center p-4">

                  <img class="mb-3" src="<?= Url::to('@web/svg/illustrations/oc-error.svg') ?>" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
                  <p class="mb-0">No data to show</p>
                </div>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <!-- End Table -->

    <div class="card-footer">
      <?php if ($dataProvider->pagination->pageCount > 1) : ?>
        <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
          <div class="col-sm mb-2 mb-sm-0">
            <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
              <span class="me-2">Showing:</span>
              <div class="tom-select-custom">
                <span class="text-secondary me-2"><?= count($dataProvider->getModels()) ?></span>
              </div>
              <span class="text-secondary me-2">of</span>
              <span id="datatableWithPaginationInfoTotalQty"><?= Yii::$app->formatter->asInteger($dataProvider->totalCount) ?></span>
            </div>
          </div>
          <div class="col-sm-auto">
            <div class="d-flex justify-content-center justify-content-sm-end">
              <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'options' => ['class' => 'pagination'],
                'linkContainerOptions' => ['class' => 'page-item'],
                'linkOptions' => ['class' => 'page-link'],
                'prevPageCssClass' => 'page-item',
                'nextPageCssClass' => 'page-item',
                'prevPageLabel' => '&laquo;',
                'nextPageLabel' => '&raquo;',
              ]) ?>
              <nav id="datatablePagination" aria-label="Activity pagination"></nav>
            </div>
          </div>
        </div>

      <?php endif; ?>
    </div>



    <div class="col-sm-auto">
      <div class="d-flex justify-content-center justify-content-sm-end">
        <!-- Pagination -->
        <nav id="datatablePagination" aria-label="Activity pagination"></nav>
      </div>
    </div>
    <!-- End Col -->
  </div>
  <!-- End Row -->
</div>
<!-- End Footer -->
</div>
<!-- End Card -->
</div>
<!-- End Content -->

<!-- Footer -->

<div class="footer">
  <div class="row justify-content-between align-items-center">
    <!-- <div class="col">
          <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022 Htmlstream.</span></p>
        </div> -->
    <!-- End Col -->


  </div>
  <!-- End Row -->




  <!--Filter Modal -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceProductFilter" aria-labelledby="offcanvasEcommerceProductFilterLabel">
    <div class="offcanvas-header">
      <h4 id="offcanvasEcommerceProductFilterLabel" class="mb-0">Filters</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <span class="text-cap small">filter by:</span>
      <div class="mb-2">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>



  </div>