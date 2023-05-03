<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
   
   $users = $db->query("SELECT * FROM players WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
   $user = $users->fetch_array();
   
   $page = $Functions->FilterText($_GET['page']);
   
   
   ?>
<?php if($page == "password"){ ?>
<div class="settingsload" id="settings16" style="transform: scale(1); transition: 0.4s; display: block;">
   <div onclick="CloseSettingsAvances()" id="fermeture"></div>
   <div id="settings37">
      <div id="settings14" style="background:url(<?php echo PATH ?>/app/assets/img/pagesettings.png) -182px 0px;margin-top:20px;left:-8px;"></div>
      <div id="settings38">Mi contraseña</div>
      <div id="settings39">
         <div id="settings40"></div>
         <div id="settings41">
            <?php if($user['time_pass'] == '0'){ ?>
            ¡Tu contraseña nunca ha sido cambiada!
            <?php }else{ ?>
            Último cambio de contraseña hace <b><?php echo $Functions->GetLastFace($user['time_pass']); ?></b>
            <?php } ?>
         </div>
      </div>
      <div id="settings42">Quiero cambiar mi contraseña</div>
      <input type="password" id="newpassword" placeholder="Mi nueva contraseña" class="indexinput" style="width:calc(100% - 25px);">
      <div id="indexformsepare"></div>
      <input type="password" id="verifpassword" placeholder="Repite la contraseña" class="indexinput" style="width:calc(100% - 25px);">
      <div id="passsepare"></div>
      <input type="password" id="oldpassword" placeholder="Mi contraseña actual" class="indexinput" style="width:calc(100% - 25px);">
      <div id="indexformsepare"></div>
      <div id="settings43" onclick="SettingsActionPassword()">Editar</div>
   </div>
</div>
<?php }elseif($page == "friends"){ ?>
<div class="settingsload" id="settings16" style="transform: scale(1); transition: 0.4s; display: block;">
   <div onclick="CloseSettingsAvances()" id="fermeture"></div>
   <div id="settings19">
      <div id="settings20">Mis amigos</div>
      <div id="settings22">
         <?php 	global $db;
            $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$user['id']."'");
            while($data = $result->fetch_array()){
            
              if($data['user_one_id'] == $user['id']){$friendv = $data['user_two_id'];}
              elseif($data['user_two_id'] == $user['id']){$friendv = $data['user_one_id'];
              }
              $result2 = $db->query("SELECT * FROM players WHERE id = '".$friendv."' AND online = '1' LIMIT 1");
            if($result2->num_rows > 0){
            $statuson = 'Conectados';
            }elseif($result2->num_rows == 0){
            $statusoff = 'Desconectados';
            }
            }
            
            if($result2->num_rows == 0){
            $statuson = 'Hotel Manager';
            }
            
              ?>
         <div id="settings23"><?php echo $statuson; ?></div>
         <?php 	global $db;
            $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$user['id']."'");
            if($result->num_rows > 0){
            while($data = $result->fetch_array()){
            
              if($data['user_one_id'] == $user['id']){$friendv = $data['user_two_id'];}
              elseif($data['user_two_id'] == $user['id']){$friendv = $data['user_one_id'];
              }
              $result2 = $db->query("SELECT * FROM players WHERE id = '".$friendv."' AND online = '1'");
              while($userinfo = $result2->fetch_array()){
              ?>
         <div id="selectfriends<?php echo $userinfo['id']; ?>" onclick="SelectFriend('friendsinfo','<?php echo $userinfo['id']; ?>');" class="settings24">
            <div id="settings25" style="background:url(<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=std&direction=2&head_direction=2&size=n&headonly=1&img_format=png)"></div>
            <div id="settings26">
               <?php echo $userinfo['username']; ?> 
            </div>
         </div>
         <?php }}}else{ ?>
         <div class="settings24">
            <div id="settings25" style="background:url(<?php echo PATH ?>/app/assets/img/headfrank.png)"></div>
            <div id="settings26">Frank</div>
         </div>
         <?php } ?>
         <div id="settings27"><?php echo $statusoff; ?></div>
         <?php 	global $db;
            $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$user['id']."'");
            while($data = $result->fetch_array()){
            
              if($data['user_one_id'] == $user['id']){$friendv = $data['user_two_id'];}
              elseif($data['user_two_id'] == $user['id']){$friendv = $data['user_one_id'];
              }
              $result2 = $db->query("SELECT * FROM players WHERE id = '".$friendv."' AND online = '0'");
              while($userinfo = $result2->fetch_array()){
              ?>
         <div id="selectfriends<?php echo $userinfo['id']; ?>" onclick="SelectFriend('friendsinfo','<?php echo $userinfo['id']; ?>');" class="settings24">
            <div id="settings25" style="background:url(<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=std&direction=2&head_direction=2&size=n&headonly=1&img_format=png)"></div>
            <div id="settings26">
               <?php echo $userinfo['username']; ?> 
            </div>
         </div>
         <?php }} ?>
      </div>
      <?php 	global $db;
         $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$user['id']."'");
         if($result->num_rows > 0){
         $data = $result->fetch_array();
         
           if($data['user_one_id'] == $user['id']){$friendv = $data['user_two_id'];}
           elseif($data['user_two_id'] == $user['id']){$friendv = $data['user_one_id'];
           }
           $result2 = $db->query("SELECT * FROM players WHERE id = '".$friendv."'");
           $userinfo = $result2->fetch_array();
         
         $rstats = $db->query("SELECT * FROM player_stats WHERE player_id = '".$userinfo['id']."'");
           $stats = $rstats->fetch_array();
           ?>
      <div id="settings28">
         <div id="motto">
            <div id="settings29">
               <?php echo $userinfo['username']; ?><br>
               <x style="font-size:50%;"><?php echo $Functions->FilterText($userinfo['motto']); ?></x>
            </div>
         </div>
         <div id="settings30"></div>
         <div id="settings31"><?php echo number_format($userinfo['credits']); ?></div>
         <div id="settings32">Última conexión <?php echo $Functions->GetLast2($userinfo['last_online']); ?></div>
         <div id="settings33"></div>
         <center>
            <div id="settings34" style="background: url(<?php echo AVATARIMAGE . $userinfo['figure']; ?>&action=std&gesture=std&direction=2&head_direction=2&size=l&img_format=png);"></div>
         </center>
         <div style="display:none" id="friendid"><?php echo $userinfo['id']; ?></div>
         <div onclick="SelectFriend('deletefriend')" id="settings35">Borrar a <?php echo $userinfo['username']; ?> de mis amigos</div>
      </div>
      <?php }else{ ?>
      <div id="settings28">
         <div id="motto">
            <div id="settings29">
               Frank<br>
               <x style="font-size:50%;">Manager del Hotel</x>
            </div>
         </div>
         <div id="settings30"></div>
         <div id="settings31">0</div>
         <div id="settings32">Conectado</div>
         <div id="settings33"></div>
         <center>
            <div id="settings34" style="background: url(<?php echo PATH ?>/app/assets/img/frank.png);"></div>
         </center>
         <div style="display:none" id="friendid">0</div>
         <div onclick="SelectFriend('deletefriend')" id="settings35">Borrar a Frank de mis amigos</div>
      </div>
      <?php } ?>
      <div onclick="SelectFriend('deleteallfriend','0')" id="settings36">
         Eliminar a todos mis amigos
      </div>
   </div>
