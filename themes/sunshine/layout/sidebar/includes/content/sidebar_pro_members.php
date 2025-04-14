<?php if ($wo['config']['pro'] == 1) { ?>
    <!-- <div class="featured-users">
        <li class="list-group-item sidebar-title-back" contenteditable="false">
            <?php if ($wo['user']['is_pro'] == 0) { ?>
                <a class="pro-me-here pull-right" href="<?php echo Wo_SeoLink('index.php?link1=go-pro'); ?>" data-ajax="?link1=go-pro"><?php echo $wo['lang']['put_me_here']; ?></a>
            <?php } ?>
            <?php echo $wo['lang']['pro_members']; ?> 💫
        </li>
        <ul class="list-inline wo_pro_users">
            <?php
            $users = Wo_FeaturedUsers(8);
            ?>
            <?php
            foreach ($users as $wo['user-list']) {
                echo Wo_LoadPage('home/user-list');
            }
            ?>
        </ul>
    </div> -->
<?php } ?>