<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

    <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
        <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
            <img class="mt-6 w-full" alt="" src="<?= URLROOT . 'public/img/' . $data['cruise']->image; ?>"/>
        </div>
        <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
            <div class="border-b border-gray-200 pb-6">
                <p class="text-base leading-4 text-center ">Cruise details</p>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4 ">Name</p>
                <div class="flex items-center justify-center">
                    <p class="text-sm leading-none"><?= $data['cruise']->name; ?></p>

                </div>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4 text-gray-800 ">Departure date</p>
                <div class="flex items-center justify-center">
                    <p class="text-sm leading-none mr-3"><?= $data['cruise']->departure_date; ?></p>
                </div>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4 text-gray-800 ">Itinerary</p>
                <div class="flex-col items-center justify-center">
                    <?php foreach ($data['cruise']->trajectory as $trajectory):?>
                    <p class="text-sm leading-none mr-3"><?= $trajectory->port_name ?></p>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4">Distination</p>
                <div class="flex items-center justify-center">
                    <p class="text-sm leading-none mr-3"><?= $data['cruise']->distination; ?></p>
                </div>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4">Nights count</p>
                <div class="flex items-center justify-center">
                    <p class="text-sm leading-none mr-3"><?= $data['cruise']->nights_number; ?></p>
                </div>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4 ">Departure port</p>
                <div class="flex items-center justify-center">
                    <p class="text-sm leading-none mr-3"><?= $data['cruise']->port_name; ?></p>
                </div>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4 ">Ship name</p>
                <div class="flex items-center justify-center">
                    <p class="text-sm leading-none mr-3"><?= $data['cruise']->ship_name; ?></p>
                </div>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4">Price</p>
                <div class="flex items-center justify-center">
                    <p class="text-sm leading-none mr-3"><?= $data['cruise']->price; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php if (!isset($_SESSION['user_id'])) : ?>
    <div class="flex items-center justify-center">
        <a href="<?= URLROOT . 'Users/login'; ?>"
           class="w-fit text-white bg-[#245BA8] hover:bg-[#245BA8] border border-[#245BA8] hover:border-[#245BA8] rounded-md py-2 px-4 focus:outline-none focus:shadow-outline">
            Login to book
        </a>
    </div>
<?php else : ?>
<?php if ($data['rooms']) : ?>

    <div class="relative overflow-x-hidden shadow-md sm:rounded-lg w-1/2 mx-auto">
    <table class="w-full text-sm text-left ">
    <thead class="text-xs  uppercase">
    <tr>
        <th scope="col" class="px-6 py-3">
            Room number
        </th>
        <th scope="col" class="px-6 py-3">
            Price
        </th>
        <th scope="col" class="px-6 py-3">
            Type
        </th>
        <th scope="col" class="px-6 py-3">
            Capacity
        </th>
        <th scope="col" class="px-6 py-3">
            Choice
        </th>
    </tr>
    </thead>
        <form action="<?php echo URLROOT . 'Pages/book/' . $data['cruise']->ID_cruise; ?>" method="POST">
            <tbody>
            <?php foreach ($data['rooms'] as $room) : ?>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        <?= $room->ID_room; ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $room->room_price; ?> Dh
                    </td>
                    <td class="px-6 py-4">
                        <?= $room->room_type; ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $room->capacity; ?> person
                    </td>
                    <td class="px-6 py-4">
                        <input type="radio" name="room" value="<?= $room->ID_room; ?>"></input>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <button type="submit"
                    class="w-full text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Confirm booking
            </button>
        </form>

        </table>
        </div>
        <?php else : ?>
        <div class="w-1/2 mx-auto">
            <p class="text-center text-2xl">No rooms available</p>
        </div>
    <?php endif; ?>
<?php endif; ?>


    <?php require APPROOT . '/views/inc/footer.php'; ?>