<?php
   require_once '../../global.php';
   
     //HOTEL CONFIG
   $result2 = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
   $yezz = $result2->fetch_array();
   //END HOTEL CONFIG
   
   
     $users = $db->query("SELECT * FROM players WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
     $user = $users->fetch_array();
   
   $userid = $Functions->FilterText($_GET['userid']);
     $page = $Functions->FilterText($_GET['page']);
   $newsid = $Functions->FilterText($_GET['newsid']);
   $threadid = $Functions->FilterText($_GET['threadid']);
   
   ?>
<?php if($page == "user" && !empty($userid)){ ?>
<div id="support" style="display: block;">
   <div onclick="CloseSupport()" id="fermeture"></div>
   <div id="footer30">
      <div id="footer31">Abuso en el Chat</div>
      <div onclick="LoadPageSupport('/app/load/HelpIndex.php','¿Necesitas ayuda?')" id="footer36"></div>
      <div id="footer23">
         <center>
            <div id="footer37">
               <div id="footer38" style="background:url(<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=agr&direction=2&head_direction=3&size=l&headonly=1&img_format=png)"></div>
            </div>
            <div id="footer39"><?php echo $userinfo['username']; ?></div>
         </center>
         <div id="footer40">Elija el mensaje para informar</div>
         <div id="footer41">
            <?php 	global $db;
               $result = $db->query("SELECT * FROM cms_message WHERE from_id = '".$userid."' AND for_id = '".$user['id']."' ORDER BY id DESC");
               while($data = $result->fetch_array()){
               $userss = $db->query("SELECT * FROM players WHERE id = '".$userid."'");
               $userinfo = $userss->fetch_array();
                 ?>
            <div onclick="SelectForumSupport('<?php echo $data['id']; ?>','<?php echo $userinfo['username']; ?>','<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=agr&direction=2&head_direction=3&size=l&headonly=1&img_format=png')" id="fofo<?php echo $data['id']; ?>" class="footer42" style="background: transparent;">
               <div id="footer43" style="background:url(<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=agr&direction=2&head_direction=2&size=l&headonly=1&img_format=png)"></div>
               <div id="footer44">
                  <?php echo $userinfo['username']; ?>                        
               </div>
               <div id="footer45">
                  <?php echo $Functions->FilterText($data['message']); ?>                        
               </div>
            </div>
            <div style="display:none;" id="type">user</div>
            <div style="display:none;" id="content"><?php echo $userid; ?></div>
            <div style="display:none;" id="content2"><?php echo $data['id']; ?></div>
            <?php } ?>
         </div>
         <div id="footer47">
            <div onclick="SupportFinal(1)" id="footer46">Contenido sexual</div>
            <div onclick="SupportFinal(2)" id="footer46">Hostigamiento o insultos</div>
            <div onclick="SupportFinal(3)" id="footer46">Otro contenido inapropiado</div>
         </div>
         <div style="width:calc(100% - 10px);" onclick="SupportNext()" id="footer34">Continuar</div>
      </div>
   </div>
</div>
<?php }elseif($page == "news" && !empty($newsid)){ ?>
<div id="support" style="display: block;">
   <div onclick="CloseSupport()" id="fermeture"></div>
   <div id="footer30">
      <div id="footer31">Abuso en un artículo</div>
      <div onclick="LoadPageSupport('/app/load/HelpIndex.php','¿Necesitas ayuda?')" id="footer36"></div>
      <div id="footer23">
         <center>
            <div id="footer37">
               <div id="footer38" style="background:url(<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=agr&direction=2&head_direction=3&size=l&headonly=1&img_format=png)"></div>
            </div>
            <div id="footer39">
               <?php echo $userinfo['username']; ?>                
            </div>
         </center>
         <div id="footer40">Elige el Habbo para informar</div>
         <div id="footer41">
            <?php 	global $db;
               $result = $db->query("SELECT * FROM cms_comments_news WHERE new_id = '".$newsid."' ORDER BY id DESC");
               while($data = $result->fetch_array()){
               $userss = $db->query("SELECT * FROM players WHERE username = '".$data['username']."'");
               $userinfo = $userss->fetch_array();
                 ?>
            <div onclick="SelectForumSupport('<?php echo $data['id']; ?>','<?php echo $userinfo['username']; ?>','<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=agr&direction=2&head_direction=3&size=l&headonly=1&img_format=png')" id="fofo<?php echo $data['id']; ?>" class="footer42">
               <div id="footer43" style="background:url(<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=agr&direction=2&head_direction=2&size=l&headonly=1&img_format=png)"></div>
               <div id="footer44">
                  <?php echo $userinfo['username']; ?>                        
               </div>
               <div id="footer45">
                  <?php echo $Functions->FilterText2($data['commentary']); ?>                        
               </div>
            </div>
            <div style="display:none;" id="type">news</div>
            <div style="display:none;" id="content"><?php echo $newsid; ?></div>
            <div style="display:none;" id="content2"><?php echo $data['id']; ?></div>
            <?php } ?>
         </div>
         <div id="footer47">
            <div onclick="SupportFinal(1)" id="footer46">Contenido sexual</div>
            <div onclick="SupportFinal(2)" id="footer46">Hostigamiento o insultos</div>
            <div onclick="SupportFinal(3)" id="footer46">Otro contenido inapropiado</div>
         </div>
         <div style="width:calc(100% - 10px);" onclick="SupportNext()" id="footer34">Continuar</div>
      </div>
   </div>
</div>
<?php }elseif($page == "forum" && !empty($threadid)){ ?>
<div id="support" style="display: block;">
   <div onclick="CloseSupport()" id="fermeture"></div>
   <div id="footer30">
      <div id="footer31">Abuso en el foro</div>
      <div onclick="LoadPageSupport('/app/load/HelpIndex.php','¿Necesitas ayuda?')" id="footer36"></div>
      <div id="footer23">
         <center>
            <div id="footer37">
               <div id="footer38" style="background:url(<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=agr&direction=2&head_direction=3&size=l&headonly=1&img_format=png)"></div>
            </div>
            <div id="footer39">
               <?php echo $userinfo['username']; ?>                
            </div>
         </center>
         <div id="footer40">Elige el Habbo para informar</div>
         <div id="footer41">
            <?php 	global $db;
               $result = $db->query("SELECT * FROM cms_comments_forum WHERE posted_in = '".$threadid."' ORDER BY id DESC");
               while($data = $result->fetch_array()){
               $userss = $db->query("SELECT * FROM players WHERE username = '".$data['username']."'");
               $userinfo = $userss->fetch_array();
                 ?>
            <div onclick="SelectForumSupport('<?php echo $data['id']; ?>','<?php echo $userinfo['username']; ?>','<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=agr&direction=2&head_direction=3&size=l&headonly=1&img_format=png')" id="fofo<?php echo $data['id']; ?>" class="footer42">
               <div id="footer43" style="background:url(<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=agr&direction=2&head_direction=2&size=l&headonly=1&img_format=png)"></div>
               <div id="footer44">
                  <?php echo $userinfo['username']; ?>                        
               </div>
               <div id="footer45">
                  <?php echo $Functions->FilterText2($data['commentary']); ?>                        
               </div>
            </div>
            <div style="display:none;" id="type">forum</div>
            <div style="display:none;" id="content"><?php echo $threadid; ?></div>
            <div style="display:none;" id="content2"><?php echo $data['id']; ?></div>
            <?php } ?>
         </div>
         <div id="footer47">
            <div onclick="SupportFinal(1)" id="footer46">Contenido sexual</div>
            <div onclick="SupportFinal(2)" id="footer46">Hostigamiento o insultos</div>
            <div onclick="SupportFinal(3)" id="footer46">Otro contenido inapropiado</div>
         </div>
         <div style="width:calc(100% - 10px);" onclick="SupportNext()" id="footer34">Continuar</div>
      </div>
   </div>
</div>
<?php } ?>