<html>
    <head>
                       <!-- <link rel="stylesheet" type="text/css" href="login.css">
                       <link rel="stylesheet" type="text/css" href="searchpage.css"> -->
                       <link rel="stylesheet" type="text/css" href="searchpage.css">

    </head>
<body>

    <div class="navigation-bar">


      <div id="navigation-container">

        <img src="logo.png">

         <ul>
          <li><a href="avl.php">Home</a></li>
          <li><a href="usersearch.php">Search Books</a></li>
          <li><a href="request.php">Request Books</a></li>

          <li><a href="pagewithnav.html">Logout</a></li>
        </ul>
    </div>
</div><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iwp";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<div style='border-radius: 5px;display: block;margin-left: auto;margin-top:100px;margin-right: auto;width: 100%;padding: 20px;';align='cenetr'><form method='POST'>
<input type='text' name='book' placeholder='Book name.....' required><br>
<input type='text' name='author' placeholder='Author name....' required><br>
<input type='number' name='quan'placeholder='quantity of the book...'required><br>
<input type='submit' value='Add Request' name='up' onsubmit=''></form></div>";

if(isset($_POST['up']))
{
$id = (isset($_POST['book']) ? $_POST['book'] : '');
$id1 = (isset($_POST['author']) ? $_POST['author'] : '');
$id2 = (isset($_POST['quan']) ? $_POST['quan'] : '');


$sql="SELECT * FROM requesttable WHERE BOOK_TITLE='$id'";
$u = $conn->query($sql);

$r="SELECT QUANTITY FROM requesttable WHERE BOOK_TITLE='$id'";
$p = $conn->query($r);
$row = $p->fetch_assoc();
$q=(int)$id2+(int)$row;


if(mysqli_num_rows($u)>=1)
   {
    $sq = "UPDATE requesttable SET QUANTITY='$id2' WHERE BOOK_TITLE='$id'";
    $upd = $conn->query($sq);
    echo '<center><span style="color:white;text-align:center;"><h2>Your request is accepted.<h2></span></center>';
}



  else
    {
   $sq="INSERT INTO requesttable (BOOK_TITLE,AUTHOR_NAME, QUANTITY)
VALUES ('$id','$id1','$id2')";
$upd = $conn->query($sq);
echo '<center><span style="color:white;text-align:center;"><h2>Your request is accepted.<h2></span></center>';
}
}


        $conn->close();
?>
<div class="footer">
    <div class="navigation-bar">
      <div id="navigation-container">
  <ul>
  <li>
  <img src="logo.png">
  </li>
  <li>&nbsp; &nbsp;
    Address:
    MIT WPU,
    Kothrud,
    Pune,
    Maharashtra 411038
  </li>
  <li>&nbsp; &nbsp;
    Contact Us:
    Email:mitbooks@gmail.com&nbsp; &nbsp;
    Mobile No: +91987654321
  </li>
  </ul>
    </div>
</div>
</div>
  </body>
  </html>
