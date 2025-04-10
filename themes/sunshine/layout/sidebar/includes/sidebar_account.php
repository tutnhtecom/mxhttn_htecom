<div class="wow_content wow_side_loggd_usr">
            <div class="wow_side_loggd_usr_cvr">
                <img src="<?php echo $wo['user']['cover'] ?>" alt="<?php echo $wo['user']['name'] ?> Cover Image">
            </div>
            <div class="wow_side_loggd_usr_hdr">
                <div class="avatar">
                    <img id="updateImage-<?php echo $wo['user']['user_id'] ?>" alt="<?php echo $wo['user']['name'] ?> Profile Picture" src="<?php echo $wo['user']['avatar'] ?>" <?php if ($wo['have_stories'] == true) { ?> class="<?php echo ($wo['story_seen_class']); ?> see_all_stories" data_story_user_id="<?php echo $wo['user']['user_id'] ?>" data_story_type="user" <?php } ?>>
                </div>
                <div class="title">
                    <a id="user-full-name" data-ajax="?link1=timeline&u=<?php echo $wo['user']['username']; ?>" href="<?php echo $wo['user']['url']; ?>"><?php echo $wo['user']['name'] ?>
                        <?php if (!empty($wo['user']['is_open_to_work']) && $wo['config']['website_mode'] == 'linkedin') { ?>
                            <span class="wo_open_job_badge" title="<?php echo ($wo['lang']['open_to_work']); ?>" data-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path>
                                </svg></span><?php } ?>
                    </a>
                    <p>@<?php echo $wo['user']['username'] ?></p>
                </div>
            </div>
            <?php if ($wo['loggedin']) { ?>
                <ul class="wo_user_side_info">
                    <?php if ($wo['config']['connectivitySystem'] == 0) { ?>
                        <li>
                            <a class="menu_list" href="<?php echo Wo_SeoLink('index.php?link1=timeline&u=' . $wo['user']['username'] . '&type=followers'); ?>" data-ajax="?link1=timeline&u=<?php echo $wo['user']['username'] ?>&type=followers">
                                <span><?php echo number_format($wo['user']['details']['followers_count']); ?></span> <span class="split-link"><b><?php echo $wo['lang']['followers']; ?></b></span>
                            </a>
                        </li>
                        •
                    <?php } ?>
                    <li>
                        <a class="menu_list" href="<?php echo Wo_SeoLink('index.php?link1=timeline&u=' . $wo['user']['username']); ?>" data-ajax="?link1=timeline&u=<?php echo $wo['user']['username']; ?>">
                            <span id="user_post_count"><?php echo number_format($wo['user']['details']['post_count']); ?></span> <span class="split-link"><b><?php echo $wo['lang']['posts']; ?></b></span>
                        </a>
                    </li>
                    <?php if ($wo['config']['connectivitySystem'] == 1) { ?>
                        • <li>
                            <a class="menu_list" href="<?php echo Wo_SeoLink('index.php?link1=albums&user=' . $wo['user']['username']); ?>" data-ajax="?link1=albums&user=<?php echo $wo['user']['username']; ?>">
                                <span><?php echo number_format($wo['user']['details']['album_count']); ?></span> <span class="split-link"><b><?php echo $wo['lang']['albums']; ?></b></span>
                            </a>
                        </li>
                        • <li>
                            <a class="menu_list" href="<?php echo Wo_SeoLink('index.php?link1=timeline&u=' . $wo['user']['username'] . '&type=followers'); ?>" data-ajax="?link1=timeline&u=<?php echo $wo['user']['username'] ?>&type=followers">
                                <span><?php echo number_format($wo['user']['details']['following_count']); ?></span> <span class="split-link"><b><?php echo $wo['lang']['friends_btn']; ?></b></span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($wo['config']['connectivitySystem'] == 0) { ?>
                        • <li>
                            <a class="menu_list" href="<?php echo Wo_SeoLink('index.php?link1=timeline&u=' . $wo['user']['username'] . '&type=following'); ?>" data-ajax="?link1=timeline&u=<?php echo $wo['user']['username'] ?>&type=following">
                                <span><?php echo number_format($wo['user']['details']['following_count']); ?></span> <span class="split-link"><b><?php echo $wo['lang']['following']; ?></b></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>

            <div class="wo_side_users">
                <?php foreach (getRandFollower() as $key => $value) { ?>
                    <a class="user" data-ajax="?link1=timeline&u=<?php echo $value['username']; ?>" href="<?php echo $value['url']; ?>"><img src="<?php echo $value['avatar'] ?>"></a>
                <?php } ?>
            </div>
            <?php if ($wo['loggedin']) { ?>
                <?php
                $birth = Wo_CheckBirthdays();
                if (count($birth) > 0) { ?>
                    <div class="wow_side_bdays">
                        <p><?php echo $wo['lang']['friends_birthdays']; ?></p>
                        <?php
                        foreach ($birth as $wo['UsersList']) {
                            $wo['UsersList']['user_name'] = mb_substr($wo['UsersList']['name'], 0, 10, "utf-8");
                            echo Wo_LoadPage('sidebar/sidebar-birthday-list');
                        }
                        ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>