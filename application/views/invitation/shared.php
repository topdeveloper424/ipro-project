<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Ipro Tester</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?= base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?= base_url() ?>assets/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />

    <link href="<?= base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?= base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?= base_url() ?>assets/pages/css/profile.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?= base_url() ?>assets/global/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" />

    <script src="<?= base_url() ?>assets/global/plugins/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
</head>

 <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?= base_url() ?>">
                            Ipro Site </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <?php if($userdata["avatar"]){ ?>
                                    <img class="img-circle" src="/<?=$userdata["avatar"]?>" alt="" />
                                    <?php }else{ ?>
                                    <img class="img-circle" src="<?= base_url() ?>assets/upload/default.png" alt="" />
                                    <?php } ?>
                                    <span class="username username-hide-on-mobile"> <?php echo $userdata["username"]; ?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="/user/user_profile">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="/user/logout">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="/user/logout" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>

            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <?php
                                if($userdata['role'] == "admin" ):
                            ?>
                            <li class="nav-item">
                                <a href="/admin" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="/admin/ipros" class="nav-link nav-toggle">
                                    <i class="icon-settings"></i>
                                    <span class="title">Settings</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php
                                if($userdata['role'] == "technician" ):
                            ?>
                            <li class="nav-item ">
                                <a href="/home/client" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title">Clients</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a href="/" class="nav-link nav-toggle">
                                    <i class="icon-feed"></i>
                                    <span class="title">Home</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/invitation" class="nav-link nav-toggle">
                                    <i class="icon-user-follow"></i>
                                    <span class="title">Invited Users</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->

                        <div class="portlet-body" id="chats" style="display: none;">
                            <div class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible1="1">
                               <ul class="chat_block_lists chats">
                               </ul>
                            </div>
                            <div class="chat-form">
                                <div class="input-cont">
                                    <input class="form-control" id="msg_box" type="text" placeholder="Type a message here..." /> </div>
                                <div class="btn-cont">
                                    <span class="arrow"> </span>
                                    <a href="javascript:;" id="msg_send" class="btn blue icn-only">
                                        <i class="fa fa-check icon-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END SIDEBAR -->

                     </div>
                </div>

    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-layers font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Ipro Chart</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-9">
                                  <div class="ipro_sensors mt-checkbox-inline d-inline-block mr-2">

                                  </div>
                                  <label style="margin-left:20px;" class='mt-checkbox'><input type='checkbox' id="limit" value='all' checked />All Data<span></span></label>

                                </div>
                            </div>
                            <div id="d" style="position: absolute; display: none">
                                <label>Label Name : </label>
                                <input type="text" id="labelName">
                            </div>
                            <div id="echarts_line" style="height: 500px;"></div>

                            <div class="row" style="padding:20px 80px;">
                              <table id="min_max" class="table table-bordered">
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END : ECHARTS -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->


                <!-- END QUICK SIDEBAR -->
</div>
<script src="<?= base_url() ?>assets/global/plugins/amcharts/core.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/amcharts/charts.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/amcharts/animated.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/amcharts/material.js"></script>

