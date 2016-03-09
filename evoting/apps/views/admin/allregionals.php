<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div id="ale" class="alert alert-success alert-dismissible" role="alert">
            <strong>INFO : </strong> Candidate has been <message></message> 
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Regionals</h3>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Regional Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            <?php foreach ($_data['allreg']->results() as $res) : ?>
                            <tr>
                                <td><?php echo $x++; ?></td>
                                <td><?php echo $res->regionalname; ?></td>
                                <td><?php echo $res->description; ?></td>
                                <td>
                                    <button id="view" onclick="view(<?php echo $res->id_regional; ?>)" type="button" class="btn btn-default" id="view" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye fa-fw"></i></button>
                                	<button id="edit" onclick="edit(<?php echo $res->id_regional; ?>)" type="button" class="btn btn-default" id="edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit fa-fw"></i></button>
                                	<button id="delete" onclick="del(<?php echo $res->id_regional; ?>)" type="button" class="btn btn-default" id="delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-remove fa-fw"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                            
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- Modal View -->
<div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">View regional</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <tr>
                                <td><strong>Regional Name</strong></td>
                                <td id="v_regname"></td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td id="v_description"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit regional</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Regional Name</td>
                                <td><input id="e_regname" type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><input id="e_description" type="text" class="form-control" ></td>
                            </tr>
                            <input id="e_id" type="hidden" class="form-control" >
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="b_edit" type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete regional</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-danger">
                    <div class="panel-body">
                        <p>
                            Are you sure want to delete <b><i style="size:20px;" id="d_regname"></i></b> regional ?
                        </p>                            
                        <input id="d_id" type="hidden" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="b_delete" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
    
    <!-- Addregional JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/allregionals.js"></script>