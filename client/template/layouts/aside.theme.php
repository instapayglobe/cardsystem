<script>
    $(document).ready(function() {
        var url = window.location;
        var element = $('ul li a').filter(function() {
            return this.href == url || url.href.indexOf(this.href) == 0;
        }).addClass('active');
        if (element.is('li a')) {
            element.parent().parent().parent('li').addClass('active menu-open');
            element.parent().parent().siblings('a').addClass('active');
        }
        //   $('ul li a').filter(function() {
        //   return this.href == url || url.href.indexOf(this.href) == 0; }).parent().parent().parent('li').addClass("menu-open");
    });
</script>
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="?pid=0" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Card's Section</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Card </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <?php if (in_array('p_1', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=1&action=addstudent" class="sidebar-link"><span class="hide-menu"> Generate Request
                                    </span></a>
                            </li>
                        <?php }
                        if (in_array('p_3', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=1&action=editstudent" class="sidebar-link"><span class="hide-menu"> View Cards
                                    </span></a>
                            </li>
                        <?php }
                        if (in_array('p_2', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=1&action=viewstudent" class="sidebar-link"><span class="hide-menu"> View Redeemed Card
                                    </span></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <!-- <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Downloads </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <?php if (in_array('p_10', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=4&action=admission_form" class="sidebar-link"><span class="hide-menu"> Admission Form
                                    </span></a>
                            </li>
                        <?php }
                        if (in_array('p_11', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=4&action=identity_card" class="sidebar-link"><span class="hide-menu"> Identity Card
                                    </span></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li> -->
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Payment Sections</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Wallets </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <?php if (in_array('p_7', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=3&action=addmoney" class="sidebar-link"><span class="hide-menu"> Add Money
                                    </span></a>
                            </li>
                        <?php }
                        if (in_array('p_8', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=3&action=viewwallet" class="sidebar-link"><span class="hide-menu"> Wallet
                                    </span></a>
                            </li>
                        <?php }
                        if (in_array('p_9', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=3&action=viewInline" class="sidebar-link"><span class="hide-menu"> Pending Payments
                                    </span></a>
                            </li>
                        <?php }  if (in_array('p_12', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=3&action=paymentPage" class="sidebar-link"><span class="hide-menu"> Payment Pages
                                    </span></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Transactions </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <?php if (in_array('p_7', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=2&action=viewstudent" class="sidebar-link"><span class="hide-menu"> Expired Cards
                                    </span></a>
                            </li>
                        <?php }
                        if (in_array('p_8', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="?pid=2&action=viewpassbook" class="sidebar-link"><span class="hide-menu"> Passbook
                                    </span></a>
                            </li>
                        <?php }
                        if (in_array('p_9', $permission_arr)) { ?>
                            <li class="sidebar-item"><a href="#" class="sidebar-link"><span class="hide-menu"> Create Issue
                                    </span></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->