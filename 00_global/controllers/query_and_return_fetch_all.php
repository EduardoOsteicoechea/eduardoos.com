<?php
    function query_and_return_fetchAll($connection, $sql)
    {
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
?>