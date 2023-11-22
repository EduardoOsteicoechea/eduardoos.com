<?php
    function insert_without_fetchAll($connection, $sql)
    {
        $stmt = $connection->prepare($sql);
        $stmt->execute();
    }
?>