<?php
require "../config.php";
$failure = "";
$url = $_POST['url'];
$valid = 1;
if (!isset($url) || $url == '') {
    $valid = 0;
    $failure .= "The Video URL must be entered!<br/>";
} else {
        require 'YoutubeDownloader.php';
        $yt = new yt($url);
        if ($yt->get_id($url) == FALSE) {
        $valid = 0;
        $failure .= "The Youtube Video URL is Invalid!<br/>";
        }
        $yt->get_url();
        if ($yt->error == TRUE) {
        $valid = 0;
        $failure .= "The System failed to get download links, Please try again.<br/>";
        }
}
if($valid == 1){
foreach($yt->links as $key => $value){
  $yt->links[$key]['url'] = "youtube/".base64_encode($value['url']);
}
?>
<div class="download-info">
		<span class="sectionTitle">Download <?php echo $yt->yt_title; ?></span><hr>
			<img src="https://i.ytimg.com/vi/<?php echo $yt->id; ?>/hqdefault.jpg" style="width: 100%" /><br><hr>
Download: <?php
for($i=0;$i<count($yt->links);$i++){
echo "<a download href='".$yt->links[$i]["url"]."'><button type='button' style='margin: 5px;' class='btn btn-success'>".$yt->links[$i]["quality"]."</button></a>";
} ?>
<a href='<?php echo $config['site_url']; ?>'><button type='button' style='margin: 5px;' class='btn btn-primary'>Download Another Video</button></a>
</div>
<?php } else { ?>
<div class="download-info">
		<p><?php echo $failure; ?></p>
		<a href='<?php echo $config['site_url']; ?>'><button type='button' style='margin: 5px;' class='btn btn-primary'>Download Another Video</button></a>
</div>
<?php } ?>