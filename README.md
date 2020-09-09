composer require ivan-taranukhin/ip-cheker


$checker = new IpChecker();
$checker->setMask(24);
$checker->setNetwork("192.168.1.0");
$arrIp = [
    "192.168.0.1",
    "192.168.0.2",
    "192.168.0.3",
    "10.168.0.4",
];
foreach ($arrIp as $ip) {
    $arrState[] = [
        "ip" => $ip,
        "state" => $checker->setIp($ip)->check()
    ];
}
foreach ($arrState as $check) {
    if ($check['state']) {
        echo "Данный IP принадлежит этой сети.<br>";
    } else {
        echo "Данный IP НЕ принадлежит этой сети.<br>";
    }
}
$x = (new IpChecker("192.168.15.22", "192.168.15.0", 8))->check();

if ((new IpChecker("192.168.15.22", "192.168.15.0", 8))->check()) {
    echo "Данный IP принадлежит этой сети.";
    // some action
} else {
    echo "Данный IP НЕ принадлежит этой сети.";
}
