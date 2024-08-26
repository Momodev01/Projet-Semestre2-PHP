<div class="grid grid-cols-12 gap-4 mb-4 ">
    <div class="flex items-center justify-between h-10 px-3">
        <div>
            <h1 class="text-2xl font-bold dark:text-white "> Liste des Clients </h1>
        </div>
    </div>
    <div class="flex items-center justify-between h-20 rounded ">
        <div class="">
            <input type="search" name="" value="" class="h-10 w-80 rounded-full me-2" placeholder="Filtrer par Telephone">
            <button class="bg-blue-900 hover:bg-blue-800 px-3 py-2 rounded-lg text-white"> OK </button>
        </div>
        <form method="post" action="" class="flex justify-between align-center">
            <?php $categorieActuel = $_POST['categorie'] ?? 'Tous'; ?>
            <input type="hidden" name="controller" value="clients">
            <button name="categorie" value="Tous" class="text-white <?= $categorieActuel === 'Tous' ? 'bg-blue-900' : 'bg-blue-300' ?> hover:bg-blue-800 font-medium rounded-full text-sm px-3 py-2.5 me-2 mb-2"> Tous </button>
            <button name="categorie" value="Nouveaux" class="text-white <?= $categorieActuel === 'Nouveaux' ? 'bg-blue-900' : 'bg-blue-300' ?> hover:bg-blue-800 font-medium rounded-full text-sm px-3 py-2.5 me-2 mb-2"> Nouveaux </button>
            <button name="categorie" value="NonSolvables" class="text-white <?= $categorieActuel === 'NonSolvables' ? 'bg-blue-900' : 'bg-blue-300' ?> hover:bg-blue-800 font-medium rounded-full text-sm px-3 py-2.5 me-2 mb-2"> Non solvables </button>
            <button name="categorie" value="Solvables" class="text-white <?= $categorieActuel === 'Solvables' ? 'bg-blue-900' : 'bg-blue-300' ?> hover:bg-blue-800 font-medium rounded-full text-sm px-3 py-2.5 me-2 mb-2"> Solvables </button>
            <button name="categorie" value="Fideles" class="text-white <?= $categorieActuel === 'Fideles' ? 'bg-blue-900' : 'bg-blue-300' ?> hover:bg-blue-800 font-medium rounded-full text-sm px-3 py-2.5 me-2 mb-2"> Fidèles </button>
        </form>
    </div>
</div>
<div class="w-100 h-50 mb-4 rounded bg-gray-50 dark:bg-gray-800">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-100">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-white bg-blue-900">
                <tr>
                    <th scope="row" class="px-6 py-3 text-center">
                        Photo
                    </th>
                    <th scope="row" class="px-6 py-3 text-center">
                        Prenom
                    </th>
                    <th scope="row" class="px-6 py-3 text-center">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Telephone
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Adresse
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Email
                    </th>
                    <?php if ((isset($_REQUEST['categorie']) && $_REQUEST['categorie'] == "Tous") || ($_REQUEST['controller'] == 'clients' && !isset($_REQUEST['categorie']))): ?>
                    <th scope="col" class="px-6 py-3 text-center">
                        Categorie
                    </th>
                    <?php endif ?>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $cl): ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 text-center flex justify-center align-center">
                        <img class="w-10 h-10 rounded-full border" src="../assets/avatar1.jpeg" alt="Rounded avatar">
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= $cl->prenom?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= $cl->nom?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= $cl->telephone?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= $cl->adresse?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= $cl->email?>
                    </td>
                    <?php if ((isset($_REQUEST['categorie']) && $_REQUEST['categorie'] == "Tous") || ($_REQUEST['controller'] == 'clients' && !isset($_REQUEST['categorie']))): ?>
                    <td class="px-6 py-4 text-center">
                        <p class="<?php if ($cl->nomcat == 'Nouveau') { echo 'bg-blue-600';} elseif ($cl->nomcat == 'Non solvable') { echo 'bg-red-600';} elseif ($cl->nomcat == 'Solvable') { echo 'bg-yellow-500';} elseif ($cl->nomcat == 'Fidèle') { echo 'bg-green-600';} ?> rounded-full text-white py-1"> <?= $cl->nomcat?> </p>
                    </td>
                    <?php endif ?>
                    <td class="px-6 py-4 text-center">
                        <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal" class="font-bold text-blue-900 underline">Voir détails</button>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<div class="flex items-center justify-center h-20 mb-4">
    <nav aria-label="Page navigation example">
        <ul class="flex items-center -space-x-px h-10 text-base">
            <li>
                <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-3 h-3 rtl:rotate-180 me-2 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="flex justify-center align-center ">Previous</span>
                </a>
            </li>
            <li>
                <a href="#" aria-current="page" class="flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="">Next</span>
                    <svg class="w-3 h-3 rtl:rotate-180 ms-2 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
</div>
    

<!-- Main modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <div class="flex">
                    <img src="../../public/assets/avatar1.jpeg" alt="" class="w-20 h-20 rounded-full">
                    <div class="ms-3 flex">
                        <div class="flex flex-col justify-center">
                            <p><span class="font-bold">Prenom: </span> <span>Mamadou Diang</span></p>
                            <p class="mt-2"><span class="font-bold me-5">Nom: </span> <span>Diallo</span></p>
                        </div>
                        <div class="ms-8 flex flex-col justify-center">
                            <p><span class="font-bold">Telephone: </span> <span>776923351</span></p>
                            <p class="mt-2"><span class="font-bold me-1">Categorie: </span> <span>Fidèle</span></p>
                        </div>
                    </div>
                </div>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="flex justify-between">
                    <h1 class="font-medium text-xl"> Infos du client </h1>
                    <!-- <button class="text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-3 py-2 "> Paiement </button> -->
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-100">
                    
                </div>
            </div>
            <div class="p-4 ">
                
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirmer</button>
                <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
            </div>
        </div>
    </div>
</div>
