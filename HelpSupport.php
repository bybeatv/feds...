<?php
   require_once '../../global.php';
   
     //HOTEL CONFIG
   $result2 = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
   $yezz = $result2->fetch_array();
   //END HOTEL CONFIG
   
   
     $users = $db->query("SELECT * FROM players WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
     $user = $users->fetch_array();
   ?>
   
 <div id="ai1" style="display: block;"><div id="ai2">
<div id="ai3">
<div id="ai4"></div>
<div id="ai5">Servicio al cliente</div>
<div onclick="LoadPageSupport('<?php global $db; echo PATH ?>/app/load/HelpIndex.php','¿Necesita ayuda?')" id="ai6">
<div id="ai7"></div>
<div id="ai8"></div>
</div>
</div>
<div id="helpload"> <div id="ai31"><div id="supporterreur"></div>

<div id="ai32">
<div id="ai33"></div>
<div id="ai34">Contacto de soporte
</div>		 
</div>
<input type="text" id="ai35" placeholder="El nombre del asunto">

<select id="ai36" class="aitype">
            <option value="1">Problema técnico</option>
            <option value="2">Problema en la tienda</option>
            <option value="3">Problema de moderación</option>
            <option value="4">Problema de animación</option>
            <option value="5">Problema con los furnis</option>
            <option value="6">Problema con el foro</option>
            <option value="7">Los furnis faltantes</option>
         </select>
<select id="ai36" class="aiimportance">
            <option value="1">No es urgente</option>
            <option value="2">Poco urgente</option>
            <option value="3">Bastante urgente</option>
            <option value="4">Urgente</option>
            <option value="5">Muy urgente</option>
         </select>		 
<div id="ai37">
<button id="articlescombbcode" type="button" onclick="balise('bold');"><b>B</b></button>
<button id="articlescombbcode" type="button" onclick="balise('underline')"><u>U</u></button>
<button id="articlescombbcode" type="button" onclick="balise('italic')"><i>I</i></button>
<button id="articlescombbcode" type="button" onclick="balise('createLink');">Link</button>
<button id="articlescombbcode" type="button" onclick="balise('insertImage');">Image</button>
</div>
<div id="editeur" style="width:calc(100% - 20px);color:black;border-radius:14px;left:0px;height:auto;min-height:150px;background:rgb(245,245,245);" contenteditable=""></div>
<div onclick="SupportStart()" id="ai38">
<div id="ai39"></div>
Enviar mi solicitud de ayuda
</div>
<div class="end"></div>
</div>
</div>
</div></div>  
   
