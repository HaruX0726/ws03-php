<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<section class="container mx-auto p-4 mt-8 mb-8 max-w-2xl">
    <h2 class="text-4xl font-bold mb-8">Create Job Listing</h2>
    
    <form method="POST" class="bg-white rounded-lg shadow-md p-8 border border-gray-700">
        <!-- Job Title -->
        <div class="mb-6">
            <label for="title" class="block text-lg font-semibold mb-2">Job Title</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                placeholder="e.g., Senior Software Engineer"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white"
                required>
        </div>

        <!-- Company Name -->
        <div class="mb-6">
            <label for="company" class="block text-lg font-semibold mb-2">Company Name</label>
            <input 
                type="text" 
                id="company" 
                name="company" 
                placeholder="Your Company"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white"
                required>
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label for="description" class="block text-lg font-semibold mb-2">Job Description</label>
            <textarea 
                id="description" 
                name="description" 
                rows="6"
                placeholder="Describe the job responsibilities, requirements, and benefits..."
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white"
                required></textarea>
        </div>

        <!-- Salary -->
        <div class="mb-6">
            <label for="salary" class="block text-lg font-semibold mb-2">Salary</label>
            <input 
                type="text" 
                id="salary" 
                name="salary" 
                placeholder="e.g., $50,000 - $80,000"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white"
                required>
        </div>

        <!-- Location -->
        <div class="mb-6">
            <label for="location" class="block text-lg font-semibold mb-2">Location</label>
            <input 
                type="text" 
                id="location" 
                name="location" 
                placeholder="e.g., New York, NY"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white"
                required>
        </div>

        <!-- Tags/Skills -->
        <div class="mb-6">
            <label for="tags" class="block text-lg font-semibold mb-2">Tags/Skills</label>
            <input 
                type="text" 
                id="tags" 
                name="tags" 
                placeholder="e.g., PHP, Laravel, JavaScript (comma separated)"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white"
                required>
        </div>

        <!-- Type of Employment -->
        <div class="mb-6">
            <label for="type" class="block text-lg font-semibold mb-2">Type of Employment</label>
            <select 
                id="type" 
                name="type"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white"
                required>
                <option value="">Select Type</option>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Contract">Contract</option>
                <option value="Freelance">Freelance</option>
                <option value="Internship">Internship</option>
            </select>
        </div>

        <!-- Work Type -->
        <div class="mb-8">
            <label for="work_type" class="block text-lg font-semibold mb-2">Work Type</label>
            <select 
                id="work_type" 
                name="work_type"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-white"
                required>
                <option value="">Select Work Type</option>
                <option value="Local">Local</option>
                <option value="Remote">Remote</option>
                <option value="Hybrid">Hybrid</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="flex gap-4">
            <button 
                type="submit"
                class="flex-1 px-8 py-3 bg-blue-900 hover:bg-blue-800 text-white font-semibold rounded-lg transition-colors duration-300">
                <i class="fa fa-check mr-2"></i>Post Listing
            </button>
            <a 
                href="/listings"
                class="flex-1 px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg text-center transition-colors duration-300">
                <i class="fa fa-times mr-2"></i>Cancel
            </a>
        </div>
    </form>
</section>
<?php 
require basePath('views/partials/footer.php');
?>