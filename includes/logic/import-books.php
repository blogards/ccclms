<?php 

 
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


if(isset($_POST['import_books_btn'])) {
  importBooks();
}
function importBooks() {
  global $pdo, $fh;

    $category = 'Books';
    $status   = 'Available';
    $flag = true;
    // (C) IMPORT ROW BY ROW
    while (($row = fgetcsv($fh)) !== false) {
      if($flag) { 
        $flag = false; 
        continue; 
      }
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
}
if(isset($_POST['import_avm_btn'])) {
  importAudioVisual();
}
function importAudioVisual() {
    global $pdo, $fh;

    $category = 'Audio Visual Material';
    $status   = 'Available';
    $flag = true;
    // (C) IMPORT ROW BY ROW
    while (($row = fgetcsv($fh)) !== false) {
      if($flag) { 
        $flag = false; 
        continue; 
    }
    try {
      $dateI = $row[6];
      $newDate = date("Y-m-d", strtotime($dateI));  
       
      // print_r($row);
      $pdo->exec("INSERT INTO `library-resources` (barcode, `title`, category, status) 
      VALUES('".$row[0]."', '".$row[1]."', '$category', '$status')");
      $pdo->exec("INSERT INTO `audio-visual` (`barcode`, `title`, `grade_level`, `subject`, `duration`, `copyright`, `date_received`) 
      VALUES ('".$row[0]."', '".$row[1]."', '".$row[2]."', '".$row[3]."', '".$row[4]."', '".$row[5]."', '$newDate')");
    } catch (Exception $ex) { echo $ex->getmessage(); }
  }
  fclose($fh);
  echo "<script type=\"text/javascript\">
        alert(\"CSV File has been successfully Imported.\");
        window.location = \"../../audio-visual.php\"
        </script>";
}

if (isset($_POST['import_mnscrpt_btn'])) {
    importManuscript();
}
function importManuscript() {
    global $pdo, $fh;
    $category = 'Manuscript/Narrative';
    $status = 'Available';
    $flag = true;
    // (C) IMPORT ROW BY ROW
    while (($row = fgetcsv($fh)) !== false) {
      if($flag) { 
        $flag = false; 
        continue; 
      }
      try {
        $dateI = $row[6];
        $newDate = date("Y-m-d", strtotime($dateI));  
        
        // print_r($row);
        $pdo->exec("INSERT INTO `library-resources` (barcode, title, category, status) 
        VALUES('".$row[0]."', '".$row[1]."', '$category', '$status')");
        $pdo->exec("INSERT INTO `manuscript` (`barcode`, title, `author`, `course`, `year`) 
        VALUES ('".$row[0]."', '".$row[1]."', '".$row[2]."', '".$row[3]."', '".$row[4]."')");
      } catch (Exception $ex) { echo $ex->getmessage(); }
    }
    fclose($fh);
    echo "<script type=\"text/javascript\">
          alert(\"CSV File has been successfully Imported.\");
          window.location = \"../../manuscript.php\"
          </script>";

}

if(isset($_POST['import_publication_btn'])) {
    importPublication();
}
function importPublication() {
      global $pdo, $fh;
      $category = 'Government Publication';
      $status = 'Available';
      $flag = true;
      // (C) IMPORT ROW BY ROW
      while (($row = fgetcsv($fh)) !== false) {
        if($flag) { 
          $flag = false; 
          continue; 
        }
        try {
          $dateI = $row[4];
          $newDate = date("Y-m-d", strtotime($dateI));  
          
          // print_r($row);
          $pdo->exec("INSERT INTO `library-resources` (barcode, title, category, status) 
          VALUES('".$row[0]."', '".$row[1]."', '$category', '$status')");
          $pdo->exec("INSERT INTO `publications` (`barcode`, title, `volume`, `copy`, `date`, `issn`, `subject`) 
          VALUES ('".$row[0]."', '".$row[1]."', '".$row[2]."', '".$row[3]."', '$newDate', '".$row[5]."', '".$row[6]."')");
        } catch (Exception $ex) { echo $ex->getmessage(); }
      }
      fclose($fh);
      echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"../../gov-publication.php\"
            </script>";
}

if(isset($_POST['import_thesis_btn'])) {
  importThesis();
}
function importThesis() {
    global $pdo, $fh;
    $category = 'Thesis and Dissertation';
    $status = 'Available';
    $flag = true;
    // (C) IMPORT ROW BY ROW
    while (($row = fgetcsv($fh)) !== false) {
      if($flag) { 
        $flag = false; 
        continue; 
      }
      try {
        $dateI = $row[4];
        $newDate = date("Y-m-d", strtotime($dateI));  
        
        // print_r($row);
        $pdo->exec("INSERT INTO `library-resources` (barcode, title, category, status) 
        VALUES('".$row[0]."', '".$row[1]."', '$category', '$status')");
        $pdo->exec("INSERT INTO `thesis` (`barcode`, `title`, `author`, `year`) 
        VALUES ('".$row[0]."', '".$row[1]."', '".$row[2]."', '".$row[3]."')");
      } catch (Exception $ex) { echo $ex->getmessage(); }
    }
    fclose($fh);
    echo "<script type=\"text/javascript\">
          alert(\"CSV File has been successfully Imported.\");
          window.location = \"../../thesis.php\"
          </script>";
}

if(isset($_POST['import_journal_btn'])) {
  importJournal();
}
function importJournal() {
    global $pdo, $fh;
    $category = 'Journals';
    $status = 'Available';
    $flag = true;
    // (C) IMPORT ROW BY ROW
    while (($row = fgetcsv($fh)) !== false) {
      if($flag) { 
        $flag = false; 
        continue; 
      }
      try {
        $dateI = $row[4];
        $newDate = date("Y-m-d", strtotime($dateI));  
        
        // print_r($row);
        $pdo->exec("INSERT INTO `library-resources` (barcode, title, category, status) 
        VALUES('".$row[0]."', '".$row[1]."', '$category', '$status')");
        $pdo->exec("INSERT INTO `journals` (`barcode`, title, `volume`, `copy`, `date`, `issn`, `subject`) 
        VALUES ('".$row[0]."', '".$row[1]."', '".$row[2]."', '".$row[3]."', '$newDate', '".$row[5]."', '".$row[6]."')");
      } catch (Exception $ex) { echo $ex->getmessage(); }
    }
    fclose($fh);
    echo "<script type=\"text/javascript\">
          alert(\"CSV File has been successfully Imported.\");
          window.location = \"../../journals.php\"
          </script>";
}