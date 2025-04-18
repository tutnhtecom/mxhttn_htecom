<?php

require_once('assets/init.php');
decryptConfigData();

if ($wo['loggedin'] == true) {
    $update_last_seen = Wo_LastSeen($wo['user']['user_id']);
}
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $value      = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_GET[$key] = strip_tags($value);
    }
}
if (!empty($_REQUEST)) {
    foreach ($_REQUEST as $key => $value) {
        $value          = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_REQUEST[$key] = strip_tags($value);
    }
}
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if ($key != 'url') {
            $value       = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        }
        $_POST[$key] = strip_tags($value);
    }
}
$page = '';
if ($wo['loggedin'] == true && !isset($_GET['link1'])) {
    $page = 'home';
} elseif (isset($_GET['link1'])) {
    $page = Wo_Secure($_GET['link1'], 0);
}
if ((!isset($_GET['link1']) && $wo['loggedin'] == false) || (isset($_GET['link1']) && $wo['loggedin'] == false && $page == 'home')) {
    $page = 'welcome';
}

$came_from = false;
if ($page == 'timeline') {
    $came_from = true;
}
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        exit("Restrcited Area");
    }
} else {
    exit("Restrcited Area");
}
if ((!$wo['loggedin'] || ($wo['loggedin'] && $wo['user']['banned'] != 1))) {
    if ($wo['config']['membership_system'] == 1) {
        if ($wo['loggedin'] == true) {
            if ($wo['user']['is_pro'] != 0 || Wo_IsAdmin()) {
                switch ($page) {
                    case 'maintenance':
                        include('sources/maintenance.php');
                        break;
                    case 'get_news_feed':
                        include('sources/get_news_feed.php');
                        break;
                    case 'video-call':
                        include('sources/video.php');
                        break;
                    case 'video-call-api':
                        include('sources/video_call_api.php');
                        break;
                    case 'home':
                        include('sources/home.php');
                        break;
                    case 'welcome':
                        include('sources/welcome.php');
                        break;
                    case 'register':
                        include('sources/register.php');
                        break;
                    case 'confirm-sms':
                        include('sources/confirm_sms.php');
                        break;
                    case 'confirm-sms-password':
                        include('sources/confirm_sms_password.php');
                        break;
                    case 'forgot-password':
                        include('sources/forgot_password.php');
                        break;
                    case 'reset-password':
                        include('sources/reset_password.php');
                        break;
                    case 'start-up':
                        include('sources/start_up.php');
                        break;
                    case 'activate':
                        include('sources/activate.php');
                        break;
                    case 'search':
                        include('sources/search.php');
                        break;
                    case 'timeline':
                        include('sources/timeline.php');
                        break;
                    case 'pages':
                        include('sources/my_pages.php');
                        break;
                    case 'suggested-pages':
                        include('sources/suggested_pages.php');
                        break;
                    case 'liked-pages':
                        include('sources/liked_pages.php');
                        break;
                    case 'joined_groups':
                        include('sources/joined_groups.php');
                        break;
                    case 'go-pro':
                        include('sources/go_pro.php');
                        break;
                    case 'page':
                        include('sources/page.php');
                        break;
                    case 'poke':
                        include('sources/poke.php');
                        break;
                    case 'most_liked':
                        include('sources/most_liked.php');
                        break;
                    case 'groups':
                        include('sources/my_groups.php');
                        break;
                    case 'suggested-groups':
                        include('sources/suggested_groups.php');
                        break;
                    case 'group':
                        include('sources/group.php');
                        break;
                    case 'create-group':
                        include('sources/create_group.php');
                        break;
                    case 'group-setting':
                        include('sources/group_setting.php');
                        break;
                    case 'create-page':
                        include('sources/create_page.php');
                        break;
                    case 'setting':
                        include('sources/setting.php');
                        break;
                    case 'page-setting':
                        include('sources/page_setting.php');
                        break;
                    case 'messages':
                        include('sources/messages.php');
                        break;
                    case 'logout':
                        include('sources/logout.php');
                        break;
                    case '404':
                        include('sources/404.php');
                        break;
                    case 'post':
                        include('sources/story.php');
                        break;
                    case 'game':
                        include('sources/game.php');
                        break;
                    case 'games':
                        include('sources/games.php');
                        break;
                    case 'new-game':
                        include('sources/new_games.php');
                        break;
                    case 'saved-posts':
                        include('sources/savedPosts.php');
                        break;
                    case 'hashtag':
                        include('sources/hashtag.php');
                        break;
                    case 'terms':
                        include('sources/term.php');
                        break;
                    case 'albums':
                        include('sources/my_albums.php');
                        break;
                    case 'watch':
                        include('sources/watch.php');
                        break;
                    case 'reels':
                        include('sources/reels.php');
                        break;
                    case 'album':
                        include('sources/album.php');
                        break;
                    case 'create-album':
                        include('sources/create_album.php');
                        break;
                    case 'contact-us':
                        include('sources/contact.php');
                        break;
                    case 'user-activation':
                        include('sources/user_activation.php');
                        break;
                    case 'upgraded':
                        include('sources/upgraded.php');
                        break;
                    case 'oops':
                        include('sources/oops.php');
                        break;
                    case 'boosted-pages':
                        include('sources/boosted_pages.php');
                        break;
                    case 'boosted-posts':
                        include('sources/boosted_posts.php');
                        break;
                    case 'new-product':
                        include('sources/new_product.php');
                        break;
                    case 'edit-product':
                        include('sources/edit_product.php');
                        break;
                    case 'products':
                        include('sources/products.php');
                        break;
                    case 'my-products':
                        include('sources/my_products.php');
                        break;
                    case 'site-pages':
                        include('sources/site_pages.php');
                        break;
                    case 'blogs':
                        include('sources/blog.php');
                        break;
                    case 'my-blogs':
                        include('sources/my_blogs.php');
                        break;
                    case 'create-blog':
                        include('sources/create_blog.php');
                        break;
                    case 'read-blog':
                        include('sources/read_blog.php');
                        break;
                    case 'edit-blog':
                        include('sources/edit_blog.php');
                        break;
                    case 'blog-category':
                        include('sources/blog_category.php');
                        break;
                    case 'forum':
                        include('sources/forum/forum.php');
                        break;
                    case 'forum-members':
                        include('sources/forum/forum_members.php');
                        break;
                    case 'forum-members-byname':
                        include('sources/forum/forum_members_byname.php');
                        break;
                    case 'forum-events':
                        include('sources/forum/forum_events.php');
                        break;
                    case 'forum-search':
                        include('sources/forum/forum_search.php');
                        break;
                    case 'forum-search-result':
                        include('sources/forum/forum_search.php');
                        break;
                    case 'forum-help':
                        include('sources/forum/forum_help.php');
                        break;
                    case 'forums':
                        include('sources/forum/forumdisplay.php');
                        break;
                    case 'forumaddthred':
                        include('sources/forum/forums_add_thread.php');
                        break;
                    case 'showthread':
                        include('sources/forum/forum_showthread.php');
                        break;
                    case 'threadreply':
                        include('sources/forum/forum_threadreply.php');
                        break;
                    case 'threadquote':
                        include('sources/forum/forum_threadquote.php');
                        break;
                    case 'editreply':
                        include('sources/forum/forum_editreply.php');
                        break;
                    case 'deletereply':
                        include('sources/forum/forum_deletereply.php');
                        break;
                    case 'mythreads':
                        include('sources/forum/forum_mythreads.php');
                        break;
                    case 'mymessages':
                        include('sources/forum/forum_mymessages.php');
                        break;
                    case 'edithread':
                        include('sources/forum/forum_edithread.php');
                        break;
                    case 'deletethread':
                        include('sources/forum/forum_deletethread.php');
                        break;
                    case 'create-event':
                        include('sources/events/create_event.php');
                        break;
                    case 'edit-event':
                        include('sources/events/edit_event.php');
                        break;
                    case 'events':
                        include('sources/events/events_upcomming.php');
                        break;
                    case 'events-going':
                        include('sources/events/events_going.php');
                        break;
                    case 'events-interested':
                        include('sources/events/events_interested.php');
                        break;
                    case 'events-past':
                        include('sources/events/events_past.php');
                        break;
                    case 'show-event':
                        include('sources/events/show_event.php');
                        break;
                    case 'events-invited':
                        include('sources/events/events_invited.php');
                        break;
                    case 'my-events':
                        include('sources/events/my_events.php');
                        break;
                    case 'oauth':
                        include('sources/oauth.php');
                        break;
                    case 'app_api':
                        include('sources/apps_api.php');
                        break;
                    case 'authorize':
                        include('sources/authorize.php');
                        break;
                    case 'app-setting':
                        include('sources/app_setting.php');
                        break;
                    case 'developers':
                        include('sources/developers.php');
                        break;
                    case 'create-app':
                        include('sources/create_app.php');
                        break;
                    case 'app':
                        include('sources/app_page.php');
                        break;
                    case 'apps':
                        include('sources/apps.php');
                        break;
                    case 'sharer':
                        include('sources/sharer.php');
                        break;
                    case 'directory':
                        include('sources/directory/directory.php');
                        break;
                    case 'directory-users':
                        include('sources/directory/users.php');
                        break;
                    case 'directory-pages':
                        include('sources/directory/pages.php');
                        break;
                    case 'directory-groups':
                        include('sources/directory/groups.php');
                        break;
                    case 'directory-events':
                        include('sources/directory/events.php');
                        break;
                    case 'directory-games':
                        include('sources/directory/games.php');
                        break;
                    case 'directory-market':
                        include('sources/directory/market.php');
                        break;
                    case 'directory-movies':
                        include('sources/directory/movies.php');
                        break;
                    case 'directory-jobs':
                        include('sources/directory/jobs.php');
                        break;
                    case 'directory-fundings':
                        include('sources/directory/fundings.php');
                        break;
                    case 'directory-blogs':
                        include('sources/directory/blogs.php');
                        break;
                    case 'directory-forums':
                        include('sources/directory/forums.php');
                        break;
                    case 'movies':
                        include('sources/movies/movies.php');
                        break;
                    case 'movies-genre':
                        include('sources/movies/movies_genre.php');
                        break;
                    case 'movies-country':
                        include('sources/movies/movies_country.php');
                        break;
                    case 'watch-film':
                        include('sources/movies/watch_film.php');
                        break;
                    case 'advertise':
                        include('sources/ads/ads.php');
                        break;
                    case 'wallet':
                        include('sources/ads/wallet.php');
                        break;
                    case 'send_money':
                        include('sources/ads/send_money.php');
                        break;
                    case 'create-ads':
                        include('sources/ads/create_ads.php');
                        break;
                    case 'edit-ads':
                        include('sources/ads/edit_ads.php');
                        break;
                    case 'chart-ads':
                        include('sources/ads/chart_ads.php');
                        break;
                    case 'manage-ads':
                        include('sources/ads/admin.php');
                        break;
                    case 'create-status':
                        include('sources/status/create.php');
                        break;
                    case 'friends-nearby':
                        include('sources/friends_nearby.php');
                        break;
                    case 'more-status':
                        include('sources/status/more-status.php');
                        break;
                    case 'unusual-login':
                        include('sources/unusual-login.php');
                        break;
                    case 'jobs':
                        include('sources/jobs.php');
                        break;
                    case 'common_things':
                        include('sources/common_things.php');
                        break;
                    case 'funding':
                        include('sources/funding.php');
                        break;
                    case 'my_funding':
                        include('sources/my_funding.php');
                        break;
                    case 'create_funding':
                        include('sources/create_funding.php');
                        break;
                    case 'edit_fund':
                        include('sources/edit_fund.php');
                        break;
                    case 'show_fund':
                        include('sources/show_fund.php');
                        break;
                    case 'monetization':
                        include('sources/monetization.php');
                        break;
                    case 'subscriptions':
                        include('sources/subscriptions.php');
                        break;
                    case 'memories':
                        include('sources/memories.php');
                        break;
                    case 'refund':
                        include('sources/refund.php');
                        break;
                    case 'offers':
                        include('sources/offers.php');
                        break;
                    case 'nearby_shops':
                        include('sources/nearby_shops.php');
                        break;
                    case 'nearby_business':
                        include('sources/nearby_business.php');
                        break;
                    case 'live':
                        include('sources/live.php');
                        break;
                    case 'checkout':
                        include('sources/checkout.php');
                        break;
                    case 'purchased':
                        include('sources/purchased.php');
                        break;
                    case 'customer_order':
                        include('sources/customer_order.php');
                        break;
                    case 'orders':
                        include('sources/orders.php');
                        break;
                    case 'order':
                        include('sources/order.php');
                        break;
                    case 'reviews':
                        include('sources/reviews.php');
                        break;
                    case 'open_to_work_posts':
                        include('sources/open_to_work_posts.php');
                        break;
                    case 'withdrawal':
                        include('sources/withdrawal.php');
                        break;
                    case 'explore':
                        include('sources/explore.php');
                        break;
                }
            } else {
                switch ($page) {
                    case 'setting':
                        include('sources/setting.php');
                        break;
                    case 'wallet':
                        include('sources/ads/wallet.php');
                        break;
                    case 'maintenance':
                        include('sources/maintenance.php');
                        break;
                    case 'go-pro':
                        include('sources/go_pro.php');
                        break;
                    case 'welcome':
                        include('sources/welcome.php');
                        break;
                    case 'register':
                        include('sources/register.php');
                        break;
                    case 'confirm-sms':
                        include('sources/confirm_sms.php');
                        break;
                    case 'confirm-sms-password':
                        include('sources/confirm_sms_password.php');
                        break;
                    case 'forgot-password':
                        include('sources/forgot_password.php');
                        break;
                    case 'reset-password':
                        include('sources/reset_password.php');
                        break;
                    case 'activate':
                        include('sources/activate.php');
                        break;
                    case 'logout':
                        include('sources/logout.php');
                        break;
                    case '404':
                        include('sources/404.php');
                        break;
                    case 'contact-us':
                        include('sources/contact.php');
                        break;
                    case 'user-activation':
                        include('sources/user_activation.php');
                        break;
                    case 'upgraded':
                        include('sources/upgraded.php');
                        break;
                    case 'oops':
                        include('sources/oops.php');
                        break;
                    case 'oauth':
                        include('sources/oauth.php');
                        break;
                    case 'app_api':
                        include('sources/apps_api.php');
                        break;
                    case 'authorize':
                        include('sources/authorize.php');
                        break;
                    case 'app-setting':
                        include('sources/app_setting.php');
                        break;
                    case 'developers':
                        include('sources/developers.php');
                        break;
                    case 'create-app':
                        include('sources/create_app.php');
                        break;
                    case 'app':
                        include('sources/app_page.php');
                        break;
                    case 'apps':
                        include('sources/apps.php');
                        break;
                    case 'unusual-login':
                        include('sources/unusual-login.php');
                        break;
                    case 'terms':
                        include('sources/term.php');
                        break;
                    case 'site-pages':
                        include('sources/site_pages.php');
                        break;
                }
            }
        } else {
            switch ($page) {
                case 'maintenance':
                    include('sources/maintenance.php');
                    break;
                case 'welcome':
                    include('sources/welcome.php');
                    break;
                case 'register':
                    include('sources/register.php');
                    break;
                case 'confirm-sms':
                    include('sources/confirm_sms.php');
                    break;
                case 'confirm-sms-password':
                    include('sources/confirm_sms_password.php');
                    break;
                case 'forgot-password':
                    include('sources/forgot_password.php');
                    break;
                case 'reset-password':
                    include('sources/reset_password.php');
                    break;
                case 'activate':
                    include('sources/activate.php');
                    break;
                case 'logout':
                    include('sources/logout.php');
                    break;
                case '404':
                    include('sources/404.php');
                    break;
                case 'contact-us':
                    include('sources/contact.php');
                    break;
                case 'user-activation':
                    include('sources/user_activation.php');
                    break;
                case 'upgraded':
                    include('sources/upgraded.php');
                    break;
                case 'oops':
                    include('sources/oops.php');
                    break;
                case 'oauth':
                    include('sources/oauth.php');
                    break;
                case 'app_api':
                    include('sources/apps_api.php');
                    break;
                case 'authorize':
                    include('sources/authorize.php');
                    break;
                case 'app-setting':
                    include('sources/app_setting.php');
                    break;
                case 'developers':
                    include('sources/developers.php');
                    break;
                case 'create-app':
                    include('sources/create_app.php');
                    break;
                case 'app':
                    include('sources/app_page.php');
                    break;
                case 'apps':
                    include('sources/apps.php');
                    break;
                case 'unusual-login':
                    include('sources/unusual-login.php');
                    break;
                case 'terms':
                    include('sources/term.php');
                    break;
            }
        }
    } else {
        switch ($page) {
            case 'maintenance':
                include('sources/maintenance.php');
                break;
            case 'get_news_feed':
                include('sources/get_news_feed.php');
                break;
            case 'video-call':
                include('sources/video.php');
                break;
            case 'video-call-api':
                include('sources/video_call_api.php');
                break;
            case 'home':
                include('sources/home.php');
                break;
            case 'welcome':
                include('sources/welcome.php');
                break;
            case 'register':
                include('sources/register.php');
                break;
            case 'confirm-sms':
                include('sources/confirm_sms.php');
                break;
            case 'confirm-sms-password':
                include('sources/confirm_sms_password.php');
                break;
            case 'forgot-password':
                include('sources/forgot_password.php');
                break;
            case 'reset-password':
                include('sources/reset_password.php');
                break;
            case 'start-up':
                include('sources/start_up.php');
                break;
            case 'activate':
                include('sources/activate.php');
                break;
            case 'search':
                include('sources/search.php');
                break;
            case 'timeline':
                include('sources/timeline.php');
                break;
            case 'pages':
                include('sources/my_pages.php');
                break;
            case 'suggested-pages':
                include('sources/suggested_pages.php');
                break;
            case 'liked-pages':
                include('sources/liked_pages.php');
                break;
            case 'joined_groups':
                include('sources/joined_groups.php');
                break;
            case 'go-pro':
                include('sources/go_pro.php');
                break;
            case 'page':
                include('sources/page.php');
                break;
            case 'poke':
                include('sources/poke.php');
                break;
            case 'most_liked':
                include('sources/most_liked.php');
                break;
            case 'groups':
                include('sources/my_groups.php');
                break;
            case 'suggested-groups':
                include('sources/suggested_groups.php');
                break;
            case 'group':
                include('sources/group.php');
                break;
            case 'create-group':
                include('sources/create_group.php');
                break;
            case 'group-setting':
                include('sources/group_setting.php');
                break;
            case 'create-page':
                include('sources/create_page.php');
                break;
            case 'setting':
                include('sources/setting.php');
                break;
            case 'page-setting':
                include('sources/page_setting.php');
                break;
            case 'messages':
                include('sources/messages.php');
                break;
            case 'logout':
                include('sources/logout.php');
                break;
            case '404':
                include('sources/404.php');
                break;
            case 'post':
                include('sources/story.php');
                break;
            case 'game':
                include('sources/game.php');
                break;
            case 'games':
                include('sources/games.php');
                break;
            case 'new-game':
                include('sources/new_games.php');
                break;
            case 'saved-posts':
                include('sources/savedPosts.php');
                break;
            case 'hashtag':
                include('sources/hashtag.php');
                break;
            case 'terms':
                include('sources/term.php');
                break;
            case 'albums':
                include('sources/my_albums.php');
                break;
            case 'watch':
                include('sources/watch.php');
                break;
            case 'reels':
                include('sources/reels.php');
                break;
            case 'album':
                include('sources/album.php');
                break;
            case 'create-album':
                include('sources/create_album.php');
                break;
            case 'contact-us':
                include('sources/contact.php');
                break;
            case 'user-activation':
                include('sources/user_activation.php');
                break;
            case 'upgraded':
                include('sources/upgraded.php');
                break;
            case 'oops':
                include('sources/oops.php');
                break;
            case 'boosted-pages':
                include('sources/boosted_pages.php');
                break;
            case 'boosted-posts':
                include('sources/boosted_posts.php');
                break;
            case 'new-product':
                include('sources/new_product.php');
                break;
            case 'edit-product':
                include('sources/edit_product.php');
                break;
            case 'products':
                include('sources/products.php');
                break;
            case 'my-products':
                include('sources/my_products.php');
                break;
            case 'site-pages':
                include('sources/site_pages.php');
                break;
            case 'blogs':
                include('sources/blog.php');
                break;
            case 'my-blogs':
                include('sources/my_blogs.php');
                break;
            case 'create-blog':
                include('sources/create_blog.php');
                break;
            case 'read-blog':
                include('sources/read_blog.php');
                break;
            case 'edit-blog':
                include('sources/edit_blog.php');
                break;
            case 'blog-category':
                include('sources/blog_category.php');
                break;
            case 'forum':
                include('sources/forum/forum.php');
                break;
            case 'forum-members':
                include('sources/forum/forum_members.php');
                break;
            case 'forum-members-byname':
                include('sources/forum/forum_members_byname.php');
                break;
            case 'forum-events':
                include('sources/forum/forum_events.php');
                break;
            case 'forum-search':
                include('sources/forum/forum_search.php');
                break;
            case 'forum-search-result':
                include('sources/forum/forum_search.php');
                break;
            case 'forum-help':
                include('sources/forum/forum_help.php');
                break;
            case 'forums':
                include('sources/forum/forumdisplay.php');
                break;
            case 'forumaddthred':
                include('sources/forum/forums_add_thread.php');
                break;
            case 'showthread':
                include('sources/forum/forum_showthread.php');
                break;
            case 'threadreply':
                include('sources/forum/forum_threadreply.php');
                break;
            case 'threadquote':
                include('sources/forum/forum_threadquote.php');
                break;
            case 'editreply':
                include('sources/forum/forum_editreply.php');
                break;
            case 'deletereply':
                include('sources/forum/forum_deletereply.php');
                break;
            case 'mythreads':
                include('sources/forum/forum_mythreads.php');
                break;
            case 'mymessages':
                include('sources/forum/forum_mymessages.php');
                break;
            case 'edithread':
                include('sources/forum/forum_edithread.php');
                break;
            case 'deletethread':
                include('sources/forum/forum_deletethread.php');
                break;
            case 'create-event':
                include('sources/events/create_event.php');
                break;
            case 'edit-event':
                include('sources/events/edit_event.php');
                break;
            case 'events':
                include('sources/events/events_upcomming.php');
                break;
            case 'events-going':
                include('sources/events/events_going.php');
                break;
            case 'events-interested':
                include('sources/events/events_interested.php');
                break;
            case 'events-past':
                include('sources/events/events_past.php');
                break;
            case 'show-event':
                include('sources/events/show_event.php');
                break;
            case 'events-invited':
                include('sources/events/events_invited.php');
                break;
            case 'my-events':
                include('sources/events/my_events.php');
                break;
            case 'oauth':
                include('sources/oauth.php');
                break;
            case 'app_api':
                include('sources/apps_api.php');
                break;
            case 'authorize':
                include('sources/authorize.php');
                break;
            case 'app-setting':
                include('sources/app_setting.php');
                break;
            case 'developers':
                include('sources/developers.php');
                break;
            case 'create-app':
                include('sources/create_app.php');
                break;
            case 'app':
                include('sources/app_page.php');
                break;
            case 'apps':
                include('sources/apps.php');
                break;
            case 'sharer':
                include('sources/sharer.php');
                break;
            case 'movies':
                include('sources/movies/movies.php');
                break;
            case 'movies-genre':
                include('sources/movies/movies_genre.php');
                break;
            case 'movies-country':
                include('sources/movies/movies_country.php');
                break;
            case 'watch-film':
                include('sources/movies/watch_film.php');
                break;
            case 'advertise':
                include('sources/ads/ads.php');
                break;
            case 'wallet':
                include('sources/ads/wallet.php');
                break;
            case 'send_money':
                include('sources/ads/send_money.php');
                break;
            case 'create-ads':
                include('sources/ads/create_ads.php');
                break;
            case 'edit-ads':
                include('sources/ads/edit_ads.php');
                break;
            case 'chart-ads':
                include('sources/ads/chart_ads.php');
                break;
            case 'manage-ads':
                include('sources/ads/admin.php');
                break;
            case 'create-status':
                include('sources/status/create.php');
                break;
            case 'friends-nearby':
                include('sources/friends_nearby.php');
                break;
            case 'more-status':
                include('sources/status/more-status.php');
                break;
            case 'unusual-login':
                include('sources/unusual-login.php');
                break;
            case 'jobs':
                include('sources/jobs.php');
                break;
            case 'common_things':
                include('sources/common_things.php');
                break;
            case 'funding':
                include('sources/funding.php');
                break;
            case 'my_funding':
                include('sources/my_funding.php');
                break;
            case 'create_funding':
                include('sources/create_funding.php');
                break;
            case 'edit_fund':
                include('sources/edit_fund.php');
                break;
            case 'show_fund':
                include('sources/show_fund.php');
                break;
            case 'monetization':
                include('sources/monetization.php');
                break;
            case 'subscriptions':
                include('sources/subscriptions.php');
                break;
            case 'memories':
                include('sources/memories.php');
                break;
            case 'refund':
                include('sources/refund.php');
                break;
            case 'offers':
                include('sources/offers.php');
                break;
            case 'nearby_shops':
                include('sources/nearby_shops.php');
                break;
            case 'nearby_business':
                include('sources/nearby_business.php');
                break;
            case 'live':
                include('sources/live.php');
                break;
            case 'checkout':
                include('sources/checkout.php');
                break;
            case 'purchased':
                include('sources/purchased.php');
                break;
            case 'customer_order':
                include('sources/customer_order.php');
                break;
            case 'orders':
                include('sources/orders.php');
                break;
            case 'order':
                include('sources/order.php');
                break;
            case 'reviews':
                include('sources/reviews.php');
                break;
            case 'open_to_work_posts':
                include('sources/open_to_work_posts.php');
                break;
            case 'withdrawal':
                include('sources/withdrawal.php');
                break;
            case 'directory':
                include('sources/directory/directory.php');
                break;
            case 'directory-users':
                include('sources/directory/users.php');
                break;
            case 'directory-pages':
                include('sources/directory/pages.php');
                break;
            case 'directory-groups':
                include('sources/directory/groups.php');
                break;
            case 'directory-events':
                include('sources/directory/events.php');
                break;
            case 'directory-games':
                include('sources/directory/games.php');
                break;
            case 'directory-market':
                include('sources/directory/market.php');
                break;
            case 'directory-movies':
                include('sources/directory/movies.php');
                break;
            case 'directory-jobs':
                include('sources/directory/jobs.php');
                break;
            case 'directory-fundings':
                include('sources/directory/fundings.php');
                break;
            case 'directory-blogs':
                include('sources/directory/blogs.php');
                break;
            case 'directory-forums':
                include('sources/directory/forums.php');
                break;
            case 'explore':
                include('sources/explore.php');
                break;
        }
    }
} else {
    switch ($page) {
        case 'maintenance':
            include('sources/maintenance.php');
            break;
        case 'welcome':
            include('sources/welcome.php');
            break;
        case 'register':
            include('sources/register.php');
            break;
        case 'confirm-sms':
            include('sources/confirm_sms.php');
            break;
        case 'confirm-sms-password':
            include('sources/confirm_sms_password.php');
            break;
        case 'forgot-password':
            include('sources/forgot_password.php');
            break;
        case 'reset-password':
            include('sources/reset_password.php');
            break;
        case 'activate':
            include('sources/activate.php');
            break;
        case 'logout':
            include('sources/logout.php');
            break;
        case '404':
            include('sources/404.php');
            break;
        case 'contact-us':
            include('sources/contact.php');
            break;
        case 'user-activation':
            include('sources/user_activation.php');
            break;
        case 'oops':
            include('sources/oops.php');
            break;
        case 'unusual-login':
            include('sources/unusual-login.php');
            break;
        case 'banned':
            include('sources/banned.php');
            break;
        case 'home':
            include('sources/banned.php');
            break;
        case 'directory':
            include('sources/directory/directory.php');
            break;
        case 'directory-posts':
            include('sources/directory/posts.php');
            break;
        case 'directory-users':
            include('sources/directory/users.php');
            break;
        case 'directory-pages':
            include('sources/directory/pages.php');
            break;
        case 'directory-groups':
            include('sources/directory/groups.php');
            break;
        case 'directory-events':
            include('sources/directory/events.php');
            break;
        case 'directory-games':
            include('sources/directory/games.php');
            break;
        case 'directory-market':
            include('sources/directory/market.php');
            break;
        case 'direcajax_loadtory-movies':
            include('sources/directory/movies.php');
            break;
        case 'directory-jobs':
            include('sources/directory/jobs.php');
            break;
        case 'directory-fundings':
            include('sources/directory/fundings.php');
            break;
        case 'directory-blogs':
            include('sources/directory/blogs.php');
            break;
        case 'directory-forums':
            include('sources/directory/forums.php');
            break;
        default:
            include('sources/banned.php');
            break;
    }
}
if (empty($wo['content'])) {
    include('sources/404.php');
}
$data = array();
if (empty($wo['title'])) {
    $data['title'] = $wo['config']['siteTitle'];
}
$data['url']             = '';
$actual_link             = "http://$_SERVER[HTTP_HOST]";
$data['title']           = stripslashes(Wo_Secure($wo['title']));
$data['page']            = $wo['page'];
$data['welcome_page']    = 0;
$data['is_css_file']     = 0;
$data['css_file_header'] = '';
$data['welcome_url']     = Wo_SeoLink('index.php?link1=welcome');
if ($wo['page'] == 'welcome') {
    $data['welcome_page'] = 1;
}
if ($wo['page'] == 'timeline' && $wo['loggedin'] == true && $wo['config']['css_upload'] == 1 && !empty($wo['user_profile'])) {
    if (!empty($wo['user_profile']['css_file']) && file_exists($wo['user_profile']['css_file'])) {
        $data['is_css_file']     = 1;
        $data['css_file']        = '<link rel="stylesheet" class="styled-profile" href="' . Wo_GetMedia($wo['user_profile']['css_file']) . '">';
        $data['css_file_header'] = $wo['css_file_header'];
    }
}
$data['is_footer'] = 0;
if (in_array($wo['page'], $wo['footer_pages'])) {
    $data['is_footer'] = 1;
}
$url = '';
if (!empty($_POST['url'])) {
    $url = $_POST['url'];
}
$data['redirect'] = 0;
if ($wo['redirect'] == 1) {
    $data['redirect'] = 1;
}
// if (strpos($_SERVER["HTTP_REFERER"], 'messages') !== false) {
//    $data['redirect'] = 1;
// }
$data['url'] = Wo_SeoLink('index.php' . $url);

if (!empty($wo['page_url'])) {
    $data['url'] = $wo['page_url'];
}
?>
<input type="hidden" id="json-data" value='<?php
echo htmlspecialchars(json_encode($data));
?>'>
<?php
echo $wo['content'];
?>
