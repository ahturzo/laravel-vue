<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <router-link to="/home"><i class="icon-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
                </router-link>
            </li>

            <li class=" nav-item"><a href=""><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Post</span></a>
                <ul class="menu-content">
                    <li><router-link class="menu-item" to="category-list" data-i18n="nav.dash.project">Category</router-link></li>
                    <li><router-link class="menu-item" to="all-post" data-i18n="nav.dash.fitness">All Post</router-link></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
