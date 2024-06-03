<?php
include_once(__DIR__.'/../function.php');
$video_id  =  $_GET['id'];
$author_id =  $_SESSION['loggedInId'];
$isLiked = isVideoLiked($video_id,$author_id); 
if(!$isLiked){
 $data  = addVideoLike($video_id,$author_id);
}

$ajax_response = new \stdClass();
 
$totalLike    =  getTotalVideoLikes($video_id);
$ajax_response->is_success = true;
$ajax_response->message = 'Liked Successfully!';
$ajax_response->total_like = $totalLike ;
print_r(json_encode($ajax_response));
exit;

?>