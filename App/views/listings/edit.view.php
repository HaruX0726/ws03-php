<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<style>
/* Force button text — inline beats Tailwind CDN */
button.btn-save, button.btn-save:hover,
a.btn-cancel, a.btn-cancel:hover, a.btn-cancel:visited {
    color: #ffffff !important;
    text-decoration: none !important;
}

.btn-save {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #10b981, #059669);
    color: #fff;
    font-weight: 700;
    font-size: 1rem;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    box-shadow: 0 4px 14px rgba(16,185,129,0.4);
    transition: transform 0.18s, box-shadow 0.18s, background 0.2s;
    letter-spacing: 0.3px;
}
.btn-save:hover {
    background: linear-gradient(135deg, #059669, #047857);
    box-shadow: 0 6px 20px rgba(16,185,129,0.6);
    transform: translateY(-2px);
}
.btn-cancel {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: #fff;
    font-weight: 700;
    font-size: 1rem;
    border-radius: 10px;
    text-align: center;
    text-decoration: none;
    display: block;
    box-shadow: 0 4px 14px rgba(239,68,68,0.35);
    transition: transform 0.18s, box-shadow 0.18s, background 0.2s;
    letter-spacing: 0.3px;
}
.btn-cancel:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    box-shadow: 0 6px 20px rgba(239,68,68,0.55);
    transform: translateY(-2px);
}
</style>

<section class="container mx-auto p-4 mt-8 mb-8 max-w-2xl">
    <h2 class="text-4xl font-bold mb-8">Edit Job Listing</h2>

    <form method="POST" action="/listings/<?= $listing->id ?>" class="bg-white rounded-lg shadow-md p-8 border border-gray-700">
        <input type="hidden" name="_method" value="PUT">

        <!-- Job Info Heading -->
        <h2 class="text-2xl font-bold mb-6 text-center">Job Info</h2>

        <?php if (!empty($errors)) : ?>
            <div class="bg-red-500 text-white font-semibold p-4 mb-6 rounded-lg shadow border-l-4 border-red-700">
                <p class="font-bold mb-2">✖ Please fix the following errors:</p>
                <ul class="list-disc list-inside space-y-1">
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Job Title -->
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold mb-2">Job Title</label>
            <input
                type="text"
                id="title"
                name="title"
                placeholder="Job Title"
                value="<?= htmlspecialchars($listing->title ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-lg font-semibold mb-2">Job Description</label>
            <textarea
                id="description"
                name="description"
                rows="4"
                placeholder="Job Description"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white"><?= htmlspecialchars($listing->description ?? '') ?></textarea>
        </div>

        <!-- Salary -->
        <div class="mb-4">
            <label for="salary" class="block text-lg font-semibold mb-2">Annual Salary</label>
            <input
                type="text"
                id="salary"
                name="salary"
                placeholder="Annual Salary"
                value="<?= htmlspecialchars($listing->salary ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
        </div>

        <!-- Requirements -->
        <div class="mb-4">
            <label for="requirements" class="block text-lg font-semibold mb-2">Requirements</label>
            <input
                type="text"
                id="requirements"
                name="requirements"
                placeholder="Requirements"
                value="<?= htmlspecialchars($listing->requirements ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
        </div>

        <!-- Benefits -->
        <div class="mb-4">
            <label for="benefits" class="block text-lg font-semibold mb-2">Benefits</label>
            <input
                type="text"
                id="benefits"
                name="benefits"
                placeholder="Benefits"
                value="<?= htmlspecialchars($listing->benefits ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
        </div>

        <!-- Tags -->
        <div class="mb-6">
            <label for="tags" class="block text-lg font-semibold mb-2">Tags</label>
            <input
                type="text"
                id="tags"
                name="tags"
                placeholder="Tags"
                value="<?= htmlspecialchars($listing->tags ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
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
                value="<?= htmlspecialchars($listing->company ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label for="address" class="block text-lg font-semibold mb-2">Address</label>
            <input
                type="text"
                id="address"
                name="address"
                placeholder="Address"
                value="<?= htmlspecialchars($listing->address ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
        </div>

        <!-- City -->
        <div class="mb-4">
            <label for="city" class="block text-lg font-semibold mb-2">City</label>
            <input
                type="text"
                id="city"
                name="city"
                placeholder="City"
                value="<?= htmlspecialchars($listing->city ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
        </div>

        <!-- State -->
        <div class="mb-4">
            <label for="state" class="block text-lg font-semibold mb-2">State</label>
            <input
                type="text"
                id="state"
                name="state"
                placeholder="State"
                value="<?= htmlspecialchars($listing->state ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label for="phone" class="block text-lg font-semibold mb-2">Phone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                placeholder="Phone"
                value="<?= htmlspecialchars($listing->phone ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
        </div>

        <!-- Email -->
        <div class="mb-8">
            <label for="email" class="block text-lg font-semibold mb-2">Email Address For Applications</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Email Address For Applications"
                value="<?= htmlspecialchars($listing->email ?? '') ?>"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white" />
        </div>

        <!-- Buttons -->
        <div class="flex flex-col gap-3">
            <button type="submit" class="btn-save">
                Update Listing
            </button>
            <a href="/listings/<?= $listing->id ?>" class="btn-cancel">
                Cancel
            </a>
        </div>

    </form>
</section>
<?php loadPartial('footer'); ?>