<?php
if (!user_can_access('module.shop.orders.index')) {
    return;
}
$currency = get_currency_code();

$filter = [];
$filters['from'] = date('Y-m-d', strtotime('-30 days'));
$filters['to'] = date('Y-m-d', strtotime('today'));
$filters['currency'] = $currency;

$ordersAmount = app()->order_repository->getOrdersTotalSumForPeriod($filters);


$amountToDisplay = 0;

if ($ordersAmount) {

    $amountToDisplay = intval($ordersAmount);

}
?>
<div class="card mb-4 dashboard-admin-cards">
    <div class="card-body px-xxl-4 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="dashboard-icons-wrapper wrapper-icon-sales">
                <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 96 960 960" width="40"><path d="M448.667 860.667h60v-51.334q57.333-7.666 92-38 34.666-30.333 34.666-83.999 0-48.001-27.333-81.001-27.334-32.999-97.333-61Q452 522.667 427 505q-25-17.667-25-47.667Q402 428 423.167 411q21.166-17 58.833-17 30.667 0 51.333 14.5Q554 423 566.667 449.333l53.333-24q-15-35-43.5-57t-65.833-25.666V292h-60v50.667Q400 351 371 382.333t-29 75q0 48.334 29.167 77.334 29.166 29 88.833 52.666 65.667 26.334 90.5 47.334 24.834 21 24.834 52.667 0 32.333-25.5 50.5Q524.333 756 486.667 756q-37 0-65.834-21.5Q392 713 380 674l-56 20q18.667 46.667 48.833 74.167 30.167 27.5 75.834 39.166v53.334ZM480 976q-82.333 0-155.333-31.5t-127.334-85.833Q143 804.333 111.5 731.333T80 576q0-83 31.5-156t85.833-127q54.334-54 127.334-85.5T480 176q83 0 156 31.5T763 293q54 54 85.5 127T880 576q0 82.333-31.5 155.333T763 858.667Q709 913 636 944.5T480 976Zm0-66.666q139.333 0 236.334-97.334 97-97.333 97-236 0-139.333-97-236.334-97.001-97-236.334-97-138.667 0-236 97Q146.666 436.667 146.666 576q0 138.667 97.334 236 97.333 97.334 236 97.334ZM480 576Z"/></svg>
            </div>


            <div class="row">
                <p> <?php _e("Sales") ?></p>
                <h5 class="dashboard-numbers">
                   <?php print currency_format($amountToDisplay, $currency); ?>
                </h5>
            </div>
        </div>


        <div>
            <a href="<?php echo route('admin.order.index'); ?>" class="btn btn-link text-dark"><?php _e('View'); ?></a>
        </div>

    </div>
</div>

