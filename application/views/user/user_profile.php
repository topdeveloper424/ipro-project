    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
         
            <h1 class="page-title"> User Profile
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <?php if($user["avatar"]){ ?>
                                <img src="/<?=$user["avatar"]?>" alt="" />
                                <?php }else{ ?>
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                <?php } ?>    
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> <?=$user["username"]?> </div>
                                <div class="profile-usertitle-job"> <?=$user["type"]?> </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->                           
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                
                            </div>
                            <!-- END MENU -->
                        </div>
                        <!-- END PORTLET MAIN -->                       
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                <form role="form" class="personal_form" action="#">
                                                    <div class="form-group">
                                                        <label class="control-label">First Name</label>
                                                        <input type="text" name="first_name" value="<?= $user["first_name"] ?>" placeholder="John" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Last Name</label>
                                                        <input type="text" name="last_name" value="<?= $user["last_name"] ?>" placeholder="Doe" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Username</label>
                                                        <input type="text" name="username" value='<?= $user["username"] ?>' placeholder="john123" class="form-control" /> </div> 
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input type="text" name="email" value='<?= $user["email"] ?>' placeholder="john@mail.com" class="form-control" /> </div>    
                                                    <div class="form-group">
                                                        <label class="control-label">Mobile Number</label>
                                                        <input type="text" name="phone_number" value='<?= $user["phone_number"] ?>' placeholder="+1 646 580 DEMO (6284)" class="form-control" /> </div>
                                                    <input type="hidden" name="id" value="<?= $user["id"] ?>">
                                                    <div class="margiv-top-10">
                                                        <a href="javascript:;" class="btn green submit"> <button type="submit">Save Changes</button> </a>
                                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END PERSONAL INFO TAB -->
                                            <!-- CHANGE AVATAR TAB -->
                                            <div class="tab-pane" id="tab_1_2">                                                
                                                <form action="#" class="avatar_form" role="form">
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <?php if($user["avatar"]){ ?>
                                                                <img src="/<?=$user["avatar"]?>" alt="" />
                                                                <?php }else{ ?>
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                                                <?php } ?>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="avatar"> </span>
                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            <span class="label label-danger">NOTE! </span>
                                                            <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?= $user["id"] ?>">
                                                    <div class="margin-top-10">
                                                        <a href="javascript:;" class="btn green"><button type="submit">Submit</button></a>
                                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END CHANGE AVATAR TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="tab_1_3">
                                                <form class="change_password" action="#">
                                                    <div class="form-group">
                                                        <label class="control-label">Current Password</label>
                                                        <input type="password" name="current_password" class="form-control" required /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">New Password</label>
                                                        <input type="password" name="password" class="form-control" required /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Re-type New Password</label>
                                                        <input type="password" name="confirm_password" class="form-control" required /> </div>
                                                    <input type="hidden" name="id" value="<?= $user["id"] ?>">    
                                                    <div class="margin-top-10">
                                                        <a href="javascript:;" class="btn green"> <button type="submit">Change Password </button> </a>
                                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- END CHANGE PASSWORD TAB -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
</div>    