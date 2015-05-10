<div class="container" id="posts">

        <?php foreach($this->posts as $post): ?>
            <form id="post" action="/posts/index" method="GET">
                <p><?php echo substr(htmlspecialchars($post[1]), 0, 150); echo "..."; ?></p>
                <span><?php echo $post[2] ?></span>
                <a href="/posts/singlePost/ <?= $post[0] ?>" class="buttons">Read more..</a>
                
                <div id="formInForm">
                    <form action="/comments/add">
                        <a href="/comments/add" class="button"/>Add comment</a>
                    </form>

                    <?php if ($this->isLoggedIn) : ?>
                        <form action="/posts/delete">
                            <a href="/posts/delete/<?= $post[0] ?>" class="button">Delete</a>
                        </form>
                    <?php endif; ?>

                    <a href="/comments/index/<?= $post[0] ?>" class="button" id="show-comments">Show Comments</a>
                </div>
            </form>
        <?php endforeach; ?>

</div>
<a href="/posts/index/<?= $this->page - 1 ?>/<?= $this->pageSize?>" class="paging">Previous</a>
<a href="/posts/index/<?= $this->page + 1 ?>/<?= $this->pageSize?>" class="paging">Next</a>

<a href="/posts/add" class="paging">Add new post</a>

