<nav class="bg-[#F1F1F1] border-gray-200 px-2 sm:px-4 py-2.5 rounded-b-xl">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="<?php echo URLROOT .'Pages/index'; ?>" class="flex items-center">
                <img src="<?php echo URLROOT; ?>public/img/Rihla_logo_blue.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo">
            </a>
            <div class="flex md:order-2 gap-2">
                <?php if(isset($_SESSION['user_id'])) : ?>
                    
                <?php else : ?>
                    <button type="button"
                    class="text-[#245BA8] border-2 border-[#245BA8] focus:outline-none font-medium rounded-2xl text-sm px-3 py-1.5 text-center mr-3 md:mr-0 dark:focus:ring-[#245BA8] sm:text-[12px] sm:px-2 sm:py-1"><a href="<?php echo URLROOT .'Users/login'; ?>">Sign In</a></button>
                    
                    <button type="button"
                    class="text-white bg-[#245BA8] hover:bg-[#245BA8] focus:outline-none font-medium rounded-2xl text-sm px-3 py-1.5 text-center mr-3 md:mr-0 dark:bg-[#245BA8] dark:hover:bg-[#245BA8] dark:focus:ring-[#245BA8]"><a href="<?php echo URLROOT .'Users/signup'; ?>">Sign Up</a></button>
                    
                    
                    
                    <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 text-sm text-[#245BA8] rounded-lg md:hidden hover:bg-[#245BA8] focus:outline-none  dark:text-[#245BA8] dark:hover:bg-[#F1F1F1] "
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                </svg>
            </button>
            
                <?php endif; ?>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="flex flex-col p-4 mt-4 border rounded-lg bg-[#F1F1F1] md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 dark:bg-[#F1F1F1] md:dark:bg-[#F1F1F1] dark:border-[#245BA8]">
                    <li>
                        <a href="<?php echo URLROOT .'Pages/index'; ?>"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:font-semibold md:p-0 dark:text-gray-400 dark:hover:bg-[#245BA8] sm:dark:hover:text-white  md:dark:hover:text-[#245BA8] md:dark:hover:bg-transparent dark:border-gray-700 sm:text-[#245BA8] font-medium font-alternate subpixel-antialiased"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT .'pages/booking'; ?>"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:font-semibold md:p-0 dark:text-gray-400 dark:hover:bg-[#245BA8] sm:dark:hover:text-white  md:dark:hover:text-[#245BA8] md:dark:hover:bg-transparent dark:border-gray-700 sm:text-[#245BA8] font-medium font-alternate subpixel-antialiased">Booking</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT .'Pages/about'; ?>"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:font-semibold md:p-0 dark:text-gray-400 dark:hover:bg-[#245BA8] sm:dark:hover:text-white  md:dark:hover:text-[#245BA8] md:dark:hover:bg-transparent dark:border-gray-700 sm:text-[#245BA8] font-medium font-alternate subpixel-antialiased">About</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT .'pages/contact'; ?>"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:font-semibold md:p-0 dark:text-gray-400 dark:hover:bg-[#245BA8] sm:dark:hover:text-white  md:dark:hover:text-[#245BA8] md:dark:hover:bg-transparent dark:border-gray-700 sm:text-[#245BA8] font-medium font-alternate subpixel-antialiased">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- ############################################################################ -->



