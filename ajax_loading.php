<?php

require_once('assets/init.php');
require_once('components/ajax_loading/ajax_loading_data.php');
decryptConfigData();
// Set data value
include('components/ajax_loading/ajax_loading_value.php');

//Điêu hướng router
include('components/ajax_loading/ajax_loading_router.php');

$data = get_data($wo);

?>
<input type="hidden" id="json-data" value='<?php echo htmlspecialchars(json_encode($data)); ?>'>
<?php echo $wo['content']; ?>