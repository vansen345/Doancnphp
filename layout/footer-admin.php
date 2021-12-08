<div class="footer">
    <div class="footer-inner">
        2013 &copy; Metronic by keenthemes.
    </div>
    <div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="../css/css/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="../css/css/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../css/css/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="../css/css/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../css/css/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<!--[if lt IE 9]>
<script src="../css/css/plugins/excanvas.min.js"></script>
<script src="../css/css/plugins/respond.min.js"></script>
<![endif]-->
<script src="../css/css/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../css/css/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../css/css/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="../css/css/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../css/css/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="../css/css/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="../css/css/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="../css/css/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="../css/css/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="../css/css/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="../css/css/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="../css/css/plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="../css/css/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="../css/css/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="../css/css/plugins/bootstrap-daterangepicker/date.js" type="text/javascript"></script>
<script src="../css/css/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="../css/css/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<script src="../css/css/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="../css/css/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="../css/css/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../js/scripts/app.js" type="text/javascript"></script>
<script src="../js/scripts/index.js" type="text/javascript"></script>
<script src="../js/scripts/tasks.js" type="text/javascript"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        App.init(); // initlayout and core plugins
        Index.init();
        Index.initJQVMAP(); // init index page's custom scripts
        Index.initCalendar(); // init index page's custom scripts
        Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initMiniCharts();
        Index.initDashboardDaterange();
        Index.initIntro();
        Tasks.initDashboardWidget();
    });
</script>
<script>
    let myChart = document.getElementById('myChart').getContext('2d');
    var array1 = document.getElementById('total1').value;
    var array2 = document.getElementById('total2').value;
    var array3 = document.getElementById('total3').value;
    var array4 = document.getElementById('total4').value;
    var array5 = document.getElementById('total5').value;
    var array6 = document.getElementById('total6').value;
    var array7 = document.getElementById('total7').value;
    var array8 = document.getElementById('total8').value;
    var array9 = document.getElementById('total9').value;
    var array10 = document.getElementById('total10').value;
    var array11 = document.getElementById('total11').value;
    var array12 = document.getElementById('total12').value;
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
        type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data:{
            labels:['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12'],
            datasets:[{
                label:'Population',
                data:[
                    array1,
                    array2,
                    array3,
                    array4,
                    array5,
                    array6,
                    array7,
                    array8,
                    array9,
                    array10,
                    array11,
                    array12,
                ],
                //backgroundColor:'green',
                backgroundColor:[
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                ],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
            }]
        },
        options:{
            title:{
                display:true,
                text:'Thống Kê Theo Tháng',
                fontSize:25
            },
            legend:{
                display:true,
                position:'right',
                labels:{
                    fontColor:'#000'
                }
            },
            layout:{
                padding:{
                    left:50,
                    right:0,
                    bottom:0,
                    top:0
                }
            },
            tooltips:{
                enabled:true
            }
        }
    });
</script>
<!--<script>-->
<!--$(function () {-->
<!--        // var array2 = document.getElementById('total2').value;-->
<!--        // var array3 = document.getElementById('total3').value;-->
<!--        // var array4 = document.getElementById('total4').value;-->
<!--        // var array5 = document.getElementById('total5').value;-->
<!--        // var array6 = document.getElementById('total6').value;-->
<!--        // var array7 = document.getElementById('total7').value;-->
<!--        // var array8 = document.getElementById('total8').value;-->
<!--        // var array9 = document.getElementById('total9').value;-->
<!--        // var array10 = document.getElementById('total10').value;-->
<!--        // var array11 = document.getElementById('total11').value;-->
<!--        // var array12 = document.getElementById('total12').value;-->
<!--      new Morris.Bar({-->
<!--            element: 'myfirstchart',-->
<!--            data: [-->
<!--                { month: 'Tháng 1', value: 0 },-->
<!--                { month: 'Tháng 2', value: 20 },-->
<!--                { month: 'Tháng 3', value: 5 },-->
<!--                { month: 'Tháng 4', value: 5 },-->
<!--                { month: 'Tháng 5', value: 20 },-->
<!--                { month: 'Tháng 6', value: 20 },-->
<!--                { month: 'Tháng 7', value: 20 },-->
<!--                { month: 'Tháng 8', value: 20 },-->
<!--                { month: 'Tháng 9', value: 20 },-->
<!--                { month: 'Tháng 10', value: 20 },-->
<!--                { month: 'Tháng 11', value: 20 },-->
<!--                { month: 'Tháng 12', value: 20 },-->
<!--            ],-->
<!--            xkey: 'month',-->
<!---->
<!--            ykeys: ['value'],-->
<!---->
<!--            labels: ['Đơn hàng','Doanh thu','Số lượng bán ra']-->
<!--        });-->
<!--})-->
<!---->
<!--</script>-->
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>