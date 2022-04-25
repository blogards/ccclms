<?php 

 $category = 'Books';
 $status   = 'Available';
// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!
$dbHost = "localhost";
$dbName = "ccc_lms";
$dbChar = "utf8";
$dbUser = "root";
$dbPass = "";
try {
  $pdo = new PDO(
    "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbChar,
    $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }
 
// (B) READ UPLOADED CSV
$fh = fopen($_FILES["file"]["tmp_name"], "r");
if ($fh === false) { exit("Failed to open uploaded CSV file"); }
 
// (C) IMPORT ROW BY ROW
while (($row = fgetcsv($fh)) !== false) {
  try {
    // print_r($row);
    $pdo->exec("INSERT INTO `library-resources` (barcode, title, category, status) 
    VALUES('".$row[0]."', '".$row[1]."', '$category', '$status')");
    $pdo->exec("INSERT INTO books (barcode, title, edition, volume, author, publisher, class, pages, remarks, date_received, `year`, cash_price, sof) 
    VALUES ('".$row[0]."', '".$row[1]."', '".$row[2]."', '".$row[3]."', '".$row[4]."', '".$row[5]."', '".$row[6]."', '".$row[7]."', '".$row[8]."', '".$row[9]."', '".$row[10]."', '".$row[11]."', '".$row[12]."')");
  } catch (Exception $ex) { echo $ex->getmessage(); }
}
fclose($fh);
echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"../../books.php\"
                </script>";