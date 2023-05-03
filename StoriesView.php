<?php
   ob_start();
   require_once '../../global.php';
   
      $users = $db->query("SELECT * FROM players WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
      $user = $users->fetch_array();
   
      $userid = $Functions->FilterText($_GET['userid']);
   
      $ruser = $db->query("SELECT * FROM players WHERE id = '".$userid."'");
      $userinfo = $ruser->fetch_array();
   
   $resultview = $db->query("SELECT * FROM cms_stories ORDER BY id DESC LIMIT 1");
                 
                    $view = $resultview->fetch_array();
   				 
   				 $result2 = $db->query("SELECT * FROM cms_stories WHERE user_id = '".$userid."'");
   
   				 if($result2->num_rows > 0){
   ?>
   
<div id="rydHSG45s" style="transform: scale(1); display: block; transition: all 0.3s ease 0s;"> <div onclick="fghjk()" id="stories7"></div>
<script>
        var currentIndex = 0;
        var ePanes = $('.vistoriecontent'),
            time = 5000,
            bar = $('.progress_bar');

        $('.storieviewlist li').click(function (ev) {
            bar.stop();
            run();
            var currentIndex = $(this).index();
            showPane($(this).index());
        });
        $('.previous').click(function () {
            bar.stop();
            run();
            showPane(currentIndex - 1);
            showPane(currentIndex - 1);
        });
        $('.next').click(function () {
            bar.stop();
            run();
        });
        showPane(-1);

        run();
    </script>
<br>	
<div id="stories8">
<div id="str1">
<div id="str2">
<img id="str3" src="<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=std&direction=2&head_direction=2&size=n&headonly=1&img_format=png">
</div>
<div id="str4">
<?php echo $userinfo['username']; ?></div>
</div>
<div onmouseover="StopStory()" id="viewstorie">
<div id="contentbar">
<div id="progress_bar" class="progress_bar" style="width: 190.863px; overflow: hidden;"></div>
</div>
<div class="wrap">
<?php 	global $db;
               $result = $db->query("SELECT * FROM cms_stories WHERE user_id = '".$userid."'");
               if($result->num_rows > 0){
               while($data = $result->fetch_array()){
				   
				   $result22 = $db->query("SELECT * FROM server_camera WHERE id = '".$data['photo']."'");
                   $data22 = $result22->fetch_array();
				   
               	$resultlikes = $db->query("SELECT * FROM cms_stories_likes WHERE photo_id = '".$data['id']."' AND user_id = '".$user['id']."'");
               	$resultlikes2 = $db->query("SELECT * FROM cms_stories_likes WHERE photo_id = '".$data['id']."'");
               	$likes = $resultlikes->fetch_array();
               	if($resultlikes->num_rows > 0){
               					$likecheck = '<div class="df'.$data['id'].'" style="opacity: 0.5;" onclick="LikeStories('.$data['id'].')" id="stories26">
<div id="stories27"></div>
</div>';
               		}else{
               						$likecheck = '<div class="df'.$data['id'].'" style="opacity: 1;" onclick="LikeStories('.$data['id'].')" id="stories26">
<div id="stories27"></div>
</div>';
               
			   
               
               }
			   
	if($resultlikess->num_rows > 0){
               					$likechecks = '<div class="df'.$data['id'].'" style="opacity: 0.5;"  id="stories26">
<div id="stories27"></div>
</div>';
               		}else{
               						$likechecks = '<div class="df'.$data['id'].'" style="opacity: 1;" id="stories26">
<div id="stories27"></div>
</div>';
               
			   
               
               }			   
				  $sql2 = $db->query("SELECT * FROM cms_stories_views WHERE photo_id = '".$data['id']."'");
               ?>
<?php if($user['rank'] > 0){ ?>
			   <?php 	global $db;
			   $rstoriesv = $db->query("SELECT * FROM cms_stories_views WHERE user_id = '".$user['id']."' AND photo_id = '".$data['id']."'");
               if($rstoriesv->num_rows > 0){
               	}else{
                   $dbRegister = array();
                  $dbRegister['user_id'] = $user['id'];
                  $dbRegister['photo_id'] = $data['id'];
                  $dbRegister['time'] = time();
                  $query = $db->insertInto('cms_stories_views', $dbRegister);}
			   
			    ?>
	<?php } ?>			
<div class="vistoriecontent" style="">
<div id="str5">
<div id="str6">
<?php echo $Functions->GetLasts($data['time']); ?> <div id="str7"></div>
</div>
<div id="str6">
<?php echo $Functions->number_format_short($sql2->num_rows); ?> <div id="str8"></div>
</div>
</div>
<div id="str9" style="background:url(<?php echo PATH ?>/photo/selfies/<?php echo $data22['hash']; ?>.png);">
<?php if($data['text'] == NULL){}else{ ?><div style="top:<?php echo $data['top']; ?>px;" id="str23"><?php echo $data['text']; ?></div>

<?php } ?>
</div>
<div id="stories24">
<div id="str10"></div>


<div id="stories29">

<div id="stories28" class="dx<?php echo $data['id']; ?>"><?php echo $resultlikes2->num_rows; ?></div>
Likes
<div id="str11">
<div id="str12"></div>
<div id="str13"><?php echo $userinfo['username']; ?></div>
</div>
</div>
</div>
<?php global $db; if($user['id'] > 0){ ?>
 <?php echo $likecheck; ?>
<?php global $db; }else{ ?>
 <?php echo $likechecks; ?>
<?php } ?>

</div>

 

<?php }} ?>
</div>

</div>
<div id="stories10" class="previous"></div>
<div id="stories11" class="next"></div>
</div>
</div>


<?php }else{ ?>
<div id="rydHSG45s" style="transform: scale(1); display: block; transition: 0.3s;">
   <div onclick="fghjk()" id="stories7"></div>
   <div id="strload2">
      <div id="strload3"></div>
      <br>Aún no tienes una historia
   </div>
</div>
<?php } ?>