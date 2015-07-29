<?php

// connection to the database
include ("connect_db.php");
include ("functions.php");

delete_pro($con);
// header redirect index with a flag for delete and userpost 
header('Location: http://localhost/natureoftomorrow/procedures.php?deleted=1&userpost=1');

?>