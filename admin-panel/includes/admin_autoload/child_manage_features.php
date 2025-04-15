<?php 
    require_once('assets/includes/helper.php');
    require_once('assets/includes/data_general.php');    
?>
<!-- Sub Manage Features -->
<ul class="ml-menu">
    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['site-features'] == 1)) { ?>
        <!-- Enable / Disable Features -->
        <li>
            <a <?php echo ($page == 'site-features') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('site-features'); ?>" data-ajax="?path=site-features">
                <!-- Bật tắt tính năng          -->
                <span>
                    <?php
                    if (isset($wo['lang']['enable_disable_features'])) {
                        echo $wo['lang']['enable_disable_features'];
                    } else {
                        echo $admin_sidebar_default["enable_disable_features"];
                    }
                    ?>
                </span>           
            </a>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-apps'] == 1)) { ?>
        <li>
            <a <?php echo ($page == 'manage-apps') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-apps'); ?>" data-ajax="?path=manage-apps">Applications</a>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-pages'] == 1)) { ?>
        <li>
            <a <?php echo ($page == 'manage-pages') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-pages'); ?>" data-ajax="?path=manage-pages">Pages</a>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-groups'] == 1)) { ?>
        <li>
            <a <?php echo ($page == 'manage-groups') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-groups'); ?>" data-ajax="?path=manage-groups">Groups</a>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-posts'] == 1)) { ?>
        <li>
            <a <?php echo ($page == 'manage-posts') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-posts'); ?>" data-ajax="?path=manage-posts">Posts</a>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-fund'] == 1)) { ?>
        <li>
            <a <?php echo ($page == 'manage-fund') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-fund'); ?>" data-ajax="?path=manage-fund">Fundings</a>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-jobs'] == 1)) { ?>
        <li>
            <a <?php echo ($page == 'manage-jobs') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-jobs'); ?>" data-ajax="?path=manage-jobs">Jobs</a>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-offers'] == 1)) { ?>
        <li>
            <a <?php echo ($page == 'manage-offers') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-offers'); ?>" data-ajax="?path=manage-offers">Offers</a>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-articles'] == 1)) { ?>
        <li>
            <a <?php echo ($page == 'manage-articles') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-articles'); ?>" data-ajax="?path=manage-articles">Articles (Blog)</a>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-events'] == 1)) { ?>
        <li>
            <a <?php echo ($page == 'manage-events') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-events'); ?>" data-ajax="?path=manage-events">Events</a>
        </li>
    <?php } ?>
    <li>
        <a <?php echo ($page == 'manage-events') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-content-monetization'); ?>" data-ajax="?path=manage-content-monetization">Content Monetization</a>
    </li>
    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['store-settings'] == 1 || $wo['user']['permission']['manage-products'] == 1 || $wo['user']['permission']['manage-orders'] == 1 || $wo['user']['permission']['manage-reviews'] == 1))) { ?>
        <li <?php echo ($page == 'store-settings' || $page == 'manage-products' || $page == 'manage-orders' || $page == 'manage-reviews') ? 'class="open"' : ''; ?>>
            <a href="javascript:void(0);">Store</a>
            <ul class="ml-menu">
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['store-settings'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'store-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('store-settings'); ?>" data-ajax="?path=store-settings">
                            <span>Store Settings</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-products'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'manage-products') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-products'); ?>" data-ajax="?path=manage-products">
                            <span>Manage Products</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-orders'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'manage-orders') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-orders'); ?>" data-ajax="?path=manage-orders">
                            <span>Manage Orders</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-reviews'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'manage-reviews') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-reviews'); ?>" data-ajax="?path=manage-reviews">
                            <span>Manage Reviews</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-forum-sections'] == 1 || $wo['user']['permission']['manage-forum-forums'] == 1 || $wo['user']['permission']['manage-forum-threads'] == 1 || $wo['user']['permission']['manage-forum-messages'] == 1 || $wo['user']['permission']['create-new-forum'] == 1 || $wo['user']['permission']['create-new-section'] == 1))) { ?>
        <li <?php echo ($page == 'manage-forum-sections' || $page == 'manage-forum-forums' || $page == 'manage-forum-threads' || $page == 'manage-forum-messages' || $page == 'create-new-forum' || $page == 'create-new-section') ? 'class="open"' : ''; ?>>
            <a href="javascript:void(0);">Forums</a>
            <ul class="ml-menu">
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-forum-sections'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'manage-forum-sections') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-sections'); ?>" data-ajax="?path=manage-forum-sections">
                            <span>Manage Forums Sections</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-forum-forums'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'manage-forum-forums') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-forums'); ?>" data-ajax="?path=manage-forum-forums">
                            <span>Manage Forums</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-forum-threads'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'manage-forum-threads') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-threads'); ?>" data-ajax="?path=manage-forum-threads">
                            <span>Manage Threads</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-forum-messages'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'manage-forum-messages') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-messages'); ?>" data-ajax="?path=manage-forum-messages">
                            <span>Manage Replies</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['create-new-section'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'create-new-section') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('create-new-section'); ?>" data-ajax="?path=create-new-section">
                            <span>Create New Section</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['create-new-forum'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'create-new-forum') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('create-new-forum'); ?>" data-ajax="?path=create-new-forum">
                            <span>Create New Forum</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-movies'] == 1 || $wo['user']['permission']['add-new-movies'] == 1))) { ?>
        <li <?php echo ($page == 'manage-movies' || $page == 'add-new-movies') ? 'class="open"' : ''; ?>>
            <a href="javascript:void(0);">Movies</a>
            <ul class="ml-menu">
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-movies'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'manage-movies') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-movies'); ?>" data-ajax="?path=manage-movies">
                            <span>Manage Movies</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-new-movies'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'add-new-movies') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('add-new-movies'); ?>" data-ajax="?path=add-new-movies">
                            <span>Add New Movie</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-games'] == 1 || $wo['user']['permission']['add-new-game'] == 1))) { ?>

        <li <?php echo ($page == 'manage-games' || $page == 'add-new-game') ? 'class="open"' : ''; ?>>
            <a href="javascript:void(0);">Games</a>
            <ul class="ml-menu">
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-games'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'manage-games') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-games'); ?>" data-ajax="?path=manage-games">
                            <span>Manage Games</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-new-game'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'add-new-game') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('add-new-game'); ?>" data-ajax="?path=add-new-game">
                            <span>Add New Game</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['pages-categories'] == 1 || $wo['user']['permission']['pages-sub-categories'] == 1 || $wo['user']['permission']['groups-sub-categories'] == 1 || $wo['user']['permission']['products-sub-categories'] == 1 || $wo['user']['permission']['groups-categories'] == 1 || $wo['user']['permission']['blogs-categories'] == 1 || $wo['user']['permission']['products-categories'] == 1))) { ?>
        <li <?php echo ($page == 'pages-categories' || $page == 'pages-sub-categories' || $page == 'groups-sub-categories' || $page == 'products-sub-categories' || $page == 'groups-categories' || $page == 'blogs-categories' || $page == 'products-categories') ? 'class="open"' : ''; ?>>
            <a href="javascript:void(0);">Categories</a>
            <ul class="ml-menu">
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pages-categories'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'pages-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('pages-categories'); ?>" data-ajax="?path=pages-categories">
                            <span>Pages Categories</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pages-sub-categories'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'pages-sub-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('pages-sub-categories'); ?>" data-ajax="?path=pages-sub-categories">
                            <span>Pages Sub Categories</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['groups-categories'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'groups-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('groups-categories'); ?>" data-ajax="?path=groups-categories">
                            <span>Groups Categories</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['groups-sub-categories'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'groups-sub-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('groups-sub-categories'); ?>" data-ajax="?path=groups-sub-categories">
                            <span>Groups Sub Categories</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['blogs-categories'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'blogs-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('blogs-categories'); ?>" data-ajax="?path=blogs-categories">
                            <span>Blogs Categories</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['products-categories'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'products-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('products-categories'); ?>" data-ajax="?path=products-categories">
                            <span>Products Categories</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['products-sub-categories'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'products-sub-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('products-sub-categories'); ?>" data-ajax="?path=products-sub-categories">
                            <span>Products Sub Categories</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['job-categories'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'job-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('job-categories'); ?>" data-ajax="?path=job-categories">
                            <span>Job Categories</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['add-new-gift'] == 1 || $wo['user']['permission']['manage-gifts'] == 1))) { ?>
        <?php if ($wo['config']['gift_system'] == 1) { ?>
            <li <?php echo ($page == 'manage-gifts' || $page == 'add-new-gift') ? 'class="open"' : ''; ?>>
                <a href="javascript:void(0);">Gifts</a>
                <ul class="ml-menu">
                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-gifts'] == 1)) { ?>
                        <li>
                            <a <?php echo ($page == 'manage-gifts') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-gifts'); ?>" data-ajax="?path=manage-gifts">
                                <span>Manage Gifts</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-new-gift'] == 1)) { ?>
                        <li>
                            <a <?php echo ($page == 'add-new-gift') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('add-new-gift'); ?>" data-ajax="?path=add-new-gift">
                                <span>Add New Gift</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    <?php } ?>

    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-stickers'] == 1 || $wo['user']['permission']['add-new-sticker'] == 1))) { ?>
        <?php if ($wo['config']['stickers_system'] == 1) { ?>
            <li <?php echo ($page == 'manage-stickers' || $page == 'add-new-sticker') ? 'class="open"' : ''; ?>>
                <a href="javascript:void(0);">Stickers</a>
                <ul class="ml-menu">
                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-stickers'] == 1)) { ?>
                        <li>
                            <a <?php echo ($page == 'manage-stickers') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-stickers'); ?>" data-ajax="?path=manage-stickers">
                                <span>Manage Stickers</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-new-sticker'] == 1)) { ?>
                        <li>
                            <a <?php echo ($page == 'add-new-sticker') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('add-new-sticker'); ?>" data-ajax="?path=add-new-sticker">
                                <span>Add New sticker</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    <?php } ?>
    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['pages-fields'] == 1 || $wo['user']['permission']['groups-fields'] == 1 || $wo['user']['permission']['products-fields'] == 1 || $wo['user']['permission']['manage-profile-fields'] == 1))) { ?>
        <li <?php echo ($page == 'pages-fields' || $page == 'groups-fields' || $page == 'products-fields' || $page == 'manage-profile-fields') ? 'class="open"' : ''; ?>>
            <a href="javascript:void(0);">Custom Fields</a>
            <ul class="ml-menu">
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-profile-fields'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'manage-profile-fields') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-profile-fields'); ?>" data-ajax="?path=manage-profile-fields">Custom Users Fields</a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pages-fields'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'pages-fields') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('pages-fields'); ?>" data-ajax="?path=pages-fields">
                            <span>Custom Pages Fields</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['groups-fields'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'groups-fields') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('groups-fields'); ?>" data-ajax="?path=groups-fields">
                            <span>Custom Groups Fields</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['products-fields'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'products-fields') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('products-fields'); ?>" data-ajax="?path=products-fields">
                            <span>Custom Products Fields</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
</ul>