<section class="header_text sub">
    <?php require_once ('controls/banniere.php');?>
    <h4><span>Connexion et Insription</span></h4>
</section>
<section class="main-content">
    <div class="row">
        <div class="span5">
                <h4 class="title"><span class="text"><strong>Connexion</strong> Ici</span></h4>
                <div class="login-form-grids">
                    <form name="loginform" id="loginform" onsubmit="return false;">
                        <label class="control-label" id="alert-login"></label>
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">Pseudo</label>
                                <div class="controls">
                                    <input type="text" placeholder="Votre pseudo" id="loginpseudo" class="input-xlarge" required="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Mot de passe</label>
                                <div class="controls">
                                    <input type="password" placeholder="Votre mot de passe" id="loginpass" class="input-xlarge" required="">
                                </div>
                            </div>
                            <div class="control-group">
                                <input tabindex="3" class="btn btn-inverse large" type="submit" value="Connexion">
                                <hr>
                            </div>
                        </fieldset>
                    </form>
                </div>
        </div>
        <div class="span7">
            <h4 class="title"><span class="text"><strong>Création</strong> Compte</span></h4>
            <form name="form" id="registerform" class="form-stacked" onsubmit="return false;">
                <label class="control-label" id="alert-register"></label>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Votre nom</label>
                        <div class="controls">
                            <input type="text" placeholder="Ex. John" id="nom" class="input-xlarge" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Votre Pseudo</label>
                        <div class="controls">
                            <input type="text" placeholder="Ex. John123" id="pseudo" class="input-xlarge" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Téléphone</label>
                        <div class="controls">
                            <input type="tel" placeholder="Ex. +234XXXXXXXX" id="numero" class="input-xlarge" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mot de passe</label>
                        <div class="controls">
                            <input type="password" placeholder="Mot de passe" id="pass1" class="input-xlarge" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Confirme mot de passe</label>
                        <div class="controls">
                            <input type="password" placeholder="Mot de passe confirme" id="pass2" class="input-xlarge" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" id="checkbox" name="checkbox" checked="checked" required=" "><i> </i>J'ai lu et accepté les conditions d'utilisation</label><br>
                        </div>
                    </div>
                    <hr>
                    <div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Inscription"></div>
                </fieldset>
            </form>
        </div>
    </div>
</section>