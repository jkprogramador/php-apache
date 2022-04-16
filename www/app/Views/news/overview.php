<?php if (!empty($news) && is_array($news)) : ?>

    <?php foreach ($news as $news_item) : ?>
        <article>
            <h2><?= esc($news_item['title']) ?></h2>

            <p>
                <?= esc($news_item['body']) ?>
            </p>

            <footer>
                <a title="View article <?= esc($news_item['slug']) ?>" href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a>
            </footer>

        </article>
    <?php endforeach ?>

<?php else : ?>
    <h3>No news</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>