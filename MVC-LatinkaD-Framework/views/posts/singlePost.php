<form action="/posts/index" method="GET">
    <p><?php echo htmlspecialchars($post[1]) ?></p>
    <span><?php echo $post[2] ?></span>

    <div id="formInForm">
        <form action="/comments/add">
            <a href="/comments/add" class="button"/>Add comment</a>
        </form>

        <?php if ($this->isLoggedIn) : ?>
            <form action="/posts/delete">
                <a href="/posts/delete/<?= $post[0] ?>" class="button">Delete</a>
            </form>
        <?php endif; ?>
</form>