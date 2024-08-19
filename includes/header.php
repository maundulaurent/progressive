<header class="header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg header-nav p-0">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="index.html" class="navbar-brand logo">
                    <img src="/projects/quotations/assets/img/logo.svg" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="index.html" class="menu-logo">
                        <img src="/projects/quotations/assets/img/logo.svg" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="active">
                        <a href="/projects/quotations/">Home </a>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0);">For Buyers <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="/projects/quotations/buyer/post-quotation">Post a Quotation</a></li>                                         
                            <li><a href="/projects/quotations/buyer/ongoing">Quotations and Proposals</a></li>              
                            <li><a href="/projects/quotations/buyer/confirm-delivery.php">Confirm Delivery</a></li>                        
                            <li><a href="/projects/quotations/buyer/profile-settings">Profile Settings</a></li>                                
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0);">For Sellers <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="/projects/quotations/seller/all-projects">All Projects</a></li>
                            <li><a href="/projects/quotations/seller/dashboard">Dashboard</a></li>
                            <li><a href="/projects/quotations/seller/approved-quotes">Approved Quotes</a></li>
                            <li><a href="/projects/quotations/seller/profile">My Profile</a></li>
                            <li><a href="/projects/quotations/seller/change-password">Change Password</a></li>
                            <li><a href="/projects/quotations/seller/payments">Payments</a></li>                
                            <li><a href="/projects/quotations/seller/profile-settings">Profile Settings</a></li>                
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0);">Pages <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="/projects/quotations/pages/about">About us</a></li>                                
                        </ul>
                    </li>
                    <li>
                        <a href="/projects/quotations/admin" target="_blank">Admin</a>
                    </li>
                </ul>
            </div>         
            <ul class="nav header-navbar-rht reg-head">
                <li class="searchbar">
                    <a href="javascript:void(0);" class="reg-btn"><i class="feather-search"></i></a>
                    <div class="togglesearch">
                        <form action="project.html">
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <button type="submit" class="btn">Search</button>
                            </div>
                        </form>
                    </div>
                </li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="text-dark"><?php echo htmlspecialchars($_SESSION['username']); ?></li>
                    <li><a href="/projects/quotations/pages/logout" class="log-btn"><img src="/projects/quotations/assets/img/icon/lock.svg" class="me-1" alt="img"> Logout</a></li>
					<?php if ($_SESSION['type'] === 'buyer'): ?>
					<li><a href="/projects/quotations/buyer/post-quotation" class="login-btn"><i class="feather-plus me-1"></i>Post a Quotation</a></li>
					<?php elseif ($_SESSION['type'] === 'seller'): ?>
						
						<li><a href="/projects/quotations/seller/dashboard" class="login-btn">Seller Dashboard</a></li>
					<?php endif; ?>
                <?php else: ?>
                    <li><a href="/projects/quotations/pages/signup" class="reg-btn">Become a Seller</a></li>
                    <li><a href="/projects/quotations/pages/signup" class="reg-btn"><img src="/projects/quotations/assets/img/icon/users.svg" class="me-1" alt="img">Register</a></li>
                    <li><a href="/projects/quotations/pages/login" class="log-btn"><img src="/projects/quotations/assets/img/icon/lock.svg" class="me-1" alt="img"> Login</a></li>
                <?php endif; ?>
                
            </ul>
        </nav>
    </div>
</header>
