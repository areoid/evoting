<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div id="ale" class="alert alert-success alert-dismissible" role="alert">
            <strong>INFO : </strong> Voter has been <message></message> 
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Voters</h3>
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
                                <th>Regional</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            <?php foreach ($_data['allvoters']->results() as $res) : ?>
                            <tr>
                                <td><?php echo $x++; ?></td>
                                <td><?php echo $res->name; ?></td>
                                <td><?php echo $res->address; ?></td>
                                <td><?php echo $res->place. ", ".$res->birth_day; ?></td>
                                <td><?php echo $res->regionalname; ?></td>
                                <td>
                                    <button type="button" onclick="view(<?php echo $res->id_voter; ?>)" class="btn btn-default" id="view" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye fa-fw"></i></button>
                                    <button type="button" onclick="edit(<?php echo $res->id_voter; ?>)" class="btn btn-default" id="edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit fa-fw"></i></button>
                                    <button type="button" onclick="del(<?php echo $res->id_voter; ?>)" class="btn btn-default" id="delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-remove fa-fw"></i></button>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">View regional</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div id="showphoto" class="row">
                            <div class="col-lg-4">
                            
                            </div>
                            <div class="col-lg-4">
                                <div class="thumbnail">
                                    <img id="v_photo" src="" />
                                </div>
                            </div>
                            <div class="col-lg-4">

                            </div>
                        </div>
                        <div id="showcard" style="margin: auto; max-width: 520px;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="frame">
                                        <div id="inline">
                                            <div id="boxqr">
                                                <img id="v_qrcode" src="" width="100%">
                                            </div>
                                            <div id="descqr">
                                                <h4 align="center">
                                                    <b>EVO CARD</b>
                                                </h4>
                                                <h5 align="center">
                                                    <b>PEMILU KADES 2012</b>
                                                </h5>                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <td>Date of birth</td>
                                <td id="v_data_of_birth"></td>
                            </tr>
                            <tr>
                                <td>Religion</td>
                                <td id="v_religion"></td>
                            </tr>
                            <tr>
                                <td>Regional</td>
                                <td id="v_regname"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <button id="btnshowcard" type="button" class="btn btn-primary">
                                        <i id="icbtnshow fa-fw" class="fa fa-share"></i>Show Evo Card
                                    </button>
                                </td>
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
                        <div class="row">
                            <div class="col-lg-4">
                            </div>
                            <div class="col-lg-4">
                                <div id="uploadBox" class="thumbnail">
                                    <img id="imgvoter" src="">
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
                        <table class="table table-hover">
                            <tr>
                                <td>Name</td>
                                <td><input id="e_name" type="text" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input id="e_address" type="text" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Date of birth</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input id="e_place" type="text" class="form-control"/>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="e_date" type="text" class="form-control"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Religion</td>
                                <td><input id="e_religion" type="text" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Regional</td>
                                <td>
                                    <select id="e_regional" class="form-control">
                                    </select>
                                </td>
                            </tr>
                            <input id="e_id" type="hidden">
                            <input id="pathpic" type="hidden">
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
                            Are you sure want to delete <b><i style="size:20px;" id="d_name"></i></b> ?
                        </p>                            
                        <input id="d_id" type="hidden" class="form-control" />
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
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/allvoters.js"></script>
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/uploadvot.js"></script>