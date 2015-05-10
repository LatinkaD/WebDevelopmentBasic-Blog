<div class="comments">
    <ul>
        <?php foreach ($this->comments as $comment): ?>
        <li>
            <?php echo $comment['comment'] ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>