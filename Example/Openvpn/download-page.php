
<?php

//$servers = array('ca1','ca2','ca3','us1','us2','us3','jp1','jp2','jp3');
$servers = array(
    array('name' => 'ca1', 'location' => 'ca1'),
    array('name' => 'ca2', 'location' => 'ca2'),
    array('name' => 'ca3', 'location' => 'ca3'),
    array('name' => 'us1', 'location' => 'us1'),
    array('name' => 'us2', 'location' => 'us2'),
    array('name' => 'us3', 'location' => 'us3'),
    array('name' => 'jp1', 'location' => 'jp1'),
    array('name' => 'jp2', 'location' => 'jp2'),
    array('name' => 'jp3', 'location' => 'jp3'),
);
$account = 'client21';

echo "<div style='margin-left:auto; margin-right:auto; text-align:center; width:100px'>";
foreach($servers as $server){
    $location = $server['location'];
    echo "<div style='border:1px solid' name='{$server['name']}' class='config-file'>";
    echo "<a href='/WvpnClient/Example/Openvpn/openvpn-ajax.php?account={$account}&server={$server['location']}'.>{$server['name']}</a>";
    echo "</div>";
}
echo "</div>";


