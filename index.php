<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">


  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

      <!-- my stylesheet -->
  <link rel="stylesheet" href="css/styles.css">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>

<!-- start php here -->
<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "454238095-8VsPdb6RC4N8FKx60mX14rcboqf841hNWGiStGOq",
    'oauth_access_token_secret' => "ZR05hNeD6GV4v8NMZU648eqaqb4XZEm8EKXRPlpylNJWV",
    'consumer_key' => "gbYVwKFNjkrjFGzLEa9nO2Uc4",
    'consumer_secret' => "QdtGrAQ0WC8vSgiiYtBPo0ZXvnMv0iXq6e3y7ubkdIHOVYMmOY"
);


$url = 'https://api.twitter.com/1.1/users/show.json';
$getfield = '?screen_name=tylerthecreator';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$tweetData = json_decode( $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc=TRUE);

          foreach($tweetData['screen_name'] as $index => $items){
               $userArray = $items['user_id'];
               echo '<div class="tweet-border row">';
               echo '<a class="float-left" href="http://twitter.com/' . $userArray['screen_name'] . '"><img class="tweetimg" src="' . $userArray['profile_image_url'] . '"></a>';
               echo '<span>';
               echo '<a class="float-left" href="http://twitter.com/' . $userArray['screen_name'] . '"><h3 class="tweet-name">' . $userArray['name'] . '</h3>' . '</a>';
               echo '<h1 class="tweet">@' . $userArray['screen_name'] . '</h1>' . "<br />";
               echo '<h2 class="tweet-text">' . $items['text'] . '</h2>' . "<br />";
               echo '</span>';
               echo '</div>';

             }
echo "<script>pageComplete();</script>;"
?>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="tweetLinkIt.js"></script>
<script src="js/scripts.js"></script>
<script>

   function pageComplete(){
       $('.tweet').tweetLinkify();
   }
</script>

</body>

</html>
