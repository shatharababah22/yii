<?php

use common\models\InsuranceCountries;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use yii\widgets\LinkPager;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\InsuranceCountriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-countries-index">

    <!-- Page Header -->
    <div class="page-header">
      <div class="row align-items-center mb-3">
        <div class="col-sm mb-2 mb-sm-0">
          <h1 class="page-header-title"><?= Html::encode($this->title) ?> <span class="badge bg-soft-dark text-dark ms-2"><?= Yii::$app->formatter->asInteger($dataProvider->totalCount) ?></span></h1>


          <div class="mt-2">
            <a class="text-body me-3" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exportProductsModal">
              <i class="bi-download me-1"></i> Export
            </a>
            <a class="text-body" href="javascript:;" data-bs-toggle="modal" data-bs-target="#importProductsModal">
              <i class="bi-upload me-1"></i> Import
            </a>
          </div>
        </div>
      

        <div class="col-sm-auto">
         
          <?= Html::a('Create company', ['create'], ['class' => 'btn btn-primary']) ?>
        </div>
        
      </div>
  


    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


 <div class="card">

 <div class="card-header card-header-content-md-between">
        <div class="mb-2 mb-md-0">
          <!-- Search Form -->
         

        </div>

        <div class="d-grid d-sm-flex gap-2">
          <button class="btn btn-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEcommerceProductFilter" aria-controls="offcanvasEcommerceProductFilter">
            <i class="bi-filter me-1"></i> Filters
          </button>


        </div>
      </div>
      <!-- End Header -->

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
                        <label class="form-check-label"></label>
                    </div>
                </th>
    
                <th>Company Name</th>
                <th>Insurance Name</th>
                <th>Country Code</th>
                <th>Source country </th>
                <th>Source country code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
                <?php if ($dataProvider->models) : ?>

            <?php foreach ($dataProvider->models as $model) : ?>
                <tr>



                <td class="table-column-pe-0">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="productsCheck<?= $model->id ?>">
                <label class="form-check-label" for="productsCheck<?= $model->id ?>"></label>
              </div>
            </td>
            <td class="table-column-ps-0">
              <a class="d-flex align-items-center" href="<?= Url::to(['view', 'id' => $model->id]) ?>">
                <div class="flex-shrink-0">
                  <img class="avatar avatar-lg" src="<?= Yii::$app->request->baseUrl ?>/images/<?= $model->company_logo ?>" alt="Image Description">
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5 class="text-inherit mb-0"><?= Html::encode($model->company_name) ?></h5>
                </div>
              </a>
            </td>
                 
                    <td><?= Html::encode($model->insurance->name) ?></td>
                    <td><?= Html::encode($model->country_code) ?></td>
                    <td><?= Html::encode($model->source_country) ?></td>
                    <td><?= Html::encode($model->source_country_code) ?></td>
                    <td>
                        <a class="btn btn-white btn-sm" href="<?= Url::to(['update', 'id' => $model->id]) ?>">
                            <i class="bi-pencil-fill" style="font-size: 15px;"></i>
                        </a>
                        <a class="btn btn-white btn-sm" href="<?= Url::to(['delete', 'id' => $model->id]) ?>" data-method="post" data-confirm="Are you sure you want to delete this item?">
                            <i class="bi bi-trash" style="font-size: 15px; color:red"></i>
                        </a>
                        <a class="btn btn-white btn-sm" href="<?= Url::to(['view', 'id' => $model->id]) ?>">
                            <i class="bi bi-eye-fill" style="font-size: 15px; color: #377DFF;"></i>
                        </a>
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


 
<?php if ($dataProvider->pagination->pageCount > 1): ?>
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
      <!-- End Footer -->

</div></div>








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

