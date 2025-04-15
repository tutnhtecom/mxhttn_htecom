<ul class="list-group trending">
    <li class="list-group-item sidebar-title-back" contenteditable="false"><?php echo $wo['lang']['trendings']; ?> ⚡️</li>
    <?php
    foreach ($hashtags as $wo['hashtag']) {
    ?>
        <li class="list-group-item wow_htag">
            <a href="<?php echo $wo['hashtag']['url']; ?>" data-ajax="?link1=hashtag&hash=<?php echo $wo['hashtag']['tag']; ?>">
                <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.01721 5.7115C2.59286 3.5041 4.35164 1.81533 6.56021 1.34934L6.98223 1.2603C8.97273 0.840318 11.0274 0.840318 13.0179 1.2603L13.44 1.34934C15.6485 1.81533 17.4073 3.50411 17.983 5.71151C18.4502 7.50337 18.4502 9.38725 17.983 11.1791C17.4073 13.3865 15.6485 15.0753 13.44 15.5413L13.0179 15.6303C11.0274 16.0503 8.97273 16.0503 6.98223 15.6303L6.56021 15.5413C4.35164 15.0753 2.59286 13.3865 2.01721 11.1791C1.54993 9.38726 1.54993 7.50337 2.01721 5.7115Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M5 8.44531H6.66667L8.33333 10.9453L11.6667 5.94531L13.3333 8.44531H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div>
                    <span class="htag_top">#<?php echo $wo['hashtag']['tag']; ?></span>
                    <span class="htag_bottom"><?php echo $wo['hashtag']['trend_use_num']; ?> <?php echo TextForMode('posts'); ?></span>
                </div>
            </a>
        </li>
    <?php } ?>
    <li>
        <div class="clear"></div>
    </li>
</ul>