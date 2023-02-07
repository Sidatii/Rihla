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
                    <a href="<?php echo URLROOT . 'Pages/cruiseInfos/' . $cruise->ID_croisere;?>"><button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Book this trip
                    </button></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>