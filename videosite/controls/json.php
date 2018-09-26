<?php
require_once('include/config.inc.php');
echo get_code($db);

function get_code($db)
{
    $code = generate_uuid();
    $sql = 'SELECT * FROM loan WHERE LOAN_IDENTIFIER="'.$code.'"';
    $da = $db->execute_dql($sql);
    if($da){get_code($db);}
    return strtoupper($code);
}