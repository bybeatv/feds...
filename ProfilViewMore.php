<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
   
   $users = $db->query("SELECT * FROM players WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
   $user = $users->fetch_array();
   
   $userid = $Functions->FilterText($_GET['uid']);
   $type = $Functions->FilterText($_GET['type']);
   
   $userss = $db->query("SELECT * FROM players WHERE id = '".$userid."'");
   $userinfo = $userss->fetch_array();
   
   
   
   
   ?>
<?php if($type == "room" && !empty($userid)){ ?>
<div id="profil87" style="transform: scale(1); display: block; transition: 0.3s;">
   <div onclick="closemoreprofil()" id="stories7"></div>
   <div style="position:relative;width:60%;left:25%;height:100%;">
      <div id="stories9"><?php if($userinfo['username'] == $user['username']){ ?>Mis salas<?php }else{	?>Salas de <?php echo $userinfo['username']; ?><?php }	?></div>
      <div id="profx1">
         <?php 	global $db;
            $result = $db->query("SELECT * FROM rooms WHERE owner_id = '".$userid."' ORDER BY id DESC");
            	while($data = $result->fetch_array()){?>
         <a room="<?php echo $data['id']; ?>" place="<?php echo $Functions->FilterText($data['caption']); ?>" href="/room/<?php echo $data['id']; ?>">
            <div class="profx2" style="height:130px;" id="profil76">
               <div id="profil77"></div>
               <div id="profil78">
                  <center><?php echo $Functions->FilterText($data['name']); ?></center>
               </div>
            </div>
         </a>
         <?php  } ?>
      </div>
   </div>
</div>
<?php }elseif($type == "group" && !empty($userid)){ ?>
<div id="profil87" style="transform: scale(1); display: block; transition: 0.3s;">
   <div onclick="closemoreprofil()" id="stories7"></div>
   <div style="position:relative;width:60%;left:25%;height:100%;">
      <div id="stories9"><?php if($userinfo['username'] == $user['username']){ ?>Mis grupos<?php }else{	?>Grupos de <?php echo $userinfo['username']; ?><?php }	?></div>
      <div id="profx1">
         <?php 	global $db;
            $result = $db->query("SELECT * FROM group_memberships WHERE player_id = '".$userid."' ORDER BY id DESC LIMIT 4");
            	while($data = $result->fetch_array()){
                        $resultgroup = $db->query("SELECT * FROM groups WHERE id = '".$data['group_id']."'");
            	while($groupinfo = $resultgroup->fetch_array()){
                        ?>
         <a room="<?php echo $groupinfo['room_id']; ?>" place="<?php echo $Functions->FilterText($groupinfo['name']); ?>" href="/room/<?php echo $groupinfo['room_id']; ?>">
            <div class="profx2" id="profil76">
               <div id="profil82">
                  <img style="" draggable="false" oncontextmenu="return false" alt="<?php echo $Functions->FilterText($groupinfo['name']); ?>" src="<?php echo BADGEGROUPURL . $groupinfo['badge']; ?>.gif">
               </div>
               <div id="profil78">
                  <center><?php echo $Functions->FilterText($groupinfo['name']); ?></center>
               </div>
            </div>
         </a>
         <?php  }} ?>
      </div>
   </div>
</div>
<?php } ?>