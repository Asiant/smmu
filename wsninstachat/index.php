<?php
require 'config.php';

if (isset($_REQUEST['action']))
{
 if ($_REQUEST['action'] == 'send')
 {
  $chatname = $_REQUEST['chatname'];
  if (file_exists("chatters/$chatname.txt")) $previous = file_get_contents("chatters/$chatname.txt"); else $previous = '';
  if (stripslashes($_REQUEST['mytext']) != $previous)
  { // only write if there's a change
   if (!is_writeable("chatters")) echo "<p class='alert'>Attention webmaster: you must CHMOD the /chatters/ subdirectory to 777.</p>";  
   file_put_contents("chatters/$chatname.txt", stripslashes($_REQUEST['mytext']));
  }
  echo getchattershtml();
  die();
 }
}

if (isset($_REQUEST['chatname']) && $_REQUEST['chatname'])
{
 $chatname = $_REQUEST['chatname'];
 $chatname = preg_replace('/[^A-Za-z0-9 ]/', '', $chatname);
 if (!$chatname && !$config['allowallnames']) die("Name not allowed -- only standard English characters supported at the moment.");
 setcookie('chatname', $chatname);
 $_COOKIE['chatname'] = $chatname;
 if (!is_writeable("chatters")) echo "<p class='alert'>Attention webmaster: you must CHMOD the /chatters/ subdirectory to 777.</p>";
 file_put_contents("chatters/$chatname.txt", ""); // write empty file so it's ready
}

if (!isset($_COOKIE['chatname'])) 
{
 $body = '<form action="index.php" method="POST">'.$config['enternametext'].' <input type="text" name="chatname" size="10" /> <input type="submit" value="'.$config['chatbuttontext'].'" /></form>';
}
else
{
 $chatname = $_COOKIE['chatname'];
 $body = '<p>'.$config['welcometext'].'</p>'.getownhtml($chatname).'
 <div id="others">
 '.getchattershtml().'
 </div>';
}

$head = file_get_contents("header.tpl");
$code = '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>';
$code .= '<script type="text/javascript">

function sendandupdate()
{
  var $form = $("[name=chatform]"), term = $form.find(":input").serializeArray(), url = $form.attr("action");
  $.post(url, term, function(data) {
   $("#others").html(data); // might as well send and update at the same time so we do not need separate functions
  });
}

$().ready(function() {
';
$code .= "
var config = {
toolbar:
		[
['NewPage','-','Templates'],
	['Cut','Copy','Paste','PasteText','PasteWord','-','SpellCheck','Scayt'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],       
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        '/',
	['Link','Unlink'],
	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar'],
	['Styles','Format','Font','FontSize'],
	['TextColor','BGColor']
		],
	smiley_images: ['confused.gif','mad.gif','hug.gif','nod.gif','frown.gif','biggrin.gif','cool.gif','wink.gif','eyebrow.gif','rolleyes.gif','nono.gif','neutral.gif','no.gif','smile.gif','tongue.gif','eek.gif'],
	smiley_descriptions: ['confused','mad','hug','nod','frown','biggrin','cool','wink','eyebrow','rolleyes','nono','neutral','no','smile','tongue','eek']
	};";
$code .= '
$(".jquery_ckeditor").ckeditor(config);

});

setInterval("sendandupdate()", 250);
</script>';
$head = str_replace('</head>', $code.'</head>', $head);

echo $head.$body.file_get_contents("footer.tpl");

function getjavascript()
{

}

function getownhtml($chatname)
{
 global $content;
 $html = '<form name="chatform" action="index.php">
 <input type="hidden" name="action" value="send" />
 <input type="hidden" name="chatname" value="'.$chatname.'" />
 <textarea name="mytext" class="mytext jquery_ckeditor">'.$content[$chatname].'</textarea>
 </form>
 ';
 
 return $html;
}

