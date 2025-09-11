<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/notes" class="space-y-6">
            <input type="hidden" value="PATCH" name="_method">
            <input type="hidden" value="<?= htmlspecialchars($note['id']) ?>" name="id">
            <div>
                <label for="body" class="block text-sm font-medium leading-6 text-gray-900">
                    Body
                </label>
                <div class="mt-2">
                    <textarea 
                        id="body" 
                        name="body" 
                        rows="4" 
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Write your note here..."
                        required>
                        <?= htmlspecialchars($note['body'] ?? '') ?>
                    </textarea>
                    <?php if (isset($errors['body'])): ?>
                        <p class="text-sm text-red-600 mt-4"><?= $errors['body'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="flex items-center justify-end gap-x-4">
                <button type="button" class="text-red-500 mr-auto" onclick="document.querySelector('#delete-form').submit()">Delete</button>
                <a
                    href="/notes" 
                    class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                    Cancel
                </a>
                <button
                    type="submit" 
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update
                </button>
            </div>
        </form>
        <form method="POST" action="/notes" id="delete-form" class="mt-6">
            <input type="hidden" value="DELETE" name="_method">
            <input type="hidden" value="<?= htmlspecialchars($note['id']) ?>" name="id">
        </form>
    </div>
</main>


<?php require base_path('views/partials/footer.php');
