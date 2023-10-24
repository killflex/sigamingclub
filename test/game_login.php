<?PHP
$servername = "localhost";
$username = "u0145610";
$password = "Z)1faA41V4";
$dbname = "u0145610_commerce";
$user = $_POST['user'];
$pass = $_POST['password'];
$logincode = $_POST['kodelogin'];
$passcode = $_POST['passcode'];
$echouser = "";
$echopass = "";
$echoname = "";
$echopoint = 0;


//1st and foremost, check passcode
if($passcode != "braba6677TUAN")
{
	//might be a hacker...
	exit;
}


$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("connection failed");
}
//echo "Connected successfully <br>";

//check username and password 
$sql = "SELECT * FROM kustomer WHERE username='" . $user . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) <= 0) 
{
//username doesn't exist
echo "username not found";
mysqli_close($conn);
exit;
}

//check password
while($row = mysqli_fetch_assoc($result)) 
{
if($row["password"] != $pass)
{
//password is wrong
echo "wrong password";
mysqli_close($conn);
exit;
}
else
{
//password is correct
$echouser = $row["username"];
$echopass = $row["password"];
$echoname = $row["nama_lengkap"];
$echopoint = $row["poin_fitur"];

}

//check login status
if($row["kode_login"] != '0')
{

//check login time
$logintime = new DateTime($row["waktu_login"], new DateTimeZone('Asia/Jakarta'));
$logintimelimit = new DateTime($row["waktu_login"], new DateTimeZone('Asia/Jakarta'));
$interval = new DateInterval('P1D');
$logintimelimit->add($interval);
$datenow = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

if($datenow >= $logintimelimit)
{
//login session is expired
echo "login is expired";
mysqli_close($conn);
exit;

} 

if($row["kode_login"] != $logincode)
{
//someone is already using this username to play the game
echo "login code doesn't match";
mysqli_close($conn);
exit;
}
}
else
{
//login session is expired
echo "login is expired";
mysqli_close($conn);
exit;

}

//update login time
$sql = "UPDATE kustomer SET kode_login='" . $logincode . "', waktu_login = now() WHERE username='" . $user . "'";

$result = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn) <= 0)
{
echo "error changing login code";
mysqli_close($conn);
exit;

}


echo "success&" . $echouser . "&" . $echopass . "&" . $echoname . "&" . $echopoint . "&" . $logincode;
}

//do another query for features
$sql = "SELECT * FROM fitur_pemain WHERE username='" . $user . "'";
$result = mysqli_query($conn, $sql);


$featurenum = 0;
$featurearray = array();

while($row = mysqli_fetch_assoc($result))
{
$featurenum += 1;
//check purchase time
$purchasetime = new DateTime($row["waktu_beli"], new DateTimeZone('Asia/Jakarta'));
$purchasetimelimit = new DateTime($row["waktu_beli"], new DateTimeZone('Asia/Jakarta'));
$interval = new DateInterval('P30D');
$purchasetimelimit->add($interval);
$datenow = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

if($datenow >= $purchasetimelimit)
{
//feature is expired
//delete the feature
$sql2 = "DELETE FROM fitur_pemain WHERE id=" . $row["id"];
$result2 = mysqli_query($conn, $sql2);
} 
else
{
$featurearray[] = $row["fitur"];
}
}

echo "&" . strval(count($featurearray));
if(count($featurearray) < $featurenum)
{
//some features have been deleted
echo "&deletion";
}
else
{
echo "&intact";
}
for($i = 0; $i < count($featurearray); $i++)
{
echo "&" . $featurearray[$i];
}


mysqli_close($conn);

?>
