<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li class="mt">
                <a href="index">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                </a>
                <ul class="sub">
                    <li><a href="settings/general">General settings</a></li>
                    <li><a href="settings/mail">Email settings</a></li>
                    <li><a href="settings/mailtemplates">Email templates</a></li>
                    <li><a href="settings/contact">Contact form</a></li>
                    <li><a href="settings/social">Social settings</a></li>
                    <li><a href="settings/language">Language settings</a></li>
                    <li><a href="settings/termsabout">Terms &amp; About</a></li>
                    <li><a href="settings/advertising">Advertising</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="backgrounds">
                    <i class="fa fa-image"></i>
                    <span>Backgrounds</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="uploads">
                    <i class="fa fa-cloud-upload"></i>
                    <span>Uploads</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="downloads">
                    <i class="fa fa-cloud-download"></i>
                    <span>Downloads</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="users">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="themes">
                    <i class="fa fa-binoculars"></i>
                    <span>Themes <span class="badge badge-success">New!</span></span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="plugins">
                    <i class="fa fa-cubes"></i>
                    <span>Plugins</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="system">
                    <i class="fa fa-server"></i>
                    <span>System <?php echo (!$this->adminlib->isUpToDate() ? '<span style="color: orange;">&nbsp;&nbsp;&nbsp;( <i class="fa fa-exclamation-circle"></i>Update )</span>' : '') ?></span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="logs">
                    <i class="fa fa-server"></i>
                    <span>System log</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="personal">
                    <i class="fa fa-user"></i>
                    <span>My details</span>
                </a>
            </li>

            <?php
            $plugin_pages = $this->plugin->_adminpages;
            if(count($plugin_pages) > 0) {
                foreach($plugin_pages AS $key => $page) {
                    echo '<li class="sub-menu">
                            <a href="pluginpage/'.$key.'">
                                <i class="fa fa-cogs"></i>
                                <span>'.$page['title'].'</span>
                            </a>
                        </li>';
                }
            }

            ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->