<?php
$successMessage = \Framework\Session::getFlashMessage('success_message');
$errorMessage = \Framework\Session::getFlashMessage('error_message');
?>

<?php if($successMessage !== null): ?>
    <div class="message bg-green-500 text-white font-semibold p-4 my-3 rounded-lg shadow border-l-4 border-green-700 flex items-center gap-2">
        <span>✔</span>
        <?= $successMessage ?>
    </div>
<?php endif ?>

<?php if($errorMessage !== null): ?>
    <div class="message bg-red-500 text-white font-semibold p-4 my-3 rounded-lg shadow border-l-4 border-red-700 flex items-center gap-2">
        <span>✖</span>
        <?= $errorMessage ?>
    </div>
<?php endif ?>
