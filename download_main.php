<?php
require_once('admin/config.php');
require_once('includes/url_slug.php'); 

$json = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id='.$_GET["q"].'&key='.$youtube_key.'&part=snippet');
$yt_data = json_decode($json);
$yt_id = $_GET["q"];
?>
<!DOCTYPE html>
<html>
	<head>
	<!-- Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php echo $yt_data->items[0]->snippet->title; ?> - <?php echo $videopage_title;?> - <?php echo $site_title;?></title>
    <meta name="description" content="<?php echo htmlspecialchars($yt_data->items[0]->snippet->title); ?> - <?php echo $videopage_title;?> - <?php echo $site_title;?>">
    <meta name="robots" content="noindex, follow"/>
    <meta property="og:title" content="<?php echo htmlspecialchars($yt_data->items[0]->snippet->title); ?> - <?php echo $videopage_title;?> - <?php echo $site_title;?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($yt_data->items[0]->snippet->title); ?> - <?php echo $videopage_title;?> - <?php echo $site_title;?>" />
    <meta property="og:url" content="<?php echo $site_url;?>/download/<?php echo $yt_id; ?>/<?php echo cano($yt_data->items[0]->snippet->title); ?>" />
    <meta property="og:image" content="https://img.youtube.com/vi/<?php echo $yt_id; ?>/hqdefault.jpg" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="<?php echo $site_title;?>" />
    <!-- CSS and Scripts -->
	<?php include 'includes/headscripts.php'; ?>
	</head>
	<body>

<div class="container">
	<br>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
		<!-- Search Form -->
		<form action="<?php echo $site_url;?>/search_main.php" class="input-group input-group-lg">
		<input id="you-search" name="q" type="text" class="form-control" autocomplete="off" placeholder="<?php echo $searchf_text; ?> ">
		<input type="hidden" name="change" value="1">
		<span class="input-group-btn">
		<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		</span>
		</form>
		<!-- /Search Form -->
		</div>
	</div>
</div>

  <div class="container">
	<div class="row">
		<div class="col-md-12">

		<br>




<?php
$video_ID = 'your-video-ID';
$JSON = file_get_contents("https://gdata.youtube.com/feeds/api/videos/{$video_ID}?v=2&alt=json");
$JSON_Data = json_decode($JSON);
$views = $JSON_Data->{'entry'}->{'yt$statistics'}->{'viewCount'};
echo $views;
?>
        
<!-- /aqui va el titulo original del codigo div con la clase page-header -->
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
		<?php if($show_vid_embed): ?>
			<div class="embed-responsive embed-responsive-16by9">

			

			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $yt_id; ?>?rel=0&amp;autoplay=1" frameborder="0" allowfullscreen ></iframe>
            
			</div>

			
			  <h3 class="titulod"><?php echo '' . $yt_data->items[0]->snippet->title . ''; ?></h3>
			
		 	

<h5></h5>
			 <h3 class="canalt"><?php echo '' . $yt_data->items[0]->snippet->channelTitle . ''; ?></h3>





		<?php endif; ?>	
<?php if(isset($down_ad_728) and !empty($down_ad_728)): ?>
<div style="margin:0px 0px 20px 0px;">
<?php $down_ad_728 = str_replace('@', '"', $down_ad_728);
echo $down_ad_728; ?>
</div>
<?php endif; ?>		
		<?php if($show_down_but): ?>
			<div class="mboton" >
            <div class="btn-group btn-group-justified">
			<div class="btn-group">
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#downloads" title="<?php echo $vid_down_but; ?>"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" margint fill="#FFFFFF"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.49,2,2,6.49,2,12s4.49,10,10,10s10-4.49,10-10S17.51,2,12,2z M12,20c-4.41,0-8-3.59-8-8s3.59-8,8-8s8,3.59,8,8 S16.41,20,12,20z M14.59,8.59L16,10l-4,4l-4-4l1.41-1.41L11,10.17V6h2v4.17L14.59,8.59z M17,17H7v-2h10V17z"/></g></g></svg> </button>

        

            

             
			</div>



			</div
