<?php
 
 $api_url = 'http://127.0.0.34/money/MoneyPROJECTFINAL/accshop/api/numuser/1';
 $get_user_number = json_decode(file_get_contents($api_url), true);
 $numuser = $get_user_number[0]['COUNT(*)'];

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
    var foo = <?php echo $numuser; ?>;
    console.log(foo);
</script>
</head>
<body>

</body>
</html>