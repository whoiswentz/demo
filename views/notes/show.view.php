<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 hover:underline">
                Back to Notes...
            </a>
        </p>
        <p><?= htmlspecialchars($note['body']) ?></p>

        <form method="POST" class="mt-6">
            <input type="hidden" value="<?= htmlspecialchars($note['id']) ?>" name="id">
            <button class="text-sm text-red-500">Delete</button>
        </form>
    </div>
</main>


<?php require base_path('views/partials/footer.php');