</div>


          
			<br>

           
             














            <br>
		<?php endif; ?>	
			<?php if($show_vid_descr): ?>
			<p><?php echo $yt_data->items[0]->snippet->description; ?></p>
			<?php endif; ?>
			<?php if($show_rel_searches): ?>
			<?php if(!empty($yt_data->items[0]->snippet->tags)): ?>
			<div class="page-header">
			<h3><?php echo $vid_recen_title; ?></h3>
			</div>
			<?php foreach ($yt_data->items[0]->snippet->tags as $items) { echo '<a class="btn btn-info btn-xs" style="margin:0px 2px 2px 0px;" href="'.$site_url.'/music/'.cano($items).'">'.$items.'</a>'; } ?>
			<?php endif; ?>
			<?php endif; ?>
		</div>

		
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<center><p><?php echo $home_mensaje_title;?></p></center>

			<br>

		</div>
	</div>
</div>


<br>
<div class="col-md-12">
<center><h3 class="titulod" >Video Musicales</h3></center>
</div>
<br>





<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php
function ApiParse($Url){

  if(function_exists('curl_version')){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_URL,$Url);
    $result=curl_exec($ch);
    curl_close($ch);

  }
  else {

   $result = file_get_contents($Url);

  }

  $data = json_decode($result, true);

  if(isset($data['items']) && count($data['items']) > 0 ){
    return $data;
  } else {
  
    return false;
  }
}
function FormatDuration($duration){
	$FormatTime = new DateTime('@0');
	$FormatTime->add(new DateInterval($duration));
	// return $FormatTime->format('H:i:s');
	if ($FormatTime->format('H') > 0) {
	return $FormatTime->format('H:i:s');
	}
	else {
	return $FormatTime->format('i:s');
	}
}
if (isset($_GET['page'])) { 
$ptoken = $_GET['page'];
$pagetoken = str_replace('/', '', $ptoken);
} 
else { 
$pagetoken = "";
}

/* https://developers.google.com/youtube/v3/docs/search/list */
$data_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=5&safeSearch=strict&type=video&q=vevotop&key='.$youtube_key.'&pageToken='.$pagetoken.'';
$response = ApiParse($data_url);

