<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        $query = <<<SQL
        INSERT INTO todos (title, created, completed) VALUES (:title, NOW(), 'false');
SQL;

        static::$db->query($query);
        static::$db->bind(':title', $title);
        $result = static::$db->execute();

        return $result;        
    }

    // // public static function updateTodo($todoId, $title, $completed = null)
    // // {
    // //     // TODO: Implement me!
    // //     // Update a specific todo
    // // }

    public static function deleteTodo($todoId)
    {
        $query = <<<SQL
        DELETE FROM todos WHERE id = :id;
SQL;

        static::$db->query($query);
        static::$db->bind(':id', $todoId);
        $success = static::$db->execute();

        return $success;        
    }
    
    // (Optional bonus methods below)
    // public static function toggleTodos($completed)
    // {
    //     // TODO: Implement me!
    //     // This is to toggle all todos either as completed or not completed
    // }

    // public static function clearCompletedTodos()
    // {
    //     // TODO: Implement me!
    //     // This is to delete all the completed todos from the database
    // }

}
