<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="<?php echo base_url(); ?>assets/images/icon/logo.png" alt="ZIM" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="<?php echo base_url(); ?>dashboard" <?php if($module=='dashboard'){ echo "style='color: #4272d7;'";} ?>>
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <?php if($access=='2'||$access=='1') {?>
                <li class="has-sub">
                    <?php if($module=='product'||$module=='category') {?>
                    <a class="js-arrow open" href="#">
                        <i class="fas fa-warehouse"></i>Inventory</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="display: block;">
                        <?php } else {?>
                        <a class="js-arrow" href="#">
                            <i class="fas fa-warehouse"></i>Inventory</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <?php } ?>

                        <li>
                            <a href="<?php echo base_url(); ?>product" <?php if($module=='product'){ echo "style='color: #4272d7;'";} ?>>Items</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>category" <?php if($module=='category'){ echo "style='color: #4272d7;'";} ?>>Categories</a>
                        </li>

                    </ul>
                </li>
                <?php }?>
                <li>
                    <a href="<?php echo base_url(); ?>input" <?php if($module=='input'){ echo "style='color: #4272d7;'";} ?>>
                        <i class="fas fa-shopping-cart"></i>Purchases</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>output"  <?php if($module=='output'){ echo "style='color: #4272d7;'";} ?>>
                        <i class="fas fa-barcode"></i>Orders</a>
                </li>
                <?php if($access=='2'||$access=='1') {?>
                    <li class="has-sub">
                        <?php if($module=='project'||$module=='production') {?>
                        <a class="js-arrow open" href="#">
                            <i class="fas fa-warehouse"></i>Products</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="display: block;">
                        <?php } else {?>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-warehouse"></i>Products</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <?php } ?>

                            <li>
                                <a href="<?php echo base_url(); ?>project" <?php if($module=='project'){ echo "style='color: #4272d7;'";} ?>>Projects</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>production" <?php if($module=='production'){ echo "style='color: #4272d7;'";} ?>>Production</a>
                            </li>

                        </ul>
                    </li>
                <li>
                    <a href="<?php echo base_url(); ?>template"  <?php if($module=='template'){ echo "style='color: #4272d7;'";} ?>>
                        <i class="far fa-check-square"></i>Template</a>
                </li>
                <?php }
                if ($access=='1'){
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>user"  <?php if($module=='user'){ echo "style='color: #4272d7;'";} ?>>
                        <i class="far fa-user"></i>Users</a>
                </li>
                <?php }?>
                <!--li>
                    <a href="<?php echo base_url(); ?>report"  <?php if($module=='report'){ echo "style='color: #4272d7;'";} ?>>
                        <i class="fas fa-calendar-alt"></i>Reports</a>
                </li-->

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->