<div class="container" id="jumboColumn">
    <div class="jumbotron col-md-9">
        <h1>Welcome to home!</h1>
        <p>
            When you understand that the Universe is within you, and by its very nature it is for you, wanting you to
            have more life, more health, more love, more beauty, and more of everything you want, then you will feel
            genuine gratitude to the Universe for everything you receive in your life.
        </p>

        <div class="logReg">
            <?php if(!$this->isLoggedIn): ?>
                <a href="/accounts/login">Login</a>
                <a href="/accounts/register">Register</a>
                <button id="show-posts" class="button">Show Posts</button>
            <?php endif; ?>

        </div>

        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script>
            $('#show-posts').on('click', function(ev) {
                $.ajax({
                    url: 'posts/showPosts',
                    method: 'GET'
                }).success(function (data) {
                    $('#posts').html(data);
                })
            });
        </script>
    </div>

    <div id="posts"></div>
</div>