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
                    <li><a class="menu-item" href="" data-i18n="nav.dash.project">Category</a></li>
                    <li><router-link class="menu-item" to="post" data-i18n="nav.dash.fitness">All Post</router-link></li>
                </ul>
            </li>

            <li class=" nav-item">
                <router-link to="category-list"><i class="icon-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Category</span>
                </router-link>
            </li>
        </ul>
    </div>
</div>