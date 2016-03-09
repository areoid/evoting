<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <button class="btn btn-default" id="edit">Edit Configuration</button>
        <br />
        <br />
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Configuration</h3>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Item</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            <?php foreach ($_data['config']->results() as $res) : ?>
                            <tr>
                                <td><?php echo $x++; ?></td>
                                <td><?php echo $res->name; ?></td>
                                <td><?php echo $res->value; ?></td>
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

<!-- Modal Edit -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit configuration</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Evo Name</td>
                                <td><input id="e_evo_name" type="text" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Evo Card Name</td>
                                <td><input id="e_evo_card_name" type="text" class="form-control"/></td>
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
    
    <!-- Addregional JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/config.js"></script>