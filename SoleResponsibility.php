<?php

class BlogController
{
    protected $blog_repository;
 
    public function __construct(BlogRepository $blog_repository)
    {
        $this->blog_repository = $blog_repository;
    }
 
    public function show($post_id)
    {
        if (!\Auth::check()) {
            throw new \Exception("You are not registred. Register and repeat your request.");
        }
 
        $post = $this->blog_repository->find($post_id);
 
        return view('show_post.php', ['post' => $post]);
    }
    
    public function update($post_id)
    {
        $post = $this->blog_repository->find($post_id);
        $post->update(['title'] => $_POST['title']);
        return view('updated_post.php');
    }
}
 
class BlogRepository
{
    protected $connection;
 
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
 
    public function find($id)
    {
        // query to the database to search for a post by ID
        // $this->connection->query("SELECT * FROM `posts` WHERE id = ?", $id);
    }
}