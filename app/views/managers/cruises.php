<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<div class="m-4 flex flex-row justify-center gap-5">
    <form class="flex items-center">   
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
        </div>
    </form>
    <button type="button" class="text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
  Add Cruise
</button>
</div>

<div class="flex flex-wrap gap-2 justify-center my-4">
    <?php  foreach($data['cruises'] as $cruise) : ?>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg object-cover aspect-video" src="<?php echo URLROOT . 'img/bg_signup.jpg'; ?>" alt="" />
        </a>
        <div class="p-5">
            <h3 class="mb-2 text-center text-xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $cruise->name; ?></h3>
            <div class="text-center gap-2 mb-2">
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $cruise->departure_date; ?></p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Departure port: <?php echo $cruise->departure_port_ID;?></p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Nights Count: <?php echo $cruise->nights_number; ?>.</p>
                <strong class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: <?php echo $cruise->price; ?> dh</strong>
            </div>

            <a href="#" class="flex justify-center items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#245BA8] rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Edit
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>
    <?php  endforeach; ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>