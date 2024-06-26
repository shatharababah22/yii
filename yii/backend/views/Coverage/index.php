<?php

use common\models\PlansCoverage;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PlansCoverageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Plans Coverages';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("
    $(document).on('click', '.read-more', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var fullText = $('#description-' + id + ' .full-description').text();
        var words = fullText.split(' ');
        var formattedText = '';
        for (var i = 0; i < words.length; i++) {
            formattedText += words[i] + ' ';
            if ((i + 1) % 10 == 0) {
                formattedText += '<br>';
            }
        }
        $('#description-' + id + ' .full-description').html(formattedText);
        $('#description-' + id + ' .short-description').hide();
        $('#description-' + id + ' .full-description').show();
        $(this).hide();
        $(this).siblings('.read-less').show();
    });

    $(document).on('click', '.read-less', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#description-' + id + ' .short-description').show();
        $('#description-' + id + ' .full-description').hide();
        $(this).hide();
        $(this).siblings('.read-more').show();
    });
");
?>










        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Plans coverage<span class="badge bg-soft-dark text-dark ms-2"><?= Yii::$app->formatter->asInteger($dataProvider->totalCount) ?></span></h1>


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
                    <?= Html::a('Create Plan coverage', Url::to(['create']), ['class' => 'btn btn-primary']) ?>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

           
        </div>
        <!-- End Page Header -->

        <div class="row justify-content-end mb-3">
          
        </div>
        <!-- End Row -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-md-between">
                <div class="mb-2 mb-md-0">
                    <!-- Search Form -->
                    <?php $form = ActiveForm::begin([
            'method' => 'get',
            'action' => Url::to(['index']),
          ]); ?>
          <div class="input-group input-group-merge input-group-flush mb-3">
            <div class="input-group-prepend input-group-text">
              <i class="bi-search"></i>
            </div>
            <?= $form->field($searchModel, 'description', [
              'options' => ['class' => 'form-control custom-search-input'],
              'inputOptions' => [
                'placeholder' => 'Search insurances',
                'aria-label' => 'Search insurances',
                'id' => 'datatableSearch',
                'style' => 'border: initial !important; margin-left: -0.0625rem; background: none !important;',
              ],
            ])->label(false); ?>

          </div>
          <?php ActiveForm::end(); ?>

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
                            <th class="table-column-ps-0">Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dataProvider->models as $benefit) : ?>
                            <tr>
                                <td class="table-column-pe-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="productsCheck<?= $benefit->id ?>">
                                        <label class="form-check-label" for="productsCheck<?= $benefit->id ?>">
                                        </label>
                                    </div>
                                </td>
                                <td class="table-column-ps-0">
                                    <a class="d-flex align-items-center" href="<?= Url::to(['view', 'id' => $benefit->id]) ?>">

                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="text-inherit mb-0"><?= Html::encode($benefit->item->title) ?></h5>
                                        </div>
                                    </a>
                                </td>
                                <td id="description-<?= $benefit->id ?>">
                                    <?php
                                    $fullDescription = Html::encode($benefit->description);
                                    if (strlen($fullDescription) > 100) {
                                        $shortDescription = Html::encode(substr($fullDescription, 0, 80)) . '... ';
                                        echo '<span class="short-description">' . $shortDescription . '</span>';
                                        echo '<span class="full-description" style="display: none;">' . $fullDescription . '</span>';
                                        echo Html::a('Read more', '#', [
                                            'class' => 'read-more',
                                            'data-id' => $benefit->id,
                                            'style' => 'display: inline;'
                                        ]);
                                        echo Html::a('Read less', '#', [
                                            'class' => 'read-less',
                                            'data-id' => $benefit->id,
                                            'style' => 'display: none;'
                                        ]);
                                    } else {
                                        echo '<span class="short-description">' . $fullDescription . '</span>';
                                    }
                                    ?>
                                </td>

                                <td><?= Html::encode($benefit->YorN) ?></td>


                                <td>
                                    <!-- Actions -->
                                    <a class="btn btn-white btn-sm" href="<?= Url::to(['update', 'id' => $benefit->id]) ?>">
                                        <i class="bi-pencil-fill" style="font-size: 15px;"></i> 
                                    </a>
                                    <a class="btn btn-white btn-sm" href="<?= Url::to(['delete', 'id' => $benefit->id]) ?>" data-method="post" data-confirm="Are you sure you want to delete this item?">
                                        <i class="bi bi-trash" style="font-size: 15px; color:red"></i> 
                                    </a>
                                    <a class="btn btn-white btn-sm" href="<?= Url::to(['view', 'id' => $benefit->id]) ?>">
                                        <i class="bi bi-eye-fill" style="font-size: 15px; color: #377DFF;"></i> 
                                    </a>
                                    <!-- End Actions -->
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <!-- End Table -->
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
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
    <!-- End Content -->





