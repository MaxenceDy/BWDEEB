<?php
    $sql = 'SELECT COUNT(*) FROM Like_Photo';

    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

    $data = mysql_fetch_array($req);

    mysql_free_result ($req);
    mysql_close ();
?>