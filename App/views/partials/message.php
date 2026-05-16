<?php if (isset($_SESSION['success_message'])): ?>
    <div class="message bg-green-500 text-white font-semibold p-4 my-3 rounded-lg shadow border-l-4 border-green-700 flex items-center gap-2">
        <span>✔</span>
        <?= $_SESSION['success_message'] ?>
    </div>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_message'])): ?>
    <div class="message bg-red-500 text-white font-semibold p-4 my-3 rounded-lg shadow border-l-4 border-red-700 flex items-center gap-2">
        <span>✖</span>
        <?= $_SESSION['error_message'] ?>
    </div>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>
