<?php
    include_once 'db.php';
    
     if ($_GET['news_id']) {
        $newsID = $_GET['news_id'];
        $sql_deleteNews = "DELETE FROM news WHERE news_id= $newsID";

        $result_deleteNews = $conn->prepare($sql_deleteNews);
        if($result_deleteNews->execute()) {
            header("Location:admin_newsList.php");
        } else {
            echo "Không xóa được tin tức";
        }
    }else {
        echo "Không tìm thấy tin tức";
    }

    

?>