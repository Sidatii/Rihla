<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php Flash('flash'); ?>
<div id="paginated-list" aria-live="polite" class="flex flex-wrap gap-2 justify-center my-4 w-auto">
    <?php foreach ($data['cruises'] as $cruise) : ?>
        <div class="listItems max-w-sm bg-white border border-gray-200 rounded-lg shadow-md">
            <div class="h-[250px] w-[250px]">
                <img class="rounded-t-lg object-fit h-full" style="aspect-ratio: 9/5" src="<?php echo URLROOT . '/public/img/' . $cruise->image; ?>" alt="" />
            </div>
            <div class="p-5">
                <h3 class="mb-2 text-center text-xl font-bold tracking-tight text-gray-900"><?php echo $cruise->name; ?></h3>
                <div class="text-center gap-2 mb-2">
                    <p class="mb-3 font-normal text-gray-700 "><?php echo $cruise->departure_date; ?></p>
                    <p class="mb-3 font-normal text-gray-700 ">Departure port: <?php echo $cruise->port_name; ?></p>
                    <p class="mb-3 font-normal text-gray-700 ">Nights Count: <?php echo $cruise->nights_number; ?>.</p>
                    <strong class="mb-3 font-normal text-gray-700 ">Price: <?php echo $cruise->price; ?> dh</strong>
                    <p class="mb-3 font-normal text-gray-700 ">Destination: <?php echo $cruise->distination; ?>.</p>

                </div>
                <div class="flex gap-2 justify-center">
                    <a href="<?php echo URLROOT . 'Pages/cruiseInfos/' . $cruise->ID_croisere; ?>">
                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Book this trip
                        </button></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="flex flex-wrap gap-2 justify-center my-4 w-auto p-5">
    <nav aria-label="Page navigation example" class="flex justify-center mb-8">
        <div class="inline-flex items-center -space-x-px">
            <button class="pagination-button" id="prev-button" title="Previous page" aria-label="Previous page">
                <a href="#" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Previous</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                </a>
            </button>
            <div id="pagination-numbers">
                <!--                <button><a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a></button>-->
            </div>

            <button class="pagination-button" id="next-button" title="Next page" aria-label="Next page">
                <a href="#" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Next</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </a>
            </button>
        </div>
    </nav>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>