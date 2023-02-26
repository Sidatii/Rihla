<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-100 p-4 m-4 rounded-md">
<form class="">
    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">First name</label>
            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="human" required>
        </div>
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
            <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Person" required>
        </div>
        
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone number</label>
            <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0677888888" required>
        </div>

        <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email address</label>
        <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="h.person@earth.com" required>
    </div> 
        
    </div>
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email address</label>
        <textarea type="text" id="message" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 max-h-32 min-h-fit" placeholder="Your message" required></textarea>
    </div> 
   
    <button type="submit" class="text-white bg-[#245BA8] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
</form>

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>