// echo $response['items'][0]['id']['videoId'];
// echo '<pre>'; print_r( $response ); echo '</pre>';
// yt key 2
if (isset($response['error']['errors'][0]['reason']) && ($response['error']['errors'][0]['reason'] == 'quotaExceeded') && (isset($youtube_key_2))) {
	$data_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults='.$nr_search_result.'&safeSearch=strict&type=video&q='.$yt_id.'&key='.$youtube_key_2.'&pageToken='.$pagetoken.'';
	$response = ApiParse($data_url);
}
// yt key 3
if (isset($response['error']['errors'][0]['reason']) && ($response['error']['errors'][0]['reason'] == 'quotaExceeded') && (isset($youtube_key_3))) {
	$data_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults='.$nr_search_result.'&safeSearch=strict&type=video&q='.$yt_id.'&key='.$youtube_key_3.'&pageToken='.$pagetoken.'';
	$response = ApiParse($data_url);
}
// yt key 4
if (isset($response['error']['errors'][0]['reason']) && ($response['error']['errors'][0]['reason'] == 'quotaExceeded') && (isset($youtube_key_4))) {
	$data_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults='.$nr_search_result.'&safeSearch=strict&type=video&q='.$yt_id.'&key='.$youtube_key_4.'&pageToken='.$pagetoken.'';
	$response = ApiParse($data_url);
}
// yt key 5
if (isset($response['error']['errors'][0]['reason']) && ($response['error']['errors'][0]['reason'] == 'quotaExceeded') && (isset($youtube_key_5))) {
	$data_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults='.$nr_search_result.'&safeSearch=strict&type=video&q='.$yt_id.'&key='.$youtube_key_5.'&pageToken='.$pagetoken.'';
	$response = ApiParse($data_url);
}
// yt key 6
if (isset($response['error']['errors'][0]['reason']) && ($response['error']['errors'][0]['reason'] == 'quotaExceeded') && (isset($youtube_key_6))) {
	$data_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults='.$nr_search_result.'&safeSearch=strict&type=video&q='.$yt_id.'&key='.$youtube_key_6.'&pageToken='.$pagetoken.'';
	$response = ApiParse($data_url);
}
// yt key 7
if (isset($response['error']['errors'][0]['reason']) && ($response['error']['errors'][0]['reason'] == 'quotaExceeded') && (isset($youtube_key_7))) {
	$data_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults='.$nr_search_result.'&safeSearch=strict&type=video&q='.$yt_id.'&key='.$youtube_key_7.'&pageToken='.$pagetoken.'';
	$response = ApiParse($data_url);
}
// yt key 8
if (isset($response['error']['errors'][0]['reason']) && ($response['error']['errors'][0]['reason'] == 'quotaExceeded') && (isset($youtube_key_8))) {
	$data_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults='.$nr_search_result.'&safeSearch=strict&type=video&q='.$yt_id.'&key='.$youtube_key_8.'&pageToken='.$pagetoken.'';
	$response = ApiParse($data_url);
}
// yt key 9
if (isset($response['error']['errors'][0]['reason']) && ($response['error']['errors'][0]['reason'] == 'quotaExceeded') && (isset($youtube_key_9))) {
	$data_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults='.$nr_search_result.'&safeSearch=strict&type=video&q='.$yt_id.'&key='.$youtube_key_9.'&pageToken='.$pagetoken.'';
	$response = ApiParse($data_url);
}
// yt key 10
if (isset($response['error']['errors'][0]['reason']) && ($response['error']['errors'][0]['reason'] == 'quotaExceeded') && (isset($youtube_key_10))) {
	$data_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults='.$nr_search_result.'&safeSearch=strict&type=video&q='.$yt_id.'&key='.$youtube_key_10.'&pageToken='.$pagetoken.'';
	$response = ApiParse($data_url);
}

