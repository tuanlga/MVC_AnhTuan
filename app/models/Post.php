<?php 
require_once 'BaseModel.php';
/**
 * summary
 */
class Post extends BaseModel
{
    public $tableName = "posts";

    public $columns = ['title', 'description', 'author', 'created_by'];
}


