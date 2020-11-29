<?php $this->layout('layouts/default', ['title' => 'My blog']) ?>

<?php if (!empty($_SESSION['success'])) : ?>
    <div class="success"><?= $_SESSION['success'] ?></div>
<?php endif ?>

<a href="/create">
    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
    </svg>
</a>
<a style="float: right" href="/generate">FAKER</a>

<?php foreach ($posts as $post) : ?>
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <div class="media text-muted pt-3">
        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a href="/show?id=<?= $this->e($post->id) ?>">
                    <h3><?= $this->e($post->created_at_fr) ?> - <?= $this->e($post->title) ?></h3>
                </a>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>