</div>
<?php }elseif($page == "pin"){ ?>
<?php if($user['email_verificado'] == 1){
	if($user['cms_pin'] == 0){ ?>
<div class="settingsload" id="settings16" style="transform: scale(1); transition: 0.4s; display: block;">
   <div onclick="CloseSettingsAvances()" id="fermeture"></div>
   <div id="settings37">
      <div id="settings14" style="background:url(<?php echo PATH ?>/app/assets/img/pagesettings.png) -268px 0px;margin-top:20px;left:-8px;"></div>
      <div id="settings38">Código PIN</div>
      <div id="settings46"></div>
      <div id="settings47">
         <x id="settings48">Asegure su cuenta ahora!</x>
         <br>
         <x style="font-size:110%;">
            Para mayor seguridad, recomendamos activar el código pin, además de la contraseña para evitar intrusos en su cuenta
         </x>
      </div>
      <div id="settings42">Cambiar mi código pin de 4 dígitos</div>
      <div id="settings49">
         <div onclick="CliquePin('a');" id="a" class="pin">..</div>
         <div onclick="CliquePin('b');" id="b" class="pin">..</div>
         <div onclick="CliquePin('c');" id="c" class="pin">..</div>
         <div onclick="CliquePin('d');" id="d" class="pin">..</div>
         <div onclick="CliquePin('e');" id="e" class="pin">..</div>
         <div onclick="CliquePin('f');" id="f" class="pin">..</div>
         <div onclick="CliquePin('g');" id="g" class="pin">..</div>
         <div onclick="CliquePin('h');" id="h" class="pin">..</div>
         <div onclick="CliquePin('i');" id="i" class="pin">..</div>
         <div onclick="CliquePin('j');" id="j" class="pin">..</div>
         <div onclick="CliquePin('x');" class="pinreset">BORRAR</div>
      </div>
      <div id="settings50">
         <input type="text" id="currentpin" placeholder="Código PIN" class="indexinput" readonly="readonly" style="width:calc(100% - 25px);">
         <div style="position:relative;height:12px;"></div>
         <input type="password" id="password" placeholder="Mi contraseña" class="indexinput" style="width:calc(100% - 25px);">
         <div id="indexformsepare"></div>
         <div id="settings43" onclick="SettingsActionPin('one')">Modificar</div>
      </div>
      <div class="end"></div>
   </div>
</div>
<?php }elseif($user['cms_pin'] == 1 || $user['cms_pin'] == 2){ ?>
<div class="settingsload" id="settings16" style="transform: scale(1); transition: 0.4s; display: block;">
   <div onclick="CloseSettingsAvances()" id="fermeture"></div>
   <div id="settings37">
      <div id="settings14" style="background:url(<?php echo PATH ?>/app/assets/img/pagesettings.png) -268px 0px;margin-top:20px;left:-8px;"></div>
      <div id="settings38">Código PIN</div>
      <div id="settings46"></div>
      <div id="settings47">
         <x id="settings48">Asegure su cuenta ahora!</x>
         <br>
         <x style="font-size:110%;">
            Para mayor seguridad, recomendamos activar el código pin, además de la contraseña para evitar intrusos en su cuenta
         </x>
      </div>
      <div id="settings42">Cambiar mi código pin de 4 dígitos</div>
      <div id="settings49">
         <div onclick="CliquePin('a');" id="a" class="pin">..</div>
         <div onclick="CliquePin('b');" id="b" class="pin">..</div>
         <div onclick="CliquePin('c');" id="c" class="pin">..</div>
         <div onclick="CliquePin('d');" id="d" class="pin">..</div>
         <div onclick="CliquePin('e');" id="e" class="pin">..</div>
         <div onclick="CliquePin('f');" id="f" class="pin">..</div>
         <div onclick="CliquePin('g');" id="g" class="pin">..</div>
         <div onclick="CliquePin('h');" id="h" class="pin">..</div>
         <div onclick="CliquePin('i');" id="i" class="pin">..</div>
         <div onclick="CliquePin('j');" id="j" class="pin">..</div>
         <div onclick="CliquePin('x');" class="pinreset">BORRAR</div>
      </div>
      <div id="settings50">
         <input type="text" id="currentpin" placeholder="Código PIN (si desea modificarlo)" class="indexinput" readonly="readonly" style="width:calc(100% - 25px);">
         <div style="position:relative;height:19px;"></div>
         <input type="text" id="oldpin" maxlength="4" placeholder="Mi PIN actual" class="indexinput" style="width:calc(100% - 25px);">
         <div style="position:relative;height:19px;"></div>
         <input type="password" id="password" placeholder="Mi contraseña" class="indexinput" style="width:calc(100% - 25px);">
         <div id="indexformsepare"></div>
      </div>
      <div class="end"></div>
      <br>
      <div class="WsjU" id="settings43" style="width:50%;float:left;" onclick="SettingsActionPin('two')">
         Modificar
      </div>
      <div class="LsjU" id="settings43" style="width:50%;float:left;background:rgb(240,72,81)" onclick="SettingsActionPin('two','supp')">Desactivar</div>
   </div>
</div>
<?php }}else{ ?>
<div class="settingsload" id="settings16" style="transform: scale(1); transition: 0.4s; display: block;"> <div onclick="CloseSettingsAvances()" id="fermeture"></div>
<div id="settings51"><div id="forum60"><center><div id="forum55"></div>Comience confirmando su dirección de correo electrónico.</center></div></div></div>

<?php }}elseif($page == "mail"){ ?>
<div class="settingsload" id="settings16" style="transform: scale(1); transition: 0.4s; display: block;"> <div onclick="CloseSettingsAvances()" id="fermeture"></div>
<div id="settings37">
<div id="settings14" style="background:url(<?php echo PATH ?>/app/assets/img/pagesettings.png) 0px 0px;margin-top:20px;left:-8px;"></div>
<div id="settings38" style="top:35px;">Mi dirección de correo electrónico</div>
<div id="settings39">
<div id="settings40"></div>
<div style="font-size:140%;top:29px;" id="settings41"><?php if($user['email_verificado'] == 0){ ?>Debes confirmar tu dirección de correo electrónico para disfrutar al máximo el juego<?php }else{ ?>Tu dirección de correo electrónico ha sido confirmada<?php } ?>
</div>
</div>
<div id="settings42">Quiero cambiar mi dirección de correo electrónico</div>
<div style="position:relative;" id="settings45">
<input type="text" id="email" value="<?php echo $user['email']; ?>" class="indexinput" style="width:calc(100% - 25px);">
<div id="indexformsepare"></div>
<div onclick="SettingsActionMail('one')" id="settings43" class="fghjs1">Enviar un correo electrónico de confirmación
</div>
</div>
<div id="settings44">
<input type="text" id="code" placeholder="El código de confirmación" class="indexinput" style="width:calc(100% - 25px);">
<div id="indexformsepare"></div>
<div onclick="SettingsActionMail('two')" id="settings43" class="fghjs2">Validar</div>
</div>
</div>
</div>



<?php } ?>