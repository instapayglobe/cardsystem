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
                <!-- <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Course Contents</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Courses </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="?pid=5&action=addcourse" class="sidebar-link"><span class="hide-menu"> Add Courses
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=5&action=viewcourse" class="sidebar-link"><span class="hide-menu"> View Courses
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=5&action=newsubject" class="sidebar-link"><span class="hide-menu"> Add Subject to Course
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=5&action=viewsubject" class="sidebar-link"><span class="hide-menu"> View Subject(s) of Course
                                </span></a>
                        </li>
                    </ul>
                </li>
                 <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="icon-book-open"></i><span class="hide-menu">Marks System </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="?pid=1&action=addmarks" class="sidebar-link"><span class="hide-menu"> Add Marks
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=1&action=viewmarks" class="sidebar-link"><span class="hide-menu"> View Marks
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=1&action=updatemarks" class="sidebar-link"><span class="hide-menu"> Add/Edit Marks
                                </span></a>
                        </li>
                    </ul>
                </li> 
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="icon-arrow-down-circle"></i><span class="hide-menu">Downloads </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="?pid=4&action=certificate" class="sidebar-link"><span class="hide-menu"> Certificate
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=4&action=marksheet" class="sidebar-link"><span class="hide-menu"> Marksheet
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=4&action=Syllabus" class="sidebar-link"><span class="hide-menu"> Syllabus
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=4&action=affliation" class="sidebar-link"><span class="hide-menu"> Affiliation Letter
                                </span></a>
                        </li>
                    </ul>
                </li>-->
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Client Controls</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class=" icon-user-following"></i><span class="hide-menu">Clients </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="?pid=2&action=viewclient" class="sidebar-link"><span class="hide-menu"> View Client(s)
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=2&action=approveclient" class="sidebar-link"><span class="hide-menu"> Approve Client(s)
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=2&action=assignpermission" class="sidebar-link"><span class="hide-menu"> Permission Of Client
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class=" icon-wallet"></i><span class="hide-menu">Payments </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="?pid=6&action=transactions" class="sidebar-link"><span class="hide-menu"> Transaction
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=6&action=viewwallets" class="sidebar-link"><span class="hide-menu"> View Wallet(s)
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=6&action=approve" class="sidebar-link"><span class="hide-menu"> Approve Payment(s)
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=6&action=direct" class="sidebar-link"><span class="hide-menu"> Direct Payment(s)
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class=" icon-wallet"></i><span class="hide-menu">Cards </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="?pid=5&action=viewcourse" class="sidebar-link"><span class="hide-menu"> Approve Card(s)
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=5&action=viewsubject" class="sidebar-link"><span class="hide-menu">View card(s)
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="?pid=5&action=direct" class="sidebar-link"><span class="hide-menu"> Redemmed Card(s)
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Miscellaneous</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="feather" class="feather-icon"></i><span class="hide-menu">Rotating Line
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="?pid=7&action=addTagline" class="sidebar-link"><span class="hide-menu"> New Tickets </span></a></li>

                        <li class="sidebar-item"><a href="?pid=7&action=viewTagline" class="sidebar-link"><span class="hide-menu"> View/Reply Tickets </span></a></li>
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