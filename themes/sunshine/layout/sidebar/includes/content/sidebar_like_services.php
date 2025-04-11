<!-- Các dịch vụ bạn có thể thích  -->
<?php
if ($wo['config']['website_mode'] == 'linkedin') {
    $users = Wo_UserSugServices(5);
    if (count($users) != 0) {
?>
        <ul class="list-group" id="sidebar-user-service-container">
            <li class="text-muted sidebar-title-back" contenteditable="false">
                <?php echo $wo['lang']['services_you_may_know']; ?>
                <span onclick="Wo_ReloadSideBarServices();" class="<?php echo Wo_RightToLeft('pull-right'); ?> refresh"><svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 7.54603C13 10.8036 10.3137 13.4443 7 13.4443C3.68629 13.4443 1 10.8036 1 7.54603C1 4.28848 3.66667 1.64772 7 1.64772C11 1.64772 13 4.92456 13 4.92456M13 4.92456L13 1.44434M13 4.92456H9.8966" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 1.64772C11 1.64772 13 4.92456 13 4.92456M13 4.92456L13 1.44434M13 4.92456H9.8966" class="icon_main" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></span>
            </li>
            <li>
                <div class="sidebar-users-may-service-container">
                    <?php
                    foreach ($users as $wo['UsersList']) {
                        $wo['UsersList']['user_name'] = mb_substr($wo['UsersList']['name'], 0, 10, "utf-8");
                        echo Wo_LoadPage('sidebar/sidebar-user-service');
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </li>
        </ul>
<?php }
} ?>