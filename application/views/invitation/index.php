<?php  ?>

<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-user-follow font-dark"></i>
                            <span class="caption-subject bold uppercase">Invited Users</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="user_table">
                            <thead>
                            <tr>
                                <th> No </th>
                                <th>  </th>
                                <th> Full Name </th>
                                <th> Username </th>
                                <th> Email </th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($users) > 0): ?>
                                <?php foreach($users as $key => $value): ?>
                                    <tr class="odd gradeX" data-id="<?= $value['id'] ?>">
                                        <td> <?= $key+1 ?> </td>
                                        <td class="avatar"> <?php if($value["avatar"]){ ?>
                                                <img src="/<?=$value["avatar"]?>" alt="" />
                                            <?php }else{ ?>
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            <?php } ?>
                                        </td>
                                        <td> <?= $value['first_name'] ?> <?= $value['last_name'] ?> </td>
                                        <td> <?= $value['username'] ?> </td>
                                        <td> <?= $value['email'] ?> </td>
                                        <td>
                                            <button class="btn btn-warning mt-sweetalert btn_detail"
                                                    data-title="Do you want to resend invitation?"
                                                    data-type="warning"
                                                    data-allow-outside-click="true"
                                                    data-show-confirm-button="true"
                                                    data-show-cancel-button="true" ipro="<?= $value['ipro'] ?>" min="<?= $value['min'] ?>" max="<?= $value['max'] ?>" data-cancel-button-class="btn-danger" data-cancel-button-text='No' data-confirm-button-text='Yes' data-confirm-button-class="btn-warning">Detail </button>
                                            <button class="btn btn-primary mt-sweetalert btn_resend"
                                                    data-title="Do you want to resend invitation?"
                                                    data-type="warning"
                                                    data-allow-outside-click="true"
                                                    data-show-confirm-button="true"
                                                    data-show-cancel-button="true" invite="<?= $value['invite_id'] ?>" data-cancel-button-class="btn-danger" data-cancel-button-text='No' data-confirm-button-text='Yes' data-confirm-button-class="btn-info">Resend </button>
                                            <button class="btn btn-danger mt-sweetalert btn_remove"
                                                    data-title="Do you want to remove this invitation?"
                                                    data-type="warning"
                                                    data-allow-outside-click="true"
                                                    data-show-confirm-button="true"
                                                    data-show-cancel-button="true" invite="<?= $value['invite_id'] ?>" data-cancel-button-class="btn-danger" data-cancel-button-text='No' data-confirm-button-text='Yes' data-confirm-button-class="btn-info">Remove</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END QUICK SIDEBAR -->
</div>

<div id="detail_modal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="javascript:;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Invitation Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                        <div class="scroller" style="overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                            <div class="form-group">
                                <label class="control-label">Ipro Name</label>
                                <input class="form-control placeholder-no-fix" type="text" id="ipro_name" readonly />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ipro IP</label>
                                <input class="form-control placeholder-no-fix" type="text" id="ipro_ip" readonly />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ipro Port</label>
                                <input class="form-control placeholder-no-fix" type="text" id="ipro_port" readonly />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ipro Unit</label>
                                <input class="form-control placeholder-no-fix" type="text" id="ipro_unit" readonly />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Max Value</label>
                                <input class="form-control placeholder-no-fix" type="text" id="max_value" readonly />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Min Value</label>
                                <input class="form-control placeholder-no-fix" type="text" id="min_value" readonly />
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".role").change(function(){
        if( $(this).val() == 2 ){
            $(".type_role").show();
        }else{
            $(".type_role").hide();
        }
    });

    $("#add_user").on('click', function(e){
        e.preventDefault();

        if ($('.register-form').validate().form()) {
            // $('.register-form').submit();
            console.log("ttt");
        }else{
            console.log("eeee");
            return false;
        }

        $username = $(this).find('input[name="username"]');

        var url = '/user/register';

        $.ajax({
            type: "post",
            url: url,
            data: $(this).closest("form.register-form").serialize(),
            dataType: "json",
            success: function(res){
                console.log(res);
                if(res.status){
                    window.location.reload();
                } else {
                    window.alert(res.msg);
                }
            }
        });
        return false;
    });

    $(".btn_detail").on('click', function(e){
        e.preventDefault();
        let ipro = $(this).attr('ipro');
        var min = $(this).attr('min');
        var max = $(this).attr('max');

        $.ajax({
            type: "post",
            url: '/invitation/detailInvitation',
            data: {
                ipro : ipro
            },
            dataType: "json",
            success: function(res){
                console.log(res);
                $('#ipro_name').val(res.ipro_name);
                $('#ipro_ip').val(res.ipro_ip);
                $('#ipro_port').val(res.ipro_port);
                $('#ipro_unit').val(res.ipro_unit);
                $('#min_value').val(min);
                $('#max_value').val(max);

                $('#detail_modal').modal('show');
            }
        });
    });

    $(".btn_resend").on('click', function (e) {
        e.preventDefault();
        let id = $(this).attr('invite');
        $.post("/invitation/resendInvite",{
            id:id,
        }).done(
            function (data) {
                swal("Good job!", "Successfully resent!", "success");
            }
        );

    });

    $(".btn_remove").on('click', function (e) {
        e.preventDefault();

        swal({
                title: "Do you want to remove this Invitation?",
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
            function(isConfirm) {
                if (isConfirm) {
                    let id = $(this).attr('invite');
                    $.ajax({
                        type: "post",
                        url: '/invitation/removeInvite',
                        data: {
                            id : id
                        },
                        dataType: "json",
                        success: function(res){
                            window.location.reload();
                        }
                    });
                }
            }
        );
    });

</script>
