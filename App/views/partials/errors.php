<?php if (isset($errors)) : ?>
    <?php foreach ($errors as $error) : ?>
        <div class="message bg-red-500 text-white p-2 my-3 rounded">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>