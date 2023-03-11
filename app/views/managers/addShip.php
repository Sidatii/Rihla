<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<center>
<h1 class="mt-4 text-3xl">Add ship</h1>
<div class="container max-w-md">
<form action="<?php echo URLROOT . 'Managers/addship'?>" method="POST" class="mx-4 my-4 flex flex-col gap-2 bg-[#F1F1F1] p-3 rounded-lg">
    <div >
        <label for="ship_name" class="block mb-2 text-sm font-medium text-gray-900 ">Ship name</label>
        <input type="text" name="ship_name" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " >
    </div>
    <div>
        <label for="rooms_count" class="block mb-2 text-sm font-medium text-gray-900 ">Room count</label>
        <input type="number" name="rooms_count" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
    </div>
    <div>
        <label for="spots_count" class="block mb-2 text-sm font-medium text-gray-900 " >Spots count</label>
        <input type="number"  name="spots_count" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
    </div>

    <button type="submit" class="text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
</form>
</div>
</center>
<?php require APPROOT . '/views/inc/footer.php'; ?>