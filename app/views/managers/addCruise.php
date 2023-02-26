<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<center>
<h1 class="mt-4 text-3xl">Add Cruise</h1>
<div class="container max-w-md">
<form action="<?php echo URLROOT . 'Managers/addCruise'?>" method="POST" enctype="multipart/form-data" class="mx-4 my-4 flex flex-col gap-2 bg-[#F1F1F1] p-3 rounded-lg">
    <div >
        <label for="Cruise_name" class="block mb-2 text-sm font-medium text-gray-900 ">Cruise name</label>
        <input type="text" name="name" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " >
    </div>
    <div>
        <label for="Cruise_date" class="block mb-2 text-sm font-medium text-gray-900 ">Cruise date</label>
        <input type="date" name="date" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
    </div>
    <div>
        <label for="Cruise_image" class="block mb-2 text-sm font-medium text-gray-900 " >Cruise image</label>
        <input type="file" accept="image/*" name="image" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
    </div>
    <div>
        <label for="Cruise_nights" class="block mb-2 text-sm font-medium text-gray-900 ">Nights count</label>
        <input type="number" name="nights" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
    </div>
    <div>
        <label for="Cruise_depPort" class="block mb-2 text-sm font-medium text-gray-900 ">Departure port</label>
        <select name="depPort" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
            <?php foreach($data['ports'] as $port):?>
            <option value="<?php echo $port->ID_port?>">
                <?php echo $port->name?>
            </option>
            <?php endforeach;?>
        </select>
    </div>
    <div>
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
        <input type="float" name="price" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
    </div>
    <div>
        <label for="destination" class="block mb-2 text-sm font-medium text-gray-900 ">Destination</label>
        <input type="text" name="destination" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
    </div>
    <button type="submit" class="text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>

</form>
</div>
</center>
<?php require APPROOT . '/views/inc/footer.php'; ?>