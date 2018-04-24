<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$URL = "https://jsonplaceholder.typicode.com/";

$posts = file_get_contents($URL . "posts");
$posts = json_decode($posts);
$posts = array_slice($posts, 0, 10); // Limit to 10, to speed up!

$contentList = [];
foreach ($posts as $post) {
    $post = Post::make($post);

    $comments = json_decode(file_get_contents($URL . "posts/" . $post->getId() . "/comments"));
    foreach ($comments as $comment) {
        $comment = Comment::make($comment);

        $post->addComment($comment);
    }

    $contentList[] = $post;
}

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
            <?php foreach ($contentList as $post): ?>
                <div class="col-md-6 offset-md-3">
                    <h4>[#<?= $post->getId() ?>] <?= $post->getTitle() ?></h4>
                    <p>
                        <?= $post->getBody() ?>
                    </p>
                    <p class="text-right">
                        <a class="btn btn-secondary" href="view_post.php?post_id=<?= $post->getId() ?>" role="button">
                            Read <?=count($post->getComments())?> Comments...
                        </a>
                    </p>
                </div>
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