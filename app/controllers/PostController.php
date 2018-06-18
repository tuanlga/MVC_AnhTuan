<?php 
require_once 'app/models/Post.php';

/**
 * summary
 */
class PostController
{

    public function index()
    {
    	$posts = Post::all();
    	// var_dump($posts);die;
        include_once 'app/views/posts/index.php';
    }

    public function create()
    {
    	include_once 'app/views/posts/create.php';
    }

    public function store()
    {
    	$title = $_POST['title'];
    	$description = $_POST['description'];
    	$author = $_POST['author'];
    	$image = $_POST['image'];

    	$post = new Post();

    	$post->title = $title;
    	$post->description = $description;
    	$post->author = $author;
    	// var_dump($title);die;
    	$post->insert();

    	header("location: ./");
    }
}