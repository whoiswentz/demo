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

        <footer class="mt-6">
            <a href="/notes/edit?id=<?= htmlspecialchars($note['id']) ?>" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Edit</a>
        </footer>
    </div>
</main>


<?php require base_path('views/partials/footer.php');
