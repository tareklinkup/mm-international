<style>
.module_title {
    background-color: #00BE67 !important;
    text-align: center;
    font-size: 18px !important;
    font-weight: bold;
    font-style: italic;
    color: #fff !important;
}

.module_title span {
    font-size: 18px !important;
}
</style>

<?php
// print_r($this->session->userdata()); die();
$userID =  $this->session->userdata('userId');
$CheckSuperAdmin = $this->db->where('UserType', 'm')->where('User_SlNo', $userID)->get('tbl_user')->row();

$CheckAdmin = $this->db->where('UserType', 'a')->where('User_SlNo', $userID)->get('tbl_user')->row();

$userAccessQuery = $this->db->where('user_id', $userID)->get('tbl_user_access');
$access = [];
if ($userAccessQuery->num_rows() != 0) {
	$userAccess = $userAccessQuery->row();
	$access = json_decode($userAccess->access);
}

$module = $this->session->userdata('module');
if ($module == 'dashboard' or $module == '') {
?>
<ul class="nav nav-list">
    <li class="active">
        <!-- module/dashboard -->
        <a href="<?php echo base_url(); ?>">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>
        <b class="arrow"></b>
    </li>

    <!-- <li class="">
			<a href="<?php echo base_url(); ?>module/SalesModule">
				<i class="menu-icon fa fa-usd"></i>
				<span class="menu-text"> Sales Module </span>
			</a>
			<b class="arrow"></b>
		</li> -->

    <!-- <li class="">
			<a href="<?php echo base_url(); ?>module/PurchaseModule">
				<i class="menu-icon fa fa-cart-plus"></i>
				<span class="menu-text"> Purchase Module </span>
			</a>
			<b class="arrow"></b>
		</li> -->

    <!--  -->
    <!-- <li class="">
			<a href="<?php echo base_url(); ?>module/AccountsModule">
				<i class="menu-icon fa fa-clipboard"></i>
				<span class="menu-text"> Accounts Module </span>
			</a>
			<b class="arrow"></b>
		</li> -->

    <!-- module/HRPayroll -->
    <li class="">
        <a href="<?php echo base_url(); ?>module/HRPayroll">
            <i class="menu-icon fa fa-users"></i>
            <span class="menu-text"> HR & Payroll </span>
        </a>
        <b class="arrow"></b>
    </li>

    <!-- module/ReportsModule -->
    <!-- <li class="">
			<a href="<?php echo base_url(); ?>module/ReportsModule">
				<i class="menu-icon fa fa-calendar-check-o"></i>
				<span class="menu-text"> Reports Module </span>
			</a>
			<b class="arrow"></b> -->
    </li>
    <li class="">
        <a href="<?php echo base_url(); ?>module/Vehicle">
            <i class="menu-icon fa fa-car"></i>
            <span class="menu-text">Vehicle Module </span>
        </a>
        <b class="arrow"></b>
    </li>

    <li class="">
        <a href="<?php echo base_url(); ?>module/Administration">
            <i class="menu-icon fa fa-cogs"></i>
            <span class="menu-text"> Administration </span>
        </a>
        <b class="arrow"></b>
    </li>

    <!-- <li class="">
			<a href="<?php echo base_url(); ?>graph">
				<i class="menu-icon fa fa-bar-chart"></i>
				<span class="menu-text"> Business Monitor </span>
			</a>
			<b class="arrow"></b>
		</li> -->
</ul>
<?php } elseif ($module == 'Vehicle') { ?>
<ul class="nav nav-list">
    <li class="active">
        <a href="<?php echo base_url(); ?>module/dashboard">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>
        <b class="arrow"></b>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>module/Vehicle" class="module_title">
            <span>Vehicle Module</span>
        </a>
    </li>

    <?php if (
			array_search("add_vehicle", $access) > -1
			|| array_search("service-entry", $access) > -1
			|| array_search("license-update", $access) > -1
			// || array_search("emplists/deactive", $access) > -1
			// || array_search("salary_payment_report", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-truck"></i>
            <span class="menu-text"> Vehicle Info </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">

            <?php if (array_search("add_vehicle", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>add_vehicle">
                    <i class="menu-icon fa fa-caret-right"></i>
                    <span class="menu-text"> Add Vehicle </span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("general-service-entry", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>general-service-entry">
                    <i class="menu-icon fa fa-caret-right"></i>
                    <span class="menu-text"> G. Service Entry </span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("service-entry", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <!-- <li class="">
							<a href="<?php echo base_url(); ?>service-entry">
								<i class="menu-icon fa fa-caret-right"></i>
								<span class="menu-text"> Service Entry </span>
							</a>
							<b class="arrow"></b>
						</li> -->
            <?php endif; ?>

            <?php if (array_search("license-update", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>license-update">
                    <i class="menu-icon fa fa-caret-right"></i>
                    <span class="menu-text"> License Update </span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

        </ul>
    </li>
    <?php endif; ?>

    <?php if (array_search("add-job-card", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>add-job-card">
            <i class="menu-icon fa fa-plus-square"></i>
            <span class="menu-text">Add Job Card</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>


    <?php if (array_search("requisition_entry", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>requisition_entry">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text"> Requisition Form </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>



    <?php if (array_search("make-purchase-order", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>make-purchase-order">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text">Make Purchase Order </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("direct-purchase", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>direct-purchase">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text">Direct Purchase </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("received-challan-update", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>received-challan-update">
            <i class="menu-icon fa fa-list-ul"></i>
            <span class="menu-text">Rec. Challan Update</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("daily-maintenance", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>daily-maintenance">
            <i class="menu-icon fa fa-list-ul"></i>
            <span class="menu-text">Daily Maintenance</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("add-accidental-record", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>add-accidental-record">
            <i class="menu-icon fa fa-plus-square"></i>
            <span class="menu-text">Add Accidental Rec</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("add-complain-record", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>add-complain-record">
            <i class="menu-icon fa fa-plus-square"></i>
            <span class="menu-text">Add Complain Rec</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("supplier-feedback", $access) > -1
			|| array_search("emplists/active", $access) > -1
			// || array_search("emplists/deactive", $access) > -1
			// || array_search("salary_payment_report", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-flag-checkered"></i>
            <span class="menu-text">Evaluation/Feedback</span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <?php if (array_search("supplier-evaluation", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>supplier-evaluation">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Supplier Evaluation
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("supplier-feedback", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>supplier-feedback">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Supplier Feedback
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("customer-feedback", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>customer-feedback">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Customer Feedback
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

        </ul>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("requisition_record", $access) > -1
			|| array_search("purchase-order-record", $access) > -1
			|| array_search("maintenance-record", $access) > -1
			|| array_search("job-card-record", $access) > -1
			|| array_search("currentStock", $access) > -1
			|| array_search("requisitions", $access) > -1
			|| array_search("washing-schedule", $access) > -1
			|| array_search("accidental-report", $access) > -1
			|| array_search("complain-report", $access) > -1
			|| array_search("sup-evaluation", $access) > -1
			|| array_search("license-report", $access) > -1
			|| array_search("general-service-report", $access) > -1
			|| array_search("driving-history", $access) > -1
			|| array_search("vehicle-list", $access) > -1
			|| array_search("tyre-report", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text"> Report / Record </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">

            <?php if (array_search("requisition_record", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>requisition_record">
                    <i class="menu-icon fa fa-bars"></i>
                    <span class="menu-text"> Requisition Record </span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("purchase-order-record", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>purchase-order-record">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">Pur. Order Record</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("washing-schedule", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>washing-schedule">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">Wash/Service Schudule</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>


            <?php if (array_search("general-service-report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>general-service-report">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">General Service Report</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("tyre-entry-report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>tyre-entry-report">
                    <i class="menu-icon fa fa-bullseye"></i>
                    <span class="menu-text">Tyre Report</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>



            <?php if (array_search("job-card-record", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>job-card-record">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">Job Card Record</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("maintenance-record", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>maintenance-record">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">Maintenance Record</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("accidental-report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>accidental-report">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">Accidental Report</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("complain-report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>complain-report">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">Complain Report</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("sup-evaluation", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>sup-evaluation">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">Supplier Evaluation</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("license-report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>license-report">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">License Report</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("driving-history", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>driving-history">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">Driving History</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("vehicle-list", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>vehicle-list">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">Vehicle List</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("general-service-reminder", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>general-service-reminder">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">General Service Reminder</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("license-expair-reminder", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>license-expair-reminder">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">license Expair Reminder</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("wastage-restore", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>wastage-restore">
                    <i class="menu-icon fa fa-list-ul"></i>
                    <span class="menu-text">Wastage Restore</span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("currentStock", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>currentStock">
                    <i class="menu-icon fa fa-th-list"></i>
                    <span class="menu-text"> Parts Stock </span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("requisitions", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>requisitions">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Requisitions
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

        </ul>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("add-workshop", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text"> Setting </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <?php if (array_search("add-workshop", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>add-workshop">
                    <i class="menu-icon fa fa-arrow-right"></i>
                    <span class="menu-text"> Add Workshop </span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>
</ul>
<?php } elseif ($module == 'Administration') { ?>
<ul class="nav nav-list">
    <li class="active">
        <a href="<?php echo base_url(); ?>module/dashboard">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>
        <b class="arrow"></b>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>module/Administration" class="module_title">
            <span>Administration</span>
        </a>
    </li>

    <?php if (array_search("sms", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <!-- <li class="">
				<a href="<?php echo base_url(); ?>sms">
					<i class="menu-icon fa fa-mobile"></i>
					<span class="menu-text"> Send SMS </span>
				</a>
				<b class="arrow"></b>
			</li> -->
    <?php endif; ?>

    <?php if (
			array_search("product", $access) > -1
			|| array_search("productlist", $access) > -1
			|| array_search("product_ledger", $access) > -1
			|| isset($CheckSuperAdmin)
			|| isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-product-hunt"></i>
            <span class="menu-text"> Parts Info </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">

            <?php if (array_search("product", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>product">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Parts Entry
                </a>

                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("productlist", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>productlist" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Parts List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("product_ledger", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <!-- <li class="">
							<a href="<?php echo base_url(); ?>product_ledger">
								<i class="menu-icon fa fa-caret-right"></i>
								Parts Ledger
							</a>
							<b class="arrow"></b>
						</li> -->
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>
    <?php if (
			array_search("damageEntry", $access) > -1
			|| array_search("damageList", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <!-- <li class="">
				<a href="<?php echo base_url(); ?>" class="dropdown-toggle">
					<i class="menu-icon fa fa-list"></i>
					<span class="menu-text"> Damage Info </span>
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">

					<?php if (array_search("damageEntry", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
						<li class="">
							<a href="<?php echo base_url(); ?>damageEntry">
								<i class="menu-icon fa fa-caret-right"></i>
								Damage Entry
							</a>
							<b class="arrow"></b>
						</li>
					<?php endif; ?>

					<?php if (array_search("damageList", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
						<li class="">
							<a href="<?php echo base_url(); ?>damageList">
								<i class="menu-icon fa fa-caret-right"></i>
								Damage List
							</a>
							<b class="arrow"></b>
						</li>
					<?php endif; ?>

				</ul>
			</li> -->
    <?php endif; ?>

    <?php if (
			array_search("product_transfer", $access) > -1
			|| array_search("transfer_list", $access) > -1
			|| array_search("received_list", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <!-- <li class="">
				<a href="<?php echo base_url(); ?>" class="dropdown-toggle">
					<i class="menu-icon fa fa-exchange"></i>
					<span class="menu-text"> Parts Transfer </span>
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">

					<?php if (array_search("product_transfer", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
						<li class="">
							<a href="<?php echo base_url(); ?>product_transfer">
								<i class="menu-icon fa fa-caret-right"></i>
								Parts Transfer
							</a>
							<b class="arrow"></b>
						</li>
					<?php endif; ?>
					<?php if (array_search("transfer_list", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
						<li class="">
							<a href="<?php echo base_url(); ?>transfer_list">
								<i class="menu-icon fa fa-caret-right"></i>
								Transfer List
							</a>
							<b class="arrow"></b>
						</li>
					<?php endif; ?>

					<?php if (array_search("received_list", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
						<li class="">
							<a href="<?php echo base_url(); ?>received_list">
								<i class="menu-icon fa fa-caret-right"></i>
								<span class="menu-text"> Received List</span>
							</a>
							<b class="arrow"></b>
						</li>
					<?php endif; ?>

				</ul>
			</li> -->
    <?php endif; ?>

    <?php if (
			array_search("customer", $access) > -1
			|| array_search("supplier", $access) > -1
			|| array_search("brunch", $access) > -1
			|| array_search("category", $access) > -1
			|| array_search("unit", $access) > -1
			|| array_search("area", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-cog"></i>
            <span class="menu-text"> Settings </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <?php if (array_search("customer", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <!-- <li class="">
							<a href="<?php echo base_url(); ?>customer">
								<i class="menu-icon fa fa-caret-right"></i>
								Customer Entry
							</a>
							<b class="arrow"></b>
						</li> -->
            <?php endif; ?>

            <?php if (array_search("supplier", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>supplier">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Supplier Entry
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <!-- <?php if (array_search("brunch", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
					<li class="">
						<a href="<?php echo base_url(); ?>brunch">
							<i class="menu-icon fa fa-caret-right"></i>
							Add Branch
						</a>
						<b class="arrow"></b>
					</li>
				<?php endif; ?> -->

            <?php if (array_search("category", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>category">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Category entry
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("unit", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>unit">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Unit Entry
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("area", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>area">
                    <i class="menu-icon fa fa-caret-right"></i>
                    <span class="menu-text"> Add Area </span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>

    <?php if ($this->session->userdata('BRANCHid') == 1 && (isset($CheckSuperAdmin) || isset($CheckAdmin))) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>companyProfile">
            <i class="menu-icon fa fa-bank"></i>
            <span class="menu-text"> Company Profile </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>user">
            <i class="menu-icon fa fa-user-plus"></i>
            <span class="menu-text"> Create User </span>
        </a>
    </li>
    <?php endif; ?>

    <?php if (isset($CheckSuperAdmin) && $this->session->userdata('BRANCHid') == 1) : ?>
    <!-- <li class="">
				<a href="<?php echo base_url(); ?>user_activity">
					<i class="menu-icon fa fa-list"></i>
					<span class="menu-text"> User Activity</span>
				</a>
			</li> -->
    <?php endif; ?>

    <?php if (array_search("database_backup", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <!-- <li class="">
				<a href="<?php echo base_url(); ?>database_backup">
					<i class="menu-icon fa fa-database"></i>
					<span class="menu-text"> Database Backup </span>
				</a>
			</li> -->
    <?php endif; ?>

</ul><!-- /.nav-list -->

<?php } elseif ($module == 'SalesModule') { ?>
<ul class="nav nav-list">

    <li class="active">
        <a href="<?php echo base_url(); ?>module/dashboard">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>

        <b class="arrow"></b>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>module/SalesModule" class="module_title">
            <span> Sale Module </span>
        </a>
    </li>

    <?php if (array_search("sales/product", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>sales/product">
            <i class="menu-icon fa fa-usd"></i>
            <span class="menu-text"> Sales Entry </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>


    <?php if (array_search("sales/service", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>sales/service">
            <i class="menu-icon fa fa-usd"></i>
            <span class="menu-text"> Service Entry </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("salesReturn", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>salesReturn">
            <i class="menu-icon fa fa-rotate-left"></i>
            <span class="menu-text"> Sale Return </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("salesrecord", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>salesrecord">
            <i class="menu-icon fa fa-list"></i>
            <span class="menu-text"> Sales Record </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("currentStock", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>currentStock">
            <i class="menu-icon fa fa-th-list"></i>
            <span class="menu-text"> Stock </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>
    <?php if (array_search("quotation", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>quotation">
            <i class="menu-icon fa fa-plus-square"></i>
            <span class="menu-text"> Quotation Entry </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("salesinvoice", $access) > -1
			|| array_search("returnList", $access) > -1
			|| array_search("sale_return_details", $access) > -1
			|| array_search("customerDue", $access) > -1
			|| array_search("customerPaymentReport", $access) > -1
			|| array_search("customer_payment_history", $access) > -1
			|| array_search("customerlist", $access) > -1
			|| array_search("productwiseSales", $access) > -1
			|| array_search("customerwiseSales", $access) > -1
			|| array_search("invoiceProductDetails", $access) > -1
			|| array_search("price_list", $access) > -1
			|| array_search("quotation_invoice_report", $access) > -1
			|| array_search("quotation_record", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text"> Report </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <?php if (array_search("salesinvoice", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>salesinvoice">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Sales Invoice
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("returnList", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>returnList">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Sale return list
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("sale_return_details", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>sale_return_details">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Sale return Details
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("customerDue", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>customerDue">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Customer Due List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("customerPaymentReport", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>customerPaymentReport">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Customer Payment Report
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("customer_payment_history", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>customer_payment_history">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Customer Payment History
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("customerlist", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>customerlist">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Customer List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("price_list", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>price_list">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Product Price List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("quotation_invoice_report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>quotation_invoice_report">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Quotation Invoice
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("quotation_record", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>quotation_record">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Quotation Record
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>


        </ul>
    </li>
    <?php endif; ?>

</ul><!-- /.nav-list -->

<?php } elseif ($module == 'PurchaseModule') { ?>
<ul class="nav nav-list">
    <li class="active">
        <a href="<?php echo base_url(); ?>module/dashboard">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>

        <b class="arrow"></b>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>module/PurchaseModule" class="module_title">
            <span> Purchase Module </span>
        </a>
    </li>

    <?php if (array_search("purchase", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>purchase">
            <i class="menu-icon fa fa-shopping-cart"></i>
            <span class="menu-text"> Purchase Entry </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("purchaseReturns", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>purchaseReturns">
            <i class="menu-icon fa fa-rotate-right"></i>
            <span class="menu-text"> Purchase Return </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("purchaseRecord", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>purchaseRecord">
            <i class="menu-icon fa fa-list"></i>
            <span class="menu-text">Purchase Record</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("AssetsEntry", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>AssetsEntry">
            <i class="menu-icon fa fa-shopping-cart"></i>
            <span class="menu-text"> Assets Entry </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("purchaseInvoice", $access) > -1
			|| array_search("supplierDue", $access) > -1
			|| array_search("supplierPaymentReport", $access) > -1
			|| array_search("supplierList", $access) > -1
			|| array_search("returnsList", $access) > -1
			|| array_search("purchase_return_details", $access) > -1
			|| array_search("reorder_list", $access) > -1
			|| array_search("assets_report", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text"> Report </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">

            <?php if (array_search("assets_report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>assets_report">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Assets Report
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("purchaseInvoice", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>purchaseInvoice">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Purchase Invoice
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>



            <?php if (array_search("supplierDue", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>supplierDue">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Supplier Due Report
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("supplierPaymentReport", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>supplierPaymentReport">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Supplier Payment Report
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("supplierList", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>supplierList" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    <span class="menu-text"> Supplier List </span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("returnsList", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>returnsList">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Purchase Return List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("purchase_return_details", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>purchase_return_details">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Purchase Return Details
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("reorder_list", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>reorder_list">
                    <i class="menu-icon fa fa-caret-right"></i>
                    <span class="menu-text"> Re-Order List </span>
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

        </ul>
    </li>
    <?php endif; ?>
</ul><!-- /.nav-list -->

<?php } elseif ($module == 'AccountsModule') { ?>
<ul class="nav nav-list">
    <li class="active">
        <a href="<?php echo base_url(); ?>module/dashboard">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>

        <b class="arrow"></b>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>module/AccountsModule" class="module_title">
            <span> Account Module </span>
        </a>
    </li>

    <?php if (array_search("cashTransaction", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>cashTransaction">
            <i class="menu-icon fa fa-medkit"></i>
            <span class="menu-text"> Cash Transaction </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("bank_transactions", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li>
        <a href="<?php echo base_url(); ?>bank_transactions">
            <i class="menu-icon fa fa-dollar"></i>
            <span class="menu-text"> Bank Transactions </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("customerPaymentPage", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>customerPaymentPage">
            <i class="menu-icon fa fa-money"></i>
            <span class="menu-text"> Customer Payment </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("supplierPayment", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>supplierPayment">
            <i class="menu-icon fa fa-money"></i>
            <span class="menu-text"> Supplier Payment </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("cash_view", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>cash_view">
            <i class="menu-icon fa fa-money"></i>
            <span class="menu-text">Cash View</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("loan_transactions", $access) > -1
			|| array_search("loan_view", $access) > -1
			|| array_search("loan_transaction_report", $access) > -1
			|| array_search("loan_ledger", $access) > -1
			|| array_search("loan_accounts", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>

    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text"> Loan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <?php if (array_search("loan_transactions", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>loan_transactions">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Loan Transection
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("loan_view", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>loan_view">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Loan View
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("loan_transaction_report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>loan_transaction_report">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Loan Transaction Report
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("loan_ledger", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>loan_ledger">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Loan Ledger
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("loan_accounts", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>loan_accounts">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Loan Account
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("investment_transactions", $access) > -1
			|| array_search("investment_transaction_report", $access) > -1
			|| array_search("investment_view", $access) > -1
			|| array_search("investment_ledger", $access) > -1
			|| array_search("investment_account", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>

    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text"> Investment </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <?php if (array_search("investment_transactions", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>investment_transactions">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Investment Transection
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("investment_view", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>investment_view">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Investment View
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("investment_transaction_report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>investment_transaction_report">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Investment Transaction Report
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("investment_ledger", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>investment_ledger">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Investment Ledger
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("investment_account", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>investment_account">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Investment Account
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("account", $access) > -1
			|| array_search("bank_accounts", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>

    <li>
        <a href="" class="dropdown-toggle">
            <i class="menu-icon fa fa-bank"></i>
            <span class="menu-text"> Account Head </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <?php if (array_search("account", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li>
                <a href="<?php echo base_url(); ?>account">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Transaction Accounts
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>
            <?php if (array_search("bank_accounts", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li>
                <a href="<?php echo base_url(); ?>bank_accounts">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Bank Accounts
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("check/entry", $access) > -1
			|| array_search("check/list", $access) > -1
			|| array_search("check/reminder/list", $access) > -1
			|| array_search("check/pending/list", $access) > -1
			|| array_search("check/dis/list", $access) > -1
			|| array_search("check/paid/list", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>

    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text"> Cheque </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <?php if (array_search("check/entry", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>check/entry">
                    <i class="menu-icon fa fa-caret-right"></i>
                    New Cheque Entry
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("check/list", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>check/list">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Cheque list
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("check/reminder/list", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>check/reminder/list">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Reminder Cheque list
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("check/pending/list", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>check/pending/list">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Pending Cheque list
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("check/dis/list", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>check/dis/list">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Dishonoured Cheque list
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("check/paid/list", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>check/paid/list">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Paid Cheque list
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("TransactionReport", $access) > -1
			|| array_search("bank_transaction_report", $access) > -1
			|| array_search("cash_ledger", $access) > -1
			|| array_search("bank_ledger", $access) > -1
			|| array_search("cashStatment", $access) > -1
			|| array_search("BalanceSheet", $access) > -1
			|| array_search("balance_sheet", $access) > -1
			|| array_search("day_book", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text"> Reports </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <?php if (array_search("TransactionReport", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>TransactionReport">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Cash Transaction Report
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("bank_transaction_report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>bank_transaction_report">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Bank Transaction Report
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("cash_ledger", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>cash_ledger">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Cash Ledger
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("bank_ledger", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>bank_ledger">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Bank Ledger
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("cashStatment", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>cashStatment">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Cash Statement
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("balance_sheet", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>balance_sheet">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Balance Sheet
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("BalanceSheet", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>BalanceSheet">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Balance In Out
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("day_book", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>day_book">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Day Book
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

        </ul>
    </li>
    <?php endif; ?>


</ul><!-- /.nav-list -->
<?php } elseif ($module == 'HRPayroll') { ?>
<ul class="nav nav-list">
    <li class="active">
        <a href="<?php echo base_url(); ?>module/dashboard">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>

        <b class="arrow"></b>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>module/HRPayroll" class="module_title">
            <span>HR & Payroll</span>
        </a>
    </li>

    <?php if (array_search("salary_payment", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <!-- <li class="">
				<a href="<?php echo base_url(); ?>salary_payment">
					<i class="menu-icon fa fa-money"></i>
					<span class="menu-text"> Salary Payment </span>
				</a>
				<b class="arrow"></b>
			</li> -->
    <?php endif; ?>

    <?php if (array_search("employee", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>employee">
            <i class="menu-icon fa fa-users"></i>
            <span class="menu-text"> Add Employee </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("add-driver", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <!-- <li class="">
				<a href="<?php echo base_url(); ?>add-driver">
					<i class="menu-icon fa fa-users"></i>
					<span class="menu-text"> Add Driver/Helper </span>
				</a>
				<b class="arrow"></b>
			</li> -->
    <?php endif; ?>

    <?php if (array_search("designation", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>designation">
            <i class="menu-icon fa fa-binoculars"></i>
            <span class="menu-text"> Add Designation </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("depertment", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>depertment">
            <i class="menu-icon fa fa-plus-square"></i>
            <span class="menu-text"> Add Department </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (array_search("month", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>month">
            <i class="menu-icon fa fa-calendar"></i>
            <span class="menu-text"> Add Month </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php endif; ?>

    <?php if (
			array_search("emplists/all", $access) > -1
			|| array_search("emplists/active", $access) > -1
			|| array_search("emplists/deactive", $access) > -1
			// || array_search("salary_payment_report", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text"> Report </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">

            <?php if (array_search("emplists/all", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>emplists/all">
                    <i class="menu-icon fa fa-caret-right"></i>
                    All Employee List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("emplists/active", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>emplists/active">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Active Employee List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?><?php if (array_search("emplists/deactive", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>emplists/deactive">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Deactive Employee List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("salary_payment_report", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <!-- <li class="">
							<a href="<?php echo base_url(); ?>salary_payment_report">
								<i class="menu-icon fa fa-caret-right"></i>
								Salary Payment Report
							</a>
							<b class="arrow"></b>
						</li> -->
            <?php endif; ?>

        </ul>
    </li>
    <?php endif; ?>

</ul><!-- /.nav-list -->
<?php } elseif ($module == 'ReportsModule') { ?>
<ul class="nav nav-list">
    <?php if (
			array_search("emplists/all", $access) > -1
			|| array_search("emplists/active", $access) > -1
			|| array_search("emplists/deactive", $access) > -1
			|| isset($CheckSuperAdmin) || isset($CheckAdmin)
		) : ?>
    <li class="">
        <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
            <i class="menu-icon fa fa-file"></i>
            <span class="menu-text"> Employee Report </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">

            <?php if (array_search("emplists/all", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>emplists/all">
                    <i class="menu-icon fa fa-caret-right"></i>
                    All Employee List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("emplists/active", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>emplists/active">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Active Employee List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

            <?php if (array_search("emplists/deactive", $access) > -1 || isset($CheckSuperAdmin) || isset($CheckAdmin)) : ?>
            <li class="">
                <a href="<?php echo base_url(); ?>emplists/deactive">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Deactive Employee List
                </a>
                <b class="arrow"></b>
            </li>
            <?php endif; ?>

        </ul>
    </li>
    <?php endif; ?>
</ul><!-- /.nav-list -->
<?php } ?>