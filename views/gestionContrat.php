
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Gestion des Contrats</h1>

                <div class="w-full mt-6 ">
                    <p class="text-xl pb-3 flex items-center mb-10">
                        <i class="fas fa-list ml-3"></i>Gestionnaire
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nom</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Prénom</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Adresse</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tel</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Date</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Détails</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Modifier</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Supprimer</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Confirmer</th>
                                </tr>
                            </thead>
                            
                            <?php for ($i=0; $i < count($InfosEvent) ; $i++): ?>
                            
                            <tbody class="text-gray-700">
                            <tr>
                                    <td class="text-left py-3 px-4"><?php echo  $InfosEvent[$i]->nomAdmin; ?></td>
                                    <td class="text-left py-3 px-4"><?php echo  $InfosEvent[$i]->prenomAdmin; ?></td>
                                    <td class="text-left py-3 px-4"><?php echo $infosClient[$i]['adresse'];?></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:<?php echo $infosClient[$i]['tel'];?>"><?php echo $infosClient[$i]['tel'];?></a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:<?php echo $infosClient[$i]['mail'];?>"><?php echo $infosClient[$i]['mail'];?></a></td>
                                    <td class="text-left py-3 px-4"><?php echo  $InfosEvent[$i]->date; ?></td>
                                    <td class="text-center py-3 px-4"><a class="hover:text-blue-500" ><div class="open"><i class="fas fa-plus cursor-pointer" ></i></div></a></td>
                                    <td class="text-center py-3 px-4"><a class="hover:text-blue-500" href="modifContrat"><i class="fas fa-pen"></i></a></td>
                                    <td class="text-center py-3 px-4"><a class="hover:text-blue-500" href="#"><i class="fas fa-trash-alt"></i></a></td>
                                    <td class="text-center py-3 px-4"><a class="hover:text-blue-500" href="gestionContrat-validationContrat-<?php echo  $InfosEvent[$i]->idEvent; ?>"><i class="fas fa-check"></i></a></td>
                                </tr>
                               
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>


                    <?php for ($i=0; $i < count($InfosEvent) ; $i++): ?>
                    
                    <div name="details" class="details hidden">
                        
                        <div class="flex justify-end w-full" name="close">
                        <i class="fas fa-times text-white text-3xl mt-5 mr-7 cursor-pointer"></i>
                        </div>
                        <h3 class="h3 text-lg my-7">Détails de la mission:</h3>


                        <?php if ($InfosEvent[$i]->typeClient == "entreprise") {?> 
                            <p class="my-5  ml-10 ">Nom entreprise:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $infosClient[$i]['nomCorp']; ?></p>
                            <p class="my-5  ml-10 ">N°Siret: </p>
                            <p class="my-5  ml-10 text-white"><?php echo $infosClient[$i]['siret']; ?></p>
                            <p class="my-5 ml-10 ">Message:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $InfosEvent[$i]->message; ?></p>
                            <p class="my-5 ml-10 ">Nombre de participants:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $nbrPart[$i]; ?></p>
                            <p class="my-5 ml-10 ">Formation:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $InfosEvent[$i]->formation; ?></p>

                        <?php }elseif ($InfosEvent[$i]->typeClient == "ecole") { ?>
                            <p class="my-5  ml-10 ">Nom ecole:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $infosClient[$i]['nomEcole']; ?></p>
                            <p class="my-5 ml-10 ">Message:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $InfosEvent[$i]->message; ?></p>
                            <p class="my-5 ml-10 ">Nombre de participants:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $nbrPart[$i]; ?></p>
                            <p class="my-5 ml-10 ">Formation:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $InfosEvent[$i]->formation; ?></p>
                        
                        <?php }elseif ($InfosEvent[$i]->typeClient == "particulier") { ?>
                            <p class="my-5 ml-10 ">Message:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $InfosEvent[$i]->message; ?></p>
                            <p class="my-5 ml-10 ">Nombre de participants:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $nbrPart[$i]; ?></p>
                            <p class="my-5 ml-10 ">Formation:</p>
                            <p class="my-5  ml-10 text-white"><?php echo $InfosEvent[$i]->formation; ?></p>

                        <?php }?>
                    </div>

                    <?php endfor; ?>

                </div>

                
            </main>

</div>
    