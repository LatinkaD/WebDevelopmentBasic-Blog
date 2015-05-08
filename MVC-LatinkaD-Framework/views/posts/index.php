<div class="container" id="posts">

        <?php foreach($this->posts as $post): ?>
            <form id="post" action="/posts/index" method="GET">
                <p><?php echo htmlspecialchars($post[1]) ?></p>
                <span><?php echo $post[2] ?></span>
                <?php if ($this->isLoggedIn) : ?>
                    <div id="formInForm">
                        <form action="/comments/add">
                            <a href="/comments/add" class="button"/>Add comment</a>
                        </form>
                        <form action="/posts/delete">
                            <a href="/posts/delete/<?= $post[0] ?>" class="button">Delete</a>
                        </form>
                        <form action="/tags">
                            <p class="button">Tags: </p>
                        </form>
                        <p><?php echo $commentCount ?></p>
                        <?php foreach ($this->comments as $comment): ?>
                            <div id="comments">
                                <p><?php htmlspecialchars($comment['comment']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                    <!-- <?php foreach ($this->filtTags as $tag): ?>
                    <div id="tags">
                        <p><?php htmlspecialchars($tag['tag']) ?></p>
                    </div>
                <?php endforeach; ?>-->
            </form>
        <?php endforeach; ?>

</div>
<a href="/posts/index/<?= $this->page - 1 ?>/<?= $this->pageSize?>" class="paging">Previous</a>
<a href="/posts/index/<?= $this->page + 1 ?>/<?= $this->pageSize?>" class="paging">Next</a>

<a href="/posts/add" class="paging">Add new post</a>
