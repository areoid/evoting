<!-- /.row -->
<div class="row content">
    <div class="col-lg-12">
        <div id="ale" class="alert alert-success alert-dismissible" role="alert">
            <strong>INFO : </strong> Candidate has been <message></message> 
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Candidates</h3>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Date of birth</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- fetching all data from table -->
                            <?php $x = 1; ?>
                            <?php foreach ($_data['allcan']->results() as $res) : ?>
                            <tr>
                                <td><?php echo $x++; ?></td>
                                <td><?php echo $res->name; ?></td>
                                <td><?php echo $res->address; ?></td>
                                <td><?php echo $res->place. ", ".$res->birth_day; ?></td>
                                <td>
                                    <button onclick="view(<?php echo $res->id_candidate; ?>)" type="button" class="btn btn-default" id="view" data-toggle="tooltip" data-placement="top" title="View" data-target="#myModal"><i class="fa fa-eye fa-fw"></i></button>
                                    <button onclick="edit(<?php echo $res->id_candidate; ?>)" type="button" class="btn btn-default" id="edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit fa-fw"></i></button>
                                    <button onclick="del(<?php echo $res->id_candidate; ?>)" type="button" class="btn btn-default" id="delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-remove fa-fw"></i></button>
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

<!-- /Modal View -->

<!-- Modal View -->
<div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">View detail candidate</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                            
                            </div>
                            <div class="col-lg-4">
                                <div class="thumbnail">
                                    <img id="v_photo" src="" alt="test" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                        
                            </div>
                        </div>
                        <table class="table">
                            <tr>
                                <td>Name</td>
                                <td id="v_name"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td id="v_address"></td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td id="v_date_of_birth"></td>
                            </tr>
                            <tr>
                                <td>Achievement</td>
                                <td id="v_achievement"></td>
                            </tr>
                            <tr>
                                <td>Politic Party</td>
                                <td id="v_partai"></td>
                            </tr>
                            <tr>
                                <td>Biography</td>
                                <td id="v_biography"></td>
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
                <h4 class="modal-title" id="myModalLabel">Edit detail candidate</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                            </div>
                            <div class="col-lg-4">
                                <div id="uploadBox" class="thumbnail">
                                    <img id="imgcandidate" src="">
                                </div>
                                <section id="uploadStatus">
                                    <div id="progressWrapper">
                                    <div id="progressBar"></div>
                                    <div id="progressValue">0%
                                    </div></div>
                                </section>
                            </div>
                            <div class="col-lg-4">
                            </div>
                        </div>
                        <table class="table">
                            <tr>
                                <td>Name</td>
                                <td><input id="e_name" class="form-control" type="text" name="name" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input id="e_address" class="form-control" type="text" name="address" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input id="e_place" class="form-control" type="text" name="place" autocomplete="off">           
                                        </div>
                                        <div class="col-md-6">
                                            <input id="e_date" class="form-control" type="text" name="date" autocomplete="off">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Politic Party</td>
                                <td><input id="e_partai" class="form-control" type="text" name="partai" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Achievement</td>
                                <td><input id="e_achievement" class="form-control" type="text" name="achievement" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Biography</td>
                                <td><textarea id="e_biografi" class="form-control" name="biografi" ></textarea></td>
                            </tr>
                            <input id="e_id" type="hidden" class="form-control">
                            <input id="pathpic" type="hidden" class="form-control">
                        </table>
                        <span class="text-danger">* Drag and drop on the picture for change that picture</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="b_close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="b_edit" type="button" class="btn btn-primary" >Save Changes</button>
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
                <h4 class="modal-title" id="myModalLabel">Delete candidate</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-danger">
                    <div class="panel-body">
                        <p>
                            Are you sure want to delete <b><i style="size:20px;" id="d_name"></i></b> as candidate ?
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="btndelete" type="button" class="btn btn-danger" >Delete</button>
            </div>
        </div>
    </div>
</div>


    <!-- Addregional JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/uploadcan.js"></script>
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/allcandidates.js"></script> 