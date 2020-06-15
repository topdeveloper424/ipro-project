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
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase">Users</span>
                            </div>
                            <div class="pull-right">
                              <button class="btn green" data-toggle="modal" data-target="#add_user_modal">Add New<i class="fa fa-plus"></i></button>
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
                                        <th> Role </th>
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
                                                <td> <?= $value['type'] ?>
                                                    <?php
                                                      if ($value['type'] == "technician") {
                                                        $tech_ipro_ids = explode(",", $value['ipro_id']);
                                                    ?>
                                                    <span class="technician_ipro_box">
                                                      <select class="form-control type bs-select" name="technician_ipro" data-id="<?= $value['id'] ?>" multiple>
                                                          <option disabled value> -- Type -- </option>
                                                          <?php foreach($type as $ipro): ?>
                                                          <option value="<?= $ipro['id'] ?>" <?php if(in_array($ipro['id'], $tech_ipro_ids)) echo "selected" ?>><?= $ipro['ipro_name'] ?></option>
                                                          <?php endforeach; ?>
                                                      </select>
                                                    </span>
                                                    <?php
                                                      }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary mt-sweetalert btn_reset"
                                                        data-title="Do you want to Edit Role?"
                                                        data-type="warning"
                                                        data-allow-outside-click="true"
                                                        data-show-confirm-button="true"
                                                        data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text='No' data-confirm-button-text='Yes' data-confirm-button-class="btn-info">Edit </button>
                                                    <button class="btn btn-danger mt-sweetalert btn_remove"
                                                        data-title="Do you want to remove this User?"
                                                        data-type="warning"
                                                        data-allow-outside-click="true"
                                                        data-show-confirm-button="true"
                                                        data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text='No' data-confirm-button-text='Yes' data-confirm-button-class="btn-info">Remove</button>
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
    <!-- END CONTENT -->
    <div id="add_user_modal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="register-form" action="/user/register" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                            <div class="scroller" style="overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                                <div class="form-group">
                                    <label class="control-label visible-ie8 visible-ie9">First Name</label>
                                    <div class="input-icon">
                                        <i class="fa fa-font"></i>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="first_name" /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                                    <div class="input-icon">
                                        <i class="fa fa-font"></i>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="last_name" /> </div>
                                </div>
                                <div class="form-group">
                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                                    <div class="input-icon">
                                        <i class="fa fa-envelope"></i>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" /> </div>
                                </div>
                                <div class="form-group">
                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                    <label class="control-label visible-ie8 visible-ie9">Phone Number</label>
                                    <div class="input-icon">
                                        <i class="fa fa-envelope"></i>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Phone Number" name="phone_number" /> </div>
                                </div>
                                <p> Enter your account details below: </p>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <select class="form-control role bt-se" name="role" required autocomplete="off">
                                            <!-- <option value="admin">Administrator</option> -->
                                            <option disabled selected value> -- Role -- </option>
                                            <option value="2">Technician</option>
                                            <option value="3">Client</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="type_role">
                                            <select class="form-control type bs-select" name="ipro_id[]" multiple>
                                                <option disabled value> -- Type -- </option>
                                                <?php foreach($type as $value): ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['ipro_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                                    <div class="input-icon">
                                        <i class="fa fa-lock"></i>
                                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                                    <div class="controls">
                                        <div class="input-icon">
                                            <i class="fa fa-check"></i>
                                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword" /> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        <button type="submit" class="btn green" id="add_user">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="edit_role_modal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="javascript:;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit Role</h4>
                    </div>
                    <div class="modal-body">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                            <div class="scroller" style="overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger" role="alert" style="display:none" id="error_msg">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <span class="sr-only">Error:</span>
                                            User already exists
                                        </div>
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" name="username" class="form-control" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
			                                <select class="form-control" name="role">
                                                <?php
                                                   foreach($types as $key => $value):
                                                ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['type'] ?></option>
                                                <?php endforeach; ?>
			                                </select>
                                        </div>

                                        <input type="hidden" name="id" class="form-control" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        <button type="submit" class="btn green" id="edit_role">Edit User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END QUICK SIDEBAR -->
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
</script>
