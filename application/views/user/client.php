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
                                <span class="caption-subject bold uppercase"> Clients </span>
                            </div>
                        </div>
                        <div class="portlet-body">                           
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="client_table">
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
                                                    <?php if($value['technician_id']): ?>
                                                    <button class="btn btn-danger mt-sweetalert btn_unfollow">        unFollow </button> 
                                                    <?php else: ?>                      
                                                    <button class="btn btn-primary mt-sweetalert btn_follow">        Follow </button> 
                                                    <?php endif; ?>    
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

</div>
