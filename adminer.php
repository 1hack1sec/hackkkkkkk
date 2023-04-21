<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.8.1
*/function
adminer_errors($Cc,$Ec){return!!preg_match('~^(Trying to access array offset on value of type null|Undefined array key)~',$Ec);}error_reporting(6135);set_error_handler('adminer_errors',E_WARNING);$ad=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($ad||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Ii=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Ii)$$X=$Ii;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
version(){global$ia;return$ia;}function
idf_unescape($v){if(!preg_match('~^[`\'"]~',$v))return$v;$qe=substr($v,-1);return
str_replace($qe.$qe,$qe,substr($v,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($tg,$ad=false){if(function_exists("get_magic_quotes_gpc")&&get_magic_quotes_gpc()){while(list($z,$X)=each($tg)){foreach($X
as$he=>$W){unset($tg[$z][$he]);if(is_array($W)){$tg[$z][stripslashes($he)]=$W;$tg[]=&$tg[$z][stripslashes($he)];}else$tg[$z][stripslashes($he)]=($ad?$W:stripslashes($W));}}}}function
bracket_escape($v,$Na=false){static$ui=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($v,($Na?array_flip($ui):$ui));}function
min_version($Zi,$De="",$h=null){global$g;if(!$h)$h=$g;$nh=$h->server_info;if($De&&preg_match('~([\d.]+)-MariaDB~',$nh,$C)){$nh=$C[1];$Zi=$De;}return(version_compare($nh,$Zi)>=0);}function
charset($g){return(min_version("5.5.3",0,$g)?"utf8mb4":"utf8");}function
script($yh,$ti="\n"){return"<script".nonce().">$yh</script>$ti";}function
script_src($Ni){return"<script src='".h($Ni)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($D,$Y,$db,$me="",$uf="",$hb="",$ne=""){$I="<input type='checkbox' name='$D' value='".h($Y)."'".($db?" checked":"").($ne?" aria-labelledby='$ne'":"").">".($uf?script("qsl('input').onclick = function () { $uf };",""):"");return($me!=""||$hb?"<label".($hb?" class='$hb'":"").">$I".h($me)."</label>":$I);}function
optionlist($_f,$gh=null,$Ri=false){$I="";foreach($_f
as$he=>$W){$Af=array($he=>$W);if(is_array($W)){$I.='<optgroup label="'.h($he).'">';$Af=$W;}foreach($Af
as$z=>$X)$I.='<option'.($Ri||is_string($z)?' value="'.h($z).'"':'').(($Ri||is_string($z)?(string)$z:$X)===$gh?' selected':'').'>'.h($X);if(is_array($W))$I.='</optgroup>';}return$I;}function
html_select($D,$_f,$Y="",$tf=true,$ne=""){if($tf)return"<select name='".h($D)."'".($ne?" aria-labelledby='$ne'":"").">".optionlist($_f,$Y)."</select>".(is_string($tf)?script("qsl('select').onchange = function () { $tf };",""):"");$I="";foreach($_f
as$z=>$X)$I.="<label><input type='radio' name='".h($D)."' value='".h($z)."'".($z==$Y?" checked":"").">".h($X)."</label>";return$I;}function
select_input($Ia,$_f,$Y="",$tf="",$fg=""){$Yh=($_f?"select":"input");return"<$Yh$Ia".($_f?"><option value=''>$fg".optionlist($_f,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$fg'>").($tf?script("qsl('$Yh').onchange = $tf;",""):"");}function
confirm($Ne="",$hh="qsl('input')"){return
script("$hh.onclick = function () { return confirm('".($Ne?js_escape($Ne):lang(0))."'); };","");}function
print_fieldset($u,$ve,$cj=false){echo"<fieldset><legend>","<a href='#fieldset-$u'>$ve</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$u');",""),"</legend>","<div id='fieldset-$u'".($cj?"":" class='hidden'").">\n";}function
bold($Ua,$hb=""){return($Ua?" class='active $hb'":($hb?" class='$hb'":""));}function
odd($I=' class="odd"'){static$t=0;if(!$I)$t=-1;return($t++%2?$I:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($z,$X=null){static$bd=true;if($bd)echo"{";if($z!=""){echo($bd?"":",")."\n\t\"".addcslashes($z,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$bd=false;}else{echo"\n}\n";$bd=true;}}function
ini_bool($Ud){$X=ini_get($Ud);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$I;if($I===null)$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$I;}function
set_password($Yi,$M,$V,$F){$_SESSION["pwds"][$Yi][$M][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$I=get_session("pwds");if(is_array($I))$I=($_COOKIE["adminer_key"]?decrypt_string($I[0],$_COOKIE["adminer_key"]):false);return$I;}function
q($P){global$g;return$g->quote($P);}function
get_vals($G,$d=0){global$g;$I=array();$H=$g->query($G);if(is_object($H)){while($J=$H->fetch_row())$I[]=$J[$d];}return$I;}function
get_key_vals($G,$h=null,$qh=true){global$g;if(!is_object($h))$h=$g;$I=array();$H=$h->query($G);if(is_object($H)){while($J=$H->fetch_row()){if($qh)$I[$J[0]]=$J[1];else$I[]=$J[0];}}return$I;}function
get_rows($G,$h=null,$n="<p class='error'>"){global$g;$yb=(is_object($h)?$h:$g);$I=array();$H=$yb->query($G);if(is_object($H)){while($J=$H->fetch_assoc())$I[]=$J;}elseif(!$H&&!is_object($h)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$I;}function
unique_array($J,$x){foreach($x
as$w){if(preg_match("~PRIMARY|UNIQUE~",$w["type"])){$I=array();foreach($w["columns"]as$z){if(!isset($J[$z]))continue
2;$I[$z]=$J[$z];}return$I;}}}function
escape_key($z){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$z,$C))return$C[1].idf_escape(idf_unescape($C[2])).$C[3];return
idf_escape($z);}function
where($Z,$p=array()){global$g,$y;$I=array();foreach((array)$Z["where"]as$z=>$X){$z=bracket_escape($z,1);$d=escape_key($z);$I[]=$d.($y=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($y=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$z],q($X))));if($y=="sql"&&preg_match('~char|text~',$p[$z]["type"])&&preg_match("~[^ -@]~",$X))$I[]="$d = ".q($X)." COLLATE ".charset($g)."_bin";}foreach((array)$Z["null"]as$z)$I[]=escape_key($z)." IS NULL";return
implode(" AND ",$I);}function
where_check($X,$p=array()){parse_str($X,$bb);remove_slashes(array(&$bb));return
where($bb,$p);}function
where_link($t,$d,$Y,$wf="="){return"&where%5B$t%5D%5Bcol%5D=".urlencode($d)."&where%5B$t%5D%5Bop%5D=".urlencode(($Y!==null?$wf:"IS NULL"))."&where%5B$t%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($e,$p,$L=array()){$I="";foreach($e
as$z=>$X){if($L&&!in_array(idf_escape($z),$L))continue;$Ga=convert_field($p[$z]);if($Ga)$I.=", $Ga AS ".idf_escape($z);}return$I;}function
cookie($D,$Y,$ye=2592000){global$ba;return
header("Set-Cookie: $D=".urlencode($Y).($ye?"; expires=".gmdate("D, d M Y H:i:s",time()+$ye)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($gd=false){$Qi=ini_bool("session.use_cookies");if(!$Qi||$gd){session_write_close();if($Qi&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($z){return$_SESSION[$z][DRIVER][SERVER][$_GET["username"]];}function
set_session($z,$X){$_SESSION[$z][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Yi,$M,$V,$l=null){global$kc;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($kc))."|username|".($l!==null?"db|":"").session_name()),$C);return"$C[1]?".(sid()?SID."&":"").($Yi!="server"||$M!=""?urlencode($Yi)."=".urlencode($M)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($C[2]?"&$C[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($B,$Ne=null){if($Ne!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($B!==null?$B:$_SERVER["REQUEST_URI"]))][]=$Ne;}if($B!==null){if($B=="")$B=".";header("Location: $B");exit;}}function
query_redirect($G,$B,$Ne,$Dg=true,$Jc=true,$Tc=false,$gi=""){global$g,$n,$b;if($Jc){$Fh=microtime(true);$Tc=!$g->query($G);$gi=format_time($Fh);}$Ah="";if($G)$Ah=$b->messageQuery($G,$gi,$Tc);if($Tc){$n=error().$Ah.script("messagesPrint();");return
false;}if($Dg)redirect($B,$Ne.$Ah);return
true;}function
queries($G){global$g;static$yg=array();static$Fh;if(!$Fh)$Fh=microtime(true);if($G===null)return
array(implode("\n",$yg),format_time($Fh));$yg[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$g->query($G);}function
apply_queries($G,$S,$Fc='table'){foreach($S
as$Q){if(!queries("$G ".$Fc($Q)))return
false;}return
true;}function
queries_redirect($B,$Ne,$Dg){list($yg,$gi)=queries(null);return
query_redirect($yg,$B,$Ne,$Dg,false,!$Dg,$gi);}function
format_time($Fh){return
lang(1,max(0,microtime(true)-$Fh));}function
relative_uri(){return
str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]));}function
remove_from_uri($Qf=""){return
substr(preg_replace("~(?<=[?&])($Qf".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($E,$Pb){return" ".($E==$Pb?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($z,$Xb=false){$Zc=$_FILES[$z];if(!$Zc)return
null;foreach($Zc
as$z=>$X)$Zc[$z]=(array)$X;$I='';foreach($Zc["error"]as$z=>$n){if($n)return$n;$D=$Zc["name"][$z];$oi=$Zc["tmp_name"][$z];$Db=file_get_contents($Xb&&preg_match('~\.gz$~',$D)?"compress.zlib://$oi":$oi);if($Xb){$Fh=substr($Db,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Fh,$Jg))$Db=iconv("utf-16","utf-8",$Db);elseif($Fh=="\xEF\xBB\xBF")$Db=substr($Db,3);$I.=$Db."\n\n";}else$I.=$Db;}return$I;}function
upload_error($n){$Ke=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?lang(2).($Ke?" ".lang(3,$Ke):""):lang(4));}function
repeat_pattern($cg,$we){return
str_repeat("$cg{0,65535}",$we/65535)."$cg{0,".($we%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($P,$we=80,$Mh=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$we).")($)?)u",$P,$C))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$we).")($)?)",$P,$C);return
h($C[1]).$Mh.(isset($C[2])?"":"<i>â€¦</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($tg,$Jd=array(),$lg=''){$I=false;foreach($tg
as$z=>$X){if(!in_array($z,$Jd)){if(is_array($X))hidden_fields($X,array(),$z);else{$I=true;echo'<input type="hidden" name="'.h($lg?$lg."[$z]":$z).'" value="'.h($X).'">';}}}return$I;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$Uc=false){$I=table_status($Q,$Uc);return($I?$I:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$I=array();foreach($b->foreignKeys($Q)as$r){foreach($r["source"]as$X)$I[$X][]=$r;}return$I;}function
enum_input($T,$Ia,$o,$Y,$zc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Fe);$I=($zc!==null?"<label><input type='$T'$Ia value='$zc'".((is_array($Y)?in_array($zc,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($Fe[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$db=(is_int($Y)?$Y==$t+1:(is_array($Y)?in_array($t+1,$Y):$Y===$X));$I.=" <label><input type='$T'$Ia value='".($t+1)."'".($db?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$I;}function
input($o,$Y,$s){global$U,$b,$y;$D=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$s){$Ea=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Ea[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Ea);$s="json";}$Ng=($y=="mssql"&&$o["auto_increment"]);if($Ng&&!$_POST["save"])$s=null;$pd=(isset($_GET["select"])||$Ng?array("orig"=>lang(8)):array())+$b->editFunctions($o);$Ia=" name='fields[$D]'";if($o["type"]=="enum")echo
h($pd[""])."<td>".$b->editInput($_GET["edit"],$o,$Ia,$Y);else{$zd=(in_array($s,$pd)||isset($pd[$s]));echo(count($pd)>1?"<select name='function[$D]'>".optionlist($pd,$s===null||$zd?$s:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($pd))).'<td>';$Wd=$b->editInput($_GET["edit"],$o,$Ia,$Y);if($Wd!="")echo$Wd;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ia value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ia value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Fe);foreach($Fe[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$db=(is_int($Y)?($Y>>$t)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$D][$t]' value='".(1<<$t)."'".($db?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$D'>";elseif(($ei=preg_match('~text|lob|memo~i',$o["type"]))||preg_match("~\n~",$Y)){if($ei&&$y!="sqlite")$Ia.=" cols='50' rows='12'";else{$K=min(12,substr_count($Y,"\n")+1);$Ia.=" cols='30' rows='$K'".($K==1?" style='height: 1.2em;'":"");}echo"<textarea$Ia>".h($Y).'</textarea>';}elseif($s=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ia cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Me=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$C)?((preg_match("~binary~",$o["type"])?2:1)*$C[1]+($C[3]?1:0)+($C[2]&&!$o["unsigned"]?1:0)):($U[$o["type"]]?$U[$o["type"]]+($o["unsigned"]?0:1):0));if($y=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Me+=7;echo"<input".((!$zd||$s==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Me?" data-maxlength='$Me'":"").(preg_match('~char|binary~',$o["type"])&&$Me>20?" size='40'":"")."$Ia>";}echo$b->editHint($_GET["edit"],$o,$Y);$bd=0;foreach($pd
as$z=>$X){if($z===""||!$X)break;$bd++;}if($bd)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $bd), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$v=bracket_escape($o["field"]);$s=$_POST["function"][$v];$Y=$_POST["fields"][$v];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($s=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?idf_escape($o["field"]):false);if($s=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($s=="json"){$s="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Zc=get_file("fields-$v");if(!is_string($Zc))return
false;return$m->quoteBinary($Zc);}return$b->processInput($o,$Y,$s);}function
fields_from_edit(){global$m;$I=array();foreach((array)$_POST["field_keys"]as$z=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$z];$_POST["fields"][$X]=$_POST["field_vals"][$z];}}foreach((array)$_POST["fields"]as$z=>$X){$D=bracket_escape($z,1);$I[$D]=array("field"=>$D,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($z==$m->primary),);}return$I;}function
search_tables(){global$b,$g;$_GET["where"][0]["val"]=$_POST["query"];$jh="<ul>\n";foreach(table_status('',true)as$Q=>$R){$D=$b->tableName($R);if(isset($R["Engine"])&&$D!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$H=$g->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$H||$H->fetch_row()){$pg="<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$D</a>";echo"$jh<li>".($H?$pg:"<p class='error'>$pg: ".error())."\n";$jh="";}}}echo($jh?"<p class='message'>".lang(9):"</ul>")."\n";}function
dump_headers($Hd,$Ve=false){global$b;$I=$b->dumpHeaders($Hd,$Ve);$Mf=$_POST["output"];if($Mf!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Hd).".$I".($Mf!="file"&&preg_match('~^[0-9a-z]+$~',$Mf)?".$Mf":""));session_write_close();ob_flush();flush();return$I;}function
dump_csv($J){foreach($J
as$z=>$X){if(preg_match('~["\n,;\t]|^0|\.\d*0$~',$X)||$X==="")$J[$z]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($s,$d){return($s?($s=="unixepoch"?"DATETIME($d, '$s')":($s=="count distinct"?"COUNT(DISTINCT ":strtoupper("$s("))."$d)"):$d);}function
get_temp_dir(){$I=ini_get("upload_tmp_dir");if(!$I){if(function_exists('sys_get_temp_dir'))$I=sys_get_temp_dir();else{$q=@tempnam("","");if(!$q)return
false;$I=dirname($q);unlink($q);}}return$I;}function
file_open_lock($q){$nd=@fopen($q,"r+");if(!$nd){$nd=@fopen($q,"w");if(!$nd)return;chmod($q,0660);}flock($nd,LOCK_EX);return$nd;}function
file_write_unlock($nd,$Rb){rewind($nd);fwrite($nd,$Rb);ftruncate($nd,strlen($Rb));flock($nd,LOCK_UN);fclose($nd);}function
password_file($i){$q=get_temp_dir()."/adminer.key";$I=@file_get_contents($q);if($I||!$i)return$I;$nd=@fopen($q,"w");if($nd){chmod($q,0660);$I=rand_string();fwrite($nd,$I);fclose($nd);}return$I;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$A,$o,$fi){global$b;if(is_array($X)){$I="";foreach($X
as$he=>$W)$I.="<tr>".($X!=array_values($X)?"<th>".h($he):"")."<td>".select_value($W,$A,$o,$fi);return"<table cellspacing='0'>$I</table>";}if(!$A)$A=$b->selectLink($X,$o);if($A===null){if(is_mail($X))$A="mailto:$X";if(is_url($X))$A=$X;}$I=$b->editVal($X,$o);if($I!==null){if(!is_utf8($I))$I="\0";elseif($fi!=""&&is_shortable($o))$I=shorten_utf8($I,max(0,+$fi));else$I=h($I);}return$b->selectVal($I,$A,$o,$X);}function
is_mail($wc){$Ha='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$jc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$cg="$Ha+(\\.$Ha+)*@($jc?\\.)+$jc";return
is_string($wc)&&preg_match("(^$cg(,\\s*$cg)*\$)i",$wc);}function
is_url($P){$jc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($jc?\\.)+$jc(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($Q,$Z,$ce,$sd){global$y;$G=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($ce&&($y=="sql"||count($sd)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$sd).")$G":"SELECT COUNT(*)".($ce?" FROM (SELECT 1$G GROUP BY ".implode(", ",$sd).") x":$G));}function
slow_query($G){global$b,$qi,$m;$l=$b->database();$hi=$b->queryTimeout();$vh=$m->slowQuery($G,$hi);if(!$vh&&support("kill")&&is_object($h=connect())&&($l==""||$h->select_db($l))){$ke=$h->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$ke,'&token=',$qi,'\');
}, ',1000*$hi,');
</script>
';}else$h=null;ob_flush();flush();$I=@get_key_vals(($vh?$vh:$G),$h,false);if($h){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$I;}function
get_token(){$Ag=rand(1,1e6);return($Ag^$_SESSION["token"]).":$Ag";}function
verify_token(){list($qi,$Ag)=explode(":",$_POST["token"]);return($Ag^$_SESSION["token"])==$qi;}function
lzw_decompress($Ra){$gc=256;$Sa=8;$jb=array();$Pg=0;$Qg=0;for($t=0;$t<strlen($Ra);$t++){$Pg=($Pg<<8)+ord($Ra[$t]);$Qg+=8;if($Qg>=$Sa){$Qg-=$Sa;$jb[]=$Pg>>$Qg;$Pg&=(1<<$Qg)-1;$gc++;if($gc>>$Sa)$Sa++;}}$fc=range("\0","\xFF");$I="";foreach($jb
as$t=>$ib){$vc=$fc[$ib];if(!isset($vc))$vc=$nj.$nj[0];$I.=$vc;if($t)$fc[]=$nj.$vc[0];$nj=$vc;}return$I;}function
on_help($rb,$sh=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $rb, $sh) }, onmouseout: helpMouseout});","");}function
edit_form($Q,$p,$J,$Li){global$b,$y,$qi,$n;$Rh=$b->tableName(table_status1($Q,true));page_header(($Li?lang(10):lang(11)),$n,array("select"=>array($Q,$Rh)),$Rh);$b->editRowPrint($Q,$p,$J,$Li);if($J===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$D=>$o){echo"<tr><th>".$b->fieldName($o);$Yb=$_GET["set"][bracket_escape($D)];if($Yb===null){$Yb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Yb,$Jg))$Yb=$Jg[1];}$Y=($J!==null?($J[$D]!=""&&$y=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($J[$D])?array_sum($J[$D]):+$J[$D]):(is_bool($J[$D])?+$J[$D]:$J[$D])):(!$Li&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Yb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$s=($_POST["save"]?(string)$_POST["function"][$D]:($Li&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(!$_POST&&!$Li&&$Y==$o["default"]&&preg_match('~^[\w.]+\(~',$Y))$s="SQL";if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$s="now";}input($o,$Y,$s);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Li?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($Li?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."â€¦', this); };"):"");}}echo($Li?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$qi,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃşÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ıÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒŞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Şn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1Ìs˜´ç-4™‡fÓ	ÈÎi7†³¹¤Èt4…¦ÓyèZf4°i–AT«V V
éf:Ï¦,:1¦Qİ¼ñb2`Ç#ş>:7Gï—1ÑØÒs°™L—XD*bv<ÜŒ#£e@Ö:4ç§!fo·Æt:<¥Üå’¾™oâÜ\niÃÅğ',é»a_¤:¹iï…´ÁBvø|Nû4.5Nfi¢vpĞh¸°l¨ê¡ÖšÜO¦‰î= £OFQĞÄk\$¥Óiõ™ÀÂd2Tã¡pàÊ6„‹ş‡¡-ØZ€ƒ Ş6½£€ğh:¬aÌ,£ëî2#8Ğ±#’˜6 nâî†ñJˆ¢h«t…Œ±Šä4O42ô½okŞ¾*r ©€@p@†!Ä¾ÏÃôş?Ğ6À‰r[ğLÁğ‹:2Bˆj§!HbóÃPä=!1V‰\"ˆ²0…¿\nSÆÆÏD7ÃìDÚ›ÃC!†!›à¦GÊŒ§ È+’=tCæ©.C¤À:+ÈÊ=ªªº²¡±å%ªcí1MR/”EÈ’4„© 2°ä± ã`Â8(áÓ¹[W
äÑ=‰ySb°=Ö-Ü¹BS+
É¯ÈÜı¥ø@pL4Ydã„qŠøã¦ğê¢6£3Ä¬¯¸AcÜŒèÎ¨Œk‚[&>ö•¨ZÁpkm]—u-c:Ø¸ˆNtæÎ´pÒŒŠ8è=¿#˜á[.ğÜŞ¯~ mËy‡PPá|IÖ›ùÀì Qª9v[–Q•„\n–Ùrô'g‡+áTÑ2…­VÁõzä4£8÷(	¾Ey*#j¬2]­•RÒÁ‘¥)ƒÀ[N­R\$Š<>:ó­>\$;–> Ì\r»„ÎHÍÃTÈ\n w¡N åwØ£¦ì<ïËGwàöö¹\\Yó_ Rt^Œ>\r}ŒÙS\rzé4=µ\nL”%Jã‹\",Z 8¸™i÷0u©?¨ûÑô¡s3#¨Ù‰ :ó¦ûã½–ÈŞE]xİÒs^8£K^É÷*0ÑŞwŞàÈŞ~ãö:íÑiØşv2w½ÿ± û^7ãò7£cİÑu+U%{PÜ*4Ì¼éLX./!¼‰1CÅßqx!H¹ãFdù­L¨¤¨Ä Ï`6ëè 5®™f€¸Ä†¨= Høl ŒV1“›\0a2×;Ô6†àöş_Ù‡Ä\0&ôZÜS d)KE'’€nµ[
X©³\0ZÉŠÔF[P‘Ş˜@àß!‰ñYÂ,`É\"Ú·Â0Ee9
yF>ËÔ9bº–ŒæF5:üˆ”\0}Ä´Š‡(\$Ó‡ë€37Hö£è M¾A°²6R•ú{Mqİ7G ÚC™Cêm2¢(ŒCt>[ì-tÀ/&C›]êetGôÌ¬4@r>ÇÂå<šSq•/åú”QëhmšÀĞÆôãôLÀÜ#èôKË|®™„6fKPİ\r%tÔÓV=\" SH\$} ¸)w¡,W\0F³ªu@Øb
¦9‚\rr°2Ã#¬DŒ”Xƒ³ÚyOIù>»…n
†Ç¢%ãù'‹İ_Á€t\rÏ„zÄ\\1˜hl¼]Q5Mp6k†ĞÄqhÃ\$£H~Í|Òİ!*4ŒñòÛ`Sëı²S tíPP\\g±è7‡\n- Š:è¢ªp´•”ˆl‹B¦î”7Ó¨cƒ(wO0\\: •Ğw”Áp4ˆ“ò{TÚújO¤6HÃŠ¶rÕ¥q \n¦É%%¶y']\$‚”a‘ZÓ.fcÕq*-êFWºúk„zƒ°µj‘°lgáŒ:‡\$\"ŞN¼\r#ÉdâÃ‚ÂÿĞscá¬Ì „ƒ\"jª\rÀ¶–¦ˆÕ’¼Ph‹1/‚œDA) ²İ[ÀknÁp76ÁY´‰R{áM¤Pû°ò@\n-¸a·6şß[»zJH,–dl B£ho³ìò¬+‡#Dr^µ^µÙeš¼E½½– ÄœaP‰ôõJG£zàñtñ 2ÇXÙ¢´Á¿V¶×ßàŞÈ³‰ÑB_%K=E©¸bå¼¾ßÂ§kU(.! Ü®8¸œüÉI.@KÍxnş¬ü:ÃPó3 2«”míH		C*ì:vâTÅ\nR¹ƒ•µ‹
0uÂíƒæîÒ§]Î¯˜Š”P
/µJQd¥{L–Ş³:YÁ2b¼œT ñÊ3Ó4†—äcê¥V=¿†L4ÎĞrÄ!ßBğY³6Í­MeL  ŠªÜçœöùiÀoĞ9< G”¤Æ•Ğ™Mhm^¯UÛNÀŒ·
òTr
5HiM”/¬nƒí³T [-<__î3/Xr(<‡¯Š†®Éô“ÌuÒ–GNX20å\r\$^‡:'9è¶O…í;×k¼†µf –N'a¶”Ç­bÅ,ËV¤ô…«1µïHI!%6@úÏ\$ÒEGÚœ¬1(mUªå…rÕ½ïßå`¡ĞiN+Ãœñ)šœä0lØÒf0Ã½[UâøVÊè-:I^ ˜\$Øs«b\re‡‘ugÉhª~9Ûßˆb˜µôÂÈfä+0¬Ô hXrİ¬©!\$—e,±w+„÷ŒëŒ3†Ì_âA…kšù\nkÃrõÊ›cuWdYÿ\\×={.óÄ˜¢g»‰p8œt\rRZ¿vJ:²>ş£Y|+Å@À‡ƒÛCt\r€jt½6²ğ
%Â?àôÇñ’>ù/
¥ÍÇğÎ9F`×•äòv~K¤áöÑRĞW‹ğz‘êlmªwLÇ9Y•*q¬xÄzñèSe®İ›³è÷£~šDàÍá–÷x˜¾ëÉŸi7•2ÄøÑOİ» ’û_{ñú53âút˜›_ŸõzÔ3ùd)‹C¯Â\$?KÓªP%ÏÏT&ş˜&\0P×NA^­~¢ƒ p Æ öÏœ“Ôõ\r\$ŞïĞÖìb*+D6ê¶¦ÏˆŞíJ\$(ÈolŞÍh&”ìKBS>¸‹ö;z¶¦xÅoz>íœÚoÄZğ\nÊ‹[Ïvõ‚ËÈœµ°2õOxÙVø0fû€ú¯Ş2BlÉbkĞ6ZkµhXcdê0*ÂKTâ¯H=­• Ï€‘p0ŠlVéõ
èâ\r¼Œ¥nm¦ï)((ô:#¦âòE‰Ü:C¨CàÚ
â\r¨G\rÃ©0÷…iæÚ°ş:`Z1Q\n:€à\r\0à
çÈq±°ü:`¿-ÈM#}1;èş¹‹q‘#|ñS€¾¢hl™DÄ\0fiDpëL ``™°çÑ0y€ß1…€ê\rñ=‘MQ\\¤³%oq–­\0Ø
ñ£1¨21¬1°­ ¿±§Ñœbi:“í\r±/Ñ¢› ` )šÄ0ù‘@¾Â›±ÃI1«NàCØàŠµñO±¢Zñã1±ïq1 òÑüà,å\rdIÇ¦väjí‚1 tÚBø“°â’0:…0ğğ“1 A2V„ñâ0 éñ%²fi3!&Q·Rc%Òq&w%Ñì\ràVÈ#Êø™Qw`‹% ¾„Òm*r…Òy&iß+r{*²»(rg(±#(2­(ğå)R@i›-  ˆ•1\"\0Û²Rêÿ.e.rëÄ,¡ry(2ªCàè²bì!BŞ3%Òµ,R¿1²Æ&èşt€äbèa\rL“³-3á Ö ó\0æ
óBp—1ñ94³O'R°3*²³=\$à[£^iI;/3i©5Ò
&’}17²# Ñ¹8 ¿\"ß7Ñå8ñ9*Ò23™!ó!1\\\0Ï8“­rk9±;S…23¶
àÚ“*Ó:q]5S<³Á#383İ#eÑ=¹>~9Sè³‘rÕ)€ŒT*aŸ@Ñ–ÙbesÙÔ£:-ó€éÇ*;, Ø™3!i´›‘LÒ²ğ#1 +nÀ «*²ã@³3i7´1©´_•F‘S;3ÏF±\rA¯é3õ>´x:ƒ \r³0ÎÔ@’-Ô/¬ÓwÓÛ7ñ„ÓS‘J3› ç.Fé\$O¤B’±—%4©+tÃ'góLq\rJt‡JôËM2\rôÍ7ñÆT@“£¾)â“£dÉ2€P>Î°€Fià²´ş\nr\0¸bçk(´D¶¿ãKQƒ¤´ã1ã\"2t”ôôºPè\rÃÀ,\$KCtò5ôö#ôú)¢áP#Pi.ÎU2µCæ~Ş\"ä");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n8œÅ 3)°Ë7œ…†81ĞÊx:\nOg#)Ğêr7\n\"†è´`ø|2ÌgSi–H)N¦S‘ä§\r‡\"0¹Ä@ä)Ÿ`(\$s6O!ÓèœV/=Œ' T4æ=„˜iS˜6IO G#ÒX·VCÆs¡ Z1.Ğhp8,³[¦Häµ
~Cz§Éå2¹l¾c3šÍés£‘ÙI†bâ4\néF8Tà†I˜İ©U*fz¹är0EÆÀØy¸ñfY.:æƒIŒÊ(Øc·áÎ‹!_l™í^·^(¶šN{S–“)rËqÁY“–lÙ¦3Š3Ú\n˜+G¥Óêyºí†Ëi¶ÂîxV3w³uhã^rØÀº´aÛ”ú¹cØè\r“¨ë(.ÂˆºChÒ<\r)èÑ£¡`æ7£íò43'm5Œ£È\nPÜ:2£P»ª‹q òÿÅC“}Ä«ˆúÊÁê38‹BØ0hR‰Èr(œ0¥¡b\\0ŒHr44ŒÁB!¡pÇ\$rZZË2Ü‰.Éƒ(\\5Ã
|\nC(Î\"€P…ğø.
ĞNÌRTÊÎ“Àæ>HN…8HPá\\¬7Jp~„Üû2%¡ĞOC¨1ã.ƒ§C8Î‡HÈò*ˆj°…á÷S(¹/¡ì¬6KUœÊ‡¡<2‰pOI„ôÕ`Ôäâ³ˆdOH Ş5-üÆ4ŒãpX25-Ò¢òÛˆ°z7£¸\"(°P \\32:]UÚèíâß…!]¸<·AÛÛ¤’ĞßiÚ°‹l\rÔ\0v²Î#J8«ÏwmíÉ¤¨<ŠÉ æü%m;p#ã`XDŒø÷iZøN0Œ•È9
ø¨å Áè`…wJD¿¾2Ò9tŒ¢*øÎyìËNiIh\\9ÆÕèĞ:ƒ€æáxï­µyl*šÈˆÎæY Ü‡øê8’W³â?µŞ›3ÙğÊ!\"6å›n[¬Ê\r­*\$¶Æ§¾nzxÆ9\rì|*3×£pŞï»¶:(p\\;ÔËmz¢ü§9óĞÑÂŒü8N…Áj2½«Î\rÉHîH&Œ²(Ãz„Á7iÛk£ ‹Š¤‚c¤‹eòı§tœÌÌ2:SHóÈ Ã/)–xŞ@éåt‰ri9¥½õëœ8ÏÀËïyÒ·½°VÄ+^WÚ¦­¬kZæY—l·Ê£Œ4ÖÈÆ‹ª¶À¬‚ğ\\EÈ{î7\0¹p†€•D€„i”-TæşÚû0l°%=Á ĞËƒ9(„5ğ\n\n€n,4‡\0èa} Üƒ.°öRsï‚ª\02B\\Ûb1ŸS±\0003,ÔXPHJspåd“Kƒ CA!°2*WŸÔñÚ2\$ä+Âf^\n„1Œ´òzEƒ Iv¤\\äœ2É .*A°™”E(d ±á°ÃbêÂÜ„Æ9‡‚â€ÁDh&­ª?ÄH°sQ˜2’x~nÃJ‹T2ù&ãàe Rœ½™GÒQTwêİ‘»õPˆâã\\ )6¦ôâœÂòsh\\3¨\0R	À'\r+*;RğHà.“!Ñ[Í'~­%t< çpÜK#Â‘æ!ñlßÌğLeŒ³œÙ,ÄÀ®&á\$	Á½`”–CXš‰Ó†0Ö­å¼û ³Ä:Méh	çÚœGäÑ!&3 D<!è23„Ã?h¤J©e  Úğhá\r¡m•˜ğNi¸£´’†ÊNØHl7¡®v‚êWIå.
´Á-Ó5Ö§ey \rEJ\ni*
¼\$ @ÚRU0,\$U¿E†¦ÔÔÂªu)@(tÎSJkáp!€~­‚àd`Ì>¯•\n
Ã;#\rp9†jÉ¹Ü]&Nc(r€ˆ•TQUª½S·Ú\08n`«—y•b¤ÅLÜO5‚î,¤ò‘>‚†xââ±fä´’âØ+–\"ÑI€{kMÈ[\r%Æ[	¤e
ôaÔ1! èÿí³Ô®©F@«b)RŸ£72ˆî0¡\nW¨™±L²ÜœÒ®tdÕ+íÜ 0wglø0n@òêÉ¢ÕiíM«ƒ\nA§M5nì\$E³×±NÛál©İŸ×ì%ª1 AÜûºú÷İkñrîiFB÷Ïùol,muNx-Í_ Ö¤C( fél\r1p[9x(i´BÒ–²ÛzQlüº8CÔ	´©XU Tb£İIİ`•p+V\0î‹Ñ;‹CbÎÀXñ+Ï’sïü]H÷Ò[ák‹x¬G*ô†]·awnú!Å6‚òâÛĞmSí¾“IŞÍKË~/Ó¥7ŞùeeNÉòªS«/;dåA†>}l~Ïê ¨%^´fçØ¢pÚœDEîÃa·‚t\nx=ÃkĞ„*dºêğT—ºüûj2ŸÉjœ\n‘ É ,˜e=‘†M84ôûÔa•j@îTÃsÔänf©İ\nî6ª\rdœ¼0ŞíôYŠ'%Ô“íŞ~	Ò¨†<ÖË
–Aî‹–H¿G‚8ñ¿Îƒ\$z«ğ{¶»²u2*†àa–À>»(wŒK.bP‚{…ƒoı”Â´«zµ#ë2ö8=É
8>ª¤³A,°e°À…+ìCè§xõ*ÃáÒ-b=m‡™Ÿ,‹a’Ãlzkï\$Wõ,mJiæÊ§á÷+‹èı0°[
¯ÿ.RÊsKùÇäXçİZ
LËç2`Ì(ïCàvZ¡ÜİÀ¶è\$×¹,åD?H±ÖNxXôó)’îM¨‰\$ó,Í*\nÑ£\$<qÿÅŸh!¿¹S“âƒÀŸxsA!˜:´K¥Á}Á²“ù¬£œRşšA2k·Xp\n<÷ ş¦ıëlì§Ù3¯ø¦È•VV¬}£g&Yİ!†+ó;<¸YÇóŸYE3r³Ùñ›Cío5¦Åù¢Õ³Ïkkş…ø°ÖÛ£«Ït÷’Uø…­)û[ıßÁî}ïØu´«lç¢:DŸø+Ï _oãäh140ÖáÊ0ø¯bäK˜ã¬’ öşé»lGª„#ªš©ê†¦©ì|Udæ¶IK«êÂ7à^ìà¸@º®O\0HÅğHiŠ6\r‡Û©Ü\\cg\0öãë2BÄ*eà\n€š	…zr!nWz& {H–ğ'\$X  w@Ò8ëDGr*ëÄİHå'p#Ä®€¦Ô\ndü€÷
,ô¥—
,ü;g~¯\0Ğ#€Ì²EÂ\rÖI`œî'ƒğ%EÒ. ]`ÊĞ›…î%&Ğîm°ı\râŞ%4S„vğ#\n fH\$%ë-Â#­ÆÑqBâíæ ÀÂQ-ôc2Š§‚&ÂÀÌ]à™ èqh\rñl]à®s Ğ Ñhä
7±n#±‚‚Ú-àjE¯Frç¤l&dÀØÙåzìF6¸ˆÁ\" “|¿§¢s@ß±®åz)0rpÚ\0‚X\0¤Ùè|DL<!°ôo„*‡D¶{.B<Eª‹‹0nB(ï |\r\nì^©à h³!‚Öêr\$§’(^ª~èŞÂ/pq²ÌB¨ÅOš ˆğú,\\µ¨#RRÎ%ëäÍdĞHjÄ
`Â ô
®Ì­ Vå bS’d§iE‚øïoh´r<i/k\$-Ÿ\$o”¼+ÆÅ‹ÎúlÒŞO³&evÆ’¼iÒjMPA'u'Î’( M(h/+«òWD¾So·.
n·.ğn¸ìê(œ(\"­À§hö&p†¨/Ë/1DÌŠçjå¨¸EèŞ&â¦€,'l\$/.,Äd¨…‚W€bbO3óB³sH :J`!“.€ª‚‡Àû¥ ,FÀÑ7(‡ÈÔ¿³

û1Šlås ÖÒ‘²—Å¢q¢X\rÀš®ƒ~Ré°±`®Òó®Y*ä:R¨ùrJ´·%LÏ+n¸\"ˆø\r¦ÎÍ‡H!qb¾2âLi±%ÓŞÎ¨Wj#9ÓÔObE.I:…6Á7\0Ë6+¤%°.È…Ş³a7E8VSå? (DG¨Ó³Bë%;ò¬ùÔ/<’´ú¥À\r ì ´>ûMÀ°@¶¾€H  D
sĞ
°Z[tH£Enx(ğŒ©R xñû@¯şGkjW”>ÌÂÚ#T/8®c8éQ0Ëè_ÔIIGII’!¥ğŠYEdËE´^tdéthÂ`DV!Cæ8¥\r­´Ÿb“3©!3â@Ù33N}âZBó3	Ï3ä30ÚÜM(ê>‚Ê}ä\\Ñtê‚f fŒËâI\r®€ó337 XÔ\"tdÎ,\nbtNO`Pâ;­Ü•Ò­ÀÔ¯\$\n‚ßäZÑ­5U5WUµ^hoıàætÙPM/5K4Ej ³KQ&53GX“Xx)Ò<5D…\rûVô\nßr¢5bÜ€\\J\">§è1S\r[-¦ÊD
uÀ\rÒâ§Ã)00óYõÈË¢·k{\nµÄ#µŞ\r³^·‹|èuÜ»Uå_nïU4ÉUŠ~YtÓ\rIšÃ@ä³™R ó3:ÒuePMSè0TµwW¯XÈòòD¨ò¤KOUÜà•‡;Uõ\n OYéYÍQ,M[\0÷_ªDšÍÈW ¾J*ì\rg(]à¨\r\"ZC‰©6uê+µYóˆY6Ã´0ªqõ(Ùó8}ó3AX3T  h9j¶jàf õMtåPJbqMP5>ğÈø¶©Y‡k%&\\‚1d¢ØE4À µYnÊí\$<¥U]Ó‰1‰mbÖ¶^Òõš ê\"NVéßp¶ëpõ±eMÚŞ×WéÜ¢î\\ä)\n Ë\nf7\n× 2
´õr8‹—=Ek7tVš‡µ7P¦¶ LÉía6òòv@'‚6iàïj&>±â;­ã`Òÿa	\0pÚ¨(µJÑë)«\\¿ªnûòÄ¬m\0¼¨2€ôeqJö­PôtŒë±f
jüÂ\"[\0¨·† ¢X,<\\Œî¶×â÷æ·+md†å~ âàš…Ñs%o°´mn×),×„æÔ‡²\r4¶Â8\r±Î¸×mE‚H]‚¦˜üÖHW­M0Dïß€—å~Ë˜K˜
îE}ø¸´à|fØ^“Ü×\r>Ô-z]2s‚xD˜d[s‡tS¢¶\0Qf- K`­¢‚tàØ„wT¯9€æZ€à	ø\nB£9 Nb–ã<ÚBşI5o ×oJñpÀÏJNdåË\rhŞÃ2\"àxæ HCàİ–:øı9Yn16Æôzr+z±ùş\\’÷•œôm Ş±T öò ÷@Y2lQ<2O+¥%“Í.Óƒhù0AŞñ¸ŠÃZ‹2R¦À1£Š/¯hH\r¨X…ÈaNB&§ ÄM@Ö[xŒ‡Ê®¥ê–â8&LÚVÍœvà±*šj¤ÛšGH åÈ\\Ù®	™²¶&sÛ\0Qš \\\"èb °	àÄ\rBs›Éw‚	ÙáBN`š7§Co(ÙÃ à¨\nÃ¨“¨1š9Ì*E˜ ñS…ÓU0Uº tš'|”m™°Ş?h[¢\$.#É5	 å	p„àyBà@Rô]£…ê@|„§{™ÀÊP\0xô/¦ w¢%¤EsBd¿§šCUš~O×·àPà@Xâ]Ô…¨Z3¨¥1¦¥{©eLY‰¡ŒÚ¢\\’(*R` 	à¦\n…ŠàºÌQCFÈ*¹¹àéœ¬Úp†X|`N¨‚¾\$€[†‰’@ÍU¢àğ¦¶àZ¥`Zd\"\\\"…‚¢£)«‡Iˆ:ètšìoDæ
\0[²¨à±‚-©“ gí³‰™®*`hu%£,€”¬ãIµ7Ä«²Hóµm¤6Ş}®ºNÖÍ³\$»MµUYf&1ùÀ›e]pz¥§ÚI¤Åm¶G/£ ºw Ü!•\\#5¥4I¥d¹EÂhq€å¦÷Ñ¬kçx|Úk¥qDšb…z?§º‰>úƒ¾:†“[èLÒÆ¬Z°Xš®:¹„·ÚÇjßw5	¶Y¾0 ©Â“­¯\$\0C¢†dSg¸ë‚ {@”\n`	ÀÃüC ¢·»Mºµâ»²# t}xÎN„÷º‡{ºÛ°)êûCƒÊFKZŞj™Â\0PFY”BäpFk–›0<Ú>ÊD<JE™šg\rõ.“2–ü8éU@*Î5fkªÌJDìÈÉ4•TDU76É/´è¯@·‚K+„ÃöJ®ºÃÂí@Ó=ŒÜWIOD³85 MšNº\$Rô\0ø5 ¨\ràù_ğªœìEœñÏI«Ï³Nçl£Òåy\\ô‘ˆÇqU€ĞQû ª\n@’¨€ÛºÃpš¬¨PÛ±«7Ô½N\rıR{*qmİ\$\0R”×Ô“ŠÅåqĞÃˆ+U@ŞB¤çOf*†CË¬ºMCä`_
 èüò½ËµNêæTâ5Ù¦C×»© ¸ à\\WÃe&_XŒ_Øhå—ÂÆBœ3ÀŒÛ%ÜFW£û|™GŞ›'Å[¯Å‚À°ÙÕV Ğ#^\rç¦GR€¾˜€P±İFg¢ûî¯ÀYi û¥Çz\n â¨Ş+ß^/“¨€‚¼¥½\\•6èßb ¼dmh×â@qíÕAhÖ),J­×W–Çcm÷em]ÓeÏkZb0ßåşYñ]ymŠè‡fØe¹B;¹ÓêOÉÀwŸapDWûŒÉÜÓ{›\0˜À-2/bN¬sÖ½Ş¾Ra“Ï®h&qt\n\"ÕiöRmühzÏeø †àÜFS7µĞPPòä–¤âÜ:B§ˆâÕsm¶­Y düŞò7}3?*‚túòéÏlTÚ}˜~€„€ä=cı¬ÖŞÇ	Ú3…;T²L Ş5*	ñ~#µA•¾ƒ‘sx-7÷f5`Ø#\"NÓb÷¯G˜Ÿ‹õ@Üeü[ïø¤Ìs‘˜€¸-§˜M6§£qqš h€e5…\0Ò¢À±ú*àbøISÜÉÜFÎ®9}ıpÓ-øı`{ı±É–kP˜0T<„©Z9ä0<Õš\r­€;!Ãˆgº\r\nKÔ
\n•‡\0Á°*½\nb7(À_¸@,îe2\rÀ]–K…+\0Éÿp C\\Ñ¢,0¬^îMĞ§šº©“@Š;X\r•ğ?\$\r‡j’+ö/´¬BöæP ½‰ù¨J{\"aÍ6˜ä‰œ¹|å£\n\0»à\\5“Ğ	
156ÿ† .İ[ÂU
Ø¯\0dè²8Yç:!Ñ²‘=ºÀX.²uCªŠŒö!Sº¸‡o…pÓBİüÛ7¸­Å¯¡Rh­\\h‹E=úy:< :u³ó2µ80“si¦ŸTsBÛ@\$ Íé@Çu	ÈQº¦.ô‚T0 M\\/ê€d+Æƒ\n‘¡=Ô°dŒÅëA¢¸¢)\r@@Âh3€–Ù8.eZa|.â7YkĞcÀ˜ñ–'D#‡¨Yò@Xq–=M¡ï44šB AM¤¯dU\"‹Hw4î(>‚¬8 ¨²ÃC¸?e_`ĞÅX:ÄA9Ã¸™ôp«GĞä‡Gy6½ÃF“Xr‰¡l÷1¡½Ø»B¢Ã…9Rz©õhB„{€™\0ëå^‚Ã-â0©%Dœ5F\"\"àÚÜÊÂ™úiÄ`ËÙnAf¨ \"tDZ\"_àV\$Ÿª!/…D€áš†ğ¿µ‹´ˆÙ¦¡Ì€F,25Éj›Tëá—y\0…N¼x\rçYl¦#‘ÆEq\nÍÈB2œ\nìà6·…Ä4Ó×”!/Â\nóƒ‰Q¸½*®;)bR¸Z0\0ÄCDoŒ
Ë48À•´µ‡Ğe‘\nã¦S%\\úPIk‡(0ÁŒu/™‹G²Æ¹ŠŒ¼\\Ë} 4Fp‘Gû_÷G?)gÈotº[vÖ\0°¸?bÀ;ªË`(•ÛŒà¶NS)\nãx=èĞ+@êÜ7ƒjú0—,ğ1Ã…z™“­>0ˆ‰GcğãL…VX
ôƒ±ÛğÊ%À…Á„Q+øéoÆFõÈéÜ¶Ğ>Q-ãc‘ÚÇl‰¡³¤wàÌz5G‘ê‚@(h‘cÓHõÇr?ˆšNbş@É¨öÇø°îlx3‹U`„rwª©ÔUÃÔôtØ8 Ô=Àl#òõlÿä¨‰8¥E\"Œƒ˜™O6\n˜Â1e£`\\hKf—V/Ğ·PaYKçOÌı éàx‘	‰Oj„ór7¥F;´êB»‘ê£íÌ’‡¼>æĞ¦²V\rÄ– Ä|©'Jµz«¼š”#’PBä’Y5\0NC¤^\n~LrR’Ô[ÌŸRÃ¬ñgÀeZ\0x›^»i<Qã/)Ó%@Ê’™fB²HfÊ{%Pà\"\"½ø@ªş)ò’‘“DE(iM2‚S’*ƒyòSÁ\"âñÊeÌ’1Œ«×˜\n4`Ê©>¦Q*¦Üy°n”’¥TäuÔâä”Ñ~%+W²XK‹Œ£Q¡[Ê”àlPYy#DÙ¬D<«FLú³Õ@Á6']Æ‹‡û\rFÄ`±!•%\n0cĞôÀË©%c8WrpGƒ.TœDo¾UL2Ø*é|\$¬:çXt5ÆXYâIˆp#ñ ²^\nê „:‚#Dú@Ö1\r*ÈK7à@D\0¸C’C£xBhÉEnKè,1\"õ*y[á#!ó×™âÙ™©Ê°l_¢/€öxË\0àÉÚ5ĞZÇÿ4\0005JÆh\"2
ˆŒ‡%Y…¦a®a1SûO4ˆÊ%niøšPŒàß´qî_
Ê½6¤š•~ŠÈI\\¾š‘d‰údÑøŒ®—DÜÈ”€µ3g^ãü@^6Õ„
îå_ÀHD·.ksL´Ô@ÂùÉˆæn­I¦ÄÑ~Ä\r“b @¸Ó€•Nt\0séÂ]:uğÎX€b@^°1\0½©¥2?èTÀó6dLNeÉ›+ê\0Ç:©Ğ²l¡ƒz 6q=Ìºx“§çN6 ÜO,%@s›0\næ\\)ÒL<òCÊ|·¦P¶b¢˜¼ÎA>I‹…á\"	ŒÜ^K4ü‹g
IXi@P…jE©&/1@æfÜ	ÔNáºx0
coaß§Áª‰ó,C'Üy#6F@¡Ğ ‰H0Ç {z3t–|cXMJ.*BĞ)ZDQğå\0°ñ“T-v¥Xa*”İ,*Ã<bÁ•Ë#xÑ˜İd€PÆòKG8—Æ y“K	\\#=è)ígÈ‘hŒ &È8])½CÅ\nÃ´ñÀ9¼zˆW\\’gşM 7Šˆ!Ê•¡ó
ÆŠ–¬,Åò9ñ²Š©©\$T\"£,Š¨%.F!Ëš A»-àé”ø¹-àg¨ âŠ\0002R>KEˆ'ØUÙ_IĞ÷ì³9³Ë¼¡j(Q°@Ë@ò4/¬7ô˜“'J.â‡RT…\0]KS¹D‡–Ap5¼\rÂH 0!ä›Â´e	d@RÒÒà¸´Ê9¢S©;7H‘BÀbxóJèÖ_viÑU`@ˆµ ÃSAM…¯XËÏGØXiÙÓU*¬Úö€ÊõûÍ'øİ:VòWJv£D¾ÿN'\$ìzh\$d_y§œ“Z]•™­óYÊ°³8Ø”ş¡æ]¨Pìœ*hÔÖ§e;€ºpeû¢\$kæw§ì*7N²DTx_ÔÔ§½Giô&PÿÔ†tÍ†¨bè\\EÆH\$iE\"cr½å0l‰?>ÁñŒ‘C(ŠW@3ÈÁ•22a´“IÁà¹Õ¡{¥B`ÜÚ³iÅ¸Go^6E\r¡ºG˜M¤p1iÙI¼¤Xª\00032ÇKü§Óôİzl&Ö†‰'ILÖ\\Î\"’7¤>¬j(>ãjôFG_âä& 10IÆA31= h q\0ÆFŠ«–„Ä·Šİ_Â JªŒ„Ô³VÎ–º‡Ü†qÙÕš¢Ù	Âà(/¾dOC_sm§<g˜x\0’°\"ğ\n@EkH\0¡Jˆ­®8€(¬¨¯km[‰‘ì¿ÁS4ğ\nY40›«+L
\nŠ¦À“‘ì#BÓ«bçÀ%RÖ–°µ×­‘ÀR:Æ<\$!Û¥r;œ…Ç	%|Ê¨á(€|«H‡\0àğ‘ÁĞŒ°…]ÂcÒ¡=
0¯íZá¨\"\"=ÖX•˜)½fëNŸ6V}FÕÚ=[Éà§¢huô-ø±\0t¥åbW~ºõQ•ÕiJŠö—Lñ5×­q#kb İWn««ÍQøTƒ!ëÂeõncSÑ[+Ö´E¯<-‡–a]ÅƒˆìYbÓ\n\nJ~ä|JÉƒ8® ìLpŸ™Áæoñ €Nä©Ü¨…J.ùÅƒSÈ¡2c9Ãj©yŸ-`a\0Äö*ìÖˆ@\0+´ØmgÉÚ6°1¤ÔMe\0ªËQ ‰_„}!Iö ’GL€f)ÃXño
,“ShxÂ\0000\"hğ+L¥MÔÉ ªÑ˜±ÊZ	j—\0¶ µ/˜\$’¨>u*—Z9”îZå®eõ« +Jœ‰™¸tzÈËûÈşR¨KÔ¯ĞÑâDyŞÙqá0C—-f¢Åm‚¶¹ªBIí|’¹HB‰œsQlÀX °ƒ.İÅöÔ|¸cˆªÀ[–óZhZåÃl˜¨ÛxÂ@'µ ml²KrQ¶26½•]¯Ò·n§d[İöñ©‡dş€‘\"GJ9uòûBƒo“©Zß–Õa¥²n@Áªn°lW|*gX´ \nn2åF¬|x`Dk›„uPP!Q\rr‹™` W/¹ŒŸ	1æ[-o,71bUs˜¢©çN¸7²ËÉÛGq¸.\\Q\"CCT\"æ‘à–ÄÒ*?u¨ts¶‰”°Ç]áÙ©Pz[¥[YFÏ¹¢›FD3¤\"–ºÇ]uÛ)w
z­:#¶ÍİIiwŠêp
É›»ñ{¯oÖ0nğ¶Û;Õâ\\éx¸°Ø\0q·måãíª&Ø~Âîî—”7²øÀ¹9
[¤HéqdL•Oº2´v|B¯tæŠ\\Æ¤‰Hd¦ëâH‘\" òìN\n\0
·©GÅgÎF ¸Fˆ}\"ì­&QEK¾‘{}\ryÇ¾˜r×›t›À„ï†7ÔNuÃ³[Aøgh;S¥.Ò ‚š±Â¥
|yùÏ[Õ†_bòÈ¨¬!+RñèZXù@0NééşÁP€Şì%¡jD£Â¯z	şà—[øU\"¶{e’8ôŸ>”EL4JĞ½…0›¡¦è7 €´ d·¬ 
ÀQ^`0`œ•¯]cğ<g @²hy8˜íp.ef\nóÎeh‡ƒaXÚÃømSßßjBÚ˜Q\"‡\rë×ÇK3†=>ÇªAX”[,,\"'< µ›–%¶a€«Ó´Ãµ.\$ñ\0ç%\0ásV¤îËp M\$¼@já×ğ>¤­}VeÄ\$@—Í„
#§ªĞ(3:ø`‚UğšYÌ¶uæ¨ûˆÏâÎ@ÄV#E‰G/¸üXD\$ˆhµƒav–¼ xS\"]k18a¯Ñ9dJROÓŠs‘`EJ°½§øUo³m{l¹B8¥ˆÁ(\n}ei±bü ø, ; N”ªÍ‡øQØ\\èÇ¸I5yR¼\$!>\\Ê‰ŒgÂuj*?n°MÓŞ²hİø\r%Á³àU(d€¦Nµd#}šp A:¬¨ı•-\\è
A»*Ä4€2I€®è\rÖ£»… 0h@\\ÔµÉÀ8ğ3‚rq]òùd8\"ğQ ŒÿîÆ™:cÆàyÇ4	Ïá‘šdaÂ€‡Î 6>UÛAÚÑ:½@˜2‹Ûÿ\$òeh2´ûF»§É™Ná+’ŒŸ\rşÔ€(îAr‚°d*ü\0[®#cjŠû´>!(SğÈéLˆeıTÉÆM	9\0W:™BDıø‚3JŒ¬Õ_@sÇárue‡ø¦ ğ»ı¬ +º'B«É}\"B\"üz2î‹rël»xF[èLÙË²Ea9 Êcdb½¾^,ÔUC=/2»×ò¼øì/\$CÆ#Ú÷8¡}DÀÛ×6Ï
`^;6B0U7ó·_=	,ª1âj1V[¨.	H9(1ï±Æ±ÒLz¢C¸	Ç\$.AÊfhã–«¾ÍàïD rY	ıHØe~o—r19æ—Ù…\\šß„P’)\"ÃQ¹´,ÑeòöL¾”w0Ï\0§—š–Ï;wì
X³Ç¨‰çqo¹ï¾~Ÿ«öçø>9ô>}²òºdc¿\0åÊg¾¶fÎùq–&9—¹-ıJ#¤Š¸ª3^4m/Ì™¯\0\0006À¦n8£·>äˆ´.Ó—é’cph±ËÙù•››º_A@[‰•7«|9\$pMh >‰ŒÁ5°K¥úÃE=hşšAÒtŠ^âV×	©\"	c£B;¤öŞi…ÕQÒ t¬›òé@,\nØ)­óˆsÓ`Ÿ™°°;Ñ4´—‚„Ií£©‘íùèy€ -¤0yeÊ¨—U‚”Bî©v³¥3H™PÇGË5êï’s|·º\rğĞ\$0ãèò•ò1½©l3€é(*oF~PK´ª.ı,'·J/Ó²tğ‹d:š—n§\n©ğj†Y«zê(Æó’ü“w°İ Zì#ZÊ	Io•@1ÆÎ»\$ïò±¦=VWz•	nBøaú›A»µqª@™´I€p	@Ñ5Ó–lH{UºÜoXõ¿fğÓ¿\\zµ×.§š²,-\\Ú—^y n^Å×ÊBq·ş…¤ zXã‰¡ƒ\$¨*J72ÕD4.†Õ…!¤M0¶óDëìFŠàóã G¡ÏLˆmØc*mïcI£å5ÉŒ»^—t¿ª’jlŒ7æ›¿S¶Q ¢.i’éÖÔh¨õLĞÚ±B6Ô„h˜&ïJ …l\\‰ğWeªcÎf%kj™Á ¦pÃR=Œäi’@.õ¥(ä2klHUW\"™o¥j½§’p!S5Æè­pL'`\0¤O *¦Q3XÂ“‰ŞlJ\08\n…\r·²¸*€añüë–¼ûr™`<¤&ÚXBhÖ8!xš®&äBht¥\$ÿ‡ş]Énß†éóÉcL€€[Æµ©d¸á<`œ®\0œ€¢Ï‚ŞawæO%;‘õBC»…Q’\rÌ­ÓìŒì€pŠ¤«ØPQ¶Z’¸úZÁAu=N&Ğia\nÑmK6I}Ñ×n	šÅt\nd)í®ĞÈ÷bpÎ€\"ğg'¦0œ7ÃuÈ&@â
7å8X NÀxÄáö­ú\$BùßZB/¶M¯gB»i¦ÖÑ§¶\\âmƒmIÌÄ€Êç;5=#&4˜ÌçşPÕ‰½éğqí’A™ä›\\…,q¤cŞŸ\ncâB–‚¾×úw\0BgjD‹@;=0m“k®Ä\rÄ²‹`
À¤'5¤•¶k-Œ{¢‰\0¯_›Muîøƒ2“Ò×†§»£Àqø‰¬ğ>)9ÈW\näd+…ÔÔ§ÀG\rıÃn4„‹äOØ:5ö†Ş8»1µ:Îš?¥‡(yGgWK
\rİ7­²“—m5.œ‚eŒHÙhJ«Ak#»ÓL¶..›\\Î=ÕñUÙĞ„˜ƒÓ:Ğ>7ºW+^yD‚“œb­üG¡‘OZÍ4ïŠr(|xµÆıPr¸£,y©Ğ8qaÜ©O2µkªn˜Š#p2¾ûÇˆºØ”.¼£c’–U—c”öäëÅ‚jó\$ôí8Ä¬~š7ZR:ğ×†8­9Î¨w(a”L¤%­-,ÔÈì¿Œ#ôfƒ%8şÉ|Şc‡‘¬œÚ×%X‘WÂ\n}6’‘HìÿñæË¤¡#¹&J,'z“MüM…¢‰Œààº‘Ü†² ‘˜®/y6YQ¯‘ì¶ÚºdÓ™dÁŞóÏ:õãô£EƒŒp2gŸgÁ/î,ÒËäÚÕˆ'8ì^;´UWN…ÑÅŞÕ{ÉOCò…Ñ¤ô¢zÉiKX¢’Ú”NŒdG£RCJYõ’‘i²’×y#>zS²MUc£õƒ¨ûÿêRORÔ¾¡0)Ø0Êú]:=Ï™tƒ‘Áëé'\$™sÒrFöÙ67	
=\$BÄÓ!qs	1\"ü¬vÆ÷%‘ŒI•l<Êb!Û®6(Cd-Ê^<H`~2¹KìÍzKİÙœ€Ô±­ÙÕy,qAá*º\0}‚İC¨pb€\\ÓSå5İßùÚ'(›áÓí|»Mëğ„ÀWÚÀ5;\$5
µT|ºò ;kõñÈtîñ@ò‘â;9³)½ò;i.Û;›·í_¥ê×ÌF¶=ñœDä¥M`HŞ“ƒ\0ˆ	 N @°%w‡ªdèPbğ\$H|kÆ[¾ÜdCI!:lÅü,§¨ı<÷”uòt”ô¼NeÏW^¡wè'6•ŒD¿áfıu ¬ihI÷Z:ŸÑ~ı÷Ï£r¾…ÈzÄ3õ+¯uoC·s2ÕbÆua”XğwWK£	HÔ¶27>âWÏÍİyÃ£¬İMëJ£rpT¼”Lğ‰|`f™…:ÊõšA²täŠd|i½³[wüèj„ŠW˜ 7‘¤£au‹© úëe ò•šA5­Q' Ê\0È 3‹Ò¾\$ÂçıŒ\rk)a; óæH=ù™Ö~óIGŠIæ°<ù´•\"ù¬ÉI1'è ™¢Gcm\0P\nïwèü#Í>Œ½ÛxB\"ñÒEm|…ù2Š\$}<3PYXgo£dß¶€<Ôş£¿qE\"`×úÈ4ág«8r£]\nˆ¡—õ:ø›qVbTì£Òm°•…9K&Ò“Ä¤ÃmÔ7)@¨ÀQz›ÃÓ=¢½ßµÅ±íŸH\nÔëö}Oçi}»\rÙ£.¢¹v‹®p¾JW&ßu×550	Ô5ÀîPËIŒÁ\n½Ûí¸³Ææ­l\0O5*=Şú	…P-¢éÊH
\0óf×%Ìtãº*¥S:±tÏ› €€?øÈ‚Hâñ÷ºq4ˆĞKÍ”§@€Ô¬»Ü‚.O(±ëü Z¡\$ÏÊÓ]¼‚Åo¿€n‹z«A±!€t85<WñR2[„8ò‚¶ùn5\$Iİµæµ•Z¤ Àéó]'}ET\nŸú†Šä.˜í¤&ä7¦ÏVË@¤_ÀD”oÈı&J6°ß4iÃj\$ÈÒEL¢äşu“Üt¢‰Ëä+I¡Ğ¢¢šûØ£~üS±SZTXÒ ¾PYz½Å\"\$VÇ_]ÿM(§ã7òƒºü·ÚÌáÃÀ‡t _´S‰óˆÃê/­ßt…½“Ä‚ü¿âmHä:\0»5à- _Z'#ö¥Á1‡P¿é´,}(Ÿ°~¸ \0ì‹ş!Ò–`-şP\neùy ( ¿Êˆ  `9OËú!Á;5‰\n½\$ ê{úŸ¯şğìUAü¨7ùá!¿çò€[ı ¸Yı¿ÅFæ¿´ÿƒı¯ğ>è8&€›Şÿ!CLà¦ÿH€¯õ(”\0'Ç2ûìd\r%‚;àkæŠ4ûÀ_OÏ>ş5³öà@DıÒ¼ÏŞ\0VÃA€6' AY¬¢¶ıS°¿‚££rÔ¾´4š+h@bÿãõ­¾´ş‚Oá”M\0Àå˜ÀrÌ›ú@ÿ\rJùÓm0\08ùOò€ìÿ;kÓ ÊëşA(6£|	`8 ß\0ˆ°&¿²EĞVÏå\0VşãñÏï€wk…NÀ°KùÁ—¡xdpÀÒÿsìAL§â«A¾Xëkÿ‘u\0Œïş„Ít ÀÔ¢ò.‰>(N’ÅK'flï¢ªdúAŠ‚â?++ğN“Œ~‚ ÿ²˜úkæ€¾²€ªPR\0èúx¡ØãûèÊ‘ô”‹BK]¦bUÃÑ\\Ì›¸€„d\0S@¿ä«QÀïÍ‰šb™\0\0b„„Ö\0_\\¡@\nN—î äOÎA
„PfÁ„€ Œ¶ôÔAj ¨ÂM4<¤9“°Ú+çÀ¿¨Ÿ`S‰‹ ìü”Èw3Tğ ¬„7âX»Â†T!\0eïPAIÈb 1!\0€4³åà'¹ @ ! 8\0’Ë/ïˆ º!:K•,
ØCASğX‘f®e©ÎMùı.:˜¼:òÆtŸ»¡àÃÌ._ºd„ÿ‹°81v`B\"ä‚Å!.^Ú*åáN.^‡š\n„&\r(Ÿš.Á©§î
O0Š«@÷ÙPŠ¹njÒàÚ—#¡¼îäÓå&¹‚rHØ<¨†  ¢!à’3¶Ü(i @ÜAaÁÅ {õ Â¬#ÉS©½†6 ğ¨˜¶F@©Ô¦ãY[Oœ ƒ( .‡¬/„BüËñÇó )
L02BØˆÌ-ÁÆ€Øùqp¹‹J<¤.Ğ‘\0\nç ï\0ĞÔ/@8C¤4PÀÇ\r	PÂ•°)üğFâå\$q.]¬\"B#‹Å	œ#\\£Â84\$Ãs:.(*Oi>™|#T'`—Bu«a/ˆ€ãCÀÂTØKaêX8Î`p ¸ÚÕÁ\0`Ê\0");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("v0œF£©ÌĞ==˜ÎFS	ĞÊ_6MÆ³˜èèr:™E‡CI´Êo: C„”Xc‚\ræØ„J(:=ŸE†¦a28¡xğ¸?Ä'ƒi°SANN‘ùğxs…N BáÌVl0›ŒçS	œËUl(D|Ò„çÊP¦À>šE†ã©¶yH
chäÂ-3Eb“å ¸b½ßpEÁpÿ9.Š˜Ì~\n?Kb±iw|È`Ç÷d.¼x8EN¦ã!”Í2™‡3©ˆá\r‡ÑYÌèy6GFmY8o7\n\r³0¤÷\0DbcÓ!¾Q7Ğ¨d8‹Áì~‘¬N)ùEĞ³`ôNsßğ`ÆS)ĞOé—
·ç/º<xÆ9o»ÔåµÁì3 n«®2»!r¼:;ã+Â9ˆCÈ¨®‰Ã\n<ñ`Èó¯bè\\š?`†4\r#`È<¯BeãB#¤N Üã\r.D`¬«jê4ÿpéar°ø
ã¢º÷>ò8Ó\$Éc ¾1Écœ ¡c êİê{n7ÀÃ ¡ƒAğNÊRLi\r1À¾ø!£(æ
jÂ´®+Âê62ÀXÊ8+Êâàä.\rÍÎôƒÎ!x¼åƒhù'ãâˆ6Sğ\0RïÔôñOÒ\n¼…1(W0…ãœÇ7 qœë:NÃE:68n+äÕ´5_(®s \rã”ê‰/m6PÔ@ÃEQàÄ9\n¨V-‹Áó\"¦.:åJÏ8weÎq½|Ø‡³XĞ]µİY XÁeåzWâü 7âûZ1íhQfÙãu£jÑ4Z{p\\AUËJ<õ†káÁ@¼ÉÃà@„}&„ˆL7U°wuYhÔ2¸È@ûu  Pà7ËA†hèÌò°Ş3Ã›êçXEÍ…Zˆ]­lá@Mp lvÂ)æ Á ÁHW‘‘Ôy>Y-øYŸè/«›ªÁî hC [*‹ûFã­#~†!Ğ`ô\r#0PïCË—f ·¶
¡îÃ\\î›¶‡É^Ã%B<\\½fˆŞ±ÅáĞİã&/¦O‚ğL\\jF¨jZ£1«\\:Æ´>N¹¯XaFÃAÀ³²ğÃØÍf…h{\"s\n×64‡ÜøÒ…¼?Ä8Ü^p\"ë°ñÈ¸\\Úe(¸PƒNµìq[g¸Árÿ&Â}PhÊà¡ÀWÙí*Şír_sËP‡hà¼àĞ\nÛËÃomõ¿¥Ãê—Ó#§¡.Á\0@épdW ²\$Òº°QÛ½Tl0† ¾ÃHdHë)š‡ÛÙÀ)PÓÜØHgàı Uş„ªBèe\r†t:‡Õ\0)\"Åtô,´œ’ÛÇ[(DøO\nR8!†Æ¬ÖšğÜlAüV…¨4 hà£Sq<à@}ÃëÊgK±]®àè]â=90°'€åâøwA<‚ƒĞÑaÁ~€òWšæƒD|A´††2ÓXÙU2àéy ÅŠŠ=¡p)«\0P	˜s€µn…3îr„f\0¢F…·ºvÒÌG®ÁI@é%¤”Ÿ+Àö_I`¶ÌôÅ\r.ƒ N²ºËKI…[”Ê–SJò©¾aUf›Szûƒ«M§ô„
%¬·\"Q|9€¨Bc§aÁq\0©8Ÿ#Ò<a„³:z1Ufª·>îZ¹l‰‰¹ÓÀe5#U@iUGÂ‚™©n¨%Ò°s¦„Ë;gxL ´pPš?BçŒÊQ\\—b„ÿé¾’Q„=7:¸¯İ¡Qº\r:ƒtì¥:y(Å ×\nÛd)¹ ĞÒ\nÁX; ‹ìêCaA¬\ráİñŸP¨GHù!¡ ¢@È9\n\nAl~H úªV\nsªÉÕ«Æ¯ÕbBr£ªö„’­²ßû3ƒ\rP¿%
¢Ñ„\r}b/‰Î‘\$“5§PëCä\"wÌB_çÉUÕgAtë¤ô…å¤…é^QÄåUÉÄÖj™Áí Bvhì¡„4‡)¹ã+ª)<–j^<Lóà4U* õBg ëĞæè*nÊ–è-ÿÜõÓ	9
O\$´‰Ø·zyM™3„\\9Üè˜.oŠ¶šÌë¸E(iå à
œÄÓ7	tßšé-&¢\nj!\rÀyœyàD1gğÒö]«ÜyRÔ7\"ğæ§·ƒˆ~ÀíàÜ )TZ0E9MåYZt
Xe!İf†@ç{È¬yl	8‡;¦ƒR{„ë8‡ Ä®ÁeØ+ULñ'‚F²1ıøæ8PE5-	Ğ_!Ô7…ó [2‰JËÁ;‡HR²éÇ¹€8pç—²İ‡@™£0,Õ®psK0\r¿4”¢\$sJ¾Ã4ÉDZ©ÕI¢™'\$cL”R–MpY&ü½Íiçz3GÍzÒšJ%ÁÌPÜ-„[É/xç³T¾{p¶§z‹CÖvµ¥Ó:ƒV'\\–’KJa¨ÃMƒ&º°£Ó¾\"à²eo^Q+h^âĞiTğ1ªORäl«,5[İ˜\$¹·)¬ôjLÆU`£SË`Z^ğ|€‡r½=Ğ÷nç™»–˜TU	1Hyk›Çt+\0váD¿\r	<œàÆ™ìñj G”­tÆ*3%k›Y
Ü²T*İ|\"CŠül  hE§(È\rÃ8r‡×{Üñ0å²×şÙDÜ_Œ‡.6Ğ¸è;ãü‡„rBjƒO'Ûœ¥¥Ï>\$¤Ô`^6™Ì9‘#¸¨§æ4Xş¥mh8:êûc‹ş0ø×;Ø/Ô‰·¿¹Ø;ä\\'( î„tú'+
™òı¯Ì·°^
]­±NÑv¹ç#Ç,ëvğ×ÃOÏiÏ–©>·Ş<SïA\\€\\îµü!Ø3*tl`÷u\0p'è7…Pà9·bsœ{Àv®{·ü7ˆ\"{ÛÆrîaÖ(¿^æ¼İE÷úÿë¹gÒÜ/¡øUÄ9g¶î÷/ÈÔ`Ä\nL\n) À†‚(Aúağ\" çØ	Á&„PøÂ@O\nå¸«0†(M&©FJ'Ú! …0Š<ïHëîÂçÆù¥*Ì|ìÆ*çOZím*n/bî/ö®Ôˆ¹.ìâ©o\0ÎÊdnÎ)ùi:RÎëP2êmµ\0/vìOX÷ğøFÊ³ÏˆîŒè®\"ñ®êöî¸÷0õ0ö‚¬©í0bËĞgjğğ\$ñné0}°	î@ø
=MÆ‚
0nîPŸ/pæotì€÷°¨ğ.ÌÌ½
g\0Ğ) o—\n0È÷‰\rF¶é
€  b¾i¶Ão}\n°Ì¯…	NQ
°'
ğxòFaĞJîÎôLõéğĞàÆ\rÀÍ\r€Öö‘0Å ñ'ğ¬Éd
	oepİ°4DĞÜÊ¦q(~ÀÌ ê\r‚E°ÛprùQVFHœl£‚Kj¦¿äN&­j!ÍH`‚_bh\r1 º
n!ÍÉ­z™°¡ğ¥Í\\«¬\rŠ íŠÃ`V_kÚÃ\"\\×‚'Vˆ«\0Ê¾`ACúÀ±Ï…¦VÆ`\r%¢’ÂÅì¦\rñâƒ‚k@NÀ°üBñíš™¯ ·!È\n’\0Z™6°\$d Œ,%à%laíH×\n‹#¢S\$!\$@¶İ2±„I\$r€{!±°J‡2HàZM\\ÉÇhb,‡
'||cj~gĞr…`¼Ä¼º\$ºÄÂ+êA1ğœE€ÇÀÙ <ÊL¨Ñ\$âY%-FDªŠd€Lç„³ ª\n@’bVfè¾;2_(ëôLÄĞ¿Â²<%@Úœ ,\"êdÄÀN‚erô\0æƒ`Ä¤Z€¾4Å'ld9-ò#`äóÅ–…à¶Öãj6ëÆ£ãv  ¶àNÕÍf Ö@Ü†“&’B\$
å¶(ğZ&„ßó278I à¿àP\rk\\§—2`¶\rdLb@Eöƒ2`P( B'ã
€¶€º0²& ô{Â•“§:®ªdBå1ò^Ø‰*\r\0c<K|İ5sZ¾`ºÀÀO3ê5=@å5ÀC>@ÂW*	=\0N<g¿6s67Sm7u?	{<&LÂ.3~DÄê\rÅš¯x¹í),rîinÅ/ åO\0o{0kÎ]3>m‹”1\0”I@Ô9T34+Ô™@e”GFMCÉ\rE3ËEtm!Û#1ÁD @‚H(‘Ón ÃÆ<g,V`R]@úÂÇÉ3Cr7s~ÅGIói@\0vÂÓ5\rVß'¬ ¤ Î£PÀÔ\râ\$<bĞ%(‡Ddƒ‹PWÄîĞÌbØfO æx\0è} Ü
â”lb &‰vj4µLS¼¨Ö´Ô¶5&d sF Mó4ÌÓ\".HËM0ó1uL³\"ÂÂ/J`ò{Çş§€ÊxÇYu*\"U.I53Q­3Qô»J„”g ’5…sàú&jÑŒ’Õu‚Ù­ĞªGQ
MTmGBƒt
l-cù*±ş\rŠ«Z7Ôõó*hs/RUV·ğôªBŸNËˆ¸ÃóãêÔŠài¨Lk÷.©´Ätì é¾©…rYi”Õé-Sµƒ3Í\\šTëOM^­G>‘ZQjÔ ‡™\"¤¬i”ÖMsSãS\$Ib	f²âÑuæ¦´™å:êSB|i¢ YÂ¦ƒà8	v Ê#é”Dª4`‡†.€Ë^óHÅM‰_Õ¼ŠuÀ™UÊz`ZJ	eçºİ@Ceíëa‰\"mób„6Ô¯JRÂÖ‘T?Ô£XMZÜÍĞ†ÍòpèÒ¶ªQv¯jÿjV¶{¶¼ÅCœ\rµÕ7‰TÊª úí5{Pö¿]’\rÓ?QàAAÀè ‹’Í2ñ¾ “V)Ji£Ü-N99f–l JmÍò;u¨@‚<FşÑ ¾e†j€ÒÄ¦I‰<+CW@ğçÀ¿Z‘lÑ1É<2ÅiFı7`KG˜~L&+NàYtWHé£‘w	Ö•ƒòl€Òs'gÉãq+Lézbiz«ÆÊÅ¢Ğ.ĞŠÇzW²Ç ùzd•W¦Û÷¹(y)vİE4,\0Ô\"d¢¤\$Bã{²!)1U†5bp#Å}m=×È@ˆwÄ	P\0ä\rì¢·‘€`O|ëÆö	œÉüÅõûYôæJÕ‚öE×ÙOu_§\n`F`È }MÂ.#1á‚¬fì*´Õ¡µ§  ¿zàucû€—³ xfÓ8kZR¯s2Ê‚-†’§Z2­+Ê·¯(åsU õcDòÑ·Ê
ì˜İX!àÍuø&-vPĞØ±\0'LïŒX øLÃ¹Œˆo	
İ
ô>¸ÕÓ\r@ÙPõ\rxF×üE€ÌÈ­ï%À
ãì®ü=5NÖœƒ¸?„7ùNËÃ…©wŠ`ØhX«98 Ìø¯q¬£zãÏd%6Ì‚tÍ/…•˜ä¬ëLúÍl¾Ê,ÜKa•N~ÏÀÛìú,ÿ'íÇ€M\rf9£w˜!x÷x[ˆÏ‘ØG’8;„xA˜ù-IÌ&5\$–D\$ö¼³%…ØxÑ¬Á”ÈÂ´ÀÂŒ]›¤õ‡&o‰-39ÖLù½zü§y6¹;u¹zZ èÑ8ÿ_•Éx\0D?šX7†™«’y±OY.#3Ÿ8 ™Ç€˜e”Q¨=Ø€*˜™GŒwm ³Ú„Y‘ù
 ÀÚ]YOY¨F¨íšÙ)„z#\$eŠš)†/Œz?£z;™—Ù¬^ÛúFÒZg¤ù• Ì÷¥™§ƒš`^Úe¡­¦º#§ “Øñ”©ú?œ¸e£€M£Ú3uÌåƒ0¹>Ê\"?Ÿö@×—Xv•\"ç”Œ¹¬¦*Ô¢\r6v~‡ÃOV~&×¨^gü šÄ‘Ù‡'Î€f6:-Z~¹šO6;zx²;&!Û+{9M³Ù³d¬ \r,9Öí°ä·WÂÆİ­:ê\rúÙœùã@ç‚+¢·]œÌ-[g™Û‡[s¶[iÙiÈq››y›éxé+“|7Í{7Ë|w³}„¢›£E–ûW°€Wk¸|JØ¶å‰xmˆ¸q xwyjŸ»˜#³˜e¼ø(²©‰¸ÀßÃ¾™†ò³ {èßÚ y“ »M»¸´@«æÉ‚“°Y(gÍš-ÿ©º©äí¡š¡ØJ(¥ü@ó…
;…yÂ#S¼‡µY„Èp@Ï%èsúoŸ9;°ê¿ôõ¤¹+¯Ú	¥;«ÁúˆZNÙ¯Âº§„š k¼V§·u‰[ñ¼x…|q’¤ON?€ÉÕ	…`uœ ¡6|­|X
¹¤­—Ø³|Oìx!ë: ¨œÏ—Y]–¬¹™c•¬À\r¹hÍ9nÎÁ¬¬ë€Ï8'—ù‚êà Æ\r S.1¿¢USÈ¸…¼X‰É+ËÉz]Éµ Ê¤?œ©ÊÀCË\r×Ë\\
º­¹ø\$Ï`ùÌ)UÌ|Ë¤|Ñ¨x'ÕœØÌäÊ<àÌ™eÎ|êÍ³ç—â’Ìé—LïÏİMÎy€(Û§ĞlĞº¤O]{Ñ¾×FD®ÕÙ}¡yu‹ÑÄ’ß,XL\\ÆxÆÈ;U×ÉWt€vŸÄ\\OxWJ9È’×R5·WiMi[‡Kˆ €f(\0æ¾dÄšÒè¿©´\rìMÄáÈÙ7¿;ÈÃÆóÒñçÓ6‰KÊ¦Iª\rÄÜÃxv\r²V3ÕÛßÉ±.ÌàRùÂşÉá|Ÿá¾^2‰^0ß¾\$ QÍä[ã¿D÷áÜ£å>1'^X
~t1\"6Lş›+ş¾Aàeá“æŞåI‘ç~Ÿåâ³â³@ßÕ­õpM>Óm<´ÒSKÊç-HÉÀ¼T76ÙSMfg¨=»ÅGPÊ°›PÖ\r¸é>Íö¾¡¥2Sb\$•C[Ø×ï(Ä)Ş%Q#G`uğ°ÇGwp\rkŞKe—zhjÓ“zi(ôèrO«óÄŞÓşØT=·7³òî~ÿ4\"ef›~
íd™ôíVÿZ‰š÷U•-ëb'VµJ¹Z7ÛöÂ)T‘£8.<¿RMÿ\$‰ôÛØ'ßbyï\n5øƒİõ_àwñÎ°íUğ’`eiŞ¿J”b©gğuSÍë?Íå`öáì+¾Ïï Mïgè7`ùïí\0¢_Ô-ûŸõ_÷–?õF°\0“õ¸X‚å´’[²¯Jœ8&~D#Áö{P•Øô4Ü—½ù\"›\0ÌÀ€‹ı§ı@Ò“–¥\0F ?* ^ñï¹å¯wëĞ:ğ¾uàÏ3xKÍ^ów“¼¨ß¯‰y[Ô(æ–µ#¦/zr_”g·æ?¾\0?€1wMR &M¿†ù?¬St€T]İ´Gõ:I·à¢÷ˆ)‡©Bïˆ‹
 vô§’½1ç<ôtÈâ6½:W{ÀŠôx:=Èî‘ƒŒŞšóø:Â!!\0x›Õ˜£÷q&áè0}z\"]ÄŞo•z¥™ÒjÃw×ßÊÚÁ6¸ÒJ¢PÛ[\\ }ûª`S™\0à¤qHMë/7B’€P°ÂÄ]FTã•8S5±
/IÑ\rŒ\n îO¯0aQ\n >Ã2­j…;=Ú¬ÛdA=­p£VL)Xõ\nÂ¦`e\$˜TÆ¦QJÎk´7ª*Oë .‰ˆ…òÄ¡\röµš\$#pİWT>!ªªv|¿¢}ë× .%˜Á,;¨ê›å…­Ú
f*?«ç„˜ïô„\0¸ÄpD›¸! ¶õ#:MRcúèB/06©­®	7@
\0V¹vg€ ØÄhZ\nR\"@®ÈF	‘Êä¼+Êš°EŸIŞ\n8&2ÒbXşPÄ¬€Í¤=h[§¥æ+ÕÊ‰\r:ÄÍFû\0:*åŞ\r}#úˆ!\"¤c
;hÅ¦/0ƒ·Ş’òEj®íÁ‚Î]ñZ’ˆ‘—\0Ú@iW_–”®h›;ŒVRb°ÚP%!­ì
b]SBšƒ’õUl	åâ³érˆÜ\rÀ-\0 À\"Q=ÀIhÒÍ€´	 F‘ùşLèÎFxR‚Ñ@œ\0*Æj5Œük\0Ï0'	@El€O˜ÚÆH CxÜ@\"G41Ä`Ï¼P(G91«\0„ğ\"f:QÊ¸
@¨`'>7ÑÈädÀ¨ˆíÇR41ç>ÌrIHõGt\n€RH	ÀÄbÒ€¶71»ìfãh)Dª„8 B`À†°(V<Q§8c? 2€´€E4j\0œ9 ¼\r‚Íÿ@‹\0'FúDš¢,Å!ÓÿH=Ò* ˆEí(×ÆÆ?Ñª&xd_H÷Ç¢E²6Ä~£uÈßG\0RXıÀZ~P'U=Çß @èÏÈl+A­\n„h£IiÆ”ü±ŸPG€Z`\$ÈP‡ş‘À¤Ù.Ş;ÀEÀ\0‚}€ §¸Q±¤“äÓ%èÑÉjA’W’Ø¥\$»!ıÉ3r1‘ {Ó‰%i=IfK”!Œe\$àé8Ê0!üh#\\¹HF|Œi8tl\$ƒğÊlÀìläi*(ïG¸ñçL	  ß\$€—xØ.èq\"Wzs{8d`&ğWô©\0&E´¯Íì15jWäb¬öÄ‡ÊŞV©R„³™¿-#{\0ŠXi¤²Äg*÷š7ÒVF3‹`å¦©p@õÅ#7°	å†0€æ[Ò®–¬¸[øÃ©hË–\\áo{ÈáŞT­ÊÒ]²ï—Œ¼Å¦á‘€8l`f@—reh·¥\nÊŞW2Å*@\0€`K(©L•Ì·\0vTƒË\0åc'L¯ŠÀ:„” 0˜¼@L1×T0b¢àhşWÌ|\\É-èïÏDN‡ó€\ns3ÀÚ\"°€¥°`Ç¢ùè‚’2ªå€&¾ˆ\rœU+™^ÌèR‰eS‹n›i0ÙuËšb	J˜’€¹2s¹Ípƒs^n<¸¥òâ™±Fl°aØ\0¸š´\0’mA2›`|ØŸ6	‡¦nrÁ›¨\0DÙ¼Íì7Ë&mÜß§-)¸ÊÚ\\©ÆäİŒ\n=â¤–à;* ‚Şb„è“ˆÄT
“‚y7cú|o /–Ôßß:‹ît¡P<ÙÀY: K¸&C
´ì'G/Å@ÎàQ *›8
çv’/‡À&¼üòWí6p.\0ªu3«ŒñBq:(eOP áp	”é§²üÙã\rœ‹á0(ac>ºNö|£º	“t ¹Ó\n6vÀ_„îeİ;yÕÎè6fügQ;yúÎ²[Sø	äëgöÇ°èO’ud¡dH
€Hğ= Z\ræ'ÚÊùqC*€) œîgÂÇEêO’€ \" ğ¨!kĞ('€`Ÿ\nkhTùÄ*ösˆÄ5R¤Eöa\n#Ö!1¡œ¿‰×\0¡;ÆÇSÂiÈ¼@(àl¦Á¸I× Ìv\rœnj~ØçŠ63¿ÎˆôI:h°ÔÂƒ\n.‰«2plÄ9Btâ0\$bº†p+”Ç€*‹tJ¢ğÌ¾s†JQ8;4P(ı†Ò§Ñ¶!’€.Ppk@©)6¶5ı”!µ(ø“\n+¦Ø{`=£¸H,É\\Ñ´€4ƒ\"[²Cø»º1“´Œ-èÌluoµä¸4•[™±â…EÊ%‡\"‹ôw] Ù(ã ÊTe¢)êK´A“E={ \n·`;?İôœ-ÀGŠ5I¡í­Ò.%Á¥²şéq%EŸ—ıs¢é©gFˆ¹s	‰¦¸ŠKºGÑøn4i/,­i0·uèx)73ŒSzgŒâÁV[¢¯hãDp'ÑL<TM¤äjP*oœâ‰´‘\nHÎ ÚÅ\n 4¨M-W÷NÊA/î†@¤8mH¢‚Rp€tp„V”=h*0ºÁ	¥1;\0uG‘ÊT6’@s™\0)ô6À–Æ£T\\…(\"èÅU,ò•C:‹¥5iÉKšl«ì‚Û§¡E*Œ\"êrà¦ÔÎ.@jRâJ–QîŒÕ/¨½L@ÓSZ”‘¥Põ)(jjJ¨««ªİL*ª¯Ä\0§ªÛ\r¢-ˆñQ*„QÚœgª9é~P@…ÕÔH³‘¬\n-e»\0êQw%^ ETø< 2Hş@Ş´îe¥\0ğ e#;öÖI‚T’l“¤İ+A+C*’YŒ¢ªh/ø D\\ğ£!é¬š8“Â»3AĞ™ÄĞEğÍE¦/}0tµJ|™Àİ1Qm«Øn%(¬p´ë!\nÈÑÂ±UË)\rsEXú‚’5u%B- ´Àw]¡*•»E¢)<+¾¦qyV¸@°mFH  òÔšBN#ı]ÃYQ1¸Ö:¯ìV#ù\$“æ şô<&ˆX„€¡úÿ…x« tš@]GğíÔ¶¥j)-@—qĞˆL\nc÷I°Y?qC´\ràv(@ØËX\0Ov£<¬Rå3X©µ¬Q¾Jä–É
ü9Ö9Èlx CuÄ«d±± vT²Zkl\rÓJíÀ\\o›&?”o6EĞq °³ªÉĞ\r– ÷«'3úËÉª˜J´6ë'Y@È6ÉFZ 50‡VÍT²yŠ¬˜C`\0äİVS!ıš‹&Û6”6ÉÑ³rD§f`ê›¨Jvqz„¬àF¿ ÂÂò´@è¸İµ…šÒ…Z.\$kXkJÚ\\ª\"Ë\"àÖi°ê«:ÓEÿµÎ\roXÁ\0>P–¥Pğmi]\0ªöö“µaV¨¸=¿ªÈI6¨´°ÎÓjK3ÚòÔZµQ¦m‰EÄèğbÓ0:Ÿ32ºV4N6³´à‘!÷lë^Ú¦Ù@hµhUĞ>:ú	˜ĞE›>jäèĞú0g´\\|¡Shâ7y ÂŞ„\$•†,5aÄ—7&¡ë°:[WX4ÊØqÖ ‹ìJ¹Æä×‚Şc8!°H¸àØVD§Ä­+íDŠ:‘¡¥°9,DUa!±X\$‘ÕĞ¯ÀÚ‹GÁÜŒŠBŠt9-+oÛt”L÷£}Ä­õqK‹‘x6&¯¯%x”ÏtR¿–éğ\"ÕÏ€èR‚IWA`c÷°È}l6€Â~Ä*¸0vkıp«Ü6Àë›8z+¡qúXöäw*·EƒªIN›¶ªå¶ê*qPKFO\0İ,(Ğ€|œ•‘”°k *YF5”åå;“<6´@ØQU—\"×ğ\rbØOAXÃvè÷v¯)H®ôo`STÈ
pb j1+Å‹¢e²Á™ Ê€Qx8@
¡‡ĞÈç5\\Q¦,Œ‡¸Ä‰NëİŞ˜b#Y½H¥¯p1›ÖÊøkB¨8NüoûX3,#UÚ©å'Ä\"†é”€ÂeeH#z›­q^rG[¸—:¿\r¸m‹ngòÜÌ·5½¥V]«ñ-(İWğ¿0âëÑ~kh\\˜„ZŠå`ïél°êÄÜk ‚oÊjõWĞ!€.¯hFŠÔå[tÖA‡wê¿e¥Mà««¡3!¬µÍæ°nK_SF˜j©¿ş-S‚[rœÌ€wä´ø0^Áh„fü-´­ı°?‚›ıXø5—/±©Š€ëëIY ÅV7²a€d ‡8°bq·µbƒn\n1YRÇvT±õ•,ƒ+!Øıü¶NÀT£î2IÃß·ÄÄ÷„ÇòØ‡õ©K`K\"ğ½ô£÷O)\nY­Ú4!}K¢^²êÂàD@á…÷naˆ\$@¦ ƒÆ\$AŠ”jÉËÇø\\‹D[=Ë	bHpùSOAG—ho!F@l„UËİ`Xn\$\\˜Íˆ_†¢Ë˜`¶â
HBÅÕ]ª2
ü«¢\"z0i1‹\\”ŞÇÂÔwù.…fy Ş»K)
£îíÂ‡¸ pÀ0ä¸XÂS>1	*,]’à\r\"ÿ¹<cQ±ñ\$t‹„qœ.‹ü	<ğ¬ñ™+t,©]Lò!È{€güãX¤¶\$¤6 v…˜ùÇ ¡š £%GÜHõ–ÄØ
œÈE ÒXÃÈ*Á‚0ÛŠ)q¡
nCØ)I›ûà\"µåÚÅŞíˆ³¬`„KFçÁ’@ïd»5Œê»AÈÉp€{“\\äÓ ÀpÉ¾Nòrì'£S(+5®ĞŠ+ \"´Ä€£U0ÆiËÜ›úæ!
nMˆùbrKÀğä6Ãº¡r–ì¥â¬|aüÊÀˆ@Æx|®²ka
Í9WR4\"?5Ê¬pıÛ“•ñk„rÄ˜«¸¨ıß’ğæ¼7Â—Hp†‹5YpW®¼ØG#ÏrÊ¶AWD+`¬ä=Ê\"ø}Ï@HÑ\\p°“Ğ€©ß‹Ì)C3Í!sO:)Ùè_F/\r4éÀç<A¦…\nn /Tæ3f7P1«6ÓÄÙıOYĞ»Ï²‡¢óqì×;ìØÀæaıXtS<ã¼9Ânws²x@1ÎxsÑ?¬ï3Å@¹…×54„
®oÜÈƒ0»ŞĞïpR\0Øà¦
„†Îù·óâyqß ÕL&S^:ÙÒQğ>\\4OInƒZ“nçòvà3
¸3ô+P¨…L(÷Ä
”ğ…Àà.x \$àÂ«Cå‡éCnªAkçc:LÙ6¨ ÍÂr³w›ÓÌh°½ÙÈnr³Zêã=è»=jÑ’˜³‡6}MŸGıu~3ùšÄbg4Åùôs6sóQé±#:¡3g~v3¼ó€¿<¡+Ï<ô³Òa}Ï§=Îe8£'n)ÓcCÇzÑ‰4L =hıŒ{i´±Jç^~çƒÓwg‹Dà»jLÓéÏ^šœÒÁ=6Î§NÓ”êÅÁ¢\\éÛDóÆÑN”†êEı?hÃ:SÂ*>„ô+¡uúhhÒ…´W›E1j†x²Ÿôí´ŠtÖ'Îtà[ îwS²¸ê·9š¯Tö®[«,ÕjÒv“òÕît£¬A #T™¸Ôæ‚9ìèj‹K-õÒŞ ³¿¨Yèi‹Qe?®£4ÓÓÁë_WzßÎéó‹@JkWYêhÎÖpu®­çj|z4×˜õ	èi˜ğm¢	àO5à\0>ç|ß9É×–«µè½ öëgVyÒÔu´»¨=}gs_ºãÔV¹sÕ®{çk¤@r×^—õÚ(İwÏ…øH'°İaì=i»ÖNÅ4µ¨‹ë_{Ï6ÇtÏ¨ÜöÏ—e [Ğh-¢“Ul?Jîƒ0O\0^ÛHlõ\0.±„Z‚’œ¼âÚxu€æğ\"<	 /7ÁŠ¨Ú û‹ïi:Ò\nÇ ¡´à;íÇ!À3ÚÈÀ_0`\0H`€Â2\0€ŒHò#h€[¶P<í¦†‘×¢g¶Ü§m@~ï(şÕ\0ßµkâY»vÚæâ#>¥ù„\nz\n˜@ÌQñ\n(àGİ\nöüà'kóš¦èº5“n”5Û¨Ø@_`Ğ‡_l€1Üşèwp¿Pî›w›ªŞ\0…cµĞoEl{Åİ¾é7“»¼¶o0ĞÛÂôIbÏên‹zÛÊŞÎï·›¼ ‹ç{Ç 8øw=ëîŸ| /yê3aíß¼#xqŸÛØò¿»@ï÷kaà!ÿ\08dîmˆäR[wvÇ‹RGp8øŸ vñ\$Zü½¸mÈûtÜŞİÀ¥·½íôºÜû·Ç½Ôîûu€oİp÷`2ğãm|;#x»mñnç~;ËáVëE£ÂíØğÄü3OŸ\r¸,~o¿w[òáNêø}ºş ›clyá¾ñ¸OÄÍŞñ;…œ?á~ì€^j\"ñWz¼:ß'xWÂŞ.ñ	Áu’(¸ÅÃäq—‹<gâçv¿hWq¿‰\\;ßŸ8¡Ã)M\\³š5vÚ·x=h¦iºb-ÀŞ|bÎğàpyDĞ•Hh\rceà˜y7·p®îxşÜG€@D=ğ Öù§1Œÿ!4Ra\r¥9”!\0'ÊYŒŸ¥@>iS>æ€Ö¦Ÿo°óoòÎfsO 9 .íşéâ\"ĞF‚…ló20åğE!Qšá¦çËD9dÑBW4ƒ›\0û‚y`RoF>FÄa„‰0‘ùÊƒó0	À2ç<‚IÏP'\\ñçÈIÌ\0\$Ÿœ\n R aUĞ.‚sĞ„«æ\"ùš1Ğ†…eºYç ¢„Zêqœñ1 |Ç÷#¯G!±P’P\0|‰HÇFn p>Wü:¢`YP%”ÄâŸ\nÈa8‰ÃP>
‘ÁÁè–™`]‘‹4œ`<Ğr\0ùÃ›ç¨û¡–z–4Ù‡¥Ë8€ùÎĞ4ó`mãh:¢ Îª¬HDªãÀjÏ+p>*ä‹ÃÄê8äŸÕ 08—A¸È:€À»Ñ´]wêÃºùz>9\n+¯ççÍÀñØ:—°ii“PoG0°Öö1ş¬)ìŠZ°Ú–èn¤È’ì×eRÖ–Üí‡g£M¢à”ÀŒgs‰LC½rç8Ğ€!°†À‚Œ3R)Îú0³0Œôs¨IéJˆVPpK\n|9e[á•ÖÇË‘²’D0¡Õ àz4Ï‘ªo¥Ôéáèà´,N8nåØsµ#{è“·z3ğ> ¸BSı\";À e5VD0±¬š[\$7z0¬ºøÃËã=8ş	T 3÷»¨Q÷'R’±—’ØnÈ¼LĞyÅ‹ìö'£\0oäÛ,»‰\0:[}(’¢ƒ|×ú‡X†>xvqWá“?tBÒE1wG;ó!®İ‹5Î€|Ç0¯»JI@¯¨#¢ˆŞuÅ†Iáø\\p8Û!'‚]ß®šl-€låSßBØğ,Ó—·»ò]èñ¬1‡Ô•HöÿNÂ8 %%¤	Å/;FGSôòôhé\\Ù„ÓcÔt²¡á2|ùWÚ\$tøÎ<ËhİOŠ¬+#¦BêaN1ùç{ØĞyÊwòš°2\\Z&)½d°b',XxmÃ~‚Hƒç@:d	>=-Ÿ¦
lK¯ŒÜşJí€\0ŸÌÌó@€rÏ¥²@\"Œ(AÁñïªıZ¼7Åh>¥÷­½\\Íæú¨#>¬õø\0­ƒXrã—YøïYxÅæq=:šÔ¹ó\rlŠoæm‡gbööÀ¿À˜ï„D_àTx·C³ß0.Šôy€†R]Ú_İëÇZñÇ»WöIàë
GÔï	MÉª(®É|@\0SO¬ÈsŞ {î£”ˆø@k}äFXSÛb8àå=¾È_ŠÔ
”¹l²\0å=ÈgÁÊ{ HÿÉyGüÕáÛ sœ_şJ\$hkúF¼q„àŸ÷¢Éd4Ï‰ø»æÖ'ø½>vÏ¬ !_7ùVq­Ó@1zë¤uSe…õjKdyuëÛÂS©.‚2Œ\"¯{úÌKşØË?˜s·ä¬Ë¦h’ßRíd‚
é`:y—ÙåûGÚ¾\nQé
ı·Ùßow’„'öïhS—î>ñ©¶‰LÖX}ğˆe·§¸G¾â­@9ıãíŸˆüWİ|íøÏ¹û@•_ˆ÷uZ=©‡,¸åÌ!}¥ŞÂ\0äI@ˆä#·¶\"±'ãY`¿Ò\\?Ìßpó·ê,Gú¯µı×œ_®±'åGúÿ²Ğ	ŸT†‚#ûoŸÍH\rş‡\"Êëúoã}§ò?¬şOé¼”7ç|'ÎÁ´=8³M±ñQ”yôaÈH€?±…ß®‡ ³ÿ\0ÿ±öbUdè67şÁ¾I Oöäïû\"-¤2_ÿ0\r
õ?øÿ«–ÿ hO×¿¶t\0\0002°~şÂ° 4²¢ÌK,“Öoh¼Î	Pc£ƒ·z`@ÚÀ\"îœâŒàÇH; ,=Ì 
'S‚.bËÇS„¾øàCc—ƒêìšŒ¡R,~ƒñXŠ@ '…œ8Z0„&í(np<pÈ£ğ32(ü«.@R3ºĞ@^\r¸+Ğ@ , öò\$	ÏŸ¸„E’ƒèt«B,²¯¤ âª€Ê°h\r£><6]#ø¥ƒ;‚íC÷.Ò€¢ËĞ8»Pğ3ş°;@æªL,+>½‰p(#Ğ-†f1Äz°Áª,8»ß ÆÆPà:9ÀŒï·RğÛ³¯ƒ¹†)e\0Ú¢R²°!µ\nr{Æîe™ÒøÎGA@*ÛÊnDöŠ6Á»ğòóí N¸\rR™Ôø8QK²0»àé¢½®À>PN°Ü
©IQ=r<á;&À°fÁNGJ;ğUAõÜ¦×A–P€&şõØã`©ÁüÀ€);‰ø!Ğs\0î£Áp†p\r‹¶à‹¾n(ø•@…%&	S²dY«Şìïu CÚ,¥º8O˜#ÏÁ„óòoªšêRè¬v,€¯#è¯|7Ù\"Cp‰ƒ¡Bô`ìj¦X3«~ïŠ„RĞ@¤ÂvÂø¨£À9B#˜

¹ @\nğ
0—>Tíõá‘À-€5„ˆ/¡=è€ ¾‚İE¯—Ç\n
ç“Âˆd\"!‚;ŞÄp*n¬¼Z²\08/ŒjX°\r¨>F	PÏe>À•OŸ¢LÄ
¯¡¬O
0³\0Ù
)kÀÂºã¦ƒ[	ÀÈÏ³Âêœ'L€Ù	Ãåñƒ‚é›1 1\0ø¡Cë 1T
º`©„¾ìRÊz¼Äš£îÒp®¢°ÁÜ¶ìÀ< .£>î¨5İ\0ä»¹>Ÿ BnËŠ<\"he•>ĞººÃ®£çsõ!ºHı{Ü‘!\rĞ\rÀ\"¬ä| ‰>Rš1dàö÷\"U@ÈD6ĞåÁ¢3£çğŸ>o\r³çá¿vL:K„2å+Æ0ì¾€>°È\0äí ®‚·Bé{!r*Hî¹§’y;®`8\0ÈËØ¯ô½dş³ûé\rÃ0ÿÍÀ2AşÀ£î¼?°õ+û\0ÛÃ…\0A¯ƒw
Sû‡lÁ²¿°\r[Ô¡ª6ôcoƒ=¶ü¼ˆ0§z/J+ê†ŒøW[·¬~C0‹ùeü30HQP÷DPY“}‡4#YD ö…ºp)	º|û@¥&ã-À†/F˜	á‰T˜	­«„¦aH5‘#ƒëH.ƒA>Ğğ0;.¬­şY“Ä¡	Ã*ûD2 =3·	pBnuDw\n€!ÄzûCQ \0ØÌHQ4DË*ñ7\0‡JÄñ%Ä±puD (ôO=!°>®u,7»ù1†ãTM+—3ù1:\"P¸Ä÷”RQ?¿“üP°Š¼+ù11= ŒM\$ZÄ×lT7Å,Nq%E!ÌS±2Å&öŒU*>GDS&¼ªéó›ozh8881\\:ÑØZ0hŠÁÈT •C+#Ê±A%¤¤D!\0ØïòñÁXDAÀ3\0•!\\í#h¼ªí9bÏ‚T€!dª—ˆÏÄY‘j2ôSëÈÅÊ\nA+Í½¤šHÈwD`íŠ(AB*÷ª+%ÕEï¬X.Ë Bé#ºƒÈ¿Œ
¸&ÙÄXe„EoŸ\"×è|©r¼ª8ÄW€2‘@8Daï|ƒ‚ø÷‘Š”Núhô¥ÊJ8[¬Û³öÂö®WzØ{Z\"L\0¶\0€È†8ØxŒÛ¶X@”À E£Íïë‘h;¿af˜¼1Âş;nÃÎhZ3¨E™Â«†0|¼ ì˜‘­öAà’£tB,~ôŠW£8^»Ç ×ƒ‚õ<2/	º8¢+´¨Û”‚O+ %P#Î®\n?»ß‰?½şeË”ÁO\\]Ò7(#û©DÛ¾(!c) NöˆºÑMF”E£#DXîgï)¾0Aª\0€:ÜrBÆ×``  ÚèQ’³H>!\rB‡¨\0€‰V%ce¡HFH×ñ¤m2€B¨2IêµÄÙë`#ú˜ØD>¬ø³n\n:LŒıÉ9CñÊ˜0ãë\0“x(Ş©(\nş€¦ºLÀ\"GŠ\n@éø`[Ãó€Š˜\ni'\0œğ)ˆù€‚¼y)&¤Ÿ(p\0€Nˆ	À\"€®N:8±é.\r!'4|×œ~¬ç§ÜÙÊ€ê´·\"…cúÇDlt‘Ó ¨Ÿ0c«Å5kQQ×¨+‹ZGkê!F€„cÍ4ˆÓRx@ƒ&>z=¹\$(?óŸïÂ(\nì€¨>à	ëÒµ‚ÔéCqÛŒ¼Œt-}ÇG,tòGW ’xqÛHf«b\0\0zÕìƒÁT9zwĞ…¢Dmn'îccb H\0z…‰ñ3¹!¼€ÑÔÅ HóÚHz×€Iy\",ƒ- \0Û\"<†2ˆî Ğ'’#H`†d-µ#clj Ä`³­i(º_¤ÈdgÈíÇ‚*Ój\rª\0ò>Â 6¶ºà6É2ókjã·<ÚCq‘Ğ9àÄ†ÉI\r\$C’A I\$x\r’H¶È7Ê8 Ü€Z²pZrR£òà‚_²U\0äl\r‚®IRXi\0<²äÄÌr…~xÃS¬é%™Ò^“%j@^ÆôT3…3É€GH±z€ñ&\$˜(…Éq\0Œšf&8+Å\rÉ—%ì–2hCüx™¥ÕI½šlbÉ€’(hòSƒY&àBªÀŒ•’`”f•òxÉv n.L+ş›/\"=I 0«d¼\$4
¨7rŒæ¼A£„õ(4 2gJ(D˜á=F„¡â´Èå(«‚û-'Ä òXGô29Z=˜’Ê,ÊÀr` );x\"Éä8;²–>û&…¡„ó',—@¢¤2Ãpl²—ä:0ÃlI¡¨\rrœJDˆÀúÊ»°±’hAÈz22pÎ`O2hˆ±8H‚´Ä„wt˜BF²Œg`7ÉÂä¥2{‘,Kl£ğ›Œß°%C%úomû€¾àÀ’´ƒ‘+X£íûÊ41ò¹¸\nÈ2pŠÒ	ZB!ò=VÆÜ¨èÈ€Ø+H6²ÃÊ*èª\0ækÕà—%<² øK',3ØrÄI ;¥ 8\0Z°+EÜ­Ò`Ğˆ²½Êã+l¯ÈÏËW+¨YÒµ-t­fËb¡Qò·Ë_-Ó€Ş…§+„· 95ŠLjJ.GÊ©,\\·òÔ….\$¯2ØJè\\„- À1ÿ-c¨²‚Ë‡.l·fŒxBqK°,d·èË€â8äA¹Ko-ô¸²îÃæ²°3KÆ¯r¾¸/|¬
ÊËå/\\¸r¾Ëñ,¡HÏ¤¸!ğYÀ1¹0¤@­.Â„&|˜ÿËâ+ÀéJ\0ç0P3JÍ-ZQ³	»\r&„‘Ãá\nÒLÑ*ÀËŞj‘Ä‰|—ÒåËæ#Ô¾ª\"Ëº“AÊï/ä¹òû8)1#ï7\$\"È6\n>\nô¢Ã7L1à‹òh9Î\0B€Z»d˜#©b:\0+A¹¾©22ÁÓ'Ì•\nt ’ÄÌœÉOÄç2lÊ³.L¢”HC\0™é2 ó+L¢\\¼™r´Kk+¼¹³Ë³.êŒ’êº;(DÆ€¢Êù1s€ÕÌòdÏs9Ìú•¼ P4ÊìŒœÏó@‹.ìÄá
A äÅnhJß1²3ó Kõ0„Ñ3J\$\0ìÒ2íLk3ãˆáQÍ;3”Ñn\0\0Ä,ÔsIÍ@Œûu/VAÅ1œµ³UMâ<ÆLe4DÖ2şÍV¢% ¨Ap\nÈ¬2ÉÍ35ØòĞA-´“TÍu5š3òÛ¹1+fL~ä\nô°ƒ	„õ->£° ÖÒ¡M—4XLóS†õdÙ²ÖÍŸ*\\Ú@Í¨€˜YÓk¤Š¤ÛSDM»5 Xf° ¬ªD³s¤äÀUs%	«Ì±p+Ké6ÄŞ/ÍÔüİ’ñ8XäŞ‚=K»6pHà†’ñ%è3ƒÍ«7lØI£K0ú¤ÉLíÎD»³uƒêõ`±½P\rüÙSOÍ™&(;³L@Œ£ÏˆN>Sü¸2€Ë8(ü³Ò`J®E°€r­F	2üåSE‰”M’†MÈá\$qÎE¶Ÿ\$ÔÃ£/I\$\\“ãáIDå\" †\nä±º½w.tÏS	€æ„Ñ’Pğò#\nWÆõ-\0CÒµÎ :jœRíÍ^Süí„Å8;dì`”£ò5ÔªaÊ–ÇôE¹+(XröMë;Œì3±;´•ó¼B,Œ˜*1 &î“ÃÎË2XåS¼ˆõ)<Í ­L9;òRSN¼Ş£ÁgIs+ÜëÓ°Kƒ<¬ñsµLY-Z’:A<áÓÂOO*œõ2vÏW7¹¹+|ô €Ë»<TÖóÕ9 h’“²Ïy\$<ôÎ#Ï;ÔöÓá›v±\$öOé\0­ ¬,Hk òü
-äõàÏš\rÜú²ŸÏ£;„”¹O•>ìù“·Ë7>´§3@O{.4öpO½?TübÃÏË.ë.~O…4ôÏSïÏì>1SS€Ï*4¶PÈ£ó>ü·ÁÏï3í\0ÒWÏ>´ô2å><ëóßP?4 €Û@Œôt\nNÀÇùAŒxpÜû%=P
@ÅÒCÏ@…RÇËŸ?x°ó\n˜´Œ0NòwĞO?ÕTJC@õÎ#„	.dş“·MêÌt¯&=¹\\ä4èÄAÈå:L“¥€í\$ÜéÒNƒ­:Œ’\rÎÉI'Å²–
AÕráŒ;\r /€ñCôÈåBåÓ®Œi>LèŠ7:9¡¡€ö|©C\$ÊË)Ñù¡­¹z@´tlÇ:>€úCê\n²Bi0GÚ,\0±FD%p)o\0Š°©ƒ\n>ˆú`)QZIéKGÚ%M\0#\0DĞ ¦Q.Hà'\$ÍE\n «\$Ü%4IÑD°3o¢:LÀ\$£Îm ±ƒ0¨	ÔB£\\(«¨8üÃé€š…hÌ«D½ÔCÑsDX4TK€¦Œ{ö£xì`\n€,…¼\nE£ê:Òp\nÀ'€–> ê¡o\0¬“ıtIÆ`
 -\0‹D½À/€®KPú`/¤êøH×\$\n=‰€†>´U÷FP0£ëÈUG}4B\$?EıÛÑ%”T€WD} *©H0ûT„\0tõ´†‚ÂØ\"!o\0Eâ7±ïR.“€útfRFu!ÔDğ\nï\0‡F-4V€QHÅ%4„Ñ0uN\0ŸDõQRuEà	)ÍI\n &Q“m€)Çš’m ‰#\\˜
“ÒD½À(\$Ì“x
4€€WFM&ÔœR5Hå%qåÒ[F…+ÈùÑIF \nT«R3DºLÁo°Œ¼y4TQ/E´[Ñ<­t^ÒËFü )Qˆå+4°Q—IÕ#´½‰IF'TiÑªXÿÀ!Ñ±FĞ*ÔnRÊ>ª5ÔpÑÇKm+ÔsÇÜ û£ïÒáIåôŸREı+Ô©¤ÙM\0ûÀ(R°?+HÒ€¥Jí\"TÃ
Dˆª\$˜Œà	4wQà}Tz\0‹Gµ8|ÒxçÍ©R¢õ6ÀRæ	4XR6\nµ4yÑmNôãQ÷NMà&RÓH&É2Q/ª7#èÒ›Ü{©'ÒÒ,|”’ÇÎ\n°	.·\0˜>Ô{Áo#1D…;ÀÂĞ?Uô‘Ò•Jò9€*€š¸j”ı€¯F’N¨ÒÑ‰Jõ #Ñ~%-?CôÇßL¨3Õ@EP´{`>QÆÈ”µÔ%Oí)4ïR%IŠ@Ôô%,\"ÕÓùIÕ<‘ëÓÏå\$Ô‰TP>Ğ\nµ\0QP5DÿÓkOFÕTYµ<ÁoıQ…=T‰\0¬“x	5©D¥,Â0?ÍiÎ?xş  ºmE}>Î|¤ÀŒÀ[Èç\0€•&RL€ú”H«S9•G›I›§1ä€–…M4V­HşoT-S)QãGÇF [ÃùTQRjN±ã#x]N(ÌU8\nuU\n?5,TmÔ?Ğÿ’Ü?€ş@ÂU\nµu-€‹Rê9ãğU/S \nU3­IEStQYJu.µQÒõF´o\$&ŒÀûi	ÜKPCó6Â>å5µG\0uR€ÿu)U'R¨0”Ğ€¡DuIU…J@	Ô÷:åV8*ÕRf%&µ\\¿RÈõMU9RøüfUAU[T°UQSe[¤µ\0KeZUa‚­UhúµmS<»®À,Rès¨`&Tj@ˆçGÇ!\\xô^£0>¨ş\0&ÀpÿÎ‚Q¿Q)T˜UåPs®@%\0ŸW€	`\$Ôò(1éQ?Õ\$CïQp\nµOÔJ¹ñX#ƒıV7Xu;Ö!YBî°ÓSåcşÑ+V£ÎÃñ#MUÕW•HÍUıR²Ç…U-+ôğVmY}\\õ€ÈOK¥Mƒì\$ÉSíeToV„ŒÍHTùÑ!!<{´RÓÍZA5œRÁ!=3U™¤(’{@*Ratz\0)QƒP5HØÒ“ÎÕ°­N5+•–ÏP[Ôí9óV%\"µ²ÖØ\n°ıñäG•SL•µÔò9”ùÇÌë•lÀ£ˆ‘\rVˆØ¤Í[•ouºUIY…R_T©Y­p5OÖ§\\q`«U×[ÕBu'Uw\\mRUÇÔ­\\Es5ÓK\\úƒïVÉ\\ÅS•{×AZ%Oõ¼\$Ü¥FµÔ¬>ı5E×WVm`õ€Wd]& \$ÑÎŒÅ•ÛÓ!R¥Z}Ô…]}v5À€§ZUgôÔQ^y` Ñ!^=F•áRÁ^¥vëUÅKex@+¤Şr5À#×@?=”uÎ“s •¤×¥YšNµsS!^c5ğ\$.“u`µÜ\0«XE~1ï9Ò…JóUZ¢@²#1_[­4JÒ2à\nà\$VI²4n»\0˜?ò4aªRç!U~)&ÓòB>t’RßIÕ0ÀÔ
_EkTUSØœ|µıUk_Â8€&€›E°ü(â€˜?â@õ××JÒ5Ò½JU†BQT}HVÖ‘j€¤Qx\neÖVsU=ƒÔıV‘N¢4Õ²Ø—\\xèÒÖïR34İG¿D\":	KQş>˜[Õ\rÕY_å#!ª#][j<6Ø®X	¨ìÍc‰•Ø#KL}>`'\0¨5”XÑcU[\0õ(ÔÙÑWt|tô€R]pÀ/£]H2I€QO‹­1âS©Qj•Z€¨¸´Hº´m¨ÌÙ)dµ^SXCY\rtu@Jëpüµ%ÓÿM¸
ø€¨óµ“Ö?ÙUQ°\nö=Råar:Ô¿Eí‘À¥-G€\0\$ÑÇd½“ö]Òmeh*ÃìQ‰Wt„öc€¡`•˜AªY=S\r®¯«	m-´‚¤=MwÖH£]Jå\"ä´Ä 
õş­fõ\"´{#9Teœ‰ÙÍMÔc¹ñNêI£òÙßD¥œõÙÜçUœ6ÙñgÑ2Ù×İ¶eƒ
a­L´€Q&&uTåX51Y >£óûSıÖŠQ#êIµ¥Õj\0ûœ£ÅW PÑş?ub5FUóLn¶)V5R¢@ãë\$
!%o¶ÔPúÉ'€‰EµUÁÔP-†¶š¤Bp\nµF\$ŸS4…t±UF|{–qÖÈ“0û•ÎUmjsÎÃü€²øı\$´Ú›j…cëÚå¦Ö«€¿aZI5X€ƒj26®¤&>vÑ\n\r)2Õ_kîG¶®TJÚÁeQ-cîZñVM­Ö½£z>õ]•a¹c£Ëcìß`t„”HÚÑjİ6¹£+kŠM–\0Œ>Œ„€##3l=à'´¥^6Í\0¨Ã¨v¦Z9Se£€\"×ÊêbÎ¡ÔB>)•/TÁ=ö9\0ù`Pà\$\0¿]í/0Úª•«äµ½k-š6İÛ{küÖá[F\r|´SÑ¿J¥õMQ¿D=õ/ÈWX¢öœV—a¬'¶¹éa¨to€©lå†¶ĞXj}C@\"ÀKPÛÎÖÚom’3\0#HV”µ…v÷Ñ~“{µ Ö?gx	n|[Ø?U¶äµ[rê½h¶ŞG¸`
õ3#Gk%L£ê\0¿I`CùDŞê¸	 \"\0ˆŒÅ§¶°#cN«6ßÚ¹fÂÔzÛêº;Ñ¤ÃeeF–7Ù/N\r:ôâQñGÕ9	\$ÔóIøÕ¼ºß]£®TİØWGs«ÔdWõMÚIãèÑÙf’BcêÛ¤êõÂ÷!#cnu&(ŞSã_Õw£ùSfë&TšZ:…0CóSÙLN`Ü³Yj=·¶>Å²ÃñZ!=€rV]gû	Ó£rµ ËXlŒÉ-.¹UÄ'uJuJ\0ƒs­J¶'W%·¶­\\>?òBöëV­j4µÏJ}I/-ÒrRLºSè3\0,RgqÓ­ôÇTf>İ1Õï\0¥_•”Ç\\V8
õ¡ZÛt…Ácè€†ú<^\\ùll´j\0¾˜şT¥]CİÔw×Î“zI¶ÙZwN…¶¶pVW…jv»Y¶>2Ó	o\$|U‡WÃL%{toX3_õ¶òR‰J5~6\"×ãZl}´`Ôkc­ÑîÛeR=^UÔ•¥1òÑ½w
7eØdµİvÙb=á\0ùf €,³må)ÕéGpûÕ-Ó¼½)9Lı“š>|Ôë \"Ì@èû¤5§`†:›ô\0é,€ñt@ºÄxº“òlÃJÈ»b¨6 à…½‰İaŞA\0Ø»ARì[A»Ã0\$qo—AàÊSÒü@Ìø¬<@ÓyÄĞ\" as.âÎä÷V^„•è®¥^õ›…—œ\0ÜÈHÁ·[H@’bK—©Ş)zÀ\r·¨¤¤=éÁ^¿zˆB\0º¿’¤äNéo<Ì‡t<xî£\0Ú¬0*R ºI{¥í®´^æEµî·¸:{KÕ§1Eˆ0²ÓYº•›à/ÕÑcêÀ\"\0„ê¸4øÉF7'€†˜\nÕ0İÉ`U£Tù¤?MPÔÀÓ lµÈ4ŒÓr(	´ÁZ¿|„€&†©t\"Iµ¿ÖÛL w+Òm}…§÷€Wi\r>ÖU__uÅ÷63ßy[¢8µT-÷ÙVÏ}¤xãô_~è%ø7Ùß{jMáo_šEù÷ØÓë~]ôP\$ßJõCaXGŠ9„\0007Åƒ5óA#á\0.‹Àä\rË´_Ö¢áÀßÚ%şáÀÀ\n€\r#<MÅxØJËù±|¸Ø2ğ\0¨–;oŒ^a+F€í¸Îç¬€LkúÁ;À_Ûİê#€¾M\\“¬€
¤pr@ä“ÃµÆÔøÂşOR€¿ñ–~zÇûAÁNE°YÁO	(1N×‰ˆRø¨8Ø€C¼¦ë¨Én?O)ƒ¶1AçD o\0ä\r»Ç¢?àkJâî‘“„\"â,OFÈÌa…›ùª-bà6]PSø)Æ™ 5xCâ=@j°€ÇL”ÁèÈLî˜:\"èƒ»ÎŠ¤l#¢ÀéBèk£“ˆ›€ÖË@ •Nº:ê>ï|Bé9î	«Èî”:Nıñ\$èéS¥ CB:j6î—Şé•àÎ‰Jk”†uKğ_W›Í¢Ã˜I =@TvãÒ\n0^o…\\¿Ó ?/Á‡&uê.ŞØ_˜æ\r®î¥Cæì+Úøc†~±J¸b†6ÓüØe\0ÍyóÑ¡\0wxêhÁ8j%S›À–VH@N'\\Û¯‡ÆN¥`n\r‹ÒuŞn‰KèqUÃBé+í˜f>G‡°\r¸»ˆ=@G¤Åä
dç‚†\nã)¬ĞFOÅ hÊ·›†ÃˆfC‡É…X|˜‡I…]æğ3auyàUi^â9yÖ\no^rt\r8ÀÍ‡#óîØâN	VÈâY†;Êc*â%Và<›‰#Øh9r \rxcâv(\raŸá¨æ(xja¡ `g¸0çVÌ¼°Œ¿Q†©x(ÇëƒÀglÕ°{—Ægh`sW<Kj°'¿;)°Gnq\$¨pæ+ÎÉŒ_ŠÉdø¶^& ¯Š˜DÂxà!bèvŞ!EjPV¤' ââÁ(”=ÏbÂ\rˆ\"–b¦İL¼\0€¿Ìbtá‚\n>J¬Ôã1;üù¼ÖîÛˆ¿4^ s¨QÁp`Öfr`7‚ˆ«xª»E<lÑÏã	8sş¯'PT°
øÖºæËƒ¸°z_ÊT[>Ğ€:Ïó`³1.î¾°;7ó@[ÑŞ>º6!¡*\$`²•\0À„æ`,€“øÇàİÁ@°àáå?Ìm˜>ƒ>\0êLCÇ¸ñˆR¸În™°/+½`;CŠ£Õø\0ê½*€<F“„ö+ëƒâ„q
 MŒÁş;1ºK\nÀ:b3j1™Ôl–:c>áYøhôìŞ¾#Ô;ã´Ü3Öº”8à5Ç:ï\\Şï¨\0XH·Â…¶«aş®¸™M1ä\\æL[YC… £vN’·\0+\0Ôät#ø\$¬ÆØØà!@*©l¦„	F»dhdİıùF›‘à&˜˜Æ˜fó¹)=˜¦0¡ 4…x\0004ED6KÍòä¢£±…”\0ònN¨];qº4sj-Ê=-8½ê†\0æsÇ¨ûˆ¹D
§f5p4Œàé©Jè^Öí’'Ó”[úùH^·NR F˜Kw¼z¢Ò ÜĞE”º“ágF|!Èc©ôäo•dbÁêùxß\0ì-åà6ß,Eí„_†íê3uåp ÇÂ/åwz¨( ØexRaºH¼YùceŠš5ê9d\0ó–0@2@ÒÖYùfey–YÙcM×•ºhÙÃ•Ö[¹ez\rv\\0Áeƒ•ö\\¹cÊƒ†î[Ùue“—NY`•åÛ–Î]9hå§—~^Yqe±–¦]™qe_|6!Şóuï`f Õî™Jæ
{è7¸ºM{¶YÙ‡©øj‚eÆÌC»¢S6\0DuasFL}º\$È‡à(å”Mb…ÈàÆ¤,0BuÎ¯…ì¥Ñ‚2ögxFÑ™{a¸n:i\rPjıeÏñ˜rÈrØÏGıBY ˆM+qï
çiY”dË™é`0À,>6®foš0ù©†o™ó æXf¢äù\0ÀVİL!“«f…†láœ6 Å/ëæ£1eƒ•\0‰>kbfé\r˜!ïufò<%ä(rË›ùa&	
ı™¨àY€Ş!¡Òñ–mBg=@ƒĞ\rç; \rŞ5phI 9bm›\$BYË‹ÿšÄgxç#‰@QEOÇæm9–®Ë0\"€ºç!t¨˜ê†Ë‰¸®Ğ‡çO* Ååÿ\0Âİ>%Ö\$éoîrN&s9¿f£4çù™gŠä~jMùf›wyèg›yí\\`X1y5xÿŒù^zï_,& kÑæ¢é|¡€À¦1xçÏA‘6ğ \nîoè”»Œ&xÙïgg™{r…?ç·›ü-°½…®|tä3±šˆÈÍ}gHgK¢9¿¿¨õJÀ<C C° 1„î9ş7‡g÷š‚ïh6!0Hâí›cdy´fÿ¡DA;ƒ‚9…Tæ¢ÿ®0¬Ä\0ÆpØàù†!‡ 6^ã.øSÂ²?ÆØ¦E(P­Îˆ .æÂ 5€ÄhŠéˆEPJv‰ .‹•¢+—\$ç5Œ>P+µ?~‰¡gŒ6\r³öh¢¼p«z(è†WÙÄ`Â•¨±\"y¯ñÏ:ĞFadÅ¬6:ù¡f˜Şi\0ì˜İØàA;áe¢°àì¬ç^ÊÖwf„ >yÍŠËõ`-\rŠÚ…á\0­hr\rÎr£8i\"_Ú	££¼9¡CI¹fXËˆ2¦‰š\"ÍÅ¢‰… øh¢L~Š\"ö…š%V•:!%Šxyèizyg„vxÚ]‚Æ}qgÄÃZ
iŒä|Œ`Ç+ _úgèòú†™Ù£¾úªÂÀÂè­6PA€Ê€\$¶=9¢ŒùàÍh‹¢|p’ ÿ¢ˆé˜íè!¢.ø!”ş¶üiç§^œøÚiË¢8zVCÌùöŒZ\"€æäØ(Ä¥›¹°9èU)û¥!DgU\0Ãjÿã¿?`Çğ4ãLTo@•B¤§úN†aš{Ãrç:\nÌŸ“E„»8Ã¦&=êE¨*Z:\n?˜¨g¢èÌŠ£‹h¢õ.•˜’ Nş5(ˆSƒhÑôi2Ö*c„fı@•“ÑŞ7¦œz\"áƒ|ÖúrP†.Ç€ÊL8T'¿¸k¢ˆß:(¹q2&œÆED±2~ÿ¿Ø±şœŒ¬Ã9
ûÒÂv£©¼8ÿƒ©– @úé^X=X`ªqZºĞQ«Ö®`9jø5^ˆ¹å@ç«¸În¼qv±á¨3±ÚÇèŠ(I6ğªjšdT±ÚÂ\\Š ‚Ÿ3¢,™Ïhék¢3ú(ë3¬‘‘PÒu•VÏ|\0ï§†Uâk;¢ÌJQ¶ã é. Ú	:J\rŠ1ŸênìBI\r\0É¬h@˜¼?ÒN±\nsh—®å\"ë’ò;¦r~7O§\$ ú(ã5¤RÅèÆ	
èÊ½jÂîšØFYF šÜ”£«~‰xŞ¾©f º\"ã†vÛ“ošëË¨ººÂº#ŒÜaÒèŠõ¶®P“„Ë<ãáh£-3éº/Gx®õ²nÇi@\"’G…?ó¤,ïZpÖxX`v¦4XÆõóàû„[ƒI¶œ7Ã¥X
c	îÅ!¡bç¢}ÚjŒ_¾¥9á5qti¦6f»’°¸İÙ5ÿûç FÆ¹ãiÑ±©pX'ø2¡rƒ„®0ÆÆºé§D,#GëU2€ÌØâIè\rl(£— €ì±£¦¨=ĞA¸a€ì©³-8›dbSşˆûõ4~‚ô—H;°Â­0à6Çbé{ª„ŞºRæèÃs3zë¯ÃÀüNğŞ„`ÆË†+ò¦­ 4<ø^aƒy°¬”	}r°Âây´õãáû¸kŒ&4@ˆÁ?~ÔäÅcE´ÂÈ­@ˆLS@€Œéz^qqN¦°</H‚j^sCâ`èæsbgGy¹¤Ö^\nÈNó\n:G¶N}¼c\nîÚÕí¤ +£†ï=†pÙ1º’NµTB[dÀÿ¶–š¶Ğ‹¢¾Ü¹ñ`³nÚoj;jÄ›whØõ€c9ƒ‚pÌ¡[y4«¨¶05œÍ‹NßÁ+Î¿·Ğ`Xdaáæ/zn*öPÀ‡êÁ¸#tí èµ¸~à9Wî	šVâò~=¸#Ùùn)¨î´î	2ÜÉ;…j:õ°Ják„C¸!>xîù5š£==¦2»—‚. 
ã|¿'¨îä[€Ì'—;üÚv½ù«–“¸„®÷ÎëÎ;:SA	º&Ğ[£me†êãn±ëúûªî™«Ëµ¦Ä•<Ÿº6ma‘=Y.ç¥ÀÅ:g¶ÔşÉè…€ù°Ğ;«Iß»xÅ[”éI¡J\0÷~ÂzaY®íºîüwT\\`–íV\nÆ~P)ézJ¾©æ½üñğQ@İà[¶{rÊ‰µDî
B„v—ï|i-¹EæøKŒ;^n»{êó½å:Nh;–—Ú2Á¨Æ€pçÑ´6“úƒ»ç½˜9§9¡¥öÖXÂhQœ~—ÛÛiAŸ@D šj‡¥î}ÑozLV÷ïçÑ³~ù•	8B?â#F}F¾Td­ë»áĞe±ÃzcîçŸFÅÀŠg‚7Î—Ûêà€ 6ı#.EÂ£¼áÀÖÂ£¥ğS£.J3¥ö5»¯KÉ¥óJ™§¸;¤—„n5¾¾:ySï‘ÀCÛvoÕ½.˜{ñğ	d\\0ë?W\0!)ğ'šû¼èEgá;à+»\0ü
Y Ntbp+À†cŒø“ş£\0©B=\" 
ùc†Tñ:Bœ±Á¤úcğïˆşîÆï¸P‘IÜÈD¸ÂV0ÊÇ!ROl‰O˜
N~aFş|%Éßº³¸¬…ò)Où¿	Wìo´û‡Qğw¨È:ÙŸlé0h@:ƒ«ÀÖ…8îQ£&™[Ànç¹FïÛp,Ã¦å@‡ºJTöw°9½„(ş†œ<é{ÃÆO\rñ	¥àùÚ‚\$m…/HnP\$o^®U¡Ì\"»¿ã{Ä–…<.îç¡‹n¥q8\rÕ\0;³n£ÄŞÔÛğç¡Ÿˆ+ÎŞ³3¢¼n{ÃD\$7¬,Ez7\0…“l!{˜é8÷á¶xÒ‚°.s8‡PA¹FxÛrğÄÓôQÛ®€¹†1Ì…¸p+@ØdÔŞ9OP5¼lKÂ/¾‘·¾˜\\mæú¸Äs‡q» îvºQí/§ÿÜ	„!»¶åz¼7¾oœ¿EÇ†Ò:qàV 5˜?G¡HO®âO†\$ül¾š+ â,òœ\r;ãç°¾¤’~ÎAÄéŒ³é{È`7|‡ÿÄ‚Äàër'‰°Ji\rc+¢|—#+<&Ò›¹<W,Ã>¢»^òPğ&nÂJhĞe‡%d¶æìèÏÜCƒi¶zXÃAÿ'DÍ>ÉÎˆ¡Ek£Ê¬@©Bòw(€.–¾\n99Aê¯hNæcîkN
¾d`£ĞÂp`Âò°%2ö¦½3H†Ëb2&¨< 9¤R(òÀ‡táTH¬	àz‘Ö'œ× oòÀ‹>4?Ô\rZÌwÊÓ‚ä×4ƒ`ºÈĞ‡é†µ³N‡ñŸéÓ€î'-IõÈì†÷0(S¨rØw,ü¹ĞåËKÊrÍÌ'-2Hlo-ÁUòáËâ_’'W#'/üÉHÖŸ¤®j6“Ì‰¡¡ÉàÈ«¶\0é„<‘„ÚúŒj1¤E’QŒTÜT­ÆrÁBcmí16ãÍˆgÙ«:w6Í¯›h@1ÅI:¤ÃÁ’Éş2ópò’L/ÎÁŸÂwÿ:òÅ‘ÓÎøK<ğÌE<‚şJ­76Ó€s×.Ì²sZóß/\$÷AsEyÏœàrÚr:w?Õ‰”!Ï?³áêÇ™ĞZ“MÍ9»Õ\0ÏÁ1?ARÍ¦%Ğ7>ÖMÇARr}sé€ñr)\\t-8=³öÍËĞUıË,WOCsÕ†„Ğ#w½5®á¯ERlM*¯D³ç1ûÑ>]ÏÀgK¤²V¹\nÜ\\èÜÓsˆÜ‡8Í¹seÍ§9­soÎ~„ ìów4xàŒ †’ñf@×ĞÜD­ö9€‡ÎÊ6¬\0	@.© î²@´9\0ŠC;Kôy+ÓJğ“ÜÙ¥ƒÏu<\\û`òc{Ó‹¤E£>ÿyÁJ=lŒüïá/…-—7˜ş”ĞZ46¨uC5™‘PçÎ©´RVĞòæ¡ÜáĞıÊ³lVøÒaNxû`Õ´?UÛ7(HP“}jVØJëzNQJ÷S–¸±s-gQ!a¥VØ_SwRıOõ3am‡ZXwZÍo‰'İwa­‰ÖOØoZµ“õ!Ù[\n<ôZ€µO¥Ò¶'ÇÅOmo÷[×Óa=Qºä>‚:õTĞ\nµ¨ç\0Š=€ım×jú–ATÃRÅbu(ÈI×´è:å×\$v¾Wõ×µÃğuÅS¿\\V8Øçvç\\õ•×g!MĞ¶¦uÅÖ_µ&Öis¿\\CÿRVM¢]tXT7\\UoT×Øo_Ô¯İ›S?aÔlÈSØ-LutZGeÇÕái`	}XZ‹i}Q•yW[i­…TŠöYo¦ (ZE\\¨}nÙi—f–‘Ú‹ÙÏW×dÑ%Tıpu3uÍTıf5)vˆÛ]ÕUR3VEY]¥X¸\n·^½§VqS½Sı}XéiGf•Úv>­Sı‚v»JMQšvÚ•Š…ÔÙ\\•g]´QYE“Îİµ#1Vÿl5UØEK]ÕÉ\0³ØİSıU?\\ºBwS•UŠ7–´ÕmZ½V5\\õ¹WfıÂÕ§[¥eUrõ{G \\µıUµÚ,„Éö‘W…[]xö›V×j5mTïV×jİ~u7Ø\0ûV¦UµØ'tı°w?msİÕÔÉÛ5VİÃvİq}Ùöáİu-UqÕ]İ—c]ÚWİØõ]Tt:ífŠM”k¶“e]î¹[-p}^ÔI[©XDãéºåY¿V—dõÀıO]	seNõ£ÜßZ¯WYÚ[Õt…ÈV?ò3ŞÇµßM“öñİ™`Ğût^w£d²:qTL•@@>]Áj\rFİqvµİ-Lv´GKwiôLwIPMo”ùÇ¹Mgv½ÿø[§Uss¦~	èõ…w:BâA‘ŸÑNEù{ä!-ÔÃdıŸo\0´’}&Ş
­hXÕÎA–5µ%Ù£fzLÖHÙ5d­” Y…_%…v´Ó™!mšÒ]Öë•ØÒÌ%üñßò€şå=B©>E [#^}öhYFÛa·ßÆ>{¡gS…¶ğp[ìF÷¦ÏDaë6næ´À¶x9«¥8LêIãˆ«N–a=ˆSÊ@úbPk¦.™áNòøHù”l\0ú†:àğè–îŠº2#çÎ˜;¼í®vøO}€9ik]	&®{õ‰ ø«ÕœÙ2|a—·&ó ãÔÇåÿŞQ½¥ª±ÌîÎç¨)ÉñµoÙ“Ç¸:é&.\0¶5q\0JĞL½é‚64hy€3®Ş¢«¹˜a®Şƒù‚Iz†ÁO‚—–ñ„æï®ˆ\"á¶yB»Ê³{ª3Æ%˜5r(mØÈàÂáÇx.7rÒb%Á‡ü^ e†M€»¢2®\0x—½!‰b}.®âY6\$qS”Ï\"^|xE…äÈøaãş‘¼À€ëXÇ¡5‚9†'T‚R	Ãc9ÄãèW¢1ßáÑAÎ”Pí¦ŸØh6'Şoò-àÖËp
µ¾T(\nn\rËÅ“å1Ô„RïRUgÛéƒÈş™“çx¨•Pe#îé*¤âkT<Ÿ<>b;‹“\0™Á˜gL½.<k©ZváÌ„ø¯óz³¶Æ8~¬ğy7€Y¸ïÈêÜ7w¨áO dnÒ>¤<€ú›Eé3ˆ¦wS”Û†œ@¾¡ë® oôWÅ1…ñúñ¾Òº¿zã‰eíŞ½è±å1İˆz÷\0f=ØùcãŠ¤g¹Ÿ{éŞ>nŒp\0±ÍèÎ‘:Hé†BnŒ6FèÆB¯rçW=öãC>M.1~@3ºGí9‡8÷q<Sô|ûY•8QPâû`L[Öqzç˜Û«PÇíèNà<{_-Ù®¥dO¸ùd-îNB7ä4İîBù
NÁí.Vº·ç9Æ¨Qø3º{IcP\$§»ºhû¾<R yy…ì?ŞòGÒş:n™ã€µôgÍÁœÿ;Ah!åÔşÁ&å»+>ğË€Û;MÁËŒŞ	ÍşşÃïÿ6SâîŠ·N¸ÚŒ=#ñëëñ³±`üTü#+ìnû;•·r,‚Ç½ğ¦ÏX|#ïÄ\rü# ïÃ?\nüD>¨|VüSñ¿ÂÚeÏ—~Jãm99…á¾\nsÆ{S|r],~ÿË¹ñøé¿ µqÏI?\"|wñ¦øÿ%|Œj‘\0rEò,kSnü¡íç¿øqÆ•Èd8B.ûñ‡1«Ñü³\"™ß/|Æ´€Øƒ]òüˆ¸­€·EüÏœèN²lüÌÕÆxÖËI°÷Ï Icó¿Å¸.|\$8D¹ŸF¨İÌ“…˜PÕKÆò€3ƒô\\j¾¥xUÏC/äã³Ò—¿
A{¹ÀĞûşeüÚƒ€ÿÓæ×
¶éÜ¾ÿŠÕôà\rpıU\nçÕŸWloÂ­Yâ{ÿô˜ã`]'Öşıs†Õ/|¼oïÿ×à3çÀrü}‹ö;Úÿ[ÊnÎ¹ûÿº—¿OíM7¯
ÛÉß£Ø¼q¾µq(ÏĞ_lâqsN÷“yòûñÄçÕ;ŒiÀg¿t—‡ÅÎ:ÿıåÈëÕ™§qk ‡¿íôá{÷Ÿß?zı¿÷ÏŞûêñMÈ—ßoıì'àj˜úïá†ãcøyñß„ıãøgß‡gkŒwÉâf8¼VcÔ7fAÌY‘³å+Kxñ…=gKAkşT,95rdã+ùGåÀºíÙ¯„…ñş[Òà%…AÅwæŸµú…½å7ùßåà¬…£%· {½míú8%_”şmú—qˆàVËË¨_ ş“%«!şEƒú¼iø~‘ù²h ú~»ŸCªß­~§ù¨%†„­µ—ç_¨şÙúåÿ·rLkD«yÌúŒğ~Ô?p1O!?¿ ®vÌ\\ïä±Pm©\"¸Ì<ûŒ¯ïŸÅúE©6… äEŸVğ³åÎñšzkîÇú¦9³z É
ªßĞ~Ê/ìäÕº¬é!Q‹>ÿ O£åNmèğ3rˆç Fú˜l‘Òúe;¤Mãß·…ŸºÏ½_a ´!~C»¼f€úå¼b}3œ K¼føÜí. 	Ùä}.©ş»ƒDX	i5¿|úŒ?ğÀ=\0õ±?ï?»ø?£Ş@ˆÿÃ•£½fu~a^’Ønûáªy±Q;ï q¹ÌàŒş)€s’S½,\"G†\nu%ÊÇU­YïAKl\nÓëBØIÊ86VCcO\0Ö`}.x©ƒî„,-Ná‡@~ºèœTÿG›çü–'üÄdÛJƒ÷‚ŸÆy1ƒzl‡á½Ã¦f÷gõ·ùAB aõ!şŒM\\<ƒgÊƒız4Æ¿ìÜ@/³ŞCÜÃ‚ì@õ	¯Qq÷)¤ûxäÁ/Ã.7inD±#=Àœ *79cÂF²ËÑd2(¶ .ÀV€À3µ¿ùÚ\$g`ˆAá§‹rl|øm˜²¶b§‚/¯qE²›ÕÃ´ !bU@œ¿9iâ;ppÊdííÛ×¤=ğ1ùy–x°x	™=€v=ø®(v±ï¬s_œ³BoòÉ‚ãÖ#àK\r nñîÈ\\—# Ûf˜PXĞu-3&«	½›J&,FÊ(9¶v´0
Á&@khZòy¶
gîCÔ‹€z Á”Ãã¦hi=¡s9TñÂ eT>gŒÂ3ëdŞtFûö2b&:¾ğ\0ĞP¡÷€B–š-¹QËº8~ÔLSÆMàˆ™Ú·cgĞÎğTh'òf(Ñ³Ğ\$¨.EŒ«§VLÀ°·œAıI¼ãÃßŒñ†¹¼râ¦ ãêgÛ\rÜÙã0§
¶œ‚ ëTëÎ1P`1’dÔâôÕÄ\r¦4âÁÚ=6@FüÁ¼È F±Ìñœ=¿É‚6ÏA¾Â>åN¥AVß	èÙÚ(\$ÎA/¦·ØÚõ¦
; ¦­çÚ?¾gŒf^	¬\nè&ğKO³Æn„{]õĞgË›Î8åc¬ÒÑ„–²Ï·Şı³ÿ‚\nÈ7LĞŒ¶‚t:ÒÑ ³hF°VO\r³èJú)bƒ(\"OBÌm°	oØß\$]T„SHÎZ^½õKŒÿ©äwğ\\[A9('ÒÙ„cÛ‘â­Üàb0‚ØÙÄ K’à£åà²srB™x\nè*BaÆz6oƒ\ry&tX1p'›^ƒM·¹<âCg¹`Ì4Ã8GHõ“zd?gX›†.@,‹7wÃïÛ:+ƒTiUX16à“L¸Üs’:\ršLè6‡Á±ƒf—r\r`ãtà67~g°xˆgH9ãJÀ¿O=- \$ğ4?rÙª4½ƒ¨¡O›ûè:z¦§{ÈşD`ó¨‹Ğ21FŒÜµ£Ğ(DòMÓÊ;¥º½ñ&–¡ÍÌ©ÔÚ­¾ƒU>ÎI˜6‹™cİÄò›ß¸@\r/œ/¸¶Ô•ıó_ HÀƒ\n7zë ¶ü€“œ‰7òaî É»[9D¢'ü„¿ì}Bÿ€O›R‡ôİŸ¸B#s“¼]z!(DÀ“Å@L^„ı	û³x£İ@oá¿u„OäïÁ¥D¸ÏÜ!e`\na³k>´0`á„€Ì-*™ ˆ8E‡Z6=fÌé%¡™İ×cã›°”K=£ò¤F‡\rÊ…ÂShèyNò[v*vá\rÁää@#ß¸í‰ªAh*ãL\$°À±AÀA\\”¢‚úÓ%Á*	ÄçpŠ\r*==8
ì\$Wî\rƒ [±“Jx0yñÛZÃ+&YÙHA~A\n,\\(Öìp¤!F¶êÚ<6SØ&IP`6Xzü+í£dfŞ\r¾ÏJÂ£€ŞÌië•sã+Ò&5¼å/rE…À£M^\$R(R‘QÌÒEw3‰ôlH*m\0Bq¬aŒ¯rèêLB“ª¥Q¹z6~lËùB‰\rIÂ®GøæXÙ¸XVbs¡mB·Hª×ó™ócî_Kç\$ pæ-:8„•Nj:ÂÑ…Œ¡-#¢Få	\0’aiBÆs\\)Î<.!Æİ\\ß‰N‹
ÒbIw8§Í¹t…øPjWä¨`¶‚y\0ìİ&0˜i?¡ˆÃÒ”:«Ia)=’C†,a&ºM˜apÆƒ\$İI€IFcæ­ç\0!„ƒ˜ YÄxa)~¯C1†PÒZL3T¸jİC\0yˆÒ¤`\\ÆWÂü\\t\$¤2µ\næ+a¤\0aKbèíÎ\n„˜]àC@‚º?I \rĞHãƒ®Ks%ÏN©ğ—áË^°ÏÔ9CL/š=%Û¨õhÉÆ:?&PşìEYÒ>5¢
ín[GÙ’×%Vàá»*ôw<¥ù­ÕgJ¸]º*éwd®]ŞBŸ5^óÖ¢’OQ>%­s{½Ô…
ç•«;ìWö³‰ÖzÂGi®ıÀ*»ùRnìÑG9ĞE°Š¢Ş,(u*°±Õ’Ã—€ŠXÕs«àRŒ¦¦:µ5ë;”æ)°R¶¦ÍNúŠÈvK Ø(œR³İM¢œÇbğîÔé©_‡{ÕF<<3ª:%ºÙHVëYS\ná%L+{”o.>Z(´Qk¢ÖÂN«!Ãì,‰:rH}nRÒNkI		ª‡[ò´Ìë’Ó§gÎÎÖ¤;mYÒ³g™%ñ
9V~-J_³ñg²­•©Ë\\–É®£Q\n®–!õt«\\UY-tZn¨¡d:Bµ°Ê½Ü*í]')t“²¥wÁù–É«[BUm*Úr4†Ø–Õ*yv¢¶ÁvZÀÕ¹+GHÎ åZn°PÂÜ…|\nT¥ %#\\·AX\0}5b+wr«XwÜ²1uù×%Cg=I­òv`creË0`..<·êğh‰+ŒHÌ^\\j­yFòİ%Ê]¹BÊ\0ÉrÅ+€> %Zx¹š æ%C.ªÃìÄ`Vn­1KS¾¥Îk\rƒõ çX|´õ[Ì;õ6H	U@©D:Ş»Mj	Î•ÛÊ?ıª]Ú¤Øˆb“A+ÔÅG£\0thxbşÆL`”ÅÀ64MŞ›ÄôŠY#ºhfD=e€Øw=´c˜+H…ñ¡¡:„.%ü^\$òDZrAzjÿfLl›7’o¬Œı°Û\0¨-äÜ³EdäŞ‰yz'V ­“Ó¯W´	Zö§K˜+°d(AÌfyŞP?‡xRš^hõ…¸'•æàA\0ˆ¯:p\r„d(V ±ŒÜ½šdöt	SîFcHÈŸ¹]r¢rÊCHY	X_º/fƒŒİÍ½ 4 7eÚ6D³{,ÑèşêØ<<Z^´İj\"	éµ\n+Æ€M…Y9…’A‚(<Pl¤lp	“,>Ğ€¤{E9Ü&àGhšh{(ı±Agg8 (@ŞjTûnËg€Zã†ÙÅ°ÁJˆÁŠ³x¦˜Œü¼@ic¶àÕ‹ô(pƒ'oJ0 MnÄ€í&Ê§³\r'\0Õ‘ø„\r qÑF è4½°Š)ı½cL˜§ş_ÀoJÚ}5ïÚc–o¨àà|6„m¾}Qª£á4QëÇb„·µ[úx«m( İ&µ@ä;Â+ò˜¥®ÚÅf|IÎàõ”RĞ48… {	`øè®çk`u»r`èWã¸±`\"´)fI\n©Ô;ò8ZjÍ‡–gğ~¡šAÎˆè!j¼Ä%ÄæT ÂE\\¯\r3E“j‚jê¢FXZ	âÏAyækH ØXdğgCQ“–±´áÎ€ş0ğd”ü²¨°ïû¡†út¨	œÇzkÀ`@\0001\0n”ŒøçH¸À\0€4\0g&.€ \0Àú\0O(³ÈP@\r¢èEÄ\0l\0à°X» \râæEä‹Ç8Àx»¥›@ÅÔ‹Ö\0À¤^˜»±z@Eğ‹æ\0Ş.¤^¨¸Qq\"éÅà‹æYäÂD_p &âÿ€3\0mZ.Ppà\r€EÏ‹÷sˆñv\"éÅá‹ç0´`ø¿wâñÆ,óü¼_¼`\rcÅâŒö/Ô]x¸q‚€€3\0qÎ.p˜ÂqŠâğ\0002Œ_ì³i„ˆÄÑŠ¢âEÆ\0aŞ1äbÀÑwJ \0l\0Î1,`ˆº1y\0€9#?0T^ØÇq‘£\$F6Œ/\$d¨¸‘‚€FDŒyJ0b˜»\0	ªÆWŒ¾\0æ.œc¸Â‘{c EØ\0s†3l]@\rbùFŒ\"\0Â2ô`˜Á‘’\"ñ€7‹µÎ/à\0±š¢èÅÓa	^04e¨ºQ{c<ÅÑŒÉj/_˜ÁÑc\0001Œµ*28BAàã\0000ŒxÆ”iØ¾1˜£F 50ljH¸‘™\"éFŒ30\\_ˆ¾q™\0ÆfŒ¡T³l_0Ñ‚£BEÄŒ#3ì]øÒñs€Æ½‹Ó†64_XÀ1–\0Æ½‹ñà™d`ø×`\r£SÆ_JMV/f€±­€1\0005I6tf€ °ã4Fª‹Á¶34fà‘ ãF-‹ß’6Œd‘±\"÷€4k½„\$h¨Â± #EÅÌŒú\0Ö6¤_0 1—c@F
‹áª/d]X×Q£#G\n‹÷†5¬g¹q‘ãEF\nŒm\\ÂDn˜Åq½£YFv1/4`øàq½ã€4=â8b×q|À\0004‹‰3ÄmXÁ1‹£e‘ö\0Åî.¬\\èàQ—cIÆ	·.7ü\\xÖ`\"íÆ\0i^3ğ(ç±’ÀÆ\"Ev4l_ÈÈq®Œ\$Fñ‹±àœoÈ¾ \r#UEä©^9ütˆÁ‘¹¢ïÆ.\0Ş3|rÈÄ1¿\0Æöù69l^x¹Ñ¼PF-]\n0ÔvˆâQy\"íG‹³2,sxÁQq#™F+Œ\0Ù/DiÈëq}£ÀÇ8[6,jø»\0cmÇo×N5¼ehàQv£«GL€H<T_ĞQ®£?FÉ‹É..\$føÛÑyãšE÷ŒC2Ül¨Û1s#ØEéŒ D³lohÙÑ²£j ‹²Â8Ôe¸Å±ÔbğF!õÆ9Ü`xÓq¨£§–CÆ7ÄhxÕÙ£ÆÅ»ú7œ^xÍñğK<Çhƒø	,uØé±‘ãG)Ú;luàÀ#îEß¹ş<ükÛÑíbşÆÜ\0sR.¬w¸Ö±#zÆ~w’2|x(Ú÷âğ\0001'†:Üv‰\0001‘ã¢GæŒ¿¦?|`øò‘£‡ÆóÛ .2¨XÜÀ#“G¨8KÆ@<z¾1–£Æ¹\"9|jˆÒÑĞã	G¤/æ6ÜqˆŞÑö€GÁsÖ7ù/\0001‹büÇßí¶:|ƒ8ÚQÚ#~F»W‚4ég˜ÌÒ#<F\rµ š2üƒXÁQÌ#ÿFvkî7´xÒ1Ú#ÎÅÆ›¦@¬rhÜÑÀãêF”íZ;¬fÈårc¿y‹‘!\r	ä_xë1¿\"üH1Ï¶0TwèÙ²c\rF1 \n8dX»rãĞÆÔŒ§Ş2Dbèı±{d4HˆŒrA<~ÈÙ1±dBHI[J?¼¸ÅÒ£qÇ~kº0ÔtØØÒ#„F\r#0\\h¨î\r¤GÈí’EttØè‘íc7ÈUŒ¿!Ö=D_ˆèòcNÇ\0‘yÖ6aÙñë¤ Fgç!v1ÌqØÈ1ØãKÇ‡»â@äeè÷Ñ³cGoó\n/¬ŒøÆ²ãˆEã‹Á\"3t`©ñö#cHµ‚<ÜcøÓqâüFî%†?Tbè¹±°d)Ç‹© r0‚øÌñqc¿Eøã>3\$tyQÒ£…ÉE’Cl`9)¤VFHMJ7”føöÄ\$HHQ ;üri’7#F³-F¤HÆQ÷#\0G·!‚1ä^Èş&4¤vG&‘û7Ôgèà±ƒ\$\0G\rr/ÄdÙR¤(Æã‘s6@¤“Ù'RAãÇ¬›È”Œù&‘¢¤–Çg\0k z=´|HÙ±Éã‡ÅàŒÉ^J´]ÀÑsd¤Ç, \$’1”¨à<cqÇ¦’ŸêJœ_øÏÁbçGˆQvJ´¸Ø±ŞãH5Œ
¢FôpÜÀIc¬È[‹‹Î@ÔrÈÏ ¤vHå%ã¶3D”¨Çòc<I\$M.d—Ùr1c=F÷.4„cˆÕ2béG.Œ!¦L|{X×Ñ³£{I«NFôdx÷qscŞÆİ¿#şE¼a)‘Ñ#¹G”ƒJ¬m¹.‘û\$=Gh’AN=¬s‰ÑÅ¤EÍ‘GşG\\a1ò0¤ÛH¡‘ÁF.tg8ê‘Ã¤[Èòÿ¦Idn¸şò8ãF€‹ÙÖ.T’¨ûñ·€F3‘Eº6riq¸ãsF¼
Ö6ÄxºrãÚÆL=nFTÒod Ç>-ª3ô|©2\$ı0„‘= â:‘xc’HËI\"NP\$b¸ÛQñ\$Fñ ®DÄ‚˜æÑïä}FêŒ %ª?äŸ(î£êÉG”3\$‚O\$^xÂ2T¢éÆñÕ0Œ¡ğR’‹Ì#ÈDŒ:„òE¤|i/2Œ£XGˆ’”’8¬•¹-ù\$HÉv¥Ö=dš‰ è¤Ç`’ù’:laxäÑú¢ğI¦¢:ì—XâRJ¤Òñ”ÒRÌmxê’J#\nGG“9!N¨ä{cIõ’Ó&æI¬ éR=£€I\rŒù&j:ä‘8ÃÒg#¸H‹á'3„_x¸²b¤H}”£>7ƒèèñŠcÌÇÙ\"&K<xØÊ2¡ãçH†‹¥\"6@dbèë±­e;É)Œ!–.Ä]ù/ò‘d—Êm*f6,v©—ÉªÊ‹£ªLäÉ(qµ£AI8”7d„9TtcôÊ’‚UL•XÈò%H¡”I*z:Ì|IXqsá¨ó-ÂBĞÅäq^(•R¼»aq(~e
Ññ¯§ 9JèU‡+-eq*nTà­Ğ>¡\$ÕÑ«er’ •Î±¡p\nÅÕ¼Ë\$es+îV£IšºÇb«øeq:ß#]•cc®7r\nÙf,gYø³TC²%Œñ	Ô}Ë\0–²©\\*ìEWPæaè:ÏE¥,&WòÆp)Å¦Ëxl²MáÂÄ3\0t\0¦/IipñD'\0	k\$T¤¬F‡¤]fºÍdMòÈ€K\$”¼ıH(@îÉ”‹»(–zµnWÒ¤Ù_ŠMİ”*º\0¦eÙlF™^H	W*B––ZPe½ÅÖ˜‡ÓR/dRÂ—RÊ…\0Ku£,yH)¶\"SÊXI'®¹Zƒ=çLøRå3åÄÒ\nÀ'š[kğ­Í6@;}R”íıI²ò³ô¬_é) wê‚[óÀ û\nß´n–ª¼ŒÊ“bBr¸l,\$vÖíÍİÔ°‡ˆÀÕH©à‡…\\¢‹Ùs*È ºå–
.Qt’B…ºdˆb‘½—@ï?3¼S`a@¤Kª\\.«´à~Çfª)¬«¨ï,?|&Ó¶KÀ£…Z9.İX³+S‘â|ÀœØ\0PÊ¼¢ŒE“òçe‚/Ê\0VëÖ^KÄ\0\n-	:ËÉSØ²)×ªû0j‘9TX•åBğƒ½K\"åÅ¯±•Â²,2Æ'‡2ËåÖ˜P,¡xŠôàpÀĞáKê—ª´š›õ\"ÊD¢#TV²œD¿õ1ñAo;Ø•×/9TH%V`WJ<9˜¯aeÊ° K/V^/¨Q†¤Ø\nBñZ\"9íËÆXÒ¯M~\$°5„ŠßÚ\$0dè½I€U“Í³2¼^X\n¼*ãE7I\nV3«–…+ÎaŒÃIiÒÒNËKK˜g0’aŒ°„z*“V©º#bJyMÒ¦eõâZ– …V ¢`’ĞòĞU1ËC˜Ÿ.\rF²ª-jÎ&LU˜p§9s‚é¹Š+Q&1¨âRm¥ÕÓ±gZª²–	,.Xr
yZì²°0¨ÏÜ3¬2˜A1©Ö‚’e‰Nû©¸˜ú²(?Al ŞÌ,Nèue²Ï\$|rùá_%²ñE05E}³\$¡Ü…X2«%ÚZªe €\n\";<9a¾h
ã¶¥àa]úÊì™8±à*éu¯
åÁªL¥¦¶±dR¿ğ0«¸Áª+ŞQm.ü,Gù–«¦M®ï_±2åedBêÍİ¸,°S…2Á²>UÕêëÔ°»4vlë~e2©ò2¤eÄµËYg2nf’=Àş\$%óÌÙ–Ffaìµ)‹ê§å”ÌfTÆ¶áG¤Í×g2ºW,[™šíÊX>)tÊA]œº™R*º&Z·Å6j2|‘¥\0 °(©p	ê9× ÌùuÒªô?ôĞ`nåœ-lZnë!H9²çæzLğš¢9VLÏ¹yÒĞİ¢ZØJhR›‰g“EfL©UŠ²~`4ÍYˆçæx)\$B±QR#Ã•Sê”¥ËËõ,6i#ÀY¦“,;C±šr¬âiÙ&ÇXªû]èÍ\nw54­K‰x\n*&©Tš£îWüÓùŠ“¦©+SĞ»qNc·yóIWä¯Û\0W5cÔÒÉ«‹ğ&+š¶ğVrå)¬êÎ£Kgšª¾Ô?‰ µŠ“¥|«gR¦¯†hR´%Kë¹œ)Z#‹5ä,Öµ–k…æ¼»`šìl:à•LsC”[M‰UB©6ldÑÑ“J¦°ªŸ•ï1nl:ºù•j¦ËLß–¢\0®hã¶ 
*)¥p/®šŞ§5\\”<9´óV¦…/‹šŞ«®hTÇdjµårMbx\nˆ]R¹çWªR‰ MaUµ3=×µ`0³oÈË,Z™¬³l
ÀÅ}Èó¦m¨ì›”í²lôÎ´ÕmLåS6ê\\’tÎ™¹òºèL —îÉ\\Ï%‘J¶”ƒKå™ñ7oÑ©Ÿ¤ef€Mš£’oC»Y¡“væ…­NVÃ4=RÑ¢sJİÉÍö¬¶*hÔÕéhnäæ-m›é4‰ß4ày¤óHñMû›|îÊis¬U=ƒİÚÍA\$Ú­òi¹Ï™¾“…öÍ>–êîÊpâ¼pûóQfø«îšÀ§ªq,ÔÕ5sŠULùš£8}İ¬ÅÙª“Œ÷#ÃXH±ÙİìßI««î§¼9Uµ8íc:³I»îíf´ªĞ±7Òklä5}Ğ÷f¹LY•ğ¬áN2Ş°ó}&½	išê®ñc,åI¹3‹ÚÄRœ©6räØ‰Ì3b¦ûÍœÇ6>lXY¿ûfıL œ)+ÙS,Ù‰Ì*ùelÍô™U\"edæº\"ZçªÚ–6’ZDßE9°á%ÈÎ‚›Y9rmtãEĞó'.M²[4¬‚^„åÉ·ë;M»wÙ5…×Í9¸Òóa¬¦v+70lÍÉÓÓd%£Ì<œù3Š_<é•lN²¦Š(€v+7YRlÎ…Óª]‡.•Õ4©I³®)¼³=ÖƒN®Tš]Û¹'U^Ó?çS«¼½7¾XC®Å©Ó¨Õ1Íu¹9©E´ß™²kçL;œ¤NhÌìÀSİqNXk;1[„ÒõÓLgpVœBî1_¤á¥ÎÅgs¬ š;­RlîÕEˆ×ßNğTÇ8öw,îéÅs¯•1ÍPxrëŠq”ê‰ß3¦¬(ª;ñZÚı	yÓ¾'{O	_´¾êrï™ÈªMg|ÎIó92eLçÊó”f¼O\rYŠnkÜåuŠ™”SNÉv9Vkâ“	Ë3Ç§.Ì›v 9zydæ)á“¦ÈNĞYì&s\$ìùÍjd'6Í”œQ<ÍVÜç)èeç+Ï›§:ÑØ¬êYjt¥¡Ãp‡u<±İÊ–Éß3¢]qM°Y:9XãµS³¾gI«Ã*¿mäÆÄCëùıv GßìÜR@ÀÖ¯¬jT—=¨:e ÛÀ(\0_Vn©,?p	3Ş'Î ™¸¨‘Ø™ïÒ\r¬†•¼ö|\"ŞiğºgT’nşPçš¤°\nÓ”åq,ÛSf¸.YĞµQ A¼A‡,ZÊÚeSå›˜sEÀì\rú‘v
„T‹¬QŸZ©\"pó²IósëUAÏ›\0¾ëvZ¸}®rÙ¥KŸtféP
äf9ç–®¸{¼¶^J€çßÏ‚Ÿ”¿šø©•\n0%«€NGÚ«*~lüD.»¦ÎKeŸ¹6¢[,Ô%ÀˆğOÕ˜É-†~ìµ•–óú¥j®ŸRO;úŒ@	Ë¨en›b_¾%sK¿Åœë‚ÃïYÿæºÎYÑ0ü¥ÃLËWª¦jrßÕóèÏ† ë©!BšÙñ”æ„Pv´£fwÚ«Éø€çãMÃR2´2€zŒ4rúh;Ò#M@…}…\0‰|ëã¨ MÃ\0…=Ú=å¡àf-!Ÿ6pÊ g[P4‚´†ÌìóCÚ[5:–‚\rµCt¨ÍÃ u@ıÛº<éŸäif„ĞNu¼n[ñ!u8j{&9Ku FQlR“iÀ(ËC ÇAä®™s4ˆë\0Y Í;fƒB<Ô{”å˜¼R_Iš~š…6ô×|MWTAí]4÷e@J­eÉP|[ú¨–r5*Áÿ—OÎ íBt½)¤ê¯%Ğ-\0Pªjm	usá§}Ğ˜Ÿ“Bi^©Ú*¦zĞ0YK.ù`[¯Yû2íÖĞ«—|°XBÑÅÁÓÁ(?Ğ—±.\$“l¼’³,æÎX¶DçÍ\nêëjæ¡OD ->_<¼¥Õ
Ö‡Ù\0š£ÙÕ¬¥Ásøh\\…¡•ea\\Ó\0Êöeä‘™Yµ`¼¥´7UØ\"e¡ÇCYTìñÙzt:V9P™_š³…a‚Ğ•FÔ;İ€\0MŸ¢´†…2“eúëHCéĞóZ‘?îVò¼åœ'×¬å‡ä³}c¾Yüaõè„¬åı?Qh8	ğ´0•
Q‡CM`ºŸ«ó6æø,‹Ÿ¢J‘eZ¾Z\"G—Wª¡u†–u\rÕ>49èKı—ğI%L–¹ÍİV9Ïü˜İÖ‰´øZë{VEOÄX;©áÑÏĞoàagPÂ\$\n²RX@}!-Si€ òRª¾¢qzÖ	öêITH.¡Ôí\nk\nïš \ndÏ®˜Tº‰²>Ğ\nîÂ– ­?£E…`²Ì5D+f’?#z³…IZü7T[¨€Qs#ùDˆŠ\$
«ÕÏPù¢ìI†	û3¾×*¼:İ9YI²ãH‹³ÔH®¬X«0åDŠ!u7J¸–m® YB}Eª°Š³¿—ç®€¢òr”8Q•ù\n}'PõSâ²	Q±Ğõáú¨‘°\$§Å`RÇ)^áõ(O€P\0®aK½µõômè3¬Š\$H.„ùX„ëñÔç)ĞV®™`”­Ú9 ¨.®Y™‘18âÚeUÁ’`Xç9‚´	Œğäç\\Lcˆj°IE Né«ª¦6€W¡D¦XBØ	Z‹:”|Ï¤:	E-P-Ú&ÎÁè¿)ú†ğ§ˆ*ÓúÔlÀ)PÂuŒy|R°³Lhÿ.p¤§é_* QA †@ ·?,Æ§êYêÖ)t‚Ñ‡œ<íÁP*êåÜj’VuQş: 2\0L¸?JëçèÑ,TPHL²ÁúE%–¬\0ª¢yP(YJZ¥î©úTHÅX\r	•Q4hOÒ;\\vVõ#åÀTWw‡ï\\`õOÒ¡Å«?ÒJR2³ò’=õFóâ]»ĞŸI5TMjIë9é,(Æ¤Dv|tÉ)ŠWy-¦]z¨Úe‚Œ‰a,pQ6\$ëI-g=%‘SÔW#íTP§Ü¤É)«T&]ŞÑõX15j†”B8„„æVÏÓ¥\nìem y“”h›*è¤ü»„°dç4Ï‚·bd!0¤gR”J\\Í ÖMtƒÀ1R\n\nïâxè¡èÜÁª.ö_¾üuò +Æ¼Ç;ı‹*4ˆÎ¸)]À\\¡lÜ( m\"ñƒQ†nTˆ(*\0¬`ğ1Hì@2	6hàêYÀcH_
ÌÚÈfğ?°Ğa«–7=KKdeÂt÷HàÀ2\0/\0…62@b~Ë`·\0.”€\0¼vÙ) !~º€JPÄT—Á½ô½’–…µ¥óÂ—ÚOƒ{t¾¾\0005¦ ¾˜/à¯€\r©ƒÁJ^ğ½0Úa!¶)€8¦%KŞ˜PP 4Åé~ÓH’˜á÷ĞÅô¼Üí\r+¦Lb˜¥/24)“Ó¦GKê™e0ŠeËé€S1¦B¨	-0jfÔÄéšS¦wLÎ™Äiêd …é Ó¦Lºš\r1ºhôÈ©œS ¦—MJJÊht¾)¨Ó+?L¶še5n”Óé|FHŒÉMN—õ5êjÔÉ©™SH“ÕL–—å4É=TØé´ÓD“ÕMnš½6Zm@I@S`¦)'ª™Õ7fòz©ŸSz¦x~OU1k”¿¤õSF¦ıMOU4ªpôÙ£2\0000¦ì¾7…6ŠkÑ#xSl§'Kâ7…7\nl”ÍãxSu§ LR7…7šstßãxS}§GM7…8*qtÓ#xS†§OM\"7…8ªuôë)ÆÓ\0¿’š•9úr™)ËSr¦‰2šı; 
ôğ)ŞÓ7§Nj›m/Šxç©ÕÓ¿¦sNÚ:jy4¿©àSª§gO:1ı=\ncTö©§SÍ§•’œ•;ê{ñ¥©îSÈ§/ORH\r=ÊtTôéŠIİ§¥O˜¤\\zx4÷©Sò§‹MşŸ•>j|TıiºS¶‘³O†™¼š~ôĞ\$lÓú¨Oöš}tüÈÙ§ßOî˜¤šzÔû*%§]PPüšvU\"úÓİ§¯Kâ í@\noõ jÓH¨;P¡>š1£éÿFd¨P.5BØ¸•ª\rÔ¨3œuB¹<µ
L#Ô<¨QPECÊu*\nÅÛ¨yPN¡´lª‚õ\r‹6Óó¨?Kú¢mBZi•jÓH¨›O2¢}1J‰µé›ÔM¨_Mş¢mDŠˆ€ê&ÔK¨ÇQ6¡­Fzv´ğ‹6Ó¹§éQjå;jµj)Ô*¨Ş¾£mEÊŒ
ª9Fd¨ÅQv5eGØÉµd¤Ô„¨EM\0+åDêƒ\"j)SD©QÒ¤pZfµéÆ‚§mR&¢ıHŠ’U’Û%§{Rv0m0z”¥ä§ŸLÆ¥@ú”'ÖÔ©ER¶?eJ÷>é¸Ô¨İM’¥µIú•²ªYT¦ÛRõ/¥BÊ•.êUT»©YRÎ¡L:™jNÔ…©•Rš¡İLú˜5ji&,‰Oê¦mJDß5,ã9ÔÀ©­Q¦©Íè•1êhTf©›NÈ˜ÒÑŞ¥Q€'©Î7¾§Lih¸²\rcjÔŒ‘Sz§ušŸ\0nãÔº©g¶§Ø 9Õ@cÕŒ\rT§%LÅÕAªfT­MT9uQ\nŸÕ)¢çU©µSº¨uD:“±—jˆU	©­Æ¨…PÚ–q‰*‚EÚªKSb¥l\\Ú¤µFª”ÔÅªGTz§gJ¤µHªSFª	\"©½Q:˜1‘ê›Õ©;†©½Rê¦µL*~EßªoTÒ¦\\z ‘„ª¥Õ:©­âª]Sê•±Ÿª¥ÕBª“U¨^J©uR*kEõª	ªıTêœQtê¯ÕR©g2ªıUj«µV\$ÅÕ_ª¹Sˆ³mPHÆU\\ª±TüŒ[UÊ«5JhÙµ\\ªµUpªÙ¢«•Vğ7a_*€Ó«
¬=R‡>\0I*¼¥ô”V«íX:hU8jÉTæKZ’¬\\:ƒÕ)jÇT·«8˜±	åWZ³Ub’òJ8«
R­=Y³UVU–«R¬¤\\:™Õ-jËÔÑ«iV.¦¥[z´±ÒªÂÇ-«{T²­ÅZªuoj×U»«3 ¡Í[ª±Õ>ªØÈ«E ­%\\º±µh#bÕ…‹©WZ®-\\º¸õCêæÕ«»W>¨­]Úºg4#¶ÕÀ«KTr®íZÊ¤wjãÕ\$«›z¬-Rj½õtjĞU*«ßWš¬tp\n¾4õ€ğ'–N•Mº´²ªxUş™X32[xò•+®“Ë\$B°US*½õqê›UÍªqXZ®}SÊÂÕxêÁÕ@¬-W\n5İXZ¨Õ…ªãÕJ«›U2±=\\úª‰ëF+«ñV‚0]XXÁUŒªìÖ0«¬-VJ¹² +Ö/«É‚±ÍZÊ®5sj¹ÖD«ŸUŞ²%bØÉµªÁÇ÷«
V²%Yš^u@d¤Õ¢’“WĞæ„”šÅ²Rk&œŒñYR¬\\¤Å’RkÖY©cVÆO-\\š—	kdòÓáKoX²¥KÊÍ/ë9Ö]“ËVªO-U‰<µ™@İÉå¬¥VÎ³[Ÿõ›«6U¹­—Â=eŠÏµo«4Tİ­Yâ0eHÆÕ¤ª\rÊÍ9«¢•¬6à(ó®•+7ÎybÓrI
 §|Ä \0—:FzğÉè\n…§|ªœs<°R½%JÓË  Ô]¦õFèµ3õ­Œ‰j¢Î£¹Y®µZ“¾^ <5X·IJòÅM`×nO\\£B&¶r“õsÅçQˆuz¨¢x¼å¹è	¬Tˆ®¤VwÍJ5¸g	Ï?v¨qF4ï•9³Ó·»­Õ6ªzjùèÕ‡OV•¿\rÎuÊ=Â@Ê’fTÍšœğïöy´³	€Ö«pKaXU9šm²³…­\nekMo›Ã5\nhTŞ†ê¦¦…V ®¬v€‚ı:
®Ñs®\\p>ÁÒLÓ:¦‹)ñ­O=nk}j¥Sõ«&·Ö®ª~µŠ¤y©àe”¬ÜšßZÖµñ)jØ®”t×VR¢Vµ½sµrÊ:+aÍo­‹,!TılŠUÏ•Ş*n­›5¾¶\\ğU÷dv+’M\\®)]B¶|ñJë´¦l;4˜¯5öpLÖùÓµØ¦7Liı[~bmtÉæSe€\"»°›Bº½v©´d“ç@Í§SÁ4)Ø’—Zï¼»\$)®ñ5ic!™µ´¢½ÎŒ–êî\\Rù*ßSD¦’Îw\$›9ætSÁ\ná”GfòPÔ›ÆîÊ¸´ßÚã*¦	KÍô­D·Vyû¹5ÍuÈ¦J×‘š\\šµC¹•\$“ÙW,¯M\\º»ôåÊæ5¬ëÓ–®k^•VÕsŠè5®k¡Ö»¯M^êµı{Àu°§Ï¤wFQàßJéHûgWN¡k8şºÍŠôÊ‰+¸»§˜¥1brÄíùË•ØëÓVÜX]dLçjí´YT™Îv®ç6–twyË•Şkò×ë­à«vx=…5àh»²ï½ô8—]ÊÁ‘ñË·x\"c|ĞufUÿƒşØ\0˜Ò§5ŞjÈ©}”PknÌšRl¾‰fÙªà+ò“ÑÛ£‚¢>c4Æ×W+TıDo®Òï ’Ç÷qî¯É€SX’¨İb}}Åhnµ&<Ï?™/3º”-Ã¡h†°©qn‰ı§	õpƒ%)SÉyP\r…ÛÍµÿm-Ïf5°Šº[€\\–=ÌTà}øy )ıç Ydç«Ø¤46#Y>¥3ÔŒ× šm©ú\n09h;²4˜°Â0‚Ã+ßae\nÈƒÄ°È!ÊÅüÑ)‘@ôx¢x }‡\$¦ÖßıAFŒúÃ‘²0Nö Rã	º°şÓ„èiÜ¥ü¬U¬?½¡—b5í!+×­\0G˜ıØw{¶îÓ¤—ïlI £)’w-4;p8ÂÎØ¤;@\r\n \r
 ­…ÚN5Æ…F \\Ó¹hgPE il0
¦ëX¦%’)\nˆØLkÈ^‚Æ2¢İ<5FØìd‰Iƒ<ñFÆj³bM¬d'á	¶Æ²D£âîBma²ĞÒö…ıOYñXgg¼8¥çZVØ%mf¬Ô%å€F¡-¥,É\nƒ‘ıaù¤FÇwfƒôs¹ç¬Ê0Gä¹‘ØZ²\n	1†;Jí–1Á\"iPñBÈy´C¬–Ìû²t—zÓ‰ãÑÖ;l‚4âÈÒ¡‚ƒJ‡”mLX²+lá˜ªõ{Â8¬\"â\nÌVÁÀšÄÛ(Ú\$Y\0íd\\İ†6›D9B´H±d%¦Óî–1ÛÁ˜6f Ñ\"ÊTJÖÚ`/²‡>ÊC=Äc“ì¨±¼²?e!ık*±3l~ƒÃÓiÿ«,
×A‚z/dà
¨¦MoìÅí´Ú²nÑ\"É½„ÍÂëÆzTr}eÙŒ{MÀaCÔ7‘fiTºõ—Ë/6W¢©P²ìÖÌ8†Fa`İì¾ 5³ó©¹M…f2V]œ['}cn4]h·íÖe«¦‹Z€Å§\r™‹2ÉÈ½XllGa`(­™—Û(‚ŠÄò\0èÄıšĞ_ölO˜ùf&fÄ1c8ìD{¼QæÜ	S
6öp\0äYÂ˜æ¹˜™î\0\röq…3
m&*fÎ;Ìpò6r^cŒÏ³¨—`Éµ&z€n^Ú±ù;DÈèSã¤oj^ã=¿L'g”5œ“Ä&ƒìä‡Ef&ñŞÏ|\nK 6?bX*¬.fÏˆEƒû–~&9Ù!˜çdŒk@‰v\"F¬Gšx\\é=ıEŠ7ïXP2[:Á¶\0ƒ×à¡ X~¦½7·ÍâX6†4²œÉ(Ã\";Bì\nŞıX×Ñhy¹Ì&›DÖˆÛZ¼l\nKC–‰íšŸ†pØ’Ä`mS®	2ĞU¢;Gà•‘8¶´{ ’Ñ-”±WBmì¸\$F€ø\ràl&B‡Y2\r´¨mAÅ‘°wÄZØ6ØRĞ’¿Ğ%d´ŒİÂÚ_²œTô5¦``BaĞÙG´ÕcáXKö\r¶˜\0­ØgN¼ù\\‘´¾;Nà¨àÄÚs^\nŒÌu§ä¿Ÿ­Ñ²VwzÄU F\"\0T-±,^’Î\0‹Îö—è2 /æ™ óÂÏàEW/\0Â¼ò–ÒÄ¾Ë4;\"ìK-NZš
½ĞMcÎ»RVNeœZ¦wj–ÂŠ6ë¯a¶÷yÌˆÙç»‹KV®lN?±Ãjt2­–¶T/[íN¤û±j|0t% #°”€âÑ\0ôÓ`£ø5F<–´ƒ X@\nÓ¢Áí•ËZF\\-m›¼³cd2Äp5Gºv'Bß'¢7{kŠ*'LÜAªZ|I±k´\n-.C¢6¼«¹
Çk•-¯×©SÚú°÷kÑ]¯Ë_\$ … Ú+Gò× [^‡­­z
]kÑÑ8›\\ö¿F|§¢?BˆØÁ
^ÏB¨‰Ì|ñ™ë@Š­Â÷B¯¥zPéW /R?[!bB–á¹kÀ‰Ñ '	(ãe:xfàr‚7\r_íâq¶ Maê\0#±ä7|éQ&\0É@)µô†À1òë®†LA[PtÀ\0œ™ı`‡6Õ\\e‘Ÿ¶zxÒÚSİ€vÕˆÏ€U:Ú±¿T¼Á‡ˆÏ—>fÛ\nq‹l€Å+K(|¶\\´Ñ G›UØ‹³Æ@(ğ*ÉiS%F¨\rR\$©•C¶¶LĞİÄö;ÉdµìÄ¼gë-\$m?ölhÊŠ3?PªY\0");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±Jî
GÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôa8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wş\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹”ªÓ²Ş»\0\0;";break;}}exit;}if($_GET["script"]=="version"){$nd=file_open_lock(get_temp_dir()."/adminer.version");if($nd)file_write_unlock($nd,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$g,$m,$kc,$sc,$Bc,$n,$pd,$vd,$ba,$Vd,$y,$ca,$pe,$sf,$eg,$Jh,$_d,$qi,$wi,$U,$Ki,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$ba=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Rf=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Rf[]=true;call_user_func_array('session_set_cookie_params',$Rf);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$ad);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);$pe=array('en'=>'English','ar'=>'Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©','bg'=>'Ğ‘ÑŠĞ»Ğ³Ğ°Ñ€ÑĞºĞ¸','bn'=>'à¦¬à¦¾à¦‚à¦²à¦¾','bs'=>'Bosanski','ca'=>'CatalÃ ','cs'=>'ÄŒeÅ¡tina','da'=>'Dansk','de'=>'Deutsch','el'=>'Î•Î»Î»Î·Î½Î¹ÎºÎ¬','es'=>'EspaÃ±ol','et'=>'Eesti','fa'=>'ÙØ§Ø±Ø³ÛŒ','fi'=>'Suomi','fr'=>'FranÃ§ais','gl'=>'Galego','he'=>'×¢×‘×¨×™×ª','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'æ—¥æœ¬èª','ka'=>'áƒ¥áƒáƒ áƒ—áƒ£áƒšáƒ˜','ko'=>'í•œêµ­ì–´','lt'=>'LietuviÅ³','ms'=>'Bahasa Melayu','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'PortuguÃªs','pt-br'=>'PortuguÃªs (Brazil)','ro'=>'Limba RomÃ¢nÄƒ','ru'=>'Ğ ÑƒÑÑĞºĞ¸Ğ¹','sk'=>'SlovenÄina','sl'=>'Slovenski','sr'=>'Ğ¡Ñ€Ğ¿ÑĞºĞ¸','sv'=>'Svenska','ta'=>'à®¤â€Œà®®à®¿à®´à¯','th'=>'à¸ à¸²à¸©à¸²à¹„à¸—à¸¢','tr'=>'TÃ¼rkÃ§e','uk'=>'Ğ£ĞºÑ€Ğ°Ñ—Ğ½ÑÑŒĞºĞ°','vi'=>'Tiáº¿ng Viá»‡t','zh'=>'ç®€ä½“ä¸­æ–‡','zh-tw'=>'ç¹é«”ä¸­æ–‡',);function
get_lang(){global$ca;return$ca;}function
lang($v,$hf=null){if(is_string($v)){$hg=array_search($v,get_translations("en"));if($hg!==false)$v=$hg;}global$ca,$wi;$vi=($wi[$v]?$wi[$v]:$v);if(is_array($vi)){$hg=($hf==1?0:($ca=='cs'||$ca=='sk'?($hf&&$hf<5?1:2):($ca=='fr'?(!$hf?0:1):($ca=='pl'?($hf%10>1&&$hf%10<5&&$hf/10%10!=1?1:2):($ca=='sl'?($hf%100==1?0:($hf%100==2?1:($hf%100==3||$hf%100==4?2:3))):($ca=='lt'?($hf%10==1&&$hf%100!=11?0:($hf%10>1&&$hf/10%10!=1?1:2)):($ca=='bs'||$ca=='ru'||$ca=='sr'||$ca=='uk'?($hf%10==1&&$hf%100!=11?0:($hf%10>1&&$hf%10<5&&$hf/10%10!=1?1:2)):1)))))));$vi=$vi[$hg];}$Ea=func_get_args();array_shift($Ea);$kd=str_replace("%d","%s",$vi);if($kd!=$vi)$Ea[0]=format_number($hf);return
vsprintf($kd,$Ea);}function
switch_lang(){global$ca,$pe;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$pe,$ca,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ca="en";if(isset($pe[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ca=$_COOKIE["adminer_lang"];}elseif(isset($pe[$_SESSION["lang"]]))$ca=$_SESSION["lang"];else{$wa=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$Fe,PREG_SET_ORDER);foreach($Fe
as$C)$wa[$C[1]]=(isset($C[3])?$C[3]:1);arsort($wa);foreach($wa
as$z=>$xg){if(isset($pe[$z])){$ca=$z;break;}$z=preg_replace('~-.*~','',$z);if(!isset($wa[$z])&&isset($pe[$z])){$ca=$z;break;}}}$wi=$_SESSION["translations"];if($_SESSION["translations_version"]!=578941549){$wi=array();$_SESSION["translations_version"]=578941549;}function
get_translations($oe){switch($oe){case"en":$f="A9D “yÔ@s:ÀGà¡(¸ffƒ‚Š¦ã	ˆÙ:Ä S°Şa2\"1¦..L'ƒI´êm‘#Çs,†KƒšOP#IÌ@%9¥i4Èo2ÏÆó €Ë,9%ÀPÀb2£a¸àr\n2›N CÈ(Şr4™Í1C`(:Ebç9AÈi:‰&ã™”åy·ˆFó½ĞY‚ˆ\r´\n– 8ZÔS=\$Aœ†¤`Ñ=ËÜŒ²‚0Ê\nÒãdFé	ŒŞn:ZÎ°)­ãQ¦ÕÈmwÛø€İO¼êmfpQËÎ‚‰†qœêaÊÄ¯±#q®–w7SX3” ‰œŠ˜o¢\n>Z—M„ziÃÄs;ÙÌ’‚„_Å:øõğ#|@è46ƒÃ:¾\r-z| (j*œ¨Œ0¦:-hæé/Ì¸ò8)+r^1/Ğ›¾Î·,ºZÓˆKXÂ9,¢pÊ:>#Öã(Ş6ÅqBô7ÃØ4µ¨È2¶Lu *ŠÂÔ/Ìhå\nH¤h\n|Z28¯\0Äû¹CzÔ7J
ğÚæH\nj=-BÈ6­p«Ê¥)ˆ:8õ·£Æ1©#›†‘<’³îëÀĞ‚©©Ü9¾X ‰Ğ€ŒÁèD4ƒ à9‡Ax^;ÓrA47îêÎ3…ò\0_AĞ£È„J\0|6¬éàÜ3,òûb×‡xÂ48Ê1©¬ÚâÔOãºµâÓˆ#c:9˜Ê;Ì¶T*¸¢Í<Ua/8¯Î&¤#òÎ7\0Aq3°˜†7‰|¸*Bí=Ö6Æ„Ê:³
ØÆ€Ş«ËŒ3#­•fÇMœ‹×€PŒ:Õä\n¾L£8Î€Œìæ\$DãĞ9ƒÈï\0 -CØGãœèÖ8nRZÛ\n\0@‹¹¯üË‡5øV646ª1¹@¢&\ruèæJƒ|1.m5£eÏ6¤±dé™4/BÎ Z’Â0ÊºsÇ­j‚ƒ\$ÊC\"JÅ‘ˆ£Äà¼êÃ.±œ¢ù\$ôéˆ‚Qk`Rû„_ÉëDŸ§Ë:œŠgJ\0AÁpÎ;@É@˜Á U•%±4NşÃ4vßñÒÕ\0\nƒz5/ÃÊ6¾X³¥3`Y|´İĞğ‡Lè+XAÛ\\ÔåğÑ=GôèDç:õ™ÄÇØ2ñBEŠöİÂCİ]<èÏ@MŞW%£ê§Õ…˜üÎó58¿Pít	Ù”KFQÔ…%JRÔÀïMLóM<9TŠVcuPŸÛ9ªÕ[«•ÃĞXp\r(ùC‘ÖÜxŞ9Ùv…¬”¤Œ³\"S0,š‚å¢ŸbR*MJ©u2¦ß°.Sê…ÿ8¤kÕBªlĞ9~À@|à4?á¼™„¾ÉáíKÉ€Ø@gvOKk‡'ä¦¡Çh› @‰š”úL—9CÉï#BBC3Qu/ÖÁøŸŒ¼Si(Ñ £äÂƒa†00º#–ãöáÏôjMç°š‚\0 ‚
@qŸ‚€\nI\$Hä“\"PºÃq¿aÇ4Ë‘£\"L™2¤…µ“ã@yÉ‰3ƒ±H¿Â|HÃ™îNÜìŸõ\\ÁJGÉ>ö5KJ‹1¤3ÃòhÑº9Gd„!…0¤¤¬@\rĞx)¤{âëËv³,”’²ZKÍòB§öP˜HúIN8d'Å=:X;±ã-kî \$^ˆ ÅÜÊúk#I  !ÄÙ•H`Éƒâ~Òğì†2<xÏù =ÆUìº%ÎZcğO\naQ¦†<‰ªÅ3Åğ8u™:Ú½ŠnóSœ˜±¯<q‡ÒPåZ	Ì3\$x'€ÅD›?\$ˆ(É’0Œ\$
DvíœŞ—‰şŒÈ:I/Å\rV–“³(\n5ÄÊ”¥À\0U\n …@Šª¸ &Z¼ÕWbî7Á…'¥QªN4á1 vdËBišzœRÍQ¯æ¨£€Fa˜(éQT®_Nós2Æ,Õ!Ä€yê”s5¾Xä°Û[z¾<'M±÷TO‘ÙQAY¤%ª„Ğyœ?\$0Ÿ\$¨¡Áÿ0aÔ3†ˆı \$‹,±(úx­ÅÄ£˜€‡66ºê£ıtŠØ¥äŒåÉ³ŠìÎ¥@‰fl\\ÃgmN‹MU—.±!YË@+•ŸtÖª7Gááµ*Zïš\nd9'K¦ş[K/É”2jšêxe,¡P´\\`å^ğ+É-&U%…†oÍƒ/-h¼'¯‹²Â•‰œ°ê4¡0ŠcM‚<\rU«¢	~’êèT!\$	ø_¯t§‘SÚ=—ùFNÛ‚vØİ.`^a!0aİrä£„Â‰³yE=]»²BÂZ‡\\Ù,‘9›¹ @NQ/Î›*<¬2ÆZÉÆ.†l¿L
Bt“ŠJ ¼ªgIBæÈ™’úfk»šX.É¸Û)cœíŸ£îX.¹õİ²¤ĞSrZ(„àSD©¤ÏÁ#ùÑËÒ¶’µbˆF \$9\$ Ã(b7‰*“‹”Ã5i§AíÃ’üw„Ö¡³2d‚C,å”!Ÿd–]ª2:-¡\$Î“O¬±ÙGç\"QìÂÂbY²äq_m]šá¶~Ú;&ì¿]×²ß÷Ñ³\rE©º6ÎêGK.QîöuºC-—cw7úäXji8¡•€0\"›0§éÅ³.\0…ÖãbÿW9eáÅâ½%OÃàFÿµ‹µ²šÌ¨O¬¡ŞKI‚÷|ÁğC¡v†Ó²\n…v\r\0¤·VÃN‡íß\\2YÛdZ÷:Ş;äìåyÅè[C¢FÖİ¹šï9Û2Ëï9KB›xKıOqn»5Ö:ÒŠè{ëÙ¾Ã×9ôŠ!eb5ğš{GMg„Èšæ£®£nW™€)bCÜwÖÊî¤ÿ5Ê|½Şõ Á.›í.}(Â7ŠCÀA.Iä<—”ñ½;~Kù*êqÀ6©®â|K§÷!—„›QT,†‹  ^¢&*e~\n~µõ~ˆÊúJÓË¥<øQ’•†ÇÛEçñOr0€Ôï'‚¯ÿ½n
ÉíøĞ}ú\\½«?Ê“ÔJ>ÚÂó|÷vJ?Ã÷wßP´‚õ€¬N˜~ïäëå×ß7Õ¹/îş¿£²ÅìY€Êş¬Xéãi\0Kb/ïÜ5ôÌjÀ «°92\"’©NÜ6.şüoŠ.úíğ.ìo,ûğ*î6ı)FÿâHaˆªÀH00dè…\0fŞu†ºOÖ‹PX£&B£\0è!)Z^\$ÆïŠş02W0€•pFÿ°ˆ6p‚şï.ÿÎH©0Š^NË\n”¿ÎTénºşN~tâÿ		Æ˜,W¯^4ìÂd+ÊİÌÂºÿ\rë\r°ÓÏ8êLBĞIpÉtGeì\n£yPÖ%n©î¯Ñ ğ¾%\0<D\0J7ÃNêP^Ê0ÀŞˆ’2nPº\rbL\"ãæĞc\"´Äê²cpİQHîÖ#Ãçl#\"â- —±hÙ°ŞğíÌĞe²\r®A®šï,Ş‘ä \r€V ÀÒ`Ö÷BFá0thx\r ÌtÂğA\"pö‰vvÀª\n€Œ ppc\\.ãšÏ,Öû¢ZmlÀËlÛ
*é±Öˆ¢\"fş3ö»v4Jş.ñ®°ãª¤&6¢óâœ.äÄÃlêU‘ütÊ¶¦\n˜\0˜ÓhrUª*K\"@e\$¢: Ø<Bò\näş'
šàËà.qàäNšX†ó²K‘â²ëŞ«©\$îº5È&K_&Õ
Rq\$ÏTİFŒ6\$Ğ'mû'*„½k`mËú·Ï«©\$¶æê:®†bcnN÷2¨æN¢\rDß,F0«VN@ê%êÀ¯2†YØ\"vj¤Ò\0=Èt\0å°°q¦pé\\Y‹DéRì­\0à,«\0/Àî-
´°¢¶ñÆâ\"š-LPDD\\ÀÊ¤¾\$Ïºâ¤Ğs'2¨ã'N›3\0\\";break;case"ar":$f="ÙC¶P‚Â²†l*„\r”,&\nÙA¶í„ø(J.™„ 0Se\\¶\r…ŒbÙ@¶0´,\nQ,l)ÅÀ¦Âµ°¬†Aòéj_1CĞM…«e
€¢S™\ng@ŸOgë¨ô’XÙDMë)˜°0Œ†cA¨Øn8Çe*y#au4¡ ´Ir*;rSÁUµdJ	}‰ÎÑ*zªU@¦ŠX;ai1l(nóÕòıÃ[Óy™dŞu'c(€ÜoF“±¤Øe3™Nb¦ êp2NšS¡ Ó³:LZúz¶PØ\\bæ¼uÄ.•[¶Q`u	!Š­Jyµˆ&2¶(gTÍÔSÑšMÆxì5g5¸K®K¦Â¦àØ÷á—0Ê€(ª7\rm8î7(ä9\rã’f\"7NÂ9´£ ŞÙ4Ãxè¶ã„
xæ;Á#\"¸¿…Š´¥2É°W\"J\nî¦¬Bê'hkÀÅ«b¦Diâ\\@ªêÊp¬•êyf ­’9ÊÚV¨?‘TXW¡‰¡FÃÇ{â¹3)\"ªW9Ï|Á¨eRhU±¬Òªû1ÆÁPˆ>¨ê„\"o|Ù7£éÚLQi\\¬ H\"¨¤ª#¨›1ê|„t·²¡\nûÈñ| ÷!Òœªˆ'¬Å«eŠ:¡­‰\n&T “Â=¡)£÷§»¦¸ÏÔ–‡VK¦‰ÏìvÈÒ¨‚2\r¯TBP£O
pÌ6#ÆÙoPÏhYhÅ ´£¸ÒŞ³ğ¸ÂÔÃÑ\0ä2\0yqÊ3 ¡Ğ:ƒ€æáxï}…Ã\r‰cAPHÎŒ£p_püB„J`|6Á-+Ô3A#kt4ãpxŒ!òÄÅ´ûUOL„ÌÃä3ë“j©Q8º²¥d‚dÁmWKÔúÀVÉ£ö„ª²në\"@P®0Cu¬£%R #ù;ö–È’Ú'gÚ|ëYÁe¨/ÈJ]R\nì\"]ãê6Bã°Â6£+ï/sÊIGÊŠÊãœ'	j>\\¦™zlU­HóÆE*èŒõœDÛ¬İWM&ÁdóF2Ñ°[ÖÔşG”ºLğB6Ö66^ŒcİJ\$Br)Š\"bÔ‡©£Œík.µlì•5<êdœNıwU;ü»Æ¼ŠaäyOç [¡k\\±ßÖ\rY“ÖŒdlª­šüuÖqÜşŠ‡h9–îl;ÓkÂ¿±õFÈwÕDİğx@Pˆ!jÈo¦Î	³êKAßºcJS	@¡º³g @eì7-V2É›¼:\r•*‡ è\0Q4\r Ò†ğÌƒbÆ0§à­33¨‹	:BAP7š†,ƒÈ °T:­%¨›X \r¼3 æºC r‡!„3†Ô\"{M
7 Sv\n˜)0¤å\\BÕ
ÒòBU&4¾–ÁZLÂ¡¢@ÍŠ (tµOX XqQ.ÇÃHdXë¬Ğ®åà¼—¢ö_
é~/èèÀC“` ½	@ÀèÆ0\" Ò5‹¶6ÇJ{í/b„³²‚†ÀŒ*âê³b\\ È\"WTÅê+¾­â¶&a5 ›¸ÜÂRç@¡à8•Üˆ—RìËÅy¯Uî¾WØw_«ü7 `\\À˜#‚PR
IChp5áµ‚‡I. tS«§X¦C[CˆÍÖ>]H•%'í™˜Õdñr=èê4ƒJ´d{
x6:@ÄiC‚³q§Í-Ä>a1ÒD8Šñ½6“ø†¸¿›¡¥·Áƒâ‘ËaPeX†Â¶åñK,˜Ô†€à§Èi?f†¿jVIijB¥çÔ™„633C3˜ÕÃ\\l+NCPxÙ›ô*¸¨(oõF~ f\$l×sC«N( CzÄƒppŠË‘„®fœÍğc\rL4†uæ(=4®¤:¡IÈh²)… Œ Šª…h*Ò3Ó‚ÚÑ‚&Ÿr½\$BÂöCKb&U•ß¥x`Q É>(b¾VFR¶×ÈQÔwÖêb†QJ9ò9b\nYµV‘š´\$óÎQÀâfHĞy3ë\"<Õr6Ág)¾6k¸8·æ…Ã2\r±Êf,zÎCBn«!ÓcHkZPbN…\0Â¡
\"*ªÍ?
ˆ]´RÌ¼½ÛF¶Q!6o¶:ñSÊhCÎ}òiîM»*{âbiìá%¾ÚŸ\n€ \n (Û†êP!·ˆkùl*ê€Lš§‚Z¸Â0T\n
@74àÓ6VzßÄwJã‡#H‚iÇGETVÊ’´BRlVŒ­±ñP‚xNT(@‚.HÉA\"„À‹”¤\\VN—å•,‰)E?Qîaù`Öìù™;Å\0”¿l†”
³W¾Ä,Ÿ)TK„JLƒDÙ%t LRQ>ñú\"ÜÜP^Õÿ§äÅ”Ô±6¾\r7¤°ÈßÃÛDjA•ß
™dÏ,ï™Å¡.†Œiåüêˆ9‚N£/¯˜Pê3øa©ş£F*Ó!â{Ñb¨\0êp’¢AI'k‡w[Ò›X\\p–ÎAK*ø¼ñ‹”±WÍ=\$“’™\0#„!Î5—C\0PS\r!é¹Ti³›S¦¾¤ÕlH‰AíR%êë£<³7H’BØÓheìø¶³v†ŞNÆ`‘6æ‡rÌ¬¡Qâ|W]q'ÒúÑ\$œJ‚ ‹«£•šÉŞm*ä¥.ãÒæN2QîMV#ŒÒÍ³c¿æŠDš>f_¿QÂÁRo±H>aX£Ê)>šô¹CŠşmk•2ş_ÓøøßcÌÔÄÁ)…'“Â Aa \\Ş…!%ÆY¡Â©›´Dœ“LñßdêàÅh’]ixJ±H‚,Ó‹™ïÙ;PÊ¤ÒR{Å‚}ï é×UÓ¾Ï(9ùË´.\$©Š\n‰2eå±\$&ÂA›Ò%Î‡‘«è>,4‡…Á~ŸÅYmŞ‘Mä\"2“P\\[Õô¥WÄ£O\\Ö‘u4öQÈFw!á½à\n	˜¿ €îGõ¼¥¤û’}UNşŠßçğÇ•A	x6<`-ŠKıLKe\"üyh—<‰O½Ìı+(
h=]ù:Ú\0•±V ‡ c”\0002\nV‹<ò§ŞÁb†æp³\$¾ßCŞv¦bgD e¥n²ïôÒd€µCh!bõ0*…Ì·âIG:\"nŒO¦~PĞBğ„c†v~#	 ˆã\r°áée Úy£Ä:†xWÍ6R°fânâBle†¬¶ƒ®Ëç\\åŒ”Â>>ÀˆA\nn)€~Ç\"‡‡îÒÏf†Ğ„	®:?ØKÄÁ—\rOr•1…:âƒæ®+\$âPää‚Ë„ˆ\0P:ŒÈ @RQíºèp5-(w­TÔ-XÓM¨“®ˆ\$/Æwå^¥°¦”­RÔ ²ÔIù µqM‚PngM\\~­1¦MM\$'î\$zpQçœRîæñLg0àãQd|„[C#î¶:œn¢]/\"O¯(Ù+ø1äØNß\r­åÏç\nÍŒ~~á0Şã*[kNa‘fÔ§ŞRãå±È1¤ğ)ìî§'°S®>¨Pä#ÿ>/¡P•/Â/fZ0oÒöcg4IÅÒ*±ùÉH12Øâ\0î)P?ò¨LÇÆ§qğädÃ…V¿î\$DÂú…=!DÜ<oÓ !¦¨DíüÄåÄ¯¤ğQğƒ0“qòä¥däîr~ĞøG0mN2elõ1«çİ¬·)mI)°~f®R’PäZq¼x¤ú€!±+Q=œÑÒ²…q¾:r¼ÜP{²Ò9F^\"pë\$š“‡@S…nvãfƒòBä“P\ntÛ:·B·\r+ppO±13,2¥1S
1’Í+ƒ¨0/3'’ŠÖP¢2Rå1äs2ó; Ä`ÖmLÏPíŠ†M‘ó“ó]2™4C¨IPÍ6‡,äû6“hóPF‹óu4×30a5’Óc¤HI³‘3ù9‚U*3E³£03Œ:vüsÅi;\"¹1Óe;§\"H³œ “¼¦i óÎjÄÈU²°\"mÅ5mñ5®4ë¥%;qvĞCSA
91ÒâSì!ˆ¶.ETrÓ:áÇ/BĞºë#ç4±–Ö'<ÔÒ@ô‡0#kŒÙ/â–íãØşî´.âFúk³CNRá‚'/ŒUAä©\";†š¨¨’\r€V» Ò`Ö\$\\fÜnx†ÀŞ€ÒÈr[âfÌJ\rªúBêò‰àª\n€Œ phïHÃ×O±%#C¢	
ç>#¦¢0âG\0í8ÁĞ(2nI`›H´&|uÆÈxr‰ï~ús2~\0E7¡LéPßSğ˜?4	€ŞÃ† ]Å²8/•Q´´=‚è%%Që=KÃì3L³gúfa*Ğúğ3ğ„ğŒå(­Î0Pk~EpŠİ_>PeTó-U ¨€Ãf4CH¯\0Ê`¨	X®QNVŒùğöŒ&lp\$bÿïóW”¤c	G.s1l\$'0nÁT)ñÛ(â¥ĞHÍbå	0ÀòhXğ`¬Z ê ÚÜÆ è\0–8âl£”:OŠ~g’pV:c'Ëc'~Ñ,!\"NÏ6IˆXÀ\rìnãV7e6»_2ZT¢ªKOòşÉ:?’¼K@	\0t	 š @¦\n`";break;case"bg":$f="ĞP´\r›EÑ@4°!Awh Z(&‚Ô~\n‹†faÌĞNÅ`Ñ‚şDˆ…4ĞÕü\"Ğ]4\r;Ae2”­a°µ€¢„œ.aÂèúrpº’@×“ˆ|.W.X4òå«FPµ”Ìâ“Ø\$ªhRàsÉÜÊ}@¨Ğ—pÙĞ”æB¢4”sE²Î¢7fŠ&EŠ, Ói•X\nFC1 Ôl7còØMEo)_G×ÒèÎ_<‡GÓ­}†Íœ,kë†ŠqPX”}F³+9¤¬7i†£
Zè´šiíQ¡³_a·–—ZŠË*¨n^¹ÉÕS¦Ü9¾ÿ£YŸVÚ¨~³]ĞX\\Ró‰6±õÔ}±jâ}	¬lê4v±ø=ˆè†3	´\0ù@D
|ÜÂ¤‰³[€’ª’^]#ğs.Õ3d\0*ÃXÜ7ãp@2CŞ9(‚ Â:#Â9Œ¡\0È7Œ£˜Aˆèê8\\z8Fc˜ïŒ‹ŠŒä—m XúÂÉ4™
;¦rÔ'HS†˜¹2Ë6A>éÂ¦”6Ëÿ5	êÜ¸®kJ¾®&êªj½\"Kºüª°Ùß9‰{.äÎ-Ê^ä:‰*U?Š+*>SÁ3z>J&SKêŸ&©›ŞhR‰»’Ö&³:ŠãÉ’>I¬J–ªLãHÑ,«Êã¥/µ\r/¸ÍSYF.°Rc[?ILÎ¸ /t°â#å\nø„°K¼<hô=[D×V9vÚ)š)–ù#1,Õ£½Q‘¢B«Å¤C*5\\ ÒÊ°˜‚2\r£HİFÑÄuGÒ„#Çw°Ï€FÑ|cÆ£¸Ò:\rxëŒ!ˆ9ÈÒDb£@ä2ŒÁèD4ƒ à9‡Ax^;åpÃz^Ñ@]ŒáxÊ7ø¾29xD· ÃlWŞÃ4V6ÅãHŞ7 xÂ.6‹’˜²Ğ“¾²\\VdÑ‘V ì­°—UN±¬ l»<‡¿;¶İ´»;Nñ<ÏXP
b¾¬UrÑ\nãä7`ÈğJ2!­RÒ‰<? Í(ù4¯!îJyA wQ¡ÉÕS4Ò„#äƒ¶Šs®…@Ì'ÓÜâÕ¦‰ÅâŠë\$¬Ì/sn–].œ76ğ ¯j’¢qßŒş%åÆ¸E0ŠDö“)İª>QYi\"±ß4\$Ò©cfà 9\0Úº~Äıs÷\$zú•#í‹ò¯P&D°)&°JóÊnüûxSIQ>WÏ\rŞ@D²YJŠ<¦µJ•°ÂˆL!©pâ“ôdŞàuï€ë(cÜÛŠğ¼lË…¬8¤,W	
\\ù·Â&ã	\r9]\ròªb\0oºÁƒe”âÃ\"ÀsÚä38ñÇµSĞCaJµ„Dî¡“L”ˆAB„À’E Æßá»Ì‡.ºDHİO46„ÇZ\$@EDA‡ğÙ)Ö«ÀPD\r!Í†Äj[+Dáº:Çtu£ÀeÑ›°V–Ö\$/eÜş€ Ø“˜:.Ôï™²€CÓp½.(iô—5
¡LLĞÓ£<JÉÉ#AD˜ª’„ÎCNIó\"ŠÚ2µÑ'’y^–NAF;ƒ÷\0›ÙÇ8Ó2FVÁp	Z à¶ÇQ)Jô§/2©CJÕk,\$T³:«„ÁKs.eŠ‹—‡|“KòI3…¤Ãq-yg&Ğ²³ƒ§\0ÔJ‚ôAåY'3*€ÂˆQÓF@€:°PÜÁ×šõ^áÉ'†9C\"øc€2DÉ3(eL°;²æaBÙ˜rf¬Ü£xøS8@ú“4šÓZ|‰O	õ²Ø”\nš¼&2`Ò–“q\r&ó:œÉSPv”ñqU`ÂÅ,»\"o¨D‰9Órr‚Õ™³'€¸Q:*ÈY%dì¥•²Ö_B™“4fÌâAH@İ!©S@A¨XÕSğ–)€>˜hèÓ*ÅÓ.e©ú'Â>S¦şÒÃ¸3iäÍÂú¶¶IÇŠ/1RµJŸU3 gÙ®šSTwc)\\/FÜ©×r®VgàhF¬”4°@Ãƒ`l‰‡Q@ƒheq„3HJÃ«`˜:Û ØÃ:öµì<4 c¥¹ÑİJl‘ ç{HU +×%ï€8(—‹Â·V‚ÑeJw•ÙÑ\n (&-x-â?À€àR^j± j„•@†Ò×¸c¥çö,ƒHv\r1Ø3Û¦,‘ÔsGa½Š[In­J(hˆéŠ‡4ˆÀÁÊ¹ø¤7 &Å’*Gg–¼4ÇsW¨gd–Íâ°Æh(eO¥aY(4ÌO“!?ª't¾Á2ê#‰¥\\wòÅÿÊ™zM†2©bÄ“÷ÄnÓÚM}FVXTwáJ)´AE*Q&sHâjˆ¹±Mî§¥“(¬P§“D5%—Q“Ì«ÀdŠ^¦·BoeAÀ€V%?e¨j@Ï)á\\ÑJ¯Üt”H·%˜ĞÉ¶tñTË§ˆËÙÃ\0ù[±…‰Æ_;
õ0\næw+6QÊ‚—)¥\$IXd4®ÙE_’òŠ†…q¬k©Ä–tuEƒAì\nöêttLÏÆùõÄui~b¤³O™¤äª]œ¸´ÂR¤Öø¥™O´Åà ‚K/&âÖM6šÁRú KWeFlŠÏ“-åt¿¢ÖqÛà'¦Zjù‚†Í2¨İ¶wl°½nÌ²­›Jˆ%ñÂ¹ª¸‰¢\nû–†¼U qãÁT\rºîU¼\rS¹HÖXá°°Çõ­©Â½	Œ/€ğÆ`›<˜\"x-}’ì¬ï‚©ĞWsú‹½B\$Ñ Òªèã„‡\"J'3ÉãáØÂà¸­ö«¹m
ZVÂÄÒ>bq—rè©Ó¿U¨¤;ÇúÌ(ŒÜÕeE¦³Ñ!*àîKºH¤êL á3fºÍB ;x•›ûyrRÆ«WaTQÍflıV4Õó¾®êüdÎtKsÓ~„ŒDØ®4Vª¼~WĞdv_Ü€ÎJÈğ×›\rŸ™QŒ1å\rP”á§0äˆ?rNdwŸ<o—¨>¥ìÉx*5dğ¸„sÏR×Û\0…S‚»:;kk6^‹İ:Æï\\È[ßŠ™¯Ã7NÚ ·£ı•Î¢™¼	yˆø¦ÙŸ¶—î; \\„nvìåàâ(j‡¦B#<®ÎjR\0‰‹Å¦%ğt¦ñˆFk\rdÚ.†ÇÜAìÂsè°.d:8ˆ¤âÅğ‹\$l.è7R¦‡îïzî¤,‡N—E¤W-4 ‚\n€¨ †	\0@ êE\0ÒG&\0cì6G«€_Àä„’TíD%¨¨M>öK,Çà@# 8Áhq°¾Q(.ã
FªÌ²%§˜€
ÄqĞÀªÃ¬zÂºíi“Í*öí¬Ù¢Ê£€+0ãcdÌäè\\0ê³0îÑã˜8cÉÇJş-(+×	F‚ˆ˜êÒĞª;ñ+\rª®«pÅ\nñ8\"ÿXnÛ\r‚¿kÆ#á6%âÄ½(‘K ÇZïN- fZğP¼ÍÆjÊüÑ1~.‡*P¤²ƒ®Èw­j.!</	%Å›ÎëËÚzâÏJ÷±,¿F¯-ÜY)ì3‚ «Láì¦Ç„ù\r`4Ñ+‘ØŸEA ª¢;Q–3ÃüÕgZXÃú>X&¾€±ääç´@Bjá! B©œo¡z©êê¼ü§%\\Bã\"HÖzò,ŸM‚özò:˜2(6¯ ì‡Ô]à7g˜&.Ö5ïÈMRÚÒ.*íÂØgÑ&n~CRüĞÒØR0ğJû-U(ÊcÏ\$)¬Nˆpk/Ô±î;cŠn’„[¢’’†v\"¼(G¢O.\"”ˆÚ½‹HQDÊùâE@à¯b.bj¯ÔÌBr‡‡Ú\\ææ®K*Ëí­˜†Å”vRÀPòÄ‰ÏÒşMÎZ\\.%(ñ`ë‰\$.NæÔ~¨lsB<\0P²Q@T¯„(œUe¼ïJëg)òwÎÔän»4Šlk(T@’rœƒŒÍ’@Ùc½'î¼„óJînÇ\$N/Â£*r“7pë5óM(’tÑÏ)~YO¯(sg%9ò{5ˆÕ'“_:s‚‹s†”s}´\\3¹9“<¢B*˜3ÒÔ¿5\rÙ-»<ƒò\$c+dÂ?0èR±3Ğğ™Sß(³ã3-¼äî%>ĞV*õÖ¯?â²6³Ó\0¢¡²q8/5T&™ƒ\0Ñy;t51²)=?Bğ:S€‘s„VŞ.31lÜÊî2t‡ZóátRôİå¦8k>ëNx:ëÒ}ã@{¢lªg2Ğz³Ã|´\$¡ã?EÏÖãè)FS@¨iG.Üh›ƒxusˆX}B¢ÁD)RlŒ0¼i ÿPâoüæĞ;nuJ\\äO†mN{<”Fª4K\$ÏÃOb¹<°7:ÓV+IáOIÑO“QE“½JI4yt[ÑQQOÆ‹2Ğ6­”•í£C¬ÑS^‰ë4ô	D‰F¼A|X\\œUHt•M'U*Q¢ÿˆFØˆcU«â•%Qõ)85Fv¢&e2ä'\$:ar70í\"â]‘ã.©Î6M>àH¢%8”6SñESáPµ?'ÔÉ[3ï”3[´ıU+PğÔ½•É)Ò‹Veƒ8’[ÜnCŠ‡ŒŠƒúUôß^¨aMuÅAfÅS}ñ_'‘ 6îö\r`×[n+â§\"·æ¥Z'ŞáÍ]óBE\\Ó«[ó±äQv4ZÇhÔö?]îÿQõäj3	OvNõVScÕTõÎ¼T_VÎ(ãè¡d±
frÿ,0O–
!pp±vdÚ–ihˆ°7N¯PtF\$BPÔ:.6¡K“¹^q*uÃ_Õq%ç3W¶i	¸Ppââ»–¥dÖùÖ¯m0)j–o9uQgB.'©mP*Ì“”’v[V•_¯û^ÃÃV©lmlÒ¯q\níYVB|iX'û %© lÅV3id6á
 W.Ü¬ısS¨„5ÑR0/oQsßoò îÕâLÂâ©õ-\"]PU]‚ #ñ¦Íb	?A‘¦\"‘9ãp˜”ğ„ S¥{¢I@7l“ì\$•ì²]57œARg2 73,İ¼¨R·!çÙ\rf/„	ˆQ²>o×IB\"Á@™7×% =;w­ı~5A2\0†’\0Øbú:bbèdÑsf¥Z+kHŠ°“ÍD­ÊM‘”nh£I‹AK„è\0ª\n€Œ q\r®Éhİ1	?—]IånŠ)f|·é„öµ1P)m÷…±¡{¨š‰X¼œÎg‚2õ~‹ò²r7	VåÖ±|§é(yT?oy_”¢ˆ	Æ'@E‰µô¦€DÓòpµşì3c‚dT“a/‹ÔN'ZK.·ŒeT¨“rN4¾â¶Og®lqAâ0d›b¨°÷4Ó‰ì¯%Ì§.„åkoRƒ)”¯—¯Cn’XñYMw_y †XD>xo‘R–Õ.ÀùsMryPô)&¹+‘¹0—U4,D-vÙ'Nã¼üGŞ÷§¨YĞìÑNO98ˆYÜ±Í –Şå¯€—\rŒ´gXO~Ï„ãó)1* %<íÅi‡¦àñ’ïc#”ö‡,\$„¦êù]XNd%­µ•JÕ ÀtLÑ¹Â¸I”ÎjM£’|cKŠ“Ú”hOQ€ÈŠ\$÷=ˆŠ„øÀ‰WÌèN•=³1“Of\ràìE\0îÂ		sö0V–…}–œæ­z/e·¯ U§v5U|W\"#ã€";break;case"bn":$f="àS)\nt]\0_ˆ 	XD)L¨„@Ğ4l5€ÁBQpÌÌ 9‚ \n¸ú\0‡€,¡ÈhªSEÀ0èb™a%‡. ÑH¶\0¬‡.bÓÅ2n‡‡DÒe*’D¦M¨ŠÉ,OJÃ°„v§˜©”Ñ…\$:IK“Êg5U4¡Lœ	Nd!u>Ï&¶ËÔöå„Òa\\­@'Jx¬ÉS¤Ñí4ĞP²D§±©êêzê¦ .SÉõE<ùO S«éékbÊOÌafêhb \0§Bïğør¦ª)—öªå²QŒÁWğ²ëE‹{K§ÔPP~Í9\\§ël*‹_W	ãŞ7ôâÉ¼ê 4NÆQ¸Ş 8'cI°Êg2œÄ O9Ôàd0<‡CA§ä:#Üº¸%3–©5Š!n€nJµmk
”Åü©,qŸÁî«@á­‹œ(n+Lİ9ˆx£¡ÎkŠIÁĞ2ÁL\0I¡Î#VÜ¦ì#`¬æ¬‡B›Ä4Ã:Ğ ª,X‘¶í2À§§Î,(_)ìã
7*¬\n£pÖóãp@2CŞ9.¢#ó\0Œ#›È2\rï‹Ê7‰ì8Móèá:c¼Ş2@LŠÚ ÜS6Ê\\4ÙGÊ‚\0Û/n:&Ú.Ht½·Ä¼/­”0˜¸2î´”ÉTgPEtÌ¥LÕ,
L5HÁ§­ÄLŒ¶G«ãjß%±ŒÒR±t¹ºÈÁ-IÔ04=XK¶\$Gf·Jzº·R\$a`(„ªçÙ+b0ÖÊzÊ5qLâ/\n¼SÒ5\"ˆPœª1[Rí¹]ŞÔ¬³RWˆ|·Ü•Kk¯úZ¶^HëWÒ¥\nŸ|8¸CYŠ|NKÕ…DJ”ª­é !ØşB# Û&Mñ=<Óèç?Ğ!\0Â1Œoˆç&ùÖe9ŒS«È;/ã½>Œ/E	CC X šhĞ9£0z\r è8aĞ^û(\\0åÙ„á7ŒáxÊ7ôçBĞáxD¹ ÃlŞòIƒ4Ş6¿#HŞ7 xÂQ(M’Ù,MÑ°­Êğ‹Ñ”|zE©ùLPFÎ5dÒEòÂ0DÚt­à€DJQ}
òê}0·7-İ[ÒÄ/R’ÛQú½Êö(“Ú7ã‚B¸Â9\rÚBŒ”õ¬O>gœâÛ+A—.Š^âáÔ…¬UIíí+ÅSå3DàÒ­Ì]ÆTUst}~s]Ô(Š½²\"k#ê6O£°Â¨ew.<©–Ç(È’¡Å@êlê=bö\n²/}ªõĞ¹ËÂ\r 
 °¥:ŠKÙ~Qp5K2BØ¶Ø¿8¥uÌ)GŞ¹Ê•5kÅ‘ˆvrê²BH\n?AN\"¡…ó¾è,ìŸ[¸Ïì64{‰\0c!¹\$…˜
T¡1dë•fŠq\0hÍš'YjYö£E*… Ğ¦cL¶ÂÜ\\ s¦D'e‘˜Rjì ÄAÉG		«­}ØŒG—uÂATÒ\n5Æ5’1kR±ŞÆ3S×ZèJÑ¼Û‹†\n)—9˜,.AK”õã\$¢ˆ2–»0»ˆ?b’)Ë/#£i·c¡!GUMÁÇvR‘h¹3 ôO<Šu7¦°İ2‹‰ò™ªt2‡ƒô™ûƒn\$Ò•‡pÿ\n;§}ã@Şƒ0lf\n%•\nbX)˜8ŸAP7w\0ƒÈ ³`:³Æ|ŸØ \r¼3¤ÀæÔÃ rŸ!„3†˜({Òeá¸:Ÿ PÁLì jwÏhÃÑ•„Å×Œ­\npT<)˜ù7àå>™úM¶‰¦Æ¦æĞiŒÅª°Öšã^l\r‰²6fÑM[Xrm­¼§‰p@ú§8šá\\:‰0e¹M—…¶ŒÈq -Ñ%Ûâ&¬…¹A[êÊ“ˆv¦@'{’¬mÍé\0Å‰15:Ÿª^Ü›£QMaà8–°¢£V§ím®µöÂØÛ(wlí¤7&À\\Ûspš³^lÕ&ğChp=Áµ·‡J°¦ˆ ´)æŸKTC[|PI²{ÚZ´màbÓC’¹R£*º°uˆ’w!ÁMYÒù²1”¨ò3º àÁH\r‘41@à›)u¤y¡„3Wäı?›\0‰´‚¦¦˜h<Ì0Ú@@ì=¥\r/şm½¨F´%AQ¤«^®¹×TIï±Ó@\$
u1-ë²,ª6CÃnR­È(.@¦=…æ½Qk&‡¬0Å”à†àì¨cªÊ×“Ö{Oxeyª\09 Cä“ÛLºa¼;â¢ësÅ>M49¨6{DQüo¸8QVœÜÚƒÍçô1†‹TC;]VôH¤S²‰+lnD\np@Â˜RË\rEšÚì¾pZª•r€•ÜeI…HœEù §å²º”MaDX(³Jõî´YQ˜•ÈS?gdVP*Çˆ—-¸­Q\rX®¸p†›zÛš\r!J,‚*&)Ğ„5–¥?7<at6“¯9Ğ\$‘ğòw™•:Æ\$·ÚÓú|šÀq€!Í>†dÜi”f9	5:¯N0PgÁD¬„¢P.3˜'…0¨C£Zı-7lK…%¢ph¦BÊK&\"ôÍ½rZ‘G”¢ÎìœÓ«—øŒLC#W‘¯ÔåX†È¹m8ï|SŸVˆ7¶†„²€ \nqXlPcMÁSE7šm
9i<7_ë@äxÓvb•ÚEõL•‹f\"G@€glÚ»É‘·\\µÎ±‡d‰İ—3Qñˆ¯¬#²AF‹[4Œ1¥ƒ\\ğä )æFDLH†²s­ ‹'… X2JŞB~¼øÑ›¹‹ÅJB^»\núù…qBÃ¨óÈ½«¢wk»l½ã‹\$B©î²>]G±XWe&Jy©YF*Ôù‘V–1]ëoñ¼ÃÔSÊÈmÌXÌ¹c„:XôÔĞtì%-ÂãÎMÕĞMc”DäÔ¨½uE/ô\\‡OI–aJ‰Ô.@êhµ5;06ˆÑ’ıá ÅÏ¥üq¯ÑE±FÏ–]GÇx9ÚÅ¤Ç„W*È[=¥ZlùUÇåÆWI®ıëÂ˜iP
Ú+\0‚˜e=Ø‹A£[sï…òâ›-™Ìºë‰~’¬è¯Šü¾iÔıgš=€ÊçD]uÃnw¥Zdd\"îÆŒ\\Ç²}*HÏJ>íÂğvèpë!NÃcÍÂwä¾F\$>¤Fˆèï*e\rÀñêíÏBŞ ‡ß Ã¬HNª…JîTï`·¢ğ‰(¼e%t!b£­´3¢çP\$+«’ö‚G°ª#”õ¨õåX3ÌÎR¥#\rAIó0JW¨TÍé–pv ¨\n€‚`\rtM€ÒOIÊÖfnX?EÀ&\$èF†Ç†)Öîn^Òãz@^6y¤\nî~z1,íèt¨ ‹1öPä'k'*¤/o}o©­>}æ¸ÌøÓÏœğJP1@‹p³0BtãñB-ÊÛc«*ô1bZ1gQƒÃ·Â‰ÇR¸p††ìÒ:Mè€…*Şâ\$qÃ´ÎŠñrWA„\n,äO(İ§Ä0ªG¥fñ4áH¬‹‹QÈñ»PĞïñÎ{qÔğpĞv°°s±P­‚ävÇ:òÄ®	0ãdÜâB1¾vjà¤P&NDzƒx¸®İ#hÔqÇeÂ¸1ôÚmüÛòAc‹vöÎq‚ÜÌÂÂğ#ì×&Ubòvbå#².]Ç(/xÄ`wO·
£uâÜ“b&zÃ'Bågv2lğ-‰b5OJÓ§vR#°sÂÜt,“íúHi'EU d\n&¥İ p`ù‡U-‘”wÑx(ü]\0woğJõ%’O%ğ\$wå\"7'„–!åãˆ_dÃo-0á%Åª]¸Óğ010AäˆêÒ‚ÇW‹÷2‰[R>Jœÿ2¸“Ìé4òë#7!qM.rW4q™±ã6/É5hó±F–³%7“M7óf“n¿î”d\"ˆHçdël\$¬Vï\0…`„Ü	¢#Rã&.ìvKs®ƒ•
*Äè(ºVâ0ês¾˜’ÀåjBù˜{³ÌZñû\rC °/?3;6±K.K‰23u5óz_PÒĞ,ì~ÃV2Ü\\À@|óÅ*éä¾(a©o\rªób¾şï3S[8³K0t:öt>“†qÓ.‰8„-7*Õ8ÔPóTÔ¨ß+´,–”	F´N¥RÛTV’1I;ğI7T4‘Sé \0/“%“U3X{t\n­sHTQé%“„q©JòSI³|xI)J3u.E@RYIq™LrKNw
s5>0k6”İ@Ñ†.17,‹´)6§°Â‘^‚Ò]ÓOS 1)“¢BåİO3&(ñˆÛRÃ´ÁP3ü5æ—5HÈU\"ÏŠï	´C5rıD´¯FÔåT¬ä±Ù!†L5EN4œÍD0ä…(–”¾G´}4UoK5r0iF(HøCrE‡=m+1õ \\Ï”âNÛ´=Y².R¢-‚j–1MèÜ­îìöõ[•¢{>†5¿Z“Â’Sø–…Yb’}TÕ&M»1å€!Æ8‡„Á%™,0”TÓt®2­
\"TG40›œÍ9\\ÓeAe=RP®ÀIOBS<9ÏÆK'dt”Mq7‰U´ƒW6@`Ò÷DNËD”­Xs`U6Vy8u%UÖTtvn‘2è-ĞÉ¥/eµTğ•YfT%ö€ÁâˆÃtÕC³VÔ™W}iee ¥!gµjSwe6«°Ë:ÖGjjßÄ¯v™ÖµÉklïÄwp¹ŠÜ­ô ß+hA&¶ä/èğå½LqªíÍAè,•)é
•,s´§/¶f6§X“}qSÂs¶vËdö‘8÷)NÈIWöÙg6½aH>HIrõidÒ…µ<}â¢vS§)‘uo@f)u’|g;tQm·XÜ£Wuï0vVşawyX0û.Œ(ˆHcBÜ|hÓRN Ö‰J•Wrß	—\$U,í3KzãLhúWµfr_{§w{ìÙlw1uU…|j—¸|D£}M%}—Sv×’ÿ—ézwÖxo=)¶Íu—œ%·«qÖ`ûó%N·%ø\n]ö×€W5~LV8aÕ²V.Íhÿ.˜[WÃkx ²Ş3Ë3XJ³]Rtå2Q„ÂmVwkM·ßkµGÍ #axÂ G¶¹QX[‡%Ñ‡xeM”•vøHm+p7.ĞçV­l)Y'æHğàù2ùDxUDØn“ø«_wñ†xAQ‹¥Y‹ø™‡¶q†¸W(cd\nûqv5bsJBVôè]<å1+Y²Ãx Ğôt']5;\nòímWÇ†×ä‘çRÑuÉ;µTY
ÙlX'‘˜.Ü2Dë\rÔLòÛA O™2³£“6‡„g¥’2òğì	’5\rT— j\r€VØÀÒ`Ö
 i§ü€öÀŞ€ÒÉòi\"êÎ\r¬°O¬¨¡àª\n€Œ p™Êq™Dš.¹[]²Ô:ù)Su:-ÉB6sá‡øX;yœRaœ•4+õ!ÙĞÓõ‘Y7³|¿v)\$ŒÖĞˆ•¼Ó7è\0›™9–2v©ˆ\\XÃˆÉMZ°r¤t#0íOé®ˆ˜‹d«ˆç\0%Â~P²L8ÁwÌè	\ny¦ôÇ#ğ@\0¥†Ğh@ßRLsi‚Œ *ÂÜúÓíBR´gWRxü®n!ÂŒ8²˜;YÙgZ“8Ş(–é6°íyÙ—Íªs’Bã‰,5%«–“«Ö)]8‹RÿŒ¹i”>CÂ<l¦¦ß˜@àª_ŸÉ^Zä“6CĞÕ¯Ìì¨8 =gâ\0ÓŸ
Ô‡\\néŒ×C˜“â•1ÒkY\r\0!Û%<(|ÂqGK÷ª•_S®@¬g`ê Úí£‰NÓîùQ`âõ§äbĞ<ød¶‚\"ùZB)úš/À£k_ZÔrctY[õşëÎÑc&up“º\n½/8c„eM¬ \rî@ãÔ?NÚÎ÷ü{°ÁpöD¡nÈ,DVğÜÈ€	\0 @š	 t\n`¦";break;case"bs":$f="D0ˆ\r†‘Ìèe‚šLçS‘¸Ò?	EÃ34S6MÆ¨AÂt7ÁÍpˆtp@u9œ¦Ãx¸N0šÆV\"d7Æódpİ™ÀØˆÓLüAH¡a)Ì….€RL¦¸	ºp7Áæ£L¸X\nFC1 Ôl7AG‘„ôn7‚ç(UÂlŒ§¡ĞÂb•˜eÄ“Ñ´Ó>4‚Š¦Ó)Òy½ˆFYÁÛ\n,›Î¢A†f ¸-†“±¤Øe3™NwÓ|œáH„\r]øÅ§—Ì43®XÕİ£w³ÏA!“D‰–6eào7ÜY>9‚àqÃ\$ÑĞİiMÆpVÅtb¨q\$«Ù¤Ö\n%Üö‡LITÜk¸ÍÂ)Èä¹ªúş0hèŞÕ4	\n\n:\nÀä:4P æ;®c\"\\&§ƒHÚ\ro’4 á¸xÈĞ@‹ó,ª\nl©E‰šjÑ+)¸—\nŠšøCÈr†5 ¢°Ò¯/û~¨°Ú;.ˆã¼®Èjâ&²f)|0B8Ê7±ƒ¤›,	Ã+-+;Ğ2t­Ëæ2¨»ú™Qâè9ÇÄl:âÉâbr¢ª‹ÊÜ€«\n@Ã>Šû,\n‹hÔ£4cS=,##«J<Õ®€çAĞ€Â1ŒmPæ¢ŒáoP\";ÄC5OB#œ'\n…\0x€˜Ì„C@è:˜t…ã½Œ4’Šş…Ë˜Î¹Áxá	BƒÈ„Jh|6®hBŠ3.cj>4ãpxŒ!ó=/ïê	@£éB½Ã¬ìËÃ¨Ö:!ƒ¨ ÊÈ`ÓEFƒ;N2_ø\né‚6É]ü'\rì²
O¢¸Â†Ôƒš#Õ#Pè„¸âb¿d=ˆËèÙ\$§ô@Ò8GŒ`Ü¿N\"ê­Úô¯Ò8Ê3#¨Ù2Ù[ Â]« #¯¸ÆÃ¼£HåæÉËÃÏ,M3Z3Œš°¡n˜„Šb¹ZhğÔ:¦®€¶¡Ã°\"·ºŒ‘9ø×§ÑÈ¸ÖÉ¡Û‚M£ƒNÇ67kN‹Š\"d9.#Hòä:'zRS18}`•HôÍŞ
ôûÍs#Ó6_Â5ÃôÅP¥Ø€óÊ¼MO¢\"rñbªv=<³?€˜-JûÅ_ÜõÛô[˜…ØvW4İŒ”\"6‹ûOµk›øŸ¶èB›Ò¿Ê< ãuGrip™5ZâÌ³xº7ŒÃ2«%Â~Â£Ô@o5«ˆ7 ’Núƒª TA™¡ ŞÊ(sV©z5 ÂQN)ûd I³pÊ\n˜)%ÁT”†SÒQ‘22ÈàÎŸsV¸©(T€H©3ú­Cì\r'uJ«s8®•â¾X
	b,`î²R”Y¡Ég­pOÏ¢å[\0ú'®3Æ¹×I.\nËØP\n¨Ôr\"[Ä©‘•j£NJ!@¨Ğ¸´.ŠOê±VkXş €àÀÌ .VÊâ +Õ~°VÅXë& (—CrĞ} 9õÈ•²ÁğIp¦™ H°ä1ª¹’8 Öò%AÊàè…Ë™~ëp…“T@»Ñ0r=!¬Í®Â\njš„,!\n~(ŸµX` 0ˆşÃ‰Ãf êUMÀ¥e&	,‚ùV—ĞĞB˜a1€€1™3ºÌÃIw}¦@¾…ŸBsP#Çí#@É,’¹\r\0€(€ ¥§9Uj\nXƒ Â4K‚å*ÁŒú3Xh‹¡¥4æ¥©ÓVmJ˜¼;Ç•5Ì™Å5qyiª35–ğnŞ9-TNÍ˜cf3«é„lf¼Üh(—&Æ/ñaL)g…§¡ÿ;S©;hÚkf0u%ÊÙºsöI—kTkˆ6é„‘”²g'§84Ï2°Õ#Ò hlŞæFø§I\"¡äÍxwDe¸n“¦ÌÕ™0âMRÇı\rÃU–¥M‘Î›„²5›* ´ÍMK2e÷@ Â˜TÎâ°Ê”BGˆ,+ˆ…Ğ¨3Š@Ñ¢2&Ìx„\$ÉÔ\\3\rÁ˜…Å>¹\nµn2kìÒV‚\\ı)‘ûja½dªi„B\0Sq ‚Ö=³J@B0TîE<)Ó‹^«ä·IÀÜµš¬Éël©ˆÄ…2ÚˆÙ¤j§@'„à@B€D!P\"‚\0PhÈ„D¡Ì™¥eFÃ)W”@Š-ì½×À÷%Ê®öoÅú&èÒ8öVJ±/-Ø5i–Ôº[@StnÉ`'‡øtÓj §lÊS•æ—tE\0€3­ÜNu—v+'öì.S˜M£Å¼Ñ?Ù7šK‚nvÓåœPôyğBix-&¢Ì\"Üê][ÉøùA¥€§æÈk¡½PÍ–¯Š	ñ=¶¤\\¿/Æ4øÓ†QÀêL•…¸MLÜõó™x˜Æ—¤*;\$ ªüØSoİô„ÂúîİûÂezˆqGê\ná`öK<äh¸cĞzƒ³4ïèc.eQt.ú5šPÊñ;2š(À“Ë\\‘Ó™aN°5A“»Tš:gN!Ó÷HÂÛ>!8„¸K°ÚÊûHx¡˜…­C~Ë8*!Ebf»))6-p‘ğ™ºËÃ0<İ¶b¹‰ÈóO%ìGc#ÓÜ¿Â T!\$\nî»Cö®\nm—2…’ÊU(°Í Ä@¿ Ø/lÉFKÃH÷›Ì ÅGt I‰Dw#œÖ½D™S•¬›Ñ‰Sk6à
€HUâÜ“Œµ9‘¸û®\rÜ…Íè¼ıy10\\§•ñµÆÅ	¡ãÒË™sN Ê9\"ös{\0¸d\"á‰–İôßr8K ßâä#–ô„Nº!Îåg‹srOÏá7Aã½‚§s¾Èˆ3·\\í¿ªs\"Zğy‰‰}æğîÆˆÅã(ä|•<8U¥cl;æ„“¯R<)T71y7ŸÖçá	|sd0Åt“‚Xlmş®x4`¿‚Õ3EK¼º_øò^…QÏëY²·1g±: ùŸ%/ŞÍCï Um™ò,\$ÏS\$M’u~OqÈßŸp¦Å<Ñ«ñ«O¶£‡ô¾bsç_{Vş\nÔÏÕ† ’9»„°`vxú´èlB·º
kŸÆ\"Ò¤Ó(µèÃ#ş ¸\"Æ† ´°İhé¶P0@¬ÿÀÉ\0	-`ªC²3g¨úŠ¸G^ÖÄte\"xe‚\0Èn­'ëô’C È)l³¯”[ÌüOÕ –È‚L-€ÊCCœenÇ°dúOÜæC/ ©o¦ıª%ÇbÓO—¬2ğ\\OÚû	Ç¢üĞ<ıFÆMØÄâtçNHMÂ'îŒäbLéGJ\rÎQ
íúPÌ  Ã\r#(ìĞØé‚º0á‚MbíÃ*úPòušÌŠC‹²(nHü,º±Øëµ¯Î'Â}4ØÑ°®‹Äïæ¶\"iâz¶&Te‚[…3fº>Š4\$JHPê›z(ÑNÂGh•ğEFà \"ãÑB &#(8•\"\nY)à\\l|\$l‘JÉO¯16My±ˆûç§ª¸ÜlEàÜ_ÆÆÕDO\n0º©h`ñ(ù©şÕ1Ôûq=\rÌ\$ÇIaÆkfÊ8£‘äwQğÜÑ)ñîÜ±ô›±í~Ö…-æÎx‹¾ ‚q!ƒ~lb†1¥>\"äV1/RåîF€@]b1©hÛğÎüÑø2íÁ’	ƒ%RO¯ß!&†œ0åı&ƒˆ-Œ¸2…úÛ‰I!Rlorq(`’xT0SÌNI‚>ªÄ„%ç©pl¦²¦\$ÉÒ¬/‘Í%Ñå'Mj!Ç†1èÓg€\nCrªD…&Nd%ÒÀ/¦^Ã&~( Ò=\$ƒ.`ÚQ-QÙHv82[Ñ?/s/²\r2àç-¡/(ÒÚ31ğ&jŸÒ7ãâNbËRüùÂ]3ci3³9Ñ.D;3ƒİ-Ñ>	ÓÂã%bìÜj´1,:'0Âƒr’A0HÂ”î7o8SbO7ÆníÊ?ìºúEô(¦nîæèpÍhEôAƒBd#k£~ƒcĞ•±~ìdO;±8“À#DÒáóÈ Öç1d¼\r€V»VÚĞ)\0C¹\"\\ÃM\"PB	†ƒ\0ª\n€Œ p{èsÆëj2X¾ªq\rÎ%ìŠ¬¤Èùô+t\"Ğp~¦±Rã6³ ¨i\$Øşfø‚|¼*+#¯Ğ13DCï:/ik?OŠ3f\"ÿ«NF¢º1MšEI´D@Ş=0’K\0«H%M±¦çBÖ+,I¦úd¶á§>hm¼\nÈ­:éOÒÉT´şŒ‹ €ÚèÚÖ{sˆe”‹BtÁKs‰ÏMôÅ8€Şè0ĞÀÿÈ%e¼`¦1*˜k2>t1œ3qŠ›L¬KÏîÃPW 'pnpT.ÑzËÂ0\ràÄDÃCm¾2(‹`Æ¤’¿tğCG¨­|'âÁ’2P¦\"#†”lqèÛ'Š-õ2laF”GÂÉÇ?Hæ®M† øc.î.Dàâè ò¥Oc\nDAÍV\n³òò:ÿÄ*À";break;case"ca":$f="E9j˜€æe3NCğP”\\33AD“iÀŞs9šLFÃ(€Âd5MÇC	È@e6Æ“¡àÊr‰†´Òdš`gƒI¶hp—›L§9¡’Q*–K¤Ì5LŒ œÈS,¦W-—ˆ\rÆù<òe4&\"ÀPÀb2£a¸àr\n1e€£yÈÒg4›Œ&ÀQ:¸h4ˆ\rC„à ’M†¡’Xa‰› ç+âûÀàÄ\\>RñÊLK&ó®ÂvÖÄ 
±ØÓ3ĞñÃ©Âpt0Y\$lË1\"Pò ƒ „ådøé\$ŒÄš`o9>UÃ^yÅ==äÎ\n)ínÔ+OoŸŠ§M|°õ*›u³¹ºNr9]xé†ƒ{d­ˆ3j‹P(àÿcºê2&\"›: £ƒ:…\0êö\rrh‘(¨ê8‚Œ£ÃpÉ\r#{\$¨j¢¬¤«#Ri*úÂ˜ˆhû´¡B Ò8BDÂƒªJ4²ãhÄÊn{øè°K« !/28,\$£Ã #Œ¯@Ê:.Ì€†Ê(ÃpÆ4¯h*ò; pê¼«pôŠi{]\0RL\"r2ìqTÀÿ;CÌ§BHPu&‰#pÓ3¦ŒZ¡£&fğRƒM,Õ¨#Üí€P‚2&ÔúM\0Àc|
>D\n0Œc27èõş¿ãºX44•{WAÃÉ‡‰ ĞÊÁèD4ƒ à9‡Ax^;Úr?R¥árê3…îĞ_£È„Jˆ|6®¨êò3.©óÙ xÂB)@ËXÅ+Õ7Bj/A„`N¡Ì¨Æ:!L…üÇ%l.š5È7á”}\"š1,[.ÒŞÊœ+¤´ui&„£ @1-À’äùLy@ƒ¨Ú½G±ü)@KÉ­FŒl¦=WÃoBönxÊ3,T\n;/c¨ËL#—ÄTÈÉÏI¢ÎÏVÕ.!¥ì(š20ØƒÃzR6\rƒ~Š'ØNÓ!7ÖCtËP‰†Z›oRñ„dÊ2RÜDÕñKZ®ØÄ-òÂÀVà22\0¦(‰‹¤—§Íø+‡RC§§æ4á´9ì£+Ó1Œ°ûì¡õ¯JÚÄ8~OÑ£½,x(5­z¢hªê’B(ñWLL§eŒi8×Dÿô”[!y=fœô³Ó”˜çÆ¼j9
ªN½qÊÊ“}Q,NŒë	ˆ™«òhÙ0MJ’££xÌêŸ81¢¥>ÁÌ€T\råpŸàò†Œ“VD`3¦ËÁ’C)‚ †ÎKÉÆ>Ì±R¡°Ê\n˜)€aÎ†å>OÜ?
Ü’¨`Ï‘]„™\nà@¨ÖÀrC0´Œ”bL±LÈYK1g-¤µºÖT…ål­µºz/K¾, }áŞ^+ÍùBFñ¦+¡À4‡#ùËªú:*9H  Z§àŒ_§øÜeÀƒP|k¡•±Ú<KY«=h­5ªµâ¡0ŠËy÷§áW1BÎ¹PF0|ù\nºb†Ìš†ÖºRSä°@ëI9.åÉN \"t*+H%>3Étá\rÈê°‹€]8°ÄGJ\0r‡e	“ÍP2±RUµÁˆB®Ñˆ\rt¢#6™hlò´ÃÉTPâ
ñ‚3&Ã(”FW_zù ¡@\$óx D jE”q¾GCàèW\r`i5ÆÂB·šˆ*#Í°7‡y	\r¦Û•FªØ9 µe¦Òê\rÉ,	Ì\0c\rÔ»¬ÆNnfÙ›i\$ùN}‚S\nA&Á@›p AÊ9>s\\II9V]¦)#¡Nfcj%•\$­‡6MIÙ=Q&Š¢Ğ@Ïò &…D˜„’\"M\$şdÔHƒ·iµFÌ£­ \$¨ü†ØÕ5!>Á¶ŸóuFĞY±~FÉßO0Â¡RÇØŸ‚hÖÔõ^\nR§a[å„LöN3§tcŒ£ ¡Næ’²“:›¬æ´¹4…ƒyVÁˆ»¹g0RG*Oe<É‰ê®8È3WU&A0P^%%>“`)ƒÉVÔ©p\0U\n …@Šä®ÀD¡0\"İäôSÔ”f,ÌÈêìà•ør r„Ê# ù8rAÁ«™%DˆAÕ%'\\ìœåüşÔS÷_µ¤š:#ÊxhIä2Á	Ş/³dšÓi7AN§©éîxêœïzvŞ¨µêÔoî\rÂ¶@<èòîŞ¦%_Í9;“XÛ”¡AY#¾\$x@	\"¡\nÄ½J‹4XŸ aIL¢i-J|ôÅEœBèhÙè#Ù#*Y;‹è°7Q¯#×¢ziêŠÂf¡\r\$!à<DôÊ½—qOpÊqöqœÔÉpeøïæj˜†nÈ•&ºwSRH+zÑfX#(&Œ@[Ö
sæ@ àce‘›BäªçiËDÓÃYÓÇ(‘íNGË«É\rÍ°0Œ1O-`j <\r8•Ú\0PRCqQ&„SPHÒhDzÎÁÙ!¤ú•®èT!\$Jöœ]“üªª­¼z.òOÃæ;Nê\"4£ Ëx !¬™îš\0ÊÊ÷cÃİÉ5@ÁîŒÉpcCd|Â[BIúe›µ0ÕÑ¦Ã .;Õ>ïrº½÷Ù8Ë0Îp¡¼Lÿ ¼Ô1`èœÉ‡º6üŸ•”KÄ	%Êe›—‡r}ôI8”2ßù)Pp®VÖQ²åÜDÙs,®ÏÊ¦ùßdÈÕ3òÚÉ \$D’‚°I™«¨Ë‰ò®R‘&˜	¢jòpUNÄßX„d`û\nqÖìiâbPÄòzL(ı\\—ª&Ÿ9ˆ?.Š;=ÂWñ &…lİ }ÏÈrI¡!91d˜s–Î¡æZ¯\rš¡Ã†iVb\nÀ˜ï5<wW0‚ö‡¼û#Ñ™£¦KòLô\$Õù¸ÍœÛãºc8oÒqÇSçŞ…L©ÆjÎe…%îÉîß.ŠqãmñRÕ!`ÓÂ!ù0åD†cd‚ĞJJL3µ€	+DWÿÓøœGÑ.©7ÛXÆ)ÇL*%DVé8lfÂœí\$(Ã,fd_@Pm¥h%€ê€RI/Zöì\"Ä,TÆ,,Nl¦@Ü¨ïô%/ùl`w¬d(o†0‡œøBQ+
¢jşï~wLGLM,>è¯Rv‡¶÷‰ïd{G] BsÎ= §pGì¿P2g¬5\0äØbôàN0{Î\rOòáP“ïŒ&š=âà@à„™®Hó°lÜF‡e=Äÿ²ÔF’ÔˆÜ/PXø°P¯ã\rPè&NzmP°€N.¢îÜct†Ì…6‡2d„%%Ü9CØH\0æC+ÓËÙQ/Kª@ÈunR„PßƒŒ²âœ³%%ã´R	óQ:F‰d¹@‡\r-JĞÅ%ÉeLÊG06I\r:À-@_KÕ\0ã!/}e\$b(kÌ÷1Æ°ë ‘šbPŒv,_‡¯pÄ&Øî‘Šÿ/e‘v0oM5\rÑÂ×M˜é Ë†pcÍlÔÇLMøÊ£&i‚LÜk¢“nSQ³	\r‘¿\rğ¶J±Ç ’&-bÇt‚¤ÌÌ²aÂÆåd1Æ~Å±¨Ô2º²0Ù²(Œè9Ä}P¾KèâØ3p(R`â;†\rìwB%¡y%òc’ k%Ò`R\n†/%’}&2:Åò{&ò~Mıp:1 òŸ\$)(-6ª’¨ŞŒ\\Õ²³)¯<É‰„´dñ'R„õ2ÂÕõ’f`RÎÖ
•\"'U-¤ñ(í[.Mb\n‡\\Yç“ÒSì˜Hª›ÒË/í.Ò¥0„ü\r\"b	ü›`ÈØ2@eB²fÒ”ğh?†@¦Y\"‚˜E ş¢<îì±3£ò‚`æ\"äqMÎdÍÆ âH/€ƒ4“á¼ön4,:şÓle“pN¼ ­ZdÀ\r€V¯…VÍZi¤ú’ÆÚ&.Ì|`ÚB„\n˜ê@\n ¨ÀZ  Î€£VX¸'4°¢İĞ­7cŒxÄ<ÒJã\$˜¬§Œ  ìP_*øç¢sÇP-‚%ºüÒ@yÖ= è=ïdÖcÖÄ÷\$6™0Úu\"L*äib÷- ˜¶&L] *6ã!C\">;ÏÎ1fh'fÄzUDHlòJá¬‚ş“ÔÌ\0á/>6F3\">ÄŞBÍjïFÌÏ‘€¨ÙGãyH0J>ÒUF´1Tp\nŒ| £5\n^Ü`ŞØ&Ìş†ÔƒqeæÂ(«2ÜißFíUMcC0p	Ü³foĞp\$‡\0dJ{\$0&Ø\r\"ió¦GŒxßFd¿t²CÅD/D;@ã Èbìu3şü  9-/G‘ã9Hä~îñ'ª_ƒ‰R”|PH¢è¹ î.ÃpSm'ÎG€JDş.š]~@¦T 	\0t	 š @¦\n`";break;case"cs":$f="O8Œ'c!Ô~\n‹†faÌN2œ\ræC
2i6á¦Q¸Âh90Ô'Hi¼êb7œ…À¢i„ği6È†æ´A;Í†Y¢„@v2›\r&³yÎHs“JGQª8%9¥e:L¦:e2ËèÇZt¬@\nFC1 Ôl7APèÉ4TÚØªùÍ¾j\nb¯dWeH€èa1M†³Ì¬«šN€¢´eŠ¾Å^/Jà‚-{ÂJâpßlPÌDÜÒle2bçcèu:F¯ø×\rÈbÊ»ŒP€Ã77šàLDn¯[?j1F¤»7ã÷»ó¶òI61T7r©¬Ù{‘FÁE3i„õ­¼Ç“^0òbbâ ©îp@c4{Ì2²&·\0¶£ƒr\"‰¢JZœ\r(æŒ¥b€ä¢¦£k€:ºCPè)Ëz˜=\n Ü1µc(Ö*\nšª99*Ó^®¯ÀÊ:4ƒĞÆ2¹î“Y
ƒ˜Öa¯£ ò8 QˆF&°XÂ?­|\$ß¸ƒ\n!\r)èäÓ<i©ŠRB8Ê7±xä4Æˆ€à65«‚n‹\r#DÈí8ÃjeÒ)\ncÊ\r¯Ê9(”jÈFê\$AHÌÿP\0(MRD9·£œh*Oƒ
¾¾k¾P»Iâî Œƒl£=ªèÉ«ˆå2LÈ­xá„£f¶!\0Ä2ÃLŒã~£0z\r è8aĞ^öh\\0Ô5T”ŒáxÆ9…ã„œ9éHÈ„J€|;&±˜A(ŒÉKË7¡à^0‡ÉX­n=e#‹C{àóR#¢–5µê]7CkH77¨”ÔÔ`x.Ş¶lÖ:¡í[Â‰7\\+0}ÈPÊ(É[0°‘d°ó“äcJ:.o2:(Æ\n‘ø%Ë‰àè‘\"ÀP‚Ø#BL>9²èÜÅŠÆzü`“xĞ‰Ãzş÷Y@Œ:Ã\\g¡ú@ÎæF—YCXÉ'CHí=\"Öƒ#I+cƒFMBb`Èˆ‘ãßÂãÆ`WèZôi .z†GÒëó‰H\"˜¢&Lõa[@V¬2Ì¹ZÅ°N‹s†àÍ+{{Ñ%ôç\n'K„(ïÄñ#¢s4v#GfñöEKËXÑR\0´;¼¨\$°+\"SİÛ:(»]Ç¶ WQE‚yİwÒ8íz=ĞÃ1ğ¼H9ªéC€œŸ2³
ÃÒŸô@_TK=>ƒÛ ı³ğ”QŒğfÅ	°p¡R-F9b„v\0mj­Là10æ\\ÁUi¥M©ÓL¯Ô|ÆÄCV†Íû(TA¸Ø`I¬'ĞH7ÁB% ÄSM\0P©á[!„˜;B„HÈáY°0°½ÏC(#àÑÁ°\\WÁ—+ !ä>ˆN‘¨‰¡RQ6AØzi‰ºF‘5 ìp¹”bgğš˜HJoÈ’7)½PB´öUâ¾A\r!a,EŒ²RÌYËB?-0äµV¸/¼ @Ó%\0>ƒaÌ8D,Wrğ#§Q§ÔTĞR’„ı‡%:™äMDTÎ‘¸Ò„j‹è52 FªQBd4DÖ\n+¤É+¯?jõ_ÈE†±V:ÉYk4;¬õ¢€¤t[¼J Ü¸ÈLm%ŸÄ/(AôEäL¦x`É7—¤`'qBNå@s›Òİ×¦`ÛÓz‰¤œ¥<*IXApÊØ:¶¹nPY8	À]IÃHv‹‚–QšKh\0‰ ½TQ^Y¦ÃX»)qNa¤•—’ö™xz;IXLÃâGd›uLÆ>—£ÈJp9)8Ô„ü\0 € ¦4ÌV‘j:\n\n€)A© ‰¦,Èz# -¸ŒPÏPÚu%.\r	 (ÑAIÛUA±©K¡ Ú\\Ìy AÑ^WšG#yç\"”e(R8—_‘3DF^ÒüpIà aL)`\\ 8e;Díó.å?àè™„­V\"’°„Cc•DH<âX“ÊKÌá3Mõ¡O
Óih!:&¶<-=ó´ùˆ¸BOİÖ±6F ~gÑDÇ­ˆ•)EL…\nŸÇÕ¤UáDf¾gˆ×aC¦¨^©ÀàÓ\nƒ<!@'…0¨ğ
ı´iJuó/wÓ­´µje½«Ä<ƒHg§FÆƒRÒn/Ü+wkœ“”)œ«Vñ_\\_1\$ŠØ†ĞŞ»\0F\n•\$ß“ ”q‰\$~Dm>GòVÃHz«'|VÚR×P¦¡\$IR«ViM\"‹M4òâª°+Hz\0è,“ ¾²7c¯é/1Fú*[ùŒ'A‰ ãUdğÉÛÈ55ÂLI0‘)b™p9åã`¬IÓ1²+ìù £AŒoAÿuA”ş<æ­­ñ\"wX0¼c\n{³fqu.­ç»w¥ •£ø#Ôi £8¨¢Ğ|ıG‡Œ¿¶ü\n±P OÑ>ŠRj^Z©Ñ ¨c¢/`ñM|a¿MêP¬á‘u¬x±ô¨¡„1…¡”SÈ‘Ä&¥üÅ„÷óiK€\n€ùñØSy8ñ&}nôò’²Z…Òú–Å5‚×0¢vggå#´fÖ2«®aä‘(ît‚ƒ\"\r@(!Ã~²M\\æâ¢lw‰©Äg	|3†t÷•wÙÇ_×çƒ'å(kı®\"n`Æ4æê‚2êÂšC
š‹÷<Møfkç†Be¯rIvAÜôÛiAF«°@B T!\${€Iª¬#z–\\r\$™LQ”ò¾Ê#‹k\rl°Ë*ÈäÊú‡V­˜Ã .y¥¼ki¨ä.¢ÄÕæT´8İãDxJ[tX.‰YÌvÙhcfë]£<ÉãÛ>dxùü¿¾å×»­¹ì]“¼½1 ;ì^uì2	¢Ë-2fUUÇ^lˆŞúÆvÌ„2?;×ĞçŠîı—ÇG(\\Ê=;˜>«±÷ïYÙı¦sÎb{HÛíûÙ¶ã‹T”fòŞÉ'QDD<İtß‚ÊS	ß4‘ko‰àÅfµf®ƒV­îG–%`ES\"‚¡(Á\0w¤£â!/ÂŸX¦À‹ŠEït¥XN;? ¿¯•öukb¬Fÿl¨P`Ò(ÂRLÜ8’Ãt1\0ì7§:‡¦c#~íC~lzÆc÷§DcNú7çÆ5í´J®#Ä'P>/Ï~7y­p6AÌö_Ìú`ğdÜB„¯&4°w.´¨v­\r#4É&\"0d‚N#x¶ìri¦jmüA¨jÄ‚Ùppv Î à¤`€È4‚„¶ È'm”L®üÈ,æâ'\r Øb€‘\nä|MÌ+)âíNÿ àÜÏærUíÚ+/âffj`@LÊ40Ø~FŞåM®Pˆƒ ÈÙtÎ¥fÎğ\\U`Ê\rF•ğ; §¾åŠk,GÏ¦Ú†#1)ÃJ\rñ^{‡~íHİÇ¢'‘l{gfò0|`ï(%gÄ}ƒĞAÎ: ¢ £Î}8í+Alp4®ÜòçôğíãÑ›‚¶F@ºûqˆ4¯íçTÑh—Dg‘b7ñŸ=Qe¦«îàO2ŞŒRÅn®ûp¶`ìO­şÅƒ‰ 1í °ªà[ Ô•‘L'‘ŒŞ ŞªÏˆ7Ãî†&,ÚQ\\ÉşdŞ&'>!¤.¤œ½,µÄ|x#Ç#…È¤EjÈ†h9¨\" l®ebX\$£åÎ\rÍÏ#N&<ÊÀ'Ëİ\$\$Ş+0ÄÒŞ’d<0–cMîß(á\"†lÜ-¿!Pù&Ï 0n G,R¿\"1KàÜ^Qxå­¼a€ªäÉî×Ğ{,°sÎJäéù²ç/‚IÒ×±Pu®Ø7ª0M\nz3.‚2øÇÄØC:=¦x@Fn	b*ÎM\nfÍ<ÙŞ<æ Fî9«÷ò,Ñ/4ñ¹5Qí±Ù5ñI-ñO­ğİ`@äFº9²¯7Ks5^qL7³xkÃ8a1·¤ú£ã%büg@¦DB€Cñ\$˜òğxĞ;: ×:åÍ0“m	õ;ây<1'60S1\":ÓÏ93lR3ÜCãòÉ²4¢W>ÒÕ<rÚt“u%³å´RT’#;ràtE#!tà´s\nÔq+üà@mát\$OÄ†IÒ÷.¯Œ\n¤læ+CA3ñ5“ôOî`GÁ³ÿDÅEB±OÂ>–‡5ÑÜ`gØ2'ÄGgT=
>´ ë4!±/a`æîT4’’‘ó‚AH—Hâ5JcGIqïI®:Š‚V	b2³ƒĞe \rf’9ô”24ƒ#ªmÎÚòÑò\r´ Ï4à(CDğ1ñ'õK+@#CWOGŒò¯ N±öeü\r€V;Â†nì\"
e!âˆW†\0Oj|?f|ÓØDÏË'2E'fœ\$ˆŞGaf’o¬&Àª\n€Œ p³Ñ¦ÃÊÇ(éOÔì4¢\\ç“Vmmñ°ğÕqP5tÃímPÑĞğ±öLB&\"¢/E\$™êzphb“rtÆ˜Bş? f‚#	b9¢üGˆH¾fªGÄ&B§Í(¤9[ƒƒ4ú‚FË\n˜Î/˜Âld'Å\$Ò‹¯*Â\$AcPJ€†(2S&v\0êMÇóO ¾4ÜÏÓö×6öÑ8Ì¨XGÖ#aQÆ„¢ˆjcÌgÖ%ctÖ2rH	,<¢…Õ{dğ™#Râ„‚lÍ¾^Ãü9ª\$CğA†P\$p¢×‚ˆ˜ĞÀ¢…h­Ù(B²f ¬'IüU ŞE£1iÀó‚Œ2\"epJÄ„#ÎıeÇÂCÅıSLxuŞk ‰aíô¦¶,ËìĞ)¤¢§Ç®ÎmLË¦ª6\rïc¶?kÑ8k->f¾\n6\rÃx
I¢@@";break;case"da":$f="E9‡QÌÒk5™NCğP”\\33AAD³©¸ÜeAá\"©ÀØo0™#cI°\\\n&˜MpciÔÚ :IM’¤Js:0× #‘”ØsŒB„S™\nNF’™MÂ,¬Ó8…P£FY8€0Œ†cA¨Øn8‚†óh(Şr4™Í&ã	°I7éS	Š|l…IÊFS%¦o7l51Ór¥œ°‹È(‰6˜n7ˆôé13š/”)‰°@a:0˜ì\n•º]—ƒtœe²ëåæó8€Íg:`ğ¢	íöåh¸‚¶B\r¤gºĞ›°•ÀÛ)Ş0Å3Ëh\n!¦pQTÜk7Îô¸WXå'\"h.¦Şe9ˆ<:œtá¸=‡3½œÈ“».Ø@;)CbÒœ)ŠXÂˆ¤bDŸ¡MBˆ£©*ZHÀ¾	8¦:'«ˆÊì;Møè<
øœ—9ã“Ğ\rî#j˜ŒÂÖÂEBpÊ:Ñ Öæ¬‘ºĞîŒãÈØß#ûjµŒ\"<<crÖßÃRbj²ŠhT	@-úØ;\rÈ˜Ş‘?ÑXèõ¨\0P˜âÉ\0P …2(¸ÜĞÈËX ŒƒjÖ¡{âù ¯³ğ0Œcàƒ.,úõOb0;# Ğ7­Âü¿oèä2\0yI	èÌ„CC.8aĞ^õH\\ÎÈ»Î³Œáz”¿C›øÿáˆ\r«:0µ¶ã“\"˜ãpxŒ!òN+0ƒcj2=@P¬§ °àê5ƒ¬TaÍ\"0;\r#(î[–óRŸBpòĞ¶¸+Œ#”œ¸hl’1]c(Ş÷Íê%èú-Š‘\$?€\r®|ßx¯â\r#®{…0Â Ê3#¨ØĞËhëÙ…5œÈ­°4Ø®€Ã„©XÀéy»‚štî\r²Î9¬ŒÒ~é·
ş1!©IÌ4ÎÌ0¨¦§cF3èBC\$2@ÎK!Üã`Z9Œl)Š\"`Z5¬“lór«´ºÙ\\–èÈÒÚ2Ü»Z09¡,ˆ'º±º
ºŒ3Èøo“RÑp/
Rş\$¯¸äšÅB*WÅ0ÛÃ-ª[nşÇZßiŞ¢\"º¯\nâ³Á=0¢8ˆP2	¨ÜƒX£šN&)ü`ÅBÍ Ï´£xÌ3j*¤Ìâ±ˆ¨7Å³hòuã­AŒØĞA8õôÌ9åŒ#8Âµ¸Ê“VÒ#(P9…=›‹Àk¸òÆ‰8¨42I[mÒ´#k:U¨U21ö#JD@TØ S¬]P* è©2¨UJ±;ªğä¬Ušy-‹7+}OXë%\r(6P›Šax­(\\cB
Ag6¨7 `Î‚A1œ”•\0ä×Òøe?Íè¡B2u	ršSŠzª5J©ÕHwUiÖ‚å`¬ «¬uÎÂ\n« æœA6)ÆA°|‚AÏ,d‰ùº£â°Lù¡äé¶7¤J°Œ”\\ƒªÚ§ĞàäÙm@hÑ¹´¡JŞŒëî3F|1Á@@£\rX .Çä…,’P[ŒO¯=[=<õ\$:\rÂA‡6VF‘›Má¤¶»#\\Ş*àAé”¸ƒ>Dc!äàs6€H\n\0¶T¿â|P((€¦“KÅ2…Ï!¬R/!Ry0E§T4¸@Ê\\’K>+Q>Ò>Ëä‚*\$dø©0æ~”İQÊü7 \"¥²–I!Ü4Ç&Ó±™42.u‚²ı^UH)´š†ÂF¥Œ„”¸Pk×™‚h1•…CBTK	qŸafx3æ^Rá\ré]ºÖõ\n›é…¨Ğ¡2ŞDCË»/©%>'¡=,}c¬KßÄ\r“…Ì1‘óÚ£–¡ú.TYù\0Â¢‡Ls‘ªJfßh /d\rAÚÒÉ\n– ¨¦²…Je¡;'¨@¥†—Eq\$ëj²“Zcˆ k2DpÈ\\ÉÃ¤ky 9H0T\n¸Œ¸–{P°rœÉX¨×pŒÄäyÊœÊ\0¦pâÈROná8P T¶Œ@Š-ªKÌ	7RºŒŸq‰m.„ÊÀÈ
iÜ·Â™’SärÉ«\$\r‹­%\\«˜EÑˆF\rHE \$#}T›ùèQ\n(Ô Ä^!ô:DÕö­%š³îÚerMéË6ô>²‚hæeã).ùĞLkezºŠI ÁÓ¢°ÊN\\Ë¹{*İ:õ…EÈĞÃpp	D9´E¥\neêÑÉY¹±öˆ*RîtHzCó5Ä¾¥pX©ÖV‚sèß(³Œ”ˆ\$•À¸–’á\\xtÕDJËûq4©!¤ğ–IZMb”·d&IC1:\rFÚÌË5g!hæÿ'†Ì¢.2š-&ı5&Èâ›Ş™kGeìú±³@É
:ÃAIHÀĞ\rEG¥1·vó>Ñ
\r\nP „0)İ¡>ğŒSTıhû\$¡¨ÏVå‚|„l.HA{\0^U—á¼1d%}¤“)Œb*	eµ\$¼\\¾âÁ\0O	jgPês~rZàD%ö€VÕ5tl4:ËZjmFP´È¥×Zğ“ÊÒæØKO=äĞÀÉ«Ş¡¯[kì-bÁv¥oVíÒw°÷\r¢›ÃÄ½JA#¤|²K¼ëôÅ¾y-½SàÂQì‘²ˆ¨+†PÅ0¸-°¸H%ÆÃlIZÙc¥\$Ñİ)Oˆk\"¦ÛI–àíK9 APZ¶_¶¥fA6‘uØ@oš7¼„Ÿ–rê¨iQ¼¼Ô2º¾aµRCîÃÕ˜òs
Æúª5“<™n“‡ú*J2ÜÏ‘ô;x•écEHm§¯ÈE2—\\9ï:\"nZ¨ö‚c
ÿníNÇ«²ÄáĞÆ@^E€ôŞ‘šB#D¶Îg€Q…K‰\"+¦Û7ëİÔoÍá ½òçÆşRßÊ1üäÜûmv›uÜæıO¿ùoÓ&Kr¼¡M¾CÎÌ»ÿ¬6‡×u/aêıo/4^§§=Yœó¬ ‡»™Åì]EªŞÉÙ} çBcğ¡ÄŸ[’òƒN»ïö\\çefgÒÊ1–×—î2ÀÉ•ÿ }÷Ÿo*ş¾\\ÊoÏıS#´PqjşLlÓğí¸¤æec»¥2èò3ÎÀ4¢æÈ‡äÙ(ÂÉf¬ÿo\n\rÅ28§, ¢È7†.*\"z>#;\"˜)ÈlxOÊ³/Ş%\$mÅĞÉÎFÊ¤Üfğ¬r\\OjïËÊZpl÷OÄêtœtşOH¼¥ÔcŒtÎìò—ïàõïÆ\$ìğõ0”ê0q	Ğ’­FöâNÉÈ\n«ÔÏğ·\n\r8ë‡k`ØR,îJå¤/ƒlcO‰	I¦:EOœNî£ ®ÿo ÷e¼¼°ñ	om	¦Ò\\Ç¢;è)&ä?+â/…´CëÖ41dåŠÏÇ&: ŞPB'¬æFåµ\0¦¶)¨X¦Íôòˆ:\rq?Ğ…
;‚•\nÎıkË
BG_Fõ1>äf\r±EJê1Oµ‘&äl´Ë‘u\0©ë*õö}Ñ˜C°¯Ô4¬ÄËbÿq®Ì€¨Ğ‘ÊK1›ËËQ¥\nd@;q›î¨iÀæ3C\r£„š±š¢’pÄUc˜ÀØQ\"äÓ±(¾I^¾e\"æmÅ %(D ‘\0	fÓ¢ÆLbÜ Í!:]¢0û´×­C#®×/²Ù€d8\r€V\rd\rmp¨ÁbúŒ¨ÓQ¬\$(éfèPWëJ\n€Œ \nšã¾Kä\$íjØéŠh‡ çMÃ(¯(B¤±Ë@÷­V­­nìœ#Xè‘\rö&nàECzåÒ6²Â7àZj2T\rªïÃL\"ÃQ%ÀÒÙ£Â£âE\"0rÌ}.Œ@hB0K’	|#>cKöFîªéD\"ï‰¼ôAfÀ´
ÊÇŒ>ïiŠò-ú¹q2JÍ2‹½1ƒBl\0àìs\"èc(»°˜ê“54³2ÃBşBb2+é)S2kÆàî^¦d³k°#&ª³ š\rî´oÏi„>.~ßi“8†H-
°ÎbB¿BtÃê;†ñ5âÚ)æ-‹–˜FºlÖ£ô'¤U\"“0À3ø£JÂ»
Ü¹Ã`B/êª@î-
’J±e;‘º0B<k@ É`@-JB˜Äb\"àÔ";break;case"de":$f="S4›Œ‚”@s4˜ÍSü%ÌĞpQ ß\n6L†Sp€ìo‘'C)¤@f2š\r†s)Î0a–…À¢i„ği6˜M‚ddêb’\$RCIœäÃ[0ÓğcIÌè œÈS:–y7§a”ót\$Ğt™ˆCˆÈf4†ãÈ(Øe†‰ç*,t\n%ÉMĞb¡„Äe6[æ@¢”Âr¿šd†àQfa¯&7‹Ôªn9°Ô‡CÑ–g/ÑÁ¯* )aRA`€êm+G;æ=DYĞë:¦ÖQÌùÂK\n†c\n|j÷']ä²C‚ÿ‡ÄâÁ\\¾<,å:ô\rÙ¨U;IzÈd£¾g#‡7%ÿ_,äaäa#‡\\ç„Î\n£pÖ7\rãº:†Cxäª\$kğÂÚ6#zZ@Šxæ:„§xæ;ÁC\"f!1J
*£nªªÅ.2:¨ºÏÛ8âQZ®¦,…\$	˜´î£0èí0£søÎHØÌ€ÇKäZõ‹C\nTõ¨m{ÇìS€³C'¬ã¤9\r`P2ãlÂº°\0Ü3²#dr–İ5\rˆØZ\$Ã4œÇ)hËŒC‚/0Úí¡ƒ²ã\"Èëˆ¡Dé¤hå
B`Ş3  U&9ÃğÚö»Ì`‚2\r¨\nÂpªCT³v1Œij7·mŒBÂ»4\rïå{Ô”¨ÈÖ‡ƒ
BáŒÁèD¯ƒ€æáxïm…ÈÕZ½ÁpPÎ£}‘RÉ!xD¨‡Ãl¦O³úF4¤à^0‡Ğcİ°û5)¹C ä:·£««C3ª+Ö++C¸@Í NH¾¯í¾Rb.ü¾2µ{.9¤cĞ+°êìŞ9¡è„<¤€HK•e‰kØ\$˜œZ¼M3SâÃB
ø7Ïp‡RâµÄÑÌjzP§-ì›.a)Š<B3ÂŞŞ‹İT3¨Ã(ÏyĞNPêä1˜ª´1(«”“­KóÍ… OÖº773~&2 Ùˆ%™î±ªjÌ@:/Ëz1ĞÎØ¢&¢^sCƒ~Ûº\$ºu24Ó]65âøË”ä'<ìSÏ¡}\nó6ìe	C\riwJ0MKW6‰#mk¡XŠ<vî×Š07N’u<Í5ÖF¢·ĞvŒ¨¦ğ¨4a'ƒw¢¨a ©oZi˜™=s”¼ĞWhŞ3Ãe\\™ˆ#ğ±‚Ót;+^å?%c`Ş„ò \rÀ´+:vÆBÁp D‰ƒ ÚÉ4L€•H	ü È…ÂNC`./Ø?’CàgĞO	D	e ø pà‘Z'f\n²ğA2ûƒ¢'rtü‘€‡ø?°ŞJÎ^Aˆ2šĞÈ‡ˆ\$:Uk}W“SÍ&@f¬ğÊ´VšCZËam-Å¼«—r\\dl¹¬ Crê Çqˆ‘Õ„`C[9#€…{/ƒ¶b›¨gq]°pÄK	ñ(\rÆµ´@Èš^Ö2†~j\r Ãôuj£]=¹`u’P&2†… ´–¤k[+l;­ÕYrâ¡•r7’8÷ãÊë`ùÚ‡ŞÑğn ú,cdôÈML+šÔ¬„Î0r'-h§›@N[!3@'P§IÌ‰Õ\n (Ğ¦®šËÙ\r«õì›Ärş\nÙ /DÌ*µoˆipEüM”ı6ƒ)!˜ê+5p®ƒ0u'oúPé(¹d	¨3†ıÉ:|&QW\0Š‘Š!‡øÒœNŸq[¤…ìØªóÃ9¡‘3‹îuÎÚOJN¥,#  ¨‚A)Hør4Qô™„2@^Ã9WĞ7ĞRèşm	 ¨n=•eL-	Ÿ‡x¦OUN~ƒƒŸÄ8,eÎ²ˆh+Ó|¢•ôcZˆ3ˆ_¦x0¦‚0 \n¼ÓŞœSœ2D³:dÿDŒ<W_g%öÜBˆM…*èœ“xAIñ@ ÉØ=%\"vŠA\0F‰J¾R™şqt‘Íš\nA
0a\\C›Km}>éĞ®š¶¦GbÜp°Ú1Àhä›‡%Eh¥CA3Ğ„ï¥DÌ(ğ¦kO}-@İ`ŞR I©‰aêdÌÓc‚9G)%-íZ…¯•Õ;÷¹ú
x­‘„µ9>”VØ \re 75¨ŠA¯5Õ .ğ¹z\n«Â0T\n„‹’¢4i	Šø5©›	Ş¯½GvÈnd“0ŒĞÃ#®obñRp`pAr	À€*…\0ˆB EÇE\"„À‹Yšr·¡…5%ü™3š“>éªr)Öø›Bxp ¬\$rzL˜N?¼Å i»º>'Í¶:µ¬AE_O*Gæ\rHáò9%ãç6¿ğ¤`÷?¼7‚zÂ‚	3ª‘÷`Œ8iz,‘¯İéÚËØ Obºúz
iùÓ¥jğ¨³ÔŞdİ–\r‹]ì7ã|pDÆäf<13l`“5ù)`(5“ ×D¦K=_¤°;¯ü”|3Ñôtš¡g\\ZìœârÎDÑL—C€gHøú=†ëf*[ÀR|6Z/p Ó¢İ\n¶Â àŸÈ\nbÏ5\\aŒŒ5'uÉºJ£\"dÂ¡tk…Ç€”RXuwæ_ßéRTÃEC{ãS”œ–\"ºÊ,tÚ\$nÅbÕ'uC?6™ôıD‘]F¸ÈP „0Œ6fìá¡@Ş…•¢¬MT”–ó«€•xSÂÄ3\\4Ûyb‡Ì}²âÇÌÒ3g¡‹¢“\r*C™,=2¸:Ş–¦LÃ!F,	õÊ°Ñ:6€ëFG®uîŸØÉ›3½¾Äh^`«\r³mÈµ:”ä§Bq£«DØS`ïXíbó®B(}ào„jP¢'µÚçâ£?lRÏÁ~õ¸qŸ{Š3F-ÌÎº¬,Nî²˜¸²Ür„åÍ!~¹„)š&fÑ±2.6ğ1LPÇ°¶¥FİcÏ³\nI­RS`á¸Ñd£˜5©çª½„9\\¸PyÊÂÙ×°‚Å¹ˆÔ^™ïv ïğ€)»>tÃ8tEË¬AşŞàÈQ‡çI0œ€ø°ÎÏ‡€bÏô#gªÙ#âŸn Ğı/è+pÛğş-0,øÌJ8µÜ¸9 äÔŞUÍhâşi\"ifôkÄ¨A à{ÊDr
Ú5åD0ğ^k,ÌÉêjPh1F²db¶vÌİY¯6Ü¢6\0Z\n†n9oj\0P	Œ®,œÉ¬Üs\0¬ØşÇ4uàÿc\\\r¨ÄPĞĞ¹\nğ&NLæÏĞÊş0†cê3ç™
°’Ö5pàuğä„ë`xĞypñ\nğÚc,øgÎŠ•CÖ\nN:¤°®ó<ë¨,õïÊıâşìì&@ùOã5Î¾{Î¢îq&î©VŞÍPÆ\"0ß#h'pÌÍlöÅÍï,ipòşPˆÏŒ_íñc°ÎÏ€¢c£¤®\rà0\0æC¯œ›ñT4‚>6THBì\0èE©ô #ZBiæTƒ¡«ûíWK&‚­Äon+/ZÄ+Ş Å ‚+Ù ñ¦_`Û¤+ p‡aQdßMŞ'	\räŞ‡FÉ\"‚á-ü=Ca€ÊaÑ\0şpİÍ¹!q}Ã¾Ï’!%gƒ\"Æåøãç*âò'\0Ìø¤òB)±k0Ş1®A\$PÍ#P(&rL(²Eƒ&nC%Î>§RÃà#`	JM¬Îˆ‹PgÀæóÈ˜áÏj1‘0ãÒG
\"g)ñ5
ÒU\"¨¦’^å1pjê&ÅDÑJú2ÀjÄ v1\rí°ú2ÒfĞV#g²\nC\"`ÖkğG æPîb#€õ%/ÔûìQ’ún‘}&û/†;0Òã>³
/òÁ1Rı#Í1•ros+éùÒ·ÒÁ33,x®\nàc«²HŸàó1Æ'5å_4275ÎUóK6ƒ«-ä²Z²½%’Ne FsWR)sŠäó!ğ‹9sk#2¸&`Aâ9\"÷%‹B=`®\r\$R`i\$e A-m{+˜ª„2,<²ÄÆ¯ä)Àß=bf	gümˆ|¥Ë˜É….NÏš;H|%,\r#L'qFì¤hf\r€W>Ë2¼ƒ`0£°üjj{+ş\$ŠFˆtFÑ¶{ ª\n€Œ p4 Ş™ål6‚&q>—ïÌş/Põ7=® îP\"ÿb;Eô \"ëM +\"Nç¯fÃÃ&Şmê5-iÆÊ0ÏÄ¥C:
|¦¢:âG874#Iƒ²4‹°Bt.%¢fšI]H#'èS¬>QŠT-ÄÂFjLê6:*âí½2ğò#© .l<'\$€Sôè¾ç\\Ì£ #Ib: àGU\0u4ë
÷	ÀÉTÿNuQ ´ËBqQ•,0Q‹\"òö€êÓPÃ”UÈM£.(Âº°ŒoX¾dÛ#„Gr+ÏA\$ÚÒ\0Æ°dË\$rU­dNÂtQ-‚Ñ##<cRC¤Øóà™OIOF\rÔú°¤Oƒvc#,ìÿPK0¨ÄÒëa[õÂqÕÖ@Ş¾àî¶DÛ2‡(~£¦˜Ç~Ï–%*#ƒI7à/b";break;case"el":$f="ÎJ³•ìô=ÎZˆ &rÍœ¿g¡Yè{=;	EÃ30€æ\ng\$YËH‹9zÎX³—Åˆ‚UƒJèfz2'g¢akx´¹c7CÂ!‘(º@¤‡Ë¥jØk9s˜¯åËVz8ŠUYzÖMI—Ó!ÕåÄU> P•ñT-N'”®DS™\nŒÎ¤T¦H}½k½-(KØTJ¬¬´×—4j0Àb2£a¸às ]`æ ª¬Şt„šÎ0ĞùsOj¶ùC;3TA]Òººòúa‡OĞrÉŸ»”¬ç4Õv—OÙáx­B¶-wJ`åÜëôÆ#§kµ°4L¾[_–Ö\"µh‡“²®åõ­-2 _É¡Uk]Ã´±»¤u*»´ª\"MÙn?O3úÿ¢)Ú\\Ì®(R\nB«î¢„\\¥\n›hg6Ê£p™7kZ~A@ÙµğLµ«”&…¸.WBÊÙ®«ê\"@IµŠ¢¤1H˜@&tg:0¤ZŠ'ä1œâ™ÑÁvg‘Êƒ€ÎíCÑB¨Ü5Ãxî7(ä9\rã’Œ\"# Â1#˜ÊƒxÊ9„èè£€á2Îã„Ú9ó(È»”
Û[Òy…J¨¢xİÂ‰[Ê‡»+ú ƒºé\\Œ´FOz®³¦\n²¼]&,Cvæ,ë¢î¼­
âü¡°­[WBk¹4µF‰9~£™älD¹/²µ/!D(¤(²ÒH@K«­Câ•–êü=A²ƒPX¤¢J”°P¥HF[(eHĞBÜš˜;©\\tÔCÍê¡%%%ÚÂğ%Ò*d«7î´ƒ½2P»”uí‡h¥vÄˆì¥,Í« ·â,FuÓ¼—4È¤®˜ÈdÓ‡nµÍ@gAuê¡0XZ˜^¸eêA€‘ªûªKq8®\$ôŒ„—e™ra,# Ú4Óá9N“´ñ=O\0Â1Œs˜ç úTá4ÍslŞ;# Ğ7³¸ÂOÃA\0y¯Ê3 ¡Ğ:ƒ€æáxï»…Ã} LAtÊ3…ã(Üì;ä2áè\r³,ß Ó(Û4#xÜã|Ù5p¥ä¦ÏS°¯d·šàqœYR—”`ìaoF>RYÏÜDµÑù»:Š>=cã×aëÇjòvòÕ¾´:P¦r˜ï«Ès…\$&rX+Œ#İ¨#á(ÈCÈè2>÷ÁñNyZbÿ^Ri_x˜ş*Æw”)s?Ob¹‚ãj²31u.ñP•äô]3º ìÙ&5ğ¢T¢/\$mŸ†ËY°\$	(\\:£~w!àÂÙ%±‚vg\n±)eXF”sZm£(FkBŒáLˆÍaDEŒ@Ô?r@'YÚ\"\n€×’–H‰½B& ±°‡QëÆ9FíYštNçJø¬c§u•LTb€ \naD&´Ä¡`¤€Ÿ h‚‰R
îxgJ;„ÈrDUqÍIŸíÈ)A?Ïò
1ó¢ÁÌ:ƒT¨H#¼T^
óˆ,—2ô¸Vò)J=Ä¨>‹Nì‹ÆÚPEÃ\"¼)«MäB\$H“\"tnÁÓ2ê‘Ñ®¹è\"õ‚ ii¬6&òè*a\rÓc'I“1Ã(x|a¹§¹`æ]à¡a¤ÁÀè‰\0’]„-Í³®¨ÉÁ6Šjõ3¤~]±e¤—ÃXkI9Š‚\"#Ï’{>%é¢/¥¨Õ·xT<8ŸFÁ NÉèÎâ“e–†e›*gE)\"Ê!Í:Aµ:Ap	 ®!9öKçìÜ'Å|­uÉ@Ô±Ê ÄT‚Ğ’ËBÍTò¤ì‹Q'KE	}SºŒqYFˆLÇ£ÆtƒŠÉàñ|í‡ ù:%ÔŒir	((x£@ĞRÚtr!È Vš‹=gí96PÇ5ƒHdhMœ6–ÖÛ[{qnmÕ»‡vòŞëc~NÁôã2Ã£•p`ˆXw)ZÃš.â^†¡	òH×byÔ¶ZHµÏº‰JV©SsSPĞÅ\0©Ä€DYÊ6XÒ¾_Ñ—1£ºÇùÏlÍ¡µ6ÆÜÜ“tnÍá½V¶úßÜ
ƒš3NjØ·§ò§a‹[\"”ğ·)Vl²ŸKG	qSkÒ0CµÉ…¨ŒÒ#õsPº*.¹ä£Â½tJmÓB’!“³wthÈ„ÛŠ(PÛ]¢¡e™\$=“bö®†„ŞÒìK–\r`6ÇÀ›Ã‚b¬a´2½ğÂŸdaÕ¦4àÌp°l\rá a6²ZMó\0ÆÚ«n±!„6Mr@­ÉI+ZtŒ«ÅÆ‡ ÎÈ¿!ÆÒj§ŠyÊÀÂ7ö`éT4å©ğ@@P\0 º’\\ËÏ’¸>È©’Ês”/å!¹f‚ìMhÆ!½°  ÒƒLÅøu°'Äé0“¨okØU/aÜ˜œztkáÍ?4ĞA‹q–—\rÁÁ®¶ş \\>\r¤1ã~Û~Æ8;ÌKºJT„IŞ\"ˆtŒŠùraL)idÀTÁIõ\rş“3BE\$¥©¤¶¬g\nSVsˆ£¬7Wú#Ş%†Q*ÁO4dÎÃ<±¶2Ç%ä@FŸ6Hjbä²P¤ı\$ZzíK¨jªŞf_Cv	k^DşÔ÷ô{Š+ dDüÀ€ ­Mò¶óCjÌ 53˜õ¾»³R k0Gâ'»ø!Qå›¥¥\$´(ğ¦%”@RÄëŠÂ¨²©T~ŠæÍ:ıı¼n­Ù>R6ô“2Œ	»-€~íoFdíŠÍ§µ÷Íf£·ªD
á J*Ñ_Ó¾ºŠlZ^EëvSaÂeÛÎä`©˜­\rò‘œ%ÅBš­ SÆ„D\"^¾Wá²ÙDß‚@“¿Äi3€*·áW(å±ù!/„—…˜'Iq\"‚P‘#/âIH>4gYF&|R8>*ùqœÄT¤”Xo²)1jÄìşí)g‰3(ŞY—tëe4ç1ø M*™Ú»J‡+ßrÙùë	5çS;iËªÄg'?#¸|§“ó›µ9Híƒ@\"Q\nğ5;q˜ÁJJYv)ørXJq>S¤¬yı¹Ÿº½1œbRÑQ3ÜÀk6t+Pıƒ HNî-ˆ˜%â’áœ›%†;æ8CBšÚbÂLú\\uiö&/zñ-øşğ„ê”ÈÇ`'`t¼Â*«ŒåÊx,ìÀÌBè}LÍ¢4åR#ï>ÂN9ÎXXŒêğÌ\"\rÈ¾¤cè€,B„»§‚ÙÃÌ÷m¬7kÖOú—Èäi05¯ìI'¬Íd•B¤ç‰_â@¨ ¿PıO²€‡|Š PuPÚuĞŠ•ÂdÅpÈè4xJxƒÌëüÍ¼'(‹¥\nZ)DØB((†Wöˆü€,’÷ìø#2øcj/f0-Àğ	ôcÈ‰Bà`P¤&I:Ñ\$!dÃÁI8÷õl¶œg*Å\$x\$\n\"¢)ˆ!ixˆ z¤˜ôht ç“\$pâ†G‚:'Hõ+6tæ•‘c¾b¨J›d ¨\n€‚`\0â¤Ä\r\$æiFÔÑ\$îÄfGÆPgÔIN´ö	¶/D4ZÎúgÌà@#'¾Ë¢\"X|±şTâ®\"6ñqì&ä£+4Ëb„sæ?â\\ıá4¢JZ'’¨P5âç ¤W JC!D,/’\r2c­ƒ\"Qµ\"\"Ò05r4(R8ÿIñ#î1 'œ9åÂ¾åb0âÒ(ŒÒ¾èÁ\"E@é’ +Ñ{ªUbÁòNà²p(Pğ‚Æï²=%ì•\$bz)B§Í*ƒ­*Ò&ÿr++h”Èñx¢†P° •%Æ='2¯lú­Œ&Î¢ŠËüë¥^0’ÁëÄT¬±\r¢´Á^%Ï†]PX&’ø'~øs\0 ÒD%:;ŒîÅ4õeŠëÃÎå3Ç”anğIl& Å-p4©dOøæ3æ5n€&ÄvçcFŠ¥^X
H —‡šzTzªJ-hIp.EP¦F¥<<3†şó‹‡–Á2Úìª[ğ8‡\rØa““\nŒˆ(D3\0í¦•‡ê–Ï:-Ç¤Zñ„ş“>şÏñ#¢²sÜ!³àIG^øÉ*q&Ák?…=ç©?Š”9ƒv=‚,¬æ\$>ÜĞŒª¥@Í³õ G«@OİBPèCî°Ğ?Ô?ô6•£íBé‰8”D\\bOT>”:\$h(*JI‘\$—ª<)ªR¡‚bfĞ6„È\n8 è\\ZZºpı3³Hé';õ;â%pÇ±ñt€x/ŞÍî_O¶…~ˆ4Fÿhö~Ìş‚ÿ%L’Ø‚}¬Æ%ê¨,ÀSEñ `Ï=\0Så
CQ>´4YieONšR”aÒZ5ô	PCEITEô[Q—/æö‡l<Ä)DSí@h])Iğş´ûC4]\$Äbc±QiE”Ë>õ6¡©vítÅRÔÉS.õ-“dÉ+(v£Ø5“‘*²Y#_&\"­&b½&²(|ÒO²GW*Wkê-Õ}'u!„xÒ7,òoY\r'O{)Ñìïn£%
ú/Q8;#1óPHğ<ÿ5FU“Í\\dPâD)\\ô?ÔÇSÿ\$•Şëµã:Cµ^ƒ±]\0´WQÕWSRµ8GÖ©iÖï£	&CˆZàà%/\"’wrvTOà^’wBKb#àÍ.4‘.M~³Êf9Ö8íCÃ7ãc¬Ğ-l'–wLŸmñcÈE\"\\¾d(i(KÍõı\\V<ÍE0È”uáiu^oYQMWƒîŸñ&Ö@câD^Mö”ÑLv£w-ñMï[=¶4w§[5•)…)RõU–ĞùĞ0ãÇ_BÓéTU!npámvï%	SU6V‰O`ÕÓn¨ x5Ü‰³‹éÕOuÕOÕÚ,P’ëm±<öãaW@·1r5Op×Vuöv”@x¯°íëór	!ÕQ\0ì‡ró7‘\\µ±B\"Œ\n‚hƒwl•:Êo…JçKÌãÃâğû/Ï†Í§Ö5 rµ#WBcYõÓBõ×p–ÑY·¦¼·_e_UGY\rÖ“p«UW±u¼± øuè’JC×V7Ùut,·‘~Wat—d³FÁªà[p¥5|âÈwîç×ó°«bí¹2hùãAe ‚óÅâ¤î¶«Pz¶ó]–÷‚È }°ÏƒX|Öt×Â¥v½\0˜2\"J·VS{÷:xc~¨ï‚øE…ª X‘7É¸C…\r…ä?BNvÔ+T1ƒÖåB\"q‚˜“v\$7|÷}HûuG‚gl¸{p7ú<8´x˜¹_¬DÕMoC‰—<,ÊH/U{¸¯†V[Ã§xÜ³V
€¸OŠ–åŠÕ+†ÓføÂ~WÑGK›„Ø%1C”’x!ZäotkK†(XQ´ŸøÑ‰w±B!\räŠUï6ß…÷“™<Ê˜£˜§†l~cxD7:\$ˆ_ux‰óÂ'äªJ%†¢D¨Ö}¨]Â›U€£rÇóĞ!j¸¤B‘˜S±˜’±['¿5c`VËD‹—7Iqü´†\$~ËÏ˜#Q,(?\ng‚õ‰PÙŠ©9¦·RGQXµ°…R§Ó÷'cb‰ä)*ê6i¾\r€V`ØÔ€Ö©
¶StNKÂa~íp	dWè>5.=%1“hWÃekã¡ã¾BCAy\\“4•} @\n ¨ÀZ Œ’@9’-È?A”¤5µ\$9õ¦B¦”E‚M\0r|ÍV|³§_È±\nÙFTO;8ımÑùdçàJäVcê[ù«=3³ s5òç6,§QkÒBóÎCz¸;ëÄ³Vÿ¢‘²ç°ob¡NBîÍ2Èî¢‚]d‹”Ô–‰û=ˆo.¤¥‚œer\"!63’VH.]¯OîæS‘t³r–„Cš›GÎ`_ËsXkBÿ›;DÇ”¡• 
¡n(TıÖ+©›RŸèU¡x;>Û_BcjÄK‰3ç;q§ûtXdù[Tu’•Gó¹[ƒ´Å
Bl²QUG0ãŸMê5¨H=6v•Ne6Ê‡Je·‰¸ùyFÂ¾IˆNqeÛ	3Ù½h„Ÿûİf†1'»ŞêÂ\\ 1zèCo;!G§ÉoĞÁP¤cÉÃ\";•)û˜w:Ä+YGc…kp«3ÍDw”‰òã¾b­½O’éôû¡!gHñNU2b+ Më¶Ùò8 ŞÄÄìü|hC…e£‡X‰\rè	
jQ;ËÁf£wQ™.qG^E‚/”¤3–´)À";break;case"es":$f="Â_‘NgF„@s2™Î§#xü%ÌĞpQ8Ş 2œÄ yÌÒb6D“lpät0œ£Á¤Æh4âàQY(6˜Xk¹¶\nx’EÌ’)tÂe	Nd)¤\nˆr—Ìbæè¹–2Í\0¡€Äd3\rFÃqÀän4›¡U@Q¼äi3ÚL&È­V®t2›„‰„ç4&›Ì†“1¤Ç)Lç(N\"-»ŞDËŒMçQ Âv‘U#vó±¦BgŒŞâçSÃx½Ì#WÉĞu”ë@­¾æR <ˆfóqÒÓ¸•prƒqß¼än£3t\"O¿B7›À(§Ÿ´™æ¦É%ËvIÁ›ç ¢©ÏU7ê‡{Ñ”å9Mšó	Šü‘9ÍJ¨: íbM
ğæ;­Ã\"h(-Á\0ÌÏ­Á`@:¡¸Ü0„\n@6/Ì‚ğê.#R¥)°ÊŠ©8â¬4«	 †0¨pØ*\r(â4¡°«Cœ\$É\\.9¹**a—CkìB0Ê—ÃĞ· P„óHÂ“”Ş¯PÊ:F[*½²*.<…è¸Ç4êˆ1ŒhÊ.´¸o¼”0xéÃÏô35ÓØæï>Í+œİÌ©LŒ!¸“şÊ¢ÿ7C­|˜&\rëˆÜè7ÉS†âTyc*ˆ# Ú´¾ĞèßOP(á¥³‚2-Im*¾Rc¸Ò:Jc¬	A#œÂÁä841ƒ0z\r è8aĞ^ö¨]Tãsì-Ã8^¼…ö\r†9xD¥ ÃjÜ‘-#2Üœ¸Î xŒ!òh+F\rÃÈ=7ôüF4¹ÀSË7èÌÀ:Œc¢*°,\nÃ¥M* †0L#ß¶’¨œ:Œª<´ÊÌx®”­
UŒ\0Ä<¯\0NQ•eˆÈF\rƒ¨ÛGæg/8´S\$Ã%8¨¸Ã_=H+ŒáB Ë	£d;.xæÑÍØŒ:è1-µA±L¤i&Qk4˜e6ç9©*‰÷\"òÄ(cœã³;ƒ(&<®í0µWc®S/ÄöÄÎFÕ&ê)»ú ì=7F'.j.)Š\"`u`ÜV™jøv.•RSüKPxn-ˆ)8õˆlf\n9õÃ+Öv©Í)?@=\n\r#L„Ä´’’­ÉCv\";ØŒ¸Ç*÷”¥&‚kÚuò«)d4‰qé”B;šAó#PÎ«DhóˆÌo˜ ©7lÓ8”¤CxÌ\"ÚFGÙP’¢G›J›\n¼†ÜpZâDVK35>¦KHsBÉ€à†ÎKIÔ½l«àÊ\n˜)&LŒ¸¢ôK˜i_†¸á@@0ÅI@OdĞ*ãâF—q*C „*U²}²Ÿ#Å•,c:²VZÍYëEi­PîµÕ2¨?+uo†à^Û\r{^\\Àú0bÔ¼×¬+…°\$á#F\nH(L™–ì[Ïò8I±Ş‚\0ÜÇ	‘€/Åà•.\$¹€p\r&1 œ²|QYËAi-E¬¶\"ÒÜKyp?òü¢òç`ùã‡BÑ¤h ĞŒ\$¥x`P '!­v ƒìåNáú¡ˆÉ0c~gƒ¦WqÀ\"5Úñ‡¡7¯ô®ƒa,—„lûD”ÊCfˆ	‡8*Kd™êì4ÜRQÂ‘‡p4—30cÌñÁ“È’‘SÂ×â˜ÈŠOÌ’4@P á½çâ4\n\nP))ƒ0æG
CëFGm0˜ˆÍ1xf¡” r4Œ#ò­.s„;œ©–}—aC”<0§D¯`n\nø ©ÊC¹0%òÈ¸,ÖTH©„mCe†ùh^‚S\nAê b\nyp.YÆ¨­‹É¥7ó…º„ÜK&³QgÅ4<' \rm8¬K\"~I'É\"0ï! KuvÀíRBª:!*a4	\$L<™´:À)\n! 4ØÒíH!¶\"Å•´J©zMdv *jjxO\naQ[×rG› 1p8¡Õ\$´¨z0éœ¢xú	k6o(~|È´îLkŒ5\rÆ…*Ç
¥a4U©
Ê`ß[PäÁàÌÄ\$ğÁZ*P+XHŞA'\$h3Y2¡VÛ3„jO \$6 Î ¸óÔ İ`‚Â U¾¡\$-¤bn°B	áH)_âêCŒR—Å›#b-‚0R\n¤‚ÊâŞÎ!qaAğáqÑ3`1f4İ˜@J‰Lxb˜œ–ŸàÔsÉ±åCfíÒÇ×¯GÚ	n1Œ\$0“Ljİñ%xÊbF¢BâN!¿Æ¯YÔ37déš€É¯Ô”)@àCˆsIYE>U@‰C\nÇÚ6©X¥b¶QÕ8Tä
y?'¦fÂTVa‚ôNt5]Y ¥\0¤µyHËgwÊ#w¦ Âœ2oNR™ØY‘ËÆÆ+dÄ;‡»Sj}xRv¯³•vNØwKá‰èbú†lÙeĞº³~˜µ[2n%À¼´ÖZN{ªaæ!°âHögÉíFÏ–*Ìµì%T9ìbÜMCuò\$AÂ[Àæòw¡‰®I«½K<°r)ÜIĞ4WÅ“^¿Q%¼ç„¨/¸HÔ·š—ùbUr ¤ÄÔû×âXCROWËõùµPCÙH/+l½ï™`ŞË™O\r|,ìêğd]ÀC5È[†<NKC2wl`¸¶TˆÔ¸¿Ì1Æñ<øy \"GäĞÇš”tGÜ‡\0åFı’†t‘fU¬&|\"óœRóqĞåÕ#c!ÄëÉÃyäŒ¾Å¢>FºW:ã<¬tşE`\noLyMí¾™0ŞŞ5áyD´¨fÚ©mÈCÎ!7Y€y'+—AÍe\r³ÂmEõB×‚UICu½ˆßø¢è0œ#h¿-ƒ¿q+XòYiX1æH|\r¤·´Ì¹ÒYËc	&1÷ÀC2”ª9û—ûÔèŒ?³õÜ9óÁ“í˜zTz~Ä¹èyğı¾®øÚš´´,ñp>	µ¥Œ¹´õ³òäá1‰uÈOdö`p•„;È´¶¼oÉ3À%?›ı#´ÿ[g¿eu¨=S¬iS	_PÉ±™†ròÈn­bĞlC€Pœ'\0Ã`RıÆôÉl¤POˆCo—Ì‚#C*Œ |Ê0*OŸgLVì„ù-vùm,vÄ\\<¾E'réÇdöpNwPHbïf	:yî\nå–çn6å£&ö¦Œä,xª.K ,ªëNšã\\d.æ0†¯+ÔØ	ø½ĞRÈ–hù\nd6–F+¯¡
¤ØP]æöD,fäBCÂÜÖ‚ô8&êŒÏ,—‚ô:Ê¾§€æ]BöG ŞBÂ†šd^ iCPÖ/&LDŸpÎ½ğë\ríp8„âO`Y*Pk«S­‚.ñ'	‚‡\0ÜFP³O˜¸1-ttcÄm”†¦k\r\rF|9orú\rIğTø±eĞ=Lœz&#ÂjÜª0±kN†ÜÅ
päqïQJu‘Œh±v7ñ¢pæ€lãÂÒfhà1\"X8bJ\$.Ör¤F>Í¼\rêÌÜ&‹1”x1ĞÜOña­¾0qãqšöq7è*k©ëi
±ÔpíÒ¯†¸¾g £Gñì;q¤ÿå(jµ\"*ªàèXã.±Øùr.c‘)28àR3ğ»¡ 
Ï#)h\r\$Q(Pr!P¬ø0õ\$‡%ŒgR'#Øšlc“q•'ÂS(ùN‡(œSĞ_&òJu’•(NlBU*%Fã¶y—MÖD²6èrº'²ŸRÃ&Âh	ü\rüWÂäâŠÍÉJÜveì¯ì´MÅÿ’èÛì´Èó\n°É2æe#\$ObP.†³%gmé²æBfâ•…1ğ3\0†L\0ØdÖ0ÊúD…\"D#'â0õ@äœ\"iG \r¤0@‰¦„ ª\n€Œ pòc†0bÔ&;	„æîõ	o^ÈBH ° æ¤€#®pmÑ„Iì@ÆlŞú­t/hĞÛe8ÃÈ¥Ñ„òm¤RÁ!õ4‡d_eú	ƒ\n0­¥ÔÂ#øÃh<'€ ¥4J¤jB‚öNøô”Ä¾9à˜D&2#H| êğ».âÈ¥	
ƒJIbôŸtøâúëªª\rB	÷&Od/Ô,5#<M©x2J8ÅNMöøT#Æ\$%D0uŒnòböĞæ®Ocvoì4pL˜wôlp'\$M`0dâ{dÄ>#ãö“xPoN¦lÃ áDOø7`‚CsÈ7m!ƒü7dµ'ãvôéÚó,XC„ôT&UDu ŞÄæv‘CM#ìâŞÑÒ\\êñN/-´£ê%…Õ2ƒ©HÆ@	\0t	 š @¦\n`";break;case"et":$f="K0œÄóa”È 5šMÆC)°~\n‹†faÌF0šM†‘\ry9›&!¤Û\n2ˆIIÙ†µ“cf±p(ša5œæ3#t¤ÍœÎ§S‘Ö%9¦±ˆÔpË‚šN‡S\$ÔX\nFC1 Ôl7AGHñ Ò\n7œ&xTŒØ\n*LPÚ| ¨Ôê³jÂ\n)šNfS™Òÿ9àÍf\\U}:¤“RÉ¼ê 4NÒ“q¾Uj;FŒ¦| €é:œ/ÇIIÒÍÃ ³RœË7…Ãí°˜a¨Ã½a©˜±¶†t“áp­Æ÷Aßš¸'#<{ËĞ›Œà¢]§†îa½È	×ÀU7ó§sp€Êr9Zf¤CÆ)2ô¹Ó¤WR•Oèà€cºÒ½Š	êö±jx²¿©Ò2¡nóv)\nZ€Ş£~2§,X÷#j*D(Ò2<pÂß,…â<1E`Pœ:£Ô  Îâ†88#(ìç!jD0´`P„¶Œ#+%ãÖ	èéJAH#Œ£xÚñ‹Rş\"ÃÃZÒ9D£ƒ±ƒ\$¾½ˆ(\\¿ )0Ş7´òp¦÷³rr7ÃrL³Á/ŠN3pË:\"Â`Ş¶\"¬	N
xë òú†QrP9Ë÷<?Ã„\0şŒ#ÆÂ'NĞ@ßµk“îêĞËU	T	,`@7ãDĞ3 ¡Ğ:ƒ€æáxïg…É#¬÷…ËHÎÂ|Ä×xD¤ ÃjÒ”¡C2Ò6¾£HŞ7 xÂ&¢²FŞM²üj'8*“~Â¨£Z¦¢,âjúß²I Êş…°’\"ŠòÖª7íŠ_ƒ­ü¡­@P˜Á7èHä5 P¯&ĞNÒ, ğò¤åT:,â³Äê.ò<8;’ô¾70ÒmóK×›6?ª‰\nH@Pˆ2§ã®ˆ2C`ë»¬’/ßÉÔïAE˜Ú¥iB|Ô³²CF•%ŒÓã,[2ê# (\r#Hä¿Å	Î`•\r#XÖ£.\r…ÀÚpØÓ.H**1±Œ\0¢&¢ƒ¦…;cuòŞGC\n\"Ã›˜Ş'êhÜ¿áëõ_9Qit¾b¬Ã‹_øÍÏb¸º‰Duf(5¼Cha’«_7	#l\0’B*sã¬ı˜@¡¶
“Çzõ(”!0m'oú°‰6IJÔ§ñ KL0£ÃX7k_‚kÅQf‰'2¬¼š”ã0ÌFÉëóQäp—\n@Øo‹‚w8¦0<¼÷àUR¬Í8¼@7à¯“\r!œŒÒ†É\n<Á” 0R¼N &P\ri‘Ñj‰é…(È·“@¹•Fr€€ ©âz•ğc]dè†*€fÅXë%e¬ÕÖŒ>Z‹Ylà^~]0]kxE…Òv—jï6Š±u.²{R@gAeQ_ 6¤{Cd4=©¢¥\"bC)5&æ÷«¥¸Ïpx\rØƒå~°bJÆY
)f,å ´”úÕ:‘Ul>ä(üVòàx¡À‚³°éAóë8¬[sOİà *D¨÷®‚zÏ#‰Œ­rV¢H@äéÏC§ÔªCBRªbÑíV¡±Ã—9X¡ÂoUá˜Ö*…LLpñÄ¶L%li›1)|4ĞCài&AÌš„R SËÑx#(P2ã\0ŸãhqH@Ñ‘ÃNÁåá \n (N¤&…cá…J…\"€ †ºÉècf\nºS‡@h! TäÁø«æ oò¸6dÑ*ˆû@j®UÓ\\¹pp<ÑùÈ\0îYƒh8¥­c²ã[6\\c›6½.‚¦S\nA6 £ÚJÑQ†aÙsÇCvcÑ8'K ØRoˆb¯IS^¤2	çù£¸6ú	¨I\"äË*WE•!ƒ!sbŠ¦€ãOèf>!¶E%AIÏhc&º\$i	¨P	áL*×¨k ]5ŒÄnq4öŒ«\rFj ³Vhæõ+y.&‘4YçĞJƒ@p¦\rƒ C)[\\aí51Æ[›ôhÁ\0SqğÜÑ5	Ä0TŸ©¶U<f×*«Í{\"³ÂÌ\$ò^”mÈ1À¢ğÎƒ(yKER6f\$[ÂxNT(@‚+a¼A\"„À‹z{32ê“·4›6Ój¢Ê\r¹·ÖşE—‘3*ŒiHu^H<˜BVÚpQæ7äÈ‘`ò\nòC*è\r…ø¸ ´İ/:ŠQ„ÕD§7U[ã1bÄÈşßó¿>W‰2#QF1¨ô1&zÁ@ø¦¨ÉVo¢ nÌã‡Z°öW›€|iõ­.°túÕò\rÂS¦}ÏÕÄçhlÉå À)\"S5\n‘TËdX*µ:ÌÍnìø.e¼¸æ´j`CÓ! ïÎò
B‘éİ†G€)ÓÂcOÃ›¼Ã!†¨ÌÛ*s‰ 4!”;¤õæŞ‘o	&5¢ÇJoÈQ'%ÕDLFúõŒ\nÇLËÖaÇèÁ.xµ«d½˜73‚pQS à¡0–³H’Ö§%Z¼Rk¨Iá\"…\$´ä…á:€®ç@`Õ‡ˆºç^mÏ¦¶1›ÈòrxiP\"…`Š‚ SKX•¼ìq”Œ4¼áP „0+º\$4¯î¸4SşÚèã’ÀîP£åZiM\"‚
VßE©Wø`nÊ2¾\r¤¿gÕùóÂXuËeì%ë§JŠ¢&¬µ oµ]ŠŒ[O\rkäĞÕùzË(““;T¯”bÂËÕ`;œàğ1²NOˆw\"Å0‘ÜHI%l’šºa?J%\"Üa;êÛœn]åõ’Ô²ß_;§–›÷B[Â€eŸ,µoâPrOU`„gEv£X}tàA7ÍJ570êfMÆ¥c¤½¾–|õ‹áo†%Nr\0¬Ë;&ßSñ\\CÆ„¶ìÈ)¼¥±Îu›HoTæ¼¨ïe9z\\43uÍb¶qŠ£ ôşÃúß9rÇ³õ7îúãLO•ÓÎğ§&kÄğÚQñ¬‡¨V`ØÚÚ„I¿?&µËì€J—Õ#—Ñ˜üotš'VAêzÃÛèÏéCòëğ¢™ìÍ…ã8fG¾Ü‰ßŠ2Z	×ór(ÏDónlÅÏLN ruOşõÃú#Är¬‚åĞÄPöÎl/sìt'G\\_§b#Ô¬Ï…ï†g³F1\0ïo\0P6‡´v0Mdî¢ö\npW°\$õâúöN8ç‚şÇ„ğÚÂˆ4Åò!†öı\$âã	ÚãhP« Õ‚9¬Zô°R¹Ğ˜ÕK¢›Ë°lö.tJªÕmU	ïÏ\0Ÿ`~k85€ZH‚tXã6=â¨–£\$.ÄB„H]ˆh0ğsĞğ±ïàe}\r é\rã¨ö'ÔIpĞcŠøÎ.Ó\$R¿e\\4\$Vâğ³	m‚uÂÔ]—	¡jÕ­B€Z»ïÀ‡<jf;eä`Ä¨aF0´?¯aOOª²a&a±f!¤êñp%1u1{ÏNÜÍú`±s0\r²MÍû\n|Ïn®\nq8Ë	
1¥£Vôñ¬´}0Çqï\"±®slrÓ‘ @ç\"\rºÛà¨Üf¤ğ ˜%ñ<\0’àQò±öò&†ÀÃyñÁ\nB˜ƒÚzÅPPPêğxÇÉÚ`ÖüÃİ‘iîu\"p|T¥ÂöÒènk ]lˆuª!²*vLnß¨&=2N\rÌl5\rû%r(cPƒˆd0°şR‚H7ò!ît	Rƒ°^ôòŒtÑ¥°pF9ÍLJ°oÿ²\"óò¯\$2“\$r¢F&ny¨,âÕÁHÖ`Jr‡’:×bOW±¸êìÊ°Òİ-2‘²¡%Rîo²àQDk­w,í{/\0PØ\r„ØŒQ“ñÂE¬\$7Ò±(NOó\"Ârã)²92£Êİ2…on:t	\r`,ÉÒ\0 &ÌÚ²IÄâtl0ÃN5Ã±1Ê 5€\\,Ì*%6È‰7qeSrêà—’h	`Şÿ6nnìt7F<dW	Mš:o¾8£îldÂ\r€V\rbfb„Œ!¢–·±°?©Œƒàª\n€Œ p=ÀÜˆBJ;JÒ¸Àä\$¦öe®ĞPÍÆ ÆHZu/''¢lË\0ÒÀòàŞM`¢şJøëö0Q\"İC’Ùj ÆÉn\\J>V4E>ã¶	€ÊlÎV#ã·‰\\d ¨_&&ÖCLiÌ2ù ÍÒ0ı€€Ğd\nÍ
¬d+¾ÅAfêÁn®ö”•#1ÈLÑD”Œ#tõ4#Q¦Åï>|â3#6¦Ä( `àfNÑ\$OKDˆ`£XE†ÅÌQÖwC”“i:BŠ¾ú§pQK şëşOÚD&øÿ\0VN(kê\nN2ÑÀÇQFÃLâLfbÎN\"dş W9†x>-<úäÛ*Ô…HMI¬\$4ÂŸ0\nN¬xCÁ9”ªc ŞO î-CY(üÖcŞ3ê0Æ7ÃjÄâ\$^+¼w‚Ş	\0 @š	 t\n`¦";break;case"fa":$f="ÙB¶ğÂ™²†6Pí…›aTÛF6í„ø(J.™„ 0SeØSÄ›
aQ\n’ª\$6ÔMa+XÄ!(A²„„¡¢Ètí^.§2•[\"S¶•-…\\J§ƒÒ
)Cfh§›!(iª2o	D6›\n¾sRXÄ¨\0Sm`Û˜¬›k6ÚÑ¶µm­›kvÚá¶¹6Ò	¼C!ZáQ˜dJÉŠ°X¬‘+<NCiWÇQ»Mb\"´ÀÄí*Ì5o#™dìv\\¬Â%ZAôüö#—°g+­…¥>m±c‘ùƒ[—ŸPõvræsö\r¦ZUÍÄs³½ /ÒêH´r–Âæ%†)˜NÆ“qŸGXU°+)6\r‡*«’<ª7\rcpŞ;Á\0Ê9Cxä ƒè0ŒCæ2„ Ş2a:#c¨à8APàá	c¼2+d\"ı„‚”™%e’_!ŒyÇ!m›‹*¹TÚ¤%BrÙ ©ò„9«jº²„­S&³%hiTå-%¢ªÇ,:É¤%È@¥5ÉQbü<Ì³^‡&	Ù\\ğªˆzĞÉë\" Ã7‰2”ç¡JŠ&Y¹é[Í¥MÄk•Ln¨ 3ûêX¹K¢#) \r*FÉÌj/©l½ÃNä#®é¼©5(ÆŒòZÂT3úC³TšËV–2zK3 Ä( ŒƒkÙÂ°¼3\rÃ°üB#Ço`ÏbB°t!	Bƒ¸Ò:\rxë!F9Ä±8X –ÈĞ9£0z\r è8aĞ^÷ˆ\\0×5ÜáxÊ7öİº9xD¡‡Ãl\n=ƒ46ÁÃHŞ7 xÂ9QìĞÁÈ5šWU£¤3dî\$¨jBÁÇì»ŞåªÒÜî3MÓ<Ş\$¬kúáŒ	D¿D.bó¢,È®0Cu”£#É—•@N‹£ç“ôá¾òÚÂÀJë\nôˆ•²Òhúeíë'Ì3®ÌÉ!²_d\nâÒ[KQô€“0:zV•j‘úÇD±Ë\$D#¨Yc01¥::€­40â¿ºŒnªfŒ2£æyâÀ y¤™+¾ï+®B'i	Tüsº°óyŞf›´/Í(\nbˆ˜ÀĞ*œÀÌ îƒ¾íOÌw´Ô±s­Tã}Î]'™Ñ“7|
)â¶¹*GIxŞvÍŞ‘•:¡à?“íÛF)_?.q?iÌ¤2“jÎ¬L:wåJ“šìêï¬”*Xàˆ!zja¶âû˜HsB±\n0@‚0n€pÀˆCÀt_k%‡¤‚:çzWK!È:Ã`l‰(¢*ÄÜ®t˜Œ‰vg§(Á«Âi¢qG*Â\$Ó† Hñ)x„…\r‡ 6aBhÆ8Aaı{¾)É]z–ÙXŒ9 &–RWK:ˆ1ğàAC£>m!ì?ˆ-.\"Dh‘‰\$L%q=E’ì1×†äyœV0qEa%JÑ&€ ¨\n\0C,(9\0ê²Oh W\nè7 u¾à¨iŠñp‚Æ¹W:é]kµw¯î¼×¬^áÉ|¯°^… PtaËğéPÃOkbem¥d¤ŒÍÚ=E¦Ü®¢a!*êÌÉ»btß˜IÊ>©2LA>¤„“„êªÍ¢RÄ–3×â\\‹™t.¥Ø»—‚ò^’1‚åğ¾—ä‚Aº\nJÆÙÜê8d(ÄˆK |ø§ÓÇ„0šp%jŒSïÅ+ò\" H:0‡…[æ™hq3T%@œ*s0Z£ğhB‹U0ğ@´ƒ`l‰\n !hehÁ„3A)\nÃªÆY˜:Ò ØÃ9ì¤ëL4¨… 1rI0İ*ƒl‚ÏÅ>5(¥ˆ\"ŠLMõ:2–u™Ò1)åqÆ%¹‘âP	B\\PÒwD	ÔAšä 0R“q¬Š¢5§¢€Ø|rªD‡@Ş¶ƒi=p3Ó%´ˆPÌCA½lR” LŠ@ì!­æˆÖ8 ¨UÑààµÖÒ\$DÌ“†€Òê*ºë¦•¡KHÃ‡µü)… Qƒxk_qf¬¦„Å6HtÛ8SMIª.I“¢ğø¤&›QúecdÌ¬£ˆ°ATĞN®Å/My·0Qdß3µ­›¶¼ªãxI#Aåk!Y%dĞâ\rÍjY%ÈCªC™†Ù(UåG@¡Ÿ¡:kÊ#±§(£·v4öUšdSI1;\$ ùnIF2U…U‡HBïy\nHÅ’]ÇšÙ	‚G›‡ñ#4\\RËI'Fñòö;İ1=Ó6)º×&äqZJ+ÄáÖ„ÌD¡Jõa½uˆ‚½B0T­—1¿‘6¹•\rUÔ!Wé“Uãi]êtŸEs=vPn9TTD`Âp \n¡@\"¨s¾y&\\şÇa¬ûiîÖ¬3§â¦Ú?Lh­š†I>_CŸ0„Òn¸“È™S£?D~—éD\"küÔfkyõ\rû'>\"R?'…çÖT*\0‘•·¨üë<X~¯Ğø2šçØ©QGñİ!hø”õõÃy7og=]o°ÕaŠ?4h´³r½ÜhGH*ÑlyZiQ!¢¸”@`uŒš©<%U´W\"’B'Äc#‘UåêâK¼ØñaG»¼¡Çy>s©‹MŸ„‘æòéÔòYºßp”|A«µSoHUÍV]MfşY&1×Uk^±Ö>W¦Bngœš(›ÎûßVß\"I>%™˜îâü%Ç|Ó782¢İéÖœÜí™ö´TÓ^ÛIB;š4é¤£G=Ó}\"+¡µy®×“S\\+S
MRtØºÓ2ÑÎ¥
‰óÁâX—²÷ØáÔÕ[ÏÁP „00 \r(ab.Kğ°Q³*££D¦˜¦ÊÄY£òÙ\r1#iQÈ¦4îX|Q1ŞÇ )Ç¹·ä2­ØŒíP~êTaóG“¢›CzëÎh-¥ùr
˜	_¯Æxü{§ãî\\|¢ÄğÓÌ}Ë—9/9%:K“Mrô™˜šmJ”nIø‡¤6n¦8~Ò\\ÅŸwŞóŠ4g¾v‹ˆâ ÖMÉ™œ\r?¿‹„	•cóküz“ÒMZÔ¤ŠŸLÑ‡tè¦`O\$šã­¼JêÂìhô¤±\0ærõƒ&‡¢ÒÃjãoN›ğ 4<kÌåç,ãÍŒ÷ƒ‚âr;OíGİîÜ»p:Ñ§LæäŞ%*Åæ63Œl‹æÔØ„ èà0d¬ÇFx\$¦ä4Ğ‚¼dô&ÎlPğ4>°„çÍHrM&ıv)nj0ãÙLjc|æA^æ†œFÀ@\r(&àRÑÿ‰ÔÄMgÉhÑ-ªØ\r¢~„~úbHvjAí®íÂ8#ùÜë\r ÛJça§˜ä%Q¡1 ‰pW±&%q*lĞ¶k±j)J>‡0)ºÔ°rdd¸¢*äh„ŸoŠrçœºğè.Ê+ñRkî-ïˆÌÂh–÷ŒØg¬àSL¡PB¤Šynš,CS§‰Réq\n\$}pYQ ‚T2Ã¨lq@yoR¬ÌhP\"vJDap˜!!	èR¯À®˜Î\$é1p!cúìöNc´èç
­FÎXÇî‰
NŠíOy!Q<Úq1Q.ÍNåÌÆg°Y!í1²!ğE#‡ënß±¤ç2DUNc‡—%&6fÏFF1>ÆúSæâNá\nIh|?a°\n,+¬8Œ@ÓQN8’4ôñn'?r7i­\"d¡!²O§œè–ç\"åÄÄÑ§µQ1*£Ë%rK+#‹+p\0¨àË§>ÒjRÃ\r(ã”1/Ù\" —RépkÒ¤xns.’Å“-ËË.P¾<²Ipÿ*hØ2f©*†jlæóJ=RëN¯2²¯³0ÊÓ+.Ò£1rı*“<4S+óJë\$Û&’.~±æS2Ê‰sl3c“F7ª<rOO6ŒsÒ½.ğßĞ›„ÔƒQL2jv¤üğ¨.ôlYÑJiprÛÄõCıq>K¬3‚‚TE@r¢œS±^ÖFS:c~5èÉ-\"W‹ÌòhBg4 ‘„0DÃ¬ß3f¼¸ò.¯`7
@ØlµàÖñ\nãí9>Ï'QÑÀª\n€Œ phãxïA,Ï4\">ƒ]C‚·\no;ÊÆmÍ™ç-ƒò'Æ[Æ»ÆæEm‚÷óûBƒ)RôşÓñ3o(MFÊ¹ô*éôºIš˜ÅNËïV%i«9g<‹ÄêÒGR.,8”˜ËÏ¢02é'p|çğ\n,æJ}p<&ìÜõŒÚT÷PF}ô×-VúñØğ\"8ÄîŞ°-NõNrP…MDrÔÌ‚ÛçéMğ½N&iMlY!ÑÚêC|ÃVFïD´ôçÂÂnM&r£ˆí‡(}ô…\nâu,06.6ïCîzÑôxy’²vUQKœŸGáZ1OœÃ°&éç5'1şöÆJÄÌq
­T#ÍYQ	wG‘\0UòU(ÑY-Huúº5 ŞÄë‚T½<®%5f-ˆø>ceHeÖ'n\$`";break;case"fi":$f="O6N†³x€ìa9L#ğP”\\33`¢¡¤Êd7œÎ†ó€ÊiƒÍ&Hé°Ã\$:GNaØÊl4›eğp(¦u:œ&è”²`t:D H´b4o‚Aùà”æBšÅbñ˜Üv?Kš…€¡€Äd3\rFÃqÀät<š\rL5 *Xk:œ§+dìÊnd“©°êj0ÍI§ZA¬Âa\r';e²ó K­jI©Nw}“G¤ø\r,Òk2h«©ØÓ@Æ©(vÃ¥²†a¾p1IõÜİˆ*mMÛqzaÇM¸C^ÂmÅÊv†Èî;¾˜cšã„å‡ƒòù¦èğP‘F±¸´ÀK¶u¶Ò¡ÔÜt2Â£sÍ1ÈĞe¨Å£xo}Zö:Œ©êL9Œ-»fôS\\5\réJv)ÁjL0M°ê5nKf©(ÈÚ–3ˆÂ9ÀŒæâ0`İ¼ïKPR2iâĞ<\r8'©å\n\r+Ò9·á\0ÂÏ±vÔ§Nâğ+Dè #Œ£zd:'L@¬4¾Ã*fÅ A\0×,0\rrä¨°jj%-ƒ”*%ãk(%‰r`¼AS×¦#Jl–Dp+pı)+”òMM€È:BBXÙ'ƒ€ò9-t¿BÌNâîÄ##îLÒ‡\0ƒSH5Ê\"@¿°(@4ˆRy@sğÂKÎ\0æ‚¥#“@6Óa\0xÊ3 ¡Ğ ˜t…ã½œ\$ôÚæ\rãÎ®ázWö¨È„Jp|õ­ƒcÖã|šŠÉcNê„	C'EÍs®Ğ7c(Á´HèÜ¶\rcÌÜé­·âR×¶,@ª:Ã*õ\0WlvÓÂî¨è†Œxì:!.2”ãl@¦„-(<Æ‘«Ï)&O|l ´R“ .Éã£H†!°ßˆİÃ£ªÏpÖ¢E‚Î3ØC>f4Å”UôÃ3òúXå	£Nø +sš2 èÔô)BÀË(”n)†\"‰[Œ—Ğ–¤W\r‚ı›-‘¨ÖôåÉ°¢&¨&Z­È;”¹³ƒ#µ3÷A0÷Úqƒ¸Ü3ÂV£
²©qïï*Ä	ìûC¸âïj˜¢b(¶ú&s
âü³Ğã”*	o;°Ä éş†ğCRõê[#Mrœ×³|¤\\Ö–Æm›0ğ«w†Bè¦½b®E—0åœ #¢–3Ó˜Ê¨JóÌ2„¾£,HÒ4ÕCoN«TE\"˜79/sEƒÃ.’Ø”ša('!H¢ĞğE\"´)\$|Î“†âx•S\nmÉ òà_Š²À\$Å?xüé~¯İü†çöG_é©€¥1@@ó”yëE\" `Mc0PÑAccM˜U\r„f\0›ÍPûø#AÔ4“SÈiÈÌ\n=Îù·¼¦V‘:-ŠÑŸu|°ÄXË!e,ÅœÖ‚š.ÁÉj-e°y6í\"8%ÆC@d5Ä˜µ\"‚†
¹«!t.¢jbYï ¤7sŞşƒ¤\n…ŠCw]Ì#>È«úo\nº!#Ëı‚bˆÑ,_
a¬UJËY«=hÆ¸ÚµÖÈe À7!’˜¸TA¦„”ÈP|ôAjS\ráTdÙÏŠ\\CG)\0ìÀÌ‡‘\$n?™´@¹œÑ¤`‡0¶ÜNĞğs0îª©œoW) .ñIOX”P`Ê^…ï×ä«Ë{Š©ÜÖèM4Îa†ğäš— @„Şt&<KìÓÂ¥>ÎİèP	A	<Ô-4Ï 8©éE@S×-†™NPV8e.Dh\r×‰¡ ‡ªPı<'„~kŠG½(•?(&\0Ê²‰I)ŠÁ™T‚Øø@s¤€¤ü¨#¨„ƒeÊ«‹Ë(‹±,t¶’\0C\naH#ÖÂJQÒ(À€&Ãîzè{24T:·.¢qwf’¤µ²„]É‹1l\r4šàòOŞ¸y®a-vÏHãÔA(Î=Ú]©P¤\rÇªA05CS@ ‹­\r+IÔ­¥:¥½Wß;‰Á:@'…0¨
W•Œ…ĞÊ[·Tmròq©\rZ‡;,GlÁxd7`ÒÉÉ\"eÊ™‘—Î£õ\$ç[™ÛûäL¥`¨Ñ<0Ğ ÓbHD¬#[\$¬–’òbKÉMd.lÍ!{şÅÈ%	8\rAœ„à@B€D!P\"àĞ@(L¸Q=¯yäOÁÈIÀë¥4’1\nz\n\r¬‰„,ÅHîÆ¨ê“—nMŸxr¸€‚Ç¼¢&e’Æ;O„MŞQ78ª9W4°•¡·bcšT'†ª”ØĞWƒÉ!Ö+Œq;:¨‘V!§\$şËùÀ\"Š°Ä<2\\¥ğ:z6îÑÔ)GÎ­	z/q.ÄU*h¢¢v-ˆÄ¶g\"œêUÑÉ1ÍÏ4ƒiÙZNk!Í“.Ò~h±T<nİOd¼›&dÛğ:1úHb†\0ÀŒrôŒè÷^Csqšl]Æ*½bÙÎ©“15Ù¸²¸ò¾œf25\$‹t8IÛî\r\$¬Åà}…)I†ËHhdï¨ğóQhy;EQö3ƒYøR‡¤í’V±ÑÎj—‘ËZP‹õÖ\n!„‡”µq±à´4¼£ÉxyßÅ\\ ÚÈ–wşyQçIŒ\0^8i‘\r,uŒñ-À`y‰/ä4Ã8óÇ‡¶¾À\0—Æ8Ô\$‰|u/ş?Êù âDî†’ `ƒy¾KTÓ½yÂmÉ¬`<+ò¸7Ğ¹A®åE&“iÖiÌCdAC™r;…qr*…2ñÄ•ÿq9¬©”w×L:ÒQ©Æÿ'”¡ÆU²LE&†şÁÛI™µjqÀ Y|‰*Ù«·s­÷EtA;ºsğ…=“~xÁÏ^­\n\n?^q£ëY©wFëÔÕ`céYRÓ	 '‚ÓDLvß8¦ZµWáÙ8.S9/_’–v€_¯#Ê¾×Ø  †Íê1Dæš¸¡uÊ}ìàÉQnÆË):sò~&R/È4:ü£cˆÈ\n~H4“¬øPP rgÌ_\"ÕS¼RŠq	òøYŠÎeóımCìb ƒø‘f°ÖZç¥A÷&§IÖífe\0àeFF^äj(&\$nû,vJ¶Q¬©\0`Ël¤Ä+\"¯Šü )1ğ\$úCÊĞ@r&‚oşú
(œ/dM†høpV«¯¦øK\0vÉÂ8PSˆœ4IÔê-Æ½ ŒĞãÉ˜æ\$ænJÜPhæĞ„ƒ0ˆääo†JìØï<ÊOĞI\nŒ²ï<`î¸ùÌªú§S\n¬\nHiê¡ğGŠê~¤‚ ~ü&J4F\"ƒÊ¢…õŒ´Fp\n\r(¶å°ædƒŠ#ä2AğòKPöÖÏö\$|¹EhA€ĞëƒLêR@¥h=cÔeöÀMí’nm~uÅØ#Æb{6ÕmP”°Ã 0ÈÕMXÿ°[bk‘_O¨z§0”‘j=€ÂÜéù
*ú\rÌ-Ğ!POP-1—ğgj%1ˆİ,¸u±‡Iø@‚ˆf(\"`˜îÆv\"k80Âl.®2†P‚>‚X€€	NH›ÑoÑäÜ‘›Bkğ€ë‘¦0G&# ÌhÆ9MjÄ\"ërõìº€\r!²#2',TO„Ä#P	\0ÆÎ%Éza¯ğH\nr:.ìÉ’G\$²?CU/Ÿj: ×#ÌÈ1Ò&RhC&Ne)©\$Ox\n’6\$f÷‘«(2lu²‚ÙM˜Ú‘ŒùHƒ²–ó%ğØ}ò£\r1şÌæÚ2®k 1+¦Ù ‚HƒiâEªĞc]
/w -IKĞ_¤êŞ÷oxQ@æ>àÉ0~O@š¬#vÑcÊ\rƒ‚R&Ìfˆbå(T2Ì‚K‘p‰È†)‡\"èD†E¼13(<n]®˜æ'@pKNK“D‰“Haä´ó0jd¨\r€V6å’ˆË ÿp„æJÌnšëKØQ:å,ô\n ¨­ p™#(ÇÏ\n#LSäö³âÃT¦Ğtøƒü”Â‚ Æ‚qréÊbÆ#†0§#.£]<oV\$\$ÛD¿<ç')\0a¨¬5Ë¢z«È\$£Øk”1+Ç\"ğ2Æ6Q.&FjÒ%pÛ¯ˆìèR…ÌyL¤-Ô6Ë\"úÈ0ÊQÇT&øŠ¾Nìj)BŒÓ)°µƒr‡ì¤îÂˆŸğID´*7ÑïD\$¹F/ÌÌ	 ŞûxMÖ%&Õ‚&ÿMp§¬XhšaÂM.F1Ì€gÇ@R\$Q¼6î2Väô7-¢fæP¯MB3-¬€ÇEJ<3PaÅOD\nÇ‚Ñt;JHÂR¿cRìrI&rLC&/,c\rÏ`-\nŸ3düB>";break;case"fr":$f="ÃE§1iØŞu9ˆfS‘ĞÂi7\n¢‘\0ü%ÌÂ˜(’m8Îg3IˆØeæ™¾IÄcIŒĞi†
DÃ‚i6L¦Ä°Ã22@æsY¼2:JeS™\ntL”M&Óƒ‚  ˆPs±†Le
CˆÈf4†ãÈ(ìi¤‚¥Æ“<B\n LgSt¢gMæCLÒ7Øj“–?ƒ7Y3™ÔÙ:NŠĞxI¸Na;OB†'„™,f“¤&Bu®›L§K¡†  õØ^ó\rf“Îˆ¦ì­ôç½9¹g!uz¢c7›‘¬Ã'Œíöz\\Î®îÁ‘Éåk§
ÚnñóM<ü®ëµÒ3Œ0¾ŒğÜ3» Pªí›*ÃXÜ7ìÊ±º€Pˆ0°írP2\rêT¨³£‚B†µpæ;¥Ã#D2ªNÕ°\$®;	
©C(ğ2#K²„ªŠº²¦+ŠòŠç­\0P†4&\\Â£¢ ò8)Qj€ùÂ‘C¢'\rãhÄÊ£°šëD¬2Bü4Ë€P¤Î£êìœ²É¬IÃÌNÓšÂ‘Ó2É¦È;'\"ŠcËa•\rĞ)¡KqEÃœ«G±JŠ“¤s …
*IK²7Phë:O.Úµ>¼UK=ŒuC3(J\níL‚È6¢	„1\r\rğàë%Ê‹ö…¤h€Î'£\$(³Sƒ»h4 ö1Ä¡`@'£C*3 ¡ĞŞ˜t…ã½Ì5½rê%Ã8^2Á{Z‘ÄƒÈ„J |6¥ÉB 3%ÊÂ7 xÂ'B
ò¦&\r…<7TJÀai¶¾ŒèÜLŒSÇ+±˜@;@8ô÷‹§ÎDÉ,­HØ2cc&û€P®0CuŒ„£ @7Œhèç¹ş‚İ£¢Ş6Só\$(HÒÎh‡²¬€ÆÍ•9¥‘Ë3èã\0ŠÊ<­«£#&ıE´^b2è3ó\nèˆÎÎÛ°>°3ÕÓVÙ1X³¢Ó%ü¾7˜eÈ*Jà³:¸ŞùÒO¸˜–6“ ˜ìÀÈ:§Ñ²Àno€§V³4¸éh¥bzÃ¤ûÖ¾a•Rø¦(‰‹Ö[Äº7ƒäú1ù6@˜§£9KÃ…BwÒ\nd9¦Ù˜Ã#k	ƒyºÏŸÑu;Õçaø&(q+¾dTøš?Á1â(ñö:\"£°¹JÎ{ß ‹ñK¢õJ\n{ä ¡\$¨YÁTgåux2¨BItHHà’#²®|È3çDÑ†`ìJRĞF¼¾RtM(§‰Äğà§NÃFÉø„¨ U\nÖ jH<š¦`p[-M®qeÏ•ÀnE¥ ÂØ^¥á‰……q(&\$áÑ#0ôÕ›ğAMJn%!†#4X“Ã›	s†Tƒ&€@\\:HA\$%€2HÁ¶‰\$1kCHRJêØL+mn­ğè¸Wå\\ë¦=®Àä»—€/xª¹|é&vÏû`äéF,S²ƒ‚hPkYG\"¨|A ònT‹ÁS\$½\">
ñK…æ÷ÖD ”B¤êÈ%´VâŞ\\
‰r.`îºSoËµw¯<¼ ªñ_!Ì>¶dÖeaª“@ùàK4è´¼\n\$ÑÒº’PeCq²–Ä1YJÄNŠJ>?glÔ£”÷äñ‘'AQ1,‡BqA{³¬9GStÏ§+¦t1¬@æŒñ1\råôÌ¬åHO§ê’7D(Ê””ôQãIÒFóA?rÄYRw3Ğ§Ò4rÁ\0P	@+÷¨A\0(*„PÓóÉ
:1\rF6ØğéÍcå(•ô³çBOœ_W«   ÀÊ‰£‰_Ä%ŒÒyèÂş\rÁÁ­5êÏƒ¹7&ÒÌ¾-ú XHRn{óì7†µàS\nAó–T\nRN¨VE˜ÕÎ‚\rg±3`&yª\$R±T’Ñ•–e– PÛA )ç<”™9ndì\rƒ&­7vhLê‹\r,ŒÒEóNjMZó+ÁºÃ™2nÒù•uğ€©VJ£—ZÖ(äº:NÈ|qRù­}0OÓ€ Â˜T'Å·hÈRcH Mb¥Í cV÷	üñ*FÆæÅv~ç--§»äö¿9¢¦lc!¯'°Äš \0ä«”í2\nŠÖ›{`ûL]/HÌ·bDRÊÙ0va1²\0Œ)¡æš¥/£°UĞe·Æ¼”=ğä£ˆCšğÔT–(ÈÔBi,\$01º¥2Í\0PO	À€*…\0ˆB EÆ8Ì\"P˜qÈ\nK]K½Ã°Ó!–BK\$¥ÎÛîTA½'n`î¨ğ¢8Q.ÄÆ€’‚³Î¨ş22œLIBHm0 T‡ÈL'®{¦¸ü£ø™^¼¥(ˆWâñcŠSù69éã^c²TS¥¶C§°–*8Úİ
o›¯åN¿·ü”ô%Qâg²:äÒ%ã©-€Ø\\K*#¡LĞ6›é,á! ê	rzŒf}/37ê §yV‰¥¶®ä8í¾J5¡TMSû¤¢¶tBJ´o¸¹ïã\0©ªœ9)£˜0ØÚ…L`oˆ 0R¢é³‰7GEì=¬úQóù¢;¶L:Ó¼“Ôè k¿}¢RCÃÈ1l{U	Ò”YÃ!i’º×’e²İ\nÀ×Ûdé}Ïş)L™³¯,n2Ó¨~–uÆ’pİÇÏé8Uó²2JÎCS³qV(Q5-rGF‰Ê Â³D»§†™âxH©3£ Aa#c×R™Á(CtÕ`ú°C‘•7#=Ëu!gÀ¼v\"c	C+DgÈ3¤Ç]Øú6PµA¬ƒRé­\rQb#ö~ÚJã\r*\0¤mßqÏz±.ìÛ;ÈcïkY¢öÄ™,øÁŠñª•¦¥uÍñÀîN7.¦‹×İ‡ŠñÔÔy\nä…DiíFkÄwkâı'êßÈ÷³•î\n'nS‰0ï,ú‰i/äeh¦ŸÒWòM±Gø&YÇ¤›o;bPŸ\r\"œå‡±\0\nÉÔ9øW¡Š‘xÆôşi€ë>¤˜WuZlA:JÜí¢8ENkFÿN@@ƒöØìê?c\n…¢ó1à˜æbfiX—-.¨ÑŒ —‚wÃÍŠ'°3ö´?©°;IÄfJ¶Â ß&°*çVĞIğ4˜ìğ‚w¨ïÏ4±Ğ|&P€¶Æ®2pxÈg·¤È–öl\"Näq†Ğf ˆºˆ\"À g¶Üb`ÉÀ
®`Ë,”È‡R'¬
äüÔæÅ\0­şFĞ„ğaR¤&BâVàîiL~ PÉ 27\rÎÈpzÎipÓ­\nê]-İPx'‘M=pö„\r°;‘\"Ò±'ğ5	!Sç‚Ï'Â§=qÃ¨\0'±O­Ëy‡²zÑ)1Acqj¶Ïğ<\$<¢N?¢z,d¤~±Nôo‚”núøñPû`Œ“Q/€î†\$òÖí°†¤1 â°4âìNãQw #ò?qD!I¯n0ÅP²QOĞéQÅÑË1«pkR!,i­#%Ìx‚ /ÆSÀÒ5-Šõ+\$si¼J6„¥¬(* òîÇäb à\njà¯=¢•!Ÿ!JJ<ÆÒËÌk\0Ì=.<§1!°.†dˆÄ1Û3M²îß&:ó'.\"À‚Q ,“IpK‘×)±Î+ÑÒòO·²¥ño*í0bM4ddc&çaPç°/­Óâ¯É,ĞG5*a-x¦µ+QıÎärÇ.¬a+¬	ÒÛ.Î\\Í‚†ë0…ÖHÄ‘F”2%&¾ºï<\$	®ñ±
es*q]0h3Nmáñ53SE²¶H²ö›¦\0äæàP\"FÔ=£¾cƒ+Î&+&å5ó+ì½*Ç6j°îS£*tå\ròØîO)Ñ+3±×9#»9r§53?:=9ƒ.SU(†Q:Ó—6ò#ƒ'9N±ò,J9-0:–SÏ;û	Rõ;‹=³Àäsè±çã®NLN·-=Ñ`Bå\0äÎQ*rä–Só@“ø+²ñ>>N‡A.=Ac(îGBSöÿ`©.ÅÂNs0lad¤@¥\$ Sû4puRçDd©DÔ4tôYD¦ÇA±CÀ?qfæ±L€ãjğâ®ÎÍ7íJ«“Fg6v+@ötŒ\$h<Ğô’şt™¢tÄC²1æŠŒGN!Í¾4¨øF‹RïF‰I´Ç0V6¦!ñ+.JBbÄ\r€VÅ ÒØãV3²¾½®¶6óebr'b”ù‚¸¼’m!çb²N<1c8¶lh\n€Œ pôÑ¶ïò¦Ââğføè!MĞƒSt¤'Ö\$BH.ß-ÄmÆPu’†ğE[5ïuPÍ„R(|&D\n®àEV€äCX8u\08‹p%øÄ\$‘ğÂ\rˆ= ù1†p},a
§ÒqbgN4MC83Ã@¶c·B•U•:Ñ*¤àÜuï7PB\\Û\\P‚qŒİEBGÕÒÕU×4c°”-] ìaÔ¥´S*Õã_UÕJ@ÄåSF…Ã¶W…Õè<Òš#¯oÆüëŒ9^bÎ#¥*ÿg.?ìªl²Nè76<&0òà¤¨<ôf2o†ïâ:\nÌşÆ,°rŒ<0\0Ü(å1à¬ŞÆA[Úê#¢…µÊéÌÄÍ¬Ş+¬ã7&¶7±7Y‡Í•ŞÎæ””#\réêçsà§<s¢X%ËCÁ\0èeøkCØPæD\rÀ";break;case"gl":$f="E9jÌÊg:œãğP”\\33AADãy¸@ÃTˆó™¤Äl2ˆ\r&ØÙÈèa9\râ1¤Æh2šaBàQ<A'6˜XkY¶x‘ÊÌ’l¾c\nNFÓIĞÒd•Æ1\0”æBšM¨³	”¬İh,Ğ@\nFC1 Ôl7AF#‚º\n7œ4uÖ&e7B\rÆƒŞb7˜f„S%6P\n\$› ×£•ÿÃ]EFS™ÔÙ'¨M\"‘c¦r5z;däjQ…0˜Î‡[©¤õ(°Àp°% Â\n#Ê˜ş	Ë‡)ƒA`çY•‡'7T8N6âBiÉR¹°hGcKÀáz&ğQ\nòrÇ“;ùTç*›uó¼Z•\n9M†=Ó’¨4Êøè‚£‚Kæ9ëÈÈš\n
ÊX0Ğêä¬\nákğÒ²CI†Y²J¨æ¬¥‰r¸¤*Ä4¬‰ †0¨mø¨4£pê†–Ê{Z‰\\.ê\r/ œÌ\rªR8?i:Â\r
Ë~!;	DŠ\nC*†
(ß\$ƒ‘†V·â6¡ÃÒ0Æ\0Q!ÊÉXÊã¨@1¢³*JD7ÈÙDàP§4©Í¥5*ƒ*÷H ‡<½êú6<°RBª8c¤—IÃ+dÇŠ\nRsPŒjTîŠÔMÈ ŒŠeB”Àì@ËÌØÕ0[ÖCoàÂÿ\$#º›(µÛ]Á®0X Œ(ĞÍŒÁèD4ƒ à9‡Ax^;ÜtiY)Arò3…ì\0_Ùp^*ÁğÚ¼ºãpÌ¼§*r*ã|š\nc*@1ÍH«qNÉb\ræ÷¥,äÂ:¶HK~&ìjŠÜ5-ĞŠbÉspŞ7È˜ß\n¬)’7SÀP®”G¬æ†Œ\0Ä<´ HK˜æm._Iƒ¨Ú¾Qº6Ry:N½<ŒˆÆÍèÉXÃdËè<B²ë	\$ª˜Ê3U¯&à«ë*#C3TFÉBÎÍŒñ¤–!BãŠªˆ4Zš¸Ì¡uK¢À;âdÆ¦p(ª€Ùæ*‚n±e\"	D€R¹T)\\ğ’\$ò¦İ°ìN‰/¼\\P¦(‰€U†Ê[kªÊãƒN.”ˆTÖµÍÓÙ[×·#ˆê2ÑS0Êë}×xß sÙØ—Š\rCUÉbJI]1â(ñ±ıö?Î·şM8şIb …Éx=İƒl.€\"FA%Xjú¤*·ãøqŒ:ŠĞ¯StËÌù•4n-§…BP8\nT¤¼Üb;B#Ã#­¹ç\0kJ¤EígÁfPJ!+ìÀVb¬š€	‚\$æ	•*Ê º:\$0j\"H; ü!9fn!CµJ‰d“
œ€Ä\\T¸pŞM¡„>Hu{’”.¯Õ‚äK>Ò†JVŠPZ‹Yl-¥¸·—\0w\\JÄì.UÎºCp/*õ}GD£™ü=kñ#\$hÄªÀ9P>¤\$¢W‰i\rÂ&GÉª«e\nU>s°šHlNñı< P\\´”cZëem­Õ¾¸Wm?1½u?”BEWzñzAÁ“8\0Ãñ*ˆaO8§ì‚OBU)¤”³Äà
+iC±!³Ã Å	Xq¸0ˆÕä9	‚À6O¨,`Ù&¦|ÅŠ©%˜†ÌiNCW¡Ì3à@C9Ø›«›Í“Ş’Sºgp	¬6(Xˆò ¸‰´2aÚ•Ô\r…\0(o{q7düÃˆSFl‘â@Œˆª¨)Æ›’°àó‰\0gKR“AUlÕÜß\ráİ-M‚”uĞìGA*¥?ÏUêJËAˆ:n†„UHg[È‡I²Ü¼É\n¼5ÂP†ÂFOêP¨3B*€LjnG2H0øÑ+œfy8˜°ğªLiÃ—A¹\$\$©v(JóvmÉé¡Ğà©Šj„“èD”È„*JZ{F~ª€Ã²À`\rI±&(İ–§ZÓ—QfUPÙÊL7)88ôª“+@ \n<)…Fµ
[Šmn„ÎIô²©·%HêÔÈ2\$3sl;HÙ\$KHAèlÈ‘!*iŒìÔŠÄX­”rVèÂc³¶f0“’vJÔ\nd*Q®ôÉ3W³%P•™5^Z!„Æ™ü‡\"úËÃÀoğé¹\\©ĞiBx›ñèŠ‚–ÒM‚C\nT „À’‚RMÁ<'\0ª A\nl‚xR\nXG	áPˆB`EÃxŠOŠå€™ó@Åµ’Õ‚˜P\n	¦‡T¶Ã…Ëm…¶Ü#”waƒdj¨”¢é’¯ˆ.…ìòU¬Œ{±?ênÔÉsÎ«LS’Êç`£²°êÄ†NĞ0¨›	¸ËXÑå´C7œ“ßˆOù'JNÕêKjÅé÷ÇÈ«š©J h˜?vz©·”ıY‚©C¨Vsô‰·*µç£tÒYÆm¾˜ğ±~¯á¯6Tİàß€ã®\nq—…KºN‰ãD.¡¶V¿œ\"Nb\$iTÊ¼WÌaNÅ\\«Ò@+(ƒ\n¾NÑµ6ç\rªìæ‚÷\0PÃ§D—hgnÇ‰JcÛŠõ¼°Ê“qØ<›~ş¹#l¾zRû÷ØænÔ›»\"œÓ¾\rzÇU\$0‡«A_æ2¡É!LÚí@Œ¾XY)U—„[æÊ\rhÎÎü”©âÚB TÁ! <\"ôi‰D@fu\\’jjäƒ‘H/²HÎ™óÁx fÌÇœ³R;çè+MóTœX•ÉF…gÃò[Ğ\\Tg\0•AÑ‘pxé&ƒ¦Bn‡Nz—\\ŸÅ€Â<èQù¯Cİl”HL÷GëZó®*¾c˜,WUíïó¸ ®×İ:\\Ëê¼¹.çÒŒ©êp†ã§ôIfõ,**ºÆBô|„ìî©]†AÎi¨5 ×Ñœ½‡(9^öÇäŠë³½Èø”Ó@Ä‰¼7lò%»…^ü¤Øs‡GİW°¸ˆË1Ia!D\"2ôÕ‰v=ç±ö+•s_ª2ë7´Òi»©ÉNR×ŒC\"dÓÓûnò
•cô~É!s†ôÄıv*ë‰wéLƒöñ¿åúÍñ¢KùpÃ~Ã~^e<2¦¬H-H4ä´©ĞË\\I‚L!l\$Â\\}Cp\$¨%
.™¦DÅÃ
02r0^†^#>)LÊ‚B5­Ä1¥zŠp‡PVÛ§>g¦~0 PH Üpì|¬Xÿm„VOîfLòË‡j&„²+ä“'½ŒÚşÏ¦0°–Í…\nûŸL·\nOÎØo¤ûGrØäd3oäNGÊxoÜc©;
ƒ8xÌÂc'#+\r‹ºşJ2N&/®šf/ê,Àê­\r°ä è¤nºéÃTïÉÍd
0\n­ä\$+ê/°ÊşÎıDî¾QCâ•œˆÑ*B‘.4/‹îvbòÜÄoŠF„)\"Ã&*bz3Šô)Â6Yâ†œ\$^ #šC\".­Æ„NüÆjÍqTİD¬çj¨¦äÒ¶(0±ZCÅ&DeÍèhè¸ÑŠ+ít\r©¨z­ŞÈÑ„h©†2\$ñİP«ğ×ÖÙĞ¾ã€APĞâå=\"‹\"Ã	 wÑø±ıMÀ¬üãcpâÈ.2z` Ã°×M¨',KéipTéÑ°·#NĞúÆÓ¢üR>®Èû±7#Ìÿ%Dİƒpl‘š2`%2[\$2{K\nl­ƒ'RO'0h0^vk‹\0†´B£>úµ\"×ƒ\0MQÚKĞ«)§w¬Ã&˜é2Mr¿£•)Ò­!‘+R¬â¯Ñ\$Ñiñİ
’Ó+¦?òÄ&òàÊÒ—\$Íşß%+±ù.î/1ã/j7/£òÉPÌ7\rï/
á'Ó0F‚w†‡!Rƒ.‘
„àiõ\$Ó*H²ÿ3:­ 	&\0ÈâQÓrP2¤²B­Ú‡òn÷BX\rîÌ(bœ4.…5£ZŠ¢Á6Khp1è~„¥<\$å0‚277ï¸sQêhèOª†0õ9E\ndÂ\r€Vej\"C6—RŠkÔKCH\$Pó\"  „´cpO\nqH–\n ¨ÀZ }\"F¢cèO‚¯*ğ/ô‰‰#§è9GÒ`Ëÿ¦C&¤°`Cb;_<Cİ…m®¹‚©<.ß(€ıçpaÂC;³F`äuJîM¬ëDFÚ<h´Æ€3>(4ëÙ\"Ç2<’(ğNÌîı0¦db0ÌÈŒC´x¤\0àDACHÕHMi*éHğPÍ1%\nÈœ)\rIÔuIOüeôxIñØeæàÔ¥hµ3€ÖŒ•\0,tÇ‡Î4ÇprÇ¥8\$0bU'ÈA ô(J6\rê:~’´À.¢1ô¨Øcn2 ‚Rãl{2,!Bé5\0Êß#+Fâd1æ(Ê)N¤õ\nÔØˆU*)G?H¦æÊ î/C¾`2Á*FëC¢7â(qg¦OğXmÀ+àÜ";break;case"he":$f="×J5Ò\rtè‚×U@ Éºa®•k¥Çà¡(¸ffÁPº‰®œƒª Ğ<=¯RÁ”\rtÛ]S€FÒRdœ~kÉT-tË^q ¦`Òz\0§2nI&”A¨-yZV\r%ÏS ¡`(`1ÆƒQ°Üp9ª'“˜ÜâKµ&cu4ü£ÄQ¸õª š§K*u\rÎ×u—I¯ĞŒ4÷ MHã–©|õ’œBjsŒ¼Â=5–â.ó¤-ËóuF¦}ŠƒD 3‰~G=¬“`1:µFÆ9´kí¨˜)\\÷
‰ˆN5ºô½³¤˜Ç%ğ (ªn5›çsp€Êr9ÎBàQÂt0˜Œ'3(€Èo2œÄ£¤dêp8x¾§YÌîñ\"O¤©{Jé!\ryR… îi&›£ˆJ º\nÒ”'*®”Ã*Ê¶¢-Â Ó¯HÚvˆ&j¸\nÔA\n7t®.
|—£Ä¢6†'©\\h-,JökÅ(;’†Æ.‹ µ!ÑR„¹¨c‘1)š!+mzúÁHizÕ. ƒ§DËZvœGMzw °p“ Iñ¤“HsŒ¢Ö(f¹L×§³rö ŒƒhÒ7;ïsàù>³ğıÆ1¾#3Ñ¯sÎô½ohî4ƒ@Ş:¾£@şoô\0åD4C(Ì„C@è:˜t…ã½t4\rï…ÏÎŒ£p_RTÃÈ„JX|6¼Om3<CkÎ4ãpxŒ!ô†9­ìÚ“8°û&ƒÀéÂ•Í)}Øƒ!3ÜPèİÈT¼IRI0ƒAÉp+Œ#İI£A(É!1’<Õ¦³LO\"02ÜÒ€¦iªˆ©\$Èt&±ˆëpÛNiì¿_¤äw¹n‚ •¤³Ú{ÏPDè¹®S“¥¤ä ·ÜÉÄ<OÌ©­Ä€åN
™¯2á#ˆrt†£n‚<ˆ\$‚w¤°;G‹µê=Úƒ§©‘\nbˆ™¨Á\$»\\Ş5×|ÔkÍ‰\\İrË7¬¥³B7yO#½oÛÊMiT•­rÌ–µ¢ºa\"æ	êH#iì÷Êf+‚í¨‘~áÃn|KÊ¦ğ-|Óp5(Ò9½#cÚ¥„¼7u½{åÙv(ğ:X´•²9ÀL¢ÖÕ¯cè601î˜ gi2! B7OÊÎ›î}¸'œ2w—°lê[r§p:V–¥ú­PƒÇŞÕí©óø2šç“¯£;Êl”ö'®lÓ7a¨4Q
ªõA(@äÆI‰gŒéUX«•‚²VŠÙ\\+ î¯ôX!Éa¬P^{İ t[
â`BLX[ku’\n5Í981¢1âˆùÈ	NÈ\rqò \$S)Æ5éPÙrvC—Ğ&f–Àõ^¬UšµVêå]ÀE~xÖÄXÎéŞç}	sÑ\$¦!7±G\nÁñ(ÈA¹'˜j_ØÂT4è±'Ç°\\‘?^Ç\r©¶t‹
Y-@ä0’ö€AíQĞ‰l‚6` G´8õ¨ƒhe`á„3;ÈÃªR!˜:ÉØÃ:ƒ‘Êp4:{]d™V†E‹ƒlx4kÆBMq…ñ”kŠ0@@P\0 ¥‚“Mš\0C[*1Â Ü¥ oTaÈ4‡`Òëƒ<šTgèù:³æÕ;rhòHƒ¾´’¢gñH	U+ç°n\nQŸÓş²¤ph\r!V¨ Î¬¤‘íŸŒ0‡SØ€Ÿ!6@d†ãš•’äq/ò‘6D€¡ÅA£±ä¨H	Â0hf\$š™ØŠZ‘à.A„1¯f(ö#ù\$E,ÃB÷˜HWµ¢è2šÇ@Z  *…#(ÛÒZÕÉ;JÍôæµY{3ÓK×&¢ˆƒ1RMêÓÙ0u\n\0Â¥2#„”‡ŠuLÁk«fHˆ	%W›p#•yú\0[Oz	1ğÙ:tË“	'¡*L¢L@Ä²y8Á# ˜^šJ_D A(XX`’RÌ
C6!ÓÒhÕ\\ŒÏdäy*ƒšOZÉ®…ì,š/K\rKQ8‰\r)˜flˆœc (Nb™'&`M=‘&à£rl’HbmøåÒ—>¸ÜBJ¤š<]dØ@hÍÙ¶äš›§P¸®ó £HÉ¾^†üÜ\\=K/™•àGÁ‚FG\0„·DÊC˜Ñ„\"‡É\"‡ÂR]ƒØ-FÚbLi‘2¬®CKˆMà„0Zˆñ+z‰––´ÒÖìªCªlXÚóIÈÙ+¼î‰Êà9/ªdõı¹œ
k^ä=‰\"7ˆIS%oÁ¿#&ìÆVD{lõ— ¨gÛmÎ—÷×ÙÊ=gî¨×­‡\\6ı1’B5&g,¬buÄÃĞ«h\$a´4»tHƒ*¬t©˜²<Œ¯\ròofÁEübJœu\$A*@‚ÂFH0oŠ@ÔÀ‘HƒĞù£§Ü
ñÛîÌÉĞÀ™](Bt‘OhäƒH\"a •Fš‡×\"^L´Ç„©§ä¬œ9rAƒ<¥®Ò„÷¥˜>“Ë‰ùj-`ƒ
÷D7Lµ\nZJ^)KfÒXhõ³ˆåÍ­èd†X‹.€óŒ'D	y³Â¢‚€ ;7k =°G¯jµ”He\"Õ¤w¡k2Úñ|Á&ò[öF©¥–·e
90.,¯³ „™á„6Ó‘A/xZúBõÒÏ˜‚²Iƒú09QÙÈÜåA£Zƒ”/±‹S_…ä  \"æ(‹á¸%¨©›ŒpÉO)á\\‰œÂÖß ¢I£9m8bvş&×üäµsµÌ@rØi÷kU•TÊŠ4VCC'Úqb\n,®
6ÉÏ]û±|¹)07D¿o¸R9[¦ÑÑ}´Éw‡á¹‡|î÷Ç¼âuØ`[Ã¦î\$ƒ“‘Ïš<1æ>!¿ò§ËÎ÷0&/9/n
½È©Ø:®¾åâ_u‰¿Õé@ÉzVD/)'XKúÖû×r—³m>Ùqg4örã[a–z\"³ÅÄl‹YŸ× o´\$æÉëE¤]½º>s›±Ãİ‡­Mäkû6­'¿+WDR{\\ıQšïÿkXd±fıŞXÇü¥*~6á”nÄÌ•ì]5â\$È–ïJ2ÿÌm\0\"8ö\rNÊOş^n^òC¢Ş\$oˆ–0,ê\$Ê¹\0ãÅÂ9¢!ïpºp8#¯\"÷ïğÑLìÏg4l
€ç æ4ˆ‚\$Ä²áDŞl‹\nFm…ÎÜ'”@ïM-˜c\"ÖmÏpó\r×wcpkæÜh®\n´JÕãOmvòll‰*4Ã¬iúqm\nc¢aá\$´ìB 9¯\\ò†„¦Í\\ñŒ¤Mp“	¨ 0Üæ0Ò°ŸpÏğºpÀñfŒñĞï\0´Ìñi¤’Ìpü7Ni/n£K¦‰×GºòPŸBzÌq\nslÄu+>†IyïTLciod€JğÏs]B8Oc ğë€ó«¦Ã#œ£¦¨\"‚Ô`©ÏÖúæüj£\\%£ dÍ4†˜á\">Ä±ƒMp_O× ¯PÖDB%)ªI\"dòêMx#ÂZJDòàæ˜KclnrâÚï–{„¨¦‹PâÀ@T\0Ì qÍ63§¸rcP@lLdqåÇ¢':cÃ„2Ü†¸\r‘Z@‚Öôƒ\$Kq|ÒB^GŠ\$\$ê3­¶ÚŒşb<1ü»LæFdÀ2>ç&0ÅÂ\$Ç g#\$MÍlÚeîÚ¬›Ñ\"å0yÈxÊNI
XC2o 0äÒxå/œ´äæ*Ë*:8zãO	Òf/-x/P\néæk!ªÃê+(Î'n·ÆúŒXßrÂë,”Å/ık&e
@˜-X#g æxK/ìdÅÆmD×n\"!(Æ#l:9m©
–½ëÔ¼H^ eÂb(y1Rø@ŞÃ¾é¸w†ƒ-ä†.0&*™èe0³2(\0";break;case"hu":$f="B4†ó˜€Äe7Œ£ğP”\\33\r¬5	ÌŞd8NF0Q8Êm¦C|€Ìe6kiL Ò 0ˆÑCT¤\\\n ÄŒ'ƒLMBl4Áfj¬MRr2X)\no9¡ÍD©±†©:OF“\\Ü@\nFC1 Ôl7AL5å æ\nL”“LtÒn1ÁeJ°Ã7)£F³)Î\n!aOL5ÑÊíx‚›L¦sT¢ÃV\r–*DAq2QÇ™¹dŞu'c-LŞ 8'cI³'…ëÎ§!†³!4Pd&é–nM„J•6şA»•«ÁpØ<W>do6N›è¡ÌÂ\næõº\"a«}Åc1Å=]ÜÎ\n*JÎUn\\tó(;‰1º(6B¨Ü5Ãxî73ãä7I¸ˆß8ãZ’7*”9·c„¥àæ;Áƒ\"nı¿¯ûÌ˜ĞR¥ £XÒ¬L«çŠzdš\rè¬«jèÀ¥mcŞ#%\rTJŸ˜eš^•£€ê·ÈÚˆ¢D<cHÈÎ±
º(Ù-âCÿ\$Mğ#Œ©*’Ù;æ9Ê»F¬¶Ğ@ÂŞ qğƒ<H¢·(0S‚4HƒdŒ=?ÒAf	IC\r\$§äü ±	B®8: PŠ6¾Œ ô=’))Ïcjî¢

Àá\rJPÂ1Œl(æ÷&L 1BA\0ï\r=dØCÑ\0ä2\0x˜\n@Ì„C@è:˜t…ã½´Nõ2Áƒ8^„ğèçÄ!xD¦ ÃlÖ®ã46·ÃHŞ7 xÂ&â ÃXŒ#bKƒê5¥Lk¾'*ì”‰–i æÌ/nóàŠ/©!‰bìÚM\rI\n¯:B½ş7=ËxJ2 É èåyj‰—æ3îf	ì68bòlğ2l¨Î<±o¨‚: w è®IêœƒK>¢ Ê3#ªRØê2B[fÿ¿ˆ»B°Æ4É#Zp3Œê@Ï1¢ºêã‰¾¹°å`Àœ^T(Bç¢­ëÊV5°ƒt¸5ÁŠ±B:GìYm!5(#ğ¥‹XÛq‚6­»n-Z1Œ#t~(‰– åĞ¯ S\$3´qTäÒ-öm?¢RN8ÌãÑú¯zv¸Š	¢®ø§İ¦1Ú‘`±~b:vnézBƒdÚ>ƒ8Ò:İÛP’6Ö
ß·ˆ£Ç»‹¯‹ôu‘øã“‹Nı•&·ˆ‚tTútâŸì8¬¨ ¸´XaŸ\rÏôÖ”È\0Ÿøed7+uîÉ¸L('l“iBÿ5¡¼3b€B‰»^>Š`ú…@Şk×¡£\r•+Elš²:\rïZ¬–\nI€g%ÜCÆb·š@eÌ˜¸ÜÁ.„gE~š¤P \nOW\n•S‡%’àzZU
,Ô¬å ´–¢Ö[
h;­ÃCArá\\a¸’HÒ×ºê Ñ¹z†àÎ¾WÙÇl¡¬0™\"R°jKáÑd™Têò  ç]§NqÏâ0X‹c2ÈIHDK)fEå¢´Öª×[+mnÆˆÔ¹ TÑ±u‡0|öÃ¶ÁÒ<çşdŒÑ7\$èÂCÔ8F¡IÉFÁ¶=ÇÒRC*™ ‚!«eì‘YåÈ«’´k\"I(G)Õ”càfÉ€c!_†Äs\"ÈÈr^AÈÉ2ÀÂ¤”-V«M¸gùš8´ï @äÑÉ\r,òóQyFMˆú„âïAÌœ8j\rÜÎâö»¡ÑZ`€(€¡B…
:À ¦\"°æGÉ¸C^ä*q+‚l™µ6ì±îS„«
åÊ&—zAIˆsCªÖ ƒ4¼rNC‹«ã‚ÃA\r!i‰÷?Ú­'&é¹8'#´e@C\naH#\0ô½İû¸`¸²Ø#,<®³ *|Ã\nF¤àÂ|P‰Z3ª=)ò•DÊÌ›a<”2ÇVgÌ„€ép’DCÉ§U)h×!vüpH-l9” Ì‚ÉT[óí6IíC³M~˜ÄrEƒZ¹\n<)…B` lL[8C’çr }¬<«”ƒ•!Àahm:ÆWsˆ9ÿ*ÎàŠ×¸1VA»`Iİ\\†*¦›¤&TÉ¬P0@‚¥t,°½Ù|L­B­#F±€ ’\\æš\rmYÔÑkx\n´å‰»ƒ–âq*ÇÌèápÎƒxp*a”Ö=ÿY¨!Xt\$9 ôÎƒgm-u§È‹gCÉNîåB’sè‚cSj\nh”‘@ìvo«‰ÄT§:Áoßp¡Oå=Id£…cCxbk93\$»GìØ›¹OyTá<`Êò1¡Ø1ôßöÔù1bÍµ19«Í†!¤ş´“e\nbÉ£¡C<óÍf}P‰ƒàŠĞğ9IS'Åò‘FÔÈ
\\¥Or £ó-8‹–<\$ˆµ¦ü‰‘“ª­x’AP2€`™a´¡Ü°Ò’ùÍş\rÅÌ<Le­ë·b§|# ÅDÜBÕ<Ú´¿«şmğ ¸Ç¼ ¨l›bƒÙõNiÀŒbE6k	Ìß8‡Ö×IìÇs+Í+=€šAwÌÊj“š òòÔ\"El*\$«
7\"§öÀdËAP*†£#A¤ÜA«:«PÊ§‡è4·Ç‹2nk:\$Ñ3^WÙ‰LÁ–q®8«Pf8â‰µ[Ëqk]¶åğÂƒ£YY<f\0ÜÒîVV˜.8ä5ñ´xÕ¹„å(#\"rÓUÌ9‘Kã¼Ô£ór’yß#Xüÿ“tçÊº+ÇåüÄ0ó>—9±ÎéäŞ‡V*z7[5D«{!×Nd	¿åàÛsŞIÕ(.hík˜c‚z‹Õ\n-á\"Q„±éËk…CÂãouŸóY¨Æ×®‘@\\2†#¦  AQG%1BxÖvõßo†EdR\$dîĞ\n¸a†Ü¬Î£ˆ“H;›8ù¨şÅğ™ôÈBYs˜#¤ L&YñUòç’†E„ÉXl5ˆÛæ£œ¹Ø§ÓÎlˆ¬|â£ÌnSùŒaóe¤_ÿåc[oÒÆ_9X)[s`ùğ©?+¸˜à‚/ÈHV\"P2F)Kš9Cm@ˆAl4)‚\nşifÎ^æà ¢´0Db\r,TÍŒ=p:Ãl:«ÖÀ‚TîÖ‰–ugî%'Ô;d|	-fFDgÆ,g*ÎÃ@P(Ëœ-ZÿBp¹LšvÌüPNÉ\0Èy‡Ş<‡Äi®›Ğ¹gš ¬¼şí\n0†8F6 †¬¯g†~‚c¯Ñ
çy\n¢VşĞÈıg|ıªö9\n¨3òİ–A V\ràé.hìšìNr0ä‡ëîºéNACe¡ğè2pì í¾<öç\nöØì‰-”3êàÊ/ÅÎTÀ`Ø ğ·\r‹,À?0Ìşªö*\r|;±\$  Æš¨\0Ã4@h¬ÊĞ/C0IÆ&Qn6Æ†˜àÖY\"c!RG\"FvÌÊ‹BZ·1€>âq^W#‚k)}KVDğ€q Ä%à‰²œÑJÙ1\"ŞØ1dOÔLĞ'ìÔõ/L2ŞìdßG”'/òaÍs
İM\\°ñ6üämb’ş&\n°¬¯f1øËÌÁ%@õİM7Ò&İª½±I#?#LŠ‡RşÀ‹\$Ul‚;òJ#ò7\" Ôw –+@ÉÎXk€›\"R¢N2§\0Â^ã:B¶¯†\rr-Ğ'2‹Ù
¤m)d\$jösFÌm\rí%
¸bÀŠ\r‰-~2/Ù%&É*¤“! Ò}rU+„¿Ò]-ÜÁ„Ê9ED9b_\0â®Ñä}CÏC/2ã,Òğ½/ÃÏrœGó¹×,FôArÿ-§r>0m(òg±y0 üS%2ò°õ36i³!\"BÚ\r«24m¨U\róPÚ(*Eû4“U,2²;í§5Ó1%ç”¿ä¹%mÜ¯ŒlPíé,²ù8\räHíë#“*QÆŞÓ`?Cø3rgE4É©ãîpŞø£W†âf%ä;,È\0Ê»O²/î?<lÆiDu<â~»o+=lÅ<³ß=2ü@–Ş¤\nÄâVø¯XAVäSğq†bú±%ñ(çTÄ\$rì4ãôBÆöF\n\r€VµĞ8·%îW&²\r†¶—eÜ€ÒÈpEânËØ˜‹JªÈx\n ¨ÀZ ‹HÎã+êCcşÊn>ãHz{”x'ô}4‚{´zı<\$D\$‚@ÊçğFgB%âb/búJÃÀ\"ôJİà¤RÁC óï’0äI9Â~ÅZùª<q®Û³uE¢´åRì+s3£º\"‡‚ Ş¼…Ü)t‚€™Otn=ã°7¤\0i°beoˆ:p,“MÜaïtõ\"sJÇÌÆÃB-õ?/ĞÑ”®+rJÃ6šÀôûU<qUBqb|\"Ï¥S¯È÷Š_ÃŠÙcV5¢åL2ieLÕ
jÑµA²+&Õ&\"Ü<t«Uõ@W‡D	«ä š¹­_MpX/ŠytÓSSAlÎV`êÜÀt`\"?ìx#ó¹+dë(3¸	CVbâ\r•2W•6qŒÜ¨õH<uV+Œ‘	Lœex-a^Ó¶Øb*Èâ\rëøãd+5³/Dò-a8+ Û;ÜNñ¶‡¤¶.(-afÎå^ @Ú\r ";break;case"id":$f="A7\"É„Öi7ÁBQpÌÌ 9‚Š†˜¬A8N‚i”Üg:ÇÌæ@€Äe9Ì'1p(„e9˜NRiD¨ç0Çâæ“Iê*70#d@%9¥²ùL¬@tŠA¨P)l´`1ÆƒQ°Üp9Íç3||+6bUµt0ÉÍ’Òœ†¡f)šNf“…×©ÀÌS+Ô´²o:ˆ\r±”@n7ˆ #IØÒl2™æü‰Ôá:c†‹Õ>ã˜ºM±“p*ó«œÅö4Sq¨ë›7hAŸ]ªÖl¨7»İ÷c'Êöû£»½'¬D…\$•óHò4äU7ò z äo9KH‘«Œ¯d7æò³xáèÆNg3¿ È–ºC“¦\$sºáŒ**J˜ŒHÊ5mÜ½¨éb\\š©Ïª’­Ë èÊ,ÂR<ÒğÏ¹¨\0Î•\"IÌO¸A\0îƒA©rÂBS»Â8Ê7£°úÔ ÂÚ À&#CSŒ£k\\”1£(DÑCœ€­N»ˆÙ.\0Pš•£\\½0\"Ñ(ä6§(ğ Œƒj”\"ïŠnù¢³ğ¡c`½§H@ölpî4´lB6¿Oãüâ4C(Ì„C@è:˜t…ã½<(spÜ”Ï@Î£Á}şC ^)ğÚô1È@ÌôM\n‚Êã|–Š¸Ò’ÏàP™a£H„?0Á²ªÁ¤«ƒVË»ÖzŒ¸.@PŠ7HI2d:Bºd77¨ˆJ2\$Ô#š%ãdÄhØÜ®’ğÒ7¢V4„xé #KĞ\"RCê6#c´:Œ²„4B2B3¯sXÏH¤x¨‡—äÑ2I
¾96ëór:äk®¸\"\"‚r5EÊ|ˆ¢h‡f×å°20¥C„¦”!
‚J)Š\"`1L.jöØ5¶²JÁËv.¤ˆ\rrkš!¶Hç¬Í\rvÀÁ_i½Š(2Œ³1@BKVô[Pƒï)k–Nv6i{,¸æˆ‚Å­C†¯M;¤@@pĞ¯™ñ(ñ	/k,,õŒ×¨„JL;™1ÃxÌ3-5Z%çšì¤*\rì><„	
ë<Ïc6Ÿ\rã:9Ñÿ`0¤h@Aá\\èâÛŒ¡@æ©iC½çºÈÙÕ%¢£ğ¦õºfê·¡ÙQ%`ÇË\"“…ÅR4+KÓ4İ;OÔ3{ÓSUp^ø@Õ×ì ßÆGÕâ¾.„Á~°Ä^”cĞ@äq23ç€Ij_I„ÍUŸç‘?ê5G¾•(¥”ÂšSŠx;ªÚü•(rTê¥É9@ÒYUz±mÁÀÌ/HœrA\r½t/øÖ^ù%| CÔ˜X™±P(PÅ²BnHfz¡ ÇÆş‘‘—g¤œÉ‡´GW@as)ÁÙ§£öí™êîwEAš2Ÿ€a# €1Á¨ŠPJ¨BòØ`[ŠLBkğ(€ N	Ó‘ ‚\ncñ€C (!–UGŞì>2fTË™Êº˜t&æ•: •ÜäüS%\nÖ'‘2A4jÔ7CòJÔR­FF1’TÜÔ±4æ81°eõC{Y(!)… \$J’IÀ€%†“(]‰´à‚/°y¬]ªgÁ–¬@êPP d…94!U9äDÛc¤ôŸ“™¦€P\r!¬ !RZHxy1ít'E@cy¥R!Å†!¸yæÃß~S †5Ü hI7#&hõÀ@xS\nŒÈ9W¦M	‰éšŒ¡/ÄşP‹‰LÄ”“µ\"Ê,A¸3’@€¡H0Ôb”<»ŠB]3m¤É¹'A– a*HrrºwP”=  ©\0PK\$!~/²ÌXŠ+	á8P T *µ‚\0ˆB`E®@('G\" Z}}MH™G ÊhR“.6¨ºº)’Ô#’Ğ«Æ…ÊøgÙeˆéC¬Ş©zGš\$¥Ú\n<ry—'f.Ï,·š©ì%ÍtµCJ±\\Âõ2G%€ ¬a
‹<5ÅÁ‘¬J*\nšqÁ‘gd,‡)	Œú‘e`Ş:B©<‘”ÓZ»+M¸-à¼‡¦%M[ÈIæb+Éó¢tÎ«°vŠëZDÇb#Ái¼Ë ËPî‹V™´E«e{ÜÄ wì‘ÀÄDº†Ós©JÕZÉ İY\n|7ÉQ75Ád0qFD¸up6‚r‚TDCM&´é=\"®Ğ\n\nFÜ„-£kOZ]n±‘ÄÖ Aa PÆˆfİ\rçÑ; #BÀPGÅl¢G @rš!
]\0¼e¥¼e“2„Ğ9ZØ£)ƒÌ‘£ÆH’‹ùR-Ñu4gb·	;fĞ ×‹–3¨_lõç²sŸQÎ(<'yc¦â6yÃ¹<½©¡†Z‰˜™#zù›µs>ç³0•x9%.SIºÔ©ÂT+¶³áÇÒÇF;ÏĞÕ¨&S½ç0Ó`úHÊ(tÆA¥]„S
Øh/ÅÕn=ÕZêÚ[šçh;W|#ÖÓ_š	èºf·à†ÒHN#nZ¦:q
æˆ²Ë2fm¯kp<İ»Y‡U õoóÛ¬u¦¢[`‹}ãDu>WÅ©¶Ã\n3;Áó‡*B™vN/LxY½…ÄJƒà‰q®ÛH
3ß[˜4ïkìˆ—!7À¬Î°®Úº\n\rc0#à¦Ë¶µmí>Õßk#xsvÍÎs.ô§Ää¨úüs--±.Bû‰u¦é{—¦òlàÛLİçTºu¨Nú]k]kzït¦‹ÖÆeİ™N–:k9—Í
£5[›nèuÎ‹
Ö\\5Ù9ç\\¬5¿=Ş¿Ùo·|Ãšmø~m?.› × '‚0‰A‰§T\$Õ„AÁ\0j^-îxÇÑ4ï]&>dÅ-ònGSqiô+‘yHÉ\r´ıóq<ªx>û†N†ëŞ^®Âµ'ˆ0¯’ÀÚx­¾0²è<îÖx,Aó>–îßBÙ·håö\rhEÆşêÇ¯Çã¾~6#Ş°à‚Œq¿İ#Á5Öf/Y0ÿNÃÇ†„JŒœ;\rA¼gô-NÖxOü¢[\"‚ıÍÏØû†®vÂ>b¦®2bÆ“æPşI¸bf*ÇkwiJNPD„LI£-.•kjçNI† Ğ&ßĞfR0^únHı&®¹qĞ|°åàå/ÈÛ[ânñÏÚjïDå0=	¦Ã€ÒÃĞŠŞ¥\n ¾Ğ®10•‹\$Äp¦\\E<\\\$h\\ÄMD¨Ç¦ApŒhpØ0P`ê®Í\rdN;jêZŠ€ÈLdÆ†TË+ 9,½H–üjÔ,¤fÂüx¥ş.ğ	5§Šˆ¬ÆîëšÍâZd>\r€V¢Ğ¦\"ÂÊ©FzcDuÈxŠ'`P‚ZÊ Ú\n‹‡„\n ¨ÀZ  ÂñR#ìüîƒ		0æ'j²=,¢x`ö
^nä½ Ì,dg…öCêÙ¢Ì;dŸ£&ÄâŠN±¨\$jŒÏ,7\"@²EÈ(¥ø!\rÂ	€Ş©%fR&öXÑÖc¢Ì:BŠcà±4„¤ÿ‡¦ÍïZÅÏ„‹q‚c¢Ä,†€Ô2ğ fÍ•!\ròñÂbt­ğİÜŞñÀŞ M\0ØİMòöÅ¤ü	(Ôj^Ê©±@š€ƒZ±Nd›lr9²Xf.VÀò^^j¢Ì
|ŠÀêœë#d/Â\0A.&Òã’&&†CŸbÔ]’Ec¼X2Ÿ¨€¶Î~éqÍ%l\$—(ƒZ\rä¢ã(40oDt„fo\\ DeêHBDj2\0";break;case"it":$f="S4˜Î§#xü%ÌÂ˜(†a9@L&Ó)¸èo¦Á˜Òl2ˆ\rÆóp‚\"u9˜Í1qp(˜aŒšb†ã™¦I!6˜NsYÌf7ÈXj\0”æB–’c‘éŠH 2ÍNgC,¶Z0Œ†cA¨Øn8‚ÇS|\\oˆ™Í&ã€NŒ&(Ü‚ZM7™\r1ã„Išb2“M¾¢s:Û\$Æ“9†ZY7Dƒ	ÚC#\"'j	¢ ‹ˆ§!†© 4Nz
ØS¶¯ÛfÊ  1É–³®Ïc0ÚÎx-T«E%¶ šü­¬Î\n\"›&V»ñ3½Nwâ©¸×#;ÉpPC”´‰¦¹Î¤&C~~Ft†hÎÂts;Ú’ŞÔÃ˜#Cbš¨ª‰¢l7\r*(æ¤©j\n ©4ëQ†P%¢›”ç\r(*\r#„#ĞCvŒ­£`N:Àª¢Ş:¢ˆˆó®MºĞ¿N¤\\)±P2è¤.¿cÊ\rÃĞÒ¶Á)JÙ:HÔ*Õ*‰Ë^Á2Ã“³ÃBƒîüC\$^ôOP Å«v¾ÈÉº\\7­I(àÁ'#tÍ\r# Úµ°HËÚÕ½ïˆàùO€Â1Œl;œ@ÔéXĞÈĞLÌ¶ı\0x˜\rÌ„C@è:˜t…ã½L3´ğò­8^Š…ï²w.xD£ ÃjĞàÃ2Ğœ·i xŒ!òZ+5Më¤=TKvYD‘f&\n˜åˆü¼/Kâ`Î*vÚò½¢Mbé/ÂrÈ;#ØÊ™¬Âº!\rÃ:Œ\0Ä<ª€Mñ}_ŠŠ7‰\"Ù\rÃ£~6ŞTÈĞ­c…†Åã(Ì0£cá&°Ğ§wM88ŒÄä,(‚3ŒòÃB¾¬ëÜ8ã PŸ.º€Rô”¢²\$TëNùû3Ã6£AaÙ`‘ÀW2š”Œ#v¨½\0¦(‰€PÂÍ0®Ûkq[·+J¹L.n\\‹ê1Ã2”‚2Ú»eŞÙîIîÆôìÂƒ6Î°¢HÛ@.N€çÀHa².«öï²ÃB „×î«ó†d+ğˆÕ5©\nŒ-\n‚Ø1)¼ß;ÍŒ£Ä\nš¤Z](CXÔ¬È2H‚B7ŒÃ3¥9%¢+	\rèÄâ<¸ìEÃŒØÈA‚Í£*åx
µ„…ÿ;Ó(P9…/ã	âÃ4sl½\rÂŸáP©ØŞ–ŠŒ£¼Õ×Ã“DšŞ¡ëê0T«s#_u.ÉÓTå<¨¤TÁİT*¤ä«’®V °¶,Ü­ô4Ç9a¬T*¡‰»kU( 0©V0ŠHr&¤Ä‘.·ÎÙÉÑT}ÊÈü¢ òB?jYL?Õ:§Õ\n£TªT¿H {¥tè[+†ü	ğ‚ ù|£×É¡'!¬àŸTàÔS1-	„„á“´‡Ã*ì3ÁæGÉY¦*¨m¨€Ç”a#…ĞÌ˜'ÚEÈaĞ¨ø¼2vñHãÈz\n4:ƒQ™!bI\r3\$pØêÔC\$‰\$§™¢£#L1;?äùE]B@\$üá\r8((À¤˜¸9&Š	-l2ÆõhZáœ\$y|¸VjŠr‚@A¼;¤7Ğ†RÑ5kTû(W¢Id*¼¡I+8\\ÍKl‰Æ1O/¢C4MÃ8o 7ÅBJÂ˜RÅ9%¤ƒØ
8-fp˜Â`D[`i@†9\rDş‚Kë\r3À('–.»&K^É’L‰1_)ôá†è¢jMZBfˆ@Úü 2yš\$”1°S†j&ö3Ï¢!äHˆç¤£	áL*O\0¤C!™(~	¹Å‹5ÄÅ!)ğÒm‹ÓâW¦1m2Ê„á\$¦‚ª•¾ŒcVk\0¦ÓŒ%3Tz-üú=à¨ñJ†\nY“šƒáRrFåt4 \0U\n …@ŠÍ«ÀD¡0\"×âŞdS`Ë¦Ä) å\"NS\n	\r¢¬Öl*ce¥¡ “’rÂ™ó\\'Ä×Ú\$bZƒ¨\n¦áµu˜T`Ş¹OI”âÚ÷T“Ô‚p]Ê uls†¥÷\0è‘SrfH#å&«@ˆ\$y`tyr,ÁXÁJ4¨¢m1“èÊILQ“e\"ÄHĞ›’(Uš-E¡ƒË:êĞĞT.eÕôËQìÓEL|Fô†t-Ë9\nnFv
g;áD*‘×Ù!àiôÖ‚C0·ÉsÏbÿEˆ	…m
zg—¢TkÕjsfÒÁïÔv†È•ê³‹Õ¾ĞÊc	,T3ôÆä¬ÉíF,4§:³½C’qÄTÜÄ1£LÂ‚2¿Èö©H'ƒ e¯_Yí¼ÿ%„Æ Aa Q²\"gèe>GÒc\0äy»‰Ë¬t9c5ş
Á _%¤0¯ìç7Óº–¡Ö§ ‡—\0O	jUçIŸ\nŒ9èÀ'=,ûš´\0 ĞZ;´Ey¢	Üj%¡8Ã˜—ÄÃ¡4¨<2†pêR-_úFKêhÓR£íÊ|ùÛ5˜'«u9§~úÄÃÂ|õ«[A\$Ó†ùñ\"H±)Œ¶æĞÍ²s;ŒçJé[RÛZƒ’UA\\2†#‡¶h2¼ÿSÕÆ<EÃñ*]¶pŞµ–­Šœén³ÈaP±h ,((1“‹†—[*}…\\Vnœ\r×Ñ'g¨‹7{2;¹á›%Íœ#ˆKİó]\"İ'ÑÆªºl%÷qœ*L\$^Š°äQs8®ˆºB¹ŒˆÜ‰ˆI]®ŸÈ(ƒ%¥}­ö@\\øİÙ’áË·?iAX¶ï¬/‡O\"m6í„<:@oÃ\rÆ(Ë(V )ån5ERr7ÂxR¶,‘ñİ¬Ù_)ãÙEõ%½Æ0m8 …!\\	Ü¡?ynq;€ŞHNërR\nY59z4¡‹1º2é<|Z(O9#¬:Qt¬m-z`í•B[’R0ËNKê1xgÆ!•àwkÉ?=‡ªõÊ~E·ÅÖ¼hsÄ\$ZOâ¦u4|b]¤î2ÉÆ\nC\n£æ4\$Ûœb4e~ß\$:xµáè¸Æjt±p|rÙS¾ı<Djj2¤Tnı:»÷^Ó“f ß‰*2ì!ÄNXìpÅbÔ÷ëZ &lä‰øZ'¸ïUNPpÎJÊŒ\\,á®ÎíÇrÊ¤ğ®H×Ğ4#\0.ğ88>¸&à*J0€Éœ	ïddÂ8…GèæÍ¾6Ndó#vñ°.õÉù 7\0îU Ï÷Däb`x¯ÜMLPmC4\rå\n§+Ğd‹á\nK‘	Ä†[KTG\"š\0òMä¦£dŠïnĞä¦?Eš7 ŸÎc°ÆğŒä°–Z Ë\r 
ã‡ÎªÔF,-bVÔDJDä°õ®ûb|çB4¤Dç\rFàãæún¬Dı1¼DUCwpúDQq0¾,xO0w ©gİ1ìjO0BİĞŒÇqZJÑ5l±â\"à°J\n± ®Ó‘HO‰ÎÒ	tC\$½D²NK
eØfÿ	­dòØàk’PÑ¬ ŠŒ–N´/Åşz..BÜ0T£Ä</â80f2Úª”Bxô
p]íÑb”1l‹ ïIŸ…Ü^\ni`ÂA †9@ØjJ  ÖİM<I…vÈàê`ä`¯NAËX*i½àª\n€Œ psÃr/EêÕM*&d•Ö‚ÒôJÈP-4Jkzƒ,üpî@&”1bP%GÃlfG	ì³0€;#¶z)-r%	’£b¦# Õ\$ÖªÅt™&ï*rH9ä´M¢ıâd/ÑĞ0B1ÌŒ,Ï|q	:!‚H#Â4àæ,bË&2Îä¹-o B´Òä›òé-C1-«CÒöå²ÒøRşºI=LäÂ@5c(ûè\"§8vNëî?oë-\"B\\2eòp¾“-Âğæ\$4²eê²¥œ²N¾hÏºë¤A#¤.„nÏ
˜ DXfÊ2Ë,\"ØYk,–b, …ĞµD:\"g. ´-ŞF' ³ñ\0îÍ9P(–sf#â\"¿pë\rË,\nA¼Lf¬hlˆĞ,À	\0t	 š @¦\n`";break;case"ja":$f="åW'İ\nc—ƒ/ É˜2-Ş¼O‚„¢á™˜@çS¤N4UÆ‚PÇÔ‘Å\\}%QGqÈB\r[^G0e<	ƒ&ãé0S™8€r©&±Øü…#AÉPKY}t œÈQº\$‚›Iƒ+ÜªÔÃ•8¨ƒB0¤é<†Ìh5\rÇSRº9P¨:¢aKI ĞT\n\n>ŠœYgn4\nê·T:Shiê1zR‚ xL&ˆ±Îg`¢É¼ê 4NÆQ¸Ş 8'cI°Êg2œÄ MyÔàd05‡CA§tt0˜¶ÂàS‘~­¦9¼ş†¦s­“=”×O¡\\‡£İ
õë• ït\\‹…måŠt¦T™¥BĞªOsW«÷:QP\n£pÖ×ãp@2CŞ99‚#‚äŒ#›X2\ríËZ7\0æß\\28B#˜ïŒbB ÄÒ>Âh1\\se	Ê^§1ReêLr?h1Fë ÄzP ÈñB*š¨*Ê;@‘‡1.”%[¢¯,;L§¤±­’ç)Kª…2şAÉ‚\0MåñRr“ÄZzJ–zK”§12Ç#„‚®ÄeR¨›iYD#…|Î­N(Ù\\#åR8ĞèáU8NOYs±ùI%Èù`«–j¡3—èâA¦\$rs•qÒP¿(ú™VO³,Î[¤ª(ùsD¯äSUTÎ\\ª‰yQÉÄJsÃ¸s“QDªYÖ‚‘Rˆ# Ú4Ğ@A\nBÍt3\rèåŒ#ÆÜw Î7<1B-`î4¸5àØD1ä2\0y|Ê3 ¡Ğ:ƒ€æáxï…Ã\rÅrAt3…ã(ÜÄœEá¢\r°[YrĞXÚà#xÜã}u=pAééNE\$ĞháK3’J	se¢ûb°*ÁWjZ¦¬t”)ÎM•ÑtxNÄA \nãä7^ÒPJ2ê®D/3óF£å&oÔ8¤”g9+AJEÖr™Ò@— 1ü\$±DsNœ'^ï 1HNå¡Dæ—eÙÌBôtu\\pO‰°2“mĞ’ì¾VÌ3\\t’¥¼Š¼‘d®ÎÃ¨Ø67nKm\rcÜ\nbˆ™¾£„÷\0™pd´Z@õ.s¾é#š[Tu][aZ‰I©ê´wĞ—õ„ö»öØHÿà˜dóÆò¼ú6Ò‰è¨'ÅµªB8'V+x#å€A(¥]àKWud¥	&ÎÚ`+AY/•e€ ˆTß¨‚~ïUÁ¹ \$~B!ÆyF°¨‚Ãt+I0¸9C0Ên^¬è9´%ÜlÈÒeğÃ¡pfÁ±4ºJúfpAP7šönƒÈ °è:¯%è0 \r¼3®@æÂbY!œ0®@A›˜ \\a¸:œ PÁLNTQ@AE&ğ\rJ7LÖ‡Uê—ºáh!„†8xC\"æaf¡‡1\$Å³cLqH´ÈÙ+'BÄ:3–Nô£g!3äL …Ù*#îøA”6üÖÉğŸ€‰‰Sˆ\"\ncVä{Z2ÜK¶1hu„\nf{‰\r\"¢pP‰Â†¬¥•°t€iaÈ•…0É*ÄX›bìe‡v:Ç×,ŸL‘“2XpÉ¡Ü§eá\$6‡lY0t• úÏ†İ\rär!­™¡ôçÌ¯–*Y‘ÉlI‰ğ‰<Ë\rm¥©’f`HÎÖ@Åã)YĞ _ï#XD„Ÿ\rĞ0†i¤†¢êóeQäF8Ê—ùÄ7a Ö 0Ã>\0c›sä4†ÙIê1FhÕ„r`È14³À ‚.FÉ#dp/Hxˆ*\$<™¥?BÔ2ˆD¦†2Ä“\$Ê[UPÑ„6t¹C¥‘ì×›fmM¸en‹¸:£Œ…×ƒÇ\ráŞÁÊ;,:ùhyÆôq˜nÕ‚2¦İ¹Åa¢9ÎÄé)Ã§•0È`ÊsÒœSÂ¨!…0¤ˆâˆhj)iÁ9D3¯ç-2’H”jg&´Ú›Äx¯©ÈéO“â€PˆâLGî°’¬g0´èÆD,'íô-\$Ã”Q¶‹È£4nß\0 ’EƒÌF’BÄ!¦M@)ºaÁÄ:›”2Pm)C[0ƒcBTîÃ¢ps€O\naQğ¬” PI¨&â†–íöhj¤¥”Ñ.¯X°¹)äÁöÄ\\3 V¦»×v1¸ù\nåÑ¸ŠiŞj7Ñ/ŠKiÑ	€€3X\0@mÈF\nA|æègªøßàäjĞay‚Xtˆ8ıË¨…îqØQtêBxNT(@‚(\nÏ €\"P˜tyL*ø¼ˆñwÕê¿wúLz+ëû<Ç õˆ£š.‘ñ…Kiõ6§H2 |D}ò>e„²1ZÊho¡¨ıE2
!b\"8©ñë'ÎIœ{‘rs\"ù\\©š‘õ†½ƒšÍ‹ÖĞÚŠ¡-YÒÅW³ì)…>jjndsˆ¡l9„*r*-Ù¡©	jàxšÜwUp¡Vê]^ºi%fª-ÒTJ¢ #ÂVK!-ÈçÎYĞPlìêHá~‚d‘GÄ‹Ë¨®L\"¼lN9…ÃxºØùQŒ„U‡ï½bŸ™¡4ª,LV
+†ÊÊ£Mm=VA'ñ
«¢FbWœ¸¡x‘šãëkÎªêÄÎ,¥“‚~m[RfÜŞÔ4Óı·*XïŞkÔÔU/ío¨´±°_‰Pİ*ıKÏ<Âl¼‹Ş}Â\nÃ¬.G…WÙ6N¬WM\r4¾˜/´3øT!\$‚9qºmÆ±uSÚ‡¬jÅƒ¬«†·Èà©&IºğAç›ò^cÊªÖ¢@LŞ¸™ ÆÇRúz_ª¼åçÔBGÑh‚p/ZŞ¬j aL9‰ª¾€ù>¨Ğı9öÔ[\\b\"@>PŒA300\0@‚ƒºJ»%«ÁX¡[v’ÅXÿm&”‚Kåë_Iü.²²ˆÁÏÇè™4!|5b§ï-îh—µúA\\2†%lş¯È(ÏÌŞû«ÖÿEò4òÆ¸hs‚²¡mZtoIbbòáâÎ‚ğ¡bO!ZjÁÌÁ¡b6Ä‚¢ƒ°2\$2†ÀlFÈ½n8\$o˜õgl&Æl§ÒkÁÌÅG of*0k ê 2Ã0öMtæÃ\0000Oa 0œùĞ h(ÇçØ˜ğ	îk¤‚Íœƒª-vnæâHÒ0zåîĞÁqgƒÄ’ å€X¢üD~ßêî‚8ì ñ°ş–‰mgYÊÜå¥\r‡>gBçÄ˜}P·¢#nvEÅ0ÑJÂÒdŠ¬‚òWÂ0òh|„-j>åNÕ¥—…|ãbnö Ö ËÊù°ÍñRîıfÕÍxèÍ–×ñmğ»\nÈB„gó Y BÅMwÑ˜zÇÒë±…K
F½ÁÊ!x®(,\"¨»§ğîkzöÀ ÉoKÒn_Ñ»1vé¬Ü~Æ ãqŸÌÖéÑğùcŸ±î„F ïäı NˆÙ‡ÈU®­«Êk‡t\"´†h…0şE> Å‚—Â\r¨~ªcD,ìS‡\"*ÒLBÄq4çï~ªC\rW>+„°™\$2B0’Hø+Ìª«êÔ‘ş®ç–ÑBLë®biÑòèF«AæNhôÑôÖòi’ ù*’­ ñ€mr³² 1£ ’¿,ò¤jÒ{!¦.¡jAÈC(Á^ÁÊcò ¢mAÊÃg¼:1ÊX±ĞìğÄÙè3Â91q¸~ãğİ1¨0{'.N‘9-­¢˜1\0Ü¢8SÎƒ
s4»æÍ,s>T3BU­Í4’Şm-¨Q#†ù5¢>0ÜÖ’Ë
ÓpSu-i·83†ìóy-±²–…[9%…)q9ów-â8ŠEZM%X¹Äİ#°§r¶s°#óµ-0¹ó¼¼#ÈÓr©<dĞMSÏ;¤ã:SÄWsàM“äs¬R®²N­+©<.ÊëR9”ê“üêÖ<ò©@t“éAÓÿ53'¤ör¢x*îî·.÷;1œÔT;<“&jÓ¯>ÑB B*x“îNèÈ€†Ìa0=a€(2kĞN¼¤È\"Y4\r©7xçdòë.âı8ëy…JsŒv¡E„gIvt—/‰&«p‹-/fh†\r€VÂ Ò`Ö…Ä_ ì¨Ì\n¯ˆä\rëöÈ²`˜Ì¬\r©C*L²Ìö\n€Œ p†	¿i9\\öÇÒ€Á YHPÑ°}.,ØaÄ,F®‚Î:d^S³49Ãğd2mó\rÈUL2#&öìn.¡lELƒáT%ğ6}&Š>õq•v Á~=cÚ#„TÜ¢z'ô”1ÂõÁjÌÁ9)0Âˆh¶y£…*Ó\n5/UNaÊx5µRÏ¼÷B8·LP½R®[³{À¨…ct5#Vµ&L…Àà”¥ÆådKZ†´ò’Âêè4Ö0‚sñ'VäôÎÜÅK#a~Ònzçv .Ì`ÄC4 ‹¾@¬^ ê ÛY!\0qäŞJLA\rZ(2îa(bVíœk„Ü.¢î ÏÎÆÄäLFòöÙM\\ç #Àx\"ë[õÂç‡¨uĞæ ŞÍ\0î6C„QÓ73v}Ö¥\rîfX¡V2¤¾Óô·á„Ol!\0";break;case"ka":$f="áA§ 	n\0“€%`	ˆj  ‚„¢á™˜@s@ô1 ˆ#Š		€(¡0¸‚\0—ÉT0¤¶Vƒš åÈ4´Ğ]AÆäÒÈıC%ƒPĞjXÎPƒ¤Éä\n9´†=A§`³h€Js!Oã”éÌÂ­AG¤	‰,I#¦Í 	i tA¨gâ\0PÀb2£a¸às@U\\)ó›]'V@ôh]ñ'¬IÕ¹.%®ªÚ³˜©:BÄƒÍÎ èUM@TØëzøÆ•¥duS­*w¥ÓÉÓyØƒyOµÓd©(æâOÆNoê<©h×t¦2>\\r˜ƒÖ¥ôú™Ï;‹7HP<6Ñ%„I¸m£s£wi\\Î:®äì¿\r£Pÿ½®3ZH>Úòó¾Š{ªA¶É:œ¨½P\"9 jtÍ>°Ë±M²s¨»<Ü.ÎšJõlóâ»*-;.«£JØÒAJKŒ· èáZÿ§mÎO1K²ÖÓ¿ê¢2mÛp²¤©ÊvK…²^ŞÉ(Ó³.ÎÓä¯´êO!Fä®L¦ä¢Úª¬R¦´íkÿºj“AŠŠ«/9+Êe
¿ó|Ï#Êw/\nâ“°Kå+·Ê!LÊÉn=,ÔJ\0ïÍ­u4A¿‰Ìğİ¥N:<ôÇYİ.Ò\n‘JÇMœxİ¯šÎ““‰,‰H«0é0Ó©Î¢RÿÂ‹‹vÎMíXO,T½[Sõİg#R‹º8ÌÂ­ÚœÖ¤EUau*s=@k;ãYÄOdA3 ’«j+)+tÖÅõ’K§‘³W[ÒÑĞä/:ëX@ ŒƒhÒ7£”«r“e_R7¨óp¡Uµ“V¢\\
3ZêJ(æ¢JàÂ\rÊ3 ¡Ğ:ƒ€æáxï›…Ã…á¡pŞ9áxÊ7ã€Â9c¾~2á¾@*N\n¦‡xÂ8*­ÓÛÊuJºîıJëÈ.Sk4İU¥×\rª³¼{PBĞtVÿµí¼Ï8Û-=³\\©Îê×[Îz9ƒlíº8İJV¬²ìJpd…/=!(É{­6: Y4ó@7t½4Wª†ãRÖtB€“µµ-F“ìjªNI¿LÂ«sów
›·Ö}m=‰·óRÖÉğï=ÓëOüI-]ˆ\r7±p\r>“¿”:ÅĞ—[ıµyPƒkAÍš=)_Ï‹ù!BTWT0?ò}.—¨\nÅ'®Y\\²sNrÙŒz( ®%[¡;å\$œŸ í[¾>mäû—nR“éXQ!L(„Æ^	Û×W	Ñu¸³ŒSrÙCå) %ñ›â,oëuÚõÇ›ëÌ[‹­ÁAzS¡r²2Ë^C…ˆºÎ¹B>ïq%:‚ûQ@#Å%]±—låÏûøq4ªªU>Ş\r\n¾…1DÙÂÔ!4<@Pøİ¬UxÖŞ;p)Jd€\"Á.WƒšşW.Y–d Wã”pv/\":©W °\n!é\rĞ9<BuãQ†e<“Æò8êT«z3/1S¤…õ\"Öô‹FİÊ³ZNÅz@nfíô®R¤G\$s¢t*ÆU:T´\nºHªø'ôZG 1/+ÎM‘e ¤±JmÇ¹¶õ1-—â{ÎàöuÈ|IoÂSaÅT˜ò«)KÄÑyËf\$ôåÃœ€§şT—†¤‡J;&e©–2æ`Ì™£6gêl³Ö~ĞZ/¼7èh#MjÆUctG I®sÍU«È´ÇäÃ€gş\\½Çô ÔYu_Ó¦È@ç<jLk:] Åm\re:·&îª,¯’”õI1§zôBnK‰d¯‚@îâDv>î%¬òe,­–²öbÌÙ«7ìåÍ¦|ĞD¡à:40çB#Nt-ÅÒC\$ÜK- ÌL²©Y­)I¿R\"NúA2ĞjeƒÓ¥Ğ#`–åó»°&ás’R<“K²S±œÀíFÍİ2òŒœ”ê\"H,’\n…915Fq—#Ò{‰öT¶Ã¹&SÜjtÉÓEM	=8£è°¤ÑÑ%0I:b*©r(õxid1;L„ã©–&İš>JÇ!,Ëuqcóê_Å¾†”Gş€Np |šuvŞª:\0‘)í\0°Z•*ü=‹È›¯YZÀl
¿·«@İéfk‘µÓ†•JÚç2eéJ,#Ï^!Ù3şƒìƒ½o—}JÎ~R‹Ò%6v<ÙÎµâÂ˜RÌ>×:F¯É+m°ÁĞê:%n#˜†2DÉ&ƒNtÎRRôİÚµO|-ÿ°.bŞ#§FNóûcFº“–zäèhê(}T¥ÅâòwGcz`(VÏ)Œ]\n,Ç}ÌÇ5öu®-(˜ºG¶šV¾Ø=Ua¬?ÚR¹ĞfEJÀùCoÁq?\n<)…KÚq§#”âº94ŞääÆÑTæÊÂ“N-©+®<Î‚•“›~TÏy÷?½N×%²ošM{.ÕSµ¢ÇõŞNe-[ãä\r,ç^Â §XMéäO.Ñ¼#@ Ãî5D¸>ÛTR‡”†»Ó±2H¿™lâqëzÎÜ'¹7„ótÛ·MU `|5À¦S!¤k&öÀ¡s üÆêk…uJÕ±÷CKòåV€ûp§â|qj-êŞ+¾¾¯çI™Š\\Áû*:9h6€­1©…Š¤§*ÃC']•‹ôÛBÚg|ùøÔD¶ïKÃY‚W^t&zÊÛÚ?c¹7[ºeç@Ä³â¢‰- ãóà£ĞP	ÿK[›\0è\\„p„K[‘qI*ŒÒÑ8Ut¾PZ‰ :í5¯'\\y2æ=…?©%oXÑÊVr¸
‚áIÎ6ÜÅ+‰CG\\±¸²¦–ĞæVã\"•j[Õ1È©”ãae?ÖšáˆAëv”ıjnâ–ÛñÜĞ¥ä\$ı°ÍÜ+mu ;XŠGŠÂOérİñ:Uµº*Æ\$ûiçoò9jL¹@kùåù/fSå+zAûO€=…½]‰I‘Föwc·Úå^e†Å‹<ˆ¨d	@Óù+\n#›O’~eÛ*ªwÀbV€Ù²¶J.¹‡+-\r½O¨?“ä18‚T\n!„†0Ë6W&ïm*\n•…fÚd~XídWïFEÎpÿîØAŒ°ÌÏ0Q'\$\0^/\"¦§ÆŞì¾˜Õ\nE‹,øĞ8À#ş#Æş¦\$¤ Ü,hÚóZÂªµeDƒ(é/ü'ğPÿÿdĞbC¥Î<l,|]fôœL?çä°#â+L†øÖêò·cŞXÍ s\"vào¤r­±K—
HÀMO^×¬k‰…ÊÆËêv°²¹lÚ6ğº)DÈNx/:Y
—
bìª>qkä÷ÎÔ)F¶Ûë|…GÜ¯\rÒ€/ô¢BÑ¯H½ÍP£ÏÂUK\\ğ1BK(KÔÇ¯bó‡2æo.¡4@D#ÅW
Ù1ÃOç²2Tõ1bA‹1\r®±S\0‚:rÎğ†ñIˆñƒzãÑZnÃN‹
^°JƒÑ„ìëÂˆåBÛ\nWÏ<¥Ì]f¼í¦'gtÇ‚’û±{iÄìQvÌãR¦+\"™±ø|Ç)Qè;\$ÚcÛ\"„åéÕMÜVhŠ'/nòL†N@Ğ¯šÕ‡ï
 œ4ò£¨¥ HP.vÇ¦,Ş‡ş1¶ÅräN9qÙ!ddŒD\$‘\r¦Úä(O ğFßËH31!Çèp\n,ï‚£\$Â‰±¡‚ŸÍ\n¦hUR}&ÈÈà;&oH¨ry,&ÒQh˜m+T“m\nåBìå†ŞÈ¡!Cw'R¤[©v\$±`=§4-ª8ğÈôåTõn](Ÿ(R§…Úâ8õŠ='2ùcM*’å/Â•0û²hÌÊ-QæÜ„Ê°ªğô1»f>\$±C.ëØBŸ\$ÚÔÚk6)ë:õQ¸t-V*RøHÀÉG¸¼4İÆ\$­i3ËR¤\"h¸[éc3°8¿ETKÅ£¯Ù¢”_]7ÂˆbïÆú	.2û±1E«9s-5Jk3.Æ¦¯J]s6nQä÷­÷lFÉ\r,„rŸ,ó ÎæVi†æäœAQŒ”Ò‡=\r=HÕ=“ò©TÆ3ã=.¿=fÒ¶s{&¤ûtXÏ¾÷Òğãó4ô{%ÁAğq1’£%B¯º)Ô0ºRˆ#ÒB…+Cò¬yª<‹o2æE×CÍÉD4WoÛ@%ÖÚm°7Dš\\?Gô²å«1Bôo@ìqç’ÜgºÜ­ÜêOHÂÒÉB1/h¦]ç™J ]?ğK?2ÁJòÇK4G1±bL3€;íEF†éEÄK´ŸKñ—8ô[<\$(So@ÏNFÔ×JÔÚÕ E”óAE¼Úh18o‘±#Õ9kjxÔøÀÓõBSà¯“Õ&Sİ@ïÈ–ò‰?2óÚ'2ÑC•)SÕ/<‘IMO~(•*DuOA ‹±½*ç=JSñJ•s´ECTK\$2¸}ôÑN)1WÕ5q!(ÏeÑgR4¦[£NöóK”µô©ZïTÃSSY1–÷0—XFí[“LH¼Õ…C´OF&I#/ÎY®r•ò“>òõYĞ0ı\nX{‰a[4·J•Ş˜Ò{÷W•dä!`?älì\"ğîTšR²ÅOÇ]ÆÇDEšy0ÜY5%-vås‘¡tÒû±k¬v—v\$XÔ+5_²ÕÚpğáŠ.¦ôÔ¥ñ+%+73ê7hŞi\r€V®m,¼\$~gÈß–E\n2“N³)3ót\$®¼ÑvOà@\n ¨Ã`p4óH6h¨8åJ°°Q\\b;/\0±äËÒúoÈôŒnç‹¨˜kÃl\$å\0õTÂK¡ELTxnÂÚfÄÛÏÀÑÇy(0|7qÓXÒˆÛKgJ@‘\nÍ26~Îg¸®ÆG¯<	0AvïÒb¯Ät-@Ğj1q`T«ÂÅHÓtğÍohÒ?ÄÕ…>/à¨ÊE‹lZ±•‚Îqbœˆ6ŒA±ƒ;±–Ç‡Úg^ÒÄ…x¯IR’Úv«J¢Éòmw­dQm^·¯m.ÊKÄqdÎ“<.Åvû	TôI:1£;Ó98,i>M»?¯²æ·wÄ¼¿4RKÕÎzìcñ+9×DÈtîÊ¯Hµvüòrß;qK«€ç…#1;i6äÊ±•?Iï¬öˆ¡'g@:ã®øB|Çó2·ÖTé=¨\"Z«hR£uq?.*üsÏx+'QprèÚn)l„­
&.èøâ•‡Âë¥*Wmr€àŞÆàä\r*º€5;dIØbë5•ƒ©‡a÷,QÔœFÎŞ\$À";break;case"ko":$f="ìE©©dHÚ•L@¥’ØŠZºÑh‡Rå?	EÃ30Ø´D¨Äc±:¼“!#Ét+­Bœu¤Ódª‚<ˆLJĞĞøŒN\$¤H¤’iBvrìZÌˆ2Xê\\,S™\n…%“É–‘å\nÑØVAá*zc±*ŠD‘ú°0Œ†cA¨Øn8‚k”#±-^O\"\$ÈÀS±6u¬×\$-ahë\\%+S«LúAv£—Å:G\n‚^×Ğ²(&MØ—Ä-VÌ*v¶íÆÖ²\$ì«O-F¬+NÔRâ6u-‘tæ›Q•µåğª}KËæ§”¶'RÏ€³¾¡‘°lÖq#Ô¨ô9İN°‚ƒÓ¤#Ëd£©`€Ì'cI¸ÏŸV»	Ì*[6¿³åaØM Pª7\rcpŞ;Á\0Ê9Cxä ˆƒè0ŒCæ2„ Ş2a:˜ê8”H8CC˜ï	ŒÁ2J¹ÊœBv„ŠhLdxR—ˆñ@‹\0ü‘n)0 *ê#L×eyp0.CXu•ŒÙ<H4å¤\r\rA\0è<\nDjù ÂÉ/qÖ«Å<ŞuˆzÃ8jrL R X,SÜú¯Ç…Qvu’	š\\…–ìÙ:ÅmËvB Z­!å%€¬)˜SyÙ!ÀeLÔÙÓšøu½ô±v“…\$×´¥,‡5ÔÊô—TjLÅ„Áu°@@„áyE¼Õå}GBÈ6¾°|;Ä1KÅ#”H0Œc@9¾£8@0Ã°´1\rCƒ¸Ò:\rxëo„`çF`@]@ä2ŒÁèD4ƒ à9‡Ax^;ápÃiÚ°œ\$3…ã(ÜŞ×Àä2á¨\r°”8úŒĞÛ
\r#xÜã| Ò-Õi[HñP¤;#rD•&XB©¤‹‹\$¯E™i?¼Å™\0†¬cÙéºye¨ åiÖU/1NF&%\$ÿ?jî©@ŒŒ1`Úå€KËÕ…Q¥%;5dy2ÄëÜø˜\0Â:‘ ì0ƒ¨ËOgÒDJ• bpÂ³¨<\n†9¤½EBc³¿D©ÖPŒ).ü‘ãôâ’ºŒ±-K›‚Lœªt¼€ H #pƒdÅ\ràæ1Œ#sâ(‰1T–”ÏMÛ¹rõYíµµ/\\‘TÓ«j4ÉÚA‡YNDjºƒ
ìûÿÆõ½¯§™z´¯®¯{!‚vhsó„âOÏ{ô”Ö
b<(ôÇ´¨ØÍƒS2-y°	8,z“~Jáú\n@\n³Ş|ˆÆnÎTèD\r!Íà!Â¨’\rĞ•B„Ã	Ã(xŒYr2 æÌá.S®9T–;D „eeGš#Vr”Z½3bT¾‰±‚ o\rà“†àò¨nDË…q†g`oçÔ9¯ è¢¸aá„ú‚Ú	[JÔ\rËÌ2‚€æ\nY‚Î‰q4A’–l,N¨µ fÕd˜CÅ\rh…’¦ê¹° ZQÉ ¯ Ç\rƒHdZËğ/æ\0À˜#a)† vÄrÌMŠ±t=\nÃ£)bàˆJöP}™c.(0xÍˆRk `ëm€H‘/!	éÉ( ˜€¥š£q¾!	…@‚PÔ3L,e±´€i_èÅ}¯ÕşÀX`ì%…°Ö%rbŒYŠÃ(i,˜ë	!´8<ÚÅƒ¤¹ Ğ¶¯\0ŞÚC¤Sdá­‘¢´h»’ô£–C—\rªBH‚¤ƒ•á*²Úù41C†„8¸%‹*
¸6;àÄ‡(r‘³ı´†Í6–Ü\\^ñyßFÆƒWrğLT™†şã ¥ÄCrDŒÎqÆ53\$Ö\05P:@ ª“LG`¹G“¿²¾`‹!,éXå6U*C±’4%z‡ Ò}g­¥n‡DCÑo[ôµ×²ƒ\"{#D+ 9¢ÅÅjğda¸8/5ê‹fëiá 4†0ÑHg`€‚—Ô48ñ\$xe—byB¨uS\nAƒfp MĞ%²LÁI3ŒIEyºMD“5Z4(ÏÙVˆ£¦%I™H)E0ƒÄ\"dMÑúA#äPY‹É [&YT¤¶j:ÄR<È	ÍT–PBI+ÉÉ›‰Øn¡q¯ğââƒš\$ÈD6É)Pµ¬’\rq…\rÔ;\0‹+ÑA\n<)…CÌõ¨°oç˜B±XkÄ½¤–õ˜Á\"šSÊæ»B¾šáÔ,Tª>…°zßŠ
”J¯Eê½ŒúäÛp›È Å\"ÀŒ†*¶²\ni‰qXJÉi/&\"q#dæl¨
è—KŠ~æÑ@fÄÆOrE*ÈY•.ÄÈ¸bÚê>
’èİ)·ÄªĞŞ›óÌ%L!œ9¢i)¼ğóÈòPU%èS¶!`LvcĞ&?A»R´§±ª}<âtF>ÆşaDäB%æ&»X¢ÎY
ÆO¨e¢°ÃÖ‚Šf#[È\"Ìàš˜{9)QŸ“÷wó2WÕ:Åì>k œk;šw¶ãŞı^üU¾²{M}°Àˆ‚¢åâ™yTŒP©×·˜Ì(ƒ,äşBu,_E**‹ê«UÛV…*6/S7J,•–Kæ|JWúâªuº‡`ƒ-{Á³VQ›İ#R6FD‘æÆuKè‚P!±ì@¢7şµuz’Öêr<ú ÛãÕ¹œM‰µS`iUì@ÊÚKK<0'‰M²\"Uÿ/Wï•«˜QI^É\"mXO´—¸asNkÍºúíÍ.Û‡]ëÅğC¤t¬a¥ŸrÁXkı,…”³Û)Æ[@sÛ’œ/BŒTÑíÒ€²NÊÉøa”©STÁÍŒ …@¨BHı †”@¹×ı÷[h¡Xc\n/Ö]ëvdy%Şa0Ú\0/\r ÷2æÇgˆé\"³ZZÂ<@|¾ôÄeL2yxüöÚ‡¢ÕÎãĞ“[°•
XŠ)æ
š¥x\npò¤{Í^¿:Qıõ\\sÖ;¯.GÙfkíf7>fPQyO\r¨F·k¦4ÈÄj{,˜=t~˜~ÙOíü†V	TI±Û~}¯¥û´jè©##¿„£¤àtcâCös‡<#Ô3#63§kF¸ĞÊ,ûM\\k&¶TÊ2=Áb q/p#\$C£%F4+tøcXå„ 20Mm\$ãP1ğT£/PjğL9Pb6oNÙˆ4ğ_ãc/fUDã\$NDüÅ#=Á\$‚ä\"l#F8a7I|*îÍ\nÏ\np²‰|Ñn’Mğ˜æH‹†œõ08×#”ß.`QåĞ\0PÑÃ\\/şĞlæÙ æS-i‡Wä™ì2Ù-zñpˆôæÖA|3i±\0ÕM”ÉGÄ«pÕíwH+ÏĞÒŞ¤˜ƒGÔ-mo¯·8ÖŒ=ğü—n114{‘Z\$EbºìnÊìèüV6ë±Zô‚4°ÍQLõn‚Í‚ƒm~?n—aÙî‡0Ñ ğ×’èåq©ã1!p:¤‚b–ß!%b¼¢˜o!2(ƒˆÂîÚR…6a:Sş,Ê@Ò§,ôp*h«¢vL´#Ç4WñÁÈ\$ú¢º+âÂª=êEñ¬}.N||Äºêà¸\$ÿQ9f`iR3p[r0Å+Ï ‘µn*Q\"Ù£ÃòEa{\$RM Ğ:6NÔmÎhuÒLá«Ã<D%©†Ğ‡´H:\"úb Á66Ç¢:QpìÑÏ)ÍDPŠã‰…2§'2Dì’¥ÑVf ç\"'rMƒŠ9’Ï,%nç%«-RÜâô0Üârì1å-ÚšÖq—*±œI2û/ñ±ÇÛ,R®5‚0°ô¼òaÇRûòÏ1²üÚRæá¡8gùrC1p×3nÃRÃ,dù2¥H@ât//A;(7¯Æ\riŒa,sdéÅ+2‰#‚E7\"Ÿ64³@I›82U&~ÍSu6à!a`TNÒínß5D·6³8©w5%M:óyrk;†ñ\$±%&‘*( CJL’¢ìçô8k <ÌØ4çJ83àº!nr.nò Í%í£0‚=Äh?b=()…>ÿÒ:®&#ó^÷M´\nº4(t(òÁ+,%P1QfhÎ\r€VÁk:\rhPA¥ĞpçCŠèd È\r ÌŠåŞ( Œ\r'‚Š‰D‹J ª\n€Œ p…I/Fcì÷ È÷oMçüËâ<#%<ò#Ch6È>gLìÑCNªqN' BOÁhiã°\$C»C'	Ll,GF|!R5ôÎGN²ÇÏ9j6gŒxØÅ\"ögÄÂM-w>A\0¼ÎT‚…PËÑdsLÉ~N2.ãBÈ|G6kg<c€L4»´« K—²T¸eK\"<¢Á6!Ô© 0f6Á0Â%S4¬ôágB‡Õ;Ud…3ó|\nˆJD)Ä8¥æ,…\0à–%¨ädcW#Ú»£Í%5˜<Ë‡ `~Áds/1Ã8Nu Go 0İ[ÍÃ\"V@S640Có?k¤ê­ÎåÌ×)%:Üë”Rjh5Ç	TjBÏOèlb~¼ÌûğòÖmà6Fôÿö15lt¥\"ÊÊ&ÃSŸ1ÎrX#u§(ËÁ*óó Ndê";break;case"lt":$f="T4šÎFHü%ÌÂ˜(œe8NÇ“Y¼@ÄWšÌ¦Ã¡¤@f‚\râàQ4Âk9šM¦aÔçÅŒ‡“!¦^-	Nd)!Ba—›Œ¦S9êlt:›ÍF €0Œ†cA¨Øn8‚©U
i0‚ç#IœÒn–P!ÌD¼@l2›‘³Kg\$)L†=&:\nb+ uÃÍül·F0j´²o:ˆ\r#(€İ8YÆ›œË/:E§
İÌ@t4M´æÂHI®Ì'S9¾ÿ°Pì¶›hñ¤å§b&NqÑÊõ|‰J˜ˆPVãuµâo¢êü^<k49`¢Ÿ\$Üg,—#H(—,1XIÛ3&ğU7òçsp€Êr9Xä„C	ÓX 2¯k>Ë6ÈcF8,c @ˆc˜î±Œ‰#Ö:½®ÃLÍ®.X@º”0XØ¶#£rêY§#šzŸ¥ê\"Œá©*ZH*©Cü†ŠÃäĞ´#RìÓ(‹Ê)h\"¼°<¯ãı\r·ãb	 ¡¢ ì2C+ü³¦Ï\nÎ5ÉHh2ãl¤²)ht¤2¦Ë:Í¬‰HÔ:»éRd¤ËÃpó;Š8Ê•»¼Ÿ4Q¬nÛ)KP§%ñŠ_\ré¬›8.1ÛÒ=-€P¡43[¾¿Š\nB;%ÓDËK,ÉZ ŒƒjÎû„ƒp<#ÆÏ¥.ıaT¿¯øæÊîÈĞÈAC AĞ€X –ĞãÁèD4ƒ à9‡Ax^;ÛpÃRÔã\\±ŒázâÁ–(ä2át\r«*³ŒËVãpxŒ!òH Öâ”dD†ŠTK¬†_£­şb•c“¶¼¯këxÈ ô2aî>\$â.
’6à¡Íš–—±C\n¸µ\nñ´Dï¡¡(È=.Ê€åÙ‚3 ™¦_˜‹³¸¤\rƒ‚è† cÍ.®/ò Q­@\$Ã8€Pˆ2¤ª9Š%ƒ¨Ê_—òş#MƒXÇJõÎãg<Â\$Œªâ*¿³uhä\nHÒ¿<©]¶\rSsOŠR&%Y–‰¸h³8³F“\"QQ[ Ø65mk*9ŒcÜî\n\"`@:ĞòÃfÙOèÒ½N°9ïv ¾o•NG42óL=Î\r»¶)áC¬oßŒ~Úíˆ¼IG­‰;¬4˜ÒÍ³»B\$°Dnµ©G½»/·é8ÿw€éwqHú°„îy>§S~Êëøˆ›5‹„J
ö-iÿÀt}ƒÁs\rÄ¥z§@¦rÌYDq»˜ó\"Œ¨oÁ˜6*uöRlåü*ò,JÓ“£aÕY+@ÌÖ‹xo,Ğ-c¯Ğò¬ÁgCgÕšª`ÜÓC((`¤’¦KÏì!;è€ÊÃò,JNwm(¼ÉŸ^¼Mù.LÀRCãî±Ã\ruj¡d™%˜³–‚ÒZ‹Yl u´·\nŞ\\
ˆ7óÚZ¤u@ú;º£¾½×É\$\nf}íq JQ*(Ø²½Ò
Ö‰HYw•Ã,È‰%SJ¡r õÏ¾/RB2¬¶±ŠÓZ«]l­¸½ƒ’á\\a–——[ÜÁªH\0|ÿÒñ¨Q&’uŞ‚šr…\r&AHDt‰ŠJ !åQwŒGƒ8„aP#8¨eUŒy\nõË³+2bÂ^eá„33~«aj\r…î`‘C9Æ¯;Á!…/¤^šI`\r‰ĞÃ–Õ….Ñ\0i\r!¼µĞc,™ i..:KM–—QØP	AP”DÁA:ˆ€(!¯R„Ñg˜ŠyìBô‚ĞI/5F]`¹pŞåáx'\rÄ‚DUœ;Ÿ+¼7 š°ĞleáÜÔ¼@©ƒ:ĞœÕ:pÊ„“e;ò,!…0¤¦!-˜'<Lä¡Dnø¯&ÒíŸiªu€ £s–I±¾0ˆÎ§’rRJÉi/.­C–\0ÚÑcA.ˆìì#m\$É5&§Äì™RtkÈXy2\n¥Õ D®Ãs/5¨ã ¼pÈùù\r±r8*ƒP\\gñ\"WsäÕ<I‚¨/fÒH„ğ¦+‚q1 â7á|•ì­ÁQ¨’Æ†²0¬‘éXvJäb*ƒ1ea„\r·Vø~pÏìÔCV\\Ajª}M\"[jÜ1[ˆèHùœ2¦ma`©G+:{ª¼ìÚ”ºCÑ÷5åp±¥BqI:SSD<Ã9¨Ã¡h®´#šWÆj¡M 4)°Ø­“ÁêIOÄ¾f’ÛJP\$†Ç C‰qş“R	=f0%Î\";våÂ‘¹¶+èˆr+Œû¢8G”:w.}L²x:ys«Lâå>çîKaûyÌÙøò\"ZÑrŠx”¶\"<û.WwO”5¼f–Şƒ»Ra½Y‡;0¡-A,³ŸåL”(BˆåÄ°Àtöšƒ:ó&HÑº;
=Ï'JIJ*‚KÒ\n=ÑZM~a,(_Âf\rÅe¨&>”>%ÈhS\r!é¯ÒW»Ép¥ëdìúyH~RV¹Qé’²HI§uÕt½ túÅ‹Ù\rÔ¬{SœÛBã “³cf÷g’‚\\†( %ˆ…*P–[ÃošQÕĞ”7Ï küí\"Ê}Ò&äÆçüæ+ó\"›#Ñ8ü—¼.(R{¾!¡y+’œÕ˜d»m¤À\nâ&v “Í}©Ï6fâ<áÁJ;a*@‚Â@ ´ÛÁÁ‹<ƒƒã§!.i·FéRQ.)M}š‚òœÍY+'lèéÁÓÏ9ÉŒg¿˜:u„F8y3?ÖBcyÎ¦y(\0¸…^ŠKº8¯é&¦I›[:‡>êX_:n°túßKëÄk§–_ĞLm\r-İ&Œ\"GIÙyv.ä—÷~Ìl»AéE3wîó[úG‚0±OÂõ~õàC_ƒ¯+P8”~C¿&'Nç	x:å	ñœGdcÎùù‡&ïSßø\09'ºåQCÿC³×PÀ­åñ 3šÎ”GŒûAN™Õí\r½\rtå¥¨\$¸ÔÀXMÃ\r»i;VëµÌ¦X`ñÍîö–l¼	Óìõ çÕnm{éÓe—=N°õ±r)SÏÂïz_ôÙŸÛôæïæı¦>Õ@ÅDDr‡ (:`‡\$+‡—\0Kl%ƒ,i òÔçyc˜ƒòJ Ä€7Ã†`ğ\rƒ¸;\0ädD‚P;¤DÅBÔp 0z-œ #Â\"üB:5íªb,#¦ŒÃ†´ÃÃT &ÀRÄ[\0¢ÔâLÒËìËä–Ï¯ç	‹—	Á.Adõ\0ó\nŒ­\nÄıP¶Î±\nğnÿæ\ngê%oàÏLÿ0ĞyE„ÿ§¾PÒ î¾ÿ/nò'\\áô»n²í.ºì/ÌşîœDÀa°şò‘íî¢dğméãòá0üò\$íÎzÏ\$w®œÀaBÀ¦Áş‘b\"ş/¼7D´ŒĞîõQT<qY§¤|Ï¼Û-¶J‡7â:Ûä¨zL:hi¬,†`›B<iÂ\"#¤  ÀŞ†¢l°Ç7/¦J1†›Œ’ä(P)ª,ğh%N7ìĞ.\$çãì(¢o‘Ab^İgÈÛÑ Ò0®c¯ÜR%3 ÊÆÍÌ±,<#\rÕm“Æ¯\r‘ÑPõDk 	O¼xÀâí;cáëjêPÚõR&\"’+ 0áÒ5°ÀõOªbo¹Íñ!Î,òüRe¶°§ª?âÊ,#Î!²2ò+\nS§`6c¡1+±\rbY\nKq'±-Ñ<¼†Î’|-Òş`–ÿrl¦Ü;r&ÅÿÒˆ»oy!â?*E++rR32•(£¶æ«
\0°zG¥F0í éšH0¾ÿÒãÒ8\$’ª­…v¹Ã™% Ï/mÛ-Œ½\"Ğ¤N†‹!qlõRòù\0á, Ï ÍÚ,í\"²0Ó\$Ş #“,İäÓ.o×/ 4ó.Şî+1óGÀ˜IbÕ&¤ªOÎ2dmÎ,2ûÓ\\P\0ÔMî'32¡ „şG3\$\$èÛ ÒÀä/ÂÕü|¬¥*æÀg¬ôaBşf²ÄÎ©‡åú6qhê“¥'£dßfš s¡s·)O:ÓÁ²ğ\$H:&^öfê¡€;ó°S^%ñçN©óC>ìõsõ±4îöeú\r€Vh:`Ö€êXO¤kÊV]¢jÈn;\"z¾JÆ*¦‡@ª\n€Œ p€HÂ²`Î\$“ø‘oHÇÏ	Dâ=E,;Q1oF#4T«0…ºXCúÌÇĞÿmP\$¥8`òo\0ò+â8Æ\"Ü`œ,bØ/eL8­ÄbcBya3D*¹496]°\",e®ç\rëÖ]ªx4¢Â	”ÉD…\$%ÅJ¤Í­¸F‡ù ÊF´ÆMHş°@êÊ)6GI6LúÌp\0Ôì¼>ìŒ4/ÙO‚‚a@Ş”\$ÖPGÓ Æ\n‡ú@c&IéÌ¶\"#¥LÕ„\"ÿQë\0C¤b²<¦ànF'p»Wm,„°J°¸GpŠ{pvqÌ\\J³R&Õ\0%ä1Q¾êCÊF Æ ê\r 	å\nq4ğ=À‚-;Zsé¯»%r&Ç\\\n•D%1QL}E¬€ÇA\nÊ§Şd‹\\¦RMÆ\räöâÈ.dò\"¤´ k²IŒ`ß£\n2)¤Í /cÒ@";break;case"ms":$f="A7\"„æt4ÁBQpÌÌ 9‚‰§S	Ğ@n0šMb4dØ 3˜d&Áp(§=G#Âi„Ös4›N¦ÑäÂn3ˆ†“–0r5ÍÄ°Âh	Nd))WFÎçSQÔÉ%†Ìh5\rÇQ¬Şs7ÎPca¤T4Ñ fª\$RH\n*˜¨ñ(1Ô×A7[î0!èäi9É`J„ºXe6œ¦é±¤@k2â!Ó)ÜÃBÉ/ØùÆBk4›²×C%ØA©4ÉJs. g‘¡@Ñ	´Å“œoF‰6ÓsB–œïØ”èe9NyCJ|yã`J#h(…GƒuHù>©TÜk7Îû¾ÈŞr’‘\"¦ÑÌË:7™Nqs|[”8z,‚c˜î÷ªî*Œ<âŒ¤h¨êŞ7Î„¥)©Z¦ªÁ\"˜èÃ­BR|Ä ‰ğÎ3¼€Pœ7·ÏzŞ0°ãZİ%
¼ÔÆ
p¤›Œê\nâÀˆã,Xç0àP‚—¿AÂ#CdÍ2\0P 2¨É³'7¨áEÀ%¾aŒ6\"Ôx ¨ÍÚ::¢`Şœ¹+ğ7N
ê6ÌM0È6µ.ƒñ\$½/ğë\0@JÆ1¿I‚p¡§O›êûãHè4\rãª-- Ğ4â4C(Ì„C@è:˜t…ã½\\(“àÜèÏxÎ§Á|	MC ^)AğÚ÷¾íHÌ÷¥¨BÒã|’ŠJÛ¾rÂ‚¨\nèmä¼8h%¯&÷5‹°\$¹é£:B¼`Õ'ˆJ20£ËŞ÷Ëˆ‰c|ÈîÄMV!°\"Z|Œ¹‚\r,7ÅV’31*2İhÚ`PŒà&”L‘T)ØÀˆqÈÆ¨ÀZ–ËÂ›¤ÉLàÜ:º,¢Kã+jº'\n—ÈÉzÜ\$·Ï
w-æjEÓŠÈÃ“ÀİŠbˆ˜7ê˜7\nós¶±î*ãÍ—4 Ì%®ò(ÿl¨§´ÜIÄÑ°:¸S4˜³¬û¢@#è©~ó½ˆQÅĞºéšîß5Z¢ „“m Pái\r. ˆÄ>ƒcî¥xA…Œ\\²’ıó\\ÀÊ<9ãr`´±)6§-Ãd?# (ìİ'#xÌ3-µšK:2ò¢)oŠ„Ç	¯N¢7-C…»LS|jå#r²r¤tâaùKÖ(3²Ê+{ç wíeIw~s12F+ º&É/‚Ã¥¬º\rÈ÷ºr0ÒDï&=Ï£•8òÛÅkÆìĞš5<¢TŠ™T*¥X«ƒº°ŠÌø+epxd-\$T4–•~°‰ğd:µf,ãd~Œ±ÏAé‰A©g¬Äjuzõ¢–ÒJ˜c}6?T¹Ó!’€¹N©õB¨Õ*§U*­VªõbÿU¨rVêåÑºWO\0s ÇŒŒJ\0c\\|@R6Ìƒ8eM\0ê ŞY™é»>ÄÁ‡\$ÈN‹Šİ\r!˜À>àĞ}ÃcYFíH†Â>OcªÇFq|ÌsÃ‘ªD†`êGÃbo5 H©4•Ğ¡÷j†âÅ]Ip.HPßÇLoei!7a@\$j\0()@¦<ˆàNR\\œ*…Yhy`…Ù˜ ŠéòİòJ\r%F<ÒK|T39F 2\n¢\ry»Rk7D%ÄP:½“ 4†2Ÿ:¦}R~Q¤_to'À€!…0¤¦”ÔI±Ù °ĞMÓd‘G¾\\dĞeŠ3Ü\$®4Ë#!üïJ”19-A×ÄÍ'sYGĞAAHmÄTæ!€ˆÑ&æ2i˜èÑAå3éy\nÉ6#`£L8 0M?=zR¥”kì²p›|¡ÈP	áL*\$§„Å^!úF…5¤s]2MˆN•5àèszl6®|Å;\nÀƒ,ïlä]†¥¥IÚ”·QdõÉ8ğÌ°F\n’ÙE
_êÁ–KiT›Ãs'WŠŠà(1°\" ÀPO	À€*…\0ˆB E³6l\"P˜m\n*K&];TüRÚ-rÁ¡åœFÎÑâåcEr…I`¹æiö’ Hê\0¤‚Ó“¼€M„Fã˜é”^ŒñÄI–ÉºVšTl9˜4\rk]váU¡Y;.†ˆ4M‹vR3_q\r…À¿{Óv+
ª'ìL8èæÇ­•q¶¤™6\"\"„t)@ê2X„ÈeŠ ‚ZKb”œŞrqI”p‘œ	ƒÂ˜e\$2E²¢Ú‚–ƒ…¦—¸@Ù+ÃHzKá¥§ó ãØÈJBGµšjc®áÛ[\nf³#XeŒÁÔ§©™lbSZÓIDE­”ƒSš.7ÇBW×ÕË“Q{E)®Ç™gæZ°a>Qû,®‘˜Î’ÖRÅ	<4Ä¦i_CöcK Š€ ¤¥K0ó<ÏTõ«{RÒ\\E!D:\0òú‘Š–ÆälËâÒÉ*;²ëˆÂ \nƒÉ
_\0¼i£\nH„ĞÚ!ö2vQ‰y7%ÄİN/Ó‰\$€j¥ÒT˜:dÓ©Äe”ÆS’ä#lnÒÚŒ‡-K5F¿Õa¹İëíT™ºøÕäD‰‘ZèF«¶'Ú¤XŒm‚;]Éİ ¢§Å¢[`Juw±a…+Ô\"g”^ÆI¤æmüN„”Æ®˜‚eÖ²Ø9«~ïüë†K¦¸;ØÈ¶#šLªì2s“²\n@ƒlØâDÒŒÇ†ÒÍAª\$¼mÌqÒw„¦Æ2Èä“›Æo.ÁåF»–ÛRKÌØ¯Fdñ³’T°üZ^''Ü+±* ×Ëv2¼”´9£¶Ş””7q )e­Ô,Ç?Sc©1,ºòQ/çQã›RôF~òNP`ì\\™‹qAM¯:·Y¯_ÃËy1Ù—wºİşZhŠ‘#µh&{ÕviJTâ¼ğŠø[½züMá\r=—ÃïÎûÌØò¾GÅ›ÿã1·58~9­,í'—\ruîÍ[´µVØÚÌƒXàİd2üÀõW‹Í€——l‰©÷^K²ûÿo—¬—c¤|õ/ÚÒhr²œ‘FˆG+4w„„Ìá‘2fUtv^‰Î	*s'ä¿WõÎg e›¶}EÈâ<‡à Dª•)†‚~7¸²Y×~ìä\n‚üFÊ\\ïØµÌtıï”òoFà0ïzØ0~ĞóÈ†FëÜ\\läJlö!	£Î— np:÷p(é‹`Óo%‚JÉ¨ëCªĞ^Ïƒª\"bŒÚè1 T”ààÏÂŒ&Šş?J¦/¬2Š6B\$~ôêU/2Ø,ï	oEĞ”“n[’Åê-Ğ\\¾¢Î£Z[ğe
\0Îc°e
‡ffÌ`À@\nCœfƒ\0¢dp™î÷Öõ0VùíP¢IÎ[ĞîlÍ­G\r-ašïf
ğòóğ\\ÖF\rB-tÍìĞ?p<æ
ÌÌPÛHì±-°&ù·ŒÈºm¬Ìñ:/„\"ÏP`cÂpK¯8óè˜±bA°ûÇò~ğªù†nhş¦0-ğH£¾MŒN_°ÌI.ZßB÷É20%ú>ÈÄiÇz>ÄÈ:*pÚ|!\r<RN&ã­bö‡Rd>\r€VbÚg•cTbÍtğVBC*î3‰Q°~D£J,Äh\n ¨ÀZ JÕÏbå«oIŠO…¦(N‚ÑmHİæÉãª	„™\0¿h¸SîŒ¥ÂŒÑç\"‚.èÊš|¢ˆLJ8~‹âMÂˆøPq åÊ%ÉØ[ën©\rç}EÊçY†XkÎ@æLM'v.ôæò†å¤\"w2åpçñ)0H\ràà3bfå2†Fƒjv…Êdª‚¬1ô{î‚o€Üè‹ºg‚rªæ&òĞÒÉlü‡ ŒT Ê;Í@@¬ êµÀšDÒ©*Ã»/¨âb£°BÕ2ì#Bİ/²~(\"\"Z2Œ9‰”½ë¾™¦,;R(Æ“0 ŞÃ ã9âŞf‘'…¬0ƒ’ñ ä>Ã~od–";break;case"nl":$f="W2™N‚¨€ÑŒ¦³)È~\n‹†faÌO7Mæs)°Òj5ˆFS™ĞÂn2†X!ÀØo0™¦áp(ša<M§Sl¨Şe2³tŠI&”Ìç#y¼é+Nb)Ì…5!Qäò“q¦;å9¬Ô`1ÆƒQ°Üp9 &pQ¼äi3šMĞ`(¢É¤fË”ĞY;ÃM`¢¤şÃ@™ß°
¹ªÈ\n,›à¦ƒ	ÚXn7ˆs±¦å©4'S’‡,:*R£	Šå5'œt)<_u¼¢ÌÄã”ÈåFÄœ¡†íöìÃ'5Æ‘¸Ã>2ããœÂvõt+CNñş6D©Ï¾ßÌG#©§U7ô ~	Ê˜rš‘({S	ÎX2'ê›@m`à» cƒú9ë°Èš½OcÜ.Náãc¶™(ğ¢jğæ*ƒš°­%\n2Jç c’2DÌb’²O[Ú†JPÊ™ËĞÒa•hl8:#‚HÉ\$Ì#\"ı‰ä:À¼Œ:ô01p@,	š,' NK¿ãj»Œ¨¸Ü Œ‹ÂX—¯3; Ï\rÑŒ˜ş?Ã˜ò’ #h)¡®\$k	G›¬0ÏB¸Â1¤ S˜ÄşÌ¢Hİ6;l:<5\"|İ1\rƒ  Œƒjô†ºPA¢°4PãIÌõc¤ıÑïğ@ñ¶,ÒëÁCœ :!ã®4EÃ0zQ#£táxïg…ÉD½¿
°Î¦a}{_¸¡xDª‡ÈÔ¬½Ë°Ú¡+xŒ!ô!7ËHª:2Œi\\\\æ1«*:=—¨ê:@P¬¯õbOm¼Íª;ƒ\rØC˜'+Ã®\n4¥t+¨®Ìè°J”ŒCÊVãi=#‰pÌÂÆH³(‡0ÌCrLêSã«US§“ï3Ñ£(Ì0£b;#`ë2‰q#£uë£1²K\"-'îZêâh3Ü†²\"Ì—ÈÉC2ÈÎTd5¤¡\n3¥tş—#é#hÛ%ƒ˜ÆŞŠbˆ˜\ríhåCÑ+®ºÈï.s{GRf=Ñ-Ï[£ãÔÔîq<]Ï©p•¶äƒÜàP¥zQ,ˆ’6Àã•ìÈˆ£ÇCÑßPÙ†rl‹\\ÁRh…Äs5èÂ\"¤Ú®Q.ğã¦}âXª÷ıô=]3Šj&#óÃ™Ÿ`,Ê\nê%ƒxÍ­Ôi¨«ŠR2š\\ãpò‚N#¨ÇWWÃ6{³#kĞæèßŸÂ3ÊŠ*ôª%6d2…˜Röá;i\\’ÀÎƒÌaœ>%Mrœpê¬8 T
L†ÆX‘	Æ
ƒ,U²VZÍYáİhªFµC’×[(\0ë G’·ô,]	u®×´ÁSª!%†Ìâ5ÂÈ
ù;/T8ĞÊÄŠ‰MpË“tğqÖÚ\r8¨uÓ%Tv
 ÚÃƒË §Âœ´”'ËYlå°‡ÒÔ/[áÌ9ò\\â‰˜t† ùß&%rJY›­*(\$†¾âMSâ¾DO€Ÿ”H¡áqHD\$˜`¨AÕcK_G·3DC`jb%!„3/eRùÕ{êui±û«€ĞJ¤€sP„°1¢âdËƒKAF%üá<xÒ™e¡EM	¨\0\"£È\$ˆ©Dåu\0(*¯ü2°Ü^ÚZ±ffŒ4šSNÍ*fÍT4^b`DkD©pæ‚•tI•í†³#D‚â‘)æÉD>ğ¢J4ë\rÎ †Sp›”éx)… ŒO\\X<(å&°B\$Ë=+Ç¼Äf\$MI¹9'dõM\$“†GeyFEÇ¸:P¢\nl*¤Ô\$‘@òfi+…9y\"“blÑpqhm”3Â{á<ë(¡Œ—«jnTĞQ&¡@'…0¨
]y×6e@¥”ÚJ(Xk.OİRˆ†GH=2Vd™¼C‰JÙÒxeN
†äzØèŸÆb˜72Šk	y1VAŠ7Vî]é¥:á*L¶T]«b€‚¦ä!5ÅØ2—‚ŠC¸\n‚æt\".\0U\n …@‹gÁ\0D¡0\"Ú`ÉIxmPiè(IV½­˜\n	„Í´&Ss
’8VC(lØâ~¥Bxm­ÒäÀfx#X9„b]‘ÊÆ+›•˜gñ†£.Òò.KÖé(ÕháTÓ­9@¦>….±Ô–&È…2L“XÑS8é<Hí/eüÁ–è•O’r8§\$ØlDx…Ñcs]œ¸1ÕTöHTÍL!Áı§µçyõ
»§–éĞÓ\\»Š4`×—vƒ†&Á¥¡İ0L(`ÀR’&AáÏ<xQTÓ‡E0æB~_B
 AfFÉÒ0ÏeÃ+ò\$÷¨ÆpÎGÎU/aÖ¤#é')¬½ö(cØM\\å^ÀŞ«ƒ#\0Há8 B,œÓú7T—§/5¨C	\0‚Ùõ=4@¡ÁÓÅv®§V…Aäˆ^4©”#ì€”™S\"Z“ ŒP°óŠtY	•€ï/RP¨kã=¡ÓR¤-Q§HùÂ\$cW†àìKôt¹o\ré¾HmfJ‰fh2ì‡I>4
(™auzÏZœP]§4&¡Nò}ôm-G­Î¦SÏl:l£˜ó-\ráÜ‹”VŠkÁ0•íwÒâLN³Ú„‘DgÕ:Mo‰E?Ö@†€¢\0¸ÄEE ”•]éÃ6şæOf«Fk¢?cĞ\n§Å…®Wö`K‘/î\\¯Jò¥ÁŠ‘ş9%2F—œó£áË¤*YÌ”ÑW´—±Wˆj“}Çœ.«™ó]­Ø_9l ÷sÃ09Ï\r}5Õ[›x¨ø™[9ñL;õ½æ\n`pD¤>Úº&(òn–ÃÍ§R\\-Ù{i^Tç=‹Mç÷Péd––câTÊm{&' ¡³’°R‚wt¼ÎÁ[]Ë£Ñï	 :¤ü6Ş
Î­ºVkêgçË’Î•Îä‘:ş:ïsgiŠ»×šçOÑ@Kºã <\0Üº˜Èæìáœ¶şÕšßM­WÔµw¶G~ã}ævş=éÂËÉYK,,ÇEñğ#&Ù\\Ÿô2zô?'e¤¦şa‡È€µ'ªR:ü-„á4ŠAÃ¡\n\r™Uş‘¤`j\rÇER¢2bôÇnSM†­Hı²ïÒ–£êıbË:5ä„?ã÷\0bNù¯ºû\r(ÈÂ:0B:¹æö,eîğ+b;´2&Æo´é\0`¤ô®&\nó/ÃLºjLè%n‘oH»âk &] h¦óğXãLëI6ÀÌTÕ°ì‚Éc™vÊlú;‚LtN&o,rGf°kîº^îæC|) Ò;ìÚ½¯†JĞzôÏ„Î\$­ùìß\r/=	OT²F’mg\r\näöğŞÉE|Éò¸nö°Ñ\rĞê#0ªsB`ğøĞ¦”Ù+¡&‡oRü10&iÒ#^/.±\$1BR±;L¨\n†Sğ|eñ™YãÍ±VÊÌ¹\rn\n‘tÏp”ûq|Ëq€ügl¯§¸Ï†¤\n‚tL°¤Ï#ÜT‘x\"ÏCy1«pìü\"ş3€æ å<\nEtë!bf/c˜REø!f¤d#Gb¦5(ÕÑé\r—Bo.xŠğ\r%\\à¦B~ãTeâú¾Æòk­2b‡nøÛ \r©Ë0Šeø\r€V«D&o\$:8NºîÇª'¢d!M92àŒ4ÂX'fÊ’Çî\n ¨ÀZ ‚äÒLâjÕ..9\"R#x±'D -¬Û\r<(²€ù@Ë(môÂ0#B‚#âCÇV*ü¼gP&ÀŞM ÌÒ‡6(NÜN^1Q¨\$\$8#Ãâ\0E,£”Fñ\$ÀË%F8£a§qç–ŞIJÊ¢·MåËjM§l7Œìm+„ILN2‚Hg¦^IR•qü.B€èc0°ı¢%ÄY ˆ6*8GÿPo\"¼ôÎœ#³5)b‹âjéÂä*c83ÂŒ8R\0'La3Yƒ†`‚,jØ~ÂŠª%kDÎëælËxm.ğ˜LæÓ9`¬2§4×#˜¾ Æ_äô·âtÅãüà ‚:ÀØNòŒÃF\\)“,` !¤ğ/«vRª3Â†@N¶UEL³ç0Â,d à¢g\0»‚îm1R}NÎ\"ä7ÎôK\$ »À	\0 @š	 t\n`¦";break;case"no":$f="E9‡QÌÒk5™NCğP”\\33AAD³©¸ÜeAá\"a„ætŒÎ ˜Òl‰¦\\Úu6ˆ’xéÒA%“ÇØkƒ‘ÈÊl9Æ!B)Ì…)#IÌ¦á–ZiÂ¨q£,¤@\nFC1 Ôl7AGCy´o9Læ“q„Ø\n\$›Œô¹‘„Å?6B¥%#)’Õ\nÌ³hÌZárºŒ&KĞ(‰6˜nW˜úmj4`éqƒ–e>¹ä¶\rKM7'Ğ*\\^ëw6^MÒ’a„Ï>mvò>Œät á4Â	õúç¸İjÍûŞ	Ó
L‹Ôw;iñËy›`N -1¬B9{ÅSq¬Üo;Ó!G+D¤ˆa:]£Ñƒ!¼Ë¢óógY£œ8#Ã˜î´‰H¬Ö‹R>OÖÔìœ6Lb€Í¨ƒš¥)‰2,û¥\"˜èĞ8îü…ƒÈàÀ	É€ÚÀ=ë @å¦CHÈï­†LÜ	Ìè;!Nğ2¬¬Ò\n£8ò6/Ë“69k[B¶ËC\"9C{fÀ*ŠÌÁR¬ğ<HRÚ;\rÀP¡\0ÀŒsàù(-Ì¢çÍHS\"‹Ît¡)BÈ6­Šêû„Ê\nşô\"1Œoº\r'(Ş1>a\0î4ƒ@Ş:¹ÔŒ\09ÀP X ”ˆĞŸÁèD4&Ã€æáxïY…Ì]\0‹ArĞ3…êX_OÔ#È„J(|6­Ä©+>L´ã}'íèÉ7B² ‚Äoè:ºÂ+RÕÃHÊ;WTŒ>-‚Ş'.#\nãä7-ƒ8æ†Œ`ò!-ú1_ïº&7Êø*EC.6ÅóÍìÀ4àŞ¶\riö\":1Ã(Ì0£cœ;-Ã®ƒ8#\"©l³\\0# ¥ãã¥ğ¹0)Û¼4ËC:6³*8)¿Ìn„µ8p§Œ²HN§#íÎÆBC\$2A9ÆXØµëÀZ9Œl“(‰hÖ²Îï¨Ó¸·wMÆúRoåu £XÔ2² P‘²ÏÖõ¾3uÚù|ú(-7*òµ°HÛD·ì\0Š–ò˜æşíÇÚëbZü<â\"LÂÛWØˆ¨.ËÌ3 *_ZŒ(½‡^2	\0ÜƒKPÓr¨\$´İÄc(Z™hĞ-À³MÂ.PÌ3k*¬ä3·´æ7áïx¢¯İGÙ\n8å­ƒGŞ-°Â¶0ª%û[Óƒ(P9…)Hª:Or“z\rˆy!”…@ĞÓMU !ÕG›Ôü­ÈR£nõ5J;UJ°:*å`¬•¢¶P*å]«ĞÜ
Ï©m&iibèR³K’ĞZD¤a‰€Ös”àl'aÀçĞ@ğÃr	_Ié9–Â˜n_áĞ”’²¢jÀ@…6¿Èw\"¦UmVªõb¬ÃºµOğ] %x¯Ãºwb‡0|äƒycd*ä ‹Ë!Œ7Î¾SNÃQ;5f0ÿ§c\$Râck†ÁÑ¯‡BvMˆÀm8aÙ·xC\"ı‰–™•\nÊb—k…Ü\"°å‘zı!™à¨wÆ¨(l|éIK)€ĞL¤ğsfD`1œYKs¾.%Ì¦)ÅÊ…“ŒÃ.ˆHÖ-ÉH#ĞP	@Ìh*…Íp(( ¦*#VRŞÌDBzÁ\r-pÆLÒr2;a¥ÇRç&ñ¢[j·%\0î_déR#&‰H‡4\0£_Š™YA¸8)ÉJ€PÂRÁ 4†9n :¬A‹²O6õ’JKI¦ô!…0¤8oi\0‚#RsÛË{2&ŒÈ—Ia.&E‰5ÀÌOÙ²)½1IrûK!óÃˆH-!’RHˆyzù~¨bƒIÔÊÛ'ÁÅ“ °Ì{	Œ„ràº4 PeÂÛ@Ì¤B>i».Qè4Ò—	| e€Ö–\"ÔÊZ£/¢“¢xO¦Ä¥8e³%¢L×eáÌ¿èo; ! ¬ÉÂ<MÉ\$.•œ€…6È
I4²\\ªD#@ ŒÍèirmA—J¯?HRb¥ì­JÜÎŒ \n3®T´³€\0U\n …@Šß®\0D¡0\"ÜfÂSÅ:MKÚ]¼ÎšBaK¯
d·2«²ö&ò…>ä•†È–ŒÉå¼ä]„fö½ÒBJI…©I:'¬ŒS‚€ä1 “ÎÁ ‘,¡k7TâæÜ\rõ¿)¨ö@‚NV^Óş˜D| a\r4Tõ—ƒ§_hÁÒš“Zd;Eö,ˆÄ²áâŠ‚<à³5\\¨à¨Ô¬_,,»W³¬ÃHzaÓ‘É¿[¸ÊXàD=—¦Œß4œâiPa¦` œ„¿W*ç[+™tLzçË‰Œ%®Y¹˜\\Å]™'j4ÓõÔr'q½y–Ú—Ûn. o\n…¥ì#sœo\n#-H”(HdğŠ[N/‡í‘V³àRSt¼7‚áœ)ºAˆœë\\P¨BHP….iøjêrˆh¨•†RNFMñ÷‰ğ –öyWÖæ(20û¯\0K Nis‚xKTzìÅØ!J¹C‘	‰€'a5Í‹±ÁÉÙzüÅ”97´6•G11³±®}ˆ	ÃÚäñëk{)µƒ¦Æ'› %‚í|7|²İfÿlïR' Iã¿P 8ö uöRR##¤ğ‹3ÂçAÇ#0oYŒQ¶&\0+†PÅ] Õø¼%ğhL	d\$pü¾’]\\[İJb|¸“µW€Z3
'dÇ(8@\\‹ù¬8)mÓÔ@p>²=Æt{Ğ\n(/f-Ú”9ta\"4ËæÊnô™!\"ròî.…¥®¾ÁÖû³.ÈöñuÀRÈ&Å£”µuì~F-ÄÖoÊƒ/(i÷òf–Ñ€ğŞŞ÷°—1ÖÌ-AvFç\"|™-E(®çÎR0\n‘Œ (']+ğ¥*|^È2ÿ¬d}9ó)—ì’šc	½½:=Ø´ôşÙ\"}©òİ™ºzYÕ½|‰iyGãö§Ò¾WÆ9ßËª[ô”è÷»ì:mµå&6à€€'ì¨÷>öÀ ;|4í#Æå¶gD'®| R3¨dÎùçŞö_ª¶âÎÏæ'ïzíoîÍ\$˜xËP{ÌÚ°« (i\$4è ¦dEìó`ÊTi	ƒN’„v(B˜-ŒÎÙĞ8y&ÏàÜTdh­\$0gãˆcÂ¤'ÃDÎp\")¢‰ç¬şfÿP-ìØ­]ÆîÎ
ÀÎpNóÌ¶\\ïš5‰	)îúnù\$Ë—\0Î¾6ƒlP«ÎË%Ğ­,÷®¼ÀBS
Éÿ¯/p¾éĞ­P†(M,oÏ0€Ë\rì.7ã®S†8	Ä[.Z– ØŞK\0¬îdƒ¬ü¤ğë°¤çí'ï¨éq\0°ã\rŒŞ# Ê<¯M1&”¬/§šaÌs±*eÄµ 80ƒ¶\râ‚‘:çã\\00\"œxo…\n00@×Q!°ÙÑpéÏü²12(1n)e÷ëÿ1ˆafa„V›°×ËñŒ9Ñ^Ïm*N.ÚÏƒĞ›ú4¡1¤o\rqHÁ1ÒD ¨FÆªì¢~N\$È!1i\näLL§cñóÏ}\0æ¬c2Ò1Æ\nÚiÚr¬ÏbœAçR†œÖñNÁÉøÌÇ\"Q6T†BR/\0–a%ø&@Ş>&DO²,\rñ\$mxÙÏÄÚm˜1Öü/ÚÜ dF\r€V\rd!H.ò­¨ú8q~5„¶áé°<5jÚ\n ¨ÀpxéÜ< Ş£bS&)ºµG2êMîıR²µkx‘-….(€æsÃe\r±Xáo:ÃŠè1ûãŒ!@Zô1(4’ˆÌ®šCîXò
f6¤Eêê[\0Òì€j‚:@‘\0^ÑƒâÀLxìC\\ö‹úS:ÆÎr®Ï2B12Z\$«ÍÜ6+ôõs*0†Î#3jö5Ïí4NÑ5Ëù3âD&c\"Â¥2,}p¸_`¦¨ªÒÖÚÇÂU\$®è¿ì0ìÏ9.0\\ÌçíºÇé,¦Toól-Â b‚Ú¼ÌĞ\nfö!X@«%2c€41¬Õã%êÒõ=(–`óT0\nx!@î-+É‘ˆ0Ş‰ü#¤Ò\n†-i F¤n\"àÒ";break;case"pl":$f="C=D£)Ìèeb¦Ä )ÜÒe7ÁBQpÌÌ 9‚Šæs‘„İ…›\r&³¨€Äyb âù”Úob¯\$Gs(¸M0šÎg“i„Øn0ˆ!ÆSa®`›b!ä29)ÒV%9¦Å	®Y 4Á¥°I°€0Œ†cA¨Øn8‚ X1”b2„ £i¦<\n!GjÇC\rÀÙ6\"™'C©¨D7™8kÌä@r2ÑFFÌï6ÆÕ§éŞZÅB’³.Æj4ˆ æ­UöˆiŒ'\nÍÊév7v;=¨ƒSF7&ã®A¥<éØ‰ŞĞçrÔèñZÊ–pÜók'“¼z\n*œÎº\0Q+—5Æ&(yÈõà7ÍÆü÷är7œ¦ÄC\rğÄ0c+D7 ©`Ş:#ØàüÁ„\09ïÈÈ©¿{–<eàò¤ m(Ü2ŒéZäüNxÊ÷! t*\nšªÃ-ò´‡«€P¨È Ï¢Ü*#‚°j3<‘Œ Pœ:±;’=Cì;ú µ#õ\0/J€9I¢š¤B8Ê7É# ä»HÈ{80¡Ã\"S4Hô6\rñ
ºŒ)°¤ÄÊmcş€BœNšOc ¾ˆûÒ\$@Zğ0Êskr1\rÜà3¸Ã˜Òå¹£\nêå¯d9TÀ‚2.°øåÀ¯œñXå#Æ‚ÒÃpÎ(,Sı\0@Hpè4\rã­`…Áğ‹&â‚420z\r è8aĞ^öÈ\\0Ô’´N?#8^ˆğpçBAxD¨ É{ ß\rÃ3òƒHŞ7 xÂ*cxÖ0¦4rÜ)ÌC¨ÖÂ#­jüØ
K¬R…Äãšƒ»”Æ‡´R‰L	Ï¢È2C\"40Ë°ÎŒ„£\"LÅ€NS•N]•?ù‹*;BXŞ6I\nmç3 ¾=ÀPƒa%bHÜ1²Kƒ‘Õê<8Ñ©A6ŸÈ°]ş˜B0êø´ëp‚DŠ	>X3ã ô‡¨Ãb†ôŠpc\n'£`ËP£Ş	ƒJê:0éHë¡0â0€R\0á¾|Iõ'£:‚†%0üB…ÅşùÎk¶4‘9¬½\nbˆ˜@ã»+¢Ênsß‹áóÜ.ÅQôiŒt‚\\ş¼§\\Y½ÈÇ}zO¾;û• 4s“HŠ³<†ˆtR\0é!PÙ¸\$µw\"§^÷ƒáø¯ö6æOuÊ=ç°â’4wü#8=DaˆBºl:²¾ïQ`æÉÇ(‰ş•\0©à0e7)eîÉ³ Æè6&#ÊAH9	€˜3\$>M‚¸yRmÜÙ\$2JÉhuw=ÎPÄ™ô;Á…d1 å
2
t´¹”^©VËÀ&†HNUÃ,*}jB‹8_]4#rÈt¡I‡éYa ˜‡b<)…q2*Dè`œa’t†±”1C•ïZeQ\0:BE™+AmT„“ò~ÛyË\$„ªÃÔ0 İ\nTj•Å\$HwX	œ\rèXL¬•–³VzÑZkUk­“.·\$aú\\+”6óFPª÷]@øÑ—Ã”&WÊû&ÉùPî\\°s%1I)Â5<¥ä¬Wzp€
Ç\"R\nPhQ\" †rRÍÜÑ+–òæ]‚é,`eYËAi-E¬¶Ô [Òˆ9. á)`TÁ¹u.Ãdà§9.hfXƒâ….Ã˜n~à0˜”.TA}Gä4)r”A	aA „¤š¹@ÂåŠ Ğ\0001K¡áèQ5\0	°T~\nà1ÊÜPƒHl\r„™Àä¼ƒ’IeA„3uNx•’´ÁÖ•©4­Jùª¤aÍM &˜iZv\r@¼£Ñ+ôE	ĞQv·ùs©õE¿F3G‚‚%äÄ™—føáb
%/İ)=D¥¹rvÂçDÀPTLH¢H Ña2v(hÅ5±úCÃFBĞc7CÌîR–÷aa¢d´Ñ‡¤\"œ ú6~
¼¬«ˆ¦¬P?Wö„7´±P‘B\r¦&PÎ´ieB¨Á„¶PĞœ™ŒèiMDª[š¥üD\0C\naH#M`§4·¢Á…S\0ÛO!r˜Dµ\n?@Ö~”oŸ„ä·™õ]	RH\\8RşÑG=ÿ`”Bá¯¯RİËºYLKÜ)8åâš>A¤Öè\0|ƒ}Õ ²ìù—2O_\"<c\rY†•»ØÃ¡%9ÉWPÑ¬/²Ó\0f®ø 8˜4©B;ZV)E¤k\"b–ÍK©	“ğ˜_ØÈåÌ)TE\0‡%b™q*V’Ê’œğA‘¤‡†ÒlÙåm¢ŠÌµ™ w9s(­íw8@Ppd\$…Ìº¾²5™ÑêÜÍe±¯Ì\0Æ™rŒ;¸©³Óul³—d•‚¸Z.â&@\n	áÁ°˜sbèM~;è(9ÓÆhC¸ î½LiWèx˜Î™2‚Ì”\r@!,q(\ré·İ¤ö@°‘˜QšÂ%áğõ\$Ëá) yÕNPØB{*ëÌvúÕñºúä£6¹pd¾9ÀŞ¬Ã›Úv˜¡—ÃFB»\rPùj¿é\rö|û*\nJ<>²NCz+Üa=5	²†×†^2ÆæDæ\"rö‚¡®oXĞ¢g%¢ %¬vj0 ]”šxt¾©zVé5Û×zü¡6a§õÔ Ó­Ó›—b,LáĞ8Ù‘ã©|—äŠÒƒ\"87NìĞ¥nRNĞÅ0ÜYÛ¶şÊ!±aÇÄ<U–K–­ «@†Åbı4w>–ı££lŒÀƒÇ¤)yµšêóxWgšPêˆ©§m³ÂTÓ!üI¼÷H=g°‘)|N€€ …@¨BH#ì–‡v\${Sq˜­oâ;LGÃ©e@¼¯2ö@„™™2(H<ùdö‘³ğä‚[œİb#ãW%« Û½Kµã¼™“‹şk¹yÀóçªÌ{jÑø2úLN½°o¨d1z\"zÌÃçW¿ŸöQ÷ÑæÂGı;*òúŒË¦PÆ€Ê¯ø)Ñ~úiô}OÊúê\0ãõ¡çÀ(çí£ïZ~ò`ö‡é~?µ3\0‘ÛÏgàü“!Ì¹Nr˜#B8Ìú*«²D–ïàÊ
B0Oéãä^€Ì‰ÄP<\0ä¥ L\n´ÿÂH7dÄ \"z52±ŒÒÍ`Ä­a2ˆÎ>_ÉŠ5HD(ÂM@ÙƒòLˆBJF¬Kƒ0k’9àò Ìp-Îªd\"æ× CÄ#å8‹À«RÖêHz`àê'Î.²ìõ È€Ğ¤×0¨:GÖ¤-ô(0¾ê‚Î˜ÃdêFĞËğ§Ïnø0ÈäĞáÒxCòÖâ€&Í\0ÏgÌt‡<—cF‘& Ã6ÎäüÜá
¾C‚ \"@ dƒ„4èßÑ&Uã’lğşĞQ44ã`\nñ((ìî{`Üåâwî ¿°æ³\$xágFx\rª\"
vpæ¤àRHÌôH „Q‡Ôw1T—p”×ÙÑ~yiÏÏJùúQeÂQŠ™„1Cİ‘©hYñ±/q\r ¦yD\rc„–qÍñ²XĞù	ÑÊâ —Ä¿‚l\n°/ Úãë°ëÆÓe€.¯‚öÏ÷Şùh†ë…fˆÒ	Œëğ1 ±Ç!Lüòò’ò!Ò%)’.øÒ3!p¸fì®è¶¿²C)fs%…%Ğ§\$Ñ¥	Ì±‚JÑÅ…ğª®f2®lÏc¢ë¤àÏfâg¢‚¹ä,®‚NqD@%jˆI'68BÖY!ÂZ¤í˜%¤8åÄp¡\$Vr–olù¨x?%Ÿ‚ØI÷,\$¶)Gp@EšDâ Æ
3'd¥%°İÃG-dçF0ÕØ5’›Í:ä&(Ïr'Æ*säq¯\r0—&0Úä\0äbNDÌ/ğ÷€ªxMŒb:ã†*9Ìº*İâW\rRb×Àòìë\n‹2BDQ[6“m5ñÁ61µçm16³\\%­Šx‚ä–ó{9\râJGîqf‚% Æ=C€8ÆüÕ,T@
“8ÎĞrèôE\nlT¬¨ñ2 A2`S“7#Î¿=0ñ2Q¹<ò?42ƒ4q¦å€@ì`Ö•óaé%!î¾SJ|‚å?“ı@³O@2\0bÀîÅíÍ+Dú2\"him·>Ó3=‰gB’÷Bó#>ñ·dü\rt*4óá\rå?3‰´IC´	4Ó•E”JÃFÑ6Pš¤\${(ƒ(sõBTF4\$„.™/ôoC,7	Ôˆ;®HÒ_ãrÔŠ6Ò_DââTVét˜é´‚x´´'Îš ©5®Ñ¥zè°*Ôd\n´ÎíôÕIñ[	ÔÜCTĞHtã&ğÅJ#v™@æXæ-Óé=ãÀzR¾Lc#63µH­<Oâ<ıàï:###ª¤\$XeU&§®\r5-R5Sg¯%C3bªnæ^Ó#ÄaÑıRìû
ùÍ§!U3#oTˆ‘[%v‹õsV¯—T€†L@Ø`Ö*¢?QFrJ\$âŸc)Ãº),®1,¨¥µO.,\$Ä6)BØ/‚^ä¢ ª\n€Œ p&Ïu\n4,¤j\$æ÷•Ò2rm
û]‡ºÊuˆuâù“`‡µÛZ\rkÂ@‰DÖ#	€±\0Ä#¦¦Öªµ&8(†Ì-Õnôê#XêbJ9@W™GBãºj'\$„tSªP9ef5Œ\$#VO\0C¾`ƒğgĞ‚>=MKĞC¾ä¢ˆ2B @ŞŒ¢cJgÇûÉ\"ZvßV\nbsÖ†^Õó06íwV/Ö£^„o0³jö´3Q3Ó7HB9æÕE{gu:‰‘V%\"\n`×•«	ê Í¥Oe¤î6æI\$pÌ¦v«&\rGz-Ç¼BƒWã,=Ptßílp°m#-Vâæî¸ã:MAuÇ¤ÑVˆ˜Ì	UªÜƒKJÄ>OMfÃ×P3á6h#hnàŞÄşLbBt[BÂÜQ\nbìƒ yÀÚ¤@¾% ";break;case"pt":$f="T2›DŒÊr:OFø(J.™„ 0Q9†£7ˆj‘ÀŞs9°Õ§c)°@e7&‚2f4˜ÍSIÈŞ.&Ó	¸Ñ6°Ô'ƒI¶2d—ÌfsXÌl@%9§jTÒl 7Eã&Z!Î8†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘ZÔ»	&))„ç8&›Ì†™X\n\$›py­ò1~4× \"‘–ï^Î
&ó¨€Ğa’V#'
¬¨Ù2œÄ HÉÔàd0ÂvfŒÎÏ ¯œÎ²ÍÁÈÂâK\$ğSy¸éxáË`†\\[\rOZãôx¼»ÆNë-Ò&À¢¢ğgM”[Æ<“‹7ÏES<ªn5›çstœä›IÀˆÜ°l0Ê)\r‹T:\"m²<„#¬0æ;®ƒ\"p(.\0ÌÔC#«&©äÃ/ÈK\$a–°R ©ªª`@5(LÃ4œcÈš)ÈÒ6Qº`7\r*Cd8\$­«õ¡jCŒ‹CjPå§ã”r!/\nê¹\nN ÊãŒ¯ˆÊñ%l„nç1‰ˆÂë/«Àì¡=mÃ7¶‰lnP4·Èƒ¥RR+1Oq4É+¤şŸJóÔï>Ê++8ÂjºQRÉÑ€P‚2\r«Â\rğSõpré#<èFÁSĞî4‰øëVB)(9`@ ƒC:3 ¡Ğ:ƒ€æáxïi…ÑµB7 árè3…é@^8BUøÈ„J€|£3¡ğ3.‰ãæ‡xÂ'šJ2ŒkŠó;FÒƒ¯R‰>]²°Ä±lk”•+ÑÎ4±Ékbñ`˜0œ7ÈÌºÏ¶€P®–HpÎŠ£ @1(H’äùKbcxØ:¯1Ò=˜LNt´¸²pÆÎÉÎr2 ×oŠ„çŒkˆ2Ãc¨Ù-Ùœ¿{5÷ËšÇˆÙ¤Ù¢”øÓ­åâ‚l1à¬xâá›=F6\rìrö'Ø	CçíŠçKâcØ„§)ÚzŸÔš¹ˆ3b0k#bMZ5è›7g	àÜ¤˜¢&L¾îÓ‡áIlóÑ÷ê)ĞMXçµ>Bêå6=dr\"õcª‚Nıù>tÀVÄ4µÈÚï(	#lÁ8Â(ñã±ırV–ÖŒ(Zôäü\"OOkÛLî9(ŒËª	v\$¼Œ\\oËü¼P9ßL8½a¨¦ã4m*Yã0ÌzÖÁ8 Ékœ£&HÀT\rå\0‡”@dƒª®6!Ì34à@Û
¹’XGŠ ÎKÂê?¬±k«°Ê\n˜)^°L¾˜{MÁÌ J¥W‡2nNM9ø6K°–¡åb§Ö¹ XM\$É\$F±\r2ÇY+-f¬õ¢´ÃºÕT\n‰\0­µºyH/+¾, }Éç^+ÎÀƒ.W5FÁ…a ô4‡9âwf©Œ˜ƒ\r
•êB¥ú4™Ô,°Ö,JYK1g-¤µ´T[AÉn-çİNjä\\Ï8ö‚#>)æÉ'+“là`k@êàw\$J¡8&Ê’¸É!bjhç–çä	™qp+wÉĞ:DPñ'2`Â£Ä4†°T“AˆB­ÕÉ»@çÕ'Xı*	Xl~DXË†„c#É
‡	Ä 4\"p‰'(AA@\$ó\rÁ²@° èŒLXs#É\0’ÄhsVÄ»V&ĞšĞÒkÃ9Ô#ª¬ÙÕN@ÜQû:™®“z¦×„SJ wW½7„È*Î²æ1Èx2À ß(èC\naH#B\$Ş(S‰7\nH•¢^»Zq,.1ĞÊŠZ‚‰ÃM	õ”†Q]Â 1ÏÊX^sÒ~ Æ-!à@†	jc'IÔi6NI&‘\$DÉC&W&ôÎ¶¢¼†‰±ˆRiĞÆÛısHpz£…\0Â¢³ª\$ñø/Ğ@Ò³“¥ .†@êBÉq¾rN¶ÊŞ‘‹3²Ö¨œÀÜLêVpÄe€§òAIê ’¡½+ Ä]œ«—CTÓĞ@‚¤î'¬˜¢¼uÔƒ5y®È’ `iÉ!²bvF„Æ¢(Ò\\Ta9 ('„à@B€D!P\"İË¼(L·‘AÍXcv¢9b÷¹…X0Å<dêÍ— ]1mY}ĞQ†,Ê!F`ìaQ®¬Aj†
¹¨G «PÒâ—¹ )İ(U!CIJpH!„œ;¤zõª©%=…æxÂ¶ª¾Vt©ùçcŠ£ôJiÜÖ6Ø&”µB(DÌ½£R\0PV ó†Ö,ù6@Ï¨#hôé‡„M“*üí“oÌ»Xæ’QÖ[!Ñ´)“ŒÌCbk:îLÒEšˆKìÅãBdşÕHHdIt£a·hì©¶\")ÚMœäÉ‰Peù\$ÌæRq³kÒb5É“^ê‰ºUWİÂëBCjQbeà¹iƒ×°!ÊwAİ2{uX0TÓô\$9`\"cŒ†³ îúSÙQËÀk<‰¬V›‡»MÉrlXøÅÉu\"I@xÑ×ÃÕ¢N5ã\n!„€@Ú‹ª\nu½T‡ DÏIÿ#%æÓ*–Y`/,,±ï“hÊÙ6õ4Q˜Á\rŞ_—Â»k
zíìFf:c_ ¸ïİÜ”ÊçÈñ°§ï\r¾ÈfáUtŠÎDC®«%™W‰ÂpË\"'SaÄ“qÉÄÎaÿáR^–ïÚÓŒ¬åœ—Æ³dÒy‘‚æ„áårSŒŞ•\n&ÁÜŠIEVrŒiK<}8„f¢úú‰Vª¨ÜúÚDä”HÉŞP*(ª.´à{AC!Ü2†,·ÑyíaE§û06c¡²… çå[\r¹¡ş&ÄP\$ol]ZN\\xÆ<\"˜µXâ³ß ˜ªè?\"÷é)Šb/ËğwÊwL§–Ò9¤“¿+‰în …„¦®¿èÈ#?%}~ù»Ã}ê€QFN¹\$½Dkô.ò¯€› 	6C{«H×,ã|–¾uÚåíöß:ÕûÆØgH¦“Óˆ+Öy¾8ÙG@ä‹í€«á»GBoá¼ı,9ÑYòÃÔc,pg	Bbx—øaù¬öoêÿ§Ló/Z1Î¾ÏçlDOæÅˆo nÿï9ÄDû¦òÍVoÌÎ9®Tç7âÏ0á,&îNpä{Î*ÿ ¾6PDtÄhÕ‰ìº‚¬:oLşb5\rZ`\r_°ûÏQãRÕÆE Ïdÿe<çæd¾,N|Âì%–ëƒ?I`3c¼p\$œbŒ6oÂXDobş&¤@ OÈÀmZRdDÎD…Ôp¨XàïğãC:gÏfüPÀŞÂk 0‡ ŠOR0¬=\rÍJóGBSÌùpÖÑ† ğ*õ\0¬ŞĞlÅp‘1î¾Æ¢Zaƒ=- òpo‰âÏ]±I,ÔÂZ±Hf\rª§q^2\"DjÇ(¦`g|û\0SB2Ëé*áOšlc¨(©P+qBó–«qŒhQä/›ñT†ñX·æ´Íq
\0£”Ç±˜ÙÑ`yä5#±J\nÙ‘šc¯À#Å\nj\$2Nç¼ûlOæÎaUÑ&ôèW±î_/buî¾^ÑùŸ\0ÏQã' qı(²%b)q‘Dü1ªNq¸zÃ!’4fíd.Íhô²(†ò>òC‘ '-t%±1ÑLÓ2JÖ‘Öæ®%²b×b\0ª‘=ãæÚåúbQ’òÀ«'Ä• ¯9(jS2‹%¢p	\röNƒÚg|KÃŒ’‘Š8ÆYÌ~pH_Nm+‚@ª¯„†BfØ_bdĞ¨6ƒ/nê1æXW7íæÒè2N2ãrÎcÄ\r€V¯àÒm@@\$€ôAHlEÒ#1Ü%¬:o Zm„Xq ÚCÄ0Š6\n ¨ÀZ NgÏ4dNOä¸®Ÿ.î
¥Ôªªã‰¸)¢8G‡àŸªàÅòjVO`Áf/\"Í,÷2^>Í¯\0\rr1ÎF¢\\äÇæ¶†L] y ™:ÎwÂ„ƒ\$ratiâŠÃ.Tr‘€5ñÔ0c\n6F(gÎ|ÒFh1Â…P’`‡bè'o2P#€GÆ6Pd0 i(Òİ	VöóÎCSî–Rƒ?oR5óı I\n\0ŞT3BÑÍã—ƒ×‡j|Eø«\"ò6SêÁov¿ÖÃÇ{E|üM4ü§h\\¬#&ôÃ:ó­ö÷†ÈD+¹B¬ÌSÂòIÉBëä»1í!=ÓÔR¬<vÁïìş%ıI¦p}I î.¦ù @ëÑğkªrs¶M>ä÷,¬XG(=>à";break;case"pt-br":$f="V7˜Øj¡ĞÊmÌ§(1èÂ?	EÃ30€æ\n'0Ôfñ\rR 8Îg6´ìe6¦ã±¤ÂrG%ç©¤ìoŠ†i„ÜhXjÁ¤Û2LSI´pá
6šN†šLv>%9§\$\\Ön 7F£†Z)Î\r9†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘‹ªË„&)A„ç9\"™*RğQ\$Üs…šNXHŞÓfƒˆF[ı˜å\"œ–MçQ Ã'°S¯²ÓfÊs‚Ç§!†\r4gà¸½¬ä§‚»føæÎLªo7TÍÇY|«%Š7RA\\¾i”A€Ì_f³¦Ÿ·¯ÀÁDIA—›\$äóĞQTç”*›fãyÜÜ•M8äœˆóÇ;ÊKnØˆ³v¡‰9ëàÈœŠ
à@35ğĞêÌªz7­ÂÈƒ2æk«\nÚº¦„R†Ï43Êô¢â Ò· Ê30\n¢D%\rĞæ:¨kêôŒ—Cj‘=p3œ C!0Jò\nC,|ã+æ÷/²³â•ªr\0Æ0˜e;\nÀÊØª.3>ÄJÂš–©,Ûí\$2S¶•µÒ¼A#\n’‹ˆ®ŒªÍ‰ƒzşÿ©ã’z7M( ŒŠ0˜AMÃùÈã„!Œ#‘½!\0Ã@Ã;ªJ\0ëTBI*9`@UãCF3 ¡Ğ:ƒ€æáxïg…ÔU<……ËàÎ¥axá	×c ^+òÑ»ãpÌ¾'ª› ã|ã=£òÀÔT &¤O+ªÛ¼µ¸ë*Ócb\rG„	jHà8öÓ_Ø\0œ7«òëJò¯Bº^7GˆÈCÊ„¸Ş:ƒ\"âŞ6¬\nu¯Y4œèËKÓ,1´yxè5»æ¡ªcôöCƒ®‚°C­5=6·“ ÊÙLÛ6ôÛ%§Åh¸ ÓŒwû(š0I¢\rˆ
	õâVÊGÙ£n…:4Ğ˜£*TÒwK¨B
¯BŸ„i£bRÅMª-5ÀV\\Ÿ*¢˜¢&L[Ä>îc( àH[ª!PñõaEá<²`ÛëÏ ‡2óãŸC+½6ó\\ÄAÍ7¼æ®›\r#b<¿ÊHÛS²‚(ñŞ3}\\˜phYuôO8\"@WSÓòæÊŒûˆï+	>Àğ>Ãq\r{1:V9Şlx·¬Ìp3mSX—»ÃxÌ3NtÃŒ0³IĞŞ §ÃÌBeÃªª6áÌ34&À¤¾<¯ø0†wğÌ\0 d O+pÊ\n˜)~ä”Ş±ÃB‘ÈQ’7¤ä*ãôn90CêµN-0ä¯™ñ—*}`Õ†±V:ÉYk5g‡u¢§LÔZË`7ò’`WTE@ú#›ãÒ»rğ\$f² 4¢ƒ\n¾Bm“ÂÚ0-D ğ»3`ÊNBi`jå\n!c\rWë¬e²–bÎZ
J  8†¶_2:
}p» àmY´P ĞHÜ\$àèPÛ7‚„5â¤‘±>M İ—Ã~«ÌÄSjª Ø/Ãªkƒµ2e&ƒ¼ªbH VúIˆR“˜ØaÑ®*¸	¢üV’<àãî“ˆLqM¸6>b2gCB3/è…ˆ•z%0È ’J0 ‚w“h€RJ‹232AÌ–LJ	Ë&\rÊ`1 ÎnI³v¦Ùªspp•®oÇõ/JÒ%Ä [d)rÌUÊ¼l[²Èà†0Ñ
òÇ–²<ï&´?ßÔ•?á)… Œ¹Sˆ¡Nr°(ÒZuHä·hLÄØÆU2NB‰Ô:)ÑÍ\"ˆQ¦Í'ˆòL¦¢Ì4!HF<!’`‡	¹0(‰LÈÂrH¨y5hª Â,Jä‰Á7¯d6iÈD-³ÿ†6Âˆ\$yÂ[a\0Â¢°1J ¾Eì:U;1œ%ĞÈHq18mĞUº§•u\\4eL»7hb#Uodq€§ÜBIò!á½EYS=ÜPLCsí‚’à@‚¤áq }İÉã¾ƒC5h«áÈ“ 7k‰:&4ÄúºEr.Ï›ôNš¡<'\0ª A\n²\\ĞˆB`Eºda1«ÊS™h(ñ†(¤qændø 6@àÕŠœ\r-)zO‘†,Ê)GKâŞªåä}/ã_@á¤<¤ºQíê†y.m!§ä\nØ uÈ%å\$5ÎUus‹
Á¤½2a„Û³±J	Ë¹œ*EßE{sAÁ¬@4 ‰xi(dœÏ¼çÒv‚±
`öqeÈÅ\\¾“ˆ©Gª¾i˜Y¿8JÃçRUıŸpu#Øt:‰Ì‡<N›s'f06> ¦CÒšeÔ@ƒ(6’Aƒ\"›ÃFmçºµ_ƒ©RBøÌ˜,À—­heà(+òÄNŒ[Æb4ìß;âåX!%Ğª­²ÚèOZü0\rçD93%}¨C¸ yÔ¯ İqX\0TÑÕĞ9{å¦&£!`((	4t[€\rg%`Œº\rö\rçIõRNtR‚s˜˜'öb¦Â T!\$¼_P[ğ«Ê•SĞWœ€Há9ğ%h&
ËL4lLÓ²7¸Ó¹§d§A#íÓZÉŠ7ªûqMÒLƒ1î^À¸Ï-Û^Ë&ğVñczn}ìi’ºßJ,œ„é®B2kˆ)Ä¿\" {ÉÌ†;şP SÀwŒX9è }FmùÆ·cB1FáÓqş-ÈfÓ>ä†+“<î_ÀÔƒpA¦œ;‘y\r'©3+ÌÊÚÌ°a\\×B)¨ôÛ˜¹U¼“ª›BD0Í\"B8xSá|Sh¼¯•^°‰€w¡‹(;î.uJáL&ú³Š9ş cŠAŞ!g™|\\2`Óm@¨„ï}Ëë>|åmæÃ¯@ŒO°¼Š!°ß†ñµŞDá²x½ÉL|~?Êyƒ}ùV%½ŞÎ\\§‡9u,¶c|v%\rÀÀÂ?M rï© L+×Aéı¢f„»×^%pòâV(ìÜÍãÂhÍÂÛÉ¨pˆiÃ„Œ\"—ªj‚AÖ¾¡S¾_ß]ï³Œ²ÉzøÅñ¨„óq ôZ
…\$óÙ¹nÊÉ
vÑZ_12vR«ÁG4½¼İÄœêL@vì…2,4ö¬\$ÄÌ\0Œ04cøIÌ7\0ÄP™/xê/m\0,NöCö¢ñLÚ å^ôP¯; UOd÷pN¥°RDpHÒ©X·âx2€¤×c\0â®ÎŞh\$àÏ.UÍòòmùíxİî`‹0z4OİP€ácPêM45í8¸m>¨¯\0A\n#`Ó«ÔG\0°e
P¹\nm=VL¯j7
şî˜{Bü%cœGÂÌÒiHƒæ¾*¤œb ¦XWÄ|”£ê¤D#¡Zı\"TQÉ_\rì00ßƒ¤,kİ	MóÅä¯ñîQ·ĞËĞÏ\nÍBö\n‚Qê?‹ö\rã\$MM,¾l<»ïîêLúÇp9l#c
³ìü3¯u\rN¢Ø‹ZÇo*×ÄĞó1¨p@×é%/hò‘›ğÒ÷(_V¾c«Í€pÇH¥±œfIÜi@ÂŒpÈ°Sb8É©ßB`ÅƒnOg&°°pÛQuĞs°<Â1õÏ3jÒªiÏÂs¦Å‚KÂñ¼xd7 ÌÿR©Fl/Dtş'4.ÏnË&/‘PöÄô&‚\rÑ3
ñ
RFIU\$Ë]ğ.Â2W\$²Oİ«òI%±3!ãª3w%Ä¬ñR33¤öæY¯:r†x†Y'Ò \$/*ÔBüÔ’Qr“*ÀÏ+lJ±˜öíT©ò\rO))Ç=,R®ÕmOò¸Ô‚t ò©†nò­ŒP\"ó+0[.ä•İ)2ù/2`ó 1ÀĞK‘êJÉä„-VÒ3h'\"¬\\öFSÍöÜÉó!bFÂÂøı“+ /ŞfÂ^†46#r1Cúƒ(‚fâ!I3/5‰¸ñÄª!ògÌcÊ\r€V­ÀÒkÂ,\ràÄ\\‚9#„4ğ¬ˆ:àÂ¦Â'1Ìp@ÚCä1Š\n ¨ÀZ gÃ\$Óî3 ÍîöOè	Y3(b	6«hœp™â8#Ï®ŠiŞ%#0Ã¦–ªOo‘S`òKƒû`!ƒŞ>¢¦Ê‡âÖ#ô:Ã'î(‚‘T\r1Xt£8Ë|R+J\\e1L”QCÒÕ‚†Rd¬at`BŒÀÃnåL˜>qÛ. ‚7p1Ói3Àäe\$ÖD¢·EÑI=/ØÁè|Ì¶6£pÓh=F|ŠÍ­E³òø4t!W2ÔlĞ »H0¥Hcş\ràà*b¢Ì\$/JDÀAªJä>Meê©I4»/ˆĞ
Ä0 MöşQşŒl[dÚ#†ŞÃG?Ï.\"ì`k\$Dl”°óƒ6#Ncîø£3B3ı96ÔTh2ŒA„ª&%oR°5qRÁ&LúbâúÌ²g'‚\\ÔÊè;\$¬öÄ¨¨3>õ¤¬³:";break;case"ro":$f="S:›†VBlÒ 9šLçS¡ˆƒÁBQpÌÍ¢	´@p:\$\"¸Üc‡œŒf˜ÒÈLšL§#©²>e„LÎÓ1p(/˜Ìæ¢i„ğiL†ÓIÌ@-	NdùéÆe9%´	‘È@n™hõ˜|ôX\nFC1 Ôl7AFsy°o9B&ã\rÙ†7FÔ°É82`uøÙÎZ:LFSa–zE2`xHx(’n9ÌÌ¹Äg’If;ÌÌÓ=,›ãfƒî¾oŞNÆœ©° :n§N,èh¦ğ2YYéNû;Ò¹ÆÎê ˜AÌføìë×2ær'-KŸ£ë û!†{Ğù:<íÙ¸Î\nd& g-ğ(˜¤0`P‚ŞŒ Pª7\rcpŞ;°)˜ä¼'¢#É-@2\ríü­1Ã€à¼+C„*9ëÀÈˆË¨Ş„ ¨:Ã/a6¡îÂò2¡Ä´J©E\nâ„›,Jhèë°ãPÂ¿#Jh¼ÂéÂV9#÷ŠƒJA(0ñèŞ\r,+‚¼´Ñ¡9P“\"õ òøÚ.ÒÈàÁ/q¸) „ÛÊ#Œ£xÚ2lÊÊ1	ÂC0LKÂ0£q6%ŠÃ3¼ÌA¹²0Ê6ºIÒgAÊ2õÅ/\0P¡®£!0Œ3Å@¬ıÎ‰ƒxÏ§‚f¢Ã*Îˆ*Zö™ÂğÊ\r¡>9+Rª®9¡/²9
Âl,;³CCef£ñJ9`@%ƒCÈ3 ¡Ğ:ƒ€æáxïy…ÊR™^Arğ3…õğ_ZøÈ„J|6¯	Âö3/\n,¾î xÂ9´\$¬ôX¥.„P#¬¬†UBhŞÌ¥ÉCÔò õ_<o.E’\r93”É‰¨¿´\rbºœANûJ+Æãrö3h˜È\rø¸è„º>’Å P‡#s;9jSöY#®¥J“2ºYF88s:\"£56+C²ú:À¢,Í½)ò1Å£LJµ»É©!é\rp»¯(
éDÕ¼\\kR¿ê`èÿ #:Ñ¸Új:ïJ´Z€À¢2j›2#rÕê®¢&à9 W1¹8æóº9xÓ’ºì
P¸°/uŞ=MXÑMÕBäôéGiM³¢Ÿ¢°L ÊƒË¾\rLİ7›ì|ÏMñ:\"_'åcWJÊ]õ]j sH„ézuSBÊâîˆˆ¦¹iÂ¤Ò\nò¾¥D§(§şÕñ	;ÌŸò²[bh6\$m\\4€ÌƒbÃ'¡\$‚şy¸Wå<³Ã˜f(a±[Ä a aVèÅ´Òˆwˆ(`¤ª¢Ğ@L”° fœ1¬òz\r¢)Ì0¯ U¢ÁÁ^äÍq´zaÊòä
™´®•Ö»Wzñ^aİz¬%ğ¾âı\rÀ½ÆÁ>¦)¡±'ÊBp'\$\$€£å¦Xƒ‚N1K‰ Å\0æuÃ±×ŠÁ•+|fL
='¡5\nŸµºÀQ2:|©8ğ‚åÆ¹W<^]‹¹x/%è½–ù_q©~‡„y£ƒ	)¼Ê§òô(Šm4s‚{C[\nD*íª²Æ+9P!”19Âq!ÏQ.W%á¡8ñÈâV\r'p-€ØMŒ™7Q1?´pÂ¤±ˆ¥bÂ¸Z`VÁÇ8aÛ§ø„y9İ/°0Ó#¨&¥y2ŸªHœPÒdá×hAŒƒ›ˆfyÃq,l(xÖCr½›KJ_²ÒnĞ#G|Å8ä¬‚û
¼Q ÑCòœKš\"*ğüÀœv‰![Òd;œ‡i\rÃ:ë0Dâ›D%hIèC\naH#\0ß0LyEa¤1É<	H3Dâr\$´ÊJJE(äy.’VrkRáMCí\nª£’XÃ\nÉKæ‚OI@Ô^\$q€l‹‡“d…ÃKGY„7KãS#®RDµ ‘è¥*gš¾ˆP±
s’ˆô“+„50 Â˜TŸÆ-”¹‚Šy\$ğT/.I<rŠAÉ-W¯Âg¨ÂˆJI}zQÄu@Bm‰q
JˆµëØÉ6‰Ú?ŸN£‡
\nRÓª±@)º²¶MÙ,ÁP(Ë
ß\nÌ‡åh3XÒr‰ÚùjOƒÀ€ä¯@QÛR´î+…T	cf	MßƒÖ~Íóm€¦(„Õëz#IıÛ´şÇY«z	UË &ğA1!Ô3zÌÉ€PM(Ê³,–‹ˆ‰†\$\$À‚»´Só€*¬ydÑ˜²öÛ Èd,ª­ë#—²¬á®h˜º€#Õwøıø¾ƒI’Ÿ{ÚÉ­”´’°e(Vk” Ê&Z‚±3™`©©uè	 à€(‹ºT>/jÅTlÍœ
úoAôÅ¾–³|È5õƒæIB\$ÂZšo\$-Å¹ğ~‰™ızO3SC·qÔ¼“Vä¾èvnÃ(wNá–Ò²²àÂ¦„.Æ|Ã‡‚Ş1:åïVêó¤C&ƒô\ráÃ²7w¬*ÁQ˜tõ<òešo{g‘Š@7Hàö:õd3à@\n8cÙ›91‚œ4ãNººJñ–6|€—bt,4Å=¼¬5zl%­İ¼¨³¨¬\0PE'm\n[?Õ¢Y×PğeD¦€‚ Aa!ÖºòeKÏ!·C‹)R Ø\rlÃØ®Å;Œx ãõ™Æ3¶˜Ñù#:5À((ºøHX¤c‚‹ŠršĞN/Ö¿%zdòÒgËÃÇ12<Ì¨òƒUÊ’‡9dªÀ‘¥’@°<¶O`œs‡ĞÉì6ã½¡ ]Éøo?»Ç«s\$¥\"6ùè=]ZU¢´ƒÃ»Eg	M™ã²Ù¹€dÄªû¾îU¦‡ï©Í\"®fzMÿ¿”7ş®¯=éí]ë÷b‚š“H´¹œ)\0@ß	‡c&)\$ôoçøÄ3Åd¼Pv¤Cy|g‰ôÔç&Î#–+)SˆÖôW‘	£^¼†ïr‘½å%¾üÔÑŞf±ß¸{Şîû?ÿ}\\O3ôŠb•ê¢‡õşFˆÿx›~‰¯ºXtülÓïüºâk1¯‡À’p–>¶k„@R_×™jè`bö·*ãCJ„Nb¤\"LòQÇânL.k¦„M%|¬\nsC¨úoENJŒ&ƒ<°¢ÄÕêÜÈO˜éFbéŠVKB†Ö>ÿ¦º¬=@Pf£ìràÂÛÄ²†jÇŒ–UãüÏ8FïˆÆL¢ÈÌŸ\"rLwGÜ+Oàûb{	L˜ùL†üë÷\n èÒ†Ç	«şøOˆÒgZp«	í3
0ÂüĞHçlv%t2£¢0¸ì®†Ü\$*íàJhèÊÎgpÅoÑ®y«O¶7-Şdòù®J5Ìƒ
ÓÀ†½…\"•Âgğú®0~ølw'¯c÷ĞÑğÔû‘8Íkİ¹‘6Á#‚¼™iš é #Š¨:äªP€Â¡>M°PKx¨^<‘b™ãÀ,cx%B\\ã\\\rÁŠc®;(J¦Z&ìÃ( [¬çkØê±(Ù#JÕ&h¦¶×bÄ\r¢Ø‘ªôĞ^ÔmJkl\r0¯¤ñíO0¹/‰¦U 0üÑUdíI±î@­ôWÇ. OÛ\n¯8øc.ßr\$OËÑDëÍó\"Mû!¯˜)GVïÔ×«ö<4e†¾¯j²JöîôÔ‚B:@ÌaDE,'Âd¿ƒÌ:jŞ\0àò¯şvæş\nê<&AïÃ
Ìw(QJ’\nÎu
•Ò‹ å±Îò­è ÆCPé)g“ mæ\$ë‰\$ìÊ²¤F¯l<‚EòoA„p*ßb\n!„r›Lw.2æWÒë.ò› \"{/‰.7.ÒñRŸ*Ò¸=Ss!òï,‡™1ó\"s&K2Õ//ƒ\"(Úd´6àê’s8µ3çÕ4\$oKT!L#‘13©ù5­ªHr›òC6“_\"°Ç*³I\$gÔ/3jMœy¨À0NMò3!Mú@Ä¾à…H·Ó8üSœTdÇ6µ7z\n³L3£;	îş 	*xàÈİÒÎ3  Wj·¯f\$
O˜?eîÎ¨m,Â°ëàƒJã>„ê1sï(lhXW£¢gl/®Š¥sÙ³ä®3p:îjèîo?Sù;2/@õbò©%\r€VÛFb\rq¨7pôÎ\"WB&…¦„R.H\$r\r¨œ+IÂF ª\n€Œ pGBN×Ãìë&JÌhê¤Y¼ì„\$Ğî=ëÂèc,Ÿ¢:#âB\$gî‘„×	 fgØxgbO\r\0{ãÂ3Gÿ”Pšl€%Òœı)‚‹;:éÀ\$#¸sb.0Ó2Av¯Lhæâ#Š¾ôòheL†DêBjMÅT„Ş õP£fÑÄPC/`rêšÏºf‘Z¶Ğ«FTœıu  ´.Àéß2µ#!ÓeIñÄ2¢œ6ƒl2k\$×dÜÓÕ<G1 eRäÈfÈãjjÕD±4õx;´lšj¤¿X¥CFğ&#¤DG>22dĞg8oL´ˆp\$@fepŞ/ÏÆ§EbêÏÑêFã:u&öCJ	¢CWÂ8m‡zÉğ¦Ä5â4¦§Tfê\rëÒâò~2ã“³')E(#¯‹4Í·â\$À	\0t	 š @¦\n`";break;case"ru":$f="ĞI4QbŠ\r ²h-Z(KA{‚„¢á™˜@s4°˜\$hĞX4móEÑF
yAg
‚ÊÚ
†Š\nQBKW2)RöA@Âapz\0]NKWRi›Ay-]Ê!Ğ&‚æ	­èp¤CE#©¢êµyl²Ÿ\n@N'R)û‰\0”	Nd*;AEJ’K¤–©îF°Ç\$ĞVŠ&…'AAæ0¤@\nFC1 Ôl7c+ü&\"IšIĞ·˜ü>Ä¹Œ¤¥K,q¡Ï´Í. ÄÈu’9¢ê †ì¼LÒ¾¢,&²NsDšM‘‘˜ŞŞe!_Ìé‹Z­ÕG*„r;i¬«9Xƒàpdû‘‘÷'ËŒ6ky«}÷VÍì\nêP¤¢†Ø»N’3\0\$¤,°:)ºfó(nB>ä\$e´\n›«mz”û¸ËËÃ!0<=›–”ÁìS<¡lP…*ôEÁióä¦–°;î´(P1 W¥j¡tæ¬EŒ ºˆkè–!S<Ÿ9DzT’‘\nkX]\$
ª¾¬§ğÔÙ¶«jó4Ôy
>û¬ì¹N:D”.¤Â˜ìÂŠ’´ƒ1Ü§\r=ÉT–‚>Î+h²<FŒ«Æï¢¬¹.¥\"Ö]£¦„-1°d\nÃ¾å“š¿î\\İ,Êîú3ˆ¡:Mäbd÷¤ÚØî5Ní(+ú2JU­ÌüğC%á¢GÖê#šë\nÇTñæšä,ôóµ`#HkÎ–ÅµJÀäLjm})TëÊ£U%•c”Ä»ŠÀú7“\$ÛqN\r³
9¡\0G’jŒ“\nu2N·\$=\\¡·R2OÕ³uÆŒËnºTá6HhÔ¿â2O9ÖÅr”0wd V•rÎ# Ú4Ã(äÛ`Ò?3©³SË\r\$¬Bb_¥EÓVÖÛ¸‚ÃAš\rc¸[İĞŒŞG…\0x0„@ä2ŒÁèD4ƒ à9‡Ax^;ëpÃ“eP\\7C8^2Áxà0c˜ï²xD¹ Ú\ràFPÍsè‡§)*§¹D2š\\ xÂ.¨‹#ÇØEêÖÜğÆl@&.#	Êwâd³Á‘< †;…¦3Uñrh_«2:MÂZİ»D2
\$Ü×û¯p´6a?ôH5®îBÙ;`£&v¾¦ O‹ãª¯×•ãnŞC÷³wB»)¥ú2M/*8‡·*Œ’W¦§`–#á¯6í¯¹L5ë’ë•bşrö˜©ó­Š	 HÆ,ÁHLIñKpGÑP ÊKİzp+Mƒ—“BpÈËMâ9»-T´Ló§AÁA&ãÂ’¾R)±!ôM\0†€›[È`›ÇìëáKEkX1•²éß*P?„­–’3Ü±Î{°?¢,0¢k·ZìÔŒ’SRÜ ‹I1\"T.tİC›uq}æ'vKXŒZ®iÕ(—<`ÍÜWÎej»T¥k€GQÅô³XVHgKìJ5 [\";ı+š-EúSÓ¤\$#\"´á§4å3&FÂ7Ä“ø4]”tì9/À‚ BqäA’¨‘ŠÂH¤9†Ä)q`²Ñ-¥Äº—Œ¬¹Kàğ@s\r!¼7 3şî\nb A°: \$ˆËQbU¦®ÓhĞ“‰*‰äâ¢#xŞRÄ}Y—´ÄLdâÅLµRŸuê¯'^ÄªCÅ8ÑLˆç„‚?„2Ñ[èof›0\\W¼ŸJ³¤§Aõ¶^¡Tï#Ê¶yHIèÄŸ;:›é”XO¹^gòF 
¡P2\"Ê)\r¡@§Ğµ,M„]¢3‰½Ú-;'r6qŸ¦Q=iø¤”š~´jTóie`f˜#Æ†\\i¡M!ôŞq3:¸JâÛeª€©eÚSÊè_Ô9&ÊÑ IQ,=p^m§j¦é%dì¤94”IÊŠ&Ä0èšârQÈBÇ¸çv–ÓZ{QjmU«µ–¶×Zı{lM‘³6€^&`a“-´‚&êªœ\$XG%á¸W§Tüg‡¦y¯ó¶`ÊOÖ4¯‹¦“YT•bªK˜ğ1SŠxi\$º”•\nº\\Q­Ì) V’¼pçİiÍA©5F¬ÖÓ\\íy°WÆÆÙ[;i³dÚFäİÀ;„†'z Bmp>¢Æ0ÒKªü!ç´«Åá÷<Cgm’&x’ˆùLUäÏIÕ¼\\Ft)pM1«¤8„%‚¢#ª©a.ªâÙ©”q†¨ÙÖSSië#jÅ\nJañ#²Z°Ô\n2¦§É°¹¡ŒÇ\"\nP!Å\n%JOĞci²¥4(ºSË_ÛÊˆD\nÄê³Kï±yóOf”¼à•`Ô:DË®\"B–]LSE¬ÇÑ¨‚ä\nK¬‡#øxhâ ñ^Ÿf3w¨M0¼`¨è\$Å…•=_K…e’qân*MLÔ_C]7¬·p›­Ñ)¹¡*ü gsı¸'Z`wßLÚÙ4àÔóm+*Y «0¦‚0-À)`ùRf0bV»¤°ªQ¾”8æJ‘^P„¯ <}'m[ÔXÃ¨g}5›í®/ÛŸ3]E'=Ö ­	åuÃ<ó1ñ;¤¨Q”EÒv°x¥Š0Œ‰\\bŠq\\ØÁeP¿ŸÅ=™rÓ{9?DJôØkîÛÚ­rS– ÊÒ€‚æNcµOgQ¬`-ääcØ4DTy@'…0©Yò`©ˆ*ÎzXú“Påˆ«¯¡¹MÏ˜T˜é-ÂÇ9~–Ğ¨ô…³’òß\ni/RÒÆôz/ÇˆşR8ŒÆ@ïB _EŠG¦»hº`äQGU<p±Äè 4IÉ}'¤`¨Ù×d\\HIt8Ñ¡>š;™x“2óLi+¨IWo-Üé‰˜\nC9§AEÌ`ŠÊ&êÌlñ'³ÚÀü“ƒò–ˆÂ]J\\…ØŸt«ÿBL½ôK¿¡¬²±\rjÔ­‘æëT°ND£¶½èÂ£*OU¹ƒEÚD¢±?~¯TÂ‚ÓD#o
r3»N.Y™U}Ä í¥rX>5%¢ËÖ9Îl¨wÑÕŸè ,ßaûüC%TY4K\$æšû8ÿöÊz\"v`¼÷àd•Áa2‚z‚'¾XÈDÙÎ\0ÁÏ\nb‚ĞÇ„¤.@t˜Nú\n\0\n\rt–\"NÌ(\"ğª*.I®XFò›Í8p Æì¥Ä\\#+ä¸#èñ¯şñãôò(Æ‘¥Dué>vH˜¾#ZZ!\0HPŞğRêç‹Ìtï *¾I#¸Ø# [O®ãD•
œGgÅ	–®ãdÛNt'GGòócƒ
ãág®.ãöœç 4'Ç„‡B`s­4Õ0Ş0prNL¦\r¼^ÁLÖHÀu0æu…˜WrcO†(ÊnŒÃéTP®©ÛpsÇ¢:	;\"ô-*f°”Å[\nğ- Ìs\0¶ÉgNQÆü¢j#!JF¥¼*‡ÜB)An–ëxˆ’®š¤ÀNîZ…pbÅ\0«KÍLnåV9%\\`À‚\n€¨ †	¢àH§\rôL¦^(lÒ„ì@&Í.¦0æd®K¨5l Ê\"GŒãykSâ@yï:hÅAÑæ/%ì~£±nİÂ`+¢¾«
0Fã\0¡1°d!§QüÿnúvïªPË¯ Î\n¤Ä,*± /ğ­ %±²<r(ø²!ÒŒDnFèU!’DV\\Õƒ¬¢‡\0,hŒåÔWŒXÂì\\Ìb%Ñş8ò&ÅmÓ#azÆb‚;,j\$Š(\$(#×(‰·(ÇöRÒ’(O	)‘ìŠQÖCÒu(²{*¬ho#Ü«²Á	(b†c£å>#2\"‚b%†í=Nü(o«-Â[.%/‚ª-ƒß.Ën!«#Â¶Rò?òï0Ï\0#%íE ˜¨nİÈ(.şªÒõò¬îç[.“\$bğ¿\rLò®XJÇØtâî`'Ø£\$©5	¤u3°i°~ÙèQc„êd:v¯–0a#3i \$âRügJJë\"2?8,¢ğË1s…9bQ2ˆX-’£“K0k\r'bK³ª/å\"ú(Ç\npĞnĞÕ;ÍøK²Œs {¸7³Ğ,SÀñÏàĞ¦#oDóã“ĞÕ'°T‡]=î) 'êúìîÌf\0R-D*'şs¨aïÈøbä\"0tKŒ\nŒˆSCZÀ³ı?Q?E(=êİğØ¤ïXø+ ?Åû\rÂM=rVÄPk@cò¡¥^Í¤4†Ä /NI”@a‡!*ŠÃSä¥ê6ü“Úa¯´ş®u;ä»)D3¨Æ\\ÇìûÄ¸Ü\0İ ª_>¤	\nt˜K¯Âh»#1 <e:‡<0‘=±ƒL*¥Ä¢â4Ù;Eî6¥MJè HÀa“Ó:âÅP+/ú5ç.\$“)Ó¤ì5 O“ÙJê 5\"›4?L,ôÿ‘p@uz‚ì*ÀSRTc,µ+Rò‰PÄ¡Sqo
Î—Q’:ŠR`VT¢›#RÂÇò²QQÎ©Vå!8Â£ µ{m¼ãÏXuHRsr/Y2±‡ÙÁX†A& Î%à\\&-‹TPAÄ\$ö-ªCÑhuÅHü¶‹~cê&%Æîç1XGä¢²Šg§¬RbHÌÔZ\$Ë~ü#\\#òr†i\"“É_²8R³‡Ê¦Dõ©)uZõ„ô4huèèü0Œ@0Ôë(•ôKP 1,÷T1*gNwh\"tO!9ìñJ\n3F©WÅ
Ög;/UX’ª”¯3gIw“°ó6Yç÷KïÛh”ãM4wõg¶zñ‚Ô£Š5ÖmMÔ”[i÷*@ô–·Z4û,©5kÅ=(U>–šN2U‡\$ãèµk1“oÓ[q…nBëó{nœ!A\roÂBx1i­î[®\"¤ªĞ Dqe6`@5w¤ h\n©I3³\nw#S•ar¶”®vß,75×'QhıR6ØgĞ§efñx ÈèVS4²…t±r–ş\$1uâÀC´†wnò%w`\$/\$˜HöD¹cO]…’AV¤æjtµÂï1\0[k…X·0ó0§xu59ÑB¤ñ÷­bjÔ\\w´f×¸b|çpæi×ÖÛ1<:W»TÒ©uwBŒ—ÎÁwÓ7×²±—İ{¯ßjo€-€wí€°\rAwFeOk“köì6#=éÇzmÕtŒ…{J#[–ï„q °‚õn‹Yø-Xâ.¡EXX-8]lËYRé17…³¿oä¸AM2æ°xy†¸w“‹ˆÍ¡‡°zêğôØKo\$qGØ\\¸]\$‡õZx¬®Ø	‹U!>Wø!øuz…µ‹±ŒUµu(Ğ.¡KZ³zµƒİW9QUcD©H/3•1/”Y•-Œ’KrO(êQ0*uuqq2MJµg‘OüK5SHê3’\r’Yt™CÂê{‚F9LÏõêó0£\n±8W-<qTâQÒ‘³ÓTvq'®«T_TYm“Ë“™x;j;¨ *gX#€†š Øa -dX¯ôWÈ´+¦ğÔ&T\ru¡¿ì…‘•Ycn2ë~¤*uv\0ùn\\øæÃ¢8\n ¨× qmÎêoÕí
YfxÑöqêJ¢	Æí%¹ørqø&ju 6Ÿ4¬O±å¡ë&X_\0ÄP®¥,‘Œ`ÅºOöIôUğ‚×÷µqg†ñVbCo=7Å™uˆİ3íA“-¹@ïHÔKifZ‘Dcšî\"\$ôTÍzyr‹÷»92÷xâe-’4‰³…/‚e´óˆÎ'\rg«z­Ô4¥ŠW’ÂsŠ‚+í^§Â“3İ<Çbë¡TbK£Uò4ØeÓúTÚÒL€Z:ÚüÚËd°pd\n)#ùMFZó¤å–ú*æ*s;zÌ‰dö3–²¦º’ïÑ¯Ë¯QtÏVy6hòxĞ‚êE^Sù;£”¥G‚º?\rF.€l+îq]èÕ´äµ5õ`HrñÁdDKƒ¤ù
ˆ@ÄuˆÅêbRÂ›O±’Õ±ùL…ƒ
‘}Gu²y0ôàm„…1£SpqªbO“C4tG0%Ö@Œ¯éL©\naë»°‚{ƒ‘¯ÛœŒ¥¬z)•~X«7Õ‚ò&xB©,‚è\0zãTş°¸SX¢ZŒœ@";break;case"sk":$f="N0›ÏFPü%ÌÂ˜(¦Ã]ç(a„@n2œ\ræC	ÈÒl7ÅÌ&ƒ‘…Š¥‰¦Á¤ÚÃP›\rÑhÑØŞl2›¦±•ˆ¾5›ÎrxdB\$r:ˆ\rFQ\0”æB”Ãâ18¹”Ë-9´¹H€0Œ†cA¨Øn8‚ )èÉDÍ&sLêb\nb¯M&}0èa1gæ³Ì¤«k02pQZ@Å_bÔ·‹Õò0 _0’’É¾’hÄÓ\rÒY§83™Nb¤„êp/ÆƒN®şbœa±ùaWw’M\ræ¹+o;I”³ÁCv˜Í\0­ñ¿!À‹·ôF\"<Âlb¨XjØv&êg¦0•ì<šñ§“—zn5èÎæá”ä9\"iHˆ0¶ãæ¦ƒ{T‹ã¢×£C”8@Ã˜î‰Œ‰H¡\0oÚ>ód¥«z’=\nÜ1¹HÊ5©£š¢£*Š»j­+€P¤2¤ï`Æ2ºŒƒÆä¶Iøæ5˜eKX<Èbæ6 Pˆ˜+Pú,ã@ÀP„º¦’à)ÅÌ`2ãhÊ:3 PœŒÊƒ¢u%4£D¨9¹Ç9¥Ò9ŠcÊ³\$¨sü@P ÏHElˆŸÀPÕ\$´À-²¬64ÎÉ€æàr¨¨99#d’Nµ1CÑp ŒƒjêÿLÑÁÃœ ‰ÁÓÔ~9ÓãpÎàÖ´¸Å)ƒ¸Ò:\rõ{TB°¸ä2\0x‹\$ƒ(Ì„C@è:˜t…ã½Ì/•’09È˜Î§!|)`ZC ^)ÁğÚ‰©‹¨Ì‰½c Ò7Áà^0‡ÉH­&JNUk,J¢ĞŞú½Ã6£Xèˆ)LÕV¨ˆĞĞŸ¯˜òrà6ì€:ÍÎBv7c\\ª+£µm„†„£ AcC œçh è<çùÖxÖÈpèbC€Ê1B¤˜	sJs”4H‚:µ¡\0“C.>:JÖĞÂ:uJ:ÈXá†±‚0êüOr\0‚3ì#;¢½¾y|¾9@PÖ2Eãz~¾X”ÙŒ=(JĞà¸	‰u—+iŒ†dÖ*úE^5Ïr®ä6\rc\0œ!ƒÂ7!Âˆ™T-…nd=.#¢l1›C¬Ş2oVN¢64ÁB=e”XõÔ•	–a}²ä¢~QR6å‚Ÿ¤õØ­ºÛ'	ëZ`;#lª\$°È\"3ççw^RÁåÅLÊÂëÊ£¶VÔ,`ˆm]9L)À“3q\0YT€ntœ©öŒI&aµ'6•gJI)¼3`Ø¬ÉHOŠuU¸à¨É	ë\rÁä75tÕøsÍ èƒšÕM°0†pÂ]A@h
©®PPÁL!„j©V'ÂÖCeNÄ„;*‚äfƒ©)\n†€üµşEªÁXjÁuåª‹!Àip„Qk‚²¶Öêß\\+r®uÒ¬×bî^¸ ’fÀ˜\"÷ ÑùvÂ\n‰ªÇñı³ÂwÃ\nÕU*yª`Pğ FŒä’’VVU¢óBÈ`ş¾ÒØPÊÖ[\r†8-åÀ¸—\"æë¡XÇ…Ú—zñ‘¦@¯€æŸ p'\rCƒäbRÌ#f²†Ö¿P™ş…M^D¬\"{Ns\"0—¶vY	È&äå\$Å ĞSÔ€?‹)Ò3²˜Óƒ”_MLè0†cdE!|1†n–D”³\rdç\"©¨9PÕËØl‚ä½—Ó0@	ãl*µ äøRÕ«‘5ólë™b˜ŠĞdB)ä
Ó¥CÃÕ´Lñ‚\0PS¢H\nlŒ6°¦c°4Ä|2š–tùYµAŠõÒğî‰g1ş_¦¬‹ 4(â	üY‹ô7 ¸´¤¤æÒ“« Î·§u)ª0†RR›æ¤³2gŸÀ†ÂFÀ‚bb²Êdòm	†MIÀÂJB7v½\0iÈ/fA,%ÄÀ™BÂ5aœâ'–“³Ç\\ÂÑĞ¬^w¡É2S‰HI!aäÏ+XÕPÈa9gK2¡6âÛ\nÈ ÈÆHñXàc\$€Ô\$(jPÓ±ƒç„)’‚€O\naQ‡Šÿfùá¯4¿œpD¤Õš³‘¸«‚’Šƒ1s§F†PÕi›
Hp²Ğ\0¨1A]\\-˜A¼¾,@Ä\\Á\0SuÖÊÉ¼‚ P8!¹çÍPu³M6¥RâRÃ¨dIğ5“ò!a‹Q9ØäÑ@Âp \n¡@\"¨pş!&\\N›‹iÈ!-¦º¬`ğñ’\$³\$’¹tæ’¨VpÂø1\$å6GáŞ< ˆò!³TÜÈDY­…E6tN±ùËA!±–WV(c}N-‚…ğgä¦PÆ{lì›†˜\nÎc|3”ùåüµšÌ/°àf|ódØaCå¬7«ó‘•[9Nm(Ä˜Óı„È±N S¢€ 0\0¥92‰§Â•TäL°ç é=>ÃœqÊ-\0> ¾êÕpT0¨ÂàÒ’3|±CŠl‰pşpM„Á:ĞœfÛÑ\r\n¿’¤¨N·D·ø2‡uÛó%ÖFÁ¾<UÒs¾ØµEÂ Â\0j¦H¸Ÿ²m‹¨2AËxD=RÜ*/°¸j\$x3šå‘ˆöñ5›ó(©¤êÚ½k#nÌÆŒ1zVMx\nÌ,e]\n‰XâN\n¤rİ°\$¬Ä[·8h:¨ÕÉxT\n!„€Akö‚
ƒV¡]  ÍR)h>‡fŒ—ıpAÙĞ/+Í\0Ì ÖÑLÅ\r0#¢”’†Ï³°qEfºXª„zPuZ¤IÒ¼rs¨ÚõxpL\0 ìgSŠV
«ÅpÈÊO\\Íİ{9¤®Â[`™…ìÎÇ©Dş©Û\"·Mî\$Ü÷KIû¿cĞG ”ĞÊ<ì:‰ğ\$Hk\nÌ—»añ`¯‡Öt‚y÷e°0Êy¹¶Ğ=ğô^Ò“;(<÷==0ùùSåU’@Ü†IåŠ)Sc¾û1CE>	GÆ_\"ŒYÆœÉKÁŠ!ê£B)\0É˜ ¨äH›!ôƒHñªÅeP}cÒ‹ùŠd\$z‚ó¨£X¦(¥cşÓè“‚B7bÍ6°³ŒFç0âJıC–ÃÂMb‚Úæb\"Î¸; ò=b.Ä4ğŒ€Í„¨Ô‚´;ín¤‚ap€p'ƒvœB‹MfÛ°,\"Â6Î-‰LÛ‚‚n\"Ï\rF£ğc\$@}\\Æç Š§Ş(œ\"~HàŞáªLY¬\$O”Wœ„\0b À¤ G¸c–¤.P„G ØIÀœÆ(ª#pºË…\$»¤IÆ¾Ü¨XîI4céÈ(´IÈ*çªÆ†œj\\‡3 S Í@g´xpeğVØo ±xB  I²'09¥-q'õ mgçu°:~í–zq
M„ÎPzzÑB{,Ïgoçñ°áÀ´10f1„6âàÈc‘F“QhJ‚ìëkËñ-\r®Ëä!t\$±;¯81€ô‘<îÆtìQŠïQã—b&Ñ|&¢ğ±báÏ®ğñ`ìÁíèŞÌ,CÌß‘¤±ÔÂQØßÜ±áQêŞ¡ZE1Ûî¹ q[ƒÒİ\0Ş\rF\\IB,n¢!lfi€àª ¨Sâ,=bˆÕ¢fI
6&\\±†ª&fu!Á}#åe\",jĞLİ\"ªZÈ§€[Bë‹.­ÊXöl:Tñr¹Ò.›¢,FÂ²O\"O±îß-ÖR\\'MdİÍVà&+2\$ií®Û&1Æ°'+áñM Å+Ò ò\náÆ‡Ÿ
-°d€È:8(B‰2Á°lãc¿.C—1=Rğ·rçr_’î9ã€Â2ò(c&y®D(“0 z/ş@ƒ†j†EÆ 	bLÑs	-®£\$T°Âuâ:Dòl‘³Q™.‘K.Ñ?51u¿Óapu,Ó	íÄ8fn€Òe“vıqpcŒôÏ‚‰7§A7îC-i/3ˆÆàì\$¦ó²BPÀÖ'¤V›ÓYLç@¦Eó°t3o-JY;ÓÀ'3Å/‘ÇGŒy ¡<ó³8³9d:óÑ9F¥\nR .±ç-£’Ë<‹nèe§1“™:¥F.mı+ó[?²¸ßtV’ ”\$ß´(ó11?Ó‚}Î?Ó–}® BeJ»/òôÚîJßÙâAÓ¹@tTäÔ\\Ñ÷+p'Ed‡F±á7\nYB1f4ÃRâÓm¯Çd‘ƒôh[4+Ê­f€Ğ…~õoHc&	4EOJ¤\0Wîôôc]JOö¼âäñ&¨\$\nü1†€GàØ(%\n\n´¤qÔ«ƒ\"Eğ,\$#˜@ò|ÊÁäØ\r€V\rh>?+¦û+,£Œ(%ªcB&Tã¤GäG@²ŠâKû\"¤Š*¢Ä@¨ÀZ úEb6<ë\0°LW’hö1¬ì€ôlİU\$%H•Yè)KCVFó“V¯_tÔÛmh)),#\nB#¢>Š‡ö£&	µJÄœ\nÊR¢FIÃ_\0r¢£æ>)#dg¢C	°ÒŠÔVºrrE®<Õ.	‹ègEöl'²JµÔ/ƒÎiLå)â4JdJ¤ªe
Ï:³UğèĞo)Ñv‘¬Æ-Ó»íihÊæ¹õ„0pÚÍ¢(&Ş¥t‰aQ;q`ö'V4zÂr€€à`Ed×3`-h‡ˆ­+¢2°aÒzº° š:Sş\r0rôº–v({&Ğì1¬†›ed5CZGN•Z\$ô êP§»dĞ5 ç\"g
ö¨1€¦EDØğƒ’1‡»[mÖ\n-õ²Êì¢ËUr#
ÎÏÀôàËj¶*Õ§9üâ<6S­<&ø\nTu€¬ÆgWo\nÖK‚	\0 @š	 t\n`¦";break;case"sl":$f="S:D ‘–ib#L&ãHü%ÌÂ˜(6›à¦Ñ¸Âl7±WÆ“¡¤@d0\rğY”]0šÆXI¨Â ™›\r&³yÌé'”ÊÌ²Ñª%9¥äJ²nnÌSé‰†^ #!˜Ğj6  ¨!„ôn7‚£F“9¦<l‹I†”Ù/*ÁL†QZ¨v¾¤Çc”øÒc—–MçQ Ã3›àg#N\0Øe3™Nb	P€êp”@s†ƒNnæbËËÊfƒ”.ù«ÖÃèé†Pl5MBÖz
67Q ­†»fnœ_îT9÷n3‚‰'£QŠ¡¾Œ§©Ø(ªp]/…Sq®ĞwäNG(Õ.St0œàFC~k#?9çü )ùÃâ9èĞÈ—Š`æ4¡c<ı¼MÊ¨é¸Ş2\$ğšRÁ÷%Jp@©*‰²^Á;ô1!¸Ö¹\r#‚øb”
,0J`è:£¢øBÜ0H`& ©„#Œ£xÚ2ƒ’!\"éÊl;*›1¥Î#J€¸hŠ_!ƒ\\LğÅLTÉA(\$iz³F(Ó)¤Ï*5£R<ÉÎl|h ŒƒjÜõB¯²Ğü?HÒ~0ŒrÀçÃ8@›´/ƒäé ĞÅÑhÿ\0C\$&í`Ê3 ¡Ğ:ƒ€æáxïY…Íµ¨Ar43…ğx^ÿQõ\0È„J@|Œ ®8Ì\r©HÒ7Áà^0‡É{¦º²ˆ,:% P 7c\nD“C;Z2KH¦‚²[dğì¸Èâ]—räº.ËHœ7Ã7e&B¼€†R(¨K\nIˆèàá5.xf…\r8–…_\"T6(Ç;Å P—%Aë˜äç## Ë=2Of„Œ£²£Fµ8Â:‰şd6³U®õ/‚0êòŒsœÔ-ƒëqÆN“®„¯ƒZŒ9'‰Ó‰E\r3ÊÈÛ&#~`	BIƒxÙqÏib©š¸¦„6\rŒâèË¢ƒï\\-è¦(‰‹PÈƒC›X×^ˆÜ“a#ÕÕzğè Ñv­\"ª}™[< âqön.=MP,¯5\n£°ßº}KÉœ¥îºÍÜNÈ!slh4ºšjÒîj;6s\rwc—ŞİÚ›Tí£ÔœäìS *#0Ì*	x2Nˆ¤Ô*\rì•š7,÷:Ñ¬Ğæ3g@¶øğT›òŒ0‹hÚaµ¸ê€…˜R¢S&áÔ9±Ó®G‰xT1Ç”Í¬·…€ P\nÜõ  ÆòCK*xJÆUPª•b®V\nÉZ+e®UÚ½\rÀ¼úâJ´ >…«9H­%¨òÉ±E G€–Â¬)=A½Ğ•’— éĞ€’ğš|H
ÂX<D\\^p ƒŠšªµZ«ÕŠ³êÕ@Âut•â¾¯ ¼ˆV±C˜>	!´8uÜ!°>xi,:)´(gViD\$„õ>6Jš7„Üù`@²	¸b\$„™%ğÎ×„k¾.=I†8^rËpaĞìõ@ä–…fŠ\$Qô(çÖû_y´S1ôÑ æRX eé’†’>ò‘é7§ĞĞ¡‚,TzB‡¿ŸÀÒ¬Å_’. € AH\$t“'·Dny/k@¨Iè\"gH9–3–e¨£6iOº“n¼;ÎÉ6zˆğ‘‡ù,yjqÃƒûSË*‡sHæ‚‚ê®QÏöíÊQ.ÉNd’¢ZrS\nA,­ó®n	!”Ìá ®@xk5¡Ñ“^#dq×FA¤!Y¾QˆdĞ<àHåØ|‰œ1D8Š¿	¡\nbék0òbÉ<'È7GóHfÈ(qg¤øcØG œ'–§ 1’/gş30˜—bvËVÚš@'…0©BÓã\rG]…*dÌi¥pšHd’f]Rkéµ9HÊj!°ô¥Ñ
Ad€Û)6[{	•vš#\0MÂ0Tšä-\n ƒöOä^IOx95rÍÑ&\rfà:µ\0uË3MDm 4,jhu,‹dê»ƒƒp£œ¶caÁ»)rl|5¨Õ³6„hI\n`'¤–êƒvG“lì8&a8‘°Ây‰4—dèÙ^„*\\Ù>6&¶›ƒİq/Eš[ ôcÃ•A{'IÚÜBÌä\\š@qâ<ÉpdÃzc+­Ãê@–é\0·EôõÈrRÓÃ]„òh¡roæ¬×)
z\0˜úxr	àtÄ8¬'‡2f¸ÀPZ’FÅšEğeÒÓœS:?´ÔË³ +Ì-`KD¯²T‘d«\$2RĞ,+œB†\0002‡u½%—‘|ÇÎ±šªs\r{Œ6E¹•´ìéHÖC¦©Â®×wI‰œ7@‚Ù›’ánÍ4L%ñ²İâ(A4lL+zB¶Jû‹rb:qøL&p\\Ë˜\nË0”åò|Ã‚+º’\\2j%¿1O	[&}2&ş Aa U¦€}¥SQ'ò{ü¸IÂÚv„ÍtÆ
ÊÃ\r0†»1m–IZ.Î0»@2í-™—öìa/zè\n`:h[ ¨
…iÁ7‘Û+i˜r¬VşÙ]2(	…	h6{vn]ºiTCYov´P]¼~òÛj^Go}Á¾wä;›5S‹ûÀÉÇ%Ü#…oM»Ã·ûâ\\S€S»»6b#\$ÁÕ¼Í<QÂ§	ŞÛü‡†\"x‘Ü>ã ƒğw%¾7×Rüßœ’fÏ7æÅçÜÏˆH“Í–‡9(ó·…q¾ÃúõÏD…S^ÂzHbZİ\$¾6OÏ`w\"¡8è€‡Jú#ïÖİvò„öêĞr]˜‚^oo–àLí²Ò†SçÙ—…@xŒNÌf+É¸“ï‚
™€CáˆÚëòø·×\nã\"’àÉí~Ñõ\"üGù}¨`KÚ‹n²vGÍºí.,·\rÕ±“ú|OP™RÅşò>º‹ÿÃNøÿu+şa0UÌeÛæïüíxàGËÌœUn•­.M>I,’YhbÃ*ç\r„¼WoBÀàğrß5¡é•¥µ—ÿŸõ\$„ÎçC³ÂşŠÜu\$Ô\nÂô-\\ÌÌÚ@îœúÅÜ§\0Ò\$Z8ğF‚\0lÆ:i°>†Î\$b<\"`;€ìMìP‘ÏÀ!|“PDú¥ØM(!lª¿pFŞÏ»`ú­Îúï¼v'5Œ\0ú#TÊ¸u\$ #VvM»ğ@'Kl	btnÃ‘É\$n#ÀÓæ:\rnI  |äîÙß	Íİ\n\"\nkz%P¯
0’6Nå\r¡à Û°É\n°Ì(pĞAî-pØ0î7
%\nJi­AĞ š\r×
­ ,öÏ«j­»¬ƒwÂî*Añ(Ï‹iîovÀ‡DH\"L6†Š7Ô¹f<‘ãÂ6hù£[K6BJ²	â¦.bl\$±X5°\$9ƒj—LæäÍ>c†ŠšhDtYÑzk­*Téğç]êãëa±:¬ånü(|Î¥ìÏw°.Ëåâ‘0ä©ä) ¡ñB[ñÙ'(§ğÕKÌ	ØÔd&(q# ±à)oÈÍ±Ó
QBl­IÑ?@åÑÀq£é!\$Äu TB²\$Ç ÂfXdNôcï¼ç:¿ËÏ Ö1€Şpd„[ğ­!O 4ÓĞêï		\r+·reR!Ì(úâL}†ˆNgÂ±ó%r'\nºh`Öh Ôó+’p/£Zç1hd,\rbf\rÆíñß¯+)û!që+Â‡,µ&°Ê²z\r°Õ,¤‚îe!„ë-Ò´- ©1İÒ_.ïß,P‡%òÖq±k.2+0l(Ñ\$Âï È¾Ku3\\m'r
\r#TÑ!12ı!³\0ÍDë2ÂG22.Mÿ1ºG’²&Dó0*3I³/Y2Rg1B;í[6’u,qBÉ¢x/cb-2U&+¨›âø{`ìs‡œdq¥î¦Âàó˜Gd÷\ri–=…
î¸8Ë|çs°3Pİ:bäÑ:4_‚_	Å ·,è\nrJ?Ãv`ò99³Û6Ğ¸2ojI02Ò\"‚ç;Óò.s÷6Äê2N/Q_@nJ™óî_Èù=†I Økg2I½\0«¶š€ê7ët%àŒ³©€‚~.©ü\n ¨ÀZ  {.¢öR\"ğtO£>íİÎ}FàN³ÿn'B»\$âôtêÔmôdà¤F#4]­ö:±™ÄÔ»öÀò@¤ú’˜mECiØ<dN¤#|enê°ïŸ%°-ÆÚ OÓC%à˜\rë*Yæ=æÁMÔZ:\$¼nìšƒ‚F€†.Í*,Í.Ó¯¦n“»Kò¯Œ Pn.^«Îû³QP'ˆ®ÑÈÇî/QáQçr3c2ê™-@\$¥ËU*u‰ò9àÌ&œ&aD.ÿÆäÌ€ÑÏÊ\nÊÜ'Š¸™„.c5l'UpµÎÍÄâ®)¦Ñ\r>+Úà¬Q€êG\0	àáTGi=€\"ßZf´½‹\\óí@5£\08ŠT&*øÎ‹Ø#dC&’©.ss„¼ËÑ#•&ÎŠ@î2‚Á²±-çA„Å]\r#„v?+n»À";break;case"sr":$f="ĞJ4‚í ¸4P-Ak	@ÁÚ
6Š\r¢€h/`ãğP”\\33`¦‚†
h¦¡ĞE¤¢¾†Cš
©\\fÑLJâ°¦‚şe_
¤‰ÙDåeh¦àRÆ‚ù ·hQæ	™”j QŸÍĞñ*µ1a1˜CV³9Ôæ%9¨P	u6ccšUãPùíº/œAèBÀPÀb2£a¸às\$_ÅàTù²úI0Œ.\"uÌZîH‘™-á0ÕƒAcYXZç5åV\$Q´4«YŒiq—ÌÂc9m:¡MçQ Âv2ˆ\rÆñÀäi;M†S9”æ :q§!„éÁ:\r<ó¡„ÅËµÉ«èx­b¾˜’xš>Dšq„M«÷|];Ù´RT‰R×Ò”=q0ø!/kVÖ è‚NÚ)\nSü)·ãHÜ3¤<Å‰ÓšÚÆ¨2EÒH•2	»è×Š£pÖáãp@2CŞ9(B#¬ï#›‚2\rîs„7‰¦8Frác¼f2-dâš“²EâšD°ÌN·¡+1 –³¥ê§ˆ\"¬…&,ën² kBÖ€«ëÂÅ4 Š;XM ‰ò`ú&	Épµ”I‘u2QÜÈ§sÖ²>èk%;+\ry H±SÊI6!,¥ª,RÆÕ¶”ÆŒ#Lq NSFl\$„šd§@ä0¼–\ne3ÔóšjÚ±Š”ğÄË{TÿµˆÄä‹ĞR­\n­,…óàÕ!É\"”§D	²âØ3ª‚¯FK“,Ğ’õzs3UDÅ<ï”ëo>µ@‚2\r°”`G‘ó‡ rŠ#ÆçpÏ|^¸Å¸#¸Òì·rÂâÉPä2\0y…Ê3 ¡Ğ:ƒ€æáxï‘…Ã\rÙwF‘˜ÎŒ£p_#rL–„K@|6Æn\$3Fck¬4ãpxŒ!óDÆ3¬ıƒL[
jhÿë#4TĞM\0‹¼³ı\\‹«QR¥¯YÁrŞ¾ÙËz³8Ï'úñ ¢6Ê]tÚb¸Â9\r×òFŒˆ#>ó¡€Nù¿(³/¾íœ^óX©:œ«\$“íÆµhÌËb‚v—…©í^Œ+äG.ô˜¸Â:’ì0ƒ¨Ë\néf—G*5?ÉºÌÿ³³ûÚÄªŠûûnST¯@ÉÖ;c\$  ›\"[¨ôı¼ìzêÎÛ\$Âw U7\"m÷>I(òÔôöå7Ïï§’H&fsÛïüÿ´PİRšÊ–b|ƒ5ˆjæfÌ[JA`()…˜”Òy¥K­¥ä–°•@Q<<g”Û“†ÎL›
„Z¤U:¤õ²ÚÖ˜Ğm«!ãTÛ…#Ò4¨eû 44L…ãnÀ¥¸“]jm1p„€­\0á?îÀ¨+¨†ÛÌY‰xçÚ\0004–Ú É#iu0×zª B\$ÍM®\$µ’Aíã–
@ Fh¼7Fcƒc\\i¡àë†åúĞC™k)IX·€§RÉ»_Z5`ÌqkÉmX8À¨Î#>\rÁä XìWÒüÎ ÀŞĞsb!Ğ9I@ÂÃ\n©Á®ĞÜN¸(`¤µÂ2\"Ob+°zF›r„\rò*9ìğ9IUú„Áë•ÈÁˆ†8ğC\"ïbfõ‹1†4Çó dL‘“L¶R™[-èò6‡F€Ë>œŒı	´6ŠZŞ¤/ dğÖàÜ‹1ğneÀ“‹\"ç”\"ßQ©bzECÊMG'^b³dÃÑxx¥‹\$Æ\$Å&«clu²FÙ+'\rÈÀ2¦XË£œuó¡›ÚXme¡ÒwèĞsé“o§D3àÖÎ’20’TÍ&½(t]bO\"„Z=“Å/êwÄk ©êîˆt¿\r |Îf‚0l\r€€1àŒ&%2o¡„3PÄ…&YŒ›¬rzP\"ævN…[\$A†™\0ÇEi˜iu‘äØ!ò™aÔWy%{ Äº—Òİ†)SÀ´2!A\0P	BÃÀÅ´\\SX.†Õ«»ó/JCh4Œ1Îi‘O1È9G02·Ôˆƒ¡Ï;hı…V Şí­ZFèç°°æ‘×Ü«EÇeàá,c1aÍô; Æ)èiìn²Šôİ::-e±«D‚BS\nA&\0\\A‘vl­…,W“Ê‘	¨Š–»ã]	UK\$Ö>Ùì³é5ÍùHöÓŠÑ*…CY‹í„ˆïTi<ƒ%\nV³Š%i¨’Bddšğ‘2Úvv{.¸9¤ÌŒƒlÉ¤K¾æ\"àÇ'‘Õy·iæßåJœ’‚ˆ³!<)…K%‰IÈ–£•äŸº,Y>Ä“5—‡h2Ã)Xˆº
(H¨Tír×ìÉTµÈûˆ•÷´dİ´5¢\$œ©¹B7Fòğ\"ã§'™3\0Wh@X­˜ 9,,#K8Cs}\r4½{°pAÃ~9GAÈà#CÒñ­:˜Oâd•»Ê‡
ŞÌÄ¨ÉAW†Âp \n¡@\"¨A\0( K¬“T—ÉæH²§¸•
\0Rµ€ &]o®uÛË\"OåK‹^D^Øñ!jç|ÔP	³P(›wVÁÒ¾ñÕjäRoÊ<™b_yyjöÏBâ\"ÿJ¶QÏF¤»;BUÛ\"%z\$¤ÿg_á¨,›€×+\"Æ•µÚà—qJªßk=0ÊÔ)ä§.YöäBÄË*YBmÂÑãJUùn
xQ\n³¡Eƒ\\oñh?×	&'ÜAŞ®r0LÍWy7Ç~¹b©«Vi%ríl…ÓŸˆR V\0ê›ĞcJLÜ³Vs ñtá¼©»Ä +¤û‘è\\JoT-OldùtüKË;¤§ØœXøHS\r!é×Úª_,xS§.ÖÛXˆ…Ô\"QÑsZ>¥¾ª>T\$ë#
\";ã}9!”;­Ê•|ÜŒ4À<ü‡!hƒ&SÓ>’…°ˆ€\$‚˜›‰˜.ƒvô{\$CPYd§„µ/lQx­û˜=Ì’y42KdC¹ŞNeŞHZÈTs¾š4!J%Ë\nh\n 6e7ŸŸ+óÅ=yë¥_z²3±+²^İ®÷ÖŞ¶\n!„€AŒü²>nçy¤ à¶ã®I‡º?*¤nNB<¯¬kb:o ^6H0pğ ±Ğ\$„†ây#S,!âv–â—BšäE2ª\"ªb'l6 Î?BªÀˆ04ì:.©r1°DÌĞHÂLo¨HnABÜ?l(Ã0_\"nPSip…åCæ°„Á{ p&ë£o.-p„1¢Ö3
×Ì\nô¥0â¨¿iäîj(PN´Ìµ	\"-Ğk	¢\$ˆ°Ÿ°+\rDÊ÷\r°i	C0É\n‰\r\"êËIğ'Põ	p@YPı _b‚ğññ@	&ÒÄdâF\$©ú~ìæ‡HŸÜÜ%˜)ÌÜAĞmMî%ú+ÂÀWÂâW|à® t&-±>NÒ‚Dâ&AbªÃXqhj/’T¬ëÑnwÂHâQ\r¥´‰¢É-¨y§‹\0§ C¨åÂ,ŞÃêñ¥\0‚Èj ´OĞM®ØPèøQOr¬íÆ Õ&Ö(ë@ìüä„LÔ#péQŞëéóÄ?¯&Óñò.1sepæñîîÇdŸ°­qèç‘ş\\ODï\n.Ç£M ò#!Qä~bd…‘ì¼cZ!d‰²á%˜5\nÔ0Æ3¡xüÉxñ±\$ãÌÜ\$âÌâì©ÈÆF@à¦â9H«\"JTMøß(€'#VÉò\$j%&Äï' úˆõÎÊƒ‘ø?ƒLOoBQe—à‚Gá‚–×K&=§Ê>M·(Î’3\rºZïË±ãrıèòÔŠnlÊŞ&¯ØáòdT2f*Ğ·\$(j‡.<q÷#{Ó\0ãN+010Âk\"²­qîñˆ!c!¨%!ó-\"o~m=.b×3³!\"ƒ\"Ó(¿Ä*âßsW/ó<k,QCå\nPQFÇ0é'ÅsĞ’k³fİ³lõN?*“r&³0_(h‹7Ğe8\n6¨Ñ “‰ğ­8ğYÃÂ÷§¾÷íH\"Á3G.B3;e\\xñŠÔmK<RO“Ë ÔO<­1bK®Pãæ¬Ş\"©?‡ó,èêïŸ*ƒ?ƒãê”€ F\"Î3?èk@\$—tt 	A·*\"y4%ÌSÆö%Ì[H Â¯Bî>1k&#
*©Î:!¦äB?ÎO>Ñ>S¾=ofö´FmtJ\\\$-D8÷O‘B‡mÒ†lğL1å2CYËQ%Ô”ƒÙ3NMJ3yJci>¥KCÔ°Ün\"Q°Iqk‚Pü”«<”°Ş†ÈüneI³O2sŞ-”ÍMÃÏK“A1Ij„ƒâWÛ‡ªÛ”ÃÔıLâŠüÅ¨vDo?äÎùQ“EK(iúŒ\")`mÏ½8'Í4°EJÒ>\$•7:\"»NINSû¯¿S´ñ#³ãïRƒ¬‡l}­â{H „TøçÂÜè)k^ûSî=á£VƒÚvô '‚1HVùõxè0?¿ŞÆÔ\"A~VH¿M.J´òA[pd¿u…KÕ¾)óÙ5çV/pñÂıUS]]²!+ULñë?#6U³=÷8…[j5ŒØ{è_`'&	ùO‰[•ïNv\"O™\\õP‘O‡br7K´ôöæÒ>\"a˜\$³Y•†@o“bD\0\$’–m9N‡‘P,HıõâV!Ô±fu»f¶)IğZ\$„©f§_“ïNaKöŠT5EUcåL³z)Ì:øE5…íwZ	ë\r‡”ŞSËV®Î…?@ö¹9G kîƒPd=¶ÈKEBMpJk6ã	¦øáVÛææ\\ò‡?9/ĞN}B±F\$Èæ³±9*³·	­w4ÑiH\r€Váv‡CğqVLĞ.ê¨†´œrÁ(@ŒÑ Ú¬j»«”Ö@¨ÀZ Ø™ÌTBpÑ:”©ml@j¬)pWl±ÖÄ‚ßp0+:£ÍkM…rRA@j•*„¹NîT¤¥Dˆ@š\rìTÀòøB[s¤9t.fG¥ACâúR©TâÂ’¨n,Ë)†ç+tø±›l&EîqÍ~2YFÑì1
åIgîy/h,e”T²bn–ô.îAvÅ¯Ø3¡m=ÂæO’2˜/sÚtQM‚x\$¢u å, åkF²!x-põ?MJ³ƒ´~Iã6ˆV1/„’…¤	\nëæC‹ÿ;‡Ë~×\r\0ô|4\$„%Tv2Z \rÙU’ï-ÅÂ|rÈİ´6õ²½MÀ3è«~õEVP.@¬_ ê ÛjS£†q±f'Ø*Ì’êHZìKñS\\)Øj²ú§¼*¾¿óÚDä\n%“d\"t\r\$3-³
Hº²œ5#K/Îà\rí:ã:õµ†˜ğQÎlÈEsç±Òke’.`";break;case"sv":$f="ÃB„C¨€æÃRÌ§!ø(J.™ À¢!”è 3°Ô°#I¸èeL†A²Dd0ˆ§€€Ìi6MÂàQ!†¶3œÎ’“¤ÀÙ:¥3£yÊbkB BS™\nhF˜L¥ÑÓqÌAÍ€¡€Äd3\rFÃqÀät7›ATSI:a6‰&ã<ğÂb2›&')¡HÊd¶ÂÌ7#q˜ßuÂ]D ).hD‚š1Ë¤¤àr4ª6è\\ºo0\"ò³„¢?ŒÔ¡îñz™M\nggµÌf‰ué Rh¤<#•ÿŒmõ­äw\rŠ7B'[m¦0ä\n*JL[îN^4kMÇhA¸È\n'šü±s5ç¡»˜Nu)ÔÜÉ¬H'ëo™ºŠ2&‚³Ê60#rBñ¼©\"¤0Êš~R<ËËæ9(A˜§ª02^7*¬Zş0¦nHè9<««®ñ<‚P9ƒÈà…Bpê6±€ˆĞÆmËvÖ/8„©C¤b„ƒ²ğã*Ò‹3BÜ6'¬R:60ã8Ü§-\"Ü34íò«P¦…ÈÑ<2jÚ7Bbnş¿è£à1>Slª”£ P …±d‹Êr¬®º<# Ú³©êô ?ò@Ğ¢ñ\0æ6©Üx½\n“LøªÔ¬@’Íé“şâR48£0z\r\rà9‡Ax^;ÖrECÌrŠ3…é^Úc˜îÿ…á˜	´k9O©èŞ7 xÂ@(@Ø5 o€+\r#š‡£Xè:ºèÌÔÃÈsC\\¼®\"pòƒ/\0­4Ëš’CÊ>„·åü2`P–7Ò“[±`ËLj_B\r*´´6êÒDˆM3ÄQV2E#“ïmÚÃP#£uÄ4Ùñ€‚3Œî*ëgM‚šnğ&ó*á(9-ó“çxğÊC.bòxÛ°2¤º<æ\n:#%&E“´ÅŞ½c\\A¥\nbˆ˜xv<7İd²X¡;­­ÖB\\éM7:`«ó\0003°H3w0¶Úói½\rää×>C÷>ÏLÃ4˜³¸’6ó\"ŒYŸŠ{òì×®;œê\"NOÁÅ6¼E¤0j™L¶€áÔ,«^ïWEAùƒc6Û«C¯(:ì‚“«7#0ÍW) ™;¥RŒÏ„j4Êú6í&<Œzóî«Ò¦a²ac<[H9l¤@­ÈÛ
\$•Å*>ÉèúlU`Ç´P>ıòŸf3ï™ô7„Z_cÕ\rÊTÇB\nk [Í{ÅÕ\0€Âö_ 8D¢”\"@‚\n†Q\0Aä	‰s)>æ¡œ™Õ ©U:©Uj´:*õb¬Õª·„`¹]«ĞÜ
Ã\"Ïb«=bƒè‚®LbÑZfÉ‚ 6XŒ‘?aÀÑÂHLú`šx@Èš€êƒ¨d?iÁ‘`AU\0¶Š5R*hÏ•b®V\nÉZ um¢D<Jñ_4Â>UbzÅXî<8iÃJ ÎÍL djZ	\$~p¼Œ¾Få‘zÌOÄxÙC}H4M‰æué\nTÁ	MÃ±¤Ñ©5B”}Ğ3eF¸á)Y\$c¢\\3¥Iü½’D÷ ›z%ız#Hµ0RÀsKA¦]ÃÁf\$” ÃR€H\n\0¶hŠGtƒœ>¢Ø2`PSKÃ Náª—HNI¡âRjVa;€@eÌÉ›\r&	í¹bv@aùRäüR‘ğècã2C¤X‹£Rô¤‰0g*ñ¦2pèøœY\n\"íy cpˆ	ˆdcnì'¤ô¢S\nAnòLÁ™\r2øŞ¬Æ²R£4\\&¤Üœ©h,çY>(V\nD¡:ŠH¶L­tÌQeH€„'5Dİl!sĞúàåk´ÍıÈØ2‘ ¥.¨j° hB®é  ‚2\n}PŠ–œÖDâPˆB€O\naP©´k%¹wÊ&‘Ö»%È»µ F¬[UPç_CIÅeiƒÀêØ§É1#%&’¯BØ[/\r”4’Œ‚:9®AÉX‚]YerL¨„#1™Œ„A\0nD˜ë¶ZÍZX[a\$\"\0ª€D!P\"… ’‚=Ã¸¡'… ¨G	×>è°v‡
\n	×…J©îmdz0MÕÄó—:à^Ÿ×½lÂÛ“¤NÙ;ù4Vl–_•ıO‘Ù m\$âaIÜğs=î	¡XĞNËq¿ÀfùjÔe±‚NKš[81Ä›¨ššÛ2v”1¶:¸Ø+«©q<HÈ\r&ÌÛ›·Ğ¦H²I'mÅ¸Ô&rRZXm¿”faB—8Œ›¾(í…€ÖÛ¸l<ø
\$*KËipÎ>“@šhn	p[³ò® ¬º²2ğ0‡Ü<6öâ÷3cZÄ˜Ò4\\WaÈ¾tJ{VmŞİº{%äğ‡dFşŒ›CÏwÕhy|qSÒ|“d]§\0ªkJÅf€ ¤¥a\n©86ú[ú ƒÈ­¡Ü»°Â@-–ùú±[}Š±ù)åæ‰ë:ÃX×Ø àƒ`˜ÀÈÀ	&ÆFÈ9kJÆItA÷o‰€˜¹*“+ûÁOÄÏìë1´X&ÔÙ&4m„cpTÔ­˜ó,ó‡FÌüğØ:ølù{¶Ÿ†ÕŞšÖ)n\rÒÌşLhèAomhV›qñ*%ˆ9““Ifiÿ©2¸5\råm^±L§%2»Dìó“ó´LvğOwd{KŠÜà©ĞÔr‚jïKaƒ/ÅW™fğj¢œ
Ö3™3Zp‰VÊ¤Ğ\"ó²‘IŒ7æÉzº¸ÑaÍ§K‚ÎsÎ¾€p—CêkÃª¼6ãÔ³J˜éîk°uàš“`m\rîû’1öC, ¶EÌ†…&OnË-]ÙuŒ†»¿~Yì‘«wç›:ïI4;§ÃÇæw‘š\r<3†@RŒo&¦n†«Ÿa±Ğ°§š>^p@*
–ºÁíyvš§=!ì›¥àÏcâºSt}wÏuŸCî²â§çİCÅ›/wÒWJßüçO“Ø¡Ïšõ¿Úp'craK¶wCğù¤w®ıLo÷3»˜9o†Om“í¸ĞD*Ñàş¯ï‘aOı\r\nÜ¿­yò:şéã“@Öşï†öbhà\nŒ\r€ZµGè°kbb‘Â4”ã\$˜¤úÃcBEÇÄ¡Œài­ Ø·Ï\"!d*9„<=£Šú¥7)N¡CäşLşı-şÂâÎĞŒÜõ¤ÚšLø'ÍÖ»å¶^oğõ®¤Ìïxıï@ş0zë¯ˆ÷,4]-DÔ‚.ıÎ‚îK*Ôdşñ/’ø°›\n®ÆÕ°Ï\"R°œÃ0¸S0ÂÉ.î9%(HEî@Ôhd~/WKF3Lq\r\",ÓÍ@ùî­\n.´ûpôõ”/°ó	®Ze&Vğp¼àäÃÂ:ç3`ÍiFş2ñ\\…ÖjdÈA&6'FL`ÖÔ‚­\n?\nH™be°
r±TC°1(qa‘-Ñb` ¨EÎª|DZ‘Pab[
n¢İ11r5¦-M8°‡C\rkÑ©p±¤ÑâAºnZu1²Ñ1šÑ±¿F†\n„{
-JEÑ.ºÄ©ò\"ìªÂ wDÑn}Ã4\"ï‚±ø<Ñè\0ëe
ˆ*	ä2CÏÃ°¨J\nF1`0m«\0Æ‰®ºâÒø­‘Œ<X#:<SÎ¤	d¨m‚Ğ'j`-\nkğÚ¥¼èñş@’ƒ2ß,p^²K&ñï'P®>âhdF\r€V\rd¦‹ÍŞ\$
…ï5+**÷>•P\r+Œ\nŠX \rdÓ\\Ø©~\0Òµ‡/2BÙKçÒÎŸÃ%(T…„¦JsgjM¼ÓÂòˆhCŠnæ ­’æË‚.…&<ª^”¥\nòìğ¢,yNF¢Sn³Q G£‰Ât&²úCÉ”JÀHNÃ*ò'A†ÊEƒ&“K'ïJ¿Bvì¬-¢l àŸqi5ólçñ­Óxë ŞŠ’Ï.-Ó80D],fğ(¢pF\0šíbŠÔÏ(½¤\"ªM®m<Ü‡N‚P=‰2ƒ<BàKæ~»Ìè/Ã«0`í5kğÓd'tAkÀ@Ì1>Kş0f7'0\rg©.7QHÉ Fw#[„@Âz<år\r@";break;case"ta":$f="àW* 
øiÀ¯FÁ\\Hd_
†«•Ğô+ÁBQpÌÌ 9‚¢Ğt\\U „«¤êô@‚W¡à
(<É\\±”@1	| @(:œ\r†ó	S.WA•èhtå]†R&Êùœñ\\µÌéÓI`ºD®JÉ\$Ôé:º®TÏ X’³`«*ªÉúrj1k€,êÕ…z@%9«Ò5|–Udƒß jä¦¸ˆ¯
CˆÈf4†ãÍ~ùL›âg²Éù”Úp:E5ûe&­Ö@.•î¬£ƒËqu­¢»ƒW[•è¬\"¿+@ñm´î\0µ«,-ô­Ò»[Ü×‹&ó¨€Ğa;Dãx€àr4&Ã)œÊs<´!„éâ:\r?¡„Äö8\nRl‰¬Êü¬Î[zR.ì<›ªË\nú¤8N\"ÀÑ0íêä†AN¬*ÚÃ…q`½Ã	&°BÎá%0dB•‘ªBÊ³­(BÖ¶nK‚æ*Îªä9QÜÄB›À4Ã:¾ä”ÂNr\$ƒÂÅ¢¯‘)2¬ª0©\n*Ã[È;Á\0Ê9Cxä¯³ü0oÈ7½ïŞ:\$\ná5O„à9óPÈàEÈŠ ˆ¯ŒR’ƒ´äZÄ©’\0éBnzŞéAêÄ¥¬J<>ãpæ4ãr€K)T¶±Bğ|%(D‹ëFF¸“\r,t©]T–jrõ¹°
¢«DÉø¦:=KW-D4:\0´•È©]_¢4¤bçÂ-Ê,«W¨B¾G \rÃz‹Ä6ìO&ËrÌ¤Ê²pŞİñÕŠ€I‰´GÄÎ=´´:2½éF6Jrù
ZÒ{<¹­î„CM,ös|Ÿ8Ê7£-Õ@×ìªZ6|†Y–ª¬L©×\"#s*MãìÅyp§ö& )#›î6Ùjº¬Zdy* cLïåœÃt2­hZV¥'ˆ\n³†¯äÑ)IJ•
6
l\"ÛD,nµræVõÿYÒ²Y%Òê´™ØwÂ)mª;u³ucy%\0P‚2\r²DÎNs«É<sÔø#Æ÷ÔrOÀMÃàñãKòîO
Í?Ğ#Èç44C(Ì„C@è:˜t…ã¿d(»èİ3…ÓPÎŒ£p_?t„L\0|6ÍO3MCkíR\rÁà^0‡Ô&·…µíÌ)ÄX ‚à\n~ó¸\"-šS˜íÉer”¥nªÃ•×Ø·Õÿ%-²_0S\rw¥)İ€sÒZOğ\$Bğ+Ÿ3R[…q7WÄi ^£¥ÔÃPj©Rˆé\\*¤B](W!È7\$€ÎHA(dFKíó\0˜S\nßTfa¨­7Æ@_\n9kTé›–ˆPˆj`œ ø:r\nø‚Máø\n–Â‰Â#¦!Ô6'€ìC`u¥|á/g¼®ŠRo!:†àÆ!9h={²x¾_@AáÒ†w©YÌ]`%õoH¸Û{âSh–¨U'á\\l_ÇX3Ù\0ş!£2‰¤B²'Òüãâ¨ipB\$ÒóÑAKnÍv1Å@Ø|Oñì\$Œ0†äŠBaH†°&-È}Ë;ş’…È¹\\Ä¤AkqÀ	8 N^&Å)Ã!\"ïÉpêÌˆ\$ÿ`¡­&:gÉ	¢¾æ¡HƒHaM-'ê…äÉÁzê!ìÌ6ÀÜEtÚ_suEu4Ÿ´6lFºa#¨ƒ>Y@/) Ë§Ö®QÒ˜,ón€CrmA§BPD³u‚€’iÓã9‰F†	¿Š(/æd´}²N®äÚ:œ©<âÅÉ×ÙS_dò€\")™CÌ˜o}³®‰6JTM|*8C÷*OMI˜7T‚ş|*ZªŞª5JÎEoœ·°ãaC\n;gv Şƒ0loÇ\0Ï—šº÷&XT\rç•çàò#+…qN03E@@PÃ:Hn‹¸ˆì’ˆ…îØ:ŸpPÁMl|0ĞªæÚDf´Zå]ğ«Ö7\\+{ğc’æe’¼úa>09W‡Á{vÉĞ:®C#tGyÒºwRêİk¯v.ÍÚ·äÖîã¾Nu64*Wˆ®[ÏI/Iê Â-Ú9jU«Hš?D`¹M~¼_”†Aí#AB.Â“ŸŒ3›Öm&79ÀİÕ™^	©ÀûÚ×€ğœòfÀ4ºUè]½u©Ö:ç`ìƒ»´o—Ü‡'vï]åTTOAâ<j.P3½—PTğ@Å\\¼*>Xœ0†·”ŸS=uÄWZQ\në°ˆQ­›4ş6¿uTÖÊã.%¹±÷¸ü£İ;V€*Ô'sS+•\r’œ1 à™íc…A„3_Ôó^Ş\r}”öÄ9Sò|CAâa…Š‚\0Ç±i‹`Ï)v¤EST!ÌİŠå\$Z	B§‘Œ<Ş˜ğ@‚€H\n#Ù|}y³²™’+•ˆ\ruô+,j•ÛÆxL|O)ç='¬ö†XTÃt> í;9œ¦Ã¾¦´ù¥ÒØ“àæƒš~qv%2Ÿ—”ƒ…soÎÂ î~ƒhÄá¤3º A•sAâ•Õ8•à†ÂF)ÌÃNxkj5kÌ=ø,dÂÌÅHs÷®å’‘ºÏCüLÜ—Ñªò£ô²`é Ù‚\r5·‡~²¶B§‚¶ ğV†È4l@ñ7¦áW3íÙ'‚/Èœôî«Ø…ÛwÜ1‹u—å<K×u¥¾x˜¦ÉÎıÑgÛÛÕà’GÃÉÜpãV’ {ŠÑğt¡Æ-3`@“Hm¶8MÛÚİ|™CCN9£V'ãÜp'2àRâ|Ù˜œTB€O\naSD¸DLmí¦Sæï›Çİß3asBÍšİÆ,¸÷,g\\t¾™¸b\r (¶Á¸3lÀê£ºe˜2éãÃ ¬Í”¢\n&üÖ.u+)A(eÇ†-˜œ°èú§4‚¦‹•°¨4ÑSbSÇHbœø94+\$Lf¼KÒ<êPÙö„šÃÜ.Øá¼„ğœ¨P*Pñ\0D¡0\"üÖÑa×{‡ò“pë6JÔjıŸfµ¥pÇº„Á@P„y±‹&}ø%<Ÿi2øYçóg=Ç«Œo³ûš8%ªBCXíd„:¤üê\$ÈNæ¾b¾&\r0â\n_QéÒBKàlĞ _î
„…Ä¤şøJ*\\ìÉ‚íxë0»O†ûf% ]Nî\" ­ÊIPTÆJ–ĞsJ\"Ÿ-ş|¨f_‚¢\"†®ÚĞ†Ù p>C§¶ÿ&\nÿŒ.Z\\ğu	/û	ü° \0©Ä¥%,¼n,JBøÓ†«<F‹´«KĞÿj@‚+*,ëºëM(FÀP\nÈFÎCş=ær K,D&Ì%1‡´>Í¨5nNƒËÀ-éè LL?\$Ò­š\rÑlôª§ ©ãä/ˆ~
<ZÑ\$0ôlƒšádf'à¤tÇJ`Ğg/€7‚m­äün–°NİÆÎ\n`ÒH¶ÓcN±¨¶\n`Ê=ˆÎÔÏ®¾\r¼›#Fïä4š	î¤ñl{«>’e€£#\n,\rÈ®­HT\nm’4ÀÂ² ¿kúÎJÕT=@Êè¸U\$Vpã±vâH„€ğ”æ'À†0Ôb\0’\rËr™‘öD*©§ò o 1æ\"`Bª’â¾1Œƒ\$¤ò.UË@£¥¼ã¨Ü(¼‘åal•!_\"ôÉ0ÜqşŸc…%Œ½B‡¨bœ1û\$°±¦–“¥DFST‚ŠÚ†Ë>ãr+á,gá\neÚã„b\0Œy£ìg%(BÊDİ­\0FÆÑ\"#qújÎağ°—ò ±\rÆi	?!\nNœfÈ¥p‚Œù€¨ †	\0@è„Î\r\$ê¬®zp àÕîPlêSp·¦Tì°n‰jÜ7°¼Hˆ^ B6…JaÂÎ:ˆ]3µ'ó6î0}

Îëó	Fş*cÒ]	ğ³FÑ/§@…ó3!%İ‡àòL†CSb|î<Àdi1pX¨q´àÒm°	qr½D„3k3Ğ—7{¦QQæ§3”¤F‰Bü)„ûób‚ĞR‚â&Ö¦Ie7èŸPÓ ÍàÏ®îe“l³“ã5\"Ÿ93Y9s\\—ó\róŞX3:÷s‹?P{,Óø«Î7‘Q<óa*Sß4Ìi<RÕ;°˜ÃŒ	ZrÀ@M îIĞVï\0š§¸+Š#¢~óBˆ(Í0”M&É&+7ÑhÿÈŠX¢€(T^#FGS îMıAóCÍ-â#BÓÂ§ón-óöÏ¨6lp@Î¬jF\nüJKIdU‰éÔe(®:¬€ˆjp)ÂÎn‚£k)\rÈA\r~-ë(dÅôAæè÷É«=Ô\0^k·‡æâ°MS6ç³7h)+Ğ% PcØ„fr5¥99\nå³æHD-‰4üè81d]fÇ”ÏBt!8 ş/£.U;7Îø¼ª½tÄæUG;“ÿ;ÕN½„±UiN~¢ÆnĞP\nt‰T“Ÿ81ëTÓN°#+•‡Wtù:ƒXóŞSU•;I•7§ÙYõŒ€õmY2ãWRéY´ [«Ö8pà1î§Ö†0§èúÁ<.¢ŞÇ5rŸBS\ruu®V¢È¦Š¯ ßuvÒhİ+ÀˆM à©â5MSAR‰~9´î,ópò“°†äga³ñNO¿9àŸr£èŒğ	ı4r\r
s­4T² ËİQá[\\“£\\ÎÙ“r:°–ˆ\"!ª¦\0¨,¯èrœ–m\$`QT4”Vf‰cå,ğ'	mÆ—ïËOĞ\\T@‘u6uq\0’Ó5v¤‘s]°e©“eî5U•K@«M°µAIÜ¦i/59iÍVuÇ]µ	k<p»l§eÇûfkoÊ¦éçdT‚‚C«j¶íjöeZ(§	éq/ÿnT§?ëPu‰k¡mw#pôh§q§7VËp6Ï[4)k7\n€æè+ò³Hî0Ç/|î¢O2ê†©Ÿs”WÓ¾!“¦¼ÖŠ¤ò9lĞW 5Î†3×5ög8oÏ+Kä¾eb·v®ãq¶ÑvuI%§w¡wôû‘ı4vÉGEfŞ5J•a^Ö“ÁöôW\$!U–ã­z÷9[oñ}é°WRExR!Z÷OCSeuwó|—ù'«UVéwW˜ fr/\"°“·æ4³:¸¼Q\rzp;ƒÁQ–y …Øå2A|¤‚ˆµesUu*G1ÎÙ1 Q ÌLçzqhTùròĞHk&´ãLIÌA²K<Öß1§î&ØxîÔ™²Xï	àI˜-h’áƒøFD2#Rã¯vç¾“¸Ÿ.wƒ'5æ»RÑ8Ğs	x{3íì'øp6|
  ­Ï÷¢ˆ¸~ƒ‰áõ5®kJ×ô÷S‰!U¥uXÍZ­ ‰˜&‘ò7ò@úø·\$8»!i9X.-\$õ	‡õ|˜ÏZÈ'…vÓW HG÷€Š¾•™z×Q“·;UU”7‰„ÊQnw1Ô‹~×sÙA“¾G×,œ‰_PC,²Ã^Cz ‹Ê\0Š< Üq˜Unø“ò}²Å72È¢¹ÄRp
“•‹Vãš(kšfª|­™•—rç—´Ïµµ›Ò¿Ùƒ˜uå)5šù“›7J‰yŞŸ9Åp^ğ9íœõ7rõÃ²U+I#PCâ'ì|g,ş/Š€JŠS¡fÉŒ·“aø¿ 6/+¶6Ü¨iXUbïu÷uv+µ™™)syk•I7yËÓ+Á“WM–yOHø!¥÷az
µYcvùÙ…•ŒŒˆÌÊÆ£—öJP­?¶ø™·G’Q›J88ÚˆÓÅK\nU¤Z®H%)íqN[5Á«JZë™`DÊxÌ§¸Ídèc«÷+i€7 ™ùmƒÓC­îà“š} ¹›q×	§:Ûƒ:qZ7šéÕ‘€šñ!W(Ÿª9óªi+c¯®!'Y_ šÉ.Û*56ƒ~uE¯ùi°9?g1´@ÊĞZû³·q°í¥ØÌŸéN[Ch[°ò;³ûm³[_™%Rhİ÷ãfûI–ZYµm&xó&Û\$zh‘»¶ó¸›G;£[ùa¯ÚW›—ïÄ¸ºc€ø?¬;y‘{Ç»8³¸½¯šÇ¸Z¶“¥ì”9©Yä@³”c„j¾·T¹®Wë¦÷u)âP«%W+¼¦“Àvÿ²h‹™ÏöZE­ÁEš»2•Á×ÖZÚ±zç¦Ø±x 	àÍ ÉuÚ)¤úyºßGşÿ)¿Ç´j™…«³.ÒòĞÓ2+š²Aô¢‡\n
Cx‡®¼I@Óï\r	>4ÇùyÈZSNœ	­ıºÆ=ä—pê'õT»[¢Ä-—7Ê…û?Èÿ5ï2n“ï§ÖïT#GE‰6(£5Ë@úŞ{,#Fù¦®PãœïBWØÚÅ\r€Vê Ò`Ö®sQ¾‹M@ÄàŞñ`Ì®ç,+ÀŒô€ÚÚ„ğÚ
\n ¨ÀZ \n˜¶ÏI\"½Éy(j!—İ dŠÃê3A¢œaÜ)mUQÏ[ ¼÷¤³j#\$ƒcéqgo] Ss«³U¼I•¹°0—][#\n2xÑú¹\nïâ½Ú.«¤IÊM2là›ÒàÓÓ5êòv	ÏñYï²¬­ £\$ØÄwd1£L{Ó¦§@AU3Ï—C(}©w;qnRØU‹É¹P¨ò ™Eı,Ö£ê? ábŠ„Ñ?­{¾şéf_y‰¢Ëì›ÒÑr˜ÊQ9:¦¤ä£¬C¹{fŒ©Y0ñÍÚ8äé9PmIÔ¨9Qÿu©zµíYeZ+™u×f0‹“şZcn¤úU[eÉ6Ö\nŠ>¾<-§{ÒQCñÙf›Ã[×Ãõ.,¼,‹ü`µ
yV»É·Íf^mãø6³hõ&Õß^;÷cB~¤’oÈóiñµ¹7·\"ØCğ–¦o\$Ú? @ÇJ‹w¿¯>×Ïà@Æ ê\rµë¶=ïs24'àŸëæû„l…ÄŸÆ~ @S¤aÚIbØº0È/â¹ãˆEíİ„ñ\n€åæíÌ=gÎ‰áŒ6İî××Ìœ‹\$Ã‹0'\n|È>qm¶›aÈ) Ş6\0Şh@î=ï³úÜÛ0–ôş7Î·ìs2¨†›ä—\$^©Tòƒî 	\0 @š	 t\n`¦";break;case"th":$f="à\\! 
ˆMÀ¹@À0tD \0†Â \nX:&\0§€*à\n8Ş\0­	EÃ30‚/\0ZB 
(^\0µAàK…2\0ª•À&«‰bâ8¸KGà
n‚ŒÄà	I”?J\\£)«Šbå.˜®)
ˆ\\ò—S§®\"•¼s\0CÙWJ¤¶_6\\+eV¸6r¸JÃ©5kÒá´]ë³8õÄ@%9«9ªæ4·®fv2° #!˜Ğj6 5˜Æ:ïi\\ (µzÊ³y¾W eÂj‡\0MLrS«‚{q\0¼×§Ú|\\Iq	¾në[­Rã|¸”é¦›©7;ZÁá4	=j„¸´Ş.óùê°Y7Dƒ	ØÊ 7Ä ‘¤ìi6LæS˜€èù£€È0xè4\r/èè0ŒOËÚ¶í‘p—²\0@«-±p¢BP¤,ã»JQpXD1’™«jCb¹2ÂÎ±;èó¤…—\$3€¸\$\rü6¹ÃĞ¼J±¶+šçº.º6»”Qó„Ÿ¨1ÚÚå`P¦ö#pÎ¬¢ª²P.åJVİ!ëó\0ğ0@Pª7\roˆî7(ä9\rã’°\"@`Â9½ã Şş>xèpá8Ïã„î9óˆÉ »iúØƒ+ÅÌÂ¿¶)Ã¤Œ6MJÔŸ¥1lY\$ºO*U @¤ÅÅ,ÇÓ£šœ8nƒx\\5²T(¢6/\n5’Œ8ç »
 ©BNÍH\\I1rlãH¼àÃ”ÄY;rò|¬¨ÕŒIMä&€‹3I £hğ§¤Ë_ÈQÒB1£·,Ûnm1,µÈ;›,«dƒµE„;˜€&iüdÇà(UZÙb­§©!N’ªÌTÚE‰Ü^±º«„›»m†0´AéüIKWÒ\0E¨Vå¥#ª*Êş\\`îıÃe94œÇt!JÊ]Ã•…ÃPç¨üá+¸»¿\"xv”áV
;¥“GMÊ ¯Öˆg%'¨å¹§§ºŠáªeÓƒ,ÅŠªg(ˆ# Û*ÍÁõ>>3ı8Pc”ş0Œcø9Ê£8@0îS¨Å;½ã¸Ó½;ÛçCÑ#Èç4C(Ì„C@è:˜t…ã¿L;vá9N#8^2Á}9ÑP^1ğÛ8½ò¨Í8° Ò7Áà^0‡Î-ö»îŞŸŒÜKtíÖ\ndÈ\\«x+Uf\r£Ë‡[2ÍŒÇÙ7“WL…Å1N”ÿEñÔµ·ğûnºÓÇóÛ#¸VK¶ı× ¸WgXpÂƒsd„2c”†‰s1`‡},¡Âvc2.jtJ˜’TFå­‡\$BàNÒË[-©8Û=†°²Vš7…ÈH¡Ã‚-\0PDsA„:†Äşƒl¡•‡%“\n‹ÁNB'„ä,Ff®zêŠa\rõ0(JÉ6%u]¯•¾]1Û#GIB~vVCÛ…-a5dZONCkTl†µqq\nÚƒ°Mõrv²Iê˜+l\$¸¡ªFÊËÖkkp®©Òºÿä@F‡¡°ÿ Ãò a\rÑe­¨ Z\0S\n!1÷+\"¨†W‰nB¨^R¾\"àùQ+ô}-t°¤ÆôSÒ„2ÉøF•2üÑ‡“ 2¼²¬óŞ”Ì1ÌIŒælÅp’ÚBË5şw–;L—OrS!A0J<.r,æ¶	\\\n,‰œá›Dx’[ø€0|Ç™h\\Şz³cpä!%)£1¡Fy°åÉcŞbqM¡ºƒ+ê¨pe78 ˆ¯Ùô D	,CàäAê€ç¼7†`Ì‚I)†(Ò\0ÉĞÑ¹\n¼ù<ÜA\0u¢¡Õ¾·ğÍA\0l\rá*‡7(•8!œ0¥PAS,\rmá¸: PPÁM*y±Ú8?Ê`oÖäg~,¢dõ@¼ßÑX\n‡±4×D«€JÀ¶Õ4Üå\r!‘¸¹cÖæ\\Ûsî…ÑºWNêk³¬N¹ØôõC£Ãv ˆX÷„•3È+M¿Ù%S áZ,'«\$‚,Çôªit`R±¯¦6Â¸š/j¥öz0‚ßFŞÒ;W%`&§t
D›µrI´< \0ÒæT[•röÎ9ç@è#¦î¡ÕäÜ
k¯v4JŠQk&îBHm ä6»\0éfAõ¼®2Ÿğ@ğC[½P©º›^eŸ-Ì\nÜ[0p¾®g¶ºe\rx•ªb80Çd^  qA²J#Şuo¼°40†k~ )ã~v”şJT*ˆ›R ?Ø9†ÊÈ¼Á¦ ÑƒoQÒ«;ª¹MÎ§‹Î’Á{Š]Qª÷ø§IÜƒ”@\$\0@\n@)U(R^«zNß¹Ü€7ùôËS”UJ¸\noë`w‘ô>ÇàıXŞC¡ıA)õ½àÀŞó6MÎôş¸@æ¡›õOMˆŞ†àáU\\{´r04; ‰›{ÃHgsÀƒ b3ß&kˆeyQñƒ#‡·h- aL)hÇN“ILˆïÌ\"Ë%´Ùz%0ÛS¿İ¹W
 ˜øTWUijEç…XÇ­ŸIaS©dª¬DXWKav8FÃV®3šväu¨Š<œ­ÈMuzWÅ`\$’Pòz[•{ÍŠØ^Ô\\ÈqˆaÍ?†dàk¥Õn9ñ6:„1kPÇí Ï”ZÆåVM…°+8ĞVÊé=*»4\\cL·6\nU\$ÏjMÌxÈ\0–ÉpcZˆµùsáEO,pC£ä*V}ôÉb´ÜT'ŸpI”Ø€j©pz3DÊF6d İÂ`©‘¤Ô\r\r7‰BTıÛ»÷ r=ÉÊN
ˆĞ¨!3jDEçN‚³Ë‰ùÁŠÑÙ\n.Âp \n¡@\"¨{?i&^ß™¦– 0QÁyÃŞ¬Õ9ùG‹«%¸pQc^œ]î>œ(ş]ßÜğZ4æMX“µ¸êFV6®?Ä›ŠšQ~3»ÑÇ)±2ŸJŠQ§ÒKä²xKŒ¯¢7Ot%¿¦Ó7š…è²ğx¶i>ÿÜñŸzˆ¡mh6\"ŸI¾ˆ’¾©ævVS„x~§iz®Œ¿ß:Ãõ*Jlˆk\\Ñ¶ººÒq¥˜
\\µ\$ÙjˆÉ	ıÚeÀLƒ®P.+¸ËÆü9|Ó,ˆÈÃ…0h&°( ¯í\0b)'Ğáp€¾ì(¦ì„Ê„o-¤\r ôˆŒ¶¼Jªˆ‹8?,ÌÄ°7\0™‰œšc”:ÏŒ—/|XãÌKz·ìX¥:£î î^	Lò'ì‡¾…Ê.b`—gŞ•çä|ï_„ÄX§§Ïb{opûõ­0T©Z2'É	ap–HÊóóBfêéÂ¶D¦ITS„|â¾ñHJó\"t?Ãêãö£äDS£Â‹EˆıÃºf,øVäÃ¤ÿ‰Ò gøEâŒ8Êbû¤^É†Š[…v8\"Øì\nïï¤ûir¯ªµÇ¶fæ¤\"Ì¦æ&NÜ\n€‚`\rÔMÀÒOŠFÜfîÍâê®T6íQ¦<øãÅH\0^3\n¢Ã¶I¯\"[&È'eî\\D&qr·C5”H%R;°^d°œˆ6.nÀ8­@óP“©¸åƒÃC¤1æOKdE±šÿ&+Šå)<àc¹º„)0´Ï–AñÜDeg&oÀ˜égàè;ä9¢¶WmˆXD`‚OÌˆc
ğ„P\"Ã+d”¿f±JW#Ö¢î9še†].ş\nàÊDğêFâè)/ˆ¾…FxBJ[\$5#ËI\$®1'kşÇ¥fğ\"ä[ŠV¬\"?\n)¸zÃP9£hğke)†Z9¢~G28[Cº†ÂPaÂf•É}DJ9HE	TÖm.VhöójÇóh2[ ø§ÎQÇ¶<’ãñªYÂ²;\nRşIeRÔDLãÆ÷s}DK&Í(¥E ‚8£·-¦+pƒ. ¯1ï™ïZ<3;/Ç®á]2Ó®ò:DY4£Nïú…m€û	¯\n±:“†‰)ÓE­H+ˆrN\0àWÀ~+2¬¥ˆB…:‰åF+g¬Só’ÆÓ™8Y)I¨“ñIU9eã7C[
n­	I	‡¶zÄ8fbºXÓ@AóÔÆÎBš£Ã=Y=nªEˆ*Vh0ÈèøS\n./\0G	í6ñ	²D£s%.Ó/<Iz–Ÿ;pû3pàU2Dõli6š¯Šovë‚¡A°}
ĞÀhÔÕTBóBšW11}At\\³işšræII‘?DsF	¥FQô¿P’:I`8ÔSF¦¬I|9u%OnLBS%‡ùÄMIåÎ0Q®%ñ³Ğ^S«iÆÉ<d¯Fë+aDI±t­!IHùÂÈñÒ8ĞÖ}4ÇH”M<‡Í+°›NNÔØgİOcÃLi¸úÓ+=²¡\"‘ñO4µ”ä^£W
fóƒ½>Hù?fCˆ0†Hè<,u=éLä4YBÃšzÔ°SòâHøùñT®\r	ÕQ=„Ddô*DR—CC¿“²{bgTœïÂÉH•4åKM+nëĞYnºŒ«'®9±õ²£3C”]èBÚğÈï•To}c»Oµ±H°»<µ¿5 ;§ÙN/‘A“VñµçG*7GsG^Ô1\\0élq(„q/(¢\rNõF•ã`©á`éâïOÉ]HÔP˜5ı4(C¢ q3aQ}_•N–-
ŠÇP4’9¶<Œåbt2VY`ÖAbQ57„ŠVs~õe`:#hÿv>”éU`äjaÂw;¹_ƒÂ1özLtÏb%`<%Z@¤q¦áHRéa”}Cªª¶¯^–O<v1]Ô“Rº²+­kt{©åaµ×OöÇeI‚	\$\rÌ¼x”P	cncè\ræü€ês6búöè§Vî“lk4cæNÿp(‰/r®9¥¼B“jæFR•gÇĞ¤¤±_nÃß^’ëIK9sìótVIm¶·E÷<ˆwAmS<ÖÅ]¶ä}©uk7u§atõõJÕßvvSowmcw;t×Cw·d³A/¼[—'tVµ\"ôI+¦©yÉUQ—Rúö73ß-)© u0[¢[piß|CyñägIKR8\0©ğóväù7pWŞÑ7ãlßb÷ixU RïãuÙ{VMvP—×jõàA€0ó|‰AÄÜaÑâ_6Ökfë}1F¿±LÊÖİvTOl–5ƒ…Ç}Œ«
Å›_õGƒÃXO´¡„ê	î\r!JoW.Mh-”'¦+/å¸K%:‰\$Z´¾üQŞü—4Ê5BˆT_G^2Œ\\6g5†}%oËA-ø DKG0t½³<Ò‹Q‰”Íd;ezj\r€VŞÀÒ`Öãb\09ö‘3%Ç-Nöæ`Î„\rªâOí©Àª\n€Œ p¡jò‡‘´8Ñ‘tB»Ï´R6bÔğ¸œòòòĞ10Ç®&l±€ß’@Ì.«?ÅfVT9õD 	¾‚U»æLd6˜‰X‰ÃLM{ÂµCœy“]rYD·ùx9ÿC\"Ë ˜\rîtwg2p¤Y¦u'ƒÈæKãX.íz)oºŠñœ—E¹,uf‰6\r4©@€Ê«/ÑZÕÅ@õ\nÏ~©T…X¯ÙÜô)@ô-Šš{v¬\0 Ãú=ƒÜÑ€Êv\n
\"mğr¾ö#Qõw^B/7VËXL\"»¡#Á6Sá‹t6ıõz›bg–[@r¹6—	÷?¨ü¬i¥UqÓ£5ºB‹éz4¯e*@¬o€ê Ûsz'wÌ›…:›Ìl[ÂzĞ|:#š·\"zdèÆñnÄ;¶˜;èİ%Ël2ŒeŒnòF±9Fv+9ö„ ¬d9¥iñ Õ}™£®y:şedÇ‹ Şê`î>¤
x·\\ÃN¿Åv+§­eöo¤ˆC‚±1ã¶…[œ€	\0t	 š @¦\n`";break;case"tr":$f="E6šMÂ	Îi=ÁBQpÌÌ 9‚ˆ†ó™äÂ 3°ÖÆã!”äi6`'“yÈ\\\nb,P!Ú= 2ÀÌ‘H°€Äo<N‡XƒbnŸ§Â)Ì…'‰ÅbæÓ)ØÇ:GX‰ùœ@\nFC1 Ôl7ASv*|%4š F`(¨a1\râ	!®Ã^¦2Q×|%˜O3ã¥Ğßv§‡K…Ês¼ŒfSd†˜kXjyaäÊt5ÁÏXlFó:´Ú‰i–£x½²Æ\\õFša6ˆ3ú¬²]7›F	¸Óº¿™AE=é”É 4É\\¹KªK:åL&àQTÜk7Îğ8ñÊKH0ãFºfe9ˆ<8S™Ôàp’áNÃ™ŞJ2\$ê(@:NØèŸ\rƒ\n„ŸŒÚl4£î0@5»0J€Ÿ©	¢/‰Š¦©ã¢„îS°íBã†:/’B¹l-ĞPÒ45¡\n6»iA`ĞƒH ª`P2ê`éHìÚ<ƒ4mÛ ³@3¦úN)#œ:6¹c¨Ü:©íT*í§ÑQb\nPßB²^-ï\\/#BJÊÄ¦.8Ğô¨3€‚2 #r<¨ïƒä7¾³ğ90£ÆÉh0Ü3„¼õ=pî4ƒ@Ş¨\"ïİ*ÿC X ˆ¸Ğ9£0z\r è8aĞ^õè\\0Ğˆ<\$£8^˜…õ3úÿ…áŠ\r©+\\É,x:\r.xŒ!òO9#è€ÊÍBÈÂ8'ÌbÈÒò=##C“\"¼\r«Ãl©ÏDı°éÎ¬rx©*‹-÷rÏ°œdXµ\"ª-Á.˜J2&ÌèáøˆòÔ‰s{‚·E·*J:Ìxé\$½#K0 Ò\nãx<-{“÷x§q”àPŒàh2HÙF‚]èÊ\$NVP0CC4SÊÃ’è#®Z‚¶h‚

B`Ò€µ\"k>–IÂt:ÇË+-·/Rä1x9§ÎX¢&BrN¾7 Öæµ7NBğ¾a|àf)<‘`ûş\\Mã®:º{ÖĞ¸MZËÂm“ZR•¶WzS'\\\"×´¢IòË(}I~®|oé¥×ù¶ˆ‚ÁÇ€SÛr’ë×@I+t7wê#ãá@C(ñÈ3‚9¤úµİCd–d:š£'LO§ÜÌ.=\$şÊ|5ûşÁÃ„0Â=A<bv9dË76Ô2˜ƒ.—<÷…ˆ.bŒ@\"FLEÃ™Á8m 2†³†Òˆê†&ˆ“²' ıO[§AaåøÀ–xG	ñ'PjC¡DQ\0\n™>|fdÍ’Ä:åÃXkE¦è‘óF«A¯V*ÍZ«ur®ÕèwWëCeŠ±Ãp/&olš\\)%•ş‡xºx¼,«Ì^å¶·`«ó~¡ÍŸLÃ`dª¬6€èòÈ(Œ'˜¨E—BHoPÒ•Æ q^+ ù#P.6&’†›ÛYChä²C¥d­²¸WJñ_,Iƒ’ÆY)æ<è’³ƒ˜>@E0™Æ¤ÇÁòLíö0ÁsrGWrø7F€–IØO &l\"|Ë*³ß’’TAá±,\"ó¢HXŒ]/ÅFKgì)ßûç1’tJ¼…<\r\$.’&èĞ'\n¨7 uÖ]H‘ğD…C0 È‹bgÄ<\n\n()‡-¤œr˜SŠƒ\0*©< °Ç/Å‰(qFb b†x]PAqòŠ!h®EÈA,v\$€‘rÜòÓ>0 ı™32@Õ\nÓ\rÁÀ¨,¥PÄ»Fhà€†ujMu1<:ÒN“grJ\0€0¦‚5\rF|à‡YÍÃm1p6 ˜c´IÜİ\"%óÑá¾×ŞüZ„ƒ`îeL–Y³\0A\0LÑÀ &\0G§éÇASº’sfeÉTa  OWdş«'8èÓŒhÃ<e¡å÷E†î~çpn|¯­*—€ò^ÀP	áL*Ò>A•]#‚je©Ù—úTHº0QÒÏ‘²<‰T±Ç¡ä3¦'ÃN\$UFp€X×Öl'É\$\r–íø†+=h{J\nm½DªÙgÅáÉ3ÉY ´£~}SOA¤\r£šãˆÚKĞ©PQÒÅ1>¦^\"µAL47på[…Š	`EÜ„ğœ¨P*Z˜r±GÓ@@*øœ—¨ö‚°xE	à|°\\‹`æ.\$Rƒ.c%È¬Ú›[QŸV\nf\0Ğô˜®Xk9lĞ˜Î%ŞbˆâƒĞ/.Pë}‘Xa¿	\rÓÅ''’ñ*FÇ—¬ÑÒ7&¡\nq%íñ†”2\r‰zßNnÍu»¶jä³%¿qËéÈL3,\nî ÓÇ		ğÖ^×xD–Ä,øÈEä/h:xÊ­Oyó§j]8äÃ>[ôpRÁïúüÀN[ËÑ€AWâı/«øÑeôk¤äÔà†Zƒ3…±¥!e“ÈD}f(ğ“„ÓÒKËa9À€#¯¸˜5è¶Ïá¹z#RâÑôşg/P”ì ç3œ2úq™âc¬GC6t`;Hé„G¿|\ròiY*5³’¿74úDÔA51¦…§sê›M´!I4ÀOù¸¾=ÁÄhŞ“2(‘Ë­×fÃ§ Aa àJ²ê\\¸dÆ’Ì ¦±Cª\r‡'¥¢1P^UØ«w]LMŠ¬>Á¹ËãDOñ\rüİ¿w·èF!ÉŒ/\"ÁÆ} Âx¿åœ¹øó{«ç5(œÜÖs¦.ùé\r6o™iîi~T•Á\rmÈÂ—TÄ OBƒ<¶\rôQOÕzN•„0r~Ãoze\"ıïö˜Ó–^ÏheG2¾W®¨I&¤dÃR\$†¬L5ïı@–P Ø–Ódã(õ pÊˆ‡‘)çÖê‘g3áÊTXî!•9š‹+e¥G6œÂ;K“ùŒË«¯Â.é…R\n{Ü¤ø ¨½\"äY6:k‘‘¡Ô‰>\réäf.™3+Ïº™¼äo\$äüŒÙòùÌ?\\¹Ğ¬'«4¹u·-×™÷1£mZ,È²Æ\\ƒ«º.fDã¬½ÎÑ·@À„#OøJl\0èı\$ÖÂ¦¯ <\rœEí¢_b@ûmš# ğN„Z/TcBÇ\0ê*`êÂÅËGdr†üû/¬ÍL…HT°äòüHopVàÈàÏÌªĞfÊç+	ÊûgQ p\"î\nŒHÓ P‚SL\"Ûp!NòŠC¦ßR7`ìâ¦aˆ\0æÎÚç,Fñ‰èçğ¨A£ræ0²éNC
îx&¬ÛËÜÜ\rÄøÌÀú0ÜŠƒ¶Ü&Ó Ğ#¿ğãè/	/’˜ë‚7êPÛâÅ†S òoÌ¬E‰\n2\":·äxèåWåc#‚a®49ç8&Ã²LQ*(c~ì`í\$ÊÊD1(¢‘«ât¯&ÌÙ	Í§MÔ^\r„×ğõM‚Øp
o£1} éQyM\0õÂíûO´ú-ø0Q~ûqª1	Ï\"†ûÍ¹­ÉJ*åC¸Á”Gdz-äxJcp\"î¶~‰\"MpÇ\nÑˆ\$ñî–ğšpbûq÷qüæn;â*[\$Ç ÅÊ#IÚ\$HÏ©ÈfÆpgCƒ P§!„¿\"Ì¤\\ É!‚ğŠ‘ Ïã¬%q¥\rªC\"ĞrDrIûgz%kW%‡%ã~²JûrniQ‘%&9!y!Rw#MÊ[1\"Üİ2e ï£(¦M%•)Éu)m.İ1È
Qâ;‘²à\$,àrrú\$O+¡bİ²—o’–r½'±”ôÊ²;d,Æ±ö`‰xÁ.CBÄNî¸¢bòÍè=-â‚­èä£Y/¢D8>˜3 à\"ÄàdmQ\nÆ/PÒø°×.¦ípåv—“4¯Ä fç)c.…ƒ8 c`%å\0†I`ØiÜ/æ³O@& ª\n€Œ pn ÈA1êÈ1Zèé‚ëó<éëÊ\\+Îâó0n˜äîœ0³’¯J3
L²u…ÄÕf‚9â%5g:GÄ‚,®z:r:/,ğÛSK\"\r¹4é&&S¼6mÜ¢©Ú|0X]hM,Sl€¤ş¬Çà\"ì¬»“!k²ƒ¢\$¤b²†ˆƒÒ~7(<¥ÈÔ(è,ZzÓB”1‹ğ¸ÂØñës­-,û‘),¬«v·¢Oé D²[)¯Åc~ğ‘™\0EùEäãL¬Ñà	¥@Ç\$p=\r“Œ\0Æãeá>lºŠ\0ù@è¾€¬8†@N\0°÷ƒ\\£R{\"4Eè/Œ PÔ÷Ãq4t´1 Ştç­³Å?ÌÇ¨ùC ÀMbŞÉf3Cäà\rçbâ>C²FK\$j\r`ìjäƒjÉŒ‚h¦@";break;case"uk":$f="ĞI4‚É ¿h-`­ì&ÑKÁBQpÌÌ 9‚š	Ørñ ¾h-š
¸-}[´¹Zõ¢‚•H`Rø¢„˜®dbèÒrbºh d±éZí¢Œ†Gà‹Hü¢ƒ Í\rõMs6@Se+ÈƒE6œJçTd€Jsh\$g\$æG†­fÉj> ”CˆÈf4†ãÌj¾¯SdRêBû\rh¡åSEÕ6\rVG!TI´ÂV±‘ÌĞÔ{Z‚L•¬éòÊ”i%QÏB×ØÜvUXh£ÚÊZ
k€Àé7*¦M)4â/ñ55”CBµh¥à´¹æ	 †È ÒHT6\\›hîœt¾vc ’lüV¾–ƒ¡Y…j¦
ˆ×¶‰øÔ®pNUf@¦;I“fù«\r:bÕib’ï¾¦ƒÜü’jˆ iš%l»ôh%.Ê\n§Á°{à™;¨y×\$­CC Ië,•#DôÄ–\r£5·ĞŠX?ŠjªĞ²¥‚ÖH¦)Lxİ¦(kfB®Køç‰{–ª)æ‰)Æ¯óªFHm\\¢F ‰\$j¡H!d*’²¬B²ÙÂéƒ´Õ—.C¯\$.)D\næ‰™ÄlbÌ9­kjÄ·«ª\\»´­ÌÊ¾†D’¡Òå¶\rZ\rîqdéš…1#D£&Ï?l‹&@Ô1Á M1Ä\\÷¡É`hr@:¼®Äíªş¦,¼¶‡’Î¢[\nCä*›(kYCO9Ú	\"%iK…Q%©™\nYõ‚÷£DÓ!5Ò°M.È£Dû'-(Äb5jC¼‘lÉhÑGUN/Ò˜—;s?K«¡
®„p ŒƒhÒ7£”šäÊ”×*.î£6µeş,‚4ªky©2^8‡òÃ(Ä|Ì!\0Ğ9£0z\r è8aĞ^ùè\\0á8^\rãÎŒ£p^8#˜æ;è£ ^,áôfß]³Ôœç%ÉÄÕš/¢ã|à\$¥Œi\rÅIq-}¤\rãÀ”©\0Õ¨Ò¡»pj¸ßIPİ„Yº­Ñi¿k‰êØ½\r£ƒ6°\n¬”&4Šƒ¸ ï¼F¦\$Q,Œ™Ä—= EUÃ/C '2“}MšP¦¡²\n5GªeıÃ!És=]íæ!ÍÛçSN·Õ¬(ú×<ÜÁ¨m1ŞÄÜ¤#8³}3sI12©*{R³ºE«cWÚì*é.xmTGÂF»{u1FğmPL¾É­¸¸Ò“Ü|Š4Ã“b„B	[m!îAp‰[Ğ\n‰\0’\"¦ô1\n(a¾Á5xæ2u.­ÉC £¼uÃ¬=/¥·…0¢³™@dhæ£‘ P\"úyNh‡!%t›û!Cluõ–ØĞˆ%2¢²ŒÚ „šf¿`0ÑŠQnE£l‘â\"Öˆî\$‰ô§\rNyÑ#Bâ˜uvŞd:°ÜºÆæî ¢é0ŠÊQÅtVú\\„a^P)z„@…bÙD†¥µ¯ ˆC˜aA°2§ğ@ÑAI’RRKI‚Ï&CÀti!Ì4†ğÜ û–Lˆ´6 @äø¹74*^¶‚¬m’Ù\$Ğ“ºÃR¨ÊQÃ!hª¤ÈêÉĞr‹Çü§‚â³Ö . ˜D:e¢2¦V)’ºh¼°IvÀ&%=Ùv›;ğ—Œ>a“‹ŠrZ3)eLÅ›3ç‰Mškå'/<sK,ÚBuĞÍòK8RTãœ²èİÎ¹|„f½.3´¢­©á4fJÉYs6|Q‰öœ§ôØ &Jm¡ÂÍAVTà\$²ÖXQCC/VqOg¥;TØ´J©k8æè w²™†ˆ‰˜*MrAÄ¬r\nŠ`a)† \$Ìæg²;š“öh‚XË™ƒ2fŒÙœ3¦xÏšLhm£´^%0a’•¥&­O¹Bn-‘³,êâ¯!‰½!æH©¦*“Sæš_L*’ª€¹q:J%Ñ]&§MˆÔ…7¬×o\"½)o¨‚GP›\\Ó&]‡XâÁu-3ª»/f,Íš³vrÎÙèwgí¦´FŒÒPe”2¶56ª4\r1\n(§9< ™ø-k >³§İâ‹DÿP*Ò% ĞE…VS\\\$½Ì`ß¤”U+³³•@ÙAŠŒÊ‚I	à“õ‰N«Åè©œ©ªØJ¹Ş:<8º)øPT 9]OhzìÏJ6YlyB¦óUŠSSçiH ¶Ng ç*Õ„UcC E­™ÉSÙ³O¥ãşpÓ°P	@áöµˆéG\0 ³‚›¡0NR9bE\r*ˆä¤#\n‹*aìYr¹’âZã462¥RH#~ĞObq î]t½\"Ò=MN¸é·7X×ÎÃÔÅ¬QÏD RU½“ £,T­”§ÑÎuR®öQ#J·©`:ùš~4ö\$ºİò®Â˜RÇ™¸»ÙœmeÙt¦evÆ–Çƒj
[|hr
õD:¹d®\rá«†R Äty… Ş©[€2)Œ™hêºı\$Rö2–pÃ9G––ÓÖ”ÆEœµŠøéto¦CªÚY¢³ÂC³»ØrÂ	;T¶…S«ÊS¸ç…ÇÅ”Üğ\nM==“š†Î‚B§\nŒUxM*!x€O\naQşHHµ£â1~Ö3]M-ÚU!Ÿ˜\$§_µ÷íü¹…xêc4T”–°§bY4ÚÛ—–×,9Ú@ö¹60YÁíÓ´²ƒ`‚C\nˆÙ(F\n@ó#ÃœG£´,|
I˜‰[èÓq ÜÖ›qÉn<È‘\01İ}‘C7º¿;€4Á:Dú6Á¾Í7Y b	¼! &Æ„s#xÌ¤RY·‘yÊ4jô1å/ÂIZ¸ÇjÏ²ÁZVŒ‚2îO©TâxMªş
ªm•¨oQ»*îøÃñã‹·%»âİğ2WŸ¥—N#a”–ûqÂŞÉ2ùSKË11ˆ–-p6F±øÃdı\\y\$ÑóÛ\$_p÷W¯‹‡›£\nç/¯qb{¦è•UGc=åDºÎ¸“%ÅX³b!Õxg–\n[BS4'O>Çâğ9 ÙI ¦º‘
Ê½VËğ(VxˆÑ¦½ü¯#f¯‚êóçÊ8\$fÓfÜó¯`‰®Ú!Hj1(0‰è¾-b||¦7Ë†7ÂRÊæBİkÊp†R7o;ÅpåÏî‚HØ!¢˜áìùh„n¯™hèBèÉåRãÄF\$ƒLÎLHœ«2qGÊ‚…æCp2!nÀkéCªÉ§nJgVƒP`%tbp¢ÿ¯„bì¸»Ê¨ÓÊ{¤ìd–Ìî’d-.(‚^D/†‚Îš&ÂĞfö|¯B±hÔì¥x(¨M.ºÊˆZà\\ã\$V`‚\n€¨ †	 øÚP„8G’Ç-ÊJb¸*|±¬‚É x¯«\nHád†-¦éÇLâô›ÆîpÂšGT7PQ‘VWqZSD%m¦¾&)%²\$ï ¿#ê+gD¢OĞG*—(d%ñl¾Ç»LŒ Ç)1„¤ñXQl6œ‘‘«Ë‘r&ÑÇ1zÑ~J™±‰-me¤ËÑBuæ7§iCr'‡MÇqçñwQ¢ÌqW
¬XQ¼ÍÀêÆœqïÄSQôÌ1ù,Í	mç¤6ˆ8¢s¬ŸãyJ„ÈRä†ê,+®qg\$NFzƒ¾å2O!Ì¼4À˜L>©à[Èxï…\$î\$Õ%¾Fb…'+%#”À¤`2L,cêc.ş‰ª’Î„0ëJ:¯ñ
q:ˆ¨\nĞ|Õ†?*D~\$…k\"ËoªF%LÁqÿ\$5%,˜„BÂ(…<ÏD Qlö„Üqi.oZàqÍ&‚?/Q’)?/ª`ş#¶ÌBÖQïìqÁ.Š_.éİ1Oê…CD^I¦LQ§1q1pLqË÷3#n²(öO¢TĞNí4gïğò‚»§¢2lœê§¬†\"<{RÚ[#¾{ğÈ:¢¡\0,â\$êëØ±hşÏ‚?-SŠÎGÊî¥âîì>¡§˜ƒ£¥\"ófDÈÖ)0dƒss#³\r3qÏ\"‹.w\"ç;B;ˆ;®â>ãFL\0P½b‚Ñp.Û5.ø^
ŠôÌ³;ï_2rò]ï|ÁW2ìs/7ÈŸñšõª÷ì°õ“EKA4³(-4?T 5t
Â;%œ‹È¢Á#2J+?è§D;óHÒôLŠ‰²tF^1©<SzÉdÑ-ÅßCEå „W*íSO¡°êÍ!g+/”cC“ ÓGQ=FîNôiòøğèF”Šur¦Ô	/ÔgCÉÈ×ëGt¡Fô¥Hª|t¯¡ùIJ'CÄèÒ&mĞ8él›Kj`E3ıFƒ¥NM\$X”ë	£#OÁIn‹	ç	k\nÉ• ET'E”i=DğkÏ*E„„ëÏ\rˆú\$®.®òå cPĞ[J€<E†MìÜ´&…iRå‰.„7Pc<âëN’YÚ\"\nŸêxY
·\$kçš¿UZïõn¿¢ìçaqPèCQ+»	•â5 ­VEîm5pNW¨–ùï°ŠnµT!b:Û'\n7u	FS9N{G\r]%…/i\0•İ]Šµ!]“ÕB’\$µëî+³?•ãOuÙ`&
]4İB¶ÛµïÆ¿DÕ·òº£f\n÷UùV6,qæàTÇÈn%Ã'Ò]Çb1OØ»%ÒP§\n†.†näöyëöàŞ‡ÖR?Ğæ!E˜ò•áOTKFˆÍfÔƒg&ùaRÿMóf£!h\$«hv÷sLÌp\\p2J|èèlG!bv¥+¦Ofô„ò–1ò‘j‚jÖ¾Šõckv”oh¤wÆë´Eå`.,~È6:¿ÈmOÍ]gb§^VÛ>š¿®i´)DÇé\0,Ïo0±Ô“h´+kËWnõpKl¯y*6ıq7*ÕÓÆ öôóÔ+m•EDtWb4ùqÈ±T70‡\$&ÁçtQĞ ´6	g©h÷e
iq´»wEvcßP—Nû÷qrW\nõüsW[r,vâ×”:Lg1zvE(ƒƒY·Co—qzÊŠçQ	3t—¶D×½Ssc×…Q÷Q]J>ä÷VÓ’ñvÑLï‚RŠÓ|±‘&I‘k%L\"ËÖZyÒ\rôÌ`j€T6X'5€Ã³Ô§fêmwÇe˜~Ä‰‚8~¯’7çw U’¿[ä,(ë±~q‘€¯¼Ï˜<rô›L7ÉqÑÑKM˜-†U
hÑ‡†ÒöM‘³†8 |¸‡ÓSBxi\\\r€WQl*X—Õ)®zgÍË¢£6ºÎz¢¡\rNUX¨.wµ`ò0˜ª.CS\0@\n ¨ÀZ ì ±O>uxTÙhïZÒ)øâ7m‚îoÉx„ÓQŠ¯Q?EXêç'‹Œ÷pÃ¶Lœ(­ÇÅ-Îk2ÃÕc€‰‰p ¥ü7BS,\$ EDYO;2Ğ²ª¦90Á“t…®uÕ[†ù ):ÒY²SŒòGyŒn\$9u%v`÷RÈÜ/
ƒbş¥)ê CGšwèñ³’ëÏF#\0F“’ÕY?•Çx† ts?š–ˆU±%‹y‹¹¶q¹É/²ßvÏæ\"=šy»4C„\$”ÁèƒùtöS+•XY  \\â˜Q¡Po)\r’º\0îh´ÿ\$ªßeVÿÁbßíßTo‚º-<°UV† £]+lQÂ¢ù!Z@\nÀÂ`ê ÚÿÙòÇ1}(txg¤Ö²±”„¤°uÅ\0…€êuºÒÎ²5ºòÓL¼KÔÊ&¸kC<ªŒZ1¡úwœŒ#YÍ`Zu›îa†õ<6—n×\0Ğ
¹9EãFÈ5ÏLİv=†Ü";break;case"vi":$f="Bp®”&á†³‚š *ó(J.™„ 0Q,ĞÃZŒâ¤)vƒ@Tf™\nípj£pº*ÃV˜ÍÃC`á]¦ÌrY<•#\$b\$L2–€@%9¥ÅIÄô×ŒÆÎ“„œ§4Ë…€¡€Äd3\rFÃqÀät9N1 QŠE3Ú¡±hÄj
 [—J;±ºŠo—ç\nÓ(©Ubµ
´da¬®ÆIÂ¾Ri¦Då\0\0A)÷XŞ8@q:g!Ï C½_#yÃÌ¸™6:‚¶ëÑÚ‹Ì.—òŠšíK;×.ğ›­Àƒ}FÊÍ¼S06ÂÁ½†¡Œ÷\\İÅv¯ëàÄN5°ªn5›çx!”är7œ¥ÄC	ĞÂ1#˜Êõã(æÍã¢&:ƒóæ;¿#\"\\! %:8!KÚHÈ+°Úœ0RĞ7±®úwC(\$F]“áÒ]“+°æ0¡Ò9©jjP ˜eî„Fdš²c@êœãJ*Ì#ìÓŠX„\n\npEÉš44…K\nÁd‹Âñ”È@3Êè&È!\0Úï3ZŒì0ß9Ê¤ŒHÃ(©\"Ÿ;¯mhÃ#‰\njhµ-“aC3&IÁO>%*lœ°ù‡Î¢jVÁJzT·\"ŒP¢iÄbö2Ãd C·&! bkì:V\0P(2Ê\raYSiD_Ğåİ+3#Ü# Úí¾Ğ\$\rACœ PPÂ1Œp0æí£jÈş¿ğ;(èŞ:ÚÁ\"9Âp¨X ŠĞ9£0z\r è8aĞ^ø\\0ÙVcôüŒáxÊ7÷]Ú9xD¤ Ãkó»c3ò6¿£LPã|—
+§T2ìÈ\$Uh Æ€”²äa—HlÀÂ\nxëYee›¶
|êÃº@P®0Cu¸Š£\"ò<ƒ(P9…2DH:7TC'I9¢h˜&L5v©'¤­-‚%ë\rPì0ƒ¨Êd¬P‡!)ÁRÛœ«²<QÖ¢¦zén	~Å/E,——eLòa”MË]é@ğêÖ³BE“Åµ´ M¤ê \$\rÍ2H;WkÊß•¨²Ìó-‚ˆêa•13¼P ‹tiÙP3®ïÊ¥*ol)Š\"`<dÀPØÜ0Ã@Ã3läªH!Šb'œÃúı¹wí\"i–LÂ©ˆßò>¬]f(ægš„ç¼wMQvÖ~MJ\n¯O\n³%\nx]*è’ßƒX}\"…õ›ØÕ¥F ¬Ê²’LnB B:ï™<÷¢J7A±”€@~A
?ğ‘Âpå
C(xj!¹m¢„xã¶h¨4=\"Ğ‚Êç\r!†ğÌ•Pn¥,4áBÖ\rLãZ‘5Gë9‰¥¼Ó»µH–]Qš\rˆµw‘qF™ˆéêŒeb+¦šºˆ¸ºAA¸Ê†\\«“jæ;è(<\"€Ï0k@ìj‡U¶]–JË‰AÉw†8lC\"Í^ y¯Uî¾WÚı_ì;°6
\"ÁsaL02\"†:Š>”¡¹‘¦@È‰pPu\$¬‚¡@tÎÑM'i!!Ñ~#*A{E±™¸òJÁ.SBéNE¥>f¥ä”:¨)ÓÕà¼—¢ö_
é~/æ\0À˜\$Š>Ò„90–Â¡“
†¬1‰‡0|aÏQ\$È¢Ky^Ÿ sÇÿ¦Ä–BE±À‘Bõ3PìcÄµê 5®(X \\°6”´„\r¡•§ÌÔazÒ[
h3 Z*zh ‹“DèÙ^’D7Qá\rË¡QHt]!¤Ü©‘“¸N¦€¾w\\íÅĞ·AA@\$hâŒÑïÈœ\$\"dúÊBE(1ÑìXpA¤íB@ÏGR@ğ…hD:(|èäL>Ìa”0æ„VÈ ;tº½ààºRBŒB‰:™è²Ã:ù¢Õğ1£„2“k‰'é–‚†÷FŠÁ¦`ÆyŒ¯fC[/)@A™¤F.…Xu‰)Fµi
Y}=*Óè˜\\DxHAÙI‹±F‚§Û¤šF„µ?+z'jùj(„Ö.*N!øDM^ÑÙ;L@mH)%Á\$‰ ˜„\$…m@A¹§ÚØ½\rBAA˜ü9Á©s.¥\n§ t#YÏÜUFd¡âˆKxP	áL*EÓ¾òIÌÖ		b9örØ	™·¤èˆ·RIØt˜¶Åø‘v|LÁC©yWöÑ‹´gÓ›./¤ßÒG…oùDØ#JœsìüÌ% =õÁHrU=úUv©\$7„ÿÈÓZIĞ8¦ñFbÉ%±µéeMµ‚,I#éßR¹«½PÂtÎJbUÈõ§Ó’ÅÙQ¢ìF¬vˆbN¡ÂV©\$ÔÙ9k-”´uÔ@ñš
Y˜M'Ü´ı‚e›BíãD94„ğ„X Ë\"…
‘ìÚı^ëßNo¯DC…ŒLáÜóÂ.(«3<>gõ!†-&„©v¶¥iÏ9£¨L\n*eN†0Îuëf¨‚±=z,Í|nŠ)ÓEî“<<‘g›Ä6D¼˜ájMÉÉ\rpÂµ,º‚q›[¤NƒoµE£I4­ñ(ŒdšeÓì±UPz­ h2‡sÎÍXõ¶\$’p\"iùÆfÆ½¼‹¾\0‹Î:cÍTGªzNSè1\"&ä€Ï’µ‚¨®l=S¥O8Ús7ZÉH†¹§?DŒÿÛ¡/“š‚EÃD‚WvÆSV\0 ¤¹êòâ	RÉe2*o¬\\u,¦@T\n!„ˆ»»Ö|D¼KM ×ŠB7ZM~Qø»¼Ö!öìoà€‡ s d“­ºX\"Äâ.}¤£òï-äÏkªbì•ıœiR,ÑI<b²|ö¾ÚËA	.ä¯<¢g4Ti]à2Tbceğï+‘¬´~¹}8¼â“ÒTK6ó‘o–Ò‚ãNA&ïÀ6Ÿµ/rI5ÑÏ	½EğUS=ÎyR>ñFå¿¼–‡àU—bŸ”KÇYk„{€vîÁ‚iºJóĞäŠİÃ–šıqŞÏ'ö­'Ä‚mÊD£*LÀéú#Ï«8¡âèçd.ôçş†Ëû×Â{\$ß‚6š\"‚·¡FÃ-6)mfh@ÇÆò8BR9¢Ğ2§DÀğ&ÿ\n~ÃT‡ ˆ?P)\0~ã'(eÇRh!t\"Ø–PF’†´l'R\$9l.ÔP*T.oRàâp8ïí\0­±\0è\$0ƒlÉN
 NjÄhAKrOG†u Òj°^Xíö\$®î¾ş…\0\rŠ 
HÓ3
Ïü˜g\0{pÂæÚÒgØ|ğÄÓpÖcÄzĞÈ|bHh8ÅlÛäœíO\"÷£ğ]˜]ğÆ|GÈïc\"ï£‰ÃË©ô\"ÑÉ\$æ¹dÛ Êª9^%Ñ âÑ1*0\r Ô P’Lâä9Ã~r€H\rªä Sr´€ê]äX¿Îğ©PŠà0xDãº‘XŒpe
ö‚âhËâª\\\$¢ªÄ„h¾âñ&ÿnïÎ|æ{N<ÎTÊÄ”g†} ±A ñ0â15­òg¯aÍ\n±ÉÁ0¾G§Ô‹Mñæ}\r…\rC’ç†[/ÿ	‡É±byPÛ²ç®À0.	!&Zoòl²\nçÏèäïN7.X8DL\"SAvû,®g.N:&j]àÈÂĞg±õ\nÅIîs ®\$’`Y’„dçlËÒf’“'‘\$ŒXâJá.‡'Éo\"pëíºVğ,Fm#bö9ÃV‡Ì/ìöOôíB¯' ³ÌÃ
Ïº[Ò®-I'²¾LÌÃ)G×-(\$ÌOÓqç«K&ç×.Œˆü2ğ‚‰ùeY-’&´²[\rQjä\",N	0¬üNrìä0î gÒNE(ó&ãƒÀ„\$„ĞXÎw\"nÁ0q\"îŒÌ¥11\"RM°Xlfò[+®‰4“VèñM‰zÜL–è±§Îf`%PCX0Ì&'s‚5eê :­KRøù³\\;z¹åj)–s¤!Æª|š1 \0\\	Ä:°¸-\n*Ç —\r„MŸ\n¦Î\$ÆG¯ƒ0¢HÉĞXÀâõJIE> €ª\n€Œ q
ÏÚµàJÌ®Ñ/…RÈqÊÜìX\$  túÈs\"0§tXÍĞà,r­üP‚(sã²{=Ğm*6(£jn†LkìáT,UÅŒ6dæV«,í\0IÀ¨wç‚ÌM#ˆºåğ+0ª–Ã¦Fa/%Ô‹\0‘Ãè­:§x\rÚ,™HÑ‰ÔœhQãB|\$ƒqK¯êÇuÌÜpò\n8T)A«ùƒJo˜I\"ò!#xªƒÎÚ‰èÂM°Â”de@–Âi8±ráè+MäfĞ. å.øNµÒîh'\n¹@@zTB¬Â²k*D¾àŒÖã\n	’¨2Bß¤”Eb\$«…ÌAˆ,UÌl÷UÑÒIÓ¨!4ª@ŞÃìêÆj2­,Ôæ\rÖfÂØ#:X%‡3¬üoÎ \04b¢";break;case"zh":$f="æA*ês•\\šr¤îõâ|%ÌÂ :\$\nr.®„ö2Šr/d²È»[8Ğ S™8€r©!T
¡\\¸s¦’I4¢b§r¬ñ•Ğ€Js!J¥“É:Ú2r«STâ¢”\n†Ìh5\rÇSRº9QÉ÷*-Y(eÈ—B†­+²¯Î…òFZI9PªYj^F•X9‘ªê¼Pæ¸ÜÜÉÔ¥2s&Ö’Eƒ¡~™Œª®·yc‘~¨¦#}K•r¶s®Ôûkõ|¿iµ-rÙÍ€Á)c(¸ÊC«İ¦#*ÛJ!A–R\nõk¡P€Œ/Wît¢¢ZœU9ÓêWJQ3ÓWãq¨*é'Os%îdbÊ¯C9Ô¿Mnr;NáPÁ)ÅÁZâ´'1Tœ¥‰*†J;’©§)nY5ªª®¨’ç9XS#%’ÊîœÄAns–%ÙÊO-ç30¥*\\OœÄ¹lt’å¢0]Œñ6r‘²Ê^’-‰8´å\0Jœ¤Ù|r—¥\nÃ‘ )V½Š¹ÎY—mŠ—*QBr“.ô–èI´¿Ñ–½lYÊ÷,¤ÌT^’®Cè@œó´¡<ˆ# Ú4Ã(ät—dÂlR>”ö›ñÁ\\È.Dáû¿/ÚrÎ/i&†àÂ\rÊ3 ¡Ğ:ƒ€æáxïY…Ã\rBPÁpŞ9áxÊ7ã€Â9c½v2á:e1ÌA§ANš³çIP…ã|GI\0DœÄYS1,ZZLÇ9H]6\$™ÌO]&J6‘\r&—×“ãz®Éi,X¥Ùur=‘ZS¤‰‡Œ8tId€K¬±LW–eE­…9Tr‘PDOZÄ}»DÑg)\0^[¶ıÂTÉíÉn“w¹ D%¤8s–’’N]œÄ\"†^‘§9zW%¤s]dÌ²¡¦:Da &ÇIâ\\V×EÔ]2Ä„!dD#°ECGmşL)Š\"fnŒIœ¥ã°İ57Õé‚NS£My—'1Q1—™4à\\	“o”ñÌSGAM7²l«/61+->]4s…ËOtOdæI¥¼ë¦å×ËÉÀJ0æD¤²Wö*?hDİ—iÁ¤¬6DıØ:Ijs”Òét_œ…Ñ\r-OÄ:Ñ>ÎòaHX¤dV.LC<C¦\$Õ@ÿ(Øl€C\$’ØHÖ²6WøKÄK¯Dÿ±Î1¤!>:€¢@ lî¨¡C“çâÜt:È‘(ˆ–	
±X¨•\"¦U\n©V*å`¬•¢¶€êå]«Õ~
Ã o\rÁ„:˜T²AñŠ3°_Á:X±'ƒ¤P‹QÒ'E ñl­²0/ÑÓ5]ñ£8-ß‘œià«‘”T›OÚQ4N	ò•*§U*­Vªõb¬ÃºµVğ!]+Å|°(xŠü9Âå€²ƒšÌh) èˆ¶ñ\$p\"ÌJ“d+„æàr
‘\n9D`–CbüBÃÄT\$Áİ\$1\$W‰Óâ|Ï©¢s	1ØÊ\n÷*¯İ	ø€‡8›\$F)´¬–\\SIÁ\nrê#i‘RÑñà—*¸qõS`€(€ ïãêLòdTCb¢©0DÔ›™á<9„p¥HÀsˆ—e 8«ã”GŠ3@Kãt0rÚ,–\\Ğ@¸<%œs\nxùÌüìäq™	‰Ö+ÅãŠHtŠ!1-‹ZM4Ã\"áS\nAqI9f+?ÑEÎÁ\"·‰©v¢5ú’ÁĞ-–ˆ¿ä¸˜)¶M‰Á:Cƒ˜W
UÈÉJQş¬\n d†Ü‚ï†8Ş©Iğ.ÄtWÊ“Rƒü9…ˆ‚‰æY£„±(áä>ˆ\\(ğ¦¢&,|R\nzƒÒ°(\"EÆ»X#ê Š¨ÎètˆVŠÑÛ}èi’sÈ \"M2ÁP(òB(	ûm0¦ã^IÄr`d	2Ÿw2`ĞØ¤Ç•¤OÔÆ+ÅÈ\n	á8P T¶ªÖ@Š-²-\"´KÓÁjš‹HK’à‘*/Ó˜¦e¢&Z“†qeù¿0&Œ
EEİÕw`²Šqvtq®\r¡t€sÄÌ¤­G¸«­åÀ¸¯tsÎ&õº„|9Å@‹bn†v	†JYDQ¾	½İNQÕĞ„×‚2 »3B„ÄAÎÉ:½”Î‰°Hs9¢ÜÎÑAiíMü­¥“aB9Ås‹W¸åœÛĞtaüß)Õ¥§\$W²ø:B{¤ã¤¿Yà¢n©å¿¯¼ƒÉhº”M©1@!ÛÕ©ÂİW¢chÄ£HZL G‰Èw¯› ùs/&RÒ&ÅÑC¤I‹éÀa'‹œÃÎeÂÛ±!~/ÓPz'”:UÍ˜p¸·º¢6O§»bC	˜ñ1Dcth¯ÈOXò‰–x Òòü–éE/eùƒ™ú*\0JÃué@XYM0f=n# Q6‘/…\r!%šÚ	Òå§¢Ô¬:ƒ\\˜İo§ë_º&!Ô\nH	Í)¶8‘kAVóáİ1¢tR±ÑUf“_A\\2†-Ágz%PÏ	
£º›”<ÈÔ[QRÅk>b¬®•×¥OAiËÜG¢!Ì.\$­é/%ì¾¶QÒ óæ9ÇBæË^6	š3œW&ŞQetÈKŒq,^høöE^œ£’¡âv?´¨H&¼‡)Ds'QB¸R2¦YyÎƒ² ç5{ˆÅØÅ‘gD’tDt\\ÓÍKK+-(_•
œ/)ieg¹\r\"®’ÄáµÆ¹èSD\"ÓÍH¨°ê|»ß'ÇŸ“oM]»féËz¯wb\\˜ècG
İy{ŸïÂ?”‹÷àÏè°h
;g„æ#ö´\0ñgwSjsµµf®¾å{Iá\\ Ë>˜z..RòS¢JZäÙúù å’’XÁaÅ-,e˜–¤éÆõÖ.¨\n¡õÙ=‰‘ÿe%E
@RÓäğõ¾°oHÈ”ë‡uMŞ?gòPÉ¤-6ŠÒdÌœ!İU-5æÈ<N×ÕqÊNó‡Cô‹ïHçÿkÃæ·µô
ÓÊo _à”~öÿ‚R/«\0šæn¢`-ÂÊeÜ¤¾çÍF¼~N”ãNá*ÒÈ´şÎz¬î¿/ÿEè*0BÏ/å¬ÃÏiˆªğÅöJÆdÙĞ¦Lñ\0§?FfÌ'Çã<úA6Ï|ëîø½/boüÍ&™	ñK	g‰ïC\nTğ&ïÍ®&½0†p“
°¤ÈÎ-íoë
aHËjLËğH^¬Ç\rdË	0ÔË°Ù\0P\rÌÈÜPy\rğèÌÍèGu\0ğŠ£äHDĞÚĞ0¿¡n*àX`Ğ Èñ°Dj	ÀÀã(-!tëÀ×ƒB¾ëòÚÃbÀíòûb H\"Ò§¸ÁB}0D¥‰ôäIØÕa`zÕ­^~Á\$\0à†y\0Ø7ªVIh>BçÄ|—îªBmœøé,•ãº\n ¨ÀZ lÄÜ*íxÔ+Ì¡‚›\"6#«Üeã¦Û¥úüJ¸ƒL.Aî7²€‚6âúÍŒÜœ/ĞéÄed6¯AĞ¦d3GÊq¢Ó RÅªÂ‡ä¤¦‚ç\$æ]ª”ín¢Ìæ/´‹R‹°åöCI¡m\$PÎäîdïx*lq%j\\¥OXş‚4iîgLƒ!nr\$S®Ä¹.´ÈN±'îÈÏÁ]#dpDM–íD\\Î†À¬ Æ ê\r®Ì\$2\\Îˆ]ì–ÁG\"ƒÆ^BbMr3#c¤²@»ÉÆ@‚‘+ë-2Ö»2Êkã¤Ãòr¹
(òR€ø#è|‚ärìáL";break;case"zh-tw":$f="ä^¨ê%Ó•\\šr¥ÑÎõâ|%ÌÂ :\$\ns¡.ešUÈ¸E9PK72©(æP¢h)Ê…@º
:i	%“Êcè§Je åR)Ü«{º	Nd TâPˆ£\\ªÔÃ•8¨
CˆÈf4†ãÌaS@/%Èäû•N‹¦¬’Ndâ%Ğ³C¹’É—B…Q+–¹Öê‡Bñ_MK,ª\$õÆçu»ŞowÔfš‚T9®WK´ÍÊW¹•ˆ§2mizX:P	—*‘½_/Ùg*eSLK¶Ûˆú™Î¹^9×HÌ\rºÛÕ7ºŒZz>‹ êÔ0)È¿Nï\nÙr!U=R\n¤ôÉÖ^¯ÜéJÅÑTçO©](ÅI–Ø^Ü«¥]EÌJ4\$yhr•ä2^?[ ô½eCr‘º^[#åk¢Ö‘g1'¤)ÌT'9jB)#›,§%')näªª»hV’èùdô=OaĞ@§IBO¤òàs¥Â¦K©¤¹Jºç12A\$±&ë8mQd€¨ÁlY»r—%ò\0J£Ô€D&©¹Hiü/\r‹öUœå™w.±x].Š‘2¬¥Áft(t	KSòÖ?ˆÁ2]¥å*šX !rBœô]# Ú4Ã(ät”‚e
kÿ\0–‰‘Tr’¤{4Ç‘42ĞózF ƒ@4C(Ì„C@è:˜t…ã½”4Õ9OÃxä3…ã(Üæ9öÈ„JP|t)!B1Õ/…Bã|GI\\CD=z”%yÎRQ s-î±~W?åÊJQ]\$²ú¬:øA(\\Ğø{Å1•(M•ÏZS¤‰‡Œ\0Ä<ƒ(P9…*iXBJ—äy<EAvtåÄCÕdY+{GŒeëPÔmjÕ{_™—åéÊ^÷©6C¤¦’â†¸…Ùvs„|¨s—¸éÌGOŞ¢ªD1TÌ\\yjzŸ àP¨2 @t’¥»öS%Ùò\0N%Ä+	6²köÎAœÄ~¢)Š\"`A—ºëÂs\$œš¸6±f\r‰bœeUôxN*¿`X'@]à0WVTu¸-jşv±ûG»¥Ï¥.r÷Ä9t—v ?eÓbİ¿Qå<^GXZàx.‘|£1Ä¡ÌDÕa?ì)^×¹ìÃPä=DD#iâÃ`è92åAÒM”L4rD3-JÑ.Ï˜„(Å 	sDFÒ\nöÅ\0M+qĞ‚ŠK%Bt‰ª/„`éâ5r\ndN\"	øŠ{êYá\"q'Ç@¬¤Š…2¦ÔèrÎÈ@9\n+Š2xDÖ‰r®Õê¿X+\rb¬u’²Öl0Z
Ij-`^xn!Ğ4ÅÀ‡0`b°_Á:\\Âs¥u@ H`‰^
Éz0Ê¶â¨nrè®\$ˆfºàÙ¨Š4ËõP:*QÔN	óÕâ¾X
	b,e²ƒºÌYĞÅh­5ªµÛã)\rÁÎ8®ÅĞÊ¢ÄJÆ°|ù³\n#£ W	2ä‚’¯\0Khİ\"‹—èäPEñD*Şò\rDâ´R!¡áÊ‡*ÆfXE
hçiHBl9“:Oò\0X09Dø·2í1J\$:‡Ñ\n#1Æq®‹´¾©Üˆ´L €(€ ö§3ç\"/¨ÓU)/&\$ÌÕ\n6Î)P€°â%…9À(9˜0©BŠTÊ¬”*‚à@!ÎYÇ0 Šİvóê Åèæ¼¡ˆáĞ!Ğ­GSZÁÊ&è,L0!2`@Â˜RÀ€:ğÖµŒ ƒJ˜Ä©Qxj‰‰~¢XWlD
&Èšd†9…pµHâ\rY®'(éAhÕ%Ùœ()´Âs	á89ŒÁË3eÖo	è^³Ã•Nª€s
ÇH—‰4Di‰ÇHFX(ğ¦µŠ¬ ˜æ&ÊhtÏm‡#ŠÜ\"«ƒáV‚ VbZhˆ¨¤Ítù5‚0T\nì‘
2€P‘ó”	„àŞ×ÑÈÓÈåOt¶>S¢€%‡ ¾‚‚4Z”Ñ@(JU	á8P T *í‚\0ˆB`E¼L¹˜
Ò¤\$hç&d¸G¹‚Õoóp]8FÆ˜¹Í9çDéRvEEÙÖ/O\0Éá#4ñZ:dŞ›“§H@ïá,ôÚSÌ¯ãá”Şx„È•âA\nÚ€—y\"¸Ò\$0\"Ä\0æ¥ÂÕ‘]aO„Õø='´ø|Ó¡ô¢Wÿ\0aÎBÉÕ,ÔUcEnµØ	UÙ’êÔQªdÉA4„*wpîLBVˆGfî_Ø‰2Ñ†•a,SESÌ8¿<Ü2Å‡8´M=01 t¼Ğ·Hs
¡ Fâ.¥‰àsîÓº¬à\\Të”Ÿ1!¯útL‹Í>£ÔŠ“ ¬ñ
Ä„ÿ©¦jc6¤ tØ¶ÏÆÅâ;
Q¸…ÁJ™\0OÂC	˜ø®K'N¶`¥ÙÕ8õ‰óæ}EQá¬”‚IfEŒ%Ó„ÊmœxKVûopÃ>„…è±\"|_¢zö¬D‹™b’“N	Å¸M¤t\rPDg=É¸`‹—5Û˜Tìò[¿Œ¢õ'È@[n\\lŠ\n ·¹àœñ’BHäec¢_Q'&ÎÇ:ä	ÄôV#,ƒã§]§øÆNâ‡Œ4ÁuµÒP‚äÕÜVŠ\"\\¹ÑÒş`\\û#H L>¦‹„s„HÁƒ0´±Å‘V'2cbºArI€w.Ef”Ó˜–54ª­Îíf\$æöö9\\{²äXpğ;<0lX|‚ĞÌO¿¸ÛdŠñ¾ğ¦ÊÙ_
ät\"Í\rQZÆš% çuªŞ¦Ñë tóÁ1Ëç¯Ç%Å§µ%6¡ô„~ÇE#¦fî¯h‹×íÁÆ’]ã¯›ÊÃ}£wœ©İ7Íøy\\Ûê—Ş|¥ÄÇóæwÌ#›Şƒ®ú¿9ç;O²[şgÑûDE›A#©„{¨¾X¼]şËÉx8Œİl”ÊvaË¼w˜¿õ¿[~\nK ºAÒºÂõæ&Ó\0Nòñ'ŒÅïüÓ0¨úÑÆ!ÊCˆÒ!P5„\"©vT%án3‰¤šŠhPïlô%n™nàÒLb·:—ª6££\\Ñ\r7¢>š\"lV°_â¨™ci°º°W,º•ƒH4Í,ÃD÷/Zú&a¦ú¯ˆ˜¬ó\nCg-C\n,÷\nk
p¯
¬úølÒ\rpĞtÌk°Ñ
M}\rmr°0à×PAPê^¡,Åæ\nu¡:!ÁÌæ¢™b‡¶'é¾7b¨ÿpªıfÕ\r&*a!ÏÚûm}Q(ğätÊi¦j/¢T~*‘2×°¦œÖpî]eB7J¦äx\$pNfÈ<`B1-ïÚÆ1!\0±w\ntú1nÌCqÍ1fü°İq“f1LAQ¡¯®Ôm<Oqzb‘¬Ô­?'emMƒm9í@×ÑË„ö)¤–I¤Ÿ1¨‰ FÄq1æ0‘ëpğA‘è£,	´\r\0Êhı†¢lì~4gˆNÒİ„0€ä\ràÆàæŞ+2—äD®Š<AH_AF¢0œ¡bá\$0#k#!Ã\\îÎÈä\$ÿ\rèDá\"\0à†}àØ9rr:#Ù‚~5ÆŒJC(ú\$N\$Ğ8—‚¡P\n ¨ÀZ Š@ïªwÊ*á)Æ§L&#†~^åòì,ºú%ê±AĞê²8ÃãŠëmVz\r3)JtÊÅíˆ_rì¢¬ÎŒâš­	¼ƒ£/Ç8Ç\"êuªìõ¦æR‚ÎïÎòz,1ÂZvnBÎG#áÑ\$/Zïa`_Oºÿª…V†û¯ğ0-
ŒøO‚®yAÌk&¶%ÍòMv/ox¿¢0ö†~p' 6á2£î~Â.âÁp)¡*LX‹À¬ Æ ê\r¯|.\0 
}4Ï8®­am¢ti¼.«1‡‡2\$ÁêBi^y“ÈÁ¡Ñ3S8]!&t~H†ÎOÖ%Â®Á™Bè1Ü÷áL";break;}$wi=array();foreach(explode("\n",lzw_decompress($f))as$X)$wi[]=(strpos($X,"\t")?explode("\t",$X):$X);return$wi;}if(!$wi){$wi=get_translations($ca);$_SESSION["translations"]=$wi;}if(extension_loaded('pdo')){class
Min_PDO{var$_result,$server_info,$affected_rows,$errno,$error,$pdo;function
__construct(){global$b;$hg=array_search("SQL",$b->operators);if($hg!==false)unset($b->operators[$hg]);}function
dsn($pc,$V,$F,$_f=array()){$_f[PDO::ATTR_ERRMODE]=PDO::ERRMODE_SILENT;$_f[PDO::ATTR_STATEMENT_CLASS]=array('Min_PDOStatement');try{$this->pdo=new
PDO($pc,$V,$F,$_f);}catch(Exception$Hc){auth_error(h($Hc->getMessage()));}$this->server_info=@$this->pdo->getAttribute(PDO::ATTR_SERVER_VERSION);}function
quote($P){return$this->pdo->quote($P);}function
query($G,$Ei=false){$H=$this->pdo->query($G);$this->error="";if(!$H){list(,$this->errno,$this->error)=$this->pdo->errorInfo();if(!$this->error)$this->error=lang(21);return
false;}$this->store_result($H);return$H;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($H=null){if(!$H){$H=$this->_result;if(!$H)return
false;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch();return$J[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(PDO::FETCH_ASSOC);}function
fetch_row(){return$this->fetch(PDO::FETCH_NUM);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",(array)$J->flags)?63:0);return$J;}}}$kc=array();function
add_driver($u,$D){global$kc;$kc[$u]=$D;}class
Min_SQL{var$_conn;function
__construct($g){$this->_conn=$g;}function
select($Q,$L,$Z,$sd,$Bf=array(),$_=1,$E=0,$pg=false){global$b,$y;$ce=(count($sd)<count($L));$G=$b->selectQueryBuild($L,$Z,$sd,$Bf,$_,$E);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$_!=""&&$sd&&$ce&&$y=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$L)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($sd&&$ce?"\nGROUP BY ".implode(", ",$sd):"").($Bf?"\nORDER BY ".implode(", ",$Bf):""),($_!=""?+$_:null),($E?$_*$E:0),"\n");$Fh=microtime(true);$I=$this->_conn->query($G);if($pg)echo$b->selectQuery($G,$Fh,!$I);return$I;}function
delete($Q,$zg,$_=0){$G="FROM ".table($Q);return
queries("DELETE".($_?limit1($Q,$G,$zg):" $G$zg"));}function
update($Q,$N,$zg,$_=0,$kh="\n"){$Wi=array();foreach($N
as$z=>$X)$Wi[]="$z = $X";$G=table($Q)." SET$kh".implode(",$kh",$Wi);return
queries("UPDATE".($_?limit1($Q,$G,$zg,$kh):" $G$zg"));}function
insert($Q,$N){return
queries("INSERT INTO ".table($Q).($N?" (".implode(", ",array_keys($N)).")\nVALUES (".implode(", ",$N).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$K,$ng){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($G,$hi){}function
convertSearch($v,$X,$o){return$v;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($ah){return
q($ah);}function
warnings(){return'';}function
tableHelp($D){}}$kc["sqlite"]="SQLite 3";$kc["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($q){$this->_link=new
SQLite3($q);$Zi=$this->_link->version();$this->server_info=$Zi["versionString"];}function
query($G){$H=@$this->_link->query($G);$this->error="";if(!$H){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($H->numColumns())return
new
Min_Result($H);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetchArray();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$d=$this->_offset++;$T=$this->_result->columnType($d);return(object)array("name"=>$this->_result->columnName($d),"type"=>$T,"charsetnr"=>($T==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($q){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($q);}function
query($G,$Ei=false){$Se=($Ei?"unbufferedQuery":"query");$H=@$this->_link->$Se($G,SQLITE_BOTH,$n);$this->error="";if(!$H){$this->error=$n;return
false;}elseif($H===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($H);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetch();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;if(method_exists($H,'numRows'))$this->num_rows=$H->numRows();}function
fetch_assoc(){$J=$this->_result->fetch(SQLITE_ASSOC);if(!$J)return
false;$I=array();foreach($J
as$z=>$X)$I[idf_unescape($z)]=$X;return$I;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$D=$this->_result->fieldName($this->_offset++);$cg='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($cg\\.)?$cg\$~",$D,$C)){$Q=($C[3]!=""?$C[3]:idf_unescape($C[2]));$D=($C[5]!=""?$C[5]:idf_unescape($C[4]));}return(object)array("name"=>$D,"orgname"=>$D,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($q){$this->dsn(DRIVER.":$q","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($q){if(is_readable($q)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$q)?$q:dirname($_SERVER["SCRIPT_FILENAME"])."/$q")." AS a")){parent::__construct($q);$this->query("PRAGMA foreign_keys = 1");$this->query("PRAGMA busy_timeout = 500");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$ng){$Wi=array();foreach($K
as$N)$Wi[]="(".implode(", ",$N).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($K))).") VALUES\n".implode(",\n",$Wi));}function
tableHelp($D){if($D=="sqlite_sequence")return"fileformat2.html#seqtab";if($D=="sqlite_master")return"fileformat2.html#$D";}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return
lang(22);return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$_,$kf=0,$kh=" "){return" $G$Z".($_!==null?$kh."LIMIT $_".($kf?" OFFSET $kf":""):"");}function
limit1($Q,$G,$Z,$kh="\n"){global$g;return(preg_match('~^INTO~',$G)||$g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$kh):" $G WHERE rowid = (SELECT rowid FROM ".table($Q).$Z.$kh."LIMIT 1)");}function
db_collation($l,$nb){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($D=""){global$g;$I=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$J){$J["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($J["Name"]));$I[$J["Name"]]=$J;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$J)$I[$J["name"]]["Auto_increment"]=$J["seq"];return($D!=""?$I[$D]:$I);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$g;$I=array();$ng="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$J){$D=$J["name"];$T=strtolower($J["type"]);$Yb=$J["dflt_value"];$I[$D]=array("field"=>$D,"type"=>(preg_match('~int~i',$T)?"integer":(preg_match('~char|clob|text~i',$T)?"text":(preg_match('~blob~i',$T)?"blob":(preg_match('~real|floa|doub~i',$T)?"real":"numeric")))),"full_type"=>$T,"default"=>(preg_match("~'(.*)'~",$Yb,$C)?str_replace("''","'",$C[1]):($Yb=="NULL"?null:$Yb)),"null"=>!$J["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$J["pk"],);if($J["pk"]){if($ng!="")$I[$ng]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$T))$I[$D]["auto_increment"]=true;$ng=$D;}}$Ah=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Ah,$Fe,PREG_SET_ORDER);foreach($Fe
as$C){$D=str_replace('""','"',preg_replace('~^"|"$~','',$C[1]));if($I[$D])$I[$D]["collation"]=trim($C[3],"'");}return$I;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$I=array();$Ah=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Ah,$C)){$I[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$C[1],$Fe,PREG_SET_ORDER);foreach($Fe
as$C){$I[""]["columns"][]=idf_unescape($C[2]).$C[4];$I[""]["descs"][]=(preg_match('~DESC~i',$C[5])?'1':null);}}if(!$I){foreach(fields($Q)as$D=>$o){if($o["primary"])$I[""]=array("type"=>"PRIMARY","columns"=>array($D),"lengths"=>array(),"descs"=>array(null));}}$Dh=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$h);foreach(get_rows("PRAGMA index_list(".table($Q).")",$h)as$J){$D=$J["name"];$w=array("type"=>($J["unique"]?"UNIQUE":"INDEX"));$w["lengths"]=array();$w["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($D).")",$h)as$Zg){$w["columns"][]=$Zg["name"];$w["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($D).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$Dh[$D],$Jg)){preg_match_all('/("[^"]*+")+( DESC)?/',$Jg[2],$Fe);foreach($Fe[2]as$z=>$X){if($X)$w["descs"][$z]='1';}}if(!$I[""]||$w["type"]!="UNIQUE"||$w["columns"]!=$I[""]["columns"]||$w["descs"]!=$I[""]["descs"]||!preg_match("~^sqlite_~",$D))$I[$D]=$w;}return$I;}function
foreign_keys($Q){$I=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$J){$r=&$I[$J["id"]];if(!$r)$r=$J;$r["source"][]=$J["from"];$r["target"][]=$J["to"];}return$I;}function
view($D){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($D))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($D){global$g;$Qc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Qc)\$~",$D)){$g->error=lang(23,str_replace("|",", ",$Qc));return
false;}return
true;}function
create_database($l,$mb){global$g;if(file_exists($l)){$g->error=lang(24);return
false;}if(!check_sqlite_name($l))return
false;try{$A=new
Min_SQLite($l);}catch(Exception$Hc){$g->error=$Hc->getMessage();return
false;}$A->query('PRAGMA encoding = "UTF-8"');$A->query('CREATE TABLE adminer (i)');$A->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$g;$g->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$g->error=lang(24);return
false;}}return
true;}function
rename_database($D,$mb){global$g;if(!check_sqlite_name($D))return
false;$g->__construct(":memory:");$g->error=lang(24);return@rename(DB,$D);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$D,$p,$hd,$tb,$_c,$mb,$La,$Wf){global$g;$Pi=($Q==""||$hd);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Pi=true;break;}}$c=array();$Kf=array();foreach($p
as$o){if($o[1]){$c[]=($Pi?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$Kf[$o[0]]=$o[1][0];}}if(!$Pi){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$D&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($D)))return
false;}elseif(!recreate_table($Q,$D,$c,$Kf,$hd,$La))return
false;if($La){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $La WHERE name = ".q($D));if(!$g->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($D).", $La)");queries("COMMIT");}return
true;}function
recreate_table($Q,$D,$p,$Kf,$hd,$La,$x=array()){global$g;if($Q!=""){if(!$p){foreach(fields($Q)as$z=>$o){if($x)$o["auto_increment"]=0;$p[]=process_field($o,$o);$Kf[$z]=idf_escape($z);}}$og=false;foreach($p
as$o){if($o[6])$og=true;}$nc=array();foreach($x
as$z=>$X){if($X[2]=="DROP"){$nc[$X[1]]=true;unset($x[$z]);}}foreach(indexes($Q)as$ie=>$w){$e=array();foreach($w["columns"]as$z=>$d){if(!$Kf[$d])continue
2;$e[]=$Kf[$d].($w["descs"][$z]?" DESC":"");}if(!$nc[$ie]){if($w["type"]!="PRIMARY"||!$og)$x[]=array($w["type"],$ie,$e);}}foreach($x
as$z=>$X){if($X[0]=="PRIMARY"){unset($x[$z]);$hd[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$ie=>$r){foreach($r["source"]as$z=>$d){if(!$Kf[$d])continue
2;$r["source"][$z]=idf_unescape($Kf[$d]);}if(!isset($hd[" $ie"]))$hd[]=" ".format_foreign_key($r);}queries("BEGIN");}foreach($p
as$z=>$o)$p[$z]="  ".implode($o);$p=array_merge($p,array_filter($hd));$bi=($Q==$D?"adminer_$D":$D);if(!queries("CREATE TABLE ".table($bi)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($Kf&&!queries("INSERT INTO ".table($bi)." (".implode(", ",$Kf).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Kf)))." FROM ".table($Q)))return
false;$Bi=array();foreach(triggers($Q)as$_i=>$ii){$zi=trigger($_i);$Bi[]="CREATE TRIGGER ".idf_escape($_i)." ".implode(" ",$ii)." ON ".table($D)."\n$zi[Statement]";}$La=$La?0:$g->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($Q));if(!queries("DROP TABLE ".table($Q))||($Q==$D&&!queries("ALTER TABLE ".table($bi)." RENAME TO ".table($D)))||!alter_indexes($D,$x))return
false;if($La)queries("UPDATE sqlite_sequence SET seq = $La WHERE name = ".q($D));foreach($Bi
as$zi){if(!queries($zi))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$T,$D,$e){return"CREATE $T ".($T!="INDEX"?"INDEX ":"").idf_escape($D!=""?$D:uniqid($Q."_"))." ON ".table($Q)." $e";}function
alter_indexes($Q,$c){foreach($c
as$ng){if($ng[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($bj){return
apply_queries("DROP VIEW",$bj);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$bj,$Zh){return
false;}function
trigger($D){global$g;if($D=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$v='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$Ai=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$v\\s*(".implode("|",$Ai["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($v))?\\s+ON\\s*$v\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($D)),$C);$jf=$C[3];return
array("Timing"=>strtoupper($C[1]),"Event"=>strtoupper($C[2]).($jf?" OF":""),"Of"=>idf_unescape($jf),"Trigger"=>$D,"Statement"=>$C[4],);}function
triggers($Q){$I=array();$Ai=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$J){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$Ai["Timing"]).')\s*(.*?)\s+ON\b~i',$J["sql"],$C);$I[$J["name"]]=array($C[1],$C[2]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$G){return$g->query("EXPLAIN QUERY PLAN $G");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($dh){return
true;}function
create_sql($Q,$La,$Kh){global$g;$I=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$D=>$w){if($D=='')continue;$I.=";\n\n".index_sql($Q,$w['type'],$D,"(".implode(", ",array_map('idf_escape',$w['columns'])).")");}return$I;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($j){}function
trigger_sql($Q){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$g;$I=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$z)$I[$z]=$g->result("PRAGMA $z");return$I;}function
show_status(){$I=array();foreach(get_vals("PRAGMA compile_options")as$zf){list($z,$X)=explode("=",$zf,2);$I[$z]=$X;}return$I;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Vc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Vc);}function
driver_config(){$U=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);return
array('possible_drivers'=>array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite"),'jush'=>"sqlite",'types'=>$U,'structured_types'=>array_keys($U),'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL"),'functions'=>array("hex","length","lower","round","unixepoch","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",)),);}}$kc["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($Cc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$F){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Zi=pg_version($this->_link);$this->server_info=$Zi["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
value($X,$o){return($o["type"]=="bytea"&&$X!==null?pg_unescape_bytea($X):$X);}function
quoteBinary($P){return"'".pg_escape_bytea($this->_link,$P)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$I=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($I)$this->_link=$I;return$I;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$Ei=false){$H=@pg_query($this->_link,$G);$this->error="";if(!$H){$this->error=pg_last_error($this->_link);$I=false;}elseif(!pg_num_fields($H)){$this->affected_rows=pg_affected_rows($H);$I=true;}else$I=new
Min_Result($H);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
pg_fetch_result($H->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=pg_num_rows($H);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$d=$this->_offset++;$I=new
stdClass;if(function_exists('pg_field_table'))$I->orgtable=pg_field_table($this->_result,$d);$I->name=pg_field_name($this->_result,$d);$I->orgname=$I->name;$I->type=pg_field_type($this->_result,$d);$I->charsetnr=($I->type=="bytea"?63:0);return$I;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($M,$V,$F){global$b;$l=$b->database();$this->dsn("pgsql:host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' client_encoding=utf8 dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($ah){return
q($ah);}function
query($G,$Ei=false){$I=parent::query($G,$Ei);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$I;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$ng){global$g;foreach($K
as$N){$Li=array();$Z=array();foreach($N
as$z=>$X){$Li[]="$z = $X";if(isset($ng[idf_unescape($z)]))$Z[]="$z = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Li)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}function
slowQuery($G,$hi){$this->_conn->query("SET statement_timeout = ".(1000*$hi));$this->_conn->timeout=1000*$hi;return$G;}function
convertSearch($v,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$v:"CAST($v AS text)");}function
quoteBinary($ah){return$this->_conn->quoteBinary($ah);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($D){$ze=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$A=$ze[$_GET["ns"]];if($A)return"$A-".str_replace("_","-",$D).".html";}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b,$U,$Jh;$g=new
Min_DB;$Mb=$b->credentials();if($g->connect($Mb[0],$Mb[1],$Mb[2])){if(min_version(9,0,$g)){$g->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$g)){$Jh[lang(25)][]="json";$U["json"]=4294967295;if(min_version(9.4,0,$g)){$Jh[lang(25)][]="jsonb";$U["jsonb"]=4294967295;}}}return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$_,$kf=0,$kh=" "){return" $G$Z".($_!==null?$kh."LIMIT $_".($kf?" OFFSET $kf":""):"");}function
limit1($Q,$G,$Z,$kh="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$kh):" $G".(is_view(table_status1($Q))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($Q).$Z.$kh."LIMIT 1)"));}function
db_collation($l,$nb){global$g;return$g->result("SELECT datcollate FROM pg_database WHERE datname = ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($k){return
array();}function
table_status($D=""){$I=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f', 'p')
".($D!=""?"AND relname = ".q($D):"ORDER BY relname"))as$J)$I[$J["Name"]]=$J;return($D!=""?$I[$D]:$I);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$I=array();$Ca=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment".(min_version(10)?", a.attidentity":"")."
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$J){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$J["full_type"],$C);list(,$T,$we,$J["length"],$xa,$Fa)=$C;$J["length"].=$Fa;$cb=$T.$xa;if(isset($Ca[$cb])){$J["type"]=$Ca[$cb];$J["full_type"]=$J["type"].$we.$Fa;}else{$J["type"]=$T;$J["full_type"]=$J["type"].$we.$xa.$Fa;}if(in_array($J['attidentity'],array('a','d')))$J['default']='GENERATED '.($J['attidentity']=='d'?'BY DEFAULT':'ALWAYS').' AS IDENTITY';$J["null"]=!$J["attnotnull"];$J["auto_increment"]=$J['attidentity']||preg_match('~^nextval\(~i',$J["default"]);$J["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^,)]+(.*)~',$J["default"],$C))$J["default"]=($C[1]=="NULL"?null:idf_unescape($C[1]).$C[2]);$I[$J["field"]]=$J;}return$I;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$I=array();$Sh=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$e=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Sh AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption, (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Sh AND ci.oid = i.indexrelid",$h)as$J){$Kg=$J["relname"];$I[$Kg]["type"]=($J["indispartial"]?"INDEX":($J["indisprimary"]?"PRIMARY":($J["indisunique"]?"UNIQUE":"INDEX")));$I[$Kg]["columns"]=array();foreach(explode(" ",$J["indkey"])as$Rd)$I[$Kg]["columns"][]=$e[$Rd];$I[$Kg]["descs"]=array();foreach(explode(" ",$J["indoption"])as$Sd)$I[$Kg]["descs"][]=($Sd&1?'1':null);$I[$Kg]["lengths"]=array();}return$I;}function
foreign_keys($Q){global$sf;$I=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$J){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$J['definition'],$C)){$J['source']=array_map('idf_unescape',array_map('trim',explode(',',$C[1])));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$C[2],$Ee)){$J['ns']=idf_unescape($Ee[2]);$J['table']=idf_unescape($Ee[4]);}$J['target']=array_map('idf_unescape',array_map('trim',explode(',',$C[3])));$J['on_delete']=(preg_match("~ON DELETE ($sf)~",$C[4],$Ee)?$Ee[1]:'NO ACTION');$J['on_update']=(preg_match("~ON UPDATE ($sf)~",$C[4],$Ee)?$Ee[1]:'NO ACTION');$I[$J['conname']]=$J;}}return$I;}function
constraints($Q){global$sf;$I=array();foreach(get_rows("SELECT conname, consrc
FROM pg_catalog.pg_constraint
INNER JOIN pg_catalog.pg_namespace ON pg_constraint.connamespace = pg_namespace.oid
INNER JOIN pg_catalog.pg_class ON pg_constraint.conrelid = pg_class.oid AND pg_constraint.connamespace = pg_class.relnamespace
WHERE pg_constraint.contype = 'c'
AND conrelid != 0 -- handle only CONSTRAINTs here, not TYPES
AND nspname = current_schema()
AND relname = ".q($Q)."
ORDER BY connamespace, conname")as$J)$I[$J['conname']]=$J['consrc'];return$I;}function
view($D){global$g;return
array("select"=>trim($g->result("SELECT pg_get_viewdef(".$g->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($D)).")")));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$g;$I=h($g->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$I,$C))$I=$C[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($C[3]).'})(.*)~','\1<b>\2</b>',$C[2]).$C[4];return
nl_br($I);}function
create_database($l,$mb){return
queries("CREATE DATABASE ".idf_escape($l).($mb?" ENCODING ".idf_escape($mb):""));}function
drop_databases($k){global$g;$g->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($D,$mb){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($D));}function
auto_increment(){return"";}function
alter_table($Q,$D,$p,$hd,$tb,$_c,$mb,$La,$Wf){$c=array();$yg=array();if($Q!=""&&$Q!=$D)$yg[]="ALTER TABLE ".table($Q)." RENAME TO ".table($D);foreach($p
as$o){$d=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $d";else{$Vi=$X[5];unset($X[5]);if($o[0]==""){if(isset($X[6]))$X[1]=($X[1]==" bigint"?" big":($X[1]==" smallint"?" small":" "))."serial";$c[]=($Q!=""?"ADD ":"  ").implode($X);if(isset($X[6]))$c[]=($Q!=""?"ADD":" ")." PRIMARY KEY ($X[0])";}else{if($d!=$X[0])$yg[]="ALTER TABLE ".table($D)." RENAME $d TO $X[0]";$c[]="ALTER $d TYPE$X[1]";if(!$X[6]){$c[]="ALTER $d ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $d ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Vi!="")$yg[]="COMMENT ON COLUMN ".table($D).".$X[0] IS ".($Vi!=""?substr($Vi,9):"''");}}$c=array_merge($c,$hd);if($Q=="")array_unshift($yg,"CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($yg,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""||$tb!="")$yg[]="COMMENT ON TABLE ".table($D)." IS ".q($tb);if($La!=""){}foreach($yg
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($Q,$c){$i=array();$lc=array();$yg=array();foreach($c
as$X){if($X[0]!="INDEX")$i[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$lc[]=idf_escape($X[1]);else$yg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($i)array_unshift($yg,"ALTER TABLE ".table($Q).implode(",",$i));if($lc)array_unshift($yg,"DROP INDEX ".implode(", ",$lc));foreach($yg
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($bj){return
drop_tables($bj);}function
drop_tables($S){foreach($S
as$Q){$O=table_status($Q);if(!queries("DROP ".strtoupper($O["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$bj,$Zh){foreach(array_merge($S,$bj)as$Q){$O=table_status($Q);if(!queries("ALTER ".strtoupper($O["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($Zh)))return
false;}return
true;}function
trigger($D,$Q){if($D=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$e=array();$Z="WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q)." AND trigger_name = ".q($D);foreach(get_rows("SELECT * FROM information_schema.triggered_update_columns $Z")as$J)$e[]=$J["event_object_column"];$I=array();foreach(get_rows('SELECT trigger_name AS "Trigger", action_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers '."$Z ORDER BY event_manipulation DESC")as$J){if($e&&$J["Event"]=="UPDATE")$J["Event"].=" OF";$J["Of"]=implode(", ",$e);if($I)$J["Event"].=" OR $I[Event]";$I=$J;}return$I;}function
triggers($Q){$I=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q))as$J){$zi=trigger($J["trigger_name"],$Q);$I[$zi["Trigger"]]=array($zi["Timing"],$zi["Event"]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE","INSERT OR UPDATE","INSERT OR UPDATE OF","DELETE OR INSERT","DELETE OR UPDATE","DELETE OR UPDATE OF","DELETE OR INSERT OR UPDATE","DELETE OR INSERT OR UPDATE OF"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($D,$T){$K=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($D));$I=$K[0];$I["returns"]=array("type"=>$I["type_udt_name"]);$I["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($D).'
ORDER BY ordinal_position');return$I;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($D,$J){$I=array();foreach($J["fields"]as$o)$I[]=$o["type"];return
idf_escape($D)."(".implode(", ",$I).")";}function
last_id(){return
0;}function
explain($g,$G){return$g->query("EXPLAIN $G");}function
found_rows($R,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Jg))return$Jg[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($ch,$h=null){global$g,$U,$Jh;if(!$h)$h=$g;$I=$h->query("SET search_path TO ".idf_escape($ch));foreach(types()as$T){if(!isset($U[$T])){$U[$T]=0;$Jh[lang(26)][]=$T;}}return$I;}function
foreign_keys_sql($Q){$I="";$O=table_status($Q);$ed=foreign_keys($Q);ksort($ed);foreach($ed
as$dd=>$cd)$I.="ALTER TABLE ONLY ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." ADD CONSTRAINT ".idf_escape($dd)." $cd[definition] ".($cd['deferrable']?'DEFERRABLE':'NOT DEFERRABLE').";\n";return($I?"$I\n":$I);}function
create_sql($Q,$La,$Kh){global$g;$I='';$Sg=array();$mh=array();$O=table_status($Q);if(is_view($O)){$aj=view($Q);return
rtrim("CREATE VIEW ".idf_escape($Q)." AS $aj[select]",";");}$p=fields($Q);$x=indexes($Q);ksort($x);$Cb=constraints($Q);if(!$O||empty($p))return
false;$I="CREATE TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." (\n    ";foreach($p
as$Xc=>$o){$Tf=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$Sg[]=$Tf;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$Fe)){$lh=$Fe[1];$_h=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($lh):"SELECT * FROM $lh"));$mh[]=($Kh=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $lh;\n":"")."CREATE SEQUENCE $lh INCREMENT $_h[increment_by] MINVALUE $_h[min_value] MAXVALUE $_h[max_value]".($La&&$_h['last_value']?" START $_h[last_value]":"")." CACHE $_h[cache_value];";}}if(!empty($mh))$I=implode("\n\n",$mh)."\n\n$I";foreach($x
as$Md=>$w){switch($w['type']){case'UNIQUE':$Sg[]="CONSTRAINT ".idf_escape($Md)." UNIQUE (".implode(', ',array_map('idf_escape',$w['columns'])).")";break;case'PRIMARY':$Sg[]="CONSTRAINT ".idf_escape($Md)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$w['columns'])).")";break;}}foreach($Cb
as$zb=>$Ab)$Sg[]="CONSTRAINT ".idf_escape($zb)." CHECK $Ab";$I.=implode(",\n    ",$Sg)."\n) WITH (oids = ".($O['Oid']?'true':'false').");";foreach($x
as$Md=>$w){if($w['type']=='INDEX'){$e=array();foreach($w['columns']as$z=>$X)$e[]=idf_escape($X).($w['descs'][$z]?" DESC":"");$I.="\n\nCREATE INDEX ".idf_escape($Md)." ON ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." USING btree (".implode(', ',$e).");";}}if($O['Comment'])$I.="\n\nCOMMENT ON TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." IS ".q($O['Comment']).";";foreach($p
as$Xc=>$o){if($o['comment'])$I.="\n\nCOMMENT ON COLUMN ".idf_escape($O['nspname']).".".idf_escape($O['Name']).".".idf_escape($Xc)." IS ".q($o['comment']).";";}return
rtrim($I,';');}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
trigger_sql($Q){$O=table_status($Q);$I="";foreach(triggers($Q)as$yi=>$xi){$zi=trigger($yi,$O['Name']);$I.="\nCREATE TRIGGER ".idf_escape($zi['Trigger'])." $zi[Timing] $zi[Event] ON ".idf_escape($O["nspname"]).".".idf_escape($O['Name'])." $zi[Type] $zi[Statement];;\n";}return$I;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Vc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$Vc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$g;return$g->result("SHOW max_connections");}function
driver_config(){$U=array();$Jh=array();foreach(array(lang(27)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(28)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(25)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(29)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(30)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(31)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$z=>$X){$U+=$X;$Jh[$z]=array_keys($X);}return
array('possible_drivers'=>array("PgSQL","PDO_PgSQL"),'jush'=>"pgsql",'types'=>$U,'structured_types'=>$Jh,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'functions'=>array("char_length","lower","round","to_hex","to_timestamp","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",)),);}}$kc["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;var$_current_db;function
_error($Cc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$F){$this->_link=@oci_new_connect($V,$F,$M,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){$this->_current_db=$j;return
true;}function
query($G,$Ei=false){$H=oci_parse($this->_link,$G);$this->error="";if(!$H){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$I=@oci_execute($H);restore_error_handler();if($I){if(oci_num_fields($H))return
new
Min_Result($H);$this->affected_rows=oci_num_rows($H);oci_free_statement($H);}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=1){$H=$this->query($G);if(!is_object($H)||!oci_fetch($H->_result))return
false;return
oci_result($H->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$z=>$X){if(is_a($X,'OCI-Lob'))$J[$z]=$X->load();}return$J;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$d=$this->_offset++;$I=new
stdClass;$I->name=oci_field_name($this->_result,$d);$I->orgname=$I->name;$I->type=oci_field_type($this->_result,$d);$I->charsetnr=(preg_match("~raw|blob|bfile~",$I->type)?63:0);return$I;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";var$_current_db;function
connect($M,$V,$F){$this->dsn("oci:dbname=//$M;charset=AL32UTF8",$V,$F);return
true;}function
select_db($j){$this->_current_db=$j;return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}function
insertUpdate($Q,$K,$ng){global$g;foreach($K
as$N){$Li=array();$Z=array();foreach($N
as$z=>$X){$Li[]="$z = $X";if(isset($ng[idf_unescape($z)]))$Z[]="$z = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Li)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$Mb=$b->credentials();if($g->connect($Mb[0],$Mb[1],$Mb[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces ORDER BY 1");}function
limit($G,$Z,$_,$kf=0,$kh=" "){return($kf?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($_+$kf).") WHERE rnum > $kf":($_!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($_+$kf):" $G$Z"));}function
limit1($Q,$G,$Z,$kh="\n"){return" $G$Z";}function
db_collation($l,$nb){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
get_current_db(){global$g;$l=$g->_current_db?$g->_current_db:DB;unset($g->_current_db);return$l;}function
where_owner($lg,$Nf="owner"){if(!$_GET["ns"])return'';return"$lg$Nf = sys_context('USERENV', 'CURRENT_SCHEMA')";}function
views_table($e){$Nf=where_owner('');return"(SELECT $e FROM all_views WHERE ".($Nf?$Nf:"rownum < 0").")";}function
tables_list(){$aj=views_table("view_name");$Nf=where_owner(" AND ");return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."$Nf
UNION SELECT view_name, 'view' FROM $aj
ORDER BY 1");}function
count_tables($k){global$g;$I=array();foreach($k
as$l)$I[$l]=$g->result("SELECT COUNT(*) FROM all_tables WHERE tablespace_name = ".q($l));return$I;}function
table_status($D=""){$I=array();$eh=q($D);$l=get_current_db();$aj=views_table("view_name");$Nf=where_owner(" AND ");foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q($l).$Nf.($D!=""?" AND table_name = $eh":"")."
UNION SELECT view_name, 'view', 0, 0 FROM $aj".($D!=""?" WHERE view_name = $eh":"")."
ORDER BY 1")as$J){if($D!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$I=array();$Nf=where_owner(" AND ");foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)."$Nf ORDER BY column_id")as$J){$T=$J["DATA_TYPE"];$we="$J[DATA_PRECISION],$J[DATA_SCALE]";if($we==",")$we=$J["CHAR_COL_DECL_LENGTH"];$I[$J["COLUMN_NAME"]]=array("field"=>$J["COLUMN_NAME"],"full_type"=>$T.($we?"($we)":""),"type"=>strtolower($T),"length"=>$we,"default"=>$J["DATA_DEFAULT"],"null"=>($J["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$I;}function
indexes($Q,$h=null){$I=array();$Nf=where_owner(" AND ","aic.table_owner");foreach(get_rows("SELECT aic.*, ac.constraint_type, atc.data_default
FROM all_ind_columns aic
LEFT JOIN all_constraints ac ON aic.index_name = ac.constraint_name AND aic.table_name = ac.table_name AND aic.index_owner = ac.owner
LEFT JOIN all_tab_cols atc ON aic.column_name = atc.column_name AND aic.table_name = atc.table_name AND aic.index_owner = atc.owner
WHERE aic.table_name = ".q($Q)."$Nf
ORDER BY ac.constraint_type, aic.column_position",$h)as$J){$Md=$J["INDEX_NAME"];$qb=$J["DATA_DEFAULT"];$qb=($qb?trim($qb,'"'):$J["COLUMN_NAME"]);$I[$Md]["type"]=($J["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($J["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$I[$Md]["columns"][]=$qb;$I[$Md]["lengths"][]=($J["CHAR_LENGTH"]&&$J["CHAR_LENGTH"]!=$J["COLUMN_LENGTH"]?$J["CHAR_LENGTH"]:null);$I[$Md]["descs"][]=($J["DESCEND"]&&$J["DESCEND"]=="DESC"?'1':null);}return$I;}function
view($D){$aj=views_table("view_name, text");$K=get_rows('SELECT text "select" FROM '.$aj.' WHERE view_name = '.q($D));return
reset($K);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$G){$g->query("EXPLAIN PLAN FOR $G");return$g->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
auto_increment(){return"";}function
alter_table($Q,$D,$p,$hd,$tb,$_c,$mb,$La,$Wf){$c=$lc=array();$Hf=($Q?fields($Q):array());foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");$Gf=$Hf[$o[0]];if($X&&$Gf){$mf=process_field($Gf,$Gf);if($X[2]==$mf[2])$X[2]="";}if($X)$c[]=($Q!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$lc[]=idf_escape($o[0]);}if($Q=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$lc||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$lc).")"))&&($Q==$D||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($D)));}function
alter_indexes($Q,$c){$lc=array();$yg=array();foreach($c
as$X){if($X[0]!="INDEX"){$X[2]=preg_replace('~ DESC$~','',$X[2]);$i=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");array_unshift($yg,"ALTER TABLE ".table($Q).$i);}elseif($X[2]=="DROP")$lc[]=idf_escape($X[1]);else$yg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($lc)array_unshift($yg,"DROP INDEX ".implode(", ",$lc));foreach($yg
as$G){if(!queries($G))return
false;}return
true;}function
foreign_keys($Q){$I=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($G)as$J)$I[$J['NAME']]=array("db"=>$J['DEST_DB'],"table"=>$J['DEST_TABLE'],"source"=>array($J['SRC_COLUMN']),"target"=>array($J['DEST_COLUMN']),"on_delete"=>$J['ON_DELETE'],"on_update"=>null,);return$I;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($bj){return
apply_queries("DROP VIEW",$bj);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){$I=get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX')) ORDER BY 1");return($I?$I:get_vals("SELECT DISTINCT owner FROM all_tables WHERE tablespace_name = ".q(DB)." ORDER BY 1"));}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($dh,$h=null){global$g;if(!$h)$h=$g;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($dh));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$K=get_rows('SELECT * FROM v$instance');return
reset($K);}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Vc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view)$~',$Vc);}function
driver_config(){$U=array();$Jh=array();foreach(array(lang(27)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(28)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(25)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(29)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$z=>$X){$U+=$X;$Jh[$z]=array_keys($X);}return
array('possible_drivers'=>array("OCI8","PDO_OCI"),'jush'=>"oracle",'types'=>$U,'structured_types'=>$Jh,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("length","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",)),);}}$kc["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($M,$V,$F){global$b;$l=$b->database();$_b=array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8");if($l!="")$_b["Database"]=$l;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$M),$_b);if($this->_link){$Td=sqlsrv_server_info($this->_link);$this->server_info=$Td['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$Ei=false){$H=sqlsrv_query($this->_link,$G);$this->error="";if(!$H){$this->_get_error();return
false;}return$this->store_result($H);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($H=null){if(!$H)$H=$this->_result;if(!$H)return
false;if(sqlsrv_field_metadata($H))return
new
Min_Result($H);$this->affected_rows=sqlsrv_rows_affected($H);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$z=>$X){if(is_a($X,'DateTime'))$J[$z]=$X->format("Y-m-d H:i:s");}return$J;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$I=new
stdClass;$I->name=$o["Name"];$I->orgname=$o["Name"];$I->type=($o["Type"]==1?254:0);return$I;}function
seek($kf){for($t=0;$t<$kf;$t++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($M,$V,$F){$this->_link=@mssql_connect($M,$V,$F);if($this->_link){$H=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($H){$J=$H->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$J[0]] $J[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($G,$Ei=false){$H=@mssql_query($G,$this->_link);$this->error="";if(!$H){$this->error=mssql_get_last_message();return
false;}if($H===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;return
mssql_result($H->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=mssql_num_rows($H);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$I=mssql_fetch_field($this->_result);$I->orgtable=$I->table;$I->orgname=$I->name;return$I;}function
seek($kf){mssql_data_seek($this->_result,$kf);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($M,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$F);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$ng){foreach($K
as$N){$Li=array();$Z=array();foreach($N
as$z=>$X){$Li[]="$z = $X";if(isset($ng[idf_unescape($z)]))$Z[]="$z = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$N).")) AS source (c".implode(", c",range(1,count($N))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Li)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($v){return"[".str_replace("]","]]",$v)."]";}function
table($v){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$Mb=$b->credentials();if($g->connect($Mb[0],$Mb[1],$Mb[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$_,$kf=0,$kh=" "){return($_!==null?" TOP (".($_+$kf).")":"")." $G$Z";}function
limit1($Q,$G,$Z,$kh="\n"){return
limit($G,$Z,1,0,$kh);}function
db_collation($l,$nb){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$g;$I=array();foreach($k
as$l){$g->select_db($l);$I[$l]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$I;}function
table_status($D=""){$I=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$J){if($D!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$vb=get_key_vals("SELECT objname, cast(value as varchar(max)) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($Q).", 'column', NULL)");$I=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$J){$T=$J["type"];$we=(preg_match("~char|binary~",$T)?$J["max_length"]:($T=="decimal"?"$J[precision],$J[scale]":""));$I[$J["name"]]=array("field"=>$J["name"],"full_type"=>$T.($we?"($we)":""),"type"=>$T,"length"=>$we,"default"=>$J["default"],"null"=>$J["is_nullable"],"auto_increment"=>$J["is_identity"],"collation"=>$J["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$J["is_identity"],"comment"=>$vb[$J["name"]],);}return$I;}function
indexes($Q,$h=null){$I=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$h)as$J){$D=$J["name"];$I[$D]["type"]=($J["is_primary_key"]?"PRIMARY":($J["is_unique"]?"UNIQUE":"INDEX"));$I[$D]["lengths"]=array();$I[$D]["columns"][$J["key_ordinal"]]=$J["column_name"];$I[$D]["descs"][$J["key_ordinal"]]=($J["is_descending_key"]?'1':null);}return$I;}function
view($D){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($D))));}function
collations(){$I=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$mb)$I[preg_replace('~_.*~','',$mb)][]=$mb;return$I;}function
information_schema($l){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$g->error)));}function
create_database($l,$mb){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$mb)?" COLLATE $mb":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($D,$mb){if(preg_match('~^[a-z0-9_]+$~i',$mb))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $mb");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($D));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$D,$p,$hd,$tb,$_c,$mb,$La,$Wf){$c=array();$vb=array();foreach($p
as$o){$d=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $d";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$vb[$o[0]]=$X[5];unset($X[5]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($hd[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($d!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$d").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($D)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$D)queries("EXEC sp_rename ".q(table($Q)).", ".q($D));if($hd)$c[""]=$hd;foreach($c
as$z=>$X){if(!queries("ALTER TABLE ".idf_escape($D)." $z".implode(",",$X)))return
false;}foreach($vb
as$z=>$X){$tb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($D).", @level2type = N'Column', @level2name = ".q($z));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$tb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($D).", @level2type = N'Column', @level2name = ".q($z));}return
true;}function
alter_indexes($Q,$c){$w=array();$lc=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$lc[]=idf_escape($X[1]);else$w[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$w||queries("DROP INDEX ".implode(", ",$w)))&&(!$lc||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$lc)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$G){$g->query("SET SHOWPLAN_ALL ON");$I=$g->query($G);$g->query("SET SHOWPLAN_ALL OFF");return$I;}function
found_rows($R,$Z){}function
foreign_keys($Q){$I=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$J){$r=&$I[$J["FK_NAME"]];$r["db"]=$J["PKTABLE_QUALIFIER"];$r["table"]=$J["PKTABLE_NAME"];$r["source"][]=$J["FKCOLUMN_NAME"];$r["target"][]=$J["PKCOLUMN_NAME"];}return$I;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($bj){return
queries("DROP VIEW ".implode(", ",array_map('table',$bj)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$bj,$Zh){return
apply_queries("ALTER SCHEMA ".idf_escape($Zh)." TRANSFER",array_merge($S,$bj));}function
trigger($D){if($D=="")return
array();$K=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($D));$I=reset($K);if($I)$I["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$I["text"]);return$I;}function
triggers($Q){$I=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$J)$I[$J["name"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($ch){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Vc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$Vc);}function
driver_config(){$U=array();$Jh=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(28)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(25)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(29)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$z=>$X){$U+=$X;$Jh[$z]=array_keys($X);}return
array('possible_drivers'=>array("SQLSRV","MSSQL","PDO_DBLIB"),'jush'=>"mssql",'types'=>$U,'structured_types'=>$Jh,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'functions'=>array("len","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",)),);}}$kc["mongo"]="MongoDB (alpha)";if(isset($_GET["mongo"])){define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Mi,$_f){try{$this->_link=new
MongoClient($Mi,$_f);if($_f["password"]!=""){$_f["password"]="";try{new
MongoClient($Mi,$_f);$this->error=lang(22);}catch(Exception$rc){}}}catch(Exception$rc){$this->error=$rc->getMessage();}}function
query($G){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$Hc){$this->error=$Hc->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$fe){$J=array();foreach($fe
as$z=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$z]=63;$J[$z]=(is_a($X,'MongoId')?"ObjectId(\"$X\")":(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?"$X":(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$J;foreach($J
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$z=>$X)$I[$z]=$J[$z];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$je=array_keys($this->_rows[0]);$D=$je[$this->_offset++];return(object)array('name'=>$D,'charsetnr'=>$this->_charset[$D],);}}class
Min_Driver
extends
Min_SQL{public$ng="_id";function
select($Q,$L,$Z,$sd,$Bf=array(),$_=1,$E=0,$pg=false){$L=($L==array("*")?array():array_fill_keys($L,true));$xh=array();foreach($Bf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Ib);$xh[$X]=($Ib?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$L)->sort($xh)->limit($_!=""?+$_:0)->skip($E*$_));}function
insert($Q,$N){try{$I=$this->_conn->_db->selectCollection($Q)->insert($N);$this->_conn->errno=$I['code'];$this->_conn->error=$I['err'];$this->_conn->last_id=$N['_id'];return!$I['err'];}catch(Exception$Hc){$this->_conn->error=$Hc->getMessage();return
false;}}}function
get_databases($fd){global$g;$I=array();$Wb=$g->_link->listDBs();foreach($Wb['databases']as$l)$I[]=$l['name'];return$I;}function
count_tables($k){global$g;$I=array();foreach($k
as$l)$I[$l]=count($g->_link->selectDB($l)->getCollectionNames(true));return$I;}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$g;foreach($k
as$l){$Og=$g->_link->selectDB($l)->drop();if(!$Og['ok'])return
false;}return
true;}function
indexes($Q,$h=null){global$g;$I=array();foreach($g->_db->selectCollection($Q)->getIndexInfo()as$w){$ec=array();foreach($w["key"]as$d=>$T)$ec[]=($T==-1?'1':null);$I[$w["name"]]=array("type"=>($w["name"]=="_id_"?"PRIMARY":($w["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($w["key"]),"lengths"=>array(),"descs"=>$ec,);}return$I;}function
fields($Q){return
fields_from_edit();}function
found_rows($R,$Z){global$g;return$g->_db->selectCollection($_GET["select"])->count($Z);}$xf=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$affected_rows,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Mi,$_f){$hb='MongoDB\Driver\Manager';$this->_link=new$hb($Mi,$_f);$this->executeCommand('admin',array('ping'=>1));}function
executeCommand($l,$rb){$hb='MongoDB\Driver\Command';try{return$this->_link->executeCommand($l,new$hb($rb));}catch(Exception$rc){$this->error=$rc->getMessage();return
array();}}function
executeBulkWrite($Ze,$Xa,$Jb){try{$Rg=$this->_link->executeBulkWrite($Ze,$Xa);$this->affected_rows=$Rg->$Jb();return
true;}catch(Exception$rc){$this->error=$rc->getMessage();return
false;}}function
query($G){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$fe){$J=array();foreach($fe
as$z=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$z]=63;$J[$z]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'."$X\")":(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->getData():(is_a($X,'MongoDB\BSON\Regex')?"$X":(is_object($X)||is_array($X)?json_encode($X,256):$X)))));}$this->_rows[]=$J;foreach($J
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$z=>$X)$I[$z]=$J[$z];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$je=array_keys($this->_rows[0]);$D=$je[$this->_offset++];return(object)array('name'=>$D,'charsetnr'=>$this->_charset[$D],);}}class
Min_Driver
extends
Min_SQL{public$ng="_id";function
select($Q,$L,$Z,$sd,$Bf=array(),$_=1,$E=0,$pg=false){global$g;$L=($L==array("*")?array():array_fill_keys($L,1));if(count($L)&&!isset($L['_id']))$L['_id']=0;$Z=where_to_query($Z);$xh=array();foreach($Bf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Ib);$xh[$X]=($Ib?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$_=$_GET['limit'];$_=min(200,max(1,(int)$_));$uh=$E*$_;$hb='MongoDB\Driver\Query';try{return
new
Min_Result($g->_link->executeQuery("$g->_db_name.$Q",new$hb($Z,array('projection'=>$L,'limit'=>$_,'skip'=>$uh,'sort'=>$xh))));}catch(Exception$rc){$g->error=$rc->getMessage();return
false;}}function
update($Q,$N,$zg,$_=0,$kh="\n"){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($zg);$hb='MongoDB\Driver\BulkWrite';$Xa=new$hb(array());if(isset($N['_id']))unset($N['_id']);$Lg=array();foreach($N
as$z=>$Y){if($Y=='NULL'){$Lg[$z]=1;unset($N[$z]);}}$Li=array('$set'=>$N);if(count($Lg))$Li['$unset']=$Lg;$Xa->update($Z,$Li,array('upsert'=>false));return$g->executeBulkWrite("$l.$Q",$Xa,'getModifiedCount');}function
delete($Q,$zg,$_=0){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($zg);$hb='MongoDB\Driver\BulkWrite';$Xa=new$hb(array());$Xa->delete($Z,array('limit'=>$_));return$g->executeBulkWrite("$l.$Q",$Xa,'getDeletedCount');}function
insert($Q,$N){global$g;$l=$g->_db_name;$hb='MongoDB\Driver\BulkWrite';$Xa=new$hb(array());if($N['_id']=='')unset($N['_id']);$Xa->insert($N);return$g->executeBulkWrite("$l.$Q",$Xa,'getInsertedCount');}}function
get_databases($fd){global$g;$I=array();foreach($g->executeCommand('admin',array('listDatabases'=>1))as$Wb){foreach($Wb->databases
as$l)$I[]=$l->name;}return$I;}function
count_tables($k){$I=array();return$I;}function
tables_list(){global$g;$ob=array();foreach($g->executeCommand($g->_db_name,array('listCollections'=>1))as$H)$ob[$H->name]='table';return$ob;}function
drop_databases($k){return
false;}function
indexes($Q,$h=null){global$g;$I=array();foreach($g->executeCommand($g->_db_name,array('listIndexes'=>$Q))as$w){$ec=array();$e=array();foreach(get_object_vars($w->key)as$d=>$T){$ec[]=($T==-1?'1':null);$e[]=$d;}$I[$w->name]=array("type"=>($w->name=="_id_"?"PRIMARY":(isset($w->unique)?"UNIQUE":"INDEX")),"columns"=>$e,"lengths"=>array(),"descs"=>$ec,);}return$I;}function
fields($Q){global$m;$p=fields_from_edit();if(!$p){$H=$m->select($Q,array("*"),null,null,array(),10);if($H){while($J=$H->fetch_assoc()){foreach($J
as$z=>$X){$J[$z]=null;$p[$z]=array("field"=>$z,"type"=>"string","null"=>($z!=$m->primary),"auto_increment"=>($z==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}}return$p;}function
found_rows($R,$Z){global$g;$Z=where_to_query($Z);$pi=$g->executeCommand($g->_db_name,array('count'=>$R['Name'],'query'=>$Z))->toArray();return$pi[0]->n;}function
sql_query_where_parser($zg){$zg=preg_replace('~^\sWHERE \(?\(?(.+?)\)?\)?$~','\1',$zg);$lj=explode(' AND ',$zg);$mj=explode(') OR (',$zg);$Z=array();foreach($lj
as$jj)$Z[]=trim($jj);if(count($mj)==1)$mj=array();elseif(count($mj)>1)$Z=array();return
where_to_query($Z,$mj);}function
where_to_query($hj=array(),$ij=array()){global$b;$Rb=array();foreach(array('and'=>$hj,'or'=>$ij)as$T=>$Z){if(is_array($Z)){foreach($Z
as$Nc){list($kb,$vf,$X)=explode(" ",$Nc,3);if($kb=="_id"&&preg_match('~^(MongoDB\\\\BSON\\\\ObjectID)\("(.+)"\)$~',$X,$C)){list(,$hb,$X)=$C;$X=new$hb($X);}if(!in_array($vf,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$vf,$C)){$X=(float)$X;$vf=$C[1];}elseif(preg_match('~^\(date\)(.+)~',$vf,$C)){$Tb=new
DateTime($X);$hb='MongoDB\BSON\UTCDatetime';$X=new$hb($Tb->getTimestamp()*1000);$vf=$C[1];}switch($vf){case'=':$vf='$eq';break;case'!=':$vf='$ne';break;case'>':$vf='$gt';break;case'<':$vf='$lt';break;case'>=':$vf='$gte';break;case'<=':$vf='$lte';break;case'regex':$vf='$regex';break;default:continue
2;}if($T=='and')$Rb['$and'][]=array($kb=>array($vf=>$X));elseif($T=='or')$Rb['$or'][]=array($kb=>array($vf=>$X));}}}return$Rb;}$xf=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($v){return$v;}function
idf_escape($v){return$v;}function
table_status($D="",$Uc=false){$I=array();foreach(tables_list()as$Q=>$T){$I[$Q]=array("Name"=>$Q);if($D==$Q)return$I[$Q];}return$I;}function
create_database($l,$mb){return
true;}function
last_id(){global$g;return$g->last_id;}function
error(){global$g;return
h($g->error);}function
collations(){return
array();}function
logged_user(){global$b;$Mb=$b->credentials();return$Mb[1];}function
connect(){global$b;$g=new
Min_DB;list($M,$V,$F)=$b->credentials();$_f=array();if($V.$F!=""){$_f["username"]=$V;$_f["password"]=$F;}$l=$b->database();if($l!="")$_f["db"]=$l;if(($Ka=getenv("MONGO_AUTH_SOURCE")))$_f["authSource"]=$Ka;$g->connect("mongodb://$M",$_f);if($g->error)return$g->error;return$g;}function
alter_indexes($Q,$c){global$g;foreach($c
as$X){list($T,$D,$N)=$X;if($N=="DROP")$I=$g->_db->command(array("deleteIndexes"=>$Q,"index"=>$D));else{$e=array();foreach($N
as$d){$d=preg_replace('~ DESC$~','',$d,1,$Ib);$e[$d]=($Ib?-1:1);}$I=$g->_db->selectCollection($Q)->ensureIndex($e,array("unique"=>($T=="UNIQUE"),"name"=>$D,));}if($I['errmsg']){$g->error=$I['errmsg'];return
false;}}return
true;}function
support($Vc){return
preg_match("~database|indexes|descidx~",$Vc);}function
db_collation($l,$nb){}function
information_schema(){}function
is_view($R){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$D,$p,$hd,$tb,$_c,$mb,$La,$Wf){global$g;if($Q==""){$g->_db->createCollection($D);return
true;}}function
drop_tables($S){global$g;foreach($S
as$Q){$Og=$g->_db->selectCollection($Q)->drop();if(!$Og['ok'])return
false;}return
true;}function
truncate_tables($S){global$g;foreach($S
as$Q){$Og=$g->_db->selectCollection($Q)->remove();if(!$Og['ok'])return
false;}return
true;}function
driver_config(){global$xf;return
array('possible_drivers'=>array("mongo","mongodb"),'jush'=>"mongo",'operators'=>$xf,'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),);}}$kc["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url,$_db;function
rootQuery($ag,$Db=array(),$Se='GET'){@ini_set('track_errors',1);$Zc=@file_get_contents("$this->_url/".ltrim($ag,'/'),false,stream_context_create(array('http'=>array('method'=>$Se,'content'=>$Db===null?$Db:json_encode($Db),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$Zc){$this->error=$php_errormsg;return$Zc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=lang(32)." $http_response_header[0]";return
false;}$I=json_decode($Zc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$Bb=get_defined_constants(true);foreach($Bb['json']as$D=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$D)){$this->error=$D;break;}}}}return$I;}function
query($ag,$Db=array(),$Se='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($ag,'/'),$Db,$Se);}function
connect($M,$V,$F){preg_match('~^(https?://)?(.*)~',$M,$C);$this->_url=($C[1]?$C[1]:"http://")."$V:$F@$C[2]";$I=$this->query('');if($I)$this->server_info=$I['version']['number'];return(bool)$I;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($K){$this->num_rows=count($K);$this->_rows=$K;reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$L,$Z,$sd,$Bf=array(),$_=1,$E=0,$pg=false){global$b;$Rb=array();$G="$Q/_search";if($L!=array("*"))$Rb["fields"]=$L;if($Bf){$xh=array();foreach($Bf
as$kb){$kb=preg_replace('~ DESC$~','',$kb,1,$Ib);$xh[]=($Ib?array($kb=>"desc"):$kb);}$Rb["sort"]=$xh;}if($_){$Rb["size"]=+$_;if($E)$Rb["from"]=($E*$_);}foreach($Z
as$X){list($kb,$vf,$X)=explode(" ",$X,3);if($kb=="_id")$Rb["query"]["ids"]["values"][]=$X;elseif($kb.$X!=""){$ci=array("term"=>array(($kb!=""?$kb:"_all")=>$X));if($vf=="=")$Rb["query"]["filtered"]["filter"]["and"][]=$ci;else$Rb["query"]["filtered"]["query"]["bool"]["must"][]=$ci;}}if($Rb["query"]&&!$Rb["query"]["filtered"]["query"]&&!$Rb["query"]["ids"])$Rb["query"]["filtered"]["query"]=array("match_all"=>array());$Fh=microtime(true);$eh=$this->_conn->query($G,$Rb);if($pg)echo$b->selectQuery("$G: ".json_encode($Rb),$Fh,!$eh);if(!$eh)return
false;$I=array();foreach($eh['hits']['hits']as$Ed){$J=array();if($L==array("*"))$J["_id"]=$Ed["_id"];$p=$Ed['_source'];if($L!=array("*")){$p=array();foreach($L
as$z)$p[$z]=$Ed['fields'][$z];}foreach($p
as$z=>$X){if($Rb["fields"])$X=$X[0];$J[$z]=(is_array($X)?json_encode($X):$X);}$I[]=$J;}return
new
Min_Result($I);}function
update($T,$Cg,$zg,$_=0,$kh="\n"){$Yf=preg_split('~ *= *~',$zg);if(count($Yf)==2){$u=trim($Yf[1]);$G="$T/$u";return$this->_conn->query($G,$Cg,'POST');}return
false;}function
insert($T,$Cg){$u="";$G="$T/$u";$Og=$this->_conn->query($G,$Cg,'POST');$this->_conn->last_id=$Og['_id'];return$Og['created'];}function
delete($T,$zg,$_=0){$Id=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Id[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$bb){$Yf=preg_split('~ *= *~',$bb);if(count($Yf)==2)$Id[]=trim($Yf[1]);}}$this->_conn->affected_rows=0;foreach($Id
as$u){$G="{$T}/{$u}";$Og=$this->_conn->query($G,'{}','DELETE');if(is_array($Og)&&$Og['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$g=new
Min_DB;list($M,$V,$F)=$b->credentials();if($F!=""&&$g->connect($M,$V,""))return
lang(22);if($g->connect($M,$V,$F))return$g;return$g->error;}function
support($Vc){return
preg_match("~database|table|columns~",$Vc);}function
logged_user(){global$b;$Mb=$b->credentials();return$Mb[1];}function
get_databases(){global$g;$I=$g->rootQuery('_aliases');if($I){$I=array_keys($I);sort($I,SORT_STRING);}return$I;}function
collations(){return
array();}function
db_collation($l,$nb){}function
engines(){return
array();}function
count_tables($k){global$g;$I=array();$H=$g->query('_stats');if($H&&$H['indices']){$Qd=$H['indices'];foreach($Qd
as$Pd=>$Gh){$Od=$Gh['total']['indexing'];$I[$Pd]=$Od['index_total'];}}return$I;}function
tables_list(){global$g;if(min_version(6))return
array('_doc'=>'table');$I=$g->query('_mapping');if($I)$I=array_fill_keys(array_keys($I[$g->_db]["mappings"]),'table');return$I;}function
table_status($D="",$Uc=false){global$g;$eh=$g->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$I=array();if($eh){$S=$eh["aggregations"]["count_by_type"]["buckets"];foreach($S
as$Q){$I[$Q["key"]]=array("Name"=>$Q["key"],"Engine"=>"table","Rows"=>$Q["doc_count"],);if($D!=""&&$D==$Q["key"])return$I[$D];}}return$I;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$g;$Be=array();if(min_version(6)){$H=$g->query("_mapping");if($H)$Be=$H[$g->_db]['mappings']['properties'];}else{$H=$g->query("$Q/_mapping");if($H){$Be=$H[$Q]['properties'];if(!$Be)$Be=$H[$g->_db]['mappings'][$Q]['properties'];}}$I=array();if($Be){foreach($Be
as$D=>$o){$I[$D]=array("field"=>$D,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($I[$D]["privileges"]["insert"]);unset($I[$D]["privileges"]["update"]);}}}return$I;}function
foreign_keys($Q){return
array();}function
table($v){return$v;}function
idf_escape($v){return$v;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($l){global$g;return$g->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$g;return$g->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($Q,$D,$p,$hd,$tb,$_c,$mb,$La,$Wf){global$g;$vg=array();foreach($p
as$Sc){$Xc=trim($Sc[1][0]);$Yc=trim($Sc[1][1]?$Sc[1][1]:"text");$vg[$Xc]=array('type'=>$Yc);}if(!empty($vg))$vg=array('properties'=>$vg);return$g->query("_mapping/{$D}",$vg,'PUT');}function
drop_tables($S){global$g;$I=true;foreach($S
as$Q)$I=$I&&$g->query(urlencode($Q),array(),'DELETE');return$I;}function
last_id(){global$g;return$g->last_id;}function
driver_config(){$U=array();$Jh=array();foreach(array(lang(27)=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),lang(28)=>array("date"=>10),lang(25)=>array("string"=>65535,"text"=>65535),lang(29)=>array("binary"=>255),)as$z=>$X){$U+=$X;$Jh[$z]=array_keys($X);}return
array('possible_drivers'=>array("json + allow_url_fopen"),'jush'=>"elastic",'operators'=>array("=","query"),'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),'types'=>$U,'structured_types'=>$Jh,);}}class
Adminer{var$operators;function
name(){return"<a href='https://www.adminer.org/'".target_blank()." id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($i=false){return
password_file($i);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($M){return
h($M);}function
database(){return
DB;}function
databases($fd=true){return
get_databases($fd);}function
schemas(){return
schemas();}function
queryTimeout(){return
2;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$I=array();$q="adminer.css";if(file_exists($q))$I[]="$q?v=".crc32(file_get_contents($q));return$I;}function
loginForm(){global$kc;echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('driver','<tr><th>'.lang(33).'<td>',html_select("auth[driver]",$kc,DRIVER,"loginDriver(this);")."\n"),$this->loginFormField('server','<tr><th>'.lang(34).'<td>','<input name="auth[server]" value="'.h(SERVER).'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">'."\n"),$this->loginFormField('username','<tr><th>'.lang(35).'<td>','<input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username')); qs('#username').form['auth[driver]'].onchange();")),$this->loginFormField('password','<tr><th>'.lang(36).'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),$this->loginFormField('db','<tr><th>'.lang(37).'<td>','<input name="auth[db]" value="'.h($_GET["db"]).'" autocapitalize="off">'."\n"),"</table>\n","<p><input type='submit' value='".lang(38)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(39))."\n";}function
loginFormField($D,$Bd,$Y){return$Bd.$Y;}function
login($_e,$F){if($F=="")return
lang(40,target_blank());return
true;}function
tableName($Qh){return
h($Qh["Name"]);}function
fieldName($o,$Bf=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Qh,$N=""){global$y,$m;echo'<p class="links">';$ze=array("select"=>lang(41));if(support("table")||support("indexes"))$ze["table"]=lang(42);if(support("table")){if(is_view($Qh))$ze["view"]=lang(43);else$ze["create"]=lang(44);}if($N!==null)$ze["edit"]=lang(45);$D=$Qh["Name"];foreach($ze
as$z=>$X)echo" <a href='".h(ME)."$z=".urlencode($D).($z=="edit"?$N:"")."'".bold(isset($_GET[$z])).">$X</a>";echo
doc_link(array($y=>$m->tableHelp($D)),"?"),"\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Ph){return
array();}function
backwardKeysPrint($Oa,$J){}function
selectQuery($G,$Fh,$Tc=false){global$y,$m;$I="</p>\n";if(!$Tc&&($ej=$m->warnings())){$u="warnings";$I=", <a href='#$u'>".lang(46)."</a>".script("qsl('a').onclick = partial(toggle, '$u');","")."$I<div id='$u' class='hidden'>\n$ej</div>\n";}return"<p><code class='jush-$y'>".h(str_replace("\n"," ",$G))."</code> <span class='time'>(".format_time($Fh).")</span>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($G)."'>".lang(10)."</a>":"").$I;}function
sqlCommandQuery($G){return
shorten_utf8(trim($G),1000);}function
rowDescription($Q){return"";}function
rowDescriptions($K,$id){return$K;}function
selectLink($X,$o){}function
selectVal($X,$A,$o,$Jf){$I=($X===null?"<i>NULL</i>":(preg_match("~char|binary|boolean~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$I="<i>".lang(47,strlen($Jf))."</i>";if(preg_match('~json~',$o["type"]))$I="<code class='jush-js'>$I</code>";return($A?"<a href='".h($A)."'".(is_url($A)?target_blank():"").">$I</a>":$I);}function
editVal($X,$o){return$X;}function
tableStructurePrint($p){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr><th>".lang(48)."<td>".lang(49).(support("comment")?"<td>".lang(50):"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".lang(51)."</i>":""),(isset($o["default"])?" <span title='".lang(52)."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".h($o["comment"]):""),"\n";}echo"</table>\n","</div>\n";}function
tableIndexesPrint($x){echo"<table cellspacing='0'>\n";foreach($x
as$D=>$w){ksort($w["columns"]);$pg=array();foreach($w["columns"]as$z=>$X)$pg[]="<i>".h($X)."</i>".($w["lengths"][$z]?"(".$w["lengths"][$z].")":"").($w["descs"][$z]?" DESC":"");echo"<tr title='".h($D)."'><th>$w[type]<td>".implode(", ",$pg)."\n";}echo"</table>\n";}function
selectColumnsPrint($L,$e){global$pd,$vd;print_fieldset("select",lang(53),$L);$t=0;$L[""]=array();foreach($L
as$z=>$X){$X=$_GET["columns"][$z];$d=select_input(" name='columns[$t][col]'",$e,$X["col"],($z!==""?"selectFieldChange":"selectAddRow"));echo"<div>".($pd||$vd?"<select name='columns[$t][fun]'>".optionlist(array(-1=>"")+array_filter(array(lang(54)=>$pd,lang(55)=>$vd)),$X["fun"])."</select>".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).script("qsl('select').onchange = function () { helpClose();".($z!==""?"":" qsl('select, input', this.parentNode).onchange();")." };","")."($d)":$d)."</div>\n";$t++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$e,$x){print_fieldset("search",lang(56),$Z);foreach($x
as$t=>$w){if($w["type"]=="FULLTEXT"){echo"<div>(<i>".implode("</i>, <i>",array_map('h',$w["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$t]' value='".h($_GET["fulltext"][$t])."'>",script("qsl('input').oninput = selectFieldChange;",""),checkbox("boolean[$t]",1,isset($_GET["boolean"][$t]),"BOOL"),"</div>\n";}}$Za="this.parentNode.firstChild.onchange();";foreach(array_merge((array)$_GET["where"],array(array()))as$t=>$X){if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$t][col]'",$e,$X["col"],($X?"selectFieldChange":"selectAddRow"),"(".lang(57).")"),html_select("where[$t][op]",$this->operators,$X["op"],$Za),"<input type='search' name='where[$t][val]' value='".h($X["val"])."'>",script("mixin(qsl('input'), {oninput: function () { $Za }, onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});",""),"</div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($Bf,$e,$x){print_fieldset("sort",lang(58),$Bf);$t=0;foreach((array)$_GET["order"]as$z=>$X){if($X!=""){echo"<div>".select_input(" name='order[$t]'",$e,$X,"selectFieldChange"),checkbox("desc[$t]",1,isset($_GET["desc"][$z]),lang(59))."</div>\n";$t++;}}echo"<div>".select_input(" name='order[$t]'",$e,"","selectAddRow"),checkbox("desc[$t]",1,false,lang(59))."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($_){echo"<fieldset><legend>".lang(60)."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($_)."'>",script("qsl('input').oninput = selectFieldChange;",""),"</div></fieldset>\n";}function
selectLengthPrint($fi){if($fi!==null){echo"<fieldset><legend>".lang(61)."</legend><div>","<input type='number' name='text_length' class='size' value='".h($fi)."'>","</div></fieldset>\n";}}function
selectActionPrint($x){echo"<fieldset><legend>".lang(62)."</legend><div>","<input type='submit' value='".lang(53)."'>"," <span id='noindex' title='".lang(63)."'></span>","<script".nonce().">\n","var indexColumns = ";$e=array();foreach($x
as$w){$Qb=reset($w["columns"]);if($w["type"]!="FULLTEXT"&&$Qb)$e[$Qb]=1;}$e[""]=1;foreach($e
as$z=>$X)json_row($z);echo";\n","selectFieldChange.call(qs('#form')['select']);\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($xc,$e){}function
selectColumnsProcess($e,$x){global$pd,$vd;$L=array();$sd=array();foreach((array)$_GET["columns"]as$z=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$pd)||in_array($X["fun"],$vd)))){$L[$z]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$vd))$sd[]=$L[$z];}}return
array($L,$sd);}function
selectSearchProcess($p,$x){global$g,$m;$I=array();foreach($x
as$t=>$w){if($w["type"]=="FULLTEXT"&&$_GET["fulltext"][$t]!="")$I[]="MATCH (".implode(", ",array_map('idf_escape',$w["columns"])).") AGAINST (".q($_GET["fulltext"][$t]).(isset($_GET["boolean"][$t])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$z=>$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$lg="";$wb=" $X[op]";if(preg_match('~IN$~',$X["op"])){$Ld=process_length($X["val"]);$wb.=" ".($Ld!=""?$Ld:"(NULL)");}elseif($X["op"]=="SQL")$wb=" $X[val]";elseif($X["op"]=="LIKE %%")$wb=" LIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$wb=" ILIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="FIND_IN_SET"){$lg="$X[op](".q($X["val"]).", ";$wb=")";}elseif(!preg_match('~NULL$~',$X["op"]))$wb.=" ".$this->processInput($p[$X["col"]],$X["val"]);if($X["col"]!="")$I[]=$lg.$m->convertSearch(idf_escape($X["col"]),$X,$p[$X["col"]]).$wb;else{$pb=array();foreach($p
as$D=>$o){if((preg_match('~^[-\d.'.(preg_match('~IN$~',$X["op"])?',':'').']+$~',$X["val"])||!preg_match('~'.number_type().'|bit~',$o["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||preg_match('~char|text|enum|set~',$o["type"]))&&(!preg_match('~date|timestamp~',$o["type"])||preg_match('~^\d+-\d+-\d+~',$X["val"])))$pb[]=$lg.$m->convertSearch(idf_escape($D),$X,$o).$wb;}$I[]=($pb?"(".implode(" OR ",$pb).")":"1 = 0");}}}return$I;}function
selectOrderProcess($p,$x){$I=array();foreach((array)$_GET["order"]as$z=>$X){if($X!="")$I[]=(preg_match('~^((COUNT\(DISTINCT |[A-Z0-9_]+\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\)|COUNT\(\*\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$z])?" DESC":"");}return$I;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$id){return
false;}function
selectQueryBuild($L,$Z,$sd,$Bf,$_,$E){return"";}function
messageQuery($G,$gi,$Tc=false){global$y,$m;restart_session();$Cd=&get_session("queries");if(!$Cd[$_GET["db"]])$Cd[$_GET["db"]]=array();if(strlen($G)>1e6)$G=preg_replace('~[\x80-\xFF]+$~','',substr($G,0,1e6))."\nâ€¦";$Cd[$_GET["db"]][]=array($G,time(),$gi);$Ch="sql-".count($Cd[$_GET["db"]]);$I="<a href='#$Ch' class='toggle'>".lang(64)."</a>\n";if(!$Tc&&($ej=$m->warnings())){$u="warnings-".count($Cd[$_GET["db"]]);$I="<a href='#$u' class='toggle'>".lang(46)."</a>, $I<div id='$u' class='hidden'>\n$ej</div>\n";}return" <span class='time'>".@date("H:i:s")."</span>"." $I<div id='$Ch' class='hidden'><pre><code class='jush-$y'>".shorten_utf8($G,1000)."</code></pre>".($gi?" <span class='time'>($gi)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($Cd[$_GET["db"]])-1)).'">'.lang(10).'</a>':'').'</div>';}function
editRowPrint($Q,$p,$J,$Li){}function
editFunctions($o){global$sc;$I=($o["null"]?"NULL/":"");$Li=isset($_GET["select"])||where($_GET);foreach($sc
as$z=>$pd){if(!$z||(!isset($_GET["call"])&&$Li)){foreach($pd
as$cg=>$X){if(!$cg||preg_match("~$cg~",$o["type"]))$I.="/$X";}}if($z&&!preg_match('~set|blob|bytea|raw|file|bool~',$o["type"]))$I.="/SQL";}if($o["auto_increment"]&&!$Li)$I=lang(51);return
explode("/",$I);}function
editInput($Q,$o,$Ia,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ia value='-1' checked><i>".lang(8)."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ia value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ia,$o,$Y,0);return"";}function
editHint($Q,$o,$Y){return"";}function
processInput($o,$Y,$s=""){if($s=="SQL")return$Y;$D=$o["field"];$I=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$s))$I="$s()";elseif(preg_match('~^current_(date|timestamp)$~',$s))$I=$s;elseif(preg_match('~^([+-]|\|\|)$~',$s))$I=idf_escape($D)." $s $I";elseif(preg_match('~^[+-] interval$~',$s))$I=idf_escape($D)." $s ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+\$~i",$Y)?$Y:$I);elseif(preg_match('~^(addtime|subtime|concat)$~',$s))$I="$s(".idf_escape($D).", $I)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$s))$I="$s($I)";return
unconvert_field($o,$I);}function
dumpOutput(){$I=array('text'=>lang(65),'file'=>lang(66));if(function_exists('gzencode'))$I['gz']='gzip';return$I;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($Q,$Kh,$ee=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Kh)dump_csv(array_keys(fields($Q)));}else{if($ee==2){$p=array();foreach(fields($Q)as$D=>$o)$p[]=idf_escape($D)." $o[full_type]";$i="CREATE TABLE ".table($Q)." (".implode(", ",$p).")";}else$i=create_sql($Q,$_POST["auto_increment"],$Kh);set_utf8mb4($i);if($Kh&&$i){if($Kh=="DROP+CREATE"||$ee==1)echo"DROP ".($ee==2?"VIEW":"TABLE")." IF EXISTS ".table($Q).";\n";if($ee==1)$i=remove_definer($i);echo"$i;\n\n";}}}function
dumpData($Q,$Kh,$G){global$g,$y;$He=($y=="sqlite"?0:1048576);if($Kh){if($_POST["format"]=="sql"){if($Kh=="TRUNCATE+INSERT")echo
truncate_sql($Q).";\n";$p=fields($Q);}$H=$g->query($G,1);if($H){$Xd="";$Wa="";$je=array();$Mh="";$Wc=($Q!=''?'fetch_assoc':'fetch_row');while($J=$H->$Wc()){if(!$je){$Wi=array();foreach($J
as$X){$o=$H->fetch_field();$je[]=$o->name;$z=idf_escape($o->name);$Wi[]="$z = VALUES($z)";}$Mh=($Kh=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Wi):"").";\n";}if($_POST["format"]!="sql"){if($Kh=="table"){dump_csv($je);$Kh="INSERT";}dump_csv($J);}else{if(!$Xd)$Xd="INSERT INTO ".table($Q)." (".implode(", ",array_map('idf_escape',$je)).") VALUES";foreach($J
as$z=>$X){$o=$p[$z];$J[$z]=($X!==null?unconvert_field($o,preg_match(number_type(),$o["type"])&&!preg_match('~\[~',$o["full_type"])&&is_numeric($X)?$X:q(($X===false?0:$X))):"NULL");}$ah=($He?"\n":" ")."(".implode(",\t",$J).")";if(!$Wa)$Wa=$Xd.$ah;elseif(strlen($Wa)+4+strlen($ah)+strlen($Mh)<$He)$Wa.=",$ah";else{echo$Wa.$Mh;$Wa=$Xd.$ah;}}}if($Wa)echo$Wa.$Mh;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$g->error)."\n";}}function
dumpFilename($Hd){return
friendly_url($Hd!=""?$Hd:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($Hd,$Ve=false){$Mf=$_POST["output"];$Oc=(preg_match('~sql~',$_POST["format"])?"sql":($Ve?"tar":"csv"));header("Content-Type: ".($Mf=="gz"?"application/x-gzip":($Oc=="tar"?"application/x-tar":($Oc=="sql"||$Mf!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Mf=="gz")ob_start('ob_gzencode',1e6);return$Oc;}function
importServerPath(){return"adminer.sql";}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.lang(67)."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?lang(68):lang(69))."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.lang(70)."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".lang(71)."</a>\n":"");return
true;}function
navigation($Ue){global$ia,$y,$kc,$g;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download"',target_blank(),' id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Ue=="auth"){$Mf="";foreach((array)$_SESSION["pwds"]as$Yi=>$oh){foreach($oh
as$M=>$Ti){foreach($Ti
as$V=>$F){if($F!==null){$Wb=$_SESSION["db"][$Yi][$M][$V];foreach(($Wb?array_keys($Wb):array(""))as$l)$Mf.="<li><a href='".h(auth_url($Yi,$M,$V,$l))."'>($kc[$Yi]) ".h($V.($M!=""?"@".$this->serverName($M):"").($l!=""?" - $l":""))."</a>\n";}}}}if($Mf)echo"<ul id='logins'>\n$Mf</ul>\n".script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");}else{$S=array();if($_GET["ns"]!==""&&!$Ue&&DB!=""){$g->select_db(DB);$S=table_status('',true);}echo
script_src(preg_replace("~\\?.*~","",ME)."?file=jush.js&version=4.8.1");if(support("sql")){echo'<script',nonce(),'>
';if($S){$ze=array();foreach($S
as$Q=>$T)$ze[]=preg_quote($Q,'/');echo"var jushLinks = { $y: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$ze).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$y;\n";}$nh=$g->server_info;echo'bodyLoad(\'',(is_object($g)?preg_replace('~^(\d\.?\d).*~s','\1',$nh):""),'\'',(preg_match('~MariaDB~',$nh)?", true":""),');
</script>
';}$this->databasesPrint($Ue);if(DB==""||!$Ue){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".lang(64)."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".lang(72)."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".lang(73)."</a>\n";}if($_GET["ns"]!==""&&!$Ue&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".lang(74)."</a>\n";if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Ue){global$b,$g;$k=$this->databases();if(DB&&$k&&!in_array(DB,$k))array_unshift($k,DB);echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Ub=script("mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});");echo"<span title='".lang(75)."'>".lang(76)."</span>: ".($k?"<select name='db'>".optionlist(array(""=>"")+$k,DB)."</select>$Ub":"<input name='db' value='".h(DB)."' autocapitalize='off'>\n"),"<input type='submit' value='".lang(20)."'".($k?" class='hidden'":"").">\n";if(support("scheme")){if($Ue!="db"&&DB!=""&&$g->select_db(DB)){echo"<br>".lang(77).": <select name='ns'>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>$Ub";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}foreach(array("import","sql","schema","dump","privileges")as$X){if(isset($_GET[$X])){echo"<input type='hidden' name='$X' value=''>";break;}}echo"</p></form>\n";}function
tablesPrint($S){echo"<ul id='tables'>".script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($S
as$Q=>$O){$D=$this->tableName($O);if($D!=""){echo'<li><a href="'.h(ME).'select='.urlencode($Q).'"'.bold($_GET["select"]==$Q||$_GET["edit"]==$Q,"select")." title='".lang(41)."'>".lang(78)."</a> ",(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($Q).'"'.bold(in_array($Q,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($O)?"view":"structure"))." title='".lang(42)."'>$D</a>":"<span>$D</span>")."\n";}}echo"</ul>\n";}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);$kc=array("server"=>"MySQL")+$kc;if(!defined("DRIVER")){define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($M="",$V="",$F="",$j=null,$gg=null,$wh=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Fd,$gg)=explode(":",$M,2);$Eh=$b->connectSsl();if($Eh)$this->ssl_set($Eh['key'],$Eh['cert'],$Eh['ca'],'','');$I=@$this->real_connect(($M!=""?$Fd:ini_get("mysqli.default_host")),($M.$V!=""?$V:ini_get("mysqli.default_user")),($M.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$j,(is_numeric($gg)?$gg:ini_get("mysqli.default_port")),(!is_numeric($gg)?$gg:$wh),($Eh?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$I;}function
set_charset($ab){if(parent::set_charset($ab))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $ab");}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch_array();return$J[$o];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$F){if(ini_bool("mysql.allow_local_infile")){$this->error=lang(79,"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($M!=""?$M:ini_get("mysql.default_host")),("$M$V"!=""?$V:ini_get("mysql.default_user")),("$M$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($ab){if(function_exists('mysql_set_charset')){if(mysql_set_charset($ab,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $ab");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($G,$Ei=false){$H=@($Ei?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$H){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
mysql_result($H->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($M,$V,$F){global$b;$_f=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Eh=$b->connectSsl();if($Eh){if(!empty($Eh['key']))$_f[PDO::MYSQL_ATTR_SSL_KEY]=$Eh['key'];if(!empty($Eh['cert']))$_f[PDO::MYSQL_ATTR_SSL_CERT]=$Eh['cert'];if(!empty($Eh['ca']))$_f[PDO::MYSQL_ATTR_SSL_CA]=$Eh['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$F,$_f);return
true;}function
set_charset($ab){$this->query("SET NAMES $ab");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$Ei=false){$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,!$Ei);return
parent::query($G,$Ei);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$N){return($N?parent::insert($Q,$N):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$K,$ng){$e=array_keys(reset($K));$lg="INSERT INTO ".table($Q)." (".implode(", ",$e).") VALUES\n";$Wi=array();foreach($e
as$z)$Wi[$z]="$z = VALUES($z)";$Mh="\nON DUPLICATE KEY UPDATE ".implode(", ",$Wi);$Wi=array();$we=0;foreach($K
as$N){$Y="(".implode(", ",$N).")";if($Wi&&(strlen($lg)+$we+strlen($Y)+strlen($Mh)>1e6)){if(!queries($lg.implode(",\n",$Wi).$Mh))return
false;$Wi=array();$we=0;}$Wi[]=$Y;$we+=strlen($Y)+2;}return
queries($lg.implode(",\n",$Wi).$Mh);}function
slowQuery($G,$hi){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$hi FOR $G";elseif(preg_match('~^(SELECT\b)(.+)~is',$G,$C))return"$C[1] /*+ MAX_EXECUTION_TIME(".($hi*1000).") */ $C[2]";}}function
convertSearch($v,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($v USING ".charset($this->_conn).")":$v);}function
warnings(){$H=$this->_conn->query("SHOW WARNINGS");if($H&&$H->num_rows){ob_start();select($H);return
ob_get_clean();}}function
tableHelp($D){$Ce=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Ce?"information-schema-$D-table/":str_replace("_","-",$D)."-table.html"));if(DB=="mysql")return($Ce?"mysql$D-table/":"system-database.html");}}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
table($v){return
idf_escape($v);}function
connect(){global$b,$U,$Jh;$g=new
Min_DB;$Mb=$b->credentials();if($g->connect($Mb[0],$Mb[1],$Mb[2])){$g->set_charset(charset($g));$g->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$g)){$Jh[lang(25)][]="json";$U["json"]=4294967295;}return$g;}$I=$g->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($ah=iconv("windows-1250","utf-8",$I))>strlen($I))$I=$ah;return$I;}function
get_databases($fd){$I=get_session("dbs");if($I===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$I=($fd?slow_query($G):get_vals($G));restart_session();set_session("dbs",$I);stop_session();}return$I;}function
limit($G,$Z,$_,$kf=0,$kh=" "){return" $G$Z".($_!==null?$kh."LIMIT $_".($kf?" OFFSET $kf":""):"");}function
limit1($Q,$G,$Z,$kh="\n"){return
limit($G,$Z,1,0,$kh);}function
db_collation($l,$nb){global$g;$I=null;$i=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$i,$C))$I=$C[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$i,$C))$I=$nb[$C[1]][-1];return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(preg_match("~YES|DEFAULT~",$J["Support"]))$I[]=$J["Engine"];}return$I;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$I=array();foreach($k
as$l)$I[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$I;}function
table_status($D="",$Uc=false){$I=array();foreach(get_rows($Uc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($D!=""?"AND TABLE_NAME = ".q($D):"ORDER BY Name"):"SHOW TABLE STATUS".($D!=""?" LIKE ".q(addcslashes($D,"%_\\")):""))as$J){if($J["Engine"]=="InnoDB")$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$J["Comment"]);if(!isset($J["Engine"]))$J["Comment"]="";if($D!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&min_version(5.6));}function
fields($Q){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$J){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$J["Type"],$C);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$C[1],"length"=>$C[2],"unsigned"=>ltrim($C[3].$C[4]),"default"=>($J["Default"]!=""||preg_match("~char|set~",$C[1])?(preg_match('~text~',$C[1])?stripslashes(preg_replace("~^'(.*)'\$~",'\1',$J["Default"])):$J["Default"]):null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$J["Extra"],$C)?$C[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(preg_split('~, *~',$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$J["Extra"]),);}return$I;}function
indexes($Q,$h=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$h)as$J){$D=$J["Key_name"];$I[$D]["type"]=($D=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?($J["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$I[$D]["columns"][]=$J["Column_name"];$I[$D]["lengths"][]=($J["Index_type"]=="SPATIAL"?null:$J["Sub_part"]);$I[$D]["descs"][]=null;}return$I;}function
foreign_keys($Q){global$g,$sf;static$cg='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$I=array();$Kb=$g->result("SHOW CREATE TABLE ".table($Q),1);if($Kb){preg_match_all("~CONSTRAINT ($cg) FOREIGN KEY ?\\(((?:$cg,? ?)+)\\) REFERENCES ($cg)(?:\\.($cg))? \\(((?:$cg,? ?)+)\\)(?: ON DELETE ($sf))?(?: ON UPDATE ($sf))?~",$Kb,$Fe,PREG_SET_ORDER);foreach($Fe
as$C){preg_match_all("~$cg~",$C[2],$yh);preg_match_all("~$cg~",$C[5],$Zh);$I[idf_unescape($C[1])]=array("db"=>idf_unescape($C[4]!=""?$C[3]:$C[4]),"table"=>idf_unescape($C[4]!=""?$C[4]:$C[3]),"source"=>array_map('idf_unescape',$yh[0]),"target"=>array_map('idf_unescape',$Zh[0]),"on_delete"=>($C[6]?$C[6]:"RESTRICT"),"on_update"=>($C[7]?$C[7]:"RESTRICT"),);}}return$I;}function
view($D){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$g->result("SHOW CREATE VIEW ".table($D),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"])$I[$J["Charset"]][-1]=$J["Collation"];else$I[$J["Charset"]][]=$J["Collation"];}ksort($I);foreach($I
as$z=>$X)asort($I[$z]);return$I;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
create_database($l,$mb){return
queries("CREATE DATABASE ".idf_escape($l).($mb?" COLLATE ".q($mb):""));}function
drop_databases($k){$I=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$I;}function
rename_database($D,$mb){$I=false;if(create_database($D,$mb)){$S=array();$bj=array();foreach(tables_list()as$Q=>$T){if($T=='VIEW')$bj[]=$Q;else$S[]=$Q;}$I=(!$S&&!$bj)||move_tables($S,$bj,$D);drop_databases($I?array(DB):array());}return$I;}function
auto_increment(){$Ma=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$w){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$w["columns"],true)){$Ma="";break;}if($w["type"]=="PRIMARY")$Ma=" UNIQUE";}}return" AUTO_INCREMENT$Ma";}function
alter_table($Q,$D,$p,$hd,$tb,$_c,$mb,$La,$Wf){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$hd);$O=($tb!==null?" COMMENT=".q($tb):"").($_c?" ENGINE=".q($_c):"").($mb?" COLLATE ".q($mb):"").($La!=""?" AUTO_INCREMENT=$La":"");if($Q=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)$O$Wf");if($Q!=$D)$c[]="RENAME TO ".table($D);if($O)$c[]=ltrim($O);return($c||$Wf?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Wf):true);}function
alter_indexes($Q,$c){foreach($c
as$z=>$X)$c[$z]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($bj){return
queries("DROP VIEW ".implode(", ",array_map('table',$bj)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$bj,$Zh){global$g;$Mg=array();foreach($S
as$Q)$Mg[]=table($Q)." TO ".idf_escape($Zh).".".table($Q);if(!$Mg||queries("RENAME TABLE ".implode(", ",$Mg))){$bc=array();foreach($bj
as$Q)$bc[table($Q)]=view($Q);$g->select_db($Zh);$l=idf_escape(DB);foreach($bc
as$D=>$aj){if(!queries("CREATE VIEW $D AS ".str_replace(" $l."," ",$aj["select"]))||!queries("DROP VIEW $l.$D"))return
false;}return
true;}return
false;}function
copy_tables($S,$bj,$Zh){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$D=($Zh==DB?table("copy_$Q"):idf_escape($Zh).".".table($Q));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $D"))||!queries("CREATE TABLE $D LIKE ".table($Q))||!queries("INSERT INTO $D SELECT * FROM ".table($Q)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$J){$zi=$J["Trigger"];if(!queries("CREATE TRIGGER ".($Zh==DB?idf_escape("copy_$zi"):idf_escape($Zh).".".idf_escape($zi))." $J[Timing] $J[Event] ON $D FOR EACH ROW\n$J[Statement];"))return
false;}}foreach($bj
as$Q){$D=($Zh==DB?table("copy_$Q"):idf_escape($Zh).".".table($Q));$aj=view($Q);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $D"))||!queries("CREATE VIEW $D AS $aj[select]"))return
false;}return
true;}function
trigger($D){if($D=="")return
array();$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($D));return
reset($K);}function
triggers($Q){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$J)$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$T){global$g,$Bc,$Vd,$U;$Ca=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$zh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Di="((".implode("|",array_merge(array_keys($U),$Ca)).")\\b(?:\\s*\\(((?:[^'\")]|$Bc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$cg="$zh*(".($T=="FUNCTION"?"":$Vd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Di";$i=$g->result("SHOW CREATE $T ".idf_escape($D),2);preg_match("~\\(((?:$cg\\s*,?)*)\\)\\s*".($T=="FUNCTION"?"RETURNS\\s+$Di\\s+":"")."(.*)~is",$i,$C);$p=array();preg_match_all("~$cg\\s*,?~is",$C[1],$Fe,PREG_SET_ORDER);foreach($Fe
as$Qf)$p[]=array("field"=>str_replace("``","`",$Qf[2]).$Qf[3],"type"=>strtolower($Qf[5]),"length"=>preg_replace_callback("~$Bc~s",'normalize_enum',$Qf[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Qf[8] $Qf[7]"))),"null"=>1,"full_type"=>$Qf[4],"inout"=>strtoupper($Qf[1]),"collation"=>strtolower($Qf[9]),);if($T!="FUNCTION")return
array("fields"=>$p,"definition"=>$C[11]);return
array("fields"=>$p,"returns"=>array("type"=>$C[12],"length"=>$C[13],"unsigned"=>$C[15],"collation"=>$C[16]),"definition"=>$C[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($D,$J){return
idf_escape($D);}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$G){return$g->query("EXPLAIN ".(min_version(5.1)&&!min_version(5.7)?"PARTITIONS ":"").$G);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($ch,$h=null){return
true;}function
create_sql($Q,$La,$Kh){global$g;$I=$g->result("SHOW CREATE TABLE ".table($Q),1);if(!$La)$I=preg_replace('~ AUTO_INCREMENT=\d+~','',$I);return$I;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($Q){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$J)$I.="\nCREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$I){if(preg_match("~binary~",$o["type"]))$I="UNHEX($I)";if($o["type"]=="bit")$I="CONV($I, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$I=(min_version(8)?"ST_":"")."GeomFromText($I, SRID($o[field]))";return$I;}function
support($Vc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$Vc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$g;return$g->result("SELECT @@max_connections");}function
driver_config(){$U=array();$Jh=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(28)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(25)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(80)=>array("enum"=>65535,"set"=>64),lang(29)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(31)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$z=>$X){$U+=$X;$Jh[$z]=array_keys($X);}return
array('possible_drivers'=>array("MySQLi","MySQL","PDO_MySQL"),'jush'=>"sql",'types'=>$U,'structured_types'=>$Jh,'unsigned'=>array("unsigned","zerofill","unsigned zerofill"),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",)),);}}$xb=driver_config();$kg=$xb['possible_drivers'];$y=$xb['jush'];$U=$xb['types'];$Jh=$xb['structured_types'];$Ki=$xb['unsigned'];$xf=$xb['operators'];$pd=$xb['functions'];$vd=$xb['grouping'];$sc=$xb['edit_functions'];if($b->operators===null)$b->operators=$xf;define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~\?.*~','',relative_uri()).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.8.1";function
page_header($ji,$n="",$Va=array(),$ki=""){global$ca,$ia,$b,$kc,$y;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$li=$ji.($ki!=""?": $ki":"");$mi=strip_tags($li.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ca,'" dir="',lang(81),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$mi,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.8.1"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.8.1");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.1"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.1"),'">
';foreach($b->css()as$Ob){echo'<link rel="stylesheet" type="text/css" href="',h($Ob),'">
';}}echo'
<body class="',lang(81),' nojs">
';$q=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($q)&&filemtime($q)+86400>time()){$Zi=unserialize(file_get_contents($q));$wg="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Zi["version"],base64_decode($Zi["signature"]),$wg)==1)$_COOKIE["adminer_version"]=$Zi["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ia', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(82)),'\';
var thousandsSeparator = \'',js_escape(lang(5)),'\';
</script>

<div id="help" class="jush-',$y,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Va!==null){$A=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($A?$A:".").'">'.$kc[DRIVER].'</a> &raquo; ';$A=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$M=$b->serverName(SERVER);$M=($M!=""?$M:lang(34));if($Va===false)echo"$M\n";else{echo"<a href='".h($A)."' accesskey='1' title='Alt+Shift+1'>$M</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Va)))echo'<a href="'.h($A."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Va)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Va
as$z=>$X){$dc=(is_array($X)?$X[1]:h($X));if($dc!="")echo"<a href='".h(ME."$z=").urlencode(is_array($X)?$X[0]:$X)."'>$dc</a> &raquo; ";}}echo"$ji\n";}}echo"<h2>$li</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Nb){$Ad=array();foreach($Nb
as$z=>$X)$Ad[]="$z $X";header("Content-Security-Policy: ".implode("; ",$Ad));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$ef;if(!$ef)$ef=base64_encode(rand_string());return$ef;}function
page_messages($n){$Mi=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Re=$_SESSION["messages"][$Mi];if($Re){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Re)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Mi]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Ue=""){global$b,$qi;echo'</div>

';switch_lang();if($Ue!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(83),'" id="logout">
<input type="hidden" name="token" value="',$qi,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Ue);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Xe){while($Xe>=2147483648)$Xe-=4294967296;while($Xe<=-2147483649)$Xe+=4294967296;return(int)$Xe;}function
long2str($W,$dj){$ah='';foreach($W
as$X)$ah.=pack('V',$X);if($dj)return
substr($ah,0,end($W));return$ah;}function
str2long($ah,$dj){$W=array_values(unpack('V*',str_pad($ah,4*ceil(strlen($ah)/4),"\0")));if($dj)$W[]=strlen($ah);return$W;}function
xxtea_mx($pj,$oj,$Nh,$he){return
int32((($pj>>5&0x7FFFFFF)^$oj<<2)+(($oj>>3&0x1FFFFFFF)^$pj<<4))^int32(($Nh^$oj)+($he^$pj));}function
encrypt_string($Ih,$z){if($Ih=="")return"";$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($Ih,true);$Xe=count($W)-1;$pj=$W[$Xe];$oj=$W[0];$xg=floor(6+52/($Xe+1));$Nh=0;while($xg-->0){$Nh=int32($Nh+0x9E3779B9);$rc=$Nh>>2&3;for($Of=0;$Of<$Xe;$Of++){$oj=$W[$Of+1];$We=xxtea_mx($pj,$oj,$Nh,$z[$Of&3^$rc]);$pj=int32($W[$Of]+$We);$W[$Of]=$pj;}$oj=$W[0];$We=xxtea_mx($pj,$oj,$Nh,$z[$Of&3^$rc]);$pj=int32($W[$Xe]+$We);$W[$Xe]=$pj;}return
long2str($W,false);}function
decrypt_string($Ih,$z){if($Ih=="")return"";if(!$z)return
false;$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($Ih,false);$Xe=count($W)-1;$pj=$W[$Xe];$oj=$W[0];$xg=floor(6+52/($Xe+1));$Nh=int32($xg*0x9E3779B9);while($Nh){$rc=$Nh>>2&3;for($Of=$Xe;$Of>0;$Of--){$pj=$W[$Of-1];$We=xxtea_mx($pj,$oj,$Nh,$z[$Of&3^$rc]);$oj=int32($W[$Of]-$We);$W[$Of]=$oj;}$pj=$W[$Xe];$We=xxtea_mx($pj,$oj,$Nh,$z[$Of&3^$rc]);$oj=int32($W[0]-$We);$W[0]=$oj;$Nh=int32($Nh-0x9E3779B9);}return
long2str($W,true);}$g='';$_d=$_SESSION["token"];if(!$_d)$_SESSION["token"]=rand(1,1e6);$qi=get_token();$eg=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($z)=explode(":",$X);$eg[$z]=$X;}}function
add_invalid_login(){global$b;$nd=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$nd)return;$ae=unserialize(stream_get_contents($nd));$gi=time();if($ae){foreach($ae
as$be=>$X){if($X[0]<$gi)unset($ae[$be]);}}$Zd=&$ae[$b->bruteForceKey()];if(!$Zd)$Zd=array($gi+30*60,0);$Zd[1]++;file_write_unlock($nd,serialize($ae));}function
check_invalid_login(){global$b;$ae=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Zd=($ae?$ae[$b->bruteForceKey()]:array());$df=($Zd[1]>29?$Zd[0]-time():0);if($df>0)auth_error(lang(84,ceil($df/60)));}$Ja=$_POST["auth"];if($Ja){session_regenerate_id();$Yi=$Ja["driver"];$M=$Ja["server"];$V=$Ja["username"];$F=(string)$Ja["password"];$l=$Ja["db"];set_password($Yi,$M,$V,$F);$_SESSION["db"][$Yi][$M][$V][$l]=true;if($Ja["permanent"]){$z=base64_encode($Yi)."-".base64_encode($M)."-".base64_encode($V)."-".base64_encode($l);$qg=$b->permanentLogin(true);$eg[$z]="$z:".base64_encode($qg?encrypt_string($F,$qg):"");cookie("adminer_permanent",implode(" ",$eg));}if(count($_POST)==1||DRIVER!=$Yi||SERVER!=$M||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Yi,$M,$V,$l));}elseif($_POST["logout"]&&(!$_d||verify_token())){foreach(array("pwds","db","dbs","queries")as$z)set_session($z,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(85).' '.lang(86));}elseif($eg&&!$_SESSION["pwds"]){session_regenerate_id();$qg=$b->permanentLogin();foreach($eg
as$z=>$X){list(,$gb)=explode(":",$X);list($Yi,$M,$V,$l)=array_map('base64_decode',explode("-",$z));set_password($Yi,$M,$V,decrypt_string(base64_decode($gb),$qg));$_SESSION["db"][$Yi][$M][$V][$l]=true;}}function
unset_permanent(){global$eg;foreach($eg
as$z=>$X){list($Yi,$M,$V,$l)=array_map('base64_decode',explode("-",$z));if($Yi==DRIVER&&$M==SERVER&&$V==$_GET["username"]&&$l==DB)unset($eg[$z]);}cookie("adminer_permanent",implode(" ",$eg));}function
auth_error($n){global$b,$_d;$ph=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$ph]||$_GET[$ph])&&!$_d)$n=lang(87);else{restart_session();add_invalid_login();$F=get_password();if($F!==null){if($F===false)$n.=($n?'<br>':'').lang(88,target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$ph]&&$_GET[$ph]&&ini_bool("session.use_only_cookies"))$n=lang(89);$Rf=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Rf["lifetime"]);page_header(lang(38),$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".lang(90)."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(91),lang(92,implode(", ",$kg)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Fd,$gg)=explode(":",SERVER,2);if(preg_match('~^\s*([-+]?\d+)~',$gg,$C)&&($C[1]<1024||$C[1]>65535))auth_error(lang(93));check_invalid_login();$g=connect();$m=new
Min_Driver($g);}$_e=null;if(!is_object($g)||($_e=$b->login($_GET["username"],get_password()))!==true){$n=(is_string($g)?h($g):(is_string($_e)?$_e:lang(32)));auth_error($n.(preg_match('~^ | $~',get_password())?'<br>'.lang(94):''));}if($_POST["logout"]&&$_d&&!verify_token()){page_header(lang(83),lang(95));page_footer("db");exit;}if($Ja&&$_POST["token"])$_POST["token"]=$qi;$n='';if($_POST){if(!verify_token()){$Ud="max_input_vars";$Le=ini_get($Ud);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$z){$X=ini_get($z);if($X&&(!$Le||$X<$Le)){$Ud=$z;$Le=$X;}}}$n=(!$_POST["token"]&&$Le?lang(96,"'$Ud'"):lang(95).' '.lang(97));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=lang(98,"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.lang(99);}function
select($H,$h=null,$Ef=array(),$_=0){global$y;$ze=array();$x=array();$e=array();$Ta=array();$U=array();$I=array();odd('');for($t=0;(!$_||$t<$_)&&($J=$H->fetch_row());$t++){if(!$t){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($ge=0;$ge<count($J);$ge++){$o=$H->fetch_field();$D=$o->name;$Df=$o->orgtable;$Cf=$o->orgname;$I[$o->table]=$Df;if($Ef&&$y=="sql")$ze[$ge]=($D=="table"?"table=":($D=="possible_keys"?"indexes=":null));elseif($Df!=""){if(!isset($x[$Df])){$x[$Df]=array();foreach(indexes($Df,$h)as$w){if($w["type"]=="PRIMARY"){$x[$Df]=array_flip($w["columns"]);break;}}$e[$Df]=$x[$Df];}if(isset($e[$Df][$Cf])){unset($e[$Df][$Cf]);$x[$Df][$Cf]=$ge;$ze[$ge]=$Df;}}if($o->charsetnr==63)$Ta[$ge]=true;$U[$ge]=$o->type;echo"<th".($Df!=""||$o->name!=$Cf?" title='".h(($Df!=""?"$Df.":"").$Cf)."'":"").">".h($D).($Ef?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($D),'mariadb'=>"explain/#the-columns-in-explain-select",)):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($J
as$z=>$X){$A="";if(isset($ze[$z])&&!$e[$ze[$z]]){if($Ef&&$y=="sql"){$Q=$J[array_search("table=",$ze)];$A=ME.$ze[$z].urlencode($Ef[$Q]!=""?$Ef[$Q]:$Q);}else{$A=ME."edit=".urlencode($ze[$z]);foreach($x[$ze[$z]]as$kb=>$ge)$A.="&where".urlencode("[".bracket_escape($kb)."]")."=".urlencode($J[$ge]);}}elseif(is_url($X))$A=$X;if($X===null)$X="<i>NULL</i>";elseif($Ta[$z]&&!is_utf8($X))$X="<i>".lang(47,strlen($X))."</i>";else{$X=h($X);if($U[$z]==254)$X="<code>$X</code>";}if($A)$X="<a href='".h($A)."'".(is_url($A)?target_blank():'').">$X</a>";echo"<td>$X";}}echo($t?"</table>\n</div>":"<p class='message'>".lang(12))."\n";return$I;}function
referencable_primary($ih){$I=array();foreach(table_status('',true)as$Rh=>$Q){if($Rh!=$ih&&fk_support($Q)){foreach(fields($Rh)as$o){if($o["primary"]){if($I[$Rh]){unset($I[$Rh]);break;}$I[$Rh]=$o;}}}}return$I;}function
adminer_settings(){parse_str($_COOKIE["adminer_settings"],$rh);return$rh;}function
adminer_setting($z){$rh=adminer_settings();return$rh[$z];}function
set_adminer_settings($rh){return
cookie("adminer_settings",http_build_query($rh+adminer_settings()));}function
textarea($D,$Y,$K=10,$pb=80){global$y;echo"<textarea name='$D' rows='$K' cols='$pb' class='sqlarea jush-$y' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($z,$o,$nb,$jd=array(),$Rc=array()){global$Jh,$U,$Ki,$sf;$T=$o["type"];echo'<td><select name="',h($z),'[type]" class="type" aria-labelledby="label-type">';if($T&&!isset($U[$T])&&!isset($jd[$T])&&!in_array($T,$Rc))$Rc[]=$T;if($jd)$Jh[lang(100)]=$jd;echo
optionlist(array_merge($Rc,$Jh),$T),'</select><td><input name="',h($z),'[length]" value="',h($o["length"]),'" size="3"',(!$o["length"]&&preg_match('~var(char|binary)$~',$T)?" class='required'":"");echo' aria-labelledby="label-length"><td class="options">',"<select name='".h($z)."[collation]'".(preg_match('~(char|text|enum|set)$~',$T)?"":" class='hidden'").'><option value="">('.lang(101).')'.optionlist($nb,$o["collation"]).'</select>',($Ki?"<select name='".h($z)."[unsigned]'".(!$T||preg_match(number_type(),$T)?"":" class='hidden'").'><option>'.optionlist($Ki,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($z)."[on_update]'".(preg_match('~timestamp|datetime~',$T)?"":" class='hidden'").'>'.optionlist(array(""=>"(".lang(102).")","CURRENT_TIMESTAMP"),(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"CURRENT_TIMESTAMP":$o["on_update"])).'</select>':''),($jd?"<select name='".h($z)."[on_delete]'".(preg_match("~`~",$T)?"":" class='hidden'")."><option value=''>(".lang(103).")".optionlist(explode("|",$sf),$o["on_delete"])."</select> ":" ");}function
process_length($we){global$Bc;return(preg_match("~^\\s*\\(?\\s*$Bc(?:\\s*,\\s*$Bc)*+\\s*\\)?\\s*\$~",$we)&&preg_match_all("~$Bc~",$we,$Fe)?"(".implode(",",$Fe[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$we)));}function
process_type($o,$lb="COLLATE"){global$Ki;return" $o[type]".process_length($o["length"]).(preg_match(number_type(),$o["type"])&&in_array($o["unsigned"],$Ki)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $lb ".q($o["collation"]):"");}function
process_field($o,$Ci){return
array(idf_escape(trim($o["field"])),process_type($Ci),($o["null"]?" NULL":" NOT NULL"),default_value($o),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
default_value($o){$Yb=$o["default"];return($Yb===null?"":" DEFAULT ".(preg_match('~char|binary|text|enum|set~',$o["type"])||preg_match('~^(?![a-z])~i',$Yb)?q($Yb):$Yb));}function
type_class($T){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$z=>$X){if(preg_match("~$z|$X~",$T))return" class='$z'";}}function
edit_fields($p,$nb,$T="TABLE",$jd=array()){global$Vd;$p=array_values($p);$Zb=(($_POST?$_POST["defaults"]:adminer_setting("defaults"))?"":" class='hidden'");$ub=(($_POST?$_POST["comments"]:adminer_setting("comments"))?"":" class='hidden'");echo'<thead><tr>
';if($T=="PROCEDURE"){echo'<td>';}echo'<th id="label-name">',($T=="TABLE"?lang(104):lang(105)),'<td id="label-type">',lang(49),'<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;"></textarea>',script("qs('#enum-edit').onblur = editingLengthBlur;"),'<td id="label-length">',lang(106),'<td>',lang(107);if($T=="TABLE"){echo'<td id="label-null">NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym id="label-ai" title="',lang(51),'">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'mariadb'=>"auto_increment/",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td id="label-default"',$Zb,'>',lang(52),(support("comment")?"<td id='label-comment'$ub>".lang(50):"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.1")."' alt='+' title='".lang(108)."'>".script("row_count = ".count($p).";"),'</thead>
<tbody>
',script("mixin(qsl('tbody'), {onclick: editingClick, onkeydown: editingKeydown, oninput: editingInput});");foreach($p
as$t=>$o){$t++;$Ff=$o[($_POST?"orig":"field")];$hc=(isset($_POST["add"][$t-1])||(isset($o["field"])&&!$_POST["drop_col"][$t]))&&(support("drop_col")||$Ff=="");echo'<tr',($hc?"":" style='display: none;'"),'>
',($T=="PROCEDURE"?"<td>".html_select("fields[$t][inout]",explode("|",$Vd),$o["inout"]):""),'<th>';if($hc){echo'<input name="fields[',$t,'][field]" value="',h($o["field"]),'" data-maxlength="64" autocapitalize="off" aria-labelledby="label-name">';}echo'<input type="hidden" name="fields[',$t,'][orig]" value="',h($Ff),'">';edit_type("fields[$t]",$o,$nb,$jd);if($T=="TABLE"){echo'<td>',checkbox("fields[$t][null]",1,$o["null"],"","","block","label-null"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$t,'"';if($o["auto_increment"]){echo' checked';}echo' aria-labelledby="label-ai"></label><td',$Zb,'>',checkbox("fields[$t][has_default]",1,$o["has_default"],"","","","label-default"),'<input name="fields[',$t,'][default]" value="',h($o["default"]),'" aria-labelledby="label-default">',(support("comment")?"<td$ub><input name='fields[$t][comment]' value='".h($o["comment"])."' data-maxlength='".(min_version(5.5)?1024:255)."' aria-labelledby='label-comment'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.1")."' alt='+' title='".lang(108)."'> "."<input type='image' class='icon' name='up[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=up.gif&version=4.8.1")."' alt='â†‘' title='".lang(109)."'> "."<input type='image' class='icon' name='down[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=down.gif&version=4.8.1")."' alt='â†“' title='".lang(110)."'> ":""),($Ff==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.8.1")."' alt='x' title='".lang(111)."'>":"");}}function
process_fields(&$p){$kf=0;if($_POST["up"]){$qe=0;foreach($p
as$z=>$o){if(key($_POST["up"])==$z){unset($p[$z]);array_splice($p,$qe,0,array($o));break;}if(isset($o["field"]))$qe=$kf;$kf++;}}elseif($_POST["down"]){$ld=false;foreach($p
as$z=>$o){if(isset($o["field"])&&$ld){unset($p[key($_POST["down"])]);array_splice($p,$kf,0,array($ld));break;}if(key($_POST["down"])==$z)$ld=$o;$kf++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($C){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($C[0][0].$C[0][0],$C[0][0],substr($C[0],1,-1))),'\\'))."'";}function
grant($qd,$sg,$e,$rf){if(!$sg)return
true;if($sg==array("ALL PRIVILEGES","GRANT OPTION"))return($qd=="GRANT"?queries("$qd ALL PRIVILEGES$rf WITH GRANT OPTION"):queries("$qd ALL PRIVILEGES$rf")&&queries("$qd GRANT OPTION$rf"));return
queries("$qd ".preg_replace('~(GRANT OPTION)\([^)]*\)~','\1',implode("$e, ",$sg).$e).$rf);}function
drop_create($lc,$i,$mc,$di,$oc,$B,$Qe,$Oe,$Pe,$of,$bf){if($_POST["drop"])query_redirect($lc,$B,$Qe);elseif($of=="")query_redirect($i,$B,$Pe);elseif($of!=$bf){$Lb=queries($i);queries_redirect($B,$Oe,$Lb&&queries($lc));if($Lb)queries($mc);}else
queries_redirect($B,$Oe,queries($di)&&queries($oc)&&queries($lc)&&queries($i));}function
create_trigger($rf,$J){global$y;$ii=" $J[Timing] $J[Event]".(preg_match('~ OF~',$J["Event"])?" $J[Of]":"");return"CREATE TRIGGER ".idf_escape($J["Trigger"]).($y=="mssql"?$rf.$ii:$ii.$rf).rtrim(" $J[Type]\n$J[Statement]",";").";";}function
create_routine($Wg,$J){global$Vd,$y;$N=array();$p=(array)$J["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$N[]=(preg_match("~^($Vd)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}$ac=rtrim("\n$J[definition]",";");return"CREATE $Wg ".idf_escape(trim($J["name"]))." (".implode(", ",$N).")".(isset($_GET["function"])?" RETURNS".process_type($J["returns"],"CHARACTER SET"):"").($J["language"]?" LANGUAGE $J[language]":"").($y=="pgsql"?" AS ".q($ac):"$ac;");}function
remove_definer($G){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\1)',logged_user()).'`~','\1',$G);}function
format_foreign_key($r){global$sf;$l=$r["db"];$ff=$r["ns"];return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$r["source"])).") REFERENCES ".($l!=""&&$l!=$_GET["db"]?idf_escape($l).".":"").($ff!=""&&$ff!=$_GET["ns"]?idf_escape($ff).".":"").table($r["table"])." (".implode(", ",array_map('idf_escape',$r["target"])).")".(preg_match("~^($sf)\$~",$r["on_delete"])?" ON DELETE $r[on_delete]":"").(preg_match("~^($sf)\$~",$r["on_update"])?" ON UPDATE $r[on_update]":"");}function
tar_file($q,$ni){$I=pack("a100a8a8a8a12a12",$q,644,0,0,decoct($ni->size),decoct(time()));$fb=8*32;for($t=0;$t<strlen($I);$t++)$fb+=ord($I[$t]);$I.=sprintf("%06o",$fb)."\0 ";echo$I,str_repeat("\0",512-strlen($I));$ni->send();echo
str_repeat("\0",511-($ni->size+511)%512);}function
ini_bytes($Ud){$X=ini_get($Ud);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($bg,$ei="<sup>?</sup>"){global$y,$g;$nh=$g->server_info;$Zi=preg_replace('~^(\d\.?\d).*~s','\1',$nh);$Oi=array('sql'=>"https://dev.mysql.com/doc/refman/$Zi/en/",'sqlite'=>"https://www.sqlite.org/",'pgsql'=>"https://www.postgresql.org/docs/$Zi/",'mssql'=>"https://msdn.microsoft.com/library/",'oracle'=>"https://www.oracle.com/pls/topic/lookup?ctx=db".preg_replace('~^.* (\d+)\.(\d+)\.\d+\.\d+\.\d+.*~s','\1\2',$nh)."&id=",);if(preg_match('~MariaDB~',$nh)){$Oi['sql']="https://mariadb.com/kb/en/library/";$bg['sql']=(isset($bg['mariadb'])?$bg['mariadb']:str_replace(".html","/",$bg['sql']));}return($bg[$y]?"<a href='".h($Oi[$y].$bg[$y])."'".target_blank().">$ei</a>":"");}function
ob_gzencode($P){return
gzencode($P);}function
db_size($l){global$g;if(!$g->select_db($l))return"?";$I=0;foreach(table_status()as$R)$I+=$R["Data_length"]+$R["Index_length"];return
format_number($I);}function
set_utf8mb4($i){global$g;static$N=false;if(!$N&&preg_match('~\butf8mb4~i',$i)){$N=true;echo"SET NAMES ".charset($g).";\n\n";}}function
connect_error(){global$b,$g,$qi,$n,$kc;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header(lang(37).": ".h(DB),lang(112),true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),lang(113),drop_databases($_POST["db"]));page_header(lang(114),$n,false);echo"<p class='links'>\n";foreach(array('database'=>lang(115),'privileges'=>lang(71),'processlist'=>lang(116),'variables'=>lang(117),'status'=>lang(118),)as$z=>$X){if(support($z))echo"<a href='".h(ME)."$z='>$X</a>\n";}echo"<p>".lang(119,$kc[DRIVER],"<b>".h($g->server_info)."</b>","<b>$g->extension</b>")."\n","<p>".lang(120,"<b>".h(logged_user())."</b>")."\n";$k=$b->databases();if($k){$dh=support("scheme");$nb=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),"<thead><tr>".(support("database")?"<td>":"")."<th>".lang(37)." - <a href='".h(ME)."refresh=1'>".lang(121)."</a>"."<td>".lang(122)."<td>".lang(123)."<td>".lang(124)." - <a href='".h(ME)."dbsize=1'>".lang(125)."</a>".script("qsl('a').onclick = partial(ajaxSetHtml, '".js_escape(ME)."script=connect');","")."</thead>\n";$k=($_GET["dbsize"]?count_tables($k):array_flip($k));foreach($k
as$l=>$S){$Vg=h(ME)."db=".urlencode($l);$u=h("Db-".$l);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$l,in_array($l,(array)$_POST["db"]),"","","",$u):""),"<th><a href='$Vg' id='$u'>".h($l)."</a>";$mb=h(db_collation($l,$nb));echo"<td>".(support("database")?"<a href='$Vg".($dh?"&amp;ns=":"")."&amp;database=' title='".lang(67)."'>$mb</a>":$mb),"<td align='right'><a href='$Vg&amp;schema=' id='tables-".h($l)."' title='".lang(70)."'>".($_GET["dbsize"]?$S:"?")."</a>","<td align='right' id='size-".h($l)."'>".($_GET["dbsize"]?db_size($l):"?"),"\n";}echo"</table>\n",(support("database")?"<div class='footer'><div>\n"."<fieldset><legend>".lang(126)." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value=''>".script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };")."<input type='submit' name='drop' value='".lang(127)."'>".confirm()."\n"."</div></fieldset>\n"."</div></div>\n":""),"<input type='hidden' name='token' value='$qi'>\n","</form>\n",script("tableCheck();");}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")){if(DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header(lang(77).": ".h($_GET["ns"]),lang(128),true);page_footer("ns");exit;}}}$sf="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($Eb){$this->size+=strlen($Eb);fwrite($this->handler,$Eb);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$Bc="'(?:''|[^'\\\\]|\\\\.)*'";$Vd="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$L=array(idf_escape($_GET["field"]));$H=$m->select($a,$L,array(where($_GET,$p)),$L);$J=($H?$H->fetch_row():array());echo$m->value($J[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$R=table_status1($a,true);$D=$b->tableName($R);page_header(($p&&is_view($R)?$R['Engine']=='materialized view'?lang(129):lang(130):lang(131)).": ".($D!=""?$D:h($a)),$n);$b->selectLinks($R);$tb=$R["Comment"];if($tb!="")echo"<p class='nowrap'>".lang(50).": ".h($tb)."\n";if($p)$b->tableStructurePrint($p);if(!is_view($R)){if(support("indexes")){echo"<h3 id='indexes'>".lang(132)."</h3>\n";$x=indexes($a);if($x)$b->tableIndexesPrint($x);echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.lang(133)."</a>\n";}if(fk_support($R)){echo"<h3 id='foreign-keys'>".lang(100)."</h3>\n";$jd=foreign_keys($a);if($jd){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(134)."<td>".lang(135)."<td>".lang(103)."<td>".lang(102)."<td></thead>\n";foreach($jd
as$D=>$r){echo"<tr title='".h($D)."'>","<th><i>".implode("</i>, <i>",array_map('h',$r["source"]))."</i>","<td><a href='".h($r["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($r["db"]),ME):($r["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($r["ns"]),ME):ME))."table=".urlencode($r["table"])."'>".($r["db"]!=""?"<b>".h($r["db"])."</b>.":"").($r["ns"]!=""?"<b>".h($r["ns"])."</b>.":"").h($r["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$r["target"]))."</i>)","<td>".h($r["on_delete"])."\n","<td>".h($r["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($D)).'">'.lang(136).'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.lang(137)."</a>\n";}}if(support(is_view($R)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".lang(138)."</h3>\n";$Bi=triggers($a);if($Bi){echo"<table cellspacing='0'>\n";foreach($Bi
as$z=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($z)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($z))."'>".lang(136)."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.lang(139)."</a>\n";}}elseif(isset($_GET["schema"])){page_header(lang(70),"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Th=array();$Uh=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$Fe,PREG_SET_ORDER);foreach($Fe
as$t=>$C){$Th[$C[1]]=array($C[2],$C[3]);$Uh[]="\n\t'".js_escape($C[1])."': [ $C[2], $C[3] ]";}$ri=0;$Qa=-1;$ch=array();$Hg=array();$ue=array();foreach(table_status('',true)as$Q=>$R){if(is_view($R))continue;$hg=0;$ch[$Q]["fields"]=array();foreach(fields($Q)as$D=>$o){$hg+=1.25;$o["pos"]=$hg;$ch[$Q]["fields"][$D]=$o;}$ch[$Q]["pos"]=($Th[$Q]?$Th[$Q]:array($ri,0));foreach($b->foreignKeys($Q)as$X){if(!$X["db"]){$se=$Qa;if($Th[$Q][1]||$Th[$X["table"]][1])$se=min(floatval($Th[$Q][1]),floatval($Th[$X["table"]][1]))-1;else$Qa-=.1;while($ue[(string)$se])$se-=.0001;$ch[$Q]["references"][$X["table"]][(string)$se]=array($X["source"],$X["target"]);$Hg[$X["table"]][$Q][(string)$se]=$X["target"];$ue[(string)$se]=true;}}$ri=max($ri,$ch[$Q]["pos"][0]+2.5+$hg);}echo'<div id="schema" style="height: ',$ri,'em;">
<script',nonce(),'>
qs(\'#schema\').onselectstart = function () { return false; };
var tablePos = {',implode(",",$Uh)."\n",'};
var em = qs(\'#schema\').offsetHeight / ',$ri,';
document.onmousemove = schemaMousemove;
document.onmouseup = partialArg(schemaMouseup, \'',js_escape(DB),'\');
</script>
';foreach($ch
as$D=>$Q){echo"<div class='table' style='top: ".$Q["pos"][0]."em; left: ".$Q["pos"][1]."em;'>",'<a href="'.h(ME).'table='.urlencode($D).'"><b>'.h($D)."</b></a>",script("qsl('div').onmousedown = schemaMousedown;");foreach($Q["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$Q["references"]as$ai=>$Ig){foreach($Ig
as$se=>$Eg){$te=$se-$Th[$D][1];$t=0;foreach($Eg[0]as$yh)echo"\n<div class='references' title='".h($ai)."' id='refs$se-".($t++)."' style='left: $te"."em; top: ".$Q["fields"][$yh]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$te)."em;'></div></div>";}}foreach((array)$Hg[$D]as$ai=>$Ig){foreach($Ig
as$se=>$e){$te=$se-$Th[$D][1];$t=0;foreach($e
as$Zh)echo"\n<div class='references' title='".h($ai)."' id='refd$se-".($t++)."' style='left: $te"."em; top: ".$Q["fields"][$Zh]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME)."?file=arrow.gif) no-repeat right center;&version=4.8.1")."'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$te)."em;'></div></div>";}}echo"\n</div>\n";}foreach($ch
as$D=>$Q){foreach((array)$Q["references"]as$ai=>$Ig){foreach($Ig
as$se=>$Eg){$Te=$ri;$Je=-10;foreach($Eg[0]as$z=>$yh){$ig=$Q["pos"][0]+$Q["fields"][$yh]["pos"];$jg=$ch[$ai]["pos"][0]+$ch[$ai]["fields"][$Eg[1][$z]]["pos"];$Te=min($Te,$ig,$jg);$Je=max($Je,$ig,$jg);}echo"<div class='references' id='refl$se' style='left: $se"."em; top: $Te"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Je-$Te)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">',lang(140),'</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$Hb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$z)$Hb.="&$z=".urlencode($_POST[$z]);cookie("adminer_export",substr($Hb,1));$S=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Oc=dump_headers((count($S)==1?key($S):DB),(DB==""||count($S)>1));$de=preg_match('~sql~',$_POST["format"]);if($de){echo"-- Adminer $ia ".$kc[DRIVER]." ".str_replace("\n"," ",$g->server_info)." dump\n\n";if($y=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
".($_POST["data_style"]?"SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$g->query("SET time_zone = '+00:00'");$g->query("SET sql_mode = ''");}}$Kh=$_POST["db_style"];$k=array(DB);if(DB==""){$k=$_POST["databases"];if(is_string($k))$k=explode("\n",rtrim(str_replace("\r","",$k),"\n"));}foreach((array)$k
as$l){$b->dumpDatabase($l);if($g->select_db($l)){if($de&&preg_match('~CREATE~',$Kh)&&($i=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1))){set_utf8mb4($i);if($Kh=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($l).";\n";echo"$i;\n";}if($de){if($Kh)echo
use_sql($l).";\n\n";$Lf="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Wg){foreach(get_rows("SHOW $Wg STATUS WHERE Db = ".q($l),null,"-- ")as$J){$i=remove_definer($g->result("SHOW CREATE $Wg ".idf_escape($J["Name"]),2));set_utf8mb4($i);$Lf.=($Kh!='DROP+CREATE'?"DROP $Wg IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$i;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$J){$i=remove_definer($g->result("SHOW CREATE EVENT ".idf_escape($J["Name"]),3));set_utf8mb4($i);$Lf.=($Kh!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$i;;\n\n";}}if($Lf)echo"DELIMITER ;;\n\n$Lf"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$bj=array();foreach(table_status('',true)as$D=>$R){$Q=(DB==""||in_array($D,(array)$_POST["tables"]));$Rb=(DB==""||in_array($D,(array)$_POST["data"]));if($Q||$Rb){if($Oc=="tar"){$ni=new
TmpFile;ob_start(array($ni,'write'),1e5);}$b->dumpTable($D,($Q?$_POST["table_style"]:""),(is_view($R)?2:0));if(is_view($R))$bj[]=$D;elseif($Rb){$p=fields($D);$b->dumpData($D,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($D));}if($de&&$_POST["triggers"]&&$Q&&($Bi=trigger_sql($D)))echo"\nDELIMITER ;;\n$Bi\nDELIMITER ;\n";if($Oc=="tar"){ob_end_flush();tar_file((DB!=""?"":"$l/")."$D.csv",$ni);}elseif($de)echo"\n";}}if(function_exists('foreign_keys_sql')){foreach(table_status('',true)as$D=>$R){$Q=(DB==""||in_array($D,(array)$_POST["tables"]));if($Q&&!is_view($R))echo
foreign_keys_sql($D);}}foreach($bj
as$aj)$b->dumpTable($aj,$_POST["table_style"],1);if($Oc=="tar")echo
pack("x512");}}}if($de)echo"-- ".$g->result("SELECT NOW()")."\n";exit;}page_header(lang(73),$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
';$Vb=array('','USE','DROP+CREATE','CREATE');$Vh=array('','DROP+CREATE','CREATE');$Sb=array('','TRUNCATE+INSERT','INSERT');if($y=="sql")$Sb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$J);if(!$J)$J=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($J["events"])){$J["routines"]=$J["events"]=($_GET["dump"]=="");$J["triggers"]=$J["table_style"];}echo"<tr><th>".lang(141)."<td>".html_select("output",$b->dumpOutput(),$J["output"],0)."\n";echo"<tr><th>".lang(142)."<td>".html_select("format",$b->dumpFormat(),$J["format"],0)."\n";echo($y=="sqlite"?"":"<tr><th>".lang(37)."<td>".html_select('db_style',$Vb,$J["db_style"]).(support("routine")?checkbox("routines",1,$J["routines"],lang(143)):"").(support("event")?checkbox("events",1,$J["events"],lang(144)):"")),"<tr><th>".lang(123)."<td>".html_select('table_style',$Vh,$J["table_style"]).checkbox("auto_increment",1,$J["auto_increment"],lang(51)).(support("trigger")?checkbox("triggers",1,$J["triggers"],lang(138)):""),"<tr><th>".lang(145)."<td>".html_select('data_style',$Sb,$J["data_style"]),'</table>
<p><input type="submit" value="',lang(73),'">
<input type="hidden" name="token" value="',$qi,'">

<table cellspacing="0">
',script("qsl('table').onclick = dumpClick;");$mg=array();if(DB!=""){$db=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$db>".lang(123)."</label>".script("qs('#check-tables').onclick = partial(formCheck, /^tables\\[/);",""),"<th style='text-align: right;'><label class='block'>".lang(145)."<input type='checkbox' id='check-data'$db></label>".script("qs('#check-data').onclick = partial(formCheck, /^data\\[/);",""),"</thead>\n";$bj="";$Wh=tables_list();foreach($Wh
as$D=>$T){$lg=preg_replace('~_.*~','',$D);$db=($a==""||$a==(substr($a,-1)=="%"?"$lg%":$D));$pg="<tr><td>".checkbox("tables[]",$D,$db,$D,"","block");if($T!==null&&!preg_match('~table~i',$T))$bj.="$pg\n";else
echo"$pg<td align='right'><label class='block'><span id='Rows-".h($D)."'></span>".checkbox("data[]",$D,$db)."</label>\n";$mg[$lg]++;}echo$bj;if($Wh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}else{echo"<thead><tr><th style='text-align: left;'>","<label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"").">".lang(37)."</label>",script("qs('#check-databases').onclick = partial(formCheck, /^databases\\[/);",""),"</thead>\n";$k=$b->databases();if($k){foreach($k
as$l){if(!information_schema($l)){$lg=preg_replace('~_.*~','',$l);echo"<tr><td>".checkbox("databases[]",$l,$a==""||$a=="$lg%",$l,"","block")."\n";$mg[$lg]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$bd=true;foreach($mg
as$z=>$X){if($z!=""&&$X>1){echo($bd?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$z%")."'>".h($z)."</a>";$bd=false;}}}elseif(isset($_GET["privileges"])){page_header(lang(71));echo'<p class="links"><a href="'.h(ME).'user=">'.lang(146)."</a>";$H=$g->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$qd=$H;if(!$H)$H=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($qd?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".lang(35)."<th>".lang(34)."<th></thead>\n";while($J=$H->fetch_assoc())echo'<tr'.odd().'><td>'.h($J["User"])."<td>".h($J["Host"]).'<td><a href="'.h(ME.'user='.urlencode($J["User"]).'&host='.urlencode($J["Host"])).'">'.lang(10)."</a>\n";if(!$qd||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".lang(10)."'>\n";echo"</table>\n","</form>\n";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$Dd=&get_session("queries");$Cd=&$Dd[DB];if(!$n&&$_POST["clear"]){$Cd=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?lang(72):lang(64)),$n);if(!$n&&$_POST){$nd=false;if(!isset($_GET["import"]))$G=$_POST["query"];elseif($_POST["webfile"]){$Bh=$b->importServerPath();$nd=@fopen((file_exists($Bh)?$Bh:"compress.zlib://$Bh.gz"),"rb");$G=($nd?fread($nd,1e6):false);}else$G=get_file("sql_file",true);if(is_string($G)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($G)+memory_get_usage()+8e6));if($G!=""&&strlen($G)<1e6){$xg=$G.(preg_match("~;[ \t\r\n]*\$~",$G)?"":";");if(!$Cd||reset(end($Cd))!=$xg){restart_session();$Cd[]=array($xg,time());set_session("queries",$Dd);stop_session();}}$zh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$cc=";";$kf=0;$zc=true;$h=connect();if(is_object($h)&&DB!=""){$h->select_db(DB);if($_GET["ns"]!="")set_schema($_GET["ns"],$h);}$sb=0;$Dc=array();$Sf='[\'"'.($y=="sql"?'`#':($y=="sqlite"?'`[':($y=="mssql"?'[':''))).']|/\*|-- |$'.($y=="pgsql"?'|\$[^$]*\$':'');$si=microtime(true);parse_str($_COOKIE["adminer_export"],$ya);$qc=$b->dumpFormat();unset($qc["sql"]);while($G!=""){if(!$kf&&preg_match("~^$zh*+DELIMITER\\s+(\\S+)~i",$G,$C)){$cc=$C[1];$G=substr($G,strlen($C[0]));}else{preg_match('('.preg_quote($cc)."\\s*|$Sf)",$G,$C,PREG_OFFSET_CAPTURE,$kf);list($ld,$hg)=$C[0];if(!$ld&&$nd&&!feof($nd))$G.=fread($nd,1e5);else{if(!$ld&&rtrim($G)=="")break;$kf=$hg+strlen($ld);if($ld&&rtrim($ld)!=$cc){while(preg_match('('.($ld=='/*'?'\*/':($ld=='['?']':(preg_match('~^-- |^#~',$ld)?"\n":preg_quote($ld)."|\\\\."))).'|$)s',$G,$C,PREG_OFFSET_CAPTURE,$kf)){$ah=$C[0][0];if(!$ah&&$nd&&!feof($nd))$G.=fread($nd,1e5);else{$kf=$C[0][1]+strlen($ah);if($ah[0]!="\\")break;}}}else{$zc=false;$xg=substr($G,0,$hg);$sb++;$pg="<pre id='sql-$sb'><code class='jush-$y'>".$b->sqlCommandQuery($xg)."</code></pre>\n";if($y=="sqlite"&&preg_match("~^$zh*+ATTACH\\b~i",$xg,$C)){echo$pg,"<p class='error'>".lang(147)."\n";$Dc[]=" <a href='#sql-$sb'>$sb</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$pg;ob_flush();flush();}$Fh=microtime(true);if($g->multi_query($xg)&&is_object($h)&&preg_match("~^$zh*+USE\\b~i",$xg))$h->query($xg);do{$H=$g->store_result();if($g->error){echo($_POST["only_errors"]?$pg:""),"<p class='error'>".lang(148).($g->errno?" ($g->errno)":"").": ".error()."\n";$Dc[]=" <a href='#sql-$sb'>$sb</a>";if($_POST["error_stops"])break
2;}else{$gi=" <span class='time'>(".format_time($Fh).")</span>".(strlen($xg)<1000?" <a href='".h(ME)."sql=".urlencode(trim($xg))."'>".lang(10)."</a>":"");$_a=$g->affected_rows;$ej=($_POST["only_errors"]?"":$m->warnings());$fj="warnings-$sb";if($ej)$gi.=", <a href='#$fj'>".lang(46)."</a>".script("qsl('a').onclick = partial(toggle, '$fj');","");$Lc=null;$Mc="explain-$sb";if(is_object($H)){$_=$_POST["limit"];$Ef=select($H,$h,array(),$_);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$gf=$H->num_rows;echo"<p>".($gf?($_&&$gf>$_?lang(149,$_):"").lang(150,$gf):""),$gi;if($h&&preg_match("~^($zh|\\()*+SELECT\\b~i",$xg)&&($Lc=explain($h,$xg)))echo", <a href='#$Mc'>Explain</a>".script("qsl('a').onclick = partial(toggle, '$Mc');","");$u="export-$sb";echo", <a href='#$u'>".lang(73)."</a>".script("qsl('a').onclick = partial(toggle, '$u');","")."<span id='$u' class='hidden'>: ".html_select("output",$b->dumpOutput(),$ya["output"])." ".html_select("format",$qc,$ya["format"])."<input type='hidden' name='query' value='".h($xg)."'>"." <input type='submit' name='export' value='".lang(73)."'><input type='hidden' name='token' value='$qi'></span>\n"."</form>\n";}}else{if(preg_match("~^$zh*+(CREATE|DROP|ALTER)$zh++(DATABASE|SCHEMA)\\b~i",$xg)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($g->info)."'>".lang(151,$_a)."$gi\n";}echo($ej?"<div id='$fj' class='hidden'>\n$ej</div>\n":"");if($Lc){echo"<div id='$Mc' class='hidden'>\n";select($Lc,$h,$Ef);echo"</div>\n";}}$Fh=microtime(true);}while($g->next_result());}$G=substr($G,$kf);$kf=0;}}}}if($zc)echo"<p class='message'>".lang(152)."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(153,$sb-count($Dc))," <span class='time'>(".format_time($si).")</span>\n";}elseif($Dc&&$sb>1)echo"<p class='error'>".lang(148).": ".implode("",$Dc)."\n";}else
echo"<p class='error'>".upload_error($G)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$Jc="<input type='submit' value='".lang(154)."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$xg=$_GET["sql"];if($_POST)$xg=$_POST["query"];elseif($_GET["history"]=="all")$xg=$Cd;elseif($_GET["history"]!="")$xg=$Cd[$_GET["history"]][0];echo"<p>";textarea("query",$xg,20);echo
script(($_POST?"":"qs('textarea').focus();\n")."qs('#form').onsubmit = partial(sqlSubmit, qs('#form'), '".js_escape(remove_from_uri("sql|limit|error_stops|only_errors|history"))."');"),"<p>$Jc\n",lang(155).": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".lang(156)."</legend><div>";$wd=(extension_loaded("zlib")?"[.gz]":"");echo(ini_bool("file_uploads")?"SQL$wd (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$Jc":lang(157)),"</div></fieldset>\n";$Kd=$b->importServerPath();if($Kd){echo"<fieldset><legend>".lang(158)."</legend><div>",lang(159,"<code>".h($Kd)."$wd</code>"),' <input type="submit" name="webfile" value="'.lang(160).'">',"</div></fieldset>\n";}echo"<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])||$_GET["error_stops"]),lang(161))."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])||$_GET["only_errors"]),lang(162))."\n","<input type='hidden' name='token' value='$qi'>\n";if(!isset($_GET["import"])&&$Cd){print_fieldset("history",lang(163),$_GET["history"]!="");for($X=end($Cd);$X;$X=prev($Cd)){$z=key($Cd);list($xg,$gi,$uc)=$X;echo'<a href="'.h(ME."sql=&history=$z").'">'.lang(10)."</a>"." <span class='time' title='".@date('Y-m-d',$gi)."'>".@date("H:i:s",$gi)."</span>"." <code class='jush-$y'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$xg)))),80,"</code>").($uc?" <span class='time'>($uc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".lang(164)."'>\n","<a href='".h(ME."sql=&history=all")."'>".lang(165)."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Li=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$D=>$o){if(!isset($o["privileges"][$Li?"update":"insert"])||$b->fieldName($o)==""||$o["generated"])unset($p[$D]);}if($_POST&&!$n&&!isset($_GET["select"])){$B=$_POST["referer"];if($_POST["insert"])$B=($Li?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$B))$B=ME."select=".urlencode($a);$x=indexes($a);$Gi=unique_array($_GET["where"],$x);$_g="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($B,lang(166),$m->delete($a,$_g,!$Gi));else{$N=array();foreach($p
as$D=>$o){$X=process_input($o);if($X!==false&&$X!==null)$N[idf_escape($D)]=$X;}if($Li){if(!$N)redirect($B);queries_redirect($B,lang(167),$m->update($a,$N,$_g,!$Gi));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$H=$m->insert($a,$N);$re=($H?last_id():0);queries_redirect($B,lang(168,($re?" $re":"")),$H);}}}$J=null;if($_POST["save"])$J=(array)$_POST["fields"];elseif($Z){$L=array();foreach($p
as$D=>$o){if(isset($o["privileges"]["select"])){$Ga=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Ga="''";if($y=="sql"&&preg_match("~enum|set~",$o["type"]))$Ga="1*".idf_escape($D);$L[]=($Ga?"$Ga AS ":"").idf_escape($D);}}$J=array();if(!support("table"))$L=array("*");if($L){$H=$m->select($a,$L,array($Z),$L,array(),(isset($_GET["select"])?2:1));if(!$H)$n=error();else{$J=$H->fetch_assoc();if(!$J)$J=false;}if(isset($_GET["select"])&&(!$J||$H->fetch_assoc()))$J=null;}}if(!support("table")&&!$p){if(!$Z){$H=$m->select($a,array("*"),$Z,array("*"));$J=($H?$H->fetch_assoc():false);if(!$J)$J=array($m->primary=>"");}if($J){foreach($J
as$z=>$X){if(!$Z)$J[$z]=null;$p[$z]=array("field"=>$z,"null"=>($z!=$m->primary),"auto_increment"=>($z==$m->primary));}}}edit_form($a,$p,$J,$Li);}elseif(isset($_GET["create"])){$a=$_GET["create"];$Uf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$z)$Uf[$z]=$z;$Gg=referencable_primary($a);$jd=array();foreach($Gg
as$Rh=>$o)$jd[str_replace("`","``",$Rh)."`".str_replace("`","``",$o["field"])]=$Rh;$Hf=array();$R=array();if($a!=""){$Hf=fields($a);$R=table_status($a);if(!$R)$n=lang(9);}$J=$_POST;$J["fields"]=(array)$J["fields"];if($J["auto_increment_col"])$J["fields"][$J["auto_increment_col"]]["auto_increment"]=true;if($_POST)set_adminer_settings(array("comments"=>$_POST["comments"],"defaults"=>$_POST["defaults"]));if($_POST&&!process_fields($J["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),lang(169),drop_tables(array($a)));else{$p=array();$Da=array();$Pi=false;$hd=array();$Gf=reset($Hf);$Ba=" FIRST";foreach($J["fields"]as$z=>$o){$r=$jd[$o["type"]];$Ci=($r!==null?$Gg[$r]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($z==$J["auto_increment_col"])$o["auto_increment"]=true;$ug=process_field($o,$Ci);$Da[]=array($o["orig"],$ug,$Ba);if(!$Gf||$ug!=process_field($Gf,$Gf)){$p[]=array($o["orig"],$ug,$Ba);if($o["orig"]!=""||$Ba)$Pi=true;}if($r!==null)$hd[idf_escape($o["field"])]=($a!=""&&$y!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$jd[$o["type"]],'source'=>array($o["field"]),'target'=>array($Ci["field"]),'on_delete'=>$o["on_delete"],));$Ba=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Pi=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$Gf=next($Hf);if(!$Gf)$Ba="";}}$Wf="";if($Uf[$J["partition_by"]]){$Xf=array();if($J["partition_by"]=='RANGE'||$J["partition_by"]=='LIST'){foreach(array_filter($J["partition_names"])as$z=>$X){$Y=$J["partition_values"][$z];$Xf[]="\n  PARTITION ".idf_escape($X)." VALUES ".($J["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Wf.="\nPARTITION BY $J[partition_by]($J[partition])".($Xf?" (".implode(",",$Xf)."\n)":($J["partitions"]?" PARTITIONS ".(+$J["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$R["Create_options"]))$Wf.="\nREMOVE PARTITIONING";$Ne=lang(170);if($a==""){cookie("adminer_engine",$J["Engine"]);$Ne=lang(171);}$D=trim($J["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($D),$Ne,alter_table($a,$D,($y=="sqlite"&&($Pi||$hd)?$Da:$p),$hd,($J["Comment"]!=$R["Comment"]?$J["Comment"]:null),($J["Engine"]&&$J["Engine"]!=$R["Engine"]?$J["Engine"]:""),($J["Collation"]&&$J["Collation"]!=$R["Collation"]?$J["Collation"]:""),($J["Auto_increment"]!=""?number($J["Auto_increment"]):""),$Wf));}}page_header(($a!=""?lang(44):lang(74)),$n,array("table"=>$a),h($a));if(!$_POST){$J=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($U["int"])?"int":(isset($U["integer"])?"integer":"")),"on_update"=>"")),"partition_names"=>array(""),);if($a!=""){$J=$R;$J["name"]=$a;$J["fields"]=array();if(!$_GET["auto_increment"])$J["Auto_increment"]="";foreach($Hf
as$o){$o["has_default"]=isset($o["default"]);$J["fields"][]=$o;}if(support("partitioning")){$od="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$H=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $od ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($J["partition_by"],$J["partitions"],$J["partition"])=$H->fetch_row();$Xf=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $od AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$Xf[""]="";$J["partition_names"]=array_keys($Xf);$J["partition_values"]=array_values($Xf);}}}$nb=collations();$Ac=engines();foreach($Ac
as$_c){if(!strcasecmp($_c,$J["Engine"])){$J["Engine"]=$_c;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo
lang(172),': <input name="name" data-maxlength="64" value="',h($J["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST)echo
script("focus(qs('#form')['name']);");echo($Ac?"<select name='Engine'>".optionlist(array(""=>"(".lang(173).")")+$Ac,$J["Engine"])."</select>".on_help("getTarget(event).value",1).script("qsl('select').onchange = helpClose;"):""),' ',($nb&&!preg_match("~sqlite|mssql~",$y)?html_select("Collation",array(""=>"(".lang(101).")")+$nb,$J["Collation"]):""),' <input type="submit" value="',lang(14),'">
';}echo'
';if(support("columns")){echo'<div class="scrollable">
<table cellspacing="0" id="edit-fields" class="nowrap">
';edit_fields($J["fields"],$nb,"TABLE",$jd);echo'</table>
',script("editFields();"),'</div>
<p>
',lang(51),': <input type="number" name="Auto_increment" size="6" value="',h($J["Auto_increment"]),'">
',checkbox("defaults",1,($_POST?$_POST["defaults"]:adminer_setting("defaults")),lang(174),"columnShow(this.checked, 5)","jsonly"),(support("comment")?checkbox("comments",1,($_POST?$_POST["comments"]:adminer_setting("comments")),lang(50),"editingCommentsClick(this, true);","jsonly").' <input name="Comment" value="'.h($J["Comment"]).'" data-maxlength="'.(min_version(5.5)?2048:60).'">':''),'<p>
<input type="submit" value="',lang(14),'">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$a));}if(support("partitioning")){$Vf=preg_match('~RANGE|LIST~',$J["partition_by"]);print_fieldset("partition",lang(176),$J["partition_by"]);echo'<p>
',"<select name='partition_by'>".optionlist(array(""=>"")+$Uf,$J["partition_by"])."</select>".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).script("qsl('select').onchange = partitionByChange;"),'(<input name="partition" value="',h($J["partition"]),'">)
',lang(177),': <input type="number" name="partitions" class="size',($Vf||!$J["partition_by"]?" hidden":""),'" value="',h($J["partitions"]),'">
<table cellspacing="0" id="partition-table"',($Vf?"":" class='hidden'"),'>
<thead><tr><th>',lang(178),'<th>',lang(179),'</thead>
';foreach($J["partition_names"]as$z=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'" autocapitalize="off">',($z==count($J["partition_names"])-1?script("qsl('input').oninput = partitionNameChange;"):''),'<td><input name="partition_values[]" value="'.h($J["partition_values"][$z]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Nd=array("PRIMARY","UNIQUE","INDEX");$R=table_status($a,true);if(preg_match('~MyISAM|M?aria'.(min_version(5.6,'10.0.5')?'|InnoDB':'').'~i',$R["Engine"]))$Nd[]="FULLTEXT";if(preg_match('~MyISAM|M?aria'.(min_version(5.7,'10.2.2')?'|InnoDB':'').'~i',$R["Engine"]))$Nd[]="SPATIAL";$x=indexes($a);$ng=array();if($y=="mongo"){$ng=$x["_id_"];unset($Nd[0]);unset($x["_id_"]);}$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($J["indexes"]as$w){$D=$w["name"];if(in_array($w["type"],$Nd)){$e=array();$xe=array();$ec=array();$N=array();ksort($w["columns"]);foreach($w["columns"]as$z=>$d){if($d!=""){$we=$w["lengths"][$z];$dc=$w["descs"][$z];$N[]=idf_escape($d).($we?"(".(+$we).")":"").($dc?" DESC":"");$e[]=$d;$xe[]=($we?$we:null);$ec[]=$dc;}}if($e){$Kc=$x[$D];if($Kc){ksort($Kc["columns"]);ksort($Kc["lengths"]);ksort($Kc["descs"]);if($w["type"]==$Kc["type"]&&array_values($Kc["columns"])===$e&&(!$Kc["lengths"]||array_values($Kc["lengths"])===$xe)&&array_values($Kc["descs"])===$ec){unset($x[$D]);continue;}}$c[]=array($w["type"],$D,$N);}}}foreach($x
as$D=>$Kc)$c[]=array($Kc["type"],$D,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),lang(180),alter_indexes($a,$c));}page_header(lang(132),$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($J["indexes"]as$z=>$w){if($w["columns"][count($w["columns"])]!="")$J["indexes"][$z]["columns"][]="";}$w=end($J["indexes"]);if($w["type"]||array_filter($w["columns"],'strlen'))$J["indexes"][]=array("columns"=>array(1=>""));}if(!$J){foreach($x
as$z=>$w){$x[$z]["name"]=$z;$x[$z]["columns"][]="";}$x[]=array("columns"=>array(1=>""));$J["indexes"]=$x;}echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th id="label-type">',lang(181),'<th><input type="submit" class="wayoff">',lang(182),'<th id="label-name">',lang(183),'<th><noscript>',"<input type='image' class='icon' name='add[0]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.1")."' alt='+' title='".lang(108)."'>",'</noscript>
</thead>
';if($ng){echo"<tr><td>PRIMARY<td>";foreach($ng["columns"]as$z=>$d){echo
select_input(" disabled",$p,$d),"<label><input disabled type='checkbox'>".lang(59)."</label> ";}echo"<td><td>\n";}$ge=1;foreach($J["indexes"]as$w){if(!$_POST["drop_col"]||$ge!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$ge][type]",array(-1=>"")+$Nd,$w["type"],($ge==count($J["indexes"])?"indexesAddRow.call(this);":1),"label-type"),"<td>";ksort($w["columns"]);$t=1;foreach($w["columns"]as$z=>$d){echo"<span>".select_input(" name='indexes[$ge][columns][$t]' title='".lang(48)."'",($p?array_combine($p,$p):$p),$d,"partial(".($t==count($w["columns"])?"indexesAddColumn":"indexesChangeColumn").", '".js_escape($y=="sql"?"":$_GET["indexes"]."_")."')"),($y=="sql"||$y=="mssql"?"<input type='number' name='indexes[$ge][lengths][$t]' class='size' value='".h($w["lengths"][$z])."' title='".lang(106)."'>":""),(support("descidx")?checkbox("indexes[$ge][descs][$t]",1,$w["descs"][$z],lang(59)):"")," </span>";$t++;}echo"<td><input name='indexes[$ge][name]' value='".h($w["name"])."' autocapitalize='off' aria-labelledby='label-name'>\n","<td><input type='image' class='icon' name='drop_col[$ge]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.8.1")."' alt='x' title='".lang(111)."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'indexes\$1[type]');");}$ge++;}echo'</table>
</div>
<p>
<input type="submit" value="',lang(14),'">
<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["database"])){$J=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$D=trim($J["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),lang(184),drop_databases(array(DB)));}elseif(DB!==$D){if(DB!=""){$_GET["db"]=$D;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($D),lang(185),rename_database($D,$J["collation"]));}else{$k=explode("\n",str_replace("\r","",$D));$Lh=true;$qe="";foreach($k
as$l){if(count($k)==1||$l!=""){if(!create_database($l,$J["collation"]))$Lh=false;$qe=$l;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($qe),lang(186),$Lh);}}else{if(!$J["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($D).(preg_match('~^[a-z0-9_]+$~i',$J["collation"])?" COLLATE $J[collation]":""),substr(ME,0,-1),lang(187));}}page_header(DB!=""?lang(67):lang(115),$n,array(),h(DB));$nb=collations();$D=DB;if($_POST)$D=$J["name"];elseif(DB!="")$J["collation"]=db_collation(DB,$nb);elseif($y=="sql"){foreach(get_vals("SHOW GRANTS")as$qd){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\.\*)?~',$qd,$C)&&$C[1]){$D=stripcslashes(idf_unescape("`$C[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($D,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($D).'</textarea><br>':'<input name="name" id="name" value="'.h($D).'" data-maxlength="64" autocapitalize="off">')."\n".($nb?html_select("collation",array(""=>"(".lang(101).")")+$nb,$J["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mariadb'=>"supported-character-sets-and-collations/",'mssql'=>"ms187963.aspx",)):""),script("focus(qs('#name'));"),'<input type="submit" value="',lang(14),'">
';if(DB!="")echo"<input type='submit' name='drop' value='".lang(127)."'>".confirm(lang(175,DB))."\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.1")."' alt='+' title='".lang(108)."'>\n";echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["scheme"])){$J=$_POST;if($_POST&&!$n){$A=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$A,lang(188));else{$D=trim($J["name"]);$A.=urlencode($D);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($D),$A,lang(189));elseif($_GET["ns"]!=$D)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($D),$A,lang(190));else
redirect($A);}}page_header($_GET["ns"]!=""?lang(68):lang(69),$n);if(!$J)$J["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($J["name"]),'" autocapitalize="off">
',script("focus(qs('#name'));"),'<input type="submit" value="',lang(14),'">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".lang(127)."'>".confirm(lang(175,$_GET["ns"]))."\n";echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["call"])){$da=($_GET["name"]?$_GET["name"]:$_GET["call"]);page_header(lang(191).": ".h($da),$n);$Wg=routine($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Ld=array();$Lf=array();foreach($Wg["fields"]as$t=>$o){if(substr($o["inout"],-3)=="OUT")$Lf[$t]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$Ld[]=$t;}if(!$n&&$_POST){$Ya=array();foreach($Wg["fields"]as$z=>$o){if(in_array($z,$Ld)){$X=process_input($o);if($X===false)$X="''";if(isset($Lf[$z]))$g->query("SET @".idf_escape($o["field"])." = $X");}$Ya[]=(isset($Lf[$z])?"@".idf_escape($o["field"]):$X);}$G=(isset($_GET["callf"])?"SELECT":"CALL")." ".table($da)."(".implode(", ",$Ya).")";$Fh=microtime(true);$H=$g->multi_query($G);$_a=$g->affected_rows;echo$b->selectQuery($G,$Fh,!$H);if(!$H)echo"<p class='error'>".error()."\n";else{$h=connect();if(is_object($h))$h->select_db(DB);do{$H=$g->store_result();if(is_object($H))select($H,$h);else
echo"<p class='message'>".lang(192,$_a)." <span class='time'>".@date("H:i:s")."</span>\n";}while($g->next_result());if($Lf)select($g->query("SELECT ".implode(", ",$Lf)));}}echo'
<form action="" method="post">
';if($Ld){echo"<table cellspacing='0' class='layout'>\n";foreach($Ld
as$z){$o=$Wg["fields"][$z];$D=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$D];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$D]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="',lang(191),'">
<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$D=$_GET["name"];$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$Ne=($_POST["drop"]?lang(193):($D!=""?lang(194):lang(195)));$B=ME."table=".urlencode($a);if(!$_POST["drop"]){$J["source"]=array_filter($J["source"],'strlen');ksort($J["source"]);$Zh=array();foreach($J["source"]as$z=>$X)$Zh[$z]=$J["target"][$z];$J["target"]=$Zh;}if($y=="sqlite")queries_redirect($B,$Ne,recreate_table($a,$a,array(),array(),array(" $D"=>($_POST["drop"]?"":" ".format_foreign_key($J)))));else{$c="ALTER TABLE ".table($a);$lc="\nDROP ".($y=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($D);if($_POST["drop"])query_redirect($c.$lc,$B,$Ne);else{query_redirect($c.($D!=""?"$lc,":"")."\nADD".format_foreign_key($J),$B,$Ne);$n=lang(196)."<br>$n";}}}page_header(lang(197),$n,array("table"=>$a),h($a));if($_POST){ksort($J["source"]);if($_POST["add"])$J["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$J["target"]=array();}elseif($D!=""){$jd=foreign_keys($a);$J=$jd[$D];$J["source"][]="";}else{$J["table"]=$a;$J["source"]=array("");}echo'
<form action="" method="post">
';$yh=array_keys(fields($a));if($J["db"]!="")$g->select_db($J["db"]);if($J["ns"]!="")set_schema($J["ns"]);$Fg=array_keys(array_filter(table_status('',true),'fk_support'));$Zh=array_keys(fields(in_array($J["table"],$Fg)?$J["table"]:reset($Fg)));$tf="this.form['change-js'].value = '1'; this.form.submit();";echo"<p>".lang(198).": ".html_select("table",$Fg,$J["table"],$tf)."\n";if($y=="pgsql")echo
lang(77).": ".html_select("ns",$b->schemas(),$J["ns"]!=""?$J["ns"]:$_GET["ns"],$tf);elseif($y!="sqlite"){$Wb=array();foreach($b->databases()as$l){if(!information_schema($l))$Wb[]=$l;}echo
lang(76).": ".html_select("db",$Wb,$J["db"]!=""?$J["db"]:$_GET["db"],$tf);}echo'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="',lang(199),'"></noscript>
<table cellspacing="0">
<thead><tr><th id="label-source">',lang(134),'<th id="label-target">',lang(135),'</thead>
';$ge=0;foreach($J["source"]as$z=>$X){echo"<tr>","<td>".html_select("source[".(+$z)."]",array(-1=>"")+$yh,$X,($ge==count($J["source"])-1?"foreignAddRow.call(this);":1),"label-source"),"<td>".html_select("target[".(+$z)."]",$Zh,$J["target"][$z],1,"label-target");$ge++;}echo'</table>
<p>
',lang(103),': ',html_select("on_delete",array(-1=>"")+explode("|",$sf),$J["on_delete"]),' ',lang(102),': ',html_select("on_update",array(-1=>"")+explode("|",$sf),$J["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'mariadb'=>"foreign-keys/",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"https://docs.oracle.com/cd/B19306_01/server.102/b14200/clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="',lang(14),'">
<noscript><p><input type="submit" name="add" value="',lang(200),'"></noscript>
';if($D!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$D));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$J=$_POST;$If="VIEW";if($y=="pgsql"&&$a!=""){$O=table_status($a);$If=strtoupper($O["Engine"]);}if($_POST&&!$n){$D=trim($J["name"]);$Ga=" AS\n$J[select]";$B=ME."table=".urlencode($D);$Ne=lang(201);$T=($_POST["materialized"]?"MATERIALIZED VIEW":"VIEW");if(!$_POST["drop"]&&$a==$D&&$y!="sqlite"&&$T=="VIEW"&&$If=="VIEW")query_redirect(($y=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($D).$Ga,$B,$Ne);else{$bi=$D."_adminer_".uniqid();drop_create("DROP $If ".table($a),"CREATE $T ".table($D).$Ga,"DROP $T ".table($D),"CREATE $T ".table($bi).$Ga,"DROP $T ".table($bi),($_POST["drop"]?substr(ME,0,-1):$B),lang(202),$Ne,lang(203),$a,$D);}}if(!$_POST&&$a!=""){$J=view($a);$J["name"]=$a;$J["materialized"]=($If!="VIEW");if(!$n)$n=error();}page_header(($a!=""?lang(43):lang(204)),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>',lang(183),': <input name="name" value="',h($J["name"]),'" data-maxlength="64" autocapitalize="off">
',(support("materializedview")?" ".checkbox("materialized",1,$J["materialized"],lang(129)):""),'<p>';textarea("select",$J["select"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($a!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$a));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Yd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Hh=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$J=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),lang(205));elseif(in_array($J["INTERVAL_FIELD"],$Yd)&&isset($Hh[$J["STATUS"]])){$bh="\nON SCHEDULE ".($J["INTERVAL_VALUE"]?"EVERY ".q($J["INTERVAL_VALUE"])." $J[INTERVAL_FIELD]".($J["STARTS"]?" STARTS ".q($J["STARTS"]):"").($J["ENDS"]?" ENDS ".q($J["ENDS"]):""):"AT ".q($J["STARTS"]))." ON COMPLETION".($J["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?lang(206):lang(207)),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$bh.($aa!=$J["EVENT_NAME"]?"\nRENAME TO ".idf_escape($J["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($J["EVENT_NAME"]).$bh)."\n".$Hh[$J["STATUS"]]." COMMENT ".q($J["EVENT_COMMENT"]).rtrim(" DO\n$J[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?lang(208).": ".h($aa):lang(209)),$n);if(!$J&&$aa!=""){$K=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$J=reset($K);}echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>',lang(183),'<td><input name="EVENT_NAME" value="',h($J["EVENT_NAME"]),'" data-maxlength="64" autocapitalize="off">
<tr><th title="datetime">',lang(210),'<td><input name="STARTS" value="',h("$J[EXECUTE_AT]$J[STARTS]"),'">
<tr><th title="datetime">',lang(211),'<td><input name="ENDS" value="',h($J["ENDS"]),'">
<tr><th>',lang(212),'<td><input type="number" name="INTERVAL_VALUE" value="',h($J["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$Yd,$J["INTERVAL_FIELD"]),'<tr><th>',lang(118),'<td>',html_select("STATUS",$Hh,$J["STATUS"]),'<tr><th>',lang(50),'<td><input name="EVENT_COMMENT" value="',h($J["EVENT_COMMENT"]),'" data-maxlength="64">
<tr><th><td>',checkbox("ON_COMPLETION","PRESERVE",$J["ON_COMPLETION"]=="PRESERVE",lang(213)),'</table>
<p>';textarea("EVENT_DEFINITION",$J["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($aa!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$aa));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=($_GET["name"]?$_GET["name"]:$_GET["procedure"]);$Wg=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$J=$_POST;$J["fields"]=(array)$J["fields"];if($_POST&&!process_fields($J["fields"])&&!$n){$Ff=routine($_GET["procedure"],$Wg);$bi="$J[name]_adminer_".uniqid();drop_create("DROP $Wg ".routine_id($da,$Ff),create_routine($Wg,$J),"DROP $Wg ".routine_id($J["name"],$J),create_routine($Wg,array("name"=>$bi)+$J),"DROP $Wg ".routine_id($bi,$J),substr(ME,0,-1),lang(214),lang(215),lang(216),$da,$J["name"]);}page_header(($da!=""?(isset($_GET["function"])?lang(217):lang(218)).": ".h($da):(isset($_GET["function"])?lang(219):lang(220))),$n);if(!$_POST&&$da!=""){$J=routine($_GET["procedure"],$Wg);$J["name"]=$da;}$nb=get_vals("SHOW CHARACTER SET");sort($nb);$Xg=routine_languages();echo'
<form action="" method="post" id="form">
<p>',lang(183),': <input name="name" value="',h($J["name"]),'" data-maxlength="64" autocapitalize="off">
',($Xg?lang(19).": ".html_select("language",$Xg,$J["language"])."\n":""),'<input type="submit" value="',lang(14),'">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
';edit_fields($J["fields"],$nb,$Wg);if(isset($_GET["function"])){echo"<tr><td>".lang(221);edit_type("returns",$J["returns"],$nb,array(),($y=="pgsql"?array("void","trigger"):array()));}echo'</table>
',script("editFields();"),'</div>
<p>';textarea("definition",$J["definition"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($da!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$da));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$J=$_POST;if($_POST&&!$n){$A=substr(ME,0,-1);$D=trim($J["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$A,lang(222));elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($D),$A,lang(223));elseif($fa!=$D)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($D),$A,lang(224));else
redirect($A);}page_header($fa!=""?lang(225).": ".h($fa):lang(226),$n);if(!$J)$J["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($J["name"]),'" autocapitalize="off">
<input type="submit" value="',lang(14),'">
';if($fa!="")echo"<input type='submit' name='drop' value='".lang(127)."'>".confirm(lang(175,$fa))."\n";echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$J=$_POST;if($_POST&&!$n){$A=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$A,lang(227));else
query_redirect("CREATE TYPE ".idf_escape(trim($J["name"]))." $J[as]",$A,lang(228));}page_header($ga!=""?lang(229).": ".h($ga):lang(230),$n);if(!$J)$J["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".lang(127)."'>".confirm(lang(175,$ga))."\n";else{echo"<input name='name' value='".h($J['name'])."' autocapitalize='off'>\n";textarea("as",$J["as"]);echo"<p><input type='submit' value='".lang(14)."'>\n";}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$D=$_GET["name"];$Ai=trigger_options();$J=(array)trigger($D,$a)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$Ai["Timing"])&&in_array($_POST["Event"],$Ai["Event"])&&in_array($_POST["Type"],$Ai["Type"])){$rf=" ON ".table($a);$lc="DROP TRIGGER ".idf_escape($D).($y=="pgsql"?$rf:"");$B=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($lc,$B,lang(231));else{if($D!="")queries($lc);queries_redirect($B,($D!=""?lang(232):lang(233)),queries(create_trigger($rf,$_POST)));if($D!="")queries(create_trigger($rf,$J+array("Type"=>reset($Ai["Type"]))));}}$J=$_POST;}page_header(($D!=""?lang(234).": ".h($D):lang(235)),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0" class="layout">
<tr><th>',lang(236),'<td>',html_select("Timing",$Ai["Timing"],$J["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>',lang(237),'<td>',html_select("Event",$Ai["Event"],$J["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$Ai["Event"])?" <input name='Of' value='".h($J["Of"])."' class='hidden'>":""),'<tr><th>',lang(49),'<td>',html_select("Type",$Ai["Type"],$J["Type"]),'</table>
<p>',lang(183),': <input name="Trigger" value="',h($J["Trigger"]),'" data-maxlength="64" autocapitalize="off">
',script("qs('#form')['Timing'].onchange();"),'<p>';textarea("Statement",$J["Statement"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($D!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$D));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$sg=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$J){foreach(explode(",",($J["Privilege"]=="Grant option"?"":$J["Context"]))as$Fb)$sg[$Fb][$J["Privilege"]]=$J["Comment"];}$sg["Server Admin"]+=$sg["File access on server"];$sg["Databases"]["Create routine"]=$sg["Procedures"]["Create routine"];unset($sg["Procedures"]["Create routine"]);$sg["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$sg["Columns"][$X]=$sg["Tables"][$X];unset($sg["Server Admin"]["Usage"]);foreach($sg["Tables"]as$z=>$X)unset($sg["Databases"][$z]);$af=array();if($_POST){foreach($_POST["objects"]as$z=>$X)$af[$X]=(array)$af[$X]+(array)$_POST["grants"][$z];}$rd=array();$pf="";if(isset($_GET["host"])&&($H=$g->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($J=$H->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$J[0],$C)&&preg_match_all('~ *([^(,]*[^ ,(])( *\([^)]+\))?~',$C[1],$Fe,PREG_SET_ORDER)){foreach($Fe
as$X){if($X[1]!="USAGE")$rd["$C[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$J[0]))$rd["$C[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$J[0],$C))$pf=$C[1];}}if($_POST&&!$n){$qf=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $qf",ME."privileges=",lang(238));else{$cf=q($_POST["user"])."@".q($_POST["host"]);$Zf=$_POST["pass"];if($Zf!=''&&!$_POST["hashed"]&&!min_version(8)){$Zf=$g->result("SELECT PASSWORD(".q($Zf).")");$n=!$Zf;}$Lb=false;if(!$n){if($qf!=$cf){$Lb=queries((min_version(5)?"CREATE USER":"GRANT USAGE ON *.* TO")." $cf IDENTIFIED BY ".(min_version(8)?"":"PASSWORD ").q($Zf));$n=!$Lb;}elseif($Zf!=$pf)queries("SET PASSWORD FOR $cf = ".q($Zf));}if(!$n){$Tg=array();foreach($af
as$if=>$qd){if(isset($_GET["grant"]))$qd=array_filter($qd);$qd=array_keys($qd);if(isset($_GET["grant"]))$Tg=array_diff(array_keys(array_filter($af[$if],'strlen')),$qd);elseif($qf==$cf){$nf=array_keys((array)$rd[$if]);$Tg=array_diff($nf,$qd);$qd=array_diff($qd,$nf);unset($rd[$if]);}if(preg_match('~^(.+)\s*(\(.*\))?$~U',$if,$C)&&(!grant("REVOKE",$Tg,$C[2]," ON $C[1] FROM $cf")||!grant("GRANT",$qd,$C[2]," ON $C[1] TO $cf"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($qf!=$cf)queries("DROP USER $qf");elseif(!isset($_GET["grant"])){foreach($rd
as$if=>$Tg){if(preg_match('~^(.+)(\(.*\))?$~U',$if,$C))grant("REVOKE",array_keys($Tg),$C[2]," ON $C[1] FROM $cf");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?lang(239):lang(240)),!$n);if($Lb)$g->query("DROP USER $cf");}}page_header((isset($_GET["host"])?lang(35).": ".h("$ha@$_GET[host]"):lang(146)),$n,array("privileges"=>array('',lang(71))));if($_POST){$J=$_POST;$rd=$af;}else{$J=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$J["pass"]=$pf;if($pf!="")$J["hashed"]=true;$rd[(DB==""||$rd?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>',lang(34),'<td><input name="host" data-maxlength="60" value="',h($J["host"]),'" autocapitalize="off">
<tr><th>',lang(35),'<td><input name="user" data-maxlength="80" value="',h($J["user"]),'" autocapitalize="off">
<tr><th>',lang(36),'<td><input name="pass" id="pass" value="',h($J["pass"]),'" autocomplete="new-password">
';if(!$J["hashed"])echo
script("typePassword(qs('#pass'));");echo(min_version(8)?"":checkbox("hashed",1,$J["hashed"],lang(241),"typePassword(this.form['pass'], this.checked);")),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".lang(71).doc_link(array('sql'=>"grant.html#priv_level"));$t=0;foreach($rd
as$if=>$qd){echo'<th>'.($if!="*.*"?"<input name='objects[$t]' value='".h($if)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$t]' value='*.*' size='10'>*.*");$t++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>lang(34),"Databases"=>lang(37),"Tables"=>lang(131),"Columns"=>lang(48),"Procedures"=>lang(242),)as$Fb=>$dc){foreach((array)$sg[$Fb]as$rg=>$tb){echo"<tr".odd()."><td".($dc?">$dc<td":" colspan='2'").' lang="en" title="'.h($tb).'">'.h($rg);$t=0;foreach($rd
as$if=>$qd){$D="'grants[$t][".h(strtoupper($rg))."]'";$Y=$qd[strtoupper($rg)];if($Fb=="Server Admin"&&$if!=(isset($rd["*.*"])?"*.*":".*"))echo"<td>";elseif(isset($_GET["grant"]))echo"<td><select name=$D><option><option value='1'".($Y?" selected":"").">".lang(243)."<option value='0'".($Y=="0"?" selected":"").">".lang(244)."</select>";else{echo"<td align='center'><label class='block'>","<input type='checkbox' name=$D value='1'".($Y?" checked":"").($rg=="All privileges"?" id='grants-$t-all'>":">".($rg=="Grant option"?"":script("qsl('input').onclick = function () { if (this.checked) formUncheck('grants-$t-all'); };"))),"</label>";}$t++;}}}echo"</table>\n",'<p>
<input type="submit" value="',lang(14),'">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,"$ha@$_GET[host]"));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")){if($_POST&&!$n){$le=0;foreach((array)$_POST["kill"]as$X){if(kill_process($X))$le++;}queries_redirect(ME."processlist=",lang(245,$le),$le||!$_POST["kill"]);}}page_header(lang(116),$n);echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap checkable">
',script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");$t=-1;foreach(process_list()as$t=>$J){if(!$t){echo"<thead><tr lang='en'>".(support("kill")?"<th>":"");foreach($J
as$z=>$X)echo"<th>$z".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($z),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"REFRN30223",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$J[$y=="sql"?"Id":"pid"],0):"");foreach($J
as$z=>$X)echo"<td>".(($y=="sql"&&$z=="Info"&&preg_match("~Query|Killed~",$J["Command"])&&$X!="")||($y=="pgsql"&&$z=="current_query"&&$X!="<IDLE>")||($y=="oracle"&&$z=="sql_text"&&$X!="")?"<code class='jush-$y'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($J["db"]!=""?"db=".urlencode($J["db"])."&":"")."sql=".urlencode($X)).'">'.lang(246).'</a>':h($X));echo"\n";}echo'</table>
</div>
<p>
';if(support("kill")){echo($t+1)."/".lang(247,max_connections()),"<p><input type='submit' value='".lang(248)."'>\n";}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
',script("tableCheck();");}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$x=indexes($a);$p=fields($a);$jd=column_foreign_keys($a);$lf=$R["Oid"];parse_str($_COOKIE["adminer_import"],$za);$Ug=array();$e=array();$fi=null;foreach($p
as$z=>$o){$D=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$D!=""){$e[$z]=html_entity_decode(strip_tags($D),ENT_QUOTES);if(is_shortable($o))$fi=$b->selectLengthProcess();}$Ug+=$o["privileges"];}list($L,$sd)=$b->selectColumnsProcess($e,$x);$ce=count($sd)<count($L);$Z=$b->selectSearchProcess($p,$x);$Bf=$b->selectOrderProcess($p,$x);$_=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Hi=>$J){$Ga=convert_field($p[key($J)]);$L=array($Ga?$Ga:idf_escape(key($J)));$Z[]=where_check($Hi,$p);$I=$m->select($a,$L,$Z,$L);if($I)echo
reset($I->fetch_row());}exit;}$ng=$Ji=null;foreach($x
as$w){if($w["type"]=="PRIMARY"){$ng=array_flip($w["columns"]);$Ji=($L?$ng:array());foreach($Ji
as$z=>$X){if(in_array(idf_escape($z),$L))unset($Ji[$z]);}break;}}if($lf&&!$ng){$ng=$Ji=array($lf=>0);$x[]=array("type"=>"PRIMARY","columns"=>array($lf));}if($_POST&&!$n){$kj=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$eb=array();foreach($_POST["check"]as$bb)$eb[]=where_check($bb,$p);$kj[]="((".implode(") OR (",$eb)."))";}$kj=($kj?"\nWHERE ".implode(" AND ",$kj):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$od=($L?implode(", ",$L):"*").convert_fields($e,$p,$L)."\nFROM ".table($a);$ud=($sd&&$ce?"\nGROUP BY ".implode(", ",$sd):"").($Bf?"\nORDER BY ".implode(", ",$Bf):"");if(!is_array($_POST["check"])||$ng)$G="SELECT $od$kj$ud";else{$Fi=array();foreach($_POST["check"]as$X)$Fi[]="(SELECT".limit($od,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$ud,1).")";$G=implode(" UNION ALL ",$Fi);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$jd)){if($_POST["save"]||$_POST["delete"]){$H=true;$_a=0;$N=array();if(!$_POST["delete"]){foreach($e
as$D=>$X){$X=process_input($p[$D]);if($X!==null&&($_POST["clone"]||$X!==false))$N[idf_escape($D)]=($X!==false?$X:idf_escape($D));}}if($_POST["delete"]||$N){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($N)).")\nSELECT ".implode(", ",$N)."\nFROM ".table($a);if($_POST["all"]||($ng&&is_array($_POST["check"]))||$ce){$H=($_POST["delete"]?$m->delete($a,$kj):($_POST["clone"]?queries("INSERT $G$kj"):$m->update($a,$N,$kj)));$_a=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$gj="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$H=($_POST["delete"]?$m->delete($a,$gj,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$gj)):$m->update($a,$N,$gj,1)));if(!$H)break;$_a+=$g->affected_rows;}}}$Ne=lang(249,$_a);if($_POST["clone"]&&$H&&$_a==1){$re=last_id();if($re)$Ne=lang(168," $re");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Ne,$H);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n=lang(250);else{$H=true;$_a=0;foreach($_POST["val"]as$Hi=>$J){$N=array();foreach($J
as$z=>$X){$z=bracket_escape($z,1);$N[idf_escape($z)]=(preg_match('~char|text~',$p[$z]["type"])||$X!=""?$b->processInput($p[$z],$X):"NULL");}$H=$m->update($a,$N," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Hi,$p),!$ce&&!$ng," ");if(!$H)break;$_a+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(249,$_a),$H);}}elseif(!is_string($Zc=get_file("csv_file",true)))$n=upload_error($Zc);elseif(!preg_match('~~u',$Zc))$n=lang(251);else{cookie("adminer_import","output=".urlencode($za["output"])."&format=".urlencode($_POST["separator"]));$H=true;$pb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$Zc,$Fe);$_a=count($Fe[0]);$m->begin();$kh=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$K=array();foreach($Fe[0]as$z=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$kh]*)$kh~",$X.$kh,$Ge);if(!$z&&!array_diff($Ge[1],$pb)){$pb=$Ge[1];$_a--;}else{$N=array();foreach($Ge[1]as$t=>$kb)$N[idf_escape($pb[$t])]=($kb==""&&$p[$pb[$t]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$kb))));$K[]=$N;}}$H=(!$K||$m->insertUpdate($a,$K,$ng));if($H)$H=$m->commit();queries_redirect(remove_from_uri("page"),lang(252,$_a),$H);$m->rollback();}}}$Rh=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(53).": $Rh",$n);$N=null;if(isset($Ug["insert"])||!support("table")){$N="";foreach((array)$_GET["where"]as$X){if($jd[$X["col"]]&&count($jd[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$N.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$N);if(!$e&&support("table"))echo"<p class='error'>".lang(253).($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($L,$e);$b->selectSearchPrint($Z,$e,$x);$b->selectOrderPrint($Bf,$e,$x);$b->selectLimitPrint($_);$b->selectLengthPrint($fi);$b->selectActionPrint($x);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$md=$g->result(count_rows($a,$Z,$ce,$sd));$E=floor(max(0,$md-1)/$_);}$fh=$L;$td=$sd;if(!$fh){$fh[]="*";$Gb=convert_fields($e,$p,$L);if($Gb)$fh[]=substr($Gb,2);}foreach($L
as$z=>$X){$o=$p[idf_unescape($X)];if($o&&($Ga=convert_field($o)))$fh[$z]="$Ga AS $X";}if(!$ce&&$Ji){foreach($Ji
as$z=>$X){$fh[]=idf_escape($z);if($td)$td[]=idf_escape($z);}}$H=$m->select($a,$fh,$Z,$td,$Bf,$_,$E,true);if(!$H)echo"<p class='error'>".error()."\n";else{if($y=="mssql"&&$E)$H->seek($_*$E);$yc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($E&&$y=="oracle")unset($J["RNUM"]);$K[]=$J;}if($_GET["page"]!="last"&&$_!=""&&$sd&&$ce&&$y=="sql")$md=$g->result(" SELECT FOUND_ROWS()");if(!$K)echo"<p class='message'>".lang(12)."\n";else{$Pa=$b->backwardKeys($a,$Rh);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$sd&&$L?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(254)."</a>");$Ye=array();$pd=array();reset($L);$Bg=1;foreach($K[0]as$z=>$X){if(!isset($Ji[$z])){$X=$_GET["columns"][key($L)];$o=$p[$L?($X?$X["col"]:current($L)):$z];$D=($o?$b->fieldName($o,$Bg):($X["fun"]?"*":$z));if($D!=""){$Bg++;$Ye[$z]=$D;$d=idf_escape($z);$Gd=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($z);$dc="&desc%5B0%5D=1";echo"<th id='th[".h(bracket_escape($z))."]'>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Gd.($Bf[0]==$d||$Bf[0]==$z||(!$Bf&&$ce&&$sd[0]==$d)?$dc:'')).'">';echo
apply_sql_function($X["fun"],$D)."</a>";echo"<span class='column hidden'>","<a href='".h($Gd.$dc)."' title='".lang(59)."' class='text'> â†“</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(56).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($z)."');");}echo"</span>";}$pd[$z]=$X["fun"];next($L);}}$xe=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$z=>$X)$xe[$z]=max($xe[$z],min(40,strlen(utf8_decode($X))));}}echo($Pa?"<th>".lang(255):"")."</thead>\n";if(is_ajax()){if($_%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($K,$jd)as$Xe=>$J){$Gi=unique_array($K[$Xe],$x);if(!$Gi){$Gi=array();foreach($K[$Xe]as$z=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$z))$Gi[$z]=$X;}}$Hi="";foreach($Gi
as$z=>$X){if(($y=="sql"||$y=="pgsql")&&preg_match('~char|text|enum|set~',$p[$z]["type"])&&strlen($X)>64){$z=(strpos($z,'(')?$z:idf_escape($z));$z="MD5(".($y!='sql'||preg_match("~^utf8~",$p[$z]["collation"])?$z:"CONVERT($z USING ".charset($g).")").")";$X=md5($X);}$Hi.="&".($X!==null?urlencode("where[".bracket_escape($z)."]")."=".urlencode($X):"null%5B%5D=".urlencode($z));}echo"<tr".odd().">".(!$sd&&$L?"":"<td>".checkbox("check[]",substr($Hi,1),in_array(substr($Hi,1),(array)$_POST["check"])).($ce||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Hi)."' class='edit'>".lang(256)."</a>"));foreach($J
as$z=>$X){if(isset($Ye[$z])){$o=$p[$z];$X=$m->value($X,$o);if($X!=""&&(!isset($yc[$z])||$yc[$z]!=""))$yc[$z]=(is_mail($X)?$Ye[$z]:"");$A="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$A=ME.'download='.urlencode($a).'&field='.urlencode($z).$Hi;if(!$A&&$X!==null){foreach((array)$jd[$z]as$r){if(count($jd[$z])==1||end($r["source"])==$z){$A="";foreach($r["source"]as$t=>$yh)$A.=where_link($t,$r["target"][$t],$K[$Xe][$yh]);$A=($r["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($r["db"]),ME):ME).'select='.urlencode($r["table"]).$A;if($r["ns"])$A=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($r["ns"]),$A);if(count($r["source"])==1)break;}}}if($z=="COUNT(*)"){$A=ME."select=".urlencode($a);$t=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Gi))$A.=where_link($t++,$W["col"],$W["val"],$W["op"]);}foreach($Gi
as$he=>$W)$A.=where_link($t++,$he,$W);}$X=select_value($X,$A,$o,$fi);$u=h("val[$Hi][".bracket_escape($z)."]");$Y=$_POST["val"][$Hi][bracket_escape($z)];$tc=!is_array($J[$z])&&is_utf8($X)&&$K[$Xe][$z]==$J[$z]&&!$pd[$z];$ei=preg_match('~text|lob~',$o["type"]);echo"<td id='$u'";if(($_GET["modify"]&&$tc)||$Y!==null){$xd=h($Y!==null?$Y:$J[$z]);echo">".($ei?"<textarea name='$u' cols='30' rows='".(substr_count($J[$z],"\n")+1)."'>$xd</textarea>":"<input name='$u' value='$xd' size='$xe[$z]'>");}else{$Ae=strpos($X,"<i>â€¦</i>");echo" data-text='".($Ae?2:($ei?1:0))."'".($tc?"":" data-warning='".h(lang(257))."'").">$X</td>";}}}if($Pa)echo"<td>";$b->backwardKeysPrint($Pa,$K[$Xe]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($K||$E){$Ic=true;if($_GET["page"]!="last"){if($_==""||(count($K)<$_&&($K||!$E)))$md=($E?$E*$_:0)+count($K);elseif($y!="sql"||!$ce){$md=($ce?false:found_rows($R,$Z));if($md<max(1e4,2*($E+1)*$_))$md=reset(slow_query(count_rows($a,$Z,$ce,$sd)));else$Ic=false;}}$Pf=($_!=""&&($md===false||$md>$_||$E));if($Pf){echo(($md===false?count($K)+1:$md-$E*$_)>$_?'<p><a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" class="loadmore">'.lang(258).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$_).", '".lang(259)."â€¦');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($K||$E){if($Pf){$Ie=($md===false?$E+(count($K)>=$_?2:1):floor(($md-1)/$_));echo"<fieldset>";if($y!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".lang(260)."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(260)."', '".($E+1)."')); return false; };"),pagination(0,$E).($E>5?" â€¦":"");for($t=max(1,$E-4);$t<min($Ie,$E+5);$t++)echo
pagination($t,$E);if($Ie>0){echo($E+5<$Ie?" â€¦":""),($Ic&&$md!==false?pagination($Ie,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Ie'>".lang(261)."</a>");}}else{echo"<legend>".lang(260)."</legend>",pagination(0,$E).($E>1?" â€¦":""),($E?pagination($E,$E):""),($Ie>$E?pagination($E+1,$E).($Ie>$E+1?" â€¦":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".lang(262)."</legend>";$ic=($Ic?"":"~ ").$md;echo
checkbox("all",1,0,($md!==false?($Ic?"":"~ ").lang(150,$md):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$ic' : checked); selectCount('selected2', this.checked || !checked ? '$ic' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(254),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(250).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(126),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(246),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$kd=$b->dumpFormat();foreach((array)$_GET["columns"]as$d){if($d["fun"]){unset($kd['sql']);break;}}if($kd){print_fieldset("export",lang(73)." <span id='selected2'></span>");$Mf=$b->dumpOutput();echo($Mf?html_select("output",$Mf,$za["output"])." ":""),html_select("format",$kd,$za["format"])," <input type='submit' name='export' value='".lang(73)."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($yc,'strlen'),$e);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".lang(72)."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$za["format"],1);echo" <input type='submit' name='import' value='".lang(72)."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$qi'>\n","</form>\n",(!$sd&&$L?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$O=isset($_GET["status"]);page_header($O?lang(118):lang(117));$Xi=($O?show_status():show_variables());if(!$Xi)echo"<p class='message'>".lang(12)."\n";else{echo"<table cellspacing='0'>\n";foreach($Xi
as$z=>$X){echo"<tr>","<th><code class='jush-".$y.($O?"status":"set")."'>".h($z)."</code>","<td>".h($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Oh=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$D=>$R){json_row("Comment-$D",h($R["Comment"]));if(!is_view($R)){foreach(array("Engine","Collation")as$z)json_row("$z-$D",h($R[$z]));foreach($Oh+array("Auto_increment"=>0,"Rows"=>0)as$z=>$X){if($R[$z]!=""){$X=format_number($R[$z]);json_row("$z-$D",($z=="Rows"&&$X&&$R["Engine"]==($Ah=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Oh[$z]))$Oh[$z]+=($R["Engine"]!="InnoDB"||$z!="Data_free"?$R[$z]:0);}elseif(array_key_exists($z,$R))json_row("$z-$D");}}}foreach($Oh
as$z=>$X)json_row("sum-$z",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$g->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$l=>$X){json_row("tables-$l",$X);json_row("size-$l",db_size($l));}json_row("");}exit;}else{$Xh=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Xh&&!$n&&!$_POST["search"]){$H=true;$Ne="";if($y=="sql"&&$_POST["tables"]&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$H=truncate_tables($_POST["tables"]);$Ne=lang(263);}elseif($_POST["move"]){$H=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Ne=lang(264);}elseif($_POST["copy"]){$H=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Ne=lang(265);}elseif($_POST["drop"]){if($_POST["views"])$H=drop_views($_POST["views"]);if($H&&$_POST["tables"])$H=drop_tables($_POST["tables"]);$Ne=lang(266);}elseif($y!="sql"){$H=($y=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$Ne=lang(267);}elseif(!$_POST["tables"])$Ne=lang(9);elseif($H=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($J=$H->fetch_assoc())$Ne.="<b>".h($J["Table"])."</b>: ".h($J["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$Ne,$H);}page_header(($_GET["ns"]==""?lang(37).": ".h(DB):lang(77).": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".lang(268)."</h3>\n";$Wh=tables_list();if(!$Wh)echo"<p class='message'>".lang(9)."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".lang(269)." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'>",script("qsl('input').onkeydown = partialArg(bodyKeydown, 'search');","")," <input type='submit' name='search' value='".lang(56)."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!=""){$_GET["where"][0]["op"]="LIKE %%";search_tables();}}echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^(tables|views)\[/);",""),'<th>'.lang(131),'<td>'.lang(270).doc_link(array('sql'=>'storage-engines.html')),'<td>'.lang(122).doc_link(array('sql'=>'charset-charsets.html','mariadb'=>'supported-character-sets-and-collations/')),'<td>'.lang(271).doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-admin.html#FUNCTIONS-ADMIN-DBOBJECT','oracle'=>'REFRN20286')),'<td>'.lang(272).doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-admin.html#FUNCTIONS-ADMIN-DBOBJECT')),'<td>'.lang(273).doc_link(array('sql'=>'show-table-status.html')),'<td>'.lang(51).doc_link(array('sql'=>'example-auto-increment.html','mariadb'=>'auto_increment/')),'<td>'.lang(274).doc_link(array('sql'=>'show-table-status.html','pgsql'=>'catalog-pg-class.html#CATALOG-PG-CLASS','oracle'=>'REFRN20286')),(support("comment")?'<td>'.lang(50).doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-info.html#FUNCTIONS-INFO-COMMENT-TABLE')):''),"</thead>\n";$S=0;foreach($Wh
as$D=>$T){$aj=($T!==null&&!preg_match('~table|sequence~i',$T));$u=h("Table-".$D);echo'<tr'.odd().'><td>'.checkbox(($aj?"views[]":"tables[]"),$D,in_array($D,$Xh,true),"","","",$u),'<th>'.(support("table")||support("indexes")?"<a href='".h(ME)."table=".urlencode($D)."' title='".lang(42)."' id='$u'>".h($D).'</a>':h($D));if($aj){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($D).'" title="'.lang(43).'">'.(preg_match('~materialized~i',$T)?lang(129):lang(130)).'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($D).'" title="'.lang(41).'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",lang(44)),"Index_length"=>array("indexes",lang(133)),"Data_free"=>array("edit",lang(45)),"Auto_increment"=>array("auto_increment=1&create",lang(44)),"Rows"=>array("select",lang(41)),)as$z=>$A){$u=" id='$z-".h($D)."'";echo($A?"<td align='right'>".(support("table")||$z=="Rows"||(support("indexes")&&$z!="Data_length")?"<a href='".h(ME."$A[0]=").urlencode($D)."'$u title='$A[1]'>?</a>":"<span$u>?</span>"):"<td id='$z-".h($D)."'>");}$S++;}echo(support("comment")?"<td id='Comment-".h($D)."'>":"");}echo"<tr><td><th>".lang(247,count($Wh)),"<td>".h($y=="sql"?$g->result("SELECT @@default_storage_engine"):""),"<td>".h(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$z)echo"<td align='right' id='sum-$z'>";echo"</table>\n","</div>\n";if(!information_schema(DB)){echo"<div class='footer'><div>\n";$Ui="<input type='submit' value='".lang(275)."'> ".on_help("'VACUUM'");$yf="<input type='submit' name='optimize' value='".lang(276)."'> ".on_help($y=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'");echo"<fieldset><legend>".lang(126)." <span id='selected'></span></legend><div>".($y=="sqlite"?$Ui:($y=="pgsql"?$Ui.$yf:($y=="sql"?"<input type='submit' value='".lang(277)."'> ".on_help("'ANALYZE TABLE'").$yf."<input type='submit' name='check' value='".lang(278)."'> ".on_help("'CHECK TABLE'")."<input type='submit' name='repair' value='".lang(279)."'> ".on_help("'REPAIR TABLE'"):"")))."<input type='submit' name='truncate' value='".lang(280)."'> ".on_help($y=="sqlite"?"'DELETE'":"'TRUNCATE".($y=="pgsql"?"'":" TABLE'")).confirm()."<input type='submit' name='drop' value='".lang(127)."'>".on_help("'DROP TABLE'").confirm()."\n";$k=(support("scheme")?$b->schemas():$b->databases());if(count($k)!=1&&$y!="sqlite"){$l=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".lang(281).": ",($k?html_select("target",$k,$l):'<input name="target" value="'.h($l).'" autocapitalize="off">')," <input type='submit' name='move' value='".lang(282)."'>",(support("copy")?" <input type='submit' name='copy' value='".lang(283)."'> ".checkbox("overwrite",1,$_POST["overwrite"],lang(284)):""),"\n";}echo"<input type='hidden' name='all' value=''>";echo
script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $S);":"")." }"),"<input type='hidden' name='token' value='$qi'>\n","</div></fieldset>\n","</div></div>\n";}echo"</form>\n",script("tableCheck();");}echo'<p class="links"><a href="'.h(ME).'create=">'.lang(74)."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.lang(204)."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".lang(143)."</h3>\n";$Yg=routines();if($Yg){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.lang(183).'<td>'.lang(49).'<td>'.lang(221)."<td></thead>\n";odd('');foreach($Yg
as$J){$D=($J["SPECIFIC_NAME"]==$J["ROUTINE_NAME"]?"":"&name=".urlencode($J["ROUTINE_NAME"]));echo'<tr'.odd().'>','<th><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($J["SPECIFIC_NAME"]).$D).'">'.h($J["ROUTINE_NAME"]).'</a>','<td>'.h($J["ROUTINE_TYPE"]),'<td>'.h($J["DTD_IDENTIFIER"]),'<td><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($J["SPECIFIC_NAME"]).$D).'">'.lang(136)."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.lang(220).'</a>':'').'<a href="'.h(ME).'function=">'.lang(219)."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".lang(285)."</h3>\n";$mh=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($mh){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(183)."</thead>\n";odd('');foreach($mh
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".lang(226)."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".lang(26)."</h3>\n";$Si=types();if($Si){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(183)."</thead>\n";odd('');foreach($Si
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".lang(230)."</a>\n";}if(support("event")){echo"<h3 id='events'>".lang(144)."</h3>\n";$K=get_rows("SHOW EVENTS");if($K){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(183)."<td>".lang(286)."<td>".lang(210)."<td>".lang(211)."<td></thead>\n";foreach($K
as$J){echo"<tr>","<th>".h($J["Name"]),"<td>".($J["Execute at"]?lang(287)."<td>".$J["Execute at"]:lang(212)." ".$J["Interval value"]." ".$J["Interval field"]."<td>$J[Starts]"),"<td>$J[Ends]",'<td><a href="'.h(ME).'event='.urlencode($J["Name"]).'">'.lang(136).'</a>';}echo"</table>\n";$Gc=$g->result("SELECT @@event_scheduler");if($Gc&&$Gc!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($Gc)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.lang(209)."</a>\n";}if($Wh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}}}page_footer();
