<?php

class BadlyDesignedBlogClass
{
    public function blogPost($post_id)
    {
        if (!\Auth::check() ) {
            throw new \Exception("You are not authorized."); 
        }
 
        $db = $this->dbConnection();
        $sql_query = "select * from posts where id = ?";
 
        $post = $this->dbRawSql($db, $sql_query, $post_id);
       
        if (!empty($_POST['title'])) {
            $this->editPost($post, $_POST['title']);
            echo "Saved successfully!";
            return true;
        }
 
        echo "<h1>Post #" . e($post->id). ": " . e($post->title) . "</h1>";
        echo "<p>Fill out this form to edit</p>";
        echo "<form>";
        echo "<input type='text' name='title' value='" . e($post->title) . "'>";
        echo "<input type=submit>";
        echo "</form>";
 
        return true;
    }
 
    protected function editPost(BlogPost $post, $new_title)
    {
        // update post info
    }
    protected function dbConnection()
    {
        // connect to the database
    }
    protected function dbRawSql($db, $sql, $params)
    {
        // query execution in the database
    }
}