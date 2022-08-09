<?php 

$url = 'http://mikrotik.idekite.id:500/kpt_v2/api/pencarian/siup/mikrotik.idekite.id/WWxkc2NtTnRPVEJoVjNOMVlWZFNiR0V5YkRCYVV6VndXa0U5UFE9PQ==/6104172312690002';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);

$json = json_decode($result, true);

foreach ($json as $var) {
	echo $var['id_siup'];
}
 ?>