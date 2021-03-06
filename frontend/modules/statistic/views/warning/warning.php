<?php
$selectedToday = (isset($_GET['get_by']) && $_GET['get_by'] == 'today') ? 'selected="selected"' : '';
$selectedWeek = (isset($_GET['get_by']) && $_GET['get_by'] == 'week') ? 'selected="selected"' : '';
$selectedMonth = (isset($_GET['get_by']) && $_GET['get_by'] == 'month') ? 'selected="selected"' : '';
?>
<div style="margin-bottom: 10px;">
    <form id="select-by" action="<?= Yii::$app->homeUrl . 'statistic/warning' ?>">
        <select name="get_by" style="padding: 5px 20px; cursor: pointer; background-color: #E2EDE3;">
            <option <?=$selectedToday?> value="today">Hôm nay</option>
            <option <?=$selectedWeek?> value="week">Tuần này</option>
            <option <?=$selectedMonth?> value="month">Tháng này</option>
        </select>
    </form>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="panel-title">
            <i class="glyphicon glyphicon-book"></i>Thống kê cảnh báo
        </h4>
    </div>
</div>
<table class="detail-view table table-hover table-bordered th-center">
    <tr>
        <th width="30%" rowspan="2">Vùng</th>
        <th class="td-alarm" width="" colspan="4" class="td-alarm">Cảnh báo</th>
    </tr>
    <tr>
        <th class="td-alarm">Số lượng</th>
        <th class="td-alarm"></th>
        <th class="td-alarm">Bắt đầu</th>
        <th class="td-alarm">Kết thúc</th>
    </tr>
    <?php

    if (isset($areas) && !empty($areas)) {
        foreach ($areas as $area) {
            $getBy = isset($_GET['get_by']) ? $_GET['get_by'] : 'today';
            $detailUrl = Yii::$app->homeUrl . 'warning/default/index?area_id='. $area['id'] .'&get_by='. $getBy;
            $begin = ($data[$area['id']]['start'] > 0) ? date('d/m/Y h:i A', $data[$area['id']]['start']) : '';
            $end = ($data[$area['id']]['end'] > 0) ? date('d/m/Y h:i A', $data[$area['id']]['end']) : '';
            $number = $data[$area['id']]['number'];
            ?>
            <tr>
                <td>
                    <div class="kv-attribute"><?=$area['name']?></div>
                </td>
                <td>
                    <div class="kv-attribute"><?=$number?></div>
                </td>
                <td>
                    <div class="kv-attribute">
                        <a href="<?=$detailUrl?>" target="_blank" class="btn btn-primary btn-xs">Chi tiết</a>
                    </div>
                </td>
                <td>
                    <div class="kv-attribute"><?=$begin?></div>
                </td>
                <td>
                    <div class="kv-attribute"><?=$end?></div>
                </td>
            </tr>
        <?php
        }
    }
    ?>

</table>
<script type="text/javascript">
    jQuery(function ($) {
        $('#select-by select').change(function() {
            $(this).parent().submit();
        });
    });
</script>

