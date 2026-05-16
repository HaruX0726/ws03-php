<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('top-banner'); ?>

<section>
    <div class="container mx-auto p-4 mt-4">
        <div class="flex justify-between items-center mb-4">
            <a href="/listings" class="text-blue-500 hover:underline">
                <i class="fa fa-arrow-left"></i> Back To Listings
            </a>
            <div class="flex gap-2">
                <a href="/listings/edit?id=<?= $listing->id ?>"
                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">
                    Edit
                </a>

                <form method="POST" action="/listings/<?= $listing->id ?>">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                        Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-2xl font-bold mb-2"><?= $listing->title ?></h2>
            <p class="text-lg mt-2 mb-4"><?= $listing->description ?></p>

            <ul class="my-4 bg-gray-100 p-4 rounded">
                <li class="mb-2"><strong>Salary:</strong> <?= formatSalary($listing->salary) ?></li>
                <li class="mb-2">
                    <strong>Location:</strong> <?= $listing->city ?>, <?= $listing->state ?>
                    <span class="text-xs bg-blue-500 text-white rounded-full px-2 py-1 ml-2">Local</span>
                </li>
                <?php if(!empty($listing->tags)): ?>
                <li class="mb-2">
                    <strong>Tags:</strong><?= $listing->tags ?>
                </li>
                <?php endif ?>
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-xl font-bold mb-4">Job Details</h3>

            <h4 class="text-blue-500 font-semibold mb-2">Job Requirements</h4>
            <p class="mb-4"><?= $listing->requirements ?></p>

            <h4 class="text-blue-500 font-semibold mb-2">Benefits</h4>
            <p class="mb-4"><?= $listing->benefits ?></p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <p>Put "Job Application" as the subject of your email and attach your resume.</p>
            <a href="mailto:<?= $listing->email ?>"
                class="block mt-4 text-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded">
                Apply Now
            </a>
        </div>
    </div>
</section>

<?php loadPartial('bottom-banner'); ?>
<?php loadPartial('footer'); ?>