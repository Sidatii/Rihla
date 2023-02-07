<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
    <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
        <img class="mt-6 w-full" alt="" src="<?= URLROOT . 'public/img/' . $data['cruise'][0]->image; ?>" />
    </div>
    <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
        <div class="border-b border-gray-200 pb-6">
            <p class="text-base leading-4 text-center ">Cruise details</p>
        </div>
        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
            <p class="text-base leading-4 ">Name</p>
            <div class="flex items-center justify-center">
                <p class="text-sm leading-none"><?= $data['cruise'][0]->cruise_name; ?></p>

            </div>
        </div>
        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
            <p class="text-base leading-4 text-gray-800 ">Departure date</p>
            <div class="flex items-center justify-center">
                <p class="text-sm leading-none mr-3"><?= $data['cruise'][0]->departure_date; ?></p>
            </div>
        </div>
        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
            <p class="text-base leading-4">Distination</p>
            <div class="flex items-center justify-center">
                <p class="text-sm leading-none mr-3"><?= $data['cruise'][0]->distination; ?></p>
            </div>
        </div>
        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
            <p class="text-base leading-4">Nights count</p>
            <div class="flex items-center justify-center">
                <p class="text-sm leading-none mr-3"><?= $data['cruise'][0]->nights_number; ?></p>
            </div>
        </div>
        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
            <p class="text-base leading-4 ">Departure port</p>
            <div class="flex items-center justify-center">
                <p class="text-sm leading-none mr-3"><?= $data['cruise'][0]->port_name; ?></p>
            </div>
        </div>
        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
            <p class="text-base leading-4 ">Ship name</p>
            <div class="flex items-center justify-center">
                <p class="text-sm leading-none mr-3"><?= $data['cruise'][0]->ship_name; ?></p>
            </div>
        </div>
        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
            <p class="text-base leading-4">Price</p>
            <div class="flex items-center justify-center">
                <p class="text-sm leading-none mr-3"><?= $data['cruise'][0]->price; ?></p>
            </div>
        </div>
    </div>
</div>





<?php require APPROOT . '/views/inc/footer.php'; ?>