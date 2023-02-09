<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>


<div class="flex justify-center uppercase font-bold text-gray-500 pt-10">
	<H1>Your bookings</H1>
</div>
<div class="flex justify-center uppercase font-bold text-gray-500 pt-10">
	<?php Flash('flash')?>
</div>
<?php if (!empty($data['nothing'])) : ?>
	<h3 class="flex justify-center font-bold text-gray-500 pt-10"><?php echo $data['nothing']; ?></h3>

<?php endif; ?>

<?php if (!empty($data['bookings'])) : ?>
	<?php foreach ($data['bookings'] as $booking) : ?>
		<div class="p-5">
			<div class="max-w-full  bg-white flex flex-col rounded overflow-hidden shadow-lg">
				<div class="flex flex-row items-baseline flex-nowrap bg-gray-100 p-2 justify-between">
					<div class="flex flex-nowrap">
						<i class="fa fa-solid fa-sailboat"></i>
						<h1 class="ml-2 uppercase font-bold text-gray-500">Departure</h1>
						<p class="ml-2 font-normal text-gray-500"><?php echo $booking->departure_date; ?></p>
					</div>
					<!-- <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel booking</button> -->

					<button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
					Cancel booking
					</button>

					<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
						<div class="relative w-full h-full max-w-md md:h-auto">
							<div class="relative bg-white rounded-lg shadow">
								<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
									<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
									</svg>
									<span class="sr-only">Close modal</span>
								</button>
								<div class="p-6 text-center">
									<svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
									</svg>
									<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to cancel this ticket?</h3>
									<a href="<?php echo URLROOT . 'Pages/cancelBooking/' . $booking->ID_booking;?>"><button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
										Yes, I'm sure
									</button></a>
									<button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="mt-2 flex justify-start bg-white p-2">
					<div class="flex mx-2 ml-6 h8 px-2 flex-row items-baseline rounded-full bg-gray-100 p-1">
						<svg viewBox="0 0 64 64" pointer-events="all" aria-hidden="true" class="etiIcon css-jbc4oa" role="presentation" style="fill: rgb(102, 102, 102); height: 12px; width: 12px;">
							<path d="M43.389 38.269L29.222 61.34a1.152 1.152 0 01-1.064.615H20.99a1.219 1.219 0 01-1.007-.5 1.324 1.324 0 01-.2-1.149L26.2 38.27H11.7l-3.947 6.919a1.209 1.209 0 01-1.092.644H1.285a1.234 1.234 0 01-.895-.392l-.057-.056a1.427 1.427 0 01-.308-1.036L1.789 32 .025 19.656a1.182 1.182 0 01.281-1.009 1.356 1.356 0 01.951-.448l5.4-.027a1.227 1.227 0 01.9.391.85.85 0 01.2.252L11.7 25.73h14.5L19.792 3.7a1.324 1.324 0 01.2-1.149A1.219 1.219 0 0121 2.045h7.168a1.152 1.152 0 011.064.615l14.162 23.071h8.959a17.287 17.287 0 017.839 1.791Q63.777 29.315 64 32q-.224 2.685-3.807 4.478a17.282 17.282 0 01-7.84 1.793h-9.016z"></path>
						</svg>
						<p class="font-normal text-sm ml-1 text-gray-500">Ticket ID: <?php echo $booking->ID_booking; ?></p>
					</div>
				</div>
				<div class="mt-2 flex sm:flex-row mx-6 sm:justify-between flex-wrap ">
					<div class="flex flex-row place-items-center p-2">
						<img alt="Rihla" class="w-10 h-10" src="<?php echo URLROOT . 'public/img/Rihla_logo_orange.svg'; ?>" style="opacity: 1; transform-origin: 0% 50% 0px; transform: none;" />
						<div class="flex flex-col ml-2">
							<p class="text-xs text-gray-500 font-bold"><?php echo $booking->ship_name; ?></p>
							<p class="text-xs text-gray-500">Booking Date: <?php echo $booking->booking_date; ?></p>
							<div class="text-xs text-gray-500">Depatrure Port: <?php echo $booking->port_name; ?></div>
						</div>
					</div>

					<div class="flex flex-col p-2">
						<p class="text-xs text-gray-500 font-bold">Distination: <?php echo $booking->distination; ?></p>
						<p class="text-xs text-gray-500 font-bold"><span class="">Trip duration: <?php echo $booking->nights_number; ?> Nights</span></p>
					</div>
					<div class="flex flex-col flex-wrap p-2">
						<p class="text-xs text-gray-500 font-bold">Room type: <?php echo $booking->room_type; ?></p>
						<p class="text-xs text-gray-500 font-bold"><span class="font-bold">Price: Dh</span> <?php echo $booking->room_price; ?></p>
						<p class="text-xs text-gray-500 font-bold">Capacity: <?php echo $booking->capacity; ?> Ppl</p>
						<p class="text-xs text-gray-500 font-bold">Room No: <?php echo $booking->ID_room; ?></p>
					</div>
				</div>
				<div class="mt-4 bg-gray-100 flex flex-row flex-wrap md:flex-nowrap justify-between items-baseline">
					<div class="flex mx-6 py-4 flex-row flex-wrap">
						<img class="w-12 h-10 p-2 mx-2 self-center rounded-full fill-current text-white" src="<?php echo URLROOT . 'public/img/Rihla_logo_blue.svg'; ?>">
						<div class="text-sm mx-2 flex flex-col">
							<p class=""><?php echo $_SESSION['user_fname'] . $_SESSION['user_lname']; ?></p>
							<p class="font-bold">Price: <?php echo $booking->room_price * 1.5; ?> Dh</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<!-- component -->


<?php require APPROOT . '/views/inc/footer.php'; ?>

<!-- ALTER VIEW `bookingdetails` AS SELECT b.ID_booking, b.ID_cruise, b.booking_date, b.booking_price, b.ID_user, b.ID_room, c.name, c.price, c.nights_number, c.image, c.departure_date, c.distination, r.ID_ship, r.room_price, t.room_type, t.capacity, p.name, p.pays FROM booking b INNER JOIN cruise c ON b.ID_cruise=c.ID_croisere INNER JOIN port p ON c.ID_port=p.ID_port INNER JOIN room r ON b.ID_room = r.ID_room INNER JOIN room_types t ON r.ID_type=t.ID_type -->