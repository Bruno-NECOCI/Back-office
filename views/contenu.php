
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-3">
                <h1 class="text-3xl text-black pb-6">Gestion des contenus du site</h1>

                <div class="w-full mt-6" x-data="{ openTab: 1 }">
                    <div>
                        <ul class="flex border-b">
                            <li class="-mb-px mr-1" @click="openTab = 1">
                                <a :class="openTab === 1 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Page d'accueil</a>
                            </li>
                            <li class="mr-1" @click="openTab = 2">
                                <a :class="openTab === 2 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Page de formations</a>
                            </li>
                            <li class="mr-1" @click="openTab = 3">
                                <a :class="openTab === 3 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Page a propos</a>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-white p-2">
                        <div id="" class="" x-show="openTab === 1">
                            <h3 class="h3 my-24 text-3xl font-extrabold">Changement de la photo de la page d'accueil</h3>
                            <div id="container-photo" class="container-photo">
                            <!-- <div id="container-photo" class=" h-min flex flex-col lg: flex flex-row"> -->

                                <?php if(!$imageActive) {?>
                                
                                <img src="./img/<?php echo $imageDefault->nom?>" alt="<?php echo $imageDefault->alt?>" class="w-96 h-96 object-cover borderL mx-auto lg:flex-2" id="active">
                                
                                <div class="fonctions flex flex-col h-48 m-auto place-content-around items-center ">
                                    <div class="btn-fct-d">Supprimer l'image</div>
                                    <div class="btn-fct-d">Activer l'image</div>
                                </div>

                                <?php }else{ ?>

                                <img src="./img/<?php echo $imageActive->nom?>" alt="<?php echo $imageActive->alt?>" class="w-96 h-96 object-cover borderL md: mx-auto lg:flex-2" id="active">
                                
                                <div class="fonctions flex flex-col h-48 m-auto justify-around items-center">
                                    <form action="contenu-suppAcc" method="POST">
                                        <input type="text" id="supp" name="supp" class="change"  hidden value="<?php echo $imageActive->id?>">
                                        <input type="submit" class="btn-fct" value="Supprimer l'image">

                                    </form>
                                    <form action="contenu-updateAcc" method="POST">
                                        <input type="text" id="update" name="update" class="change" hidden></input>
                                        <input type="submit" class="btn-fct" value="Activer l'image">
                                    </form>
                                    
                                </div>
                                <?php } ?>

                                <div class="ajouter flex items-center">
                                    <form action="contenu-addImgAcc" method="POST" class="form-file" enctype="multipart/form-data">  
                                        <input type="text" placeholder="Description de la photo" name="alt" id="alt" class="form-input">
                                        <div id=messageErrorLength class="msgError"></div>
                                        <div id="loadImg">
                                            <input type="file" name="photo" id="photo" class="input-none">
                                            <button type="button" id="btn-file" class="btn-form">Choisir une image</button>
                                            <span class="placeholder" id="placeholder">Choisissez une nouvelle image</span>
                                            <div id="messageErrorExt" class="msgError"></div>
                                        </div>
                                        <input type="submit" class="btn-form-d" value="ajouter" id="ajouter" disabled>
                                    </form>
                                </div>
                            </div>

                            <div id="bibliotheque" class="grid  gap-2 mt-10 grid-cols-2 md: grid-cols-3 lg:grid-cols-4">

                                <?php foreach ($imagesAccueil as $img): ?>
                                    
                                <input type="radio" name="img" id="<?php echo $img->id ?>" value="<?php echo $img->nom ?>" hidden>
                                <label for="<?php echo $img->id ?>">
                                    <img src="./img/<?php echo $img->nom ?>" alt="<?php echo $img->alt ?>" class="w-36 h-36 object-cover borderS mb-2 mx-auto lg:w-48 h-48 ">
                                </label>

                                <?php endforeach; ?>
                            </div>

                            <h3 class="h3 my-24 text-3xl font-extrabold">Contenu du speach de présentation</h3>
                            <div class="speach">
                                <form action="contenu-updateSpeachAcc" class="form mx-auto" method="POST">
                                    <textarea name="speach" id="speach" cols="15" rows="10" class="form-input"><?php echo $speach ?></textarea>
                                    <div id="messageErrorSpeach" class="msgError"></div>
                                    <input type="submit" value="valider" class="btn-form" id="btn-speach">
                                </form>
                            </div>

                            <h3 class="h3 my-24 text-3xl font-extrabold">Contenu du paragraphe "Pourquoi se former ?"</h2>

                            <div class="container">
                            <div id="quillEditor"><?php echo $reason ?></div>
                            </div>
                            <form action="contenu-updateReasonAcc" id="recption-html" class="flex flex-col" method="POST">
                                <textarea name="reason" id="reason" cols="30" rows="10" hidden></textarea>
                                <input id="btn_reason" type="submit" value="valider" class="btn-form w-40 mt-5 mx-auto ">
                            </form>

                            <h3 class="h3 my-24 text-3xl font-extrabold">Contenu des faces des Flips Cards</h3>

                            <div class="flip_card  my-24  lg: w-2/3 mx-auto">
                                <label class="label label-checked text-s " id="labelCard1">Flip Card 1</label>
                                <label class="label text-s" id="labelCard2">Flip Card 2</label>
                                <label class="label text-s" id="labelCard3">Flip Card 3</label> 
                            </div>

                            <div class="formulaires">
                                     
                                <?php foreach ($flipCards as $fc): ?>

                                    <form action="contenu-updateFc-<?php echo $fc->id ?>" class="form mx-auto" id="flipcard<?php echo $fc->id ?>" method="POST">
                                        <input type="text" id="num<?php echo $fc->id ?>" name="num<?php echo $fc->id ?>" class="form-input" method="POST" value="<?php echo $fc->chiffre ?>">
                                        <div id="messageErrorNum<?php echo $fc->id ?>" class="msgError"></div>
                                        <textarea name="fc<?php echo $fc->id ?>" id="contenu-fc<?php echo $fc->id ?>" cols="30" rows="10" class="form-input"><?php echo $fc->contenu ?></textarea>
                                        <div id="messageErrorFc<?php echo $fc->id ?>" class="msgError"></div>
                                        <input type="submit" value="valider" class="btn-form-d" id="btn-fc<?php echo $fc->id ?>" disabled>
                                    </form>

                                <?php endforeach; ?>
           
                                    
                            </div>

                        
                        </div>
                        <div id="" class="" x-show="openTab === 2">
                            Curabitur at lacinia felis. Curabitur elit ante, efficitur molestie iaculis non, blandit dictum dui. Fusce ac faucibus lorem, in aliquet metus. Praesent bibendum justo vitae ante imperdiet, sit amet posuere tortor tincidunt. Nam a arcu eros. In vitae augue tempus, ullamcorper lectus ut, egestas erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean imperdiet eget sapien nec consequat. Etiam imperdiet diam ac mattis gravida.
                        </div>
                        <div id="" class="" x-show="openTab === 3">
                            Duis imperdiet ullamcorper nibh, sed euismod dolor facilisis sit amet. Etiam quis cursus lorem. Vivamus euismod accumsan neque lobortis tempus. Praesent nec lacinia odio, a dictum risus. Sed eget dictum turpis, vitae iaculis orci. Vivamus laoreet consequat velit, non viverra diam pulvinar a. Aliquam bibendum ligula lacus, ac convallis ipsum hendrerit ut. Suspendisse rutrum dui libero, non aliquam lectus lobortis at. Donec gravida finibus sollicitudin. Nulla ut metus finibus purus vehicula porttitor. Fusce id sem non nisl pulvinar scelerisque.
                        </div>
                    </div>
                </div>
            </main>
        </div>

    <script src="../public/jsjs/quill.js"></script>
    <script src="../public/js/loadFiles.js"></script>
    <script src="../public/js/verif_form_accueil.js"></script>

    
           
    
