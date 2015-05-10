<div class="container" id="posts">

        <?php foreach($this->posts as $post): ?>
            <form id="post" action="/posts/index" method="GET">
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

                <button id="show-comments" name="show-comments" class="button">Show Comments</button>
                </div>

                <div id="#comments"></div>
            </form>
        <?php endforeach; ?>

</div>
<a href="/posts/index/<?= $this->page - 1 ?>/<?= $this->pageSize?>" class="paging">Previous</a>
<a href="/posts/index/<?= $this->page + 1 ?>/<?= $this->pageSize?>" class="paging">Next</a>

<a href="/posts/add" class="paging">Add new post</a>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $('#show-comments').on('click', function(ev) {
        $.ajax({
            url: 'comments/index',
            method: 'GET'
        }).success(function (data) {
            $('#comments').html(data);
        })
    });

