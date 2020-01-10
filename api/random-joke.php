
<?php
include("/var/www/html/chuck-norris/classes/CrudApiCalls.php");
$CrudApiCalls = new CrudApiCalls();

$get_data = $CrudApiCalls->callAPI('GET', 'https://matchilling-chuck-norris-jokes-v1.p.rapidapi.com/jokes/random', false);
$response = json_decode($get_data, true);


$joke = $response[value];
$image = $response[icon_url];
$joke_created = $response[created_at];
$parent_url = $response[url];

$phpdate = strtotime( $joke_created );
$mysqldate = date( 'm-d-Y H:i', $phpdate );
?>
<h3 style = 'color: blue;'><?php echo $joke; ?><img align="left" src="<?php echo $image; ?>"></h3>
<div id = "meta">
<p style='font-size: 12px;'>This joke was created on: <?php echo $mysqldate; ?></p>
<p style="margin-top: -10px; font-size: 12px;">Origin of the joke: <a href='<?php echo $parent_url; ?>' target="_blank"><?php echo $parent_url; ?></a></p>
</div>

<style>
#meta {
  margin-top: 40px;
}
</style>
