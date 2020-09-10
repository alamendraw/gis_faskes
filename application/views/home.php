<style>
    #chart-container{
        height: 485px;
    width: 650px;
}
</style>
<div class="row">
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between pb-0">
                <h4 class="card-title">Kondisi Faskes</h4>
               
            </div>
            <div class="card-content">
                <div class="card-body py-0">
                    <div id="customer-chart"></div>
                </div>

                <ul class="list-group list-group-flush customer-info">
                    <li class="list-group-item d-flex justify-content-between ">
                        <div class="series-info">
                            <i class="fa fa-circle font-small-3 text-success"></i>
                            <span class="text-bold-600">Baik</span>
                        </div>
                        <div class="product-result">
                            <span id="cr_baik">0</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between ">
                        <div class="series-info">
                            <i class="fa fa-circle font-small-3 text-danger"></i>
                            <span class="text-bold-600">Rusak Berat</span>
                        </div>
                        <div class="product-result">
                            <span id="cr_berat">0</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between ">
                        <div class="series-info">
                            <i class="fa fa-circle font-small-3 text-info"></i>
                            <span class="text-bold-600">Rusak Ringan</span>
                        </div>
                        <div class="product-result">
                            <span id="cr_ringan">0</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between ">
                        <div class="series-info">
                            <i class="fa fa-circle font-small-3 text-warning"></i>
                            <span class="text-bold-600">Rusak Sedang</span>
                        </div>
                        <div class="product-result">
                            <span id="cr_sedang">0</span>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-start pb-0">
                <div id="chart-container" style="height: 524px; width: 650px;"></div> 
            </div>
        </div>
    </div>
 
  

</div>
 
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/colors.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/components.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pages/dashboard-ecommerce.css"> 

<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendors/js/charts/apexcharts.min.js"></script>

<script src="<?php echo base_url();?>assets/fusioncharts/fusioncharts.js"></script>
<script src="<?php echo base_url();?>assets/fusioncharts/themes/fusioncharts.theme.fusion.js"></script>
<script type="text/javascript"> 
    var $primary = '#7367F0';
    var $success = '#28C76F';
    var $danger = '#EA5455';
    var $warning = '#FF9F43';
    var $info = '#00cfe8';
    var $primary_light = '#A9A2F6';
    var $danger_light = '#f29292';
    var $success_light = '#55DD92';
    var $warning_light = '#ffc085';
    var $info_light = '#1fcadb';
    var $strok_color = '#b9c3cd';
    var $label_color = '#e7e7e7';
    var $white = '#fff';

    $.ajax({
        type : 'get',
        url  : '<?= site_url('home/get_bar_chart');?>',
        dataType : 'json',
        success : function(result){
            var dataSource = {
                chart: {
                    caption: "Data Faskes Perkecamatan",
                    subcaption: "Tahun 2020",
                    yaxisname: "Jumlah Faskes",
                    decimals: "1",
                    theme: "fusion"
                },
                data: result
            };
            FusionCharts.ready(function() {
                var myChart = new FusionCharts({
                    type: "column3d",
                    renderAt: "chart-container",
                    width: "100%",
                    height: "100%",
                    dataFormat: "json", 
                    dataSource
                }).render();
            });
        }  
    });

    $.ajax({
        type : 'get',
        url  : '<?= site_url('home/get_pie_chart');?>',
        dataType : 'json',
        success : function(data){
            
            $("#cr_baik").html(data.total[0]);
            $("#cr_berat").html(data.total[1]);
            $("#cr_ringan").html(data.total[2]);
            $("#cr_sedang").html(data.total[3]);
       
            var customerChartoptions = {
                chart: {
                type: 'pie',
                height: 330,
                dropShadow: {
                    enabled: false,
                    blur: 5,
                    left: 1,
                    top: 1,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
                },
                labels: data.label,
                series: data.total,
                dataLabels: {
                enabled: false
                },
                legend: { show: false },
                stroke: {
                width: 5
                },
                colors: [$success, $danger, $info, $warning],
                fill: {
                type: 'gradient',
                gradient: {
                    gradientToColors: [$success_light, $danger_light, $info_light, $warning_light]
                }
                }
            }

            var customerChart = new ApexCharts(
                document.querySelector("#customer-chart"),
                customerChartoptions
            );

            customerChart.render();
        }
    });

</script>