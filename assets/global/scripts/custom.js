
var Custom = function(){

    $('#ipro_table .btn_reset').on('click', function(e){
        var id = $(this).closest('tr').data('id');
        swal({
                title: "Do you want to edit Ipro?",
                text: '',
                type: 'warning',
                allowOutsideClick: 'true',
                showConfirmButton: 'true',
                showCancelButton: 'true',
                confirmButtonClass: 'btn btn-info',
                cancelButtonClass: 'btn btn-danger',
                closeOnConfirm: true,
                closeOnCancel: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            },
            function(isConfirm){
                var data = {id: id};
                var url = '/admin/get_ipro';
                if (isConfirm){
                    $("#edit_pro_modal").modal('show');
                    $.ajax({
                        type: "post",
                        url: url,
                        data: data,
                        dataType: "json",
                        success: function(res){
                            console.log(res);
                            if(res.status){
                                $("#edit_pro_modal form").find("input[name='id']").val(res.result[0].id);
                                $("#edit_pro_modal form").find("input[name='ipro_name']").val(res.result[0].ipro_name);
                                $("#edit_pro_modal form").find("input[name='ipro_ip']").val(res.result[0].ipro_ip);
                                $("#edit_pro_modal form").find("input[name='ipro_port']").val(res.result[0].ipro_port);
                                $("#edit_pro_modal form").find("input[name='ipro_unit']").val(res.result[0].ipro_unit);
                                $("#edit_pro_modal form").find("input[name='ipro_sensors']").val(res.result[0].ipro_sensors);
                            }
                        }
                    });
                }
            });
    });

    $('#ipro_table .btn_remove').on('click', function(e){
        var id = $(this).closest('tr').data('id');
        swal({
                title: "Do you want to remove this Ipro?",
                text: '',
                type: 'warning',
                allowOutsideClick: 'true',
                showConfirmButton: 'true',
                showCancelButton: 'true',
                confirmButtonClass: 'btn btn-info',
                cancelButtonClass: 'btn btn-danger',
                closeOnConfirm: true,
                closeOnCancel: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            },
            function(isConfirm){
                if (isConfirm){
                    var url = '/admin/remove_ipro';
                    var data = {id: id};
                    $.ajax({
                        type: "post",
                        url: url,
                        data: data,
                        dataType: "json",
                        success: function(res){
                            if(res.status){
                                window.location.reload();
                            }
                        }
                    });
                }
            });
    });

    $('#user_table .btn_reset').on('click', function(e){
        var id = $(this).closest('tr').data('id');
        swal({
                title: "Do you want to edit role?",
                text: '',
                type: 'warning',
                allowOutsideClick: 'true',
                showConfirmButton: 'true',
                showCancelButton: 'true',
                confirmButtonClass: 'btn btn-info',
                cancelButtonClass: 'btn btn-danger',
                closeOnConfirm: true,
                closeOnCancel: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            },
            function(isConfirm){
                var data = {id: id};
                var url = '/admin/get_role';
                if (isConfirm){
                    $("#edit_role_modal").modal('show');
                    $.ajax({
                        type: "post",
                        url: url,
                        data: data,
                        dataType: "json",
                        success: function(res){
                            console.log(res);
                            if(res.status){
                                $("#edit_role_modal form").find("input[name='username']").val(res.result[0].username);
                                $("#edit_role_modal form").find("select[name='role']").val(res.result[0].role);
                                $("#edit_role_modal form").find("input[name='id']").val(res.result[0].id);
                            }
                        }
                    });
                }
            });
    });

    $('#client_table .btn_follow').on('click', function(e){
        var id = $(this).closest('tr').data('id');
        swal({
                title: "Do you want to grant permission to this client?",
                text: '',
                type: 'warning',
                allowOutsideClick: 'true',
                showConfirmButton: 'true',
                showCancelButton: 'true',
                confirmButtonClass: 'btn btn-info',
                cancelButtonClass: 'btn btn-danger',
                closeOnConfirm: true,
                closeOnCancel: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            },
            function(isConfirm){
                var data = {client_id: id};
                var url = '/home/set_follow';
                if (isConfirm){
                    $.ajax({
                        type: "post",
                        url: url,
                        data: data,
                        dataType: "json",
                        success: function(res){
                            console.log(res);
                            if(res.status){
                                window.location.reload();
                            }
                        }
                    });
                }
            });
    });

    $('#client_table .btn_unfollow').on('click', function(e){
        var id = $(this).closest('tr').data('id');
        swal({
                title: "Do you want to remove permission?",
                text: '',
                type: 'warning',
                allowOutsideClick: 'true',
                showConfirmButton: 'true',
                showCancelButton: 'true',
                confirmButtonClass: 'btn btn-info',
                cancelButtonClass: 'btn btn-danger',
                closeOnConfirm: true,
                closeOnCancel: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            },
            function(isConfirm){
                var data = {client_id: id};
                var url = '/home/set_unfollow';
                if (isConfirm){
                    $.ajax({
                        type: "post",
                        url: url,
                        data: data,
                        dataType: "json",
                        success: function(res){
                            console.log(res);
                            if(res.status){
                                window.location.reload();
                            }
                        }
                    });
                }
            });
    });

    $('#ipro_table .btn_remove').on('click', function(e){
        var id = $(this).closest('tr').data('id');
        swal({
                title: "Do you want to remove this User?",
                text: '',
                type: 'warning',
                allowOutsideClick: 'true',
                showConfirmButton: 'true',
                showCancelButton: 'true',
                confirmButtonClass: 'btn btn-info',
                cancelButtonClass: 'btn btn-danger',
                closeOnConfirm: true,
                closeOnCancel: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            },
            function(isConfirm){
                if (isConfirm){
                    var url = '/admin/remove_ipro';
                    var data = {id: id};
                    $.ajax({
                        type: "post",
                        url: url,
                        data: data,
                        dataType: "json",
                        success: function(res){
                            if(res.status){
                                window.location.reload();
                            }
                        }
                    });
                }
            });
    });

    $("select[name=technician_ipro]").on('change', function(e){
        var url = '/admin/update_tech_ipro';
        var data = { id: $(this).attr('data-id'), ipro_id: $(this).val().join(',')};
        $.ajax({
            type: "post",
            url: url,
            data: data,
            dataType: "json",
            success: function(res){
                if(res.status){
                    window.location.reload();
                }
            }
        });
    });

    $('#user_table .btn_remove').on('click', function(e){
        var id = $(this).closest('tr').data('id');
        swal({
                title: "Do you want to remove this User?",
                text: '',
                type: 'warning',
                allowOutsideClick: 'true',
                showConfirmButton: 'true',
                showCancelButton: 'true',
                confirmButtonClass: 'btn btn-info',
                cancelButtonClass: 'btn btn-danger',
                closeOnConfirm: true,
                closeOnCancel: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            },
            function(isConfirm){
                if (isConfirm){
                    var url = '/admin/remove_user';
                    var data = {id: id};
                    $.ajax({
                        type: "post",
                        url: url,
                        data: data,
                        dataType: "json",
                        success: function(res){
                            if(res.status){
                                window.location.reload();
                            }
                        }
                    });
                }
            });
    });


    var handleApp = function(){
        $('#add_pro_modal form').on('submit', function(e){
            e.preventDefault();
            var url = "/admin/add_ipro";
            $.ajax({
                type:"POST",
                url:url,
                data:$(this).serialize(),
                dataType: "json",
                success: function(res){
                    if(res.status){
                        window.location.reload();
                    }else{

                    }
                }
            });
        });

        $('#edit_pro_modal form').on('submit', function(e){
            e.preventDefault();
            var url = "/admin/edit_ipro";
            $.ajax({
                type:"POST",
                url:url,
                data:$(this).serialize(),
                dataType: "json",
                success: function(res){
                    if(res.status){
                        window.location.reload();
                    }else{

                    }
                }
            });
        });

        $('#edit_role_modal form').on('submit', function(e){
            e.preventDefault();
            var url = "/admin/update_role";
            $.ajax({
                type:"POST",
                url:url,
                data:$(this).serialize(),
                dataType: "json",
                success: function(res){
                    if(res.status){
                        window.location.reload();
                    }else{

                    }
                }
            });
        });


        $(".change_password").submit(function(e){
            e.preventDefault();

            if( $("input[name='password']").val() != $("input[name='confirm_password']").val() ){
                toastr["warning"]("Password is not matched.", "Notification!")
            }

            var url = "/admin/update_password";
            $.ajax({
                type:"POST",
                url:url,
                data:$(this).serialize(),
                dataType: "json",
                success: function(res){
                    console.log(res);
                    if(res.status){
                        toastr["success"](res.result, "Success!")
                        window.location.reload();
                    }else{
                        toastr["info"](res.result, "warning!")
                    }
                }
            });
        });

        $(".avatar_form").submit(function(e){
            e.preventDefault();
            var file_data = $('input[name="avatar"]').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            var url = "/admin/upload_avatar";
            $.ajax({
                type:"POST",
                url:url,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                dataType: "json",
                success: function(res){
                    console.log(res);
                    if(res.status){
                        toastr["success"](res.result, "Success!");
                    }else{
                        toastr["info"](res.result, "warning!");
                    }
                }
            });
        });

        $(".personal_form").submit(function(e){
            e.preventDefault();
            var url = "/user/update";
            $.ajax({
                type:"POST",
                url:url,
                data: $(this).serialize(),
                dataType: "json",
                success: function(res){
                    console.log(res);
                    if(res.status){
                        toastr["success"]("User Profile was updated.", "Success!");
                    }else{
                        toastr["info"]("Has problem.", "warning!");
                    }
                }
            });
        });

        var realtimeChart;

        var ipro_graph = function(element, mode){

            var checkboxes = document.getElementsByName('sensors[]');
            var vals = "";
            var limit = 15;

            for (var i=0, n=checkboxes.length;i<n;i++)
            {
                if (checkboxes[i].checked)
                {
                    vals += ","+checkboxes[i].value;
                }
            }
            if (vals) vals = vals.substring(1);

            if($("input[name='role']").val() == "client"){
                var vals  = $("#ipro_check").find("option:checked").attr("sensors");
                var limit = "all";
            }

            if( $("#limit").prop("checked") == true ){
                limit = "all";
            }

            var data = {
                "ipro_ip" : $(element).val(),
                "ipro_port" : $(element).find("option:checked").attr("ipro_port"),
                "ipro_unit" : $(element).find("option:checked").attr("ipro_unit"),
                "ipro_sensors" : vals,
                "ipro_name" : $(element).find("option:checked").attr("ipro_name"),
                "real_time" : $("#real_time").hasClass("btn-danger"),
                "limit" : limit,
                "technician_id" : $(element).find("option:checked").attr("technician_id"),
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

            var sensors = $(element).find("option:checked").attr("sensors");

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
                $(".ipro_sensors input[name='sensors[]']").change(function(){
                    ipro_graph("#ipro_check", 0);
                });

            }
        }

        add_sensor_checkbox("#ipro_check");
        ipro_graph("#ipro_check",0);
        var ipro_timer;

        $("#ipro_check").change(function(){
            add_sensor_checkbox(this);
            ipro_graph(this,0);
        });


        $("#limit").change(function(){
            ipro_graph("#ipro_check",0);
        });

        // $(".ipro_sensors input[name='sensors[]']").change(function(){
        //     console.log("sensor selected!");
        //     alert("sss");
        //   ipro_graph("#ipro_check");
        // });

        $("#remove_history").click(function(){
            var checkboxes = document.getElementsByName('sensors[]');
            var vals = "";
            for (var i=0, n=checkboxes.length;i<n;i++)
            {
                if (checkboxes[i].checked)
                {
                    vals += ","+checkboxes[i].value;
                }
            }
            if (vals) vals = vals.substring(1);

            swal({
                    title: "Do you want to remove the history of sensors - " + vals + " ?",
                    text: '',
                    type: 'warning',
                    allowOutsideClick: 'true',
                    showConfirmButton: 'true',
                    showCancelButton: 'true',
                    confirmButtonClass: 'btn btn-info',
                    cancelButtonClass: 'btn btn-danger',
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                },
                function(isConfirm){
                    if (isConfirm){
                        var url = 'ipro/remove_history';
                        var sensor_name = $("#ipro_check").find("option:checked").attr("ipro_name");
                        var data = {sensor_ip: vals, sensor_name: sensor_name};
                        $.ajax({
                            type: "post",
                            url: url,
                            data: data,
                            dataType: "json",
                            success: function(res){
                                if(res.status){
                                    window.location.reload();
                                }
                            }
                        });
                    }
                });
        });

        // random data generator
        var randBetween = (min, max) => {
            var ceilMin = Math.ceil(min);

            return (
                Math.floor(Math.random() * (Math.floor(max) - ceilMin + 1)) + ceilMin
            );
        };
        var chart;


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
            let minValue = 10000000;
            let maxValue = -10000000;

            for (let i = 0; i < sensorArray.length; i ++){
                minMaxArray[sensorArray[i]] = {}
                minMaxArray[sensorArray[i]]['max'] = chartData.reduce((max, p) => p[sensorArray[i]] > max ? p[sensorArray[i]] : max, chartData[0][sensorArray[i]]);

                minMaxArray[sensorArray[i]]['min'] = chartData.reduce((min, p) => p[sensorArray[i]] < min ? p[sensorArray[i]] : min, chartData[0][sensorArray[i]]);
                if (minValue > minMaxArray[sensorArray[i]]['min']){
                    minValue = minMaxArray[sensorArray[i]]['min'];
                }

                if (maxValue < minMaxArray[sensorArray[i]]['max']){
                    maxValue = minMaxArray[sensorArray[i]]['max'];
                }
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
                $("#max_value").val(maxValue);
                $("#min_value").val(minValue);

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

        $("#real_time").click(function(){
            $(this).toggleClass("btn-danger");
            if($(this).hasClass('btn-danger')){
                ipro_timer = setInterval(function(){
                    ipro_graph( "#ipro_check", 1 );
                }, 10000);
            }else{
                clearTimeout( ipro_timer );
            }

        });

        $("#apply_btn").click(function () {
            let newMin = $('#min_value').val();
            let newMax = $('#max_value').val();
            if (Number(newMax) <= Number(newMin)){
                alert("Set Max and Min value correctly!")
                return;
            }
            chart.yAxes._values[0].min = Number(newMin);
            chart.yAxes._values[0].max = Number(newMax);
            chart.invalidateRawData();

        });

    }

    var initchat = function(){
        var cont = $('#chats');
        var list = $('.chats', cont);
        var form = $('.chat-form', cont);
        var input = $('input', form);
        var btn = $('.btn', form);

        var handleClick = function(e) {
            e.preventDefault();

            var text = input.val();
            if (text.length == 0) {
                return;
            }

            var time = new Date();
            var time_str = (time.getHours() + ':' + time.getMinutes());

            var getLastPostPos = function() {
                var height = 0;
                cont.find("li.out, li.in").each(function() {
                    height = height + $(this).outerHeight();
                });

                return height;
            }

            cont.find('.scroller').slimScroll({
                scrollTo: getLastPostPos()
            });
        }

        $('body').on('click', '.message .name', function(e) {
            e.preventDefault(); // prevent click event

            var name = $(this).text(); // get clicked user's full name
            input.val('@' + name + ':'); // set it into the input field
            App.scrollTo(input); // scroll to input if needed
        });

        btn.click(handleClick);

        input.keypress(function(e) {
            if (e.which == 13) {
                handleClick(e);
                return false; //<---- Add this line
            }
        });
    }

    var handleReister_admin = function(){
        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone_number: {
                },
                role: {
                    required: true
                },
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                rpassword: {
                    equalTo: "#register_password"
                },

                tnc: {
                    required: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit

            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                if (element.attr("name") == "tnc") { // insert checkbox errors after the container
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                form.submit();
            }
        });

        $('.register-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    $('.register-form').submit();
                }
                return false;
            }
        });

        jQuery('#register-btn').click(function () {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });

        jQuery('#register-back-btn').click(function () {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
    }

    return {
        init: function(){
            handleApp();
            handleReister_admin();
            //initchat();
        }
    };
}();

jQuery(document).ready(function(){
    Custom.init();
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
});
