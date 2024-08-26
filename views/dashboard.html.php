<div class="grid grid-cols-12 gap-4 mb-4 ">
    <div class="flex items-center justify-between h-10 px-3">
        <div>
            <h1 class="text-2xl font-bold dark:text-white "> Dashboard </h1>
        </div>
    </div>
    <div class="flex items-center justify-between align-center h-50 py-3 rounded">
        <div class="w-80 bg-blue-900 rounded-lg">
            <div class="p-3 block max-w-sm rounded-lg shadow">
                <h5 class="mb-2 text-xl font-medium tracking-tight text-white">Nombre de Clients </h5>
                <p class="font-bold text-2xl text-white"> <?= $clients[0]->nbre_clients ?> </p>
                <p class="font-normal text-base text-white mt-2"> Nous avons <?= $clients[0]->nbre_clients ?> clients </p>
            </div>
        </div>
        <div class="w-80 bg-blue-900 rounded-lg">
            <div class="p-3 block max-w-sm rounded-lg shadow">
                <h5 class="mb-2 text-xl font-medium tracking-tight text-white">Nombre de Dettes </h5>
                <p class="font-bold text-2xl text-white"> <?= $dettes[0]->nbre_dettes ?> </p>
                <p class="font-normal text-base text-white mt-2"> Nous avons <?= $dettes[0]->nbre_dettes ?> dette(s) non soldée(s) </p>
            </div>
        </div>
        <div class="w-80 bg-blue-900 rounded-lg">
            <div class="p-3 block max-w-sm rounded-lg shadow">
                <h5 class="mb-2 text-xl font-medium tracking-tight text-white">Paiements du jour (XOF) </h5>
                <p class="font-bold text-2xl text-white"> <?= $paiements[0]->total_paiements_du_jour ?> </p>
                <p class="font-normal text-base text-white mt-2"> Somme des paiements du jour: <?= $paiements[0]->total_paiements_du_jour ?> </p>
            </div>
        </div>
    </div>
</div>


