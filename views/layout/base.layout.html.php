<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="../../public/css/output.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Gestion Boutik</title>
</head>
<body>

    <nav class="fixed top-0 z-50 w-full bg-blue-900 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py- lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center w-30 justify-start rtl:justify-end ">
                    <a href="<?=WEBROOT?>/controller=dashboard" class="flex ms-2 md:me-24">
                        <img src="../assets/logo.png" class="h-10 me-1 mt-3" alt="Logo" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white dark:text-white">DIALLO BOUTIK</span>
                    </a>
                    <div class="flex justify-start border-2 ">
                        <img src="../assets/Menu.png" alt="">
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                    <div>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <img class="w-8 h-8 rounded-full" src="../assets/avatar1.jpeg" alt="user">
                        </button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar" class="fixed bg-blue-900 dark:bg-blue-900 top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full border-r border-gray-200 sm:translate-x-0 " aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto flex flex-col justify-between">
            <ul class="space-y-2 font-medium">
                <li class="">
                    <a href="<?=WEBROOT?>/?controller=dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        <span class="ms-3 text-white dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?=WEBROOT?>/?controller=dettes" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap text-white dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">Dettes</span>
                    </a>
                </li>
                <li>
                    <a href="<?=WEBROOT?>/?controller=clients" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap text-white dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">Clients</span>
                    </a>
                </li>
            </ul>
            <div>
                <a href="<?=WEBROOT?>/?controller=security&action=logout" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-white dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">Log out</span>
                    </a>
            </div>
        </div>
    </aside>
    
    <div class="sm:ml-64">
        <div class="p-4 rounded-lg mt-10">
            <?= $contentForView ?>
        </div>
    </div>


  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>