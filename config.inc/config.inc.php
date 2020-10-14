
 <?php
 $db = connectDB();

 function connectDB() {
     static $myDb = null;
     $dbName = "h2lem";
     $dbUser = "Admin05";
     $dbPass = "support12345";
     if ( $myDb === null ) {
     $myDb = new PDO(
     "mysql:host=127.0.0.1;dbname=$dbName;charset=utf8",
     $dbUser, $dbPass,
     [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
     PDO::ATTR_EMULATE_PREPARES => false ] );
     
     }
     return $myDb;
 }