function getchattershtml()
{
  global $content, $chatname, $config;
  $othersactive = 0;
  $files = getfiles("chatters");
  if (!$files) return "<p>".$config['nobodytext']."</p>"; // not sure if this is a possible condition, but to be on the safe side...
  $headcols = ''; $bodycols = '';
  $scrolls = '';
  foreach($files as $file)
  {
   $chattername = str_replace('.txt', '', $file);
   $chatters[] = $chattername;
   $content[$chattername] = file_get_contents("chatters/$file");
   $timestamp[$chattername] = filemtime("chatters/$file");
   $friendlytime[$chattername] = strftime("%l:%M:%S %P", timezoneize($timestamp[$chattername]));
   $cutoff = time() - 60*5; // 5 minute cutoff
   if ($timestamp[$chattername] > $cutoff && $chattername != $chatname)
   {
    $headcols .= '<th>'.$chattername.' - '.$friendlytime[$chattername].'</th>
    ';
    $bodycols .= '<td class="chattercol"><div class="othertext" id="text'.$othersactive.'">'.prepare($content[$chattername]).'</div></td>
    ';
    $scrolls .= 'var psconsole = $("#text'.$othersactive.'"); psconsole.scrollTop( psconsole[0].scrollHeight - psconsole.height() );
    ';
    $othersactive++;
   }
   else if ($timestamp[$chattername] < $cutoff) unlink("chatters/$file");
  }
  if ($othersactive) $headcols = str_replace('<th>', '<th width="'.floor(100/$othersactive).'%">', $headcols);
  $fulltable = '<table class="chatters" width="95%" align="center">
  <tr>
  '.$headcols.'</tr>
  <tr>'.$bodycols.'</tr>
  </table>';
  $fulltable .= '
  <script type="text/javascript">
  '.$scrolls.'
  </script>';
  if (!$othersactive) return "<p>".$config['nobodytext']."</p>";
  return $fulltable;
}

function getfiles($path, $extension = false)
{ // collect all files from directory
 $sets = false;
  if($handle = @opendir($path))
  {
   // Loop through all files
   while(false !== ($file = readdir($handle)))
   {  
    // Ignore hidden files
    if(!preg_match("/^\./", $file))
    {    
     // Put files in $files[]
     $full = $path.'/'.$file;
     if (!is_dir($full) && $file != '')
     {
      if (is_array($extension) && in_array(extension($file), $extension)) $sets[] = $file; 
      else if (!$extension || $extension == extension($file)) $sets[] = $file; 
     }
    }
   }
  }
  @closedir($handle);
 return $sets;
}

function extension($file)
{
 if (strstr($file, '.'))
 {
  $groups = explode('.', $file);
  $extension = end($groups);
  return strtolower($extension);
 }
 else return false;
}

function sanitize($content)
{
 return str_replace('<script', '&#60;script', $content);
}

function timezoneize($time) 
{  // server is on EST so adjust to DST
 global $config;
 if (!$config['timezoneadjustment']) return $time;
 else return $time + 60*60*$config['timezoneadjustment'];
}

function prepare($content)
{
 $content = linkallurls($content);
 return sanitize($content);
}


function linkallurls($message)
{
 if (!$message || !strstr($message, '://')) return $message; // if no urls, save time and trouble

// comes in as html
 $message = ' '. $message .' '; 
 $external = '';
 $message = str_replace("&#34;", '"', $message); // can get double linking bug otherwise

// trying to handle the below WITHOUT the opening space causes double-linking in WYSIWYG MSIE
//$message = preg_replace("/\"((http| ftp)+(s)?:(\/\/)([\w]+(.[\w]+))([\w\-\.,@?^=%&:;\/~\+#]*[\w\-\@?^=%&:;\/~\+#])?)\"/i", '$1', $message); // strip quotes first
// maybe: $message = preg_replace("/([\n >\(])\"((http| ftp)+(s)?:(\/\/)([\w]+(.[\w]+))([\w\-\.,@?^=%&:;\/~\+#]*[\w\-\@?^=%&:;\/~\+#])?)\"/i", '$1$2', $message); // strip quotes first
$message = preg_replace("/([\n\t >\(])((http|ftp)+(s)?:(\/\/)([\w]+(.[\w]+))([\w\-\.,@?\[\]^=%&:;\/~\+#]*[\w\-\@?\[\]^=%&:;\/~\+#])?)/i", "$1<a href=\"$2\" rel=\"nofollow\" ". $external .">$2</a>", $message);
//die($message);
 // now, shorten the long urls with preg_match
 $pattern = "/>http(.*?)<\/a>/i";   
 preg_match_all($pattern, $message, $urls);
 for ($i=0; $i<count($urls[0]); $i++)
 {
  $urlsize = strlen($urls[0][$i]);
  if ($urlsize > 70)
  {
	$replace = $urls[0][$i];
	$with = str_replace('</a>', '', $urls[0][$i]); // avoid partial </a> remnant issues
	$with = substr($with, 0, 35).'...'.substr($with, ($urlsize - 30), 30).'</a>'; 
	$message = str_replace($replace, $with, $message);  // only if still > 50 after </a> chop
   }
 }
 $message = trim($message);


 return $message;
}

?>