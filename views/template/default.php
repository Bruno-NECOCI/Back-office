<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Réaformation</title>
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./style/css/style.css">

    <!-- Quill -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    
</head>

<body class="bg-gray-100 font-family-karla flex">
    <!-- Script Javascrip -->
    <script src="./js/dashboard.js" defer></script>
    <script src="./js/selectPhoto.js" defer></script>
    <script src="./js/loadFiles.js" defer></script>
    <script src="./js/btn.js" defer></script>
    <script src="./js/menu_fc.js" defer></script>
    <script src="./js/verif_form_accueil.js" defer></script>
    <script src="./js/gestion.js" defer></script>
    <script src="./js/modifNbClient.js" defer></script>
    <script src="./js/details.js" defer></script>
    
    <aside class="relative bg-sidebar h-screen w-1/4 hidden sm:block shadow-xl rounded-br-3xl rounded-tr-3xl">
        <div class="p-6">
            <a href="dashboard" class="text-white text-3xl font-semibold uppercase hover:text-gray-300 sm:hidden lg:block" >REAFORMATION</a>
            <a href="dashboard" class="text-white text-3xl font-semibold uppercase hover:text-gray-300 hidden sm:block lg:hidden">RF</a>
        </div>

        <nav class="text-white text-base font-semibold pt-3">
            <a href="dashboard" class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="new" class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-list-check mr-3"></i>
                Nouveaux contrats
            </a>
            <a href="gestionContrat" class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fa-solid fa-file-invoice mr-3"></i>
                Gestion des contrats
            </a>
            <a href="archives" class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-folder-open mr-3"></i>
                Archives
            </a>
            <a href="contenu" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fa-solid fa-photo-film mr-3"></i>
                Contenu
            </a>
            <a href="deconnexion" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fa-solid fa-right-from-bracket mr-3"></i>
                Déconnexion
            </a>
        </nav>
        
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Reaformation</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="dashboard" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="new" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fa-solid fa-list-check mr-3"></i>
                    Nouveaux contrats
                </a>
                <a href="gestionContrat" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fa-solid fa-file-invoice mr-3"></i>
                    Gestion des contrats
                </a>
                <a href="archives" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fa-solid fa-folder-open mr-3"></i>
                    Archives
                </a>
                <a href="contenu" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fa-solid fa-photo-film mr-3"></i>
                    Contenu
                </a>
                <a href="deconnexion" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fa-solid fa-right-from-bracket mr-3"></i>
                    Déconnexion
                </a>
              
            </nav>
        </header>

        <?php echo $contenu ?>
        
    </div>

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="./js/quill.js"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- ChartJS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script> -->

</body>
</html>
