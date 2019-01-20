<footer class="footer">
    <span class="todo-count"><?= count(array_filter($todos, function($todo) { return $todo['completed'] === "false"; })) ?> item<?= "".count($todos) !== 1 ? "s" : "" ?> left</span>

    <ul class="filters">
        <li>
            <a href="/" class="<?= $filter == "all" ? "selected" : "" ?>">All</a>
        </li>
        <li>
            <a href="/active" class="<?= $filter == "active" ? "selected" : "" ?>">Active</a>
        </li>
        <li>
            <a href="/completed" class="<?= $filter == "completed" ? "selected" : "" ?>">Completed</a>
        </li>
    </ul>

    <form method="post" action="todos/clear-completed">
        <button type="submit" class="clear-completed" name="clear-completed">Clear completed</button>
    </form>
</footer>

</main>

<footer class="site-footer">
    <div class="small-container">
        <p class="text-center">Made by <a href="#">Oksana Kanterova</a></p>
    </div>
</footer>

<script type="module" src="<?= $this->getScript('scripts'); ?>"></script>

</body>

</html>