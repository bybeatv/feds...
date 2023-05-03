<?php
   ob_start();
   require_once '../../global.php';
   
   $q = $Functions->FilterText($_POST[words]);
   $type = $Functions->FilterText($_POST[search]);
   
   
   
   if($type == 'all'){
   $sql = $db->query("SELECT * FROM players WHERE username LIKE '%".$q."%' ORDER BY username ASC");
   if($sql->num_rows == 0){
   
   echo '<center>
                  <br><br><br><br><br><br><br><br><br><br><br><br><p style="color:white;font-size:400%;">No hay ningun usuario llamado <b>'.$q.'</p>
               </center>';
   
   }else{
   
   while($fila = $sql->fetch_array()){
   
   echo '<a id="closesearch4" place="'.$fila['username'].'" href="'.PATH.'/profile/'.$fila['username'].'">
   <div id="searchcase">
   <div id="search6"> Hola, soy '.$fila['username'].'</div>
   <div id="search7">
   <div id="search8">Visitar el perfil</div>
   </div>
   <div id="search9"><img style="position:relative;left:-3%;" draggable="false" oncontextmenu="return false" src="'.AVATARIMAGE.''.$fila['figure'].'&action=std&gesture=sml&direction=2&head_direction=3&size=l&img_format=png">
   </div>
   </div>
   </a>';
   
   }
   }
   }elseif($type == 'news'){
    
   $sql = $db->query("SELECT * FROM cms_slider WHERE title LIKE '%".$q."%' ORDER BY title DESC");
   if($sql->num_rows == 0){
   
   echo '<center>
                  <br><br><br><br><br><br><br><br><br><br><br><br><p style="color:white;font-size:400%;">No hay ninguna noticia llamada <b>'.$q.'</p>
               </center>';
   
   }else{
   
   while($fila = $sql->fetch_array()){
   
   echo '<a id="closesearch4" place="'.$Functions->FilterText($fila['title']).' - Pixeled" style="color:black;" href="/news/'.$fila['id'].'-'.$fila['link'].'">
   <div id="searchcase">
   <div id="search10"><img draggable="false" oncontextmenu="return false" src="'.$fila['image'].'"></div>
   <div id="search11">'.$Functions->FilterText($fila['title']).'</div>
   </div>
   </a>';
   
   }
   }  
    
   }
   ?>