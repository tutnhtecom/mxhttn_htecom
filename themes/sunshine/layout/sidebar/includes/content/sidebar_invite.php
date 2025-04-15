<?php 
if ($wo['loggedin'] && $wo['config']['weather_widget'] == 1 && !empty($wo['config']['weather_key']) && !empty($wo['user']['lat']) && !empty($wo['user']['lng'])) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.openweathermap.org/data/2.5/onecall?lat=" . $wo['user']['lat'] . "&lon=" . $wo['user']['lng'] . "&exclude=minutely,hourly&appid=" . $wo['config']['weather_key'] . "&units=" . ($wo['user']['weather_unit'] == 'us' ? 'imperial' : 'metric') . "");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);
    curl_close($ch);
    if (!empty($response)) {
        $data = json_decode($response);
        if (!empty($data) && !empty($data->timezone)) {
?>
            <ul class="list-group">
                <div class="wow_weather">
                    <div class="wow_weather_date"><?php echo (date('d F Y', $data->current->dt)); ?></div>
                    <div class="wow_weather_timezone"><?php echo $data->timezone; ?></div>
                    <div class="wow_weather_icon">
                        <?php if ($data->current->weather[0]->icon == '01d') { ?>
                            <img src="http://openweathermap.org/img/wn/01d@2x.png">
                        <?php } elseif ($data->current->weather[0]->icon == '02d') { ?>
                            <img src="http://openweathermap.org/img/wn/02d@2x.png">
                        <?php } elseif ($data->current->weather[0]->icon == '03d') { ?>
                            <img src="http://openweathermap.org/img/wn/03d@2x.png">
                        <?php } elseif ($data->current->weather[0]->icon == '04d') { ?>
                            <img src="http://openweathermap.org/img/wn/04d@2x.png">
                        <?php } elseif ($data->current->weather[0]->icon == '09d') { ?>
                            <img src="http://openweathermap.org/img/wn/09d@2x.png">
                        <?php } elseif ($data->current->weather[0]->icon == '10d') { ?>
                            <img src="http://openweathermap.org/img/wn/10d@2x.png">
                        <?php } elseif ($data->current->weather[0]->icon == '11d') { ?>
                            <img src="http://openweathermap.org/img/wn/11d@2x.png">
                        <?php } elseif ($data->current->weather[0]->icon == '13d') { ?>
                            <img src="http://openweathermap.org/img/wn/13d@2x.png">
                        <?php } elseif ($data->current->weather[0]->icon == '50d') { ?>
                            <img src="http://openweathermap.org/img/wn/50d@2x.png">
                        <?php } ?>
                    </div>
                    <div class="wow_weather_description"><?php echo $data->current->weather[0]->main; ?></div>
                    <div class="wow_weather_current">Current Temp: <?php echo $data->current->temp; ?>&#176; <?php echo ($wo['user']['weather_unit'] == 'us' ? 'F' : 'C'); ?></div>
                    <div class="wow_weather_forecast">
                        <div class="fivedays">
                            <div><?php echo (date('l', $data->daily[1]->dt)); ?></div>
                            <?php echo $data->daily[1]->temp->min; ?>&#176; <br>-<br> <?php echo $data->daily[1]->temp->max; ?>&#176;
                        </div>
                        <div class="fivedays">
                            <div><?php echo (date('l', $data->daily[2]->dt)); ?></div>
                            <?php echo $data->daily[2]->temp->min; ?>&#176; <br>-<br> <?php echo $data->daily[2]->temp->max; ?>&#176;
                        </div>
                        <div class="fivedays">
                            <div><?php echo (date('l', $data->daily[3]->dt)); ?></div>
                            <?php echo $data->daily[3]->temp->min; ?>&#176; <br>-<br> <?php echo $data->daily[3]->temp->max; ?>&#176;
                        </div>
                        <div class="fivedays">
                            <div><?php echo (date('l', $data->daily[4]->dt)); ?></div>
                            <?php echo $data->daily[4]->temp->min; ?>&#176; <br>-<br> <?php echo $data->daily[4]->temp->max; ?>&#176;
                        </div>
                    </div>
                </div>
            </ul>

<?php }
    }
} 
?>