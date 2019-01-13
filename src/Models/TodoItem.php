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

    public static function updateTodo($todoId, $title, $completed)
    {
        $query = <<<SQL
        UPDATE todos
        SET title = :title,
        completed = :completed
        WHERE id = :id;
SQL;

        static::$db->query($query);
        static::$db->bind(':id', $todoId);
        static::$db->bind(':title', $title);
        static::$db->bind(':completed', $completed ? "true" : "false");
        $result = static::$db->execute();

        return $result;        
    }

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
    
    public static function toggleTodos($completed)
    {
        $query = <<<SQL
        UPDATE todos
        SET completed = :completed
SQL;

        static::$db->query($query);
        static::$db->bind(':completed', $completed ? "true" : "false");
        $result = static::$db->execute();

        return $result;        
    }

    public static function clearCompletedTodos()
    {
        $query = <<<SQL
        DELETE FROM todos WHERE completed = "true";
SQL;

        static::$db->query($query);
        $success = static::$db->execute();

        return $success;        
    }

}
