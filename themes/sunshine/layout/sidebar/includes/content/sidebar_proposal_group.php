<!-- Các nhóm được đề xuất  -->
<?php
if ($wo['config']['groups'] == 1) {
    $groups = Wo_GroupSug(6);
    if (count($groups) > 0) {

?>
        <ul class="list-group" id="sidebar-group-list-container">
            <li class="list-group-item text-muted sidebar-title-back" contenteditable="false"><?php echo $wo['lang']['suggested_groups']; ?>
                <span onclick="Wo_ReloadSideBarGroups();" class="<?php echo Wo_RightToLeft('pull-right'); ?>  refresh">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 7.54603C13 10.8036 10.3137 13.4443 7 13.4443C3.68629 13.4443 1 10.8036 1 7.54603C1 4.28848 3.66667 1.64772 7 1.64772C11 1.64772 13 4.92456 13 4.92456M13 4.92456L13 1.44434M13 4.92456H9.8966" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 1.64772C11 1.64772 13 4.92456 13 4.92456M13 4.92456L13 1.44434M13 4.92456H9.8966" class="icon_main" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </li>
            <li>
                <div class="sidebar-group-may-know-container">
                    <?php
                    foreach ($groups as $wo['GroupList']) {
                        $wo['GroupList']['name'] = mb_substr($wo['GroupList']['name'], 0, 20, "utf-8");
                        echo Wo_LoadPage('sidebar/sidebar-group-list');
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </li>
        </ul>
<?php }
} ?>