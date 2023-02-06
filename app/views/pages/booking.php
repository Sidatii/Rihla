<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<div class="flex flex-wrap gap-2 justify-center my-4 w-auto">
    <?php foreach ($data['cruises'] as $cruise) : ?>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="h-[250px] w-[250px]">
                <img class="rounded-t-lg object-fit h-full" style="aspect-ratio: 9/5"  src="<?php echo URLROOT . '/public/img/' . $cruise->image; ?>" alt="" />
            </div>
            <div class="p-5">
                <h3 class="mb-2 text-center text-xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $cruise->name; ?></h3>
                <div class="text-center gap-2 mb-2">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $cruise->departure_date; ?></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Departure port: <?php echo $cruise->ID_port; ?></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Nights Count: <?php echo $cruise->nights_number; ?>.</p>
                    <strong class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: <?php echo $cruise->price; ?> dh</strong>
                </div>
                <div class="flex gap-2 justify-center">

                    <!-- Modal toggle -->
                    <button data-modal-target="<?php echo $cruise->ID_croisere;?>" data-modal-toggle="<?php echo $cruise->ID_croisere;?>" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Book this trip
                        <i class="fa fa-pen-to-square"></i>
                    </button>

                    <!-- Main modal -->
                    <div id="<?php echo $cruise->ID_croisere;?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="<?php echo $cruise->ID_croisere ;?>">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update cruise</h3>
                                    <form class="space-y-6" method="POST" action="<?php echo URLROOT . 'Managers/updateCruise/' . $cruise->ID_croisere;?>"  enctype="multipart/form-data">
                                        <div>
                                            <label for="Cruise_name" class="block mb-2 text-sm font-medium text-gray-900 ">Cruise name</label>
                                            <input type="text" name="name" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " value="<?php echo $cruise->name;?>">
                                        </div>
                                        <div>
                                            <label for="Cruise_date" class="block mb-2 text-sm font-medium text-gray-900 ">Cruise date</label>
                                            <input type="date" name="date" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " value="<?php echo $cruise->departure_date;?>">
                                        </div>
                                        <div>
                                            <label for="Cruise_image" class="block mb-2 text-sm font-medium text-gray-900 ">Cruise image</label>
                                            <input type="file" accept="image/*" name="image" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
                                        </div>
                                        <div>
                                            <label for="Cruise_nights" class="block mb-2 text-sm font-medium text-gray-900 ">Nights count</label>
                                            <input type="number" name="nights" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " value="<?php echo $cruise->nights_number;?>">
                                        </div>
                                        <div>
                                            <label for="Cruise_depPort" class="block mb-2 text-sm font-medium text-gray-900 ">Departure port (To edit later)</label>
                                            <input type="text" name="depPort" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500" value="<?php echo $cruise->ID_port;?>">
                                        </div>
                                        <div>
                                            <label for="Cruise_name" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                            <input type="float" name="price" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " value="<?php echo $cruise->price;?>">
                                        </div>
                                        <button type="submit" class="w-full text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update cruise</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>