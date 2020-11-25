<?php 
    try {
        $db = new PDO('mysql:host=localhost;dbname=sqlipoo;charset=utf8','root','');
    } catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
    }
    
    $task = "list";

    if (array_key_exists("task", $_GET)) {
        $task = $_GET['task'];
    }

    if ($task == "write") {
        postMessage();
    } else {
        getMessage();
    }

    function getMessage() :Void {
        global $db;
        $result = $db->query("SELECT * FROM chat ORDER BY created_at DESC LIMIT 20");
        $messages = $result->fetchAll();
        echo json_encode($messages);
    }

    function postMessage() :Void {
        global $db;

        if (!array_key_exists('author', $_POST) || !array_key_exists('content', $_POST)) {
            echo json_encode(["status" => "error", "message" => "Error field not sent"]);
            return;
        }

        $author  = $_POST['author'];
        $content = $_POST['content'];

        $query = $db->prepare('INSERT INTO chat SET author = :author, content = :content , created_at = NOW()');
        $query->execute(array(
            ':author' => $author,
            ':content' => $content));

        echo json_encode(["status" => "Success"]);
    }
?>