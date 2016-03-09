<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <!--<li class="sidebar-search">
    
            </li> -->
            <li>
                <a href="<?php echo Redirect::base_url(); ?>admin/home/index"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Candidates<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo Redirect::base_url(); ?>admin/candidates/all">All Candidates</a>
                    </li>
                    <li>
                        <a href="<?php echo Redirect::base_url(); ?>admin/candidates/add">Add Candidates</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-check-square-o fa-fw"></i> Votes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Regional <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="<?php echo Redirect::base_url(); ?>admin/votes/all_reg">All Regional</a>
                            </li>
                            <li>
                                <a href="<?php echo Redirect::base_url(); ?>admin/votes/add_reg">Add Regional</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                    <li>
                        <a href="#">Voter <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="<?php echo Redirect::base_url(); ?>admin/votes/all_voters">All Voter</a>
                            </li>
                            <li>
                                <a href="<?php echo Redirect::base_url(); ?>admin/votes/add_voter">Add Voter</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="<?php echo Redirect::base_url(); ?>admin/cards/all"><i class="fa fa-credit-card fa-fw"></i> Evo Cards</a>
            </li>
            <li>
                <a href="<?php echo Redirect::base_url(); ?>admin/config/index"><i class="fa fa-wrench fa-fw"></i> Configuration</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
