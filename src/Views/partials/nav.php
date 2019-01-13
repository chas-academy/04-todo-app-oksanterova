<header class="header">
    <h1>todos</h1>
    <form id="create-todo" method="post" action="todos">
      <input name="title" class="new-todo" placeholder="What needs to be done?" autofocus>
    </form>
</header>

<section class="main">
    <form id="toggle-todos" method="post" action="todos/toggle-all">
    <?
        $hasIncompleted = empty(array_filter($todos, function($todo) { return $todo['completed'] === "false"; }));
    ?>
        <input <?= $hasIncompleted ? 'checked=""' : "" ?> onChange="this.form.submit()"
            name="toggle-all" id="toggle-all" class="toggle-all" type="checkbox">
        
        <label for="toggle-all">Mark all as complete</label>
    </form>
</section>