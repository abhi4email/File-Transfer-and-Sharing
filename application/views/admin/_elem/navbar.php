<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="<?php echo $settings['site_url'] ?>admin">
                <img src="../<?php echo $settings['logo_path'] ?>" width="110" height="32" alt="Sharify" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <li class="nav-item">
                <a class="nav-link" href="darkmode?redirect=<?php echo urlencode(current_url()) ?>">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                          <circle cx="12" cy="12" r="4" />
                          <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </span>
                    <span class="nav-link-title">
                        <?php echo (get_cookie('admin_dark_mode') == 'true' ? 'Light' : 'Dark') ?> mode
                    </span>
                </a>
            </li>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm">AD</span>
                    <div class="d-none d-xl-block ps-2">
                        <div>Admin</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="personal" class="dropdown-item">My account</a>
                    <a href="logout" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="uploads">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"></path>
                                   <polyline points="9 15 12 12 15 15"></polyline>
                                   <line x1="12" y1="12" x2="12" y2="21"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Uploads
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="downloads">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                   <polyline points="7 11 12 16 17 11"></polyline>
                                   <line x1="12" y1="4" x2="12" y2="16"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Downloads
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="backgrounds">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <line x1="15" y1="8" x2="15.01" y2="8"></line>
                                   <rect x="4" y="4" width="16" height="16" rx="3"></rect>
                                   <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5"></path>
                                   <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Backgrounds
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <circle cx="9" cy="7" r="4"></circle>
                                   <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                   <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                   <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Users
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-pagekit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                  <path d="M12.077 20h-5.077v-16h11v14h-5.077" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Pages
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="themes">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-palette" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M12 21a9 9 0 1 1 0 -18a9 8 0 0 1 9 8a4.5 4 0 0 1 -4.5 4h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25"></path>
                                   <circle cx="7.5" cy="10.5" r=".5" fill="currentColor"></circle>
                                   <circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle>
                                   <circle cx="16.5" cy="10.5" r=".5" fill="currentColor"></circle>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Themes
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="plugins">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-apps" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                   <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                   <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                   <line x1="14" y1="7" x2="20" y2="7"></line>
                                   <line x1="17" y1="4" x2="17" y2="10"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Plugins
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="system">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-server" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <rect x="3" y="4" width="18" height="8" rx="3"></rect>
                                   <rect x="3" y="12" width="18" height="8" rx="3"></rect>
                                   <line x1="7" y1="8" x2="7" y2="8.01"></line>
                                   <line x1="7" y1="16" x2="7" y2="16.01"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                System
                            </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <circle cx="6" cy="10" r="2"></circle>
                                   <line x1="6" y1="4" x2="6" y2="8"></line>
                                   <line x1="6" y1="12" x2="6" y2="20"></line>
                                   <circle cx="12" cy="16" r="2"></circle>
                                   <line x1="12" y1="4" x2="12" y2="14"></line>
                                   <line x1="12" y1="18" x2="12" y2="20"></line>
                                   <circle cx="18" cy="7" r="2"></circle>
                                   <line x1="18" y1="4" x2="18" y2="5"></line>
                                   <line x1="18" y1="9" x2="18" y2="20"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Settings
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="settings/general" >
                                        General settings
                                    </a>
                                    <a class="dropdown-item" href="settings/upload" >
                                        Upload settings
                                    </a>
                                    <a class="dropdown-item" href="settings/mail" >
                                        Email settings
                                    </a>
                                    <a class="dropdown-item" href="settings/mailtemplates" >
                                        Email templates
                                    </a>
                                    <a class="dropdown-item" href="settings/social" >
                                        Social settings
                                    </a>
                                    <a class="dropdown-item" href="settings/language" >
                                        Language
                                    </a>
                                    <a class="dropdown-item" href="settings/termsabout" >
                                        Terms & About
                                    </a>
                                    <a class="dropdown-item" href="settings/advertising" >
                                        Advertising
                                    </a>
                                    <a class="dropdown-item" href="settings/contact" >
                                        Contact
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <?php
                    $plugin_pages = $this->plugin->_adminpages;
                    if(count($plugin_pages) > 0) {
                        foreach($plugin_pages AS $key => $page) {
                            echo '<li class="nav-item">
                                <a class="nav-link" href="pluginpage/'.$key.'">
                                    <span class="nav-link-title">
                                        '.$page['title'].'
                                    </span>
                                </a>
                            </li>';
                        }
                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    var current_path = window.location.href.replace('<?php echo $settings['site_url'] . 'admin/' ?>', '');
    $('a.nav-link[href="'+current_path+'"]').addClass('active');
</script>

<div class="page-main">