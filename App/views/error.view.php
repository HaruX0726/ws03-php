<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('top-banner'); ?>


<section>
    <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-700 p-3"><?= $status ?></div>
        <p class="text-center text-2xl mb-4">
            <?= $message ?>
        </p>
        <a href="/listings" class="block w-full md:w-auto bg-gray-700 hover:bg-gray-900 text-white rounded-lg px-4 py-2 my-3">Go Back to Listings</a>
    </div>
</section>
