<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="fs-3 navbar-brand" href="/">Bulletin Board</a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <div>
                    <ul class="navbar-nav">
                        <?php include 'categories_list.php'; ?> 
                    </ul>
                </div>

                <div class="dropdown me-5">
                    <div class= "btn-group dropstart">
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            Name
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                            <li><a class="dropdown-item" href="#">My ads</a></li>
                            <li><a class="dropdown-item" href="#">Place an ad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="input-group mt-4 mx-auto w-75">
        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
        </button>
        <ul class="dropdown-menu">
            <?php include 'categories_list.php'; ?> 
        </ul>
        <input type="text" class="form-control" placeholder="Search ads">
        <button type="button" class="btn btn-outline-secondary">Search</button>
    </div>

</header>

