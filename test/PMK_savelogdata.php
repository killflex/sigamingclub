<?PHP
header("Access-Control-Allow-Origin: https://play.gxc.gg");

$filename = $_POST['filename'];
$logdata = base64_decode($_POST['logdata']);
$step = $_POST['step'];

if($step == "opengamespec") {
    mkdir($filename);
    chdir($filename);
    $filename2 = $filename . '_gamespec.txt';
    $myfile = fopen($filename2, 'w') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
}
else
{
if(!file_exists($filename) || !is_dir($filename)) {
    mkdir($filename);       
} 
    chdir($filename);
    if($step == "appendgamespec")
{
    $filename2 = $filename . '_gamespec.txt';
    $myfile = fopen($filename2, 'a') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
} else if($step == "openlogdata") 
{
//1, player position
$filename2 = $filename . '_playerpos.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//2, player interaction
$filename2 = $filename . '_playerinteraction.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//3, player attack
$filename2 = $filename . '_playerattack.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//4, player touch
$filename2 = $filename . '_playertouch.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//5, player damaged
$filename2 = $filename . '_playerdamaged.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//6, get item
$filename2 = $filename . '_playergetitem.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//7, equip tool
$filename2 = $filename . '_playerequiptool.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//8, use item
$filename2 = $filename . '_playeruseitem.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//9, quest state
$filename2 = $filename . '_queststate.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//10, learning get
$filename2 = $filename . '_learningget.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//11, learning erase
$filename2 = $filename . '_learningerase.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//12, player body state
$filename2 = $filename . '_statebody.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//13, game state
$filename2 = $filename . '_stategame.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//14, event state
$filename2 = $filename . '_stateevent.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//15, player's health
$filename2 = $filename . '_statehealth.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//16, player death
$filename2 = $filename . '_playerdeath.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//17, player tool usage
//$filename2 = $filename . '_playertoolusage.txt';
//$myfile = fopen($filename2, 'w') or die('FAILED');
//fclose($myfile);

//18, attack-triggered event
$filename2 = $filename . '_playerattackevent.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//19, player score
$filename2 = $filename . '_playerscore.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//20, power use
$filename2 = $filename . '_poweruse.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

//21, dialog choice
$filename2 = $filename . '_dialogchoice.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fclose($myfile);

echo 'SUCCESS';
}
    else if($step == "playerpos")
{
    $filename2 = $filename . '_playerpos.txt';
    $myfile = fopen($filename2, 'a') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
}
    else if($step == "playerinteract")
{
    $filename2 = $filename . '_playerinteraction.txt';
    $myfile = fopen($filename2, 'a') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
}
    else if($step == "playerattack")
{
    $filename2 = $filename . '_playerattack.txt';
    $myfile = fopen($filename2, 'a') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
}
    else if($step == "playertouch")
{
    $filename2 = $filename . '_playertouch.txt';
    $myfile = fopen($filename2, 'a') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
}
    else if($step == "playerdamaged")
{
    $filename2 = $filename . '_playerdamaged.txt';
    $myfile = fopen($filename2, 'a') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
}
    else if($step == "playergetitem")
{
    $filename2 = $filename . '_playergetitem.txt';
    $myfile = fopen($filename2, 'a') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
}
    else if($step == "playerequiptool")
{
    $filename2 = $filename . '_playerequiptool.txt';
    $myfile = fopen($filename2, 'a') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
}
    else if($step == "playeruseitem")
{
    $filename2 = $filename . '_playeruseitem.txt';
    $myfile = fopen($filename2, 'a') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
}
else if($step == "playerqueststate")
{
    $filename2 = $filename . '_queststate.txt';
    $myfile = fopen($filename2, 'a') or die('FAILED');
    fwrite($myfile, $logdata);
    fclose($myfile);
    echo 'SUCCESS';
}
else if($step == "learningget")
{
$filename2 = $filename . '_learningget.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "learningerase")
{
$filename2 = $filename . '_learningerase.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "statebody")
{
$filename2 = $filename . '_statebody.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "stategame")
{
$filename2 = $filename . '_stategame.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "stateevent")
{
$filename2 = $filename . '_stateevent.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "statehealth")
{
$filename2 = $filename . '_statehealth.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "playerdeath")
{
$filename2 = $filename . '_playerdeath.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "playertoolusage")
{
$filename2 = $filename . '_playertoolusage.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "playerattackevent")
{
$filename2 = $filename . '_playerattackevent.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "playerscore")
{
$filename2 = $filename . '_playerscore.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "poweruse")
{
$filename2 = $filename . '_poweruse.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "dialogchoice")
{
$filename2 = $filename . '_dialogchoice.txt';
$myfile = fopen($filename2, 'a') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerplayerscore")
{
$filename2 = $filename . '_headerplayerscore.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerplayerbodystate")
{
$filename2 = $filename . '_headerplayerbodystate.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerplayerdeath")
{
$filename2 = $filename . '_headerplayerdeath.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headergamestate")
{
$filename2 = $filename . '_headergamestate.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerhealthstate")
{
$filename2 = $filename . '_headerhealthstate.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerinteraction")
{
$filename2 = $filename . '_headerinteraction.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerattackevent")
{
$filename2 = $filename . '_headerattackevent.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerplayertouch")
{
$filename2 = $filename . '_headerplayertouch.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerplayerdamaged")
{
$filename2 = $filename . '_headerplayerdamaged.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headergetitem")
{
$filename2 = $filename . '_headergetitem.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerequiptool")
{
$filename2 = $filename . '_headerequiptool.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headeruseitem")
{
$filename2 = $filename . '_headeruseitem.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerqueststate")
{
$filename2 = $filename . '_headerqueststate.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerlearningget")
{
$filename2 = $filename . '_headerlearningget.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerlearningerase")
{
$filename2 = $filename . '_headerlearningerase.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerpowerusage")
{
$filename2 = $filename . '_headerpowerusage.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerdialogchoice")
{
$filename2 = $filename . '_headerdialogchoice.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerplayerpos")
{
$filename2 = $filename . '_headerplayerpos.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headerplayerattack")
{
$filename2 = $filename . '_headerplayerattack.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headereventstate")
{
$filename2 = $filename . '_headereventstate.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "headertoolusage")
{
$filename2 = $filename . '_headertoolusage.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);
fclose($myfile);
echo 'SUCCESS';
}
else if($step == "finish")
{
//LAST STEP
//first, open the real log data file
$filename2 = $filename . '.txt';
$myfile = fopen($filename2, 'w') or die('FAILED');
fwrite($myfile, $logdata);

//second, append the game spec data to the file
$filename3 = $filename . '_gamespec.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

//third, append headers and log data to the file
$filename3 = $filename . '_headerplayerscore.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playerscore.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerplayerbodystate.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_statebody.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerplayerdeath.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playerdeath.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headergamestate.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_stategame.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerhealthstate.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_statehealth.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerinteraction.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playerinteraction.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerattackevent.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playerattackevent.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerplayertouch.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playertouch.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerplayerdamaged.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playerdamaged.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headergetitem.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playergetitem.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerequiptool.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playerequiptool.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headeruseitem.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playeruseitem.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerqueststate.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_queststate.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerlearningget.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_learningget.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerlearningerase.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_learningerase.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerpowerusage.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_poweruse.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerdialogchoice.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_dialogchoice.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerplayerpos.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playerpos.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headerplayerattack.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_playerattack.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

$filename3 = $filename . '_headereventstate.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);
$filename3 = $filename . '_stateevent.txt';
$myfile3 = fopen($filename3, 'r') or die('FAILED');
fwrite($myfile, fread($myfile3, filesize($filename3)));
fclose($myfile3);

//$filename3 = $filename . '_headertoolusage.txt';
//$myfile3 = fopen($filename3, 'r') or die('FAILED');
//fwrite($myfile, fread($myfile3, filesize($filename3)));
//fclose($myfile3);
//$filename3 = $filename . '_playertoolusage.txt';
//$myfile3 = fopen($filename3, 'r') or die('FAILED');
//fwrite($myfile, fread($myfile3, filesize($filename3)));
//fclose($myfile3);

fclose($myfile);
echo 'SUCCESS';
}
}

?>
