<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav pos-relative">
                <!-- para activar una opcion agregar: class="active"-->
                <li>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMaster" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            MASTERS
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMaster">                            
                            <li><a href="<?php echo base_url('/supplier') ?>">Suppliers</a></li>
                            <li><a href="<?php echo base_url('/user') ?>">Users</a></li>
                            <li><a href="<?php echo base_url('/buyer') ?>">Buyers</a></li>
                            <li><a href="<?php echo base_url('/product') ?>">Products</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">LOGBOOK</a></li>
                <li><a href="#">CREDIT LINES</a></li>

                <li><a href="#">REPORTS</a></li>
                <li><a href="<?php echo base_url('/allocation') ?>">ALLOCATIONS</a></li>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownStatistics" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            STATISTICS
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownStatistics">
                            <li><a href="<?php echo base_url('/user') ?>">Allocations Total Income</a></li>
                            <li><a href="#">Allocations Accumulated Income</a></li>
                            <li><a href="#">Percentages Between Years</a></li>
                            <li><a href="#">Annual Comparison In Percentages</a></li>
                        </ul>
                    </div>
                </li>
                <li class="lst-user">
                    <span class="glyphicon glyphicon-user"></span>
                    <p>admin</p>
                </li>
                <li class="pos-absolute"><a class="btn btn-danger bsalir" href="<?php echo base_url('/panel/salir') ?>"><span class="glyphicon glyphicon-log-out"></span></a></li>
            </ul>
        </div>
    </div>
</nav>