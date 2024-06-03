<?php
include_once(__DIR__.'/../function.php');
$video_id  =  $_GET['id'];
$author_id =  $_SESSION['loggedInId'];
$isDisLiked = isVideoDisLiked($video_id,$author_id);
 $data  = addVideoDisLiked($video_id,$author_id);
if(!$isDisLiked){
     addVideoDisLiked($video_id,$author_id);
}

$ajax_response = new \stdClass();
   
$totaldisLike    =  getTotalVideoDisLikes($video_id);
    $ajax_response->is_success = true;
    $ajax_response->message = 'Disliked Successfully!';
    $ajax_response->total_dislike = $totaldisLike ;




print_r(json_encode($ajax_response));
exit;

?>
