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
                                <span class="caption-subject bold uppercase">Ipros</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn sbold green" data-toggle="modal" href="#add_pro_modal"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="ipro_table">
                                <thead>
                                    <tr>             
                                        <th> No </th>               
                                        <th> Ipro Name </th>
                                        <th> Ipro Ip </th>
                                        <th> Ipro Port </th>
                                        <th> Ipro Unit </th>
                                        <th> Ipro Sensors </th>
                                        <th> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($ipros) > 0): ?>
                                        <?php foreach($ipros as $key => $value): ?>
                                            <tr class="odd gradeX" data-id="<?= $value['id'] ?>">
                                                <td> <?= $key+1 ?> </td>
                                                <td> <?= $value['ipro_name'] ?> </td>
                                                <td> <?= $value['ipro_ip'] ?> </td>
                                                <td> <?= $value['ipro_port'] ?> </td>
                                                <td> <?= $value['ipro_unit'] ?> </td>
                                                <td> <?= $value['ipro_sensors'] ?> </td>
                                                <td>
                                                    <button class="btn btn-primary mt-sweetalert btn_reset" 
                                                        data-title="Do you want to Edit the Ipro?" 
                                                        data-type="warning" 
                                                        data-allow-outside-click="true" 
                                                        data-show-confirm-button="true"
                                                        data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text='No' data-confirm-button-text='Yes' data-confirm-button-class="btn-info">Edit </button>
                                                    <button class="btn btn-danger mt-sweetalert btn_remove" 
                                                        data-title="Do you want to remove this Ipro?" 
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

    <div id="add_pro_modal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="javascript:;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">New Ipro</h4>
                    </div>
                    <div class="modal-body">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                            <div class="scroller" style="overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                                <div class="row">
                                    <div class="col-md-12">      
                                        <div class="alert alert-danger" role="alert" style="display:none" id="error_msg">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <span class="sr-only">Error:</span>
                                            Ipro already exists
                                        </div>                        
                                        <div class="form-group">
                                            <label>Ipro Name</label>
                                            <input type="text" name="ipro_name" class="form-control" placeholder="Ipro Name" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Ipro IP</label>
                                            <input type="text" name="ipro_ip" class="form-control" placeholder="166.253.148.213" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Ipro Port</label>
                                            <input type="text" name="ipro_port" class="form-control" placeholder="12345" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Ipro Unit</label>
                                            <input type="text" name="ipro_unit" class="form-control" placeholder="123" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Ipro sensors</label>
                                            <input type="text" name="ipro_sensors" class="form-control" placeholder="101, 102, 105" required />
                                        </div>                    
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        <button type="submit" class="btn green" id="add_pro">Add a Pro</button>                        
                    </div>   
                </form>         
            </div>
        </div>
    </div>

    <div id="edit_pro_modal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="javascript:;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit Ipro</h4>
                    </div>
                    <div class="modal-body">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                            <div class="scroller" style="overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                                <div class="row">
                                    <div class="col-md-12">      
                                        <div class="alert alert-danger" role="alert" style="display:none" id="error_msg">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <span class="sr-only">Error:</span>
                                            Ipro already exists
                                        </div>                        
                                        <div class="form-group">
                                            <label>Ipro Name</label>
                                            <input type="text" name="ipro_name" class="form-control" placeholder="Ipro Name" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Ipro IP</label>
                                            <input type="text" name="ipro_ip" class="form-control" placeholder="166.253.148.213" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Ipro Port</label>
                                            <input type="text" name="ipro_port" class="form-control" placeholder="12345" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Ipro Unit</label>
                                            <input type="text" name="ipro_unit" class="form-control" placeholder="123" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Ipro sensors</label>
                                            <input type="text" name="ipro_sensors" class="form-control" placeholder="101, 102, 105" required />
                                        </div>   
                                        <input type="hidden" name="id" class="form-control" />                 
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        <button type="submit" class="btn green" id="add_pro">Edit Pro</button>                        
                    </div>   
                </form>         
            </div>
        </div>
    </div>
 
    <!-- END QUICK SIDEBAR -->
</div>
