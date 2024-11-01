<?php
/*
Plugin Name: WP-Phpbb Last Topics
Plugin URI: http://www.4mj.it/wordpress-phpbb-last-topics-plugin/
Description: Display the most recent topics of your phpBB forum.
Version: 1.1
Author: Peppe Argento
Author URI: http://www.4mj.it
****************************
Sorry for my english!
To exclude a category of the forum, like private forum, add AND forum_id !='2', whith the id you want exclude.
You can set the number of post to display in DESC LIMIT 0,10, where 10 is the number.
For example if you wanna exlude (id 2 e 11) write
$phpbbq = "SELECT * FROM ".$table_prefix."topics WHERE forum_id !='2' AND forum_id !='11' ORDER BY topic_last_post_id DESC LIMIT 0,10";
****************************
*/
function wpphpbb_topics() {
//set forum path, forum host
$forum_path = "";
$host = "   ";
include("".$forum_path."/config.php");
$connection = mysql_connect($dbhost, $dbuser, $dbpasswd);
$s_db = mysql_select_db($dbname, $connection);
$phpbbq = "SELECT * FROM ".$table_prefix."topics ORDER BY topic_last_post_id DESC LIMIT 0,10";
$results = mysql_query($phpbbq, $connection); 
while ($resultsow = mysql_fetch_array($results)) {
$topic_tit = $resultsow[topic_title];
// You can wrap long words below, where 60 is the lenght.
$topics_title = substr($topic_tit, 0, 60);
echo "<li><a href=\"$host"."/viewtopic.php?t=$resultsow[topic_id]\">$topics_title...</a></li>";
}
}
?>