<script src="<?= base_url() ?>assets/global/scripts/moment.min.js"></script>
<script src="<?= base_url() ?>assets/global/scripts/moment.timezone.js"></script>
<script>
    $ = jQuery;
    var minValue = '<?php echo $min ?>';
    var maxValue = '<?php echo $max ?>';

    var chart;
    var ipro_graph = function(element, mode){

        var checkboxes = document.getElementsByName('sensors[]');
        var vals = "";
        var limit = 'all';

        for (var i=0, n=checkboxes.length;i<n;i++)
        {
            if (checkboxes[i].checked)
            {
                vals += ","+checkboxes[i].value;
            }
        }
        if (vals) vals = vals.substring(1);


        var data = {
            "ipro_ip" : '<?php echo $ipro['id'] ?>',
            "ipro_port" : '<?php echo $ipro['ipro_port'] ?>',
            "ipro_unit" : '<?php echo $ipro['ipro_unit'] ?>',
            "ipro_sensors" : vals,
            "ipro_name" : '<?php echo $ipro['ipro_name'] ?>',
            "real_time" : 'false',
            "limit" : limit,
            "technician_id" : 2,
        };

        var url = "/ipro/excute_python";
        $.ajax({
            type:"POST",
            url:url,
            data: data,
            dataType: "json",
            success: function(res){
                drawing(res.result,mode);

            }
        });
    }

    var sensor_list = {
        "2": "PSI",
        "101": "Mcf/d",
        "102": "Mcf",
        "105": "Inches H20",
        "111": "Downhole PSI",
    };

    var add_sensor_checkbox = function(element){
        var check_sensors = "";

        var sensors = '<?php echo $ipro['ipro_sensors'] ?>';

        if(sensors!==undefined){
            $.each(sensors.split(','), function(key, sensor){
                var sensor=sensor.trim();
                var sensor_alias = "Other";
                if(sensor_list[sensor] !== undefined){
                    sensor_alias = sensor_list[sensor];
                }
                check_sensors +="<label class='mt-checkbox'><input type='checkbox' name='sensors[]' value='"+sensor+"' checked />"+sensor_alias+"("+sensor+")"+"<span></span></label>";
            })

            $(".ipro_sensors").html(check_sensors);

        }
    }

    add_sensor_checkbox("#ipro_check");
    ipro_graph("#ipro_check",0);



    var drawing = function(res, mode){
        console.log(res);
        if (res.length == 0){
            return
        }
        var chartData = [];
        var dateArray = [];
        var sensorArray = [];
        for(let i = 0; i < res.length; i ++){
            let item = res[i];
            if (typeof item[0] === 'undefined'){
                break;
            }
            if (item.length == 0){
                continue;
            }
            sensorArray.push(item[0].sensor)
            for(let j = 0; j < item.length; j ++){
                if (!dateArray.includes(item[j].created_at)){
                    dateArray.push(item[j].created_at);
                }
            }
        }
        dateArray.sort();
        console.log('dataarray',dateArray);
        if (dateArray.length > 0){
            for (let d = 0; d < dateArray.length; d ++){
                let date = dateArray[d];
                let chartItem = {};
                chartItem['date'] = new Date(date);
                for(var i = 0; i < res.length; i ++){
                    let item = res[i];
                    let flag = false;
                    for(var j = 0; j < item.length; j ++){
                        let row = item[j];
                        if (date == row.created_at){
                            chartItem[row.sensor] = Number(row.data);

                            flag = true;
                            continue;
                        }
                    }
                }
                chartData.push(chartItem);
            }
        }

        console.log('chartdata',chartData);
        let minMaxArray = {};

        for (let i = 0; i < sensorArray.length; i ++){
            minMaxArray[sensorArray[i]] = {}
            minMaxArray[sensorArray[i]]['max'] = chartData.reduce((max, p) => p[sensorArray[i]] > max ? p[sensorArray[i]] : max, chartData[0][sensorArray[i]]);

            minMaxArray[sensorArray[i]]['min'] = chartData.reduce((min, p) => p[sensorArray[i]] < min ? p[sensorArray[i]] : min, chartData[0][sensorArray[i]]);
        }
        console.log('minMaxArray',minMaxArray);


        var sensor_list = {
            "2": "PSI",
            "101": "Mcf/d",
            "102": "Mcf",
            "105": "Inches H20",
            "111": "Downhole PSI",
        };


        am4core.ready(function() {
            // if (chart){
            //     chart.data = chartData;
            //     chart.invalidateRawData();
            // }

// Themes begin
            if (mode == 1 && chart){
                chart.data = chartData;
                chart.invalidateRawData();
                return;
            }
            if (chart){
                chart.dispose();
            }
            am4core.useTheme(am4themes_material);
            chart = am4core.create("echarts_line", am4charts.XYChart);
            chart.data = chartData;
            chart.logo.height = -15000;
            chart.exporting.menu = new am4core.ExportMenu();
// Themes end

            var categoryAxis = chart.xAxes.push(new am4charts.DateAxis());
            categoryAxis.renderer.minGridDistance = 30;
            // categoryAxis.dataFields.category = "date";
            // categoryAxis.renderer.opposite = false;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.inversed = false;
            valueAxis.title.text = 'Sensor Value';
            valueAxis.renderer.minLabelPosition = 0.01;
            valueAxis.min = Number(minValue);
            valueAxis.max = Number(maxValue);
            valueAxis.strictMinMax = true;

// Create value axis

// Create series
            for(let i = 0; i < sensorArray.length; i ++){
                let series1 = chart.series.push(new am4charts.LineSeries());
                series1.dataFields.valueY = sensorArray[i];
                series1.dataFields.dateX  = "date";
                series1.name = sensor_list[sensorArray[i]];
                series1.strokeWidth = 2;
                series1.yAxis = valueAxis;
                let circleBullet = new am4charts.CircleBullet();
                circleBullet.circle.radius = 3;
                series1.bullets.push(circleBullet);
                series1.tooltipText = "{name} in {dateX}: {valueY}";
                series1.legendSettings.valueText = "{valueY}";
                series1.visible  = true;
                series1.segments.template.interactionsEnabled = true


                circleBullet.events.on("hit", function(ev) {
                    console.log("clicked on ", ev.point);
                    $("#d").show();
                    $( "#d" ).dialog({
                        autoOpen: false,
                        height: 300,
                        width: 350,
                        modal: true,
                        buttons: [{
                            text: "Ok",
                            click: function() {
                                let labelName = $("#labelName").val();
                                console.log(labelName);
                                var $label = $("<label>").text(labelName);
                                $label.css({"position":"absolute","top":ev.point.y+"px", "left":ev.point.x+"px"});
                                $('body').append($label);
//                                     var valueLabel = series1.bullets.push(new am4charts.LabelBullet());
//                                     valueLabel.label.text = labelName;
// //                                    valueLabel.locationX = 1;
//                                     valueLabel.label.fontSize = 12;
//                                     valueLabel.label.horizontalCenter = "right";
//                                     valueLabel.label.dx = 10;
//                                     valueLabel.label.dy = -10;

                                $( this ).dialog( "close" );
                                $("#labelName").val("");
                                chart.validateData();
                            }
                        }]
                    });
                    $( "#d" ).dialog( "open" );

                    $(".ui-dialog").css('left',ev.point.x);
                    $(".ui-dialog").css('top',ev.point.y);
                }, this);

            }

// Add chart cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.behavior = "zoomY";

// Add legend
            chart.legend = new am4charts.Legend();
// Add vertical scrollbar
            chart.scrollbarY = new am4core.Scrollbar();
            chart.scrollbarY.marginLeft = 0;
            chart.scrollbarX = new am4core.Scrollbar();
            chart.scrollbarX.marginLeft = 0;

// Add cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.behavior = "zoomX";



        }); // end am4core.ready()
        var thead = $("<tr>").append("<th></th>");
        var min_elem = $("<tr>").append("<td>Min</td>");
        var max_elem = $("<tr>").append("<td>Max</td>");
        for (var key in minMaxArray){
            if (typeof minMaxArray[key]['min'] === 'undefined'){
                continue;
            }
            thead.append("<th>"+sensor_list[key]+" ("+key+")</th>");
            min_elem.append("<td>"+ minMaxArray[key]['min'] +"</td>");
            max_elem.append("<td>"+ minMaxArray[key]['max'] +"</td>");
        }
        $("#min_max").html("");
        if(chartData.length > 0){
            $("#min_max").append($("<thead>").append(thead)).append($("<tbody>").append(min_elem).append(max_elem));
        }

    }

</script>
