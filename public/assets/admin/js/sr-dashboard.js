
$(document).ready( function(){
    getTopWidget();
    getKpiTargets('Anual');
    getLeaderBoard();
    // getKnockTimeChart();
    getKnockDayChart();
    // kpiGroupPerformance();
    // metricGroup();
    territoryPerformance();
    teamPerformance();

    // myPerformanceSectionToggle();
    // territoryPerformanceSectionToggle();

    $('#my_performance_filter').submit( function(e){
        e.preventDefault();
        $('#performance_section').html('fatching...')
        kpiGroupPerformance();
    })
    $('#territory_performance_filter').submit( function(e){
        e.preventDefault();
        $('#territory_performance').html('fatching...')
        territoryPerformance();
    })
    $('#team_performance_filter').submit( function(e){
        e.preventDefault();
        $('#team_performance').html('fatching...')
        teamPerformance();
    })
})

function myPerformanceSectionToggle()
{
    $('#my_performance_chart_type').change( function(){
        let option_values = $(this).val();
        $('#kpi_group_datatable_section').hide();
        $('#metric_data_table_section').hide();
        for( var i=0; i < option_values.length; i++ )
        {
            $('#' + option_values[i]).show();        
        }
    })
}

function territoryPerformanceSectionToggle()
{
    $('#territory_performance_chart_type').change( function(){
        let option_values = $(this).val();
        $('#territory_kpi_group_datatable').hide();
        $('#territory_metric_data_table').hide();
        $('#territory_kpi_group_bar_chart').hide();
        $('#territory_metric_bar_chart').hide();
        for( var i=0; i < option_values.length; i++ )
        {
            $('#' + option_values[i]).show();        
        }
    })
}   

function getTopWidget()
{
    initRequest('/admin/dashboard/top-widget','GET').then( (res) => {
        $('#attepmt_per_contact').html(res.attempt_per_contact);
        $('#attempt_per_lead').html(res.attempt_per_lead);
        $('#attempt_per_sale').html(res.attempt_per_sale);
        $('#reknocked').html(res.reknocked);
    })
}

function getKpiTargets(chart_type)
{
    var params={bar_type:chart_type};
    initRequest('/admin/sr-kpi-targets','GET',params).then( (res) => {
        var barColors=["#ffb400", "#d2980d", "#a57c1b", "#786028", "#363445", "#48446e", "#5e569b", "#776bcd", "#9080ff","#54bebe", "#76c8c8"];
        
        barChart(res.title,res.value,'Sales Report KPI-Group',barColors,'myChart','bar',true);
        // $('#kpi_annual_target').html(res.annual_api_target);
        // $('#kpi_monthly_target').html(res.monthly_api_target);
        // $('#kpi_weekly_target').html(res.weekly_api_target);
    })
}

function getLeaderBoard()
{
    initRequest('/admin/dashboard/leader-board','GET').then( (res) => {
        console.log(res);
        $('#leader_board').append(res.leader_board);
    })
}

function getKnockTimeChart()
{
    initRequest('/admin/dashboard/knock-time-chart','GET').then( (res)=> {
        var id1 = document.getElementById("myChart2");
        var chart_label = res != null ? res.hours : [];
        var chart_data  = res !=null ? res.total : [];
        MyChart(id1,"#94C5FC", 'Best Knock Time', chart_label, chart_data);
    })
}

function getKnockDayChart()
{
    initRequest('/admin/dashboard/knock-day-chart','GET').then( (res)=> {
        var id1 = document.getElementById("myChart2");
        var chart_label = res != null ? res.day_name : [];
        var chart_data  = res !=null ? res.total : [];
        MyChart(id1,"#FFC388", 'Best Knock Day', chart_label, chart_data);
    })
}

function MyChart(id, color, chart_title, label, data)
{
    var ctx = id.getContext("2d");
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: "line", // also try bar or other graph types

        // The data for our dataset
        data: {
            labels: label,
            // Information about the dataset
            datasets: [
                {
                    // label: "Contact Person Count",
                    label:chart_title,
                    backgroundColor: "transparent",
                    borderColor: color,
                    data: data,
                },
            ],
        },
        // Configuration options
        options: {
            title: {
                display: true,
                text: chart_title,
                fontSize: 12
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display:false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display:false
                    }   
                }]
            }
        },
    });
}

function kpiGroupPerformance()
{
    let params = $('#my_performance_filter').serialize();
    initRequest('/admin/dashboard/kpi-group-performance','GET',params).then( (res) => {
        $('#kpi_group_performance').html(res);
        var universe       = $('#kpi_group_universe').html();
        var converage_rate = $('#kpi_group_converage_rate').html();
        $('#metric_universe').html(universe);
        $('#metric_converage_rate').html(converage_rate);
        $('[data-toggle="tooltip"]').tooltip()
    })
}

function metricGroup()
{
    initRequest('/admin/dashboard/metric-group-performance','GET').then( (res) => {
        $('#metric_performance').html(res);
    })
}

