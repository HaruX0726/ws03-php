<?php if (!empty($errors)) : ?>
    <?php foreach ($errors as $error) : ?>
        <div class="bg-red-100 text-red-600 p-2 my-2 rounded">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>