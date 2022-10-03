<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Modifier votre devis</h1>

                                    <form action="">
                                        <div id="Info-client" class="form_modif my-5 mx-auto">
                                            <input class="form-input" type="text" placeholder="Numéro du devis"> //incrémentation lettre chiffre
                                            <input class="form-input" type="text" placeholder="Nom de l'entreprise">
                                            <input class="form-input" type="text" placeholder="Adressse de l'entreprise">
                                            <input class="form-input" type="text" placeholder="n° de Siret">
                                        </div>

                                        <div id="info-details" class="form_modif my-5 mx-auto">
                                            <input class="form-input" type="text" placeholder="Date de la prestation">
                                        </div>

                                        <div id="nbr_client" class="form_modif my-5 mx-auto">
                                            <input id="nbrClient" type="checkbox" class="hidden">
                                            <label for="nbrClient" class="text-white cursor-pointer">Nombre de personnes : 7</label>
                                                <div id="container_client" class="hidden">
                                                    <div id="infos_client" class="flex" data-index="1">
                                                        <input class="form-input" type="text" id="nom-part" name="nom-part" placeholder="Nom ">
                                                        <input class="form-input" type="text" id="prenom-part" name="prenom-part" placeholder="Prénom ">
                                                        <input class="form-input" type="text" id="date_naissance" name="date_naissance" placeholder="JJ/MM/AAAA">
                                                        <div class="flex items-center mx-auto">
                                                            <a href="#"><i class="fas fa-trash-alt text-white cursor-pointer"></i> </a>
                                                        </div>
                                                    </div>
                                                    <div id="add" class="flex justify-center text-white my-10 w-full">
                                                        <i class="fas fa-plus text-lg  border-2 border-white p-4 rounded-full "></i>
                                                    </div>
                                                </div>
                                        </div>

                                        <div id="Info-devis"class="form_modif my-5 mx-auto">
                                            <input class="form-input" type="text" placeholder="Prix Unitaire HT">
                                            <input class="form-input" type="text" placeholder="Prix Total HT">
                                            <input class="form-input" type="text" placeholder="TVA">
                                            <input class="form-input" type="text" placeholder="Prix">
                                            <input type="submit" class="btn-form mx-auto">
                                        </div>
                                    </form>

            </main>
        </div>