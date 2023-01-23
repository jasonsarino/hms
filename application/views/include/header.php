 <script language="javascript">
    setTimeout(function timeru(){$('.alert').fadeOut(1000)}, 3000);
   </script> 
<header class="header" style="background: url('<?php echo base_url()?>public/img/new/header_bar_bg_01.jpg') repeat-x; background-size: 100% 100%; border-bottom:1px solid #CCC">
    <a href="#" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <div class="logo-pms"><img src="<?php echo base_url()?>public/company_logo/<?php echo $companyInfo->logo?>" height="45"></div>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation" style="background: url('<?php echo base_url()?>public/img/new/header_bar_bg_02.jpg') repeat-x; background-size: 100% 100%; border-bottom:1px solid #CCC">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="logo2"> 
                <?php echo $companyInfo->company_name?>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                
               <!-- <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                        <span class="label label-success">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 1 messages</li>
                        <li>
                          
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="../../img/avatar3.png" class="img-circle" alt="User Image"/>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>-->
                
               <!-- <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-warning"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>-->
                
                <!--<li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-tasks"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                           
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>-->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?php echo $userInfo->firstname." ".$userInfo->lastname;?><i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <?php if($userInfo->picture == ""){?>
                    	<img src="<?php echo base_url()?>public/user_picture/no_avatar.gif" class="img-circle" alt="User Image" />
                    <?php }else{?>
                    	<img src="<?php echo base_url()?>public/user_picture/<?php echo $userInfo->picture;?>" class="img-circle" alt="User Image" />
                    <?php }?>
                            <p>
                                <?php echo $userInfo->firstname." ".$userInfo->lastname;?> <br /> <?php echo $userInfo->designation;?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url()?>myprofile" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url()?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>





<script type="text/javascript">
function closeAd(id)
{
    $('#' + id).remove();
}
</script>
