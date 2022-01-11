<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v12.0" nonce="hTxJa6NP"></script>

<div class="fb-page" data-href="https://www.facebook.com/ViveTvOficial" data-tabs="timeline" data-width="400" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ViveTvOficial" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ViveTvOficial">Vive Televisión</a></blockquote></div>

<?php
$json_object = @file_get_contents('https://graph.facebook.com/'.$page_id.'/posts?limit=4&access_token=' . $access_token);

$fbposts = json_decode($json_object);
foreach ($fbposts->data as $key => $post) {
   $postid=$post->id;
   $json_object2 = @file_get_contents('https://graph.facebook.com/'.$postid.'/attachments?access_token=' . $access_token);

   $fbdata2 = json_decode($json_object2);
   foreach ($fbdata2->data as $post2) {
    $title = $post2->title;
    $type = $post2->type;
    $url = $post2->url;
    $desc = $post2->description;
    $desc = str_replace("\n", "<br>", $desc);
    if (strlen($desc) > 200) {
        $desc = substr($desc, 0, 200) . '...<br>...<br><a href="'.$url.'" target="_blank">Ver mas</a>';
    }
    $imgsrc = $post2->media->image->src;
    if ($type=="note") {
        ?>
        <div class="wrapper">
            <a href="<?php echo $url;?>" target="_blank"><div class="img" style="background-image: url('<?php echo $imgsrc; ?>');"></div></a>
            <a href="<?php echo $url;?>" target="_blank"><h1><?php echo $title; ?></h1></a>
            <p><?php echo $desc; ?></p>
        </div>
        <?php
    }
   }
}
?>