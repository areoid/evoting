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
                                <th>Name</th>
                                <th>QR Code</th>
                                <th>Evo Card</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            <?php foreach ($_data['cards']->results() as $res) : ?>
                            <tr>
                                <td><?php echo $x++; ?></td>
                                <td><?php echo $res->name; ?></td>
                                <td><img src="../../assets/admin/imagesqr/<?php echo $res->name; ?>.png"></td>
                                <td><img src="../../assets/admin/qrcard/<?php echo $res->name; ?>.png"></td>
                                <td>
                                    <a href="../../assets/admin/qrcard/<?php echo $res->name; ?>.png" download="<?php echo $res->name; ?>.png" type="button" class="btn btn-default" id="download" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download fa-fw"></i></a>            
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


    <!-- Addregional JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/uploadcan.js"></script>
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/allcandidates.js"></script> 