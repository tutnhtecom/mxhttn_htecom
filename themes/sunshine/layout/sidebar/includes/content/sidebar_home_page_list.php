<?php
if ($wo['config']['pages'] == 1) {
    $promoted_page = Wo_GetPromotedPage();
    if (count($promoted_page) > 0) { ?>
        <ul class="list-group">
            <li class="list-group-item text-muted sidebar-title-back" contenteditable="false"><?php echo $wo['lang']['promoted']; ?></li>
            <li>
                <?php
                foreach ($promoted_page as $wo['PageList']) {
                    $wo['PageList']['user_name'] = $wo['PageList']['name'];
                    echo Wo_LoadPage('sidebar/sidebar-home-page-list');
                }
                ?>
                <div class="clear"></div>
            </li>
        </ul>
<?php }
} ?>