<li>
    <a <?php echo ($page == 'dashboard') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings(''); ?>" data-ajax="?path=dashboard">
        <span class="nav-link-icon">
            <i class="material-icons">dashboard</i>
        </span>
        <span> 
            <?php 
                if(isset($wo['lang']['dashboard'])) {
                    echo $wo['lang']['dashboard']; 
                } else {
                    echo $admin_sidebar_default["dashboard"];
                }
            ?>
        </span>
    </a>
</li>