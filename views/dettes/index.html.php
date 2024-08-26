<div class="grid grid-cols-12 gap-4 mb-4 ">
    <div class="flex items-center justify-between h-10 px-3">
        <div>
            <h1 class="text-2xl font-bold dark:text-white "> Liste des Dettes </h1>
        </div>
        <div class="">
            <div class="relative max-w-sm ">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input datepicker id="default-datepicker" type="text" class="bg-gray-50 border border-blue-900 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Choisir une date">
            </div>
        </div>
    </div>
    <div class="flex items-center justify-between align-center h-20 rounded">
        <form method="get" action="<?= WEBROOT.'/?controller=dettes&action=filtreTel' ?>">
            <input type="search" name="telephone" value="" class="h-10 w-80 rounded-full me-2" placeholder="Filtrer par Client">
            <input type="hidden" name="controller" value="dettes">
            <button name="action" value="searchTel" class="bg-blue-900 hover:bg-blue-800 px-3 py-2 rounded-full text-white"> OK </button>
        </form>
        
        <form method="get" action="<?= WEBROOT.'/?controller=dettes&action=filtreDettes' ?>">
            <?php $etatActuel = $_GET['etat'] ?? 'NonSoldees'; ?>
            <input type="hidden" name="controller" value="dettes">
            <button name="etat" value="Tous" class="text-white <?= $etatActuel === 'Tous' ? 'bg-blue-900' : 'bg-blue-300' ?> hover:bg-blue-800 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2"> Tous </button>
            <button name="etat" value="NonSoldees" class="text-white <?= $etatActuel === 'NonSoldees' ? 'bg-blue-900' : 'bg-blue-300' ?> hover:bg-blue-800 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2"> Non soldées </button>
            <button name="etat" value="Soldees" class="text-white <?= $etatActuel === 'Soldees' ? 'bg-blue-900' : 'bg-blue-300' ?> hover:bg-blue-800 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2"> Soldées </button>
        </form>
    </div>
</div>
<div class="flex justify-end pb-2">
    <a href="<?= WEBROOT.'/?controller=dettes&action=ajoutdette' ?>"> <button type="button" data-modal-target="static-modal-2" data-modal-toggle="static-modal-2" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter une dette</button> </a>
</div>
<div class="w-100 h-50 mb-4 rounded bg-gray-50 dark:bg-gray-800 border-2">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-100 ">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-white  bg-blue-900 ">
                <tr>
                    <th scope="row" class="px-6 py-3 text-center">
                        Client
                    </th>
                    <th scope="row" class="px-6 py-3 text-center">
                        Telephone
                    </th>
                    <th scope="row" class="px-6 py-3 text-center">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Montant total
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Montant versé
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Montant dû
                    </th>
                    <?php if (isset($_REQUEST['etat']) && $_REQUEST['etat'] == "Tous"): ?>
                    <th scope="col" class="px-6 py-3 text-center">
                        Etat
                    </th>
                    <?php endif ?>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dettes as $dt): ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 text-center">
                        <?= $dt->prenom. " " . $dt->nom ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= $dt->telephone ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= $dt->datedette ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= $dt->montantdette ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= $dt->montantversé ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= $dt->montantdu ?>
                    </td>
                    <?php if (isset($_REQUEST['etat']) && $_REQUEST['etat'] == "Tous"): ?>
                    <td class="px-6 py-4 text-center">
                        <p class=" <?= $dt->etat == 'Soldée' ? 'bg-green-600' : 'bg-red-600' ?> text-white py-1 rounded-full"> <?= $dt->etat ?> </p>
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
    

<!-- Main modal 1 -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <div class="flex">
                    <img src="../assets/avatar1.jpeg" alt="" class="w-20 h-20 rounded-full">
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
                    <h1 class="font-medium text-xl"> Liste des paiements </h1>
                    <!-- <button class="text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-3 py-2 "> Paiement </button> -->
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-100">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-white  bg-blue-900 ">
                            <tr>
                                <th scope="row" class="px-6 py-3 text-center">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Montant
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-4 text-center">
                                    25/07/2024
                                </td>
                                <td class="px-4 py-4 text-center">
                                    50.000
                                </td>
                                <td class="px-4 py-4 text-center">
                                    <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal" class="font-bold text-blue-900 underline"> Imprimer </button>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-4 text-center">
                                    25/07/2024
                                </td>
                                <td class="px-4 py-4 text-center">
                                    50.000
                                </td>
                                <td class="px-4 py-4 text-center">
                                    <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal" class="font-bold text-blue-900 underline"> Imprimer </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="p-4 ">
                <h1 class="font-medium text-xl"> Ajouter un paiement </h1>
                <form class="flex justify-start">
                    <input type="text" id="input" aria-label="input" class="me-3 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="" placeholder="Montant">
                    <!-- <div class="relative max-w-sm me-3">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker id="default-datepicker" type="text" class="bg-gray-50 border border-blue-900 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Choisir une date">
                    </div> -->
                    <input type="date" id="input-2" aria-label="input2" class=" me-3 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="" >
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <!-- <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button> -->
                <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
            </div>
        </div>
    </div>
</div>
