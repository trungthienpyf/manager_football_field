@extends('admin.layout.master')
<!-- Styles -->
@section('content')
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>
<div class="row">
    <div class="col-lg-5">
{{--        style="padding-bottom: 47px"--}}
        <div class="borderStatistic">
            <div id="chartApex"></div>
            <div class="row text-center mt-2">

                <div class="col-md-6">
                    <i class="mdi mdi-check-outline widget-icon rounded-circle bg-light-lighten text-muted"></i>
                    <h3 class="font-weight-normal mt-3">
                        <span class="qtySuccess"></span>
                    </h3>
                    <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> Đặt thành công</p>
                </div>
                <div class="col-md-6">
                    <i class="mdi mdi-close-circle-outline widget-icon rounded-circle bg-light-lighten text-muted"></i>
                    <h3 class="font-weight-normal mt-3">
                        <span class="qtyFail"></span>
                    </h3>
                    <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle " style="color: #23e5a4"></i> Hủy</p>
                </div>
            </div>
            <h2 style="text-align: center;color: #0e0f11;margin-top: 34px">Tỉ lệ trạng thái đặt sân</h2>
        </div>

    </div>
    <div class="col-lg-7">
        <div class="borderStatistic">
            <div id="chartdiv"></div>
            <h2 style="text-align: center;color: #0e0f11">Thông kê số lượng sân đã được đặt trong tháng</h2>
        </div>
    </div>

</div>


<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>





<!-- Chart code -->
<script>



    am5.ready(function() {
        let arrSeries=[];
        let arrLabels=[];
        let arrCount=[]

        $.ajax({
            url: '{{route('admin.apiStatus')}}',
            async:false,
            type: 'get',
            success: function (response) {
                let   object=response[0]
                console.log(object)
                for (const property in object) {
                    arrLabels.push(property)

                    arrCount.push(object[property])
                        arrSeries.push(parseFloat(object[property]/(response[0].Sum)*100).toFixed(2))

                }



            }
        })

        console.log(arrSeries,arrLabels)
        $('.qtySuccess').text(arrCount[0])
        $('.qtyFail').text(arrCount[1])
        var options = {
                series:arrSeries.slice(0,-1),
                chart: {
                    height: 350,
                    type: 'radialBar',
                },
                plotOptions: {
                    radialBar: {
                        dataLabels: {
                            name: {
                                fontSize: '22px',
                            },
                            value: {
                                fontSize: '16px',
                            },

                        }
                    }
                },
                labels: arrLabels.slice(0,-1),
            };

            var chart = new ApexCharts(document.querySelector("#chartApex"), options);
            chart.render();



// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart2 = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            layout: root.verticalLayout
        }));


// Data
        var colors = chart2.get("colors");
var data=[]

        $.ajax({
                url: '{{route('admin.apiSum')}}',
                async:false,
                type: 'get',
                success: function (response) {
                   // console.log(response)
                   data.push(...response)


                }
            })

        data.map(function(d){

            return  d.visits=parseInt(d.visits), d.icon='',d.columnSettings = { fill: colors.next() }
        })





// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart2.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "country",
            renderer: am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            }),

            bullet: function (root, axis, dataItem) {
                return am5xy.AxisBullet.new(root, {
                    location: 0.5,
                    sprite: am5.Picture.new(root, {
                        width: 24,
                        height: 24,
                        centerY: am5.p50,
                        centerX: am5.p50,
                        src: dataItem.dataContext.icon
                    })
                });
            }
        }));

        xAxis.get("renderer").labels.template.setAll({
            paddingTop: 20
        });

        xAxis.data.setAll(data);

        var yAxis = chart2.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {})
        }));

// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart2.series.push(am5xy.ColumnSeries.new(root, {
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "visits",
            categoryXField: "country"
        }));

        series.columns.template.setAll({
            tooltipText: "{categoryX}: {valueY}",
            tooltipY: 0,
            strokeOpacity: 0,
            templateField: "columnSettings",
            name:'a',
        });

        series.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();
        chart2.appear(1000, 100);

    }); // end am5.ready()
</script>

<!-- HTML -->

@endsection
