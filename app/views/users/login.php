<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<!-- <div class="flash mx-auto flex justify-center my-2">
    
</div> -->
<div class="w-full my-5 max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 md:p-8 mx-auto">
    <form class="space-y-6" action="<?php echo URLROOT; ?>users/login" method="POST">
        <?php Flash('signup_success');?>
        <h5 class="text-xl font-medium text-[#245BA8] text-center">Sign in</h5>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php echo (!empty($data['email_err'])) ? 'border-red-500' : ''; ?>" placeholder="name@something.com" value="<?php echo $data['email']; ?>">
            <p class="text-xs italic text-red-500"> <?php echo $data['email_err']; ?> </p>
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php echo (!empty($data['password_err'])) ? 'border-red-500' : ''; ?>" value="<?php echo $data['password']; ?>">
            <p class="text-xs italic text-red-500"> <?php echo $data['password_err']; ?> </p>
            
        </div>
        <div class="flex items-start">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                </div>
                <label for="remember" class="ml-2 text-sm font-medium text-gray-900">Remember me</label>
            </div>
            <a href="#" class="ml-auto text-sm text-[#245BA8] hover:underline">Lost Password?</a>
        </div>
        <button type="submit" class="w-full text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>

        <div class="text-sm font-medium text-gray-500">
            Not registered? <a href="<?php echo URLROOT;?>/users/signup" class="text-[#245BA8] hover:underline">Create account</a>
        </div>
    </form>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>