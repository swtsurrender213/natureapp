<?php

// connection to the database
include ("connect_db.php");
include ("functions.php");

delete_pet($con);
// header redirect index with a flag for delete and userpost 
header('Location: http://localhost/natureoftomorrow/index.php?deleted=1&userpost=1');

?>