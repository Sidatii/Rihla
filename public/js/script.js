// import jquery from 'jquery'
// window.$ = window.jquery = jquery


const paginationNumbers = document.getElementById("pagination-numbers");
const paginatedList = document.getElementById("paginated-list");
const listItems = document.getElementsByClassName("listItems");
const nextButton = document.getElementById("next-button");
const prevButton = document.getElementById("prev-button");
const paginationLimit = 3;
const pageCount = Math.ceil(listItems.length / paginationLimit);
let currentPage;


const appendPageNumber = (index) => {
    const pageNumber = document.createElement("button");
    pageNumber.className = "pagination-number";
    pageNumber.innerHTML = index;
    pageNumber.setAttribute("page-index", index);
    pageNumber.setAttribute("aria-label", "Page " + index);
    pageNumber.classList.add('px-3', 'py-2', 'leading-tight', 'text-gray-500', 'bg-white', 'border', 'border-gray-300', 'hover:bg-gray-100', 'hover:text-gray-700')
    paginationNumbers.appendChild(pageNumber);
};
const getPaginationNumbers = () => {
    for (let i = 1; i <= pageCount; i++) {
        appendPageNumber(i);
    }
};

window.addEventListener("load", () => {
    getPaginationNumbers();

    prevButton.addEventListener("click", () => {
        setCurrentPage(currentPage - 1);
    });
    nextButton.addEventListener("click", () => {
        setCurrentPage(currentPage + 1);
    });

    setCurrentPage(1);
    document.querySelectorAll(".pagination-number").forEach((button) => {
        const pageIndex = Number(button.getAttribute("page-index"));
        if (pageIndex) {
            button.addEventListener("click", () => {
                setCurrentPage(pageIndex);
            });
        }
    });
});

const setCurrentPage = (pageNum) => {
    currentPage = pageNum;

    handleActivePageNumber();
    handlePageButtonsStatus();

    const prevRange = (pageNum - 1) * paginationLimit;
    const currRange = pageNum * paginationLimit;

    // listItems.forEach((item, index) => {
    //     item.classList.add("hidden");
    //     if (index >= prevRange && index < currRange) {
    //         item.classList.remove("hidden");
    //     }
    // });
    for (let i = 0; i < listItems.length; i++) {
        listItems[i].classList.add("hidden")
        if (i >= prevRange && i < currRange) {
            listItems[i].classList.remove("hidden");
        }
    }
};

const handleActivePageNumber = () => {
    document.querySelectorAll(".pagination-number").forEach((button) => {
        button.classList.remove("active");

        const pageIndex = Number(button.getAttribute("page-index"));
        if (pageIndex == currentPage) {
            button.classList.add("active");
        }
    });
};

const disableButton = (button) => {
    button.classList.add("disabled");
    button.setAttribute("disabled", true);
};
const enableButton = (button) => {
    button.classList.remove("disabled");
    button.removeAttribute("disabled");
};
const handlePageButtonsStatus = () => {
    if (currentPage === 1) {
        disableButton(prevButton);
    } else {
        enableButton(prevButton);
    }
    if (pageCount === currentPage) {
        disableButton(nextButton);
    } else {
        enableButton(nextButton);
    }
};


// const filterByMonthInput = document.getElementById('monthFilter')

const filterByMonth = (month) => {
    // console.log(month)
    $.ajax({
        type: "POST",
        url: `http://localhost/Rihla/pages/filterByMonth/${month}`,
        data: {
            'action': 'detail',
            'value': month
        },
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
            result = data.cruises;
            const container = document.getElementById('paginated-list');
            container.innerHTML = "";
            for (let i = 0; i < result.length; i++) {
                const item = result[i]
                container.innerHTML += `
            <div class="listItems max-w-7xl flex-col gap-4 md:flex md:flex-row md:justify-center border-gray-200 shadow-lg rounded p-4">
                <div class="md:w-[200px] w-[300px]">
                    <img class="rounded-t-lg object-fit h-full" style="aspect-ratio: 9/5"
                         src="http://localhost/Rihla/public/img/${item.image}" alt=""/>
                </div>
                <div class="w-[300px] flex flex-col justify-center text-center">
                    <h3 class="text-md bold">${item.name}</h1>
                        <h6 class="text-sm">${item.departure_date}</h3>
                    <ul>
                        <li class="text-sm">Departure port:${item.port_name}</li>
                        <li class="text-sm">Nights: ${item.nights_number}</li>
                        <li class="text-sm">Itinerary: ${item.itinerary}</li>
                        <li class="text-sm">Destination: ${item.distination}</li>
                    </ul>
                </div>
                <div class="md:w-[200px] flex flex-col gap-2 justify-center ">
                    <div class="block text-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full"
                         type="button">
                        Dh ${item.price}
                    </div>
                    <a href='http://localhost/Rihla/pages/cruiseInfos/${item.ID_croisere}'
                       class="flex justify-center">
                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal rounded-lg text-sm px-5 py-2.5 text-center w-fit mb-2"
                                type="button">
                            Book Now
                        </button>
                    </a>
                </div>
            </div>
                `
            }
        }
    })
}

