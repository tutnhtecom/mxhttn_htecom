<?php if ($wo['loggedin'] && $wo['config']['user_ads'] == 1): ?>
    <?php
    foreach (Wo_GetSideBarAds() as $wo['sidebar-ad']) {
        echo Wo_LoadPage('ads/includes/content/sidebar-ad');
    }
    ?>
    <div class="clear"></div>
<?php endif; ?>