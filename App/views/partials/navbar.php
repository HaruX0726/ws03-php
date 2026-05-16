<?php use Framework\Session; ?>

<!-- Nav -->
<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="/">JobSeek</a>
        </h1>
        <nav class="flex items-center gap-4">
            <?php if (Session::has('user')): ?>
                <span class="text-white">Welcome, <?= Session::get('user')['name'] ?></span>
                
                <form method="POST" action="/auth/logout" class="contents">
                    <button type="submit" class="text-white hover:underline bg-transparent border-none cursor-pointer p-0 text-base font-normal">Logout</button>
                </form>
            <?php else: ?>
                <a href="/auth/login" class="text-white hover:underline">Login</a>
                <a href="/auth/register" class="text-white hover:underline">Register</a>
            <?php endif; ?>
            <a href="/listings/create"
                class="bg-white hover:bg-gray-100 text-black px-4 py-2 rounded hover:shadow-md transition duration-300">
                <i class="fa fa-edit"></i> Post a Job
            </a>
        </nav>
    </div>
</header>