function territoryPerformance()
{
    let params = $('#territory_performance_filter').serialize();
    initRequest('/admin/dashboard/territory-performance','GET',params).then( (res) => {
        console.log(res,"RES")
        
        $('#ter-perform').html(res)
        // $('#territory_performance').html(res);
        // $('.territory_container').each( function(){
        //     var converage_rate = $(this).find('.converage_rate_value').val();
        //     $(this).find('.converage_rate').html(converage_rate)
        //     $('[data-toggle="tooltip"]').tooltip()
        // })
    });
}

function teamPerformance()
{
    let params = $('#team_performance_filter').serialize();
    initRequest('/admin/dashboard/team-performance','GET',params).then( (res) => {
        var barColors = [
            "#f58719",
            "#8f19f5",
            "#22cbf5"
            ];
        barChart(res.title,res.value,'',barColors,'pieChart','pie',false);

    //     $('#team_performance').html(res);
    //     $('.team_container').each( function(){
    //         var total_pins     = $(this).find('.total_pins').val();
    //         var universe       = $(this).find('.team_universe').html();
    //         var converage_rate = ( parseFloat(total_pins) / parseFloat(universe) );
    //             converage_rate =  converage_rate.toFixed(2);
    //         $(this).find('.team_converage_rate').html( converage_rate == 'Infinity' ? 0.00 : converage_rate );
    //     })
    //     $('[data-toggle="tooltip"]').tooltip()
    })
}

function initRequest(uri, method, params= {})
{
    return new Promise( function (resolve, reject){
        $.ajax({
            type:method,
            url: base_url + uri,
            data:params,
            success : function(data){
                resolve(data)
            }
        })
    })

}

function barChart(titles, values, chart_title, barColors, char_id, chart_type, scale) {
    var xValues = titles;
    var yValues = values.map(Number); // Ensure all values are numbers
    var barColors = barColors;
    
    // Calculate total safely
    var total = yValues.reduce((a, b) => a + b, 0);
    
    var optio = {
        legend: {display: false},
        title: {
            display: false,
            text: chart_title
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var dataset = data.datasets[tooltipItem.datasetIndex];
                    var currentValue = dataset.data[tooltipItem.index];
                    
                    // Safely calculate percentage
                    var percentage = (total > 0) 
                        ? ((currentValue / total) * 100).toFixed(2) 
                        : '0.00';
                        
                    return currentValue + ' (' + percentage + '%)';
                }
            }
        },
        scaleShowValues: true,
        cutoutPercentage: 50,
        responsive: true
    };
    
    if (scale) {
        optio = {
            legend: {display: false},
            title: {
                display: false,
                text: chart_title
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var dataset = data.datasets[tooltipItem.datasetIndex];
                        var currentValue = dataset.data[tooltipItem.index];
                        
                        var percentage = (total > 0) 
                            ? ((currentValue / total) * 100).toFixed(2) 
                            : '0.00';
                            
                        return currentValue + ' (' + percentage + '%)';
                    }
                }
            },
            scaleShowValues: true,
            scales: {
                xAxes: [{
                    ticks: {
                        autoSkip: false,
                        fontSize: 14,
                        fontFamily: 'Arial',
                        fontStyle: 'normal',
                        fontColor: '#000000'
                    }
                }],
            }
        };
    }
    
    // Destroy previous chart instance if it exists
    if (window.myChartInstances === undefined) {
        window.myChartInstances = {};
    }
    if (window.myChartInstances[char_id]) {
        window.myChartInstances[char_id].destroy();
    }
    
    // Create new chart instance and store it
    var ctx = document.getElementById(char_id).getContext('2d');
    window.myChartInstances[char_id] = new Chart(ctx, {
        type: chart_type,
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: optio
    });
}
$(".change-bar-chart").change(function(){
   getKpiTargets($(this).val())
  });

  

  $(".day-chart,.time-chart").click(function(){
    if ($(this).hasClass('day-chart')) {
        getKnockDayChart();
    }else{
        getKnockTimeChart();
    }
  });

  $(document).on("click",".next_perm",function(){
    var leg=$(".diplay_tperformance").length -1;
    $(".diplay_tperformance").each(function (i,val){
        if($(val).is(':visible') && $(this).attr("id")<leg){
            $(val).addClass('d-none');
            var id=$(this).attr("id");
            var next=parseInt(id)+1;
            $(".diplay_tperformance#"+next).removeClass("d-none");
            return false;
        }
    })


  })

  $(document).on("click",".prev_perm",function(){
    $(".diplay_tperformance").each(function (i,val){
        if($(val).is(':visible') && $(this).attr("id")>0){
            $(val).addClass('d-none');
            var id=$(this).attr("id");
            var next=parseInt(id)-1;
            $(".diplay_tperformance#"+next).removeClass("d-none");
            return false;
        }
    })


  })