if (empty($response)) { 
echo $search_noresults_title;
}
else { 
// if response is not empty do this:
if (isset($response['nextPageToken'])) { 
$n_token = $response['nextPageToken'];
} 
else { 
$n_token = "";
}
if (isset($response['prevPageToken'])) { 
$prev_token = $response['prevPageToken'];
} 
else { 
$prev_token = "";
}
//foreach ($response['items'] as $key => $ytid): 
//	if($key > 0):
//	echo ",";
//	endif;
//	echo $ytid['id']['videoId'];
//endforeach;
$tmp = '';
foreach($response['items'] as $key => $v) {
	if($key > 0){
	$tmp .= ",";
	}
    $tmp .= $v['id']['videoId'];
}
//echo $tmp;
/* https://developers.google.com/youtube/v3/docs/videos/list#try-it */
$stats_data_url = 'https://www.googleapis.com/youtube/v3/videos?part=contentDetails,statistics&id='.$tmp.'&key='.$youtube_key.'';
$stats_response = ApiParse($stats_data_url);
//echo '<pre>'; print_r( $stats_response ); echo '</pre>';

$count = 0; 
foreach ($response['items'] as $video) {
?>
<div class="panel panel-default">
  <div class="panel-body">
<div id="item-<?php echo $video['id']['videoId'];?>">
						<ul class="media-list">
						  <li class="media">
						    <div class="media-left">
						      <a href="<?php echo $site_url;?>/download/<?php echo $video['id']['videoId'];?>/<?php echo cano($video['snippet']['title']);?>">
						       
                               	<img src="https://i.ytimg.com/vi/<?php echo $video['id']['videoId'];?>/hq720.jpg" width="100%" height="214px" scrolling="yes" style="border:none;"></img>

                                   <div id="player-<?php echo $video['id']['videoId'];?>" class="player clearfix"></div>

						      </a>
						    </div>
						    <div class="media-body">
						      <h4 class="media-heading"><a href="<?php echo $site_url;?>/download/<?php echo $video['id']['videoId'];?>/<?php echo cano($video['snippet']['title']);?>" title="<?php echo htmlspecialchars( $video['snippet']['title'] ); ?>"><?php echo htmlspecialchars( $video['snippet']['title'] ); ?></a></h4>
						      <div class="well" style="padding: 1px;margin-bottom: 0px; margin-left:8px;">
							
								 <?php 
						// echo $count;
						echo '<span  aria-hidden="true" style="margin-left: -5px;margin-right: -3px;"></span>' . number_format($stats_response['items'][$count]['statistics']['viewCount']); 	
						if (isset($stats_response['items'][$count]['statistics']['viewCount'])) { 
						echo '<span class="glyphicon glyphicon-time" aria-hidden="true" style="margin-left: 10px;margin-right: 5px;"></span>' . FormatDuration($stats_response['items'][$count]['contentDetails']['duration']);
						}
						?>    	
						    </div>
							</div>
							<div class="media-right">
				
									
						    </div>
						  </li>
						</ul>

</div>
</div>
</div>

<?php 
 $count++; 
}
}
?>

		</div>
	</div>
</div>
<nav>
  <ul class="pager">
    <?php if(isset($prev_token) and !empty($prev_token)): ?>
    <li><a rel="nofollow" href="<?php echo $site_url;?>/music/<?php echo $search_term;?>/<?php echo $prev_token;?>"><?php echo $search_nav_prev;?></a></li>
	<?php endif; ?>
	<?php if(isset($n_token) and !empty($n_token)): ?>
    <li><a rel="nofollow" href="<?php echo $site_url;?>/music/<?php echo $search_term;?>/<?php echo $n_token;?>"><?php echo $search_nav_next;?></a></li>
	<?php endif; ?>
  </ul>
</nav>
















<div class="modal fade" id="downloads" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $vid_down_but; ?></h4>
      </div>
      <div class="modal-body" style="max-width: 380px;margin: 0px auto;">
<?php if(isset($downmod_ad_300) and !empty($downmod_ad_300)): ?>
<div style="text-align: center;margin:0px 0px 20px 0px;">
<?php $downmod_ad_300 = str_replace('@', '"', $downmod_ad_300);
echo $downmod_ad_300; ?>
</div>
<?php endif; ?>		  
<center>
	<iframe src="https://www.youtubepi.com/watch?v=<?php echo $yt_id; ?>" width="380px" height="500px" scrolling="yes" style="border:none;"></iframe>
</center>
	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="images" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $vid_down_but; ?></h4>
      </div>
      <div class="modal-body" style="max-width: 380px;margin: 0px auto;">
<?php if(isset($downmod_ad_300) and !empty($downmod_ad_300)): ?>
<div style="text-align: center;margin:0px 0px 20px 0px;">
<?php $downmod_ad_300 = str_replace('@', '"', $downmod_ad_300);
echo $downmod_ad_300; ?>
</div>
<?php endif; ?>		  
<center>
	<iframe src="https://img.youtube.com/vi/<?php echo $yt_id; ?>/maxresdefault.jpg" width="380px" height="500px" scrolling="yes" style="border:none;"></iframe>
</center>
	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



 	  
<center  id="canal">
	<a href="https://www.youtube.com/watch?v=<?php echo $yt_id; ?>" width="380px" height="500px" scrolling="yes" style="border:none;"></a>
</center>
	

 


<?php include 'includes/footer.php';?>



