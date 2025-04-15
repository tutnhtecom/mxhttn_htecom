<?php if (!empty($wo['config']['native_android_messenger_url']) || !empty($wo['config']['native_android_timeline_url']) || !empty($wo['config']['native_ios_messenger_url']) || !empty($wo['config']['native_ios_timeline_url']) || !empty($wo['config']['native_windows_messenger_url'])) { ?>
    <ul class="list-group" id="sidebar-group-list-container">
        <li class="list-group-item text-muted sidebar-title-back" contenteditable="false"><?php echo $wo['lang']['apps']; ?>
        </li>
        <li class="list-group-item wo_side_apps">
            <?php if (!empty($wo['config']['native_android_timeline_url']) || !empty($wo['config']['native_ios_timeline_url'])) { ?>
                <p><?php echo $wo['lang']['get_mobile_apps']; ?></p>
                <?php if (!empty($wo['config']['native_android_timeline_url'])) { ?>
                    <a href="<?php echo ($wo['config']['native_android_timeline_url']) ?>" target="_blank">
                        <img width="130" src="<?php echo $wo['config']['theme_url']; ?>/img/google.png" />
                    </a>
                <?php } ?>
                <?php if (!empty($wo['config']['native_ios_timeline_url'])) { ?>
                    <a href="<?php echo ($wo['config']['native_ios_timeline_url']) ?>" target="_blank">
                        <img width="130" src="<?php echo $wo['config']['theme_url']; ?>/img/apple.png" />
                    </a>
                <?php } ?>
            <?php } ?>
            <?php if (!empty($wo['config']['native_android_messenger_url']) || !empty($wo['config']['native_ios_messenger_url']) || !empty($wo['config']['native_windows_messenger_url'])) { ?>
                <p><?php echo $wo['lang']['get_messenger_apps']; ?></p>
                <?php if (!empty($wo['config']['native_android_messenger_url'])) { ?>
                    <a href="<?php echo ($wo['config']['native_android_messenger_url']) ?>" target="_blank">
                        <img width="130" src="<?php echo $wo['config']['theme_url']; ?>/img/google.png" />
                    </a>
                <?php } ?>
                <?php if (!empty($wo['config']['native_ios_messenger_url'])) { ?>
                    <a href="<?php echo ($wo['config']['native_ios_messenger_url']) ?>" target="_blank">
                        <img width="130" src="<?php echo $wo['config']['theme_url']; ?>/img/apple.png" />
                    </a>
                <?php } ?>
                <?php if (!empty($wo['config']['native_windows_messenger_url'])) { ?>
                    <a href="<?php echo ($wo['config']['native_windows_messenger_url']) ?>" target="_blank">
                        <img width="130" src="<?php echo $wo['config']['theme_url']; ?>/img/microsoft.png" />
                    </a>
                <?php } ?>
            <?php } ?>
        </li>
    </ul>
<?php } ?>