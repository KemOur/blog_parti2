<label for="title">Title</label>
<input style="width: 945px" type="text" name="title" id="title" <?php if (!empty($_SESSION['old']['title'])) : ?> value="<?= $_SESSION['old']['title'] ?>" <?php elseif (!empty($post)) : ?> value="<?= $post->title ?>" <?php endif ?>>

<br><br>

<label for="body">L'article:</label>
<textarea cols="50" rows="5" name="body" id="body">
<?php if (!empty($_SESSION['old']['body'])) : ?> <?= $_SESSION['old']['body'] ?> <?php elseif (!empty($post)) : ?> <?= $post->body ?> <?php endif ?>
</textarea>

<br><br>