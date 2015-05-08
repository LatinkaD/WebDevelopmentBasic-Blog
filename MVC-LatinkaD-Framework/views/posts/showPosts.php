
<div class="formContainer">
    <ul>
        <?php foreach ($this->posts as $post) : ?>
        <li>
            <?php echo $post['content']; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>