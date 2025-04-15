<?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['post-settings'] == 1 || $wo['user']['permission']['manage-colored-posts'] == 1 || $wo['user']['permission']['manage-reactions'] == 1 || $wo['user']['permission']['live'] == 1 || $wo['user']['permission']['general-settings'] == 1 || $wo['user']['permission']['site-settings'] == 1 || $wo['user']['permission']['amazon-settings'] == 1 || $wo['user']['permission']['email-settings'] == 1 || $wo['user']['permission']['video-settings'] == 1 || $wo['user']['permission']['social-login'] == 1 || $wo['user']['permission']['node'] == 1 || $wo['user']['permission']['cronjob_settings'] == 1))) { ?>
    <li <?php echo ($page == 'general-settings' || $page == 'post-settings' || $page == 'site-settings' || $page == 'email-settings' || $page == 'social-login' || $page == 'site-features' || $page == 'amazon-settings' ||  $page == 'video-settings' || $page == 'manage-currencies' || $page == 'manage-colored-posts' || $page == 'live' || $page == 'node' || $page == 'manage-reactions' || $page == 'ffmpeg' || $page == 'cronjob_settings') ? 'class="open"' : ''; ?>>
        <a href="#">
            <span class="nav-link-icon">
                <i class="material-icons">setting</i>
            </span>            
            <span> <?php echo $wo['lang']['setting'] ?></span>
        </a>
        <!-- Child Settings -->
        <ul class="ml-menu">
            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['website_mode'] == 1)) { ?>
                <li>
                    <a <?php echo ($page == 'website_mode') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('website_mode'); ?>" data-ajax="?path=website_mode">Website Mode</a>
                </li>
            <?php } ?>
            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['general-settings'] == 1)) { ?>
                <li>
                    <a <?php echo ($page == 'general-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('general-settings'); ?>" data-ajax="?path=general-settings">General Configuration</a>
                </li>
            <?php } ?>
            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['site-settings'] == 1)) { ?>
                <li>
                    <a <?php echo ($page == 'site-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('site-settings'); ?>" data-ajax="?path=site-settings">Website Information</a>
                </li>
            <?php } ?>
            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['amazon-settings'] == 1)) { ?>
                <li>
                    <a <?php echo ($page == 'amazon-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('amazon-settings'); ?>" data-ajax="?path=amazon-settings">File Upload Configuration</a>
                </li>
            <?php } ?>
            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['email-settings'] == 1)) { ?>
                <li>
                    <a <?php echo ($page == 'email-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('email-settings'); ?>" data-ajax="?path=email-settings">E-mail & SMS Setup</a>
                </li>
            <?php } ?>
            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['video-settings'] == 1)) { ?>
                <li>
                    <a <?php echo ($page == 'video-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('video-settings'); ?>" data-ajax="?path=video-settings">Chat & Video/Audio</a>
                </li>
            <?php } ?>
            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['social-login'] == 1)) { ?>
                <li>
                    <a <?php echo ($page == 'social-login') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('social-login'); ?>" data-ajax="?path=social-login">Social Login Settings</a>
                </li>
            <?php } ?>
            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['node'] == 1)) { ?>
                <li>
                    <a <?php echo ($page == 'node') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('node'); ?>" data-ajax="?path=node">NodeJS Settings</a>
                </li>
            <?php } ?>
            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['cronjob_settings'] == 1)) { ?>
                <li>
                    <a <?php echo ($page == 'cronjob_settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('cronjob_settings'); ?>" data-ajax="?path=cronjob_settings">CronJob Settings</a>
                </li>
            <?php } ?>
            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['ai-settings'] == 1)) { ?>
                <li>
                    <a <?php echo ($page == 'ai-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('ai-settings'); ?>" data-ajax="?path=ai-settings">AI Settings</a>
                </li>
            <?php } ?>
            <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['post-settings'] == 1 || $wo['user']['permission']['manage-colored-posts'] == 1 || $wo['user']['permission']['manage-reactions'] == 1 || $wo['user']['permission']['live'] == 1))) { ?>
                <li>
                    <a <?php echo ($page == 'post-settings' || $page == 'manage-colored-posts' || $page == 'manage-reactions') ? 'class="open"' : ''; ?> href="javascript:void(0);">Posts Settings</a>
                    <ul class="ml-menu">
                        <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['post-settings'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'post-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('post-settings'); ?>" data-ajax="?path=post-settings">
                                    <span>Posts Settings</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-colored-posts'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-colored-posts') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-colored-posts'); ?>" data-ajax="?path=manage-colored-posts">
                                    <span>Manage Colored Posts</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-reactions'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-reactions') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-reactions'); ?>" data-ajax="?path=manage-reactions">
                                    <span>Post Reactions</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['live'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'live') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('live'); ?>" data-ajax="?path=live">Setup Live Streaming</a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </li>                       
<?php } ?>