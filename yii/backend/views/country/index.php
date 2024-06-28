<?php

use common\models\Countries;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var common\models\CountriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>













<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-center mb-3">
    <div class="col-sm mb-2 mb-sm-0">
      <h1 class="page-header-title">Countries <span class="badge bg-soft-dark text-dark ms-2"><?= Yii::$app->formatter->asInteger($dataProvider->totalCount) ?></span></h1>


      <div class="mt-2">
        <a class="text-body me-3" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exportProductsModal">
          <i class="bi-download me-1"></i> Export
        </a>
        <a class="text-body" href="javascript:;" data-bs-toggle="modal" data-bs-target="#importProductsModal">
          <i class="bi-upload me-1"></i> Import
        </a>
      </div>
    </div>
    <!-- End Col -->

    <div class="col-sm-auto">
      <!-- <a class="btn btn-primary" href="./ecommerce-add-product.html">Add product</a> -->
      <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-primary']) ?>
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
    <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 4, 9],
                      "width": "5%",
                      "orderable": false
                    }],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 12,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
      <thead class="thead-light">
        <tr>
          <th scope="col" class="table-column-pe-0">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
              <label class="form-check-label">
              </label>
            </div>
          </th>
          <th class="table-column-ps-0">Country</th>
          <th>Code</th>
          <th>callCode</th>
          <th>Zone</th>
          <th>Currency</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
      <?php if ($dataProvider->models) : ?>
        <?php foreach ($dataProvider->models as $country) : ?>
          <tr>
            <td class="table-column-pe-0">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="productsCheck<?= $country->id ?>">
                <label class="form-check-label" for="productsCheck<?= $country->id ?>">
                </label>
              </div>
            </td>
            <td class="table-column-ps-0">
              <a class="d-flex align-items-center" href="<?= Url::to(['view', 'id' => $country->id]) ?>">

                <div class="flex-grow-1 ms-3">
                  <h5 class="text-inherit mb-0"><?= Html::encode($country->country) ?></h5>
                </div>
              </a>
            </td>
            <td><?= Html::encode($country->code) ?></td>
            <td><?= Html::encode($country->callCode) ?></td>
            <td><?= Html::encode($country->currency) ?></td>
            <td><?= Html::encode($country->zone) ?></td>
            <td><?= Html::encode($country->active == 0 ? "Inactive" : "Active") ?></td>


            <td>
              <!-- Actions -->
              <a class="btn btn-white btn-sm" href="<?= Url::to(['update', 'id' => $country->id]) ?>">
                <i class="bi-pencil-fill" style="font-size: 15px;"></i>
              </a>
              <a class="btn btn-white btn-sm" href="<?= Url::to(['delete', 'id' => $country->id]) ?>" data-method="post" data-confirm="Are you sure you want to delete this item?">
                <i class="bi bi-trash" style="font-size: 15px; color:red"></i>
              </a>
              <a class="btn btn-white btn-sm" href="<?= Url::to(['view', 'id' => $country->id]) ?>">
                <i class="bi bi-eye-fill" style="font-size: 15px; color: #377DFF;"></i>
              </a>
              <!-- End Actions -->
            </td>
          </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr class="odd"><td valign="top" colspan="8" class="dataTables_empty"><div class="text-center p-4">
              
            <img class="mb-3" src="<?= Url::to('@web/svg/illustrations/oc-error.svg') ?>" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
            <p class="mb-0">No data to show</p>
            </div></td></tr>
    <?php endif; ?>
      </tbody>
    </table>
  </div>
  <!-- End Table -->

  <?php if ($dataProvider->pagination->pageCount > 1) : ?>
    <div class="card-footer">
      <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
        <div class="col-sm mb-2 mb-sm-0">
          <div class="d-flex justify-content-center justify-content-sm-start align-items-center ">
            <span class="me-2">Showing:</span>


            <div class="tom-select-custom">
              <span class="text-secondary me-2"> <?= count($dataProvider->getModels()) ?></span>
            </div>


            <span class="text-secondary me-2">of</span>

            <span id="datatableWithPaginationInfoTotalQty"><?= Yii::$app->formatter->asInteger($dataProvider->totalCount) ?></span>
          </div>
        </div>


        <div class="col-sm-auto">
            <div class="d-flex justify-content-center justify-content-sm-end">
              <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'options' => [
                  'class' => 'pagination', 
                ],
                'linkContainerOptions' => ['class' => 'page-item'], // Individual page container class
                'linkOptions' => ['class' => 'page-link'], // Link class
                'prevPageCssClass' => 'page-item', // Class for the previous page button
                'nextPageCssClass' => 'page-item', // Class for the next page button
                'prevPageLabel' => '&laquo;', // Custom label for the previous page button
                'nextPageLabel' => '&raquo;', // Custom label for the next page button
              ]) ?> <nav id="datatablePagination" aria-label="Activity pagination"></nav>
            </div>
          </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
  <?php endif; ?>

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


