<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<main>
    <div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-sm space-y-10">
            <div>
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" class="mx-auto h-10 w-auto" />
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create an account</h2>
            </div>
            <form action="/registration" method="POST" class="space-y-6">
                <div>
                    <div class="col-span-2">
                        <input id="email" type="email" name="email" required placeholder="Email address" autocomplete="email" aria-label="Email address" class="block w-full rounded-t-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:relative focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        <?php if (isset($errors['email'])): ?>
                            <p class="text-sm text-red-600 mt-4"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="-mt-px">
                        <input id="password" type="password" name="password" required placeholder="Password" autocomplete="current-password" aria-label="Password" class="block w-full rounded-b-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:relative focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        <?php if (isset($errors['password'])): ?>
                            <p class="text-sm text-red-600 mt-4"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php');
