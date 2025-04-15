<?php if ($wo['loggedin']) { ?>
    <div id="sidebar-sticky">
        <?php $activities = Wo_GetActivities(); ?>
        <ul class="list-group activity-container">
            <li class="list-group-item text-muted sidebar-title-back" contenteditable="false"><?php echo $wo['lang']['latest_activities']; ?>
                <?php if (count($activities) > 0) { ?> <span onclick="Wo_GetMoreActivities();" data-toggle="tooltip" title="<?php echo $wo['lang']['load_more_activities']; ?>" class="<?php echo Wo_RightToLeft('pull-right'); ?>  refresh">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 7.54603C13 10.8036 10.3137 13.4443 7 13.4443C3.68629 13.4443 1 10.8036 1 7.54603C1 4.28848 3.66667 1.64772 7 1.64772C11 1.64772 13 4.92456 13 4.92456M13 4.92456L13 1.44434M13 4.92456H9.8966" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 1.64772C11 1.64772 13 4.92456 13 4.92456M13 4.92456L13 1.44434M13 4.92456H9.8966" class="icon_main" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span><?php } ?>
            </li>
            <li class="activities-wrapper" id="activities-wrapper">
                <?php
                if (count($activities) == 0) {
                    echo '<h2><div class="no-activities text-center">' . $wo['lang']['no_activities'] . '</div><h2>';
                } else {
                    foreach ($activities as $wo['activity']) {
                        echo Wo_LoadPage('sidebar/activities-list');
                    }
                }
                ?>
            </li>
            <li>
                <div class="no-activities center-text"></div>
            </li>
        </ul>
    </div>
<?php } ?>