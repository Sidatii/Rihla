<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>


<div class="flex flex-col items-center">
  <!-- Help text -->
  <span class="text-sm text-gray-700 dark:text-gray-400">
      Showing <span class="font-semibold text-[#245BA8]  dark:text-white">1</span> to <span class="font-semibold text-gray-900 dark:text-white">10</span> of <span class="font-semibold text-gray-900 dark:text-white">100</span> Entries
  </span>
  <!-- Buttons -->
  <div class="inline-flex mt-2 xs:mt-0">
      <button class="px-4 py-2 text-sm font-medium text-white bg-[#245BA8]  rounded-l dark:hover:text-white">
          Prev
      </button>
      <button class="px-4 py-2 text-sm font-medium text-white bg-[#245BA8] border-0 border-l rounded-r dark:hover:text-white">
          Next
      </button>
  </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>