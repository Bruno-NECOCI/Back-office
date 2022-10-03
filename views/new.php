        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Nouvelles demandes</h1>

                <div class="w-full mt-6" x-data="{ openTab: 1 }">
                    <div>
                        <ul class="flex border-b">

                           <?php for ($i=0; $i < count($InfosEvent)  ; $i++):?>
                               
                                <li class="-mb-px mr-1" @click="openTab = <?php echo $i+1 ?>">
                                    <a :class="openTab === <?php echo $i+1 ?> ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Dossier <?php echo $i+1 ?></a>
                                </li>
                            
                           <?php endfor; ?>
    
                        </ul>
                    </div>
                    <div class="bg-white p-6">
                        
                    <?php for ($i=0; $i < count($InfosEvent); $i++):?>

                        <div id="" class="" x-show="openTab === <?php echo $i+1 ?>">
                            
                            <div class="tagClient my-10 TagTypeClient">
                        Type de client : <?php echo $InfosEvent[$i]->typeClient; ?>
                            </div>

                            <div class="info-client flex flex-col items-end my-10">
                                <div id=admin class="my-5 flex flex-col items-end">
                                    <h3 class="sous-titre ">Informations de l'organisateur :</h3>
                                    <p>Nom : <?php echo $InfosEvent[$i]->nomAdmin;?></p>
                                    <p>Prenom : <?php echo $InfosEvent[$i]->prenomAdmin;?></p>
                                </div>
                                <div id="details" class="my-5 flex flex-col items-end">
                                    <h3 class="sous-titre">Informations du client :</h3>

                                    <?php if ( $InfosEvent[$i]->typeClient == "entreprise"){ ?>

                                            <p><?php echo $infosClient[$i]['nomCorp'];?> </p>
                                            <p><?php echo $infosClient[$i]['adresse'];?></p>
                                            <p><?php echo $infosClient[$i]['tel'];?></p>
                                            <p><?php echo $infosClient[$i]['mail'];?></p>
                                            <p>n°Siret : <?php echo $infosClient[$i]['siret'];?></p>

                                            <?php }else if ($InfosEvent[$i]->typeClient == "particulier"){ ?>

                                            <p><?php echo $infosClient[$i]['adresse'];?></p>
                                            <p><?php echo $infosClient[$i]['tel'];?></p>
                                            <p><?php echo $infosClient[$i]['mail'];?></p>

                                            <?php }else if ($InfosEvent[$i]->typeClient == "ecole"){ ?>

                                            <p><?php echo $infosClient[$i]['nomEcole'];?> </p>
                                            <p><?php echo $infosClient[$i]['adresse'];?></p>
                                            <p><?php echo $infosClient[$i]['tel'];?></p>
                                            <p><?php echo $infosClient[$i]['mail'];?></p>

                                            <?php } ?> 

                                </div>
                            </div>

                            <div class="message my-10">
                                <h3 class="sous-titre">Message :</h3>
                                <p class=" text-justify w-2/3">
                                    <?php echo $InfosEvent[$i]->message; ?>
                                </p>
                            </div>

                            <div class="infoEvent my-10 ml-3">
                                <h3 class="sous-titre">Détails :</h3>
                                <p><?php echo $nbrPart[$i];?> Participants</p>
                                <p><?php echo $InfosEvent[$i]->formation;?></p>
                                <p><?php echo $InfosEvent[$i]->date; ?></p>
                            </div>
                            
                            <div class="btn flex justify-around w-full my-10">
                                <input type="button" value="Accepter" id="btn_accept" class="btn-accept">
                                <input type="button" value="Refuser" id="btn_decline" class="btn-decline">
                            </div>

                            <div id="formulaire">
                                <div id="decline" class="hidden" name="decline">
                                    
                                    <h3 class="h3 font-extrabold my-20">Pourquoi vous ne pouvez pas répondre favorablement à cette demande ?</h3>
                                    <div class="decline h-fit">
                                        <form action="" class="form mx-auto">
                                            <textarea name="" id="" cols="30" rows="10" class="form-input"></textarea>
                                            <input type="button" value="Envoyer" class="btn-form">
                                        </form>
                                    </div>
                                </div>

                                <div id="devis" class="hidden" name="devis">
                                    <h3 class="h3 font-extrabold my-20">Générer un devis</h3>

                                    <form action="new-updateEtatDevis-<?php echo $InfosEvent[$i]->idEvent; ?>">
                                        <div id="Info-client" class="form my-5 mx-auto">
                                            <input class="form-input" type="text" placeholder="Numéro du devis"> //incrémentation lettre chiffre
                                            <input class="form-input" type="text" placeholder="Nom de l'entreprise">
                                            <input class="form-input" type="text" placeholder="Adressse de l'entreprise">
                                            <input class="form-input" type="text" placeholder="n° de Siret">
                                        </div>

                                        <div id="info-details" class="form my-5 mx-auto">
                                            <input class="form-input" type="text" placeholder="Date de la prestation">
                                        </div>

                                        <div id="Info-devis"class="form my-5 mx-auto">
                                            <input class="form-input" type="text" placeholder="Nombre de personnes">
                                            <input class="form-input" type="text" placeholder="Prix Unitaire HT">
                                            <input class="form-input" type="text" placeholder="Prix Total HT">
                                            <input class="form-input" type="text" placeholder="TVA">
                                            <input class="form-input" type="text" placeholder="Prix">
                                            <input type="submit" class="btn-form mx-auto">
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>

                    <?php endfor; ?>

                    </div>
                </div>
            </main>
        </div>


    
           
    
