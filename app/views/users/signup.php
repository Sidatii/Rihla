<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container mx-auto">
    <div class="flex justify-center px-6 my-12">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <!-- Col -->
            <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg" style="background-image: url('<?php echo URLROOT . 'img/bg_signup.jpg'; ?>')"></div>
            <!-- Col -->
            <div class="w-full lg:w-7/12 bg-gray-50 p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center">Create an Account!</h3>
                <form class="px-8 pt-6 pb-8 mb-4 bg-gray-50 rounded" action="<?php echo URLROOT; ?>/users/signup" method="POST">
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                First Name
                            </label>
                            <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline <?php echo (!empty($data['firstName_err'])) ? 'border-red-500' : ''; ?>" name="firstName" type="text" placeholder="First Name" value="<?php echo $data['firstName']; ?>">
                            <p class="text-xs italic text-red-500"> <?php echo $data['firstName_err']; ?> </p>
                        </div>
                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
                                Last Name
                            </label>
                            <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline <?php echo (!empty($data['lastName_err'])) ? 'border-red-500' : ''; ?>" name="lastName" type="text" placeholder="Last Name" value="<?php echo $data['lastName']; ?>">
                            <p class="text-xs italic text-red-500"> <?php echo $data['lastName_err']; ?> </p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Email
                        </label>
                        <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline <?php echo (!empty($data['email_err'])) ? 'border-red-500' : ''; ?>" name="email" type="email" placeholder="Email" value="<?php echo $data['email']; ?>"/>
                        <p class="text-xs italic text-red-500"> <?php echo $data['email_err']; ?> </p>
                    </div>
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                Password
                            </label>
                            <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline <?php echo (!empty($data['password_err'])) ? 'border-red-500' : ''; ?>" name="password" type="password" placeholder="******************" value="<?php echo $data['password']; ?>"/>
                            <p class="text-xs italic text-red-500"> <?php echo $data['password_err']; ?> </p>
                        </div>
                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                Confirm Password
                            </label>
                            <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline  <?php echo (!empty($data['confirm_password_err'])) ? 'border-red-500' : ''; ?>" name="confirm_password" type="password" placeholder="******************" value="<?php echo $data['confirm_password']; ?>"/>
                            <p class="text-xs italic text-red-500"> <?php echo $data['confirm_password_err']; ?> </p>
                        </div>
                    </div>
                    <div class="mb-6 text-center">
                        <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-[#245BA8] rounded-full hover:bg-[#245BA] focus:outline-none focus:shadow-outline">
                            Register Account
                        </button>
                    </div>
                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        <a class="inline-block text-sm text-[#245BA8] align-baseline hover:text-blue-800" href="#">
                            Forgot Password?
                        </a>
                    </div>
                    <div class="text-center">
                        <a class="inline-block text-sm text-[#245BA8] align-baseline hover:text-blue-800" href="<?php echo URLROOT;?>/users/login">
                            Already have an account? Login!
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>