const filterByPort = (port) => {
    $.ajax({
        type: "POST",
        url: `http://localhost/Rihla/pages/filterByPort/${port}`,
        data: {
            'action': 'detail',
            'value': port
        },
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
            let result = data.cruises;
            console.log(result)
            const container = document.getElementById('paginated-list');
            container.innerHTML = "";
            for (let i = 0; i < result.length; i++) {
                const item = result[i]
                container.innerHTML += `
                <div class="listItems max-w-7xl flex-col gap-4 md:flex md:flex-row md:justify-center border-gray-200 shadow-lg rounded p-4">
                <div class="md:w-[200px] w-[300px]">
                    <img class="rounded-t-lg object-fit h-full" style="aspect-ratio: 9/5"
                         src="http://localhost/Rihla/public/img/${item.image}" alt=""/>
                </div>
                <div class="w-[300px] flex flex-col justify-center text-center">
                    <h3 class="text-md bold">${item.name}</h1>
                        <h6 class="text-sm">${item.departure_date}</h3>
                    <ul>
                        <li class="text-sm">Departure port:${item.port_name}</li>
                        <li class="text-sm">Nights: ${item.nights_number}</li>
                        <li class="text-sm">Itinerary: ${item.itinerary}</li>
                        <li class="text-sm">Destination: ${item.distination}</li>
                    </ul>
                </div>
                <div class="md:w-[200px] flex flex-col gap-2 justify-center ">
                    <div class="block text-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full"
                         type="button">
                        Dh ${item.price}
                    </div>
                    <a href='http://localhost/Rihla/pages/cruiseInfos/${item.ID_croisere}'
                       class="flex justify-center">
                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal rounded-lg text-sm px-5 py-2.5 text-center w-fit mb-2"
                                type="button">
                            Book Now
                        </button>
                    </a>
                </div>
            </div>`
            }
        }
    })
}


const filterByShip = (ship) => {
    $.ajax({
        type: "POST",
        url: `http://localhost/Rihla/pages/filterByShip/${ship}`,
        data: {
            'action': 'detail',
            'value': ship
        }
        ,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
            result = data.cruises;
            console.log(result)
            const container = document.getElementById('paginated-list');
            container.innerHTML = "";
            for (let i = 0; i < result.length; i++) {
                const item = result[i]
                container.innerHTML += `
                <div class="listItems max-w-7xl flex-col gap-4 md:flex md:flex-row md:justify-center border-gray-200 shadow-lg rounded p-4">
                <div class="md:w-[200px] w-[300px]">
                    <img class="rounded-t-lg object-fit h-full" style="aspect-ratio: 9/5"
                         src="http://localhost/Rihla/public/img/${item.image}" alt=""/>
                </div>
                <div class="w-[300px] flex flex-col justify-center text-center">
                    <h3 class="text-md bold">${item.name}</h1>
                        <h6 class="text-sm">${item.departure_date}</h3>
                    <ul>
                        <li class="text-sm">Departure port:${item.port_name}</li>
                        <li class="text-sm">Nights: ${item.nights_number}</li>
                        <li class="text-sm">Itinerary: ${item.itinerary}</li>
                        <li class="text-sm">Destination: ${item.distination}</li>
                    </ul>
                </div>
                <div class="md:w-[200px] flex flex-col gap-2 justify-center ">
                    <div class="block text-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full"
                         type="button">
                        Dh ${item.price}
                    </div>
                    <a href='http://localhost/Rihla/pages/cruiseInfos/${item.ID_croisere}'
                       class="flex justify-center">
                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal rounded-lg text-sm px-5 py-2.5 text-center w-fit mb-2"
                                type="button">
                            Book Now
                        </button>
                    </a>
                </div>
            </div>`
            }
        }
    })
}


