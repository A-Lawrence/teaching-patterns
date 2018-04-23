<?php

if (!$postID = $_GET['post_id'] ?? null) {
    header("Location: index.php");
    exit();
}

$URL = "https://jsonplaceholder.typicode.com/";

$post = file_get_contents($URL . "posts/" . $postID);
$post = json_decode($post);
$post->comments = json_decode(file_get_contents($URL . "posts/" . $postID . "/comments"));

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<div class="jumbotron">
    <div class="container-fluid">
        <div class="row text-justify">
            <div class="col-md-6 offset-md-3">
                <h4>[#<?= $post->id ?>] <?= $post->title ?></h4>
                <p>
                    <?= $post->body ?>
                </p>
                <p class="text-right">
                    <a class="btn btn-secondary" href="index.php" role="button">
                        Back to index
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row text-justify">
        <div class="col-md-6 offset-md-3">
            <?php foreach($post->comments as $comment): ?>
                <p><?=$comment->body?></p>
                <hr />
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
</body>
</html>
