<?php 
    $db = sqlite_open("mytest.db");
    $db1 = new SQLiteDatabase("mytest1.db");
    sqlite_close($db);
    unset($db1);
?>