<!-- End Welcome Message Modal -->

<!-- Export Products Modal -->
<div class="modal fade" id="exportProductsModal" tabindex="-1" aria-labelledby="exportProductsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="exportProductsModalLabel">Export products</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body">
                <p>This CSV file can update all product information. To update just inventory quantites use the <a class="link" href="#">CSV file for inventory.</a></p>

                <div class="mb-4">
                    <label class="form-label">Export</label>

                    <div class="d-grid gap-2">
                        <!-- Form Check -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exportProductsRadio" id="exportProductsRadio1" checked>
                            <label class="form-check-label" for="exportProductsRadio1">
                                Current page
                            </label>
                        </div>
                        <!-- End Form Check -->

                        <!-- Form Check -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exportProductsRadio" id="exportProductsRadio2">
                            <label class="form-check-label" for="exportProductsRadio2">
                                All products
                            </label>
                        </div>
                        <!-- End Form Check -->

                        <!-- Form Check -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exportProductsRadio" id="exportProductsRadio3">
                            <label class="form-check-label" for="exportProductsRadio3">
                                Selected: 20 products
                            </label>
                        </div>
                        <!-- End Form Check -->
                    </div>
                </div>

                <label class="form-label">Export as</label>

                <!-- Form Check -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exportProductsAsRadio" id="exportProductsAsRadio1" checked>
                    <label class="form-check-label" for="exportProductsAsRadio1">
                        CSV for Excel, Numbers, or other spreadsheet programs
                    </label>
                </div>
                <!-- End Form Check -->

                <!-- Form Check -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exportProductsAsRadio" id="exportProductsAsRadio2">
                    <label class="form-check-label" for="exportProductsAsRadio2">
                        Plain CSV file
                    </label>
                </div>
                <!-- End Form Check -->
            </div>
            <!-- End Body -->

            <!-- Footer -->
            <div class="modal-footer gap-3">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="button" class="btn btn-primary">Export products</button>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</div>
<!-- End Export Products Modal -->

<!-- Import Products Modal -->
<div class="modal fade" id="importProductsModal" tabindex="-1" aria-labelledby="importProductsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="importProductsModalLabel">Import products by CSV</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body">
                <p><a class="link" href="#">Download a sample CSV template</a> to see an example of the format required.</p>

                <!-- Dropzone -->
                <div id="attachFilesNewProjectLabel" class="js-dropzone dz-dropzone dz-dropzone-card mb-4">
                    <div class="dz-message">
                        <img class="avatar avatar-xl avatar-4x3 mb-3" src="./assets/svg/illustrations/oc-browse.svg" alt="Image Description" data-hs-theme-appearance="default">
                        <img class="avatar avatar-xl avatar-4x3 mb-3" src="./assets/svg/illustrations-light/oc-browse.svg" alt="Image Description" data-hs-theme-appearance="dark">

                        <h5>Drag and drop your file here</h5>

                        <p class="mb-2">or</p>

                        <span class="btn btn-white btn-sm">Browse files</span>
                    </div>
                </div>
                <!-- End Dropzone -->

                <!-- Form Check -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="overwriteCurrentProductsCheckbox">
                    <label class="form-check-label" for="overwriteCurrentProductsCheckbox">
                        Overwrite any current products that have the same handle. Existing values will be used for any missing columns. <a href="#">Learn more</a>
                    </label>
                </div>
                <!-- End Form Check -->
            </div>
            <!-- End Body -->

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="button" class="btn btn-primary">Upload and continue</button>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</div>

<!-- End Import Products Modal -->

