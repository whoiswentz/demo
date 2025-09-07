<?php require 'views/partials/header.php'; ?>
<?php require 'views/partials/nav.php'; ?>
<?php require 'views/partials/banner.php'; ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" class="space-y-6">
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
                        <?= htmlspecialchars($_POST['body'] ?? '') ?>
                    </textarea>
                    <?php if (isset($errors['body'])) : ?>
                        <p class="text-sm text-red-600 mt-4"><?= $errors['body'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="flex items-center justify-end gap-x-6">
                <button 
                    type="submit" 
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Create
                </button>
            </div>
        </form>
    </div>
</main>


<?php require 'views/partials/footer.php'; ?>