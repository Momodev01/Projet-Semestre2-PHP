<div class="container">
    <div class="row justify-content-center h-full">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center mb-4">Connexion</h2>
                    <form method="post" action="<?=WEBROOT?>">
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="motdepass" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                        </div> -->
                        <input type="hidden" name="controller" value="Security">
                        <input type="hidden" name="action" value="login">
                        <button type="submit" class="mt-3 btn btn-primary w-100">Se connecter</button>
                        <div class="mt-3 text-center">
                            <a href="#">Mot de passe oublié?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
