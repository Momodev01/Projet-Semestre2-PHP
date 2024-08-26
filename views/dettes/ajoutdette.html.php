<div class="p-4 w-full h-full border-2">
    
    

    <div class=" bg-white rounded-lg shadow dark:bg-gray-700">

        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <div class="flex">
                <div class="">
                    <form method="get" action="<?=WEBROOT?>" class="flex justify-start mx-auto">
                        <div class="relative w-80">
                            <input type="text" id="" name="telephone" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-5 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Telephone" />
                        </div>
                        <input type="hidden" name="controller" value="dettes">
                        <button name="action" value="searchClient" class="bg-blue-900 hover:bg-blue-800 px-3 py-2 ms-2 rounded-full text-white"> OK </button>
                    </form>
                    <?php $client = isset($_SESSION['client']) ? $_SESSION['client'] : null; ?>
                    <div class="flex mt-3">
                        <input type="hidden" name="idcl" value="<?= isset($client) ? ($client[0]->idcl) : ""; ?>">
                        <input type="text" name="prenom" value="<?= isset($client) ? ($client[0]->prenom) : ""; ?>" id="" class="me-2 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 cursor-not-allowed " placeholder="Prenom" readonly>
                        <input type="text" name="nom" value="<?= isset($client) ? ($client[0]->nom) : ""; ?>" id="" class="me-2 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 cursor-not-allowed" placeholder="Nom" readonly>
                        <input type="text" name="nomcat" value="<?= isset($client) ? ($client[0]->nomcat) : ""; ?>" id="" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 cursor-not-allowed" placeholder="Categorie" readonly>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <div class="flex">
                    <div class="">
                        <form method="get" action="<?=WEBROOT?>" class="flex justify-start mx-auto">
                            <div class="relative w-80">
                                <input type="text" name="libelle" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-5 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Article" />
                            </div>
                            <input type="hidden" name="controller" value="dettes">
                            <button type="submit" name="action" value="searchArticle" class="px-3 py-2 ms-2 me-3 text-sm font-medium text-white bg-blue-900 rounded-full border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                OK
                            </button>
                        </form>
                        <?php $article = isset($_SESSION['article']) ? $_SESSION['article'] : null; ?>
                        <form action="get" method="<?= WEBROOT ?>" class="flex mt-3">
                            <input type="text" name="prix" value="<?= isset($article) ? ($article[0]->prix) : ""; ?>" id="" class="me-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 cursor-not-allowed" placeholder="Prix" readonly>
                            <input type="text" name="qteStock" value="<?= isset($article) ? ($article[0]->qteStock) : ""; ?>" id="" class="me-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 cursor-not-allowed" placeholder="Qte en stock" readonly>
                            <input type="number" name="qteCmd" id="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="Quantité demandée">
                            <button type="submit" name="action" value="addDette" class="px-3 py-2 ms-3 text-sm font-medium text-white bg-blue-900 rounded-full border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 "> Ajouter </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 md:p-5 space-y-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-100 ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-white  bg-blue-900 ">
                        <tr>
                            <th scope="row" class="px-6 py-3 text-center">
                                Article
                            </th>
                            <th scope="row" class="px-6 py-3 text-center">
                                Prix Unitaire
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Quantité
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Prix Total
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 text-center">
                                Sachet lait
                            </td>
                            <td class="px-6 py-4 text-center">
                                100 fr
                            </td>
                            <td class="px-6 py-4 text-center">
                                5
                            </td>
                            <td class="px-6 py-4 text-center">
                                500fr
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal" class="font-bold text-blue-900 underline">Supprimer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form class="flex justify-between">
                <div class="bg-blue-800 px-3 rounded-lg">
                    <p class="text-2xl text-white ">Total: <span class="font-medium ">1000 fr</span></p>
                </div>
                <input type="hidden" name="controller" value="dettes">
                <button type="submit" name="action" value="savedette" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
            </form>
        </div>
        
        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <a href="<?= WEBROOT.'/?controller=dettes' ?>">
                <button data-modal-hide="static-modal-2" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
            </a>
        </div>
    </div>
</div>

