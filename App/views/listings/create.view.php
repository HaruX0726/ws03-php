<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<section class="container mx-auto p-4 mt-8 mb-8 max-w-2xl">
    <h2 class="text-4xl font-bold mb-8">Create Job Listing</h2>

    <form method="POST" action="/listings" class="bg-white rounded-lg shadow-md p-8 border border-gray-700">
        <!-- Job Info Heading -->
        <h2 class="text-2xl font-bold mb-6 text-center">Job Info</h2>

        <!-- Job Title -->
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold mb-2">Job Title</label>
        <?php if (!empty($errors)) : ?>
            <div class="bg-red-500 text-white font-semibold p-4 mb-6 rounded-lg shadow border-l-4 border-red-700">
                <p class="font-bold mb-2">✖ Please fix the following errors:</p>
                <ul class="list-disc list-inside space-y-1">
                    <?= loadPartial('errors', ['errors' => $errors ?? []]) ?>
                </ul>
            </div>
        <?php endif; ?>
            <input
                type="text"
                id="title"
                name="title"
                placeholder="Job Title"
                value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->title ?? '' ?>" />

        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-lg font-semibold mb-2">Job Description</label>
            <textarea
                id="description"
                name="description"
                rows="4"
                placeholder="Job Description"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white"><?= $listing->description ?? '' ?></textarea>
        </div>

        <!-- Salary -->
        <div class="mb-4">
            <label for="salary" class="block text-lg font-semibold mb-2">Annual Salary</label>
            <input
                type="text"
                id="salary"
                name="salary"
                placeholder="Annual Salary"
                value="<?= htmlspecialchars($_POST['salary'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->salary ?? '' ?>" />
        </div>

        <!-- Requirements -->
        <div class="mb-4">
            <label for="requirements" class="block text-lg font-semibold mb-2">Requirements</label>
            <input
                type="text"
                id="requirements"
                name="requirements"
                placeholder="Requirements"
                value="<?= htmlspecialchars($_POST['requirements'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->requirements ?? '' ?>" />
        </div>

        <!-- Benefits -->
        <div class="mb-6">
            <label for="benefits" class="block text-lg font-semibold mb-2">Benefits</label>
            <input
                type="text"
                id="benefits"
                name="benefits"
                placeholder="Benefits"
                value="<?= htmlspecialchars($_POST['benefits'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->benefits ?? '' ?>" />
        </div>
        <div class="mb-6">
            <label for="benefits" class="block text-lg font-semibold mb-2">Tags</label>
            <input
                type="text"
                id="tags"
                name="tags"
                placeholder="Tags"
                value="<?= htmlspecialchars($_POST['tags'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->tags ?? '' ?>" />
        </div>

        <!-- Section Heading -->
        <h3 class="text-2xl font-bold text-center mb-6">Company Info &amp; Location</h3>

        <!-- Company Name -->
        <div class="mb-4">
            <label for="company" class="block text-lg font-semibold mb-2">Company Name</label>
            <input
                type="text"
                id="company"
                name="company"
                placeholder="Company Name"
                value="<?= htmlspecialchars($_POST['company'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->company ?? '' ?>" />
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label for="address" class="block text-lg font-semibold mb-2">Address</label>
            <input
                type="text"
                id="address"
                name="address"
                placeholder="Address"
                value="<?= htmlspecialchars($_POST['address'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->address ?? '' ?>" />
        </div>

        <!-- City -->
        <div class="mb-4">
            <label for="city" class="block text-lg font-semibold mb-2">City</label>
            <input
                type="text"
                id="city"
                name="city"
                placeholder="City"
                value="<?= htmlspecialchars($_POST['city'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->city ?? '' ?>" />
        </div>

        <!-- State -->
        <div class="mb-4">
            <label for="state" class="block text-lg font-semibold mb-2">State</label>
            <input
                type="text"
                id="state"
                name="state"
                placeholder="State"
                value="<?= htmlspecialchars($_POST['state'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->state?? '' ?>" />
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label for="phone" class="block text-lg font-semibold mb-2">Phone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                placeholder="Phone"
                value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->phone?? '' ?>" />
        </div>

        <!-- Email -->
        <div class="mb-8">
            <label for="email" class="block text-lg font-semibold mb-2">Email Address For Applications</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Email Address For Applications"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" value="<?= $listing->email ?? '' ?>" />
        </div>

        <!-- Buttons -->
        <div class="flex flex-col gap-3">
            <button
                type="submit"
                class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors duration-300">
                Save
            </button>
            <a
                href="/listings"
                class="w-full py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg text-center transition-colors duration-300">
                Cancel
            </a>
        </div>

    </form>
</section>
<?php loadPartial('footer'); ?>