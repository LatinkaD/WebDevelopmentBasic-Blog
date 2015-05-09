
<div>
    <ul>
        <?php foreach ($this->posts as $post) : ?>
            <div id="postsContainer">
                <li>
                    <?php echo $post['content']; ?>
                    <br/>
                    <?php echo $post['postDate']; ?>
                </li>
            </div>
        <?php endforeach; ?>
    </ul>
</div>
