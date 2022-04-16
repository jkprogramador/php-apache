<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="/news/create" method="post">
    <?= csrf_field() ?>
    <label for="title">Title</label>
    <input type="text" name="title" id="title">

    <label for="body">Text</label>
    <textarea name="body" id="body" cols="45" rows="4"></textarea>

    <input type="submit" value="Create news item">
</form>