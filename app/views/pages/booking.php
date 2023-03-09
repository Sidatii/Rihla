<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
    <form method="POST" action="" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 flex gap-2">
        <select id="shipFilter" onchange="filterByShip(`${this.value}`)"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option selected>Pick a ship</option>
            <?php foreach ($data['ships'] as $ship): ?>
                <option value="<?php echo $ship->ID_ship; ?>"><?php echo $ship->ship_name; ?></option>
            <?php endforeach; ?>
        </select>
        <select id="portFilter" onchange="filterByPort(`${this.value}`)"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option selected>Pick a Port</option>
            <?php foreach ($data['ports'] as $port): ?>
                <option value="<?php echo $port->ID_port; ?>"><?php echo $port->name; ?></option>
            <?php endforeach; ?>
        </select>
        <input id="monthFilter" onchange="filterByMonth(`${this.value}`)" name="month" type="month"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 "
               placeholder="Select month">
    </form>


<?php Flash('flash'); ?>
    <div id="paginated-list" aria-live="polite" class="flex flex-wrap gap-6 justify-center my-4 w-auto">
        <?php foreach ($data['cruises'] as $cruise) : ?>
            <div class="listItems max-w-7xl flex-col gap-4 md:flex md:flex-row md:justify-center border-gray-200 shadow-lg rounded p-4">
                <div class="md:w-[200px] w-[300px]">
                    <img class="rounded-t-lg object-fit h-full" style="aspect-ratio: 9/5"
                         src="<?php echo URLROOT . '/public/img/' . $cruise->image; ?>" alt=""/>
                </div>
                <div class="w-[300px] flex flex-col justify-center text-center">
                    <h3 class="text-md bold"><?php echo $cruise->name; ?></h1>
                        <h6 class="text-sm"><?php echo $cruise->departure_date; ?></h3>
                    <ul>
                        <li class="text-sm">Departure port: <?php echo $cruise->port_name; ?></li>
                        <li class="text-sm">Nights: <?php echo $cruise->nights_number; ?></li>
                        <li class="text-sm">Destination: <?php echo $cruise->distination; ?></li>
                    </ul>
                </div>
                <div>
                    <ul id="trajectory+'<?= $cruise->ID_croisere?>'" class="flex flex-col gap-2">

                    </ul>
                </div>
                <div class="md:w-[200px] flex flex-col gap-2 justify-center ">
                    <div class="block text-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full"
                         type="button">
                        Dh <?php echo $cruise->price; ?>
                    </div>
                    <a href="<?php echo URLROOT . 'Pages/cruiseInfos/' . $cruise->ID_croisere; ?>"
                       class="flex justify-center">
                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal rounded-lg text-sm px-5 py-2.5 text-center w-fit mb-2"
                                type="button">
                            Book Now
                        </button>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<!--    <div class="flex flex-wrap gap-2 justify-center my-4 w-auto p-5">-->
    <nav aria-label="Page navigation example" class="flex justify-center mb-8">
        <div class="inline-flex items-center -space-x-px">
            <button class="pagination-button" id="prev-button" title="Previous page" aria-label="Previous page">
                <a class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Previous</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                </a>
            </button>
            <div id="pagination-numbers">
                <!--                <button><a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a></button>-->
            </div>

            <button class="pagination-button" id="next-button" title="Next page" aria-label="Next page">
                <a class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Next</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </a>
            </button>
        </div>
    </nav>
<!--    </div>-->


<?php require APPROOT . '/views/inc/footer.php'; ?>