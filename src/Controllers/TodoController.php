<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller {
    
    public function get()
    {
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add()
    {
        $body = filter_body();
        $result = TodoItem::createTodo($body['title']);

        if ($result) {
          $this->redirect('/');
        }
    }

    public function update($urlParams)
    {
        $body = filter_body();
        $todoId = $urlParams['id'];
        $completed = isset($body['status']) ? 1 : 0;

        $result = TodoItem::updateTodo($todoId, $body['title'], $completed);

        if ($result) {
          $this->redirect('/');
        }
        else {
          throw new \Exception("Error occured when trying to update todos.");
      }
    }

    public function delete($urlParams)
    {
      $todoId = $urlParams['id'];
      $result = TodoItem::deleteTodo($todoId);

        if ($result) {
          $this->redirect('/');
        }
    }

    public function toggle()
    {
      $body = filter_body();
      $completed = isset($body['toggle-all']) ? 1 : 0;

      $result = TodoItem::toggleTodos($completed);

      if ($result) {
        $this->redirect('/');
      }      
    }

    public function clear()
    {
      $result = TodoItem::clearCompletedTodos();

      if ($result) {
        $this->redirect('/');
      }
    }

}
