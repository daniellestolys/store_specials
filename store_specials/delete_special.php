<?php
require_once ('db_conn.php');
$id = (int)($_GET['id'] ??0);
if ($id) {
    try{
        $stmt = $pdo->prepare("DELETE FROM specials WHERE id=?");
        $stmt->execute([$id]);
    }
    catch (PDOException $e){
        //silently fail or log; for demo ignore
    }
}
header('Location:staff_specials.php');
exit;
?>