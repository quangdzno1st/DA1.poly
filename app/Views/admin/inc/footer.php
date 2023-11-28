
<footer class="footer text-center">
    All Rights Reserved by Matrix-admin. Designed and Developed by
    <a href="https://wrappixel.com">WrapPixel</a>.
</footer>
<script src="<?= BASE_URL ?>public/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= BASE_URL ?>public/dist/js/sidebarmenu.js"></script>
<script src="<?= BASE_URL ?>public/dist/js/custom.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="<?= BASE_URL ?>public/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="<?= BASE_URL ?>public/assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/extra-libs/sparkline/sparkline.js"></script>
<script src="<?= BASE_URL ?>public/dist/js/waves.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/flot/excanvas.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/flot/jquery.flot.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/flot/jquery.flot.pie.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/flot/jquery.flot.time.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/flot/jquery.flot.stack.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="<?= BASE_URL ?>public/dist/js/pages/chart/chart-page-init.js"></script>

<script src="<?= BASE_URL ?>public/assets/libs/chart/matrix.interface.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/chart/excanvas.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/chart/jquery.peity.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/chart/matrix.charts.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/chart/jquery.flot.pie.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/chart/turning-series.js"></script>



<script src="<?= BASE_URL ?>public/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= BASE_URL ?>public/dist/js/custom.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="<?= BASE_URL ?>public/dist/js/pages/mask/mask.init.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/libs/quill/dist/quill.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/extra-libs/DataTables/datatables.min.js"></script>

<script src="../../../../assets/js/jquery-3.2.1.min.js"></script>
<script src="../../../../assets/js/popper.min.js"></script>
<script src="../../../../assets/js/bootstrap.min.js"></script>
<script src="../../../../assets/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="../../../../assets/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="../../../../assets/js/plugins/chart.js"></script>
<script type="text/javascript">
    var data = {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
        datasets: [{
            label: "Dữ liệu đầu tiên",
            fillColor: "rgba(255, 255, 255, 0.158)",
            strokeColor: "black",
            pointColor: "rgb(220, 64, 59)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "green",
            data: [20, 59, 90, 51, 56, 100, 40, 60, 78, 53, 33, 81]
        },
            {
                label: "Dữ liệu kế tiếp",
                fillColor: "rgba(255, 255, 255, 0.158)",
                strokeColor: "rgb(220, 64, 59)",
                pointColor: "black",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "green",
                data: [48, 48, 49, 39, 86, 10, 50, 70, 60, 70, 75, 90]
            }
        ]
    };


    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
</script>
<!-- Google analytics script-->
<script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    $('#zero_config').DataTable();
    //***********************************//
    // For select 2
    //***********************************//
    $(".select2").select2();

    /*colorpicker*/
    $(".demo").each(function () {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
            control: $(this).attr("data-control") || "hue",
            position: $(this).attr("data-position") || "bottom left",

            change: function (value, opacity) {
                if (!value) return;
                if (opacity) value += ", " + opacity;
                if (typeof console === "object") {
                    console.log(value);
                }
            },
            theme: "bootstrap",
        });
    });
    /*datwpicker*/
    jQuery(".mydatepicker").datepicker();
    jQuery("#datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
    });
    var quill = new Quill("#editor", {
        theme: "snow",
    });
</script>

</body>

</html>