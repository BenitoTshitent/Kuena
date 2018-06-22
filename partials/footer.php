        <section id="footer-bar">
            <div class="row">
                <div class="span3">
                    <h4>Navigation</h4>
                    <ul class="nav">
                        <li><a href="./index.php">Acceuil</a></li>
                        <li><a href="./index.php?p=apropos">A Propos</a></li>
                        <li><a href="./index.php?p=pages">Pages</a></li>
                        <li><a href="./index.php?p=register">Inscription</a></li>
                        <li><a href="./index.php?p=register">Connexion</a></li>
                 </ul>
                </div>
                <div class="span4">
                    <h4>Partenaires</h4>
                    <ul class="nav">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                    </ul>
                </div>
                <div class="span5">
                    <a href="index.php" class="logo pull-left"> <H3>ku2za</H3></a>
                        <span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
            </div>
             </div>
            </section>
            <section id="copyright">
                <span>Copyright &copy; <script>document.write(new Date().getFullYear());</script> PROJETXXL  All right reserved.</span>
            </section>
         </div>
        <script src="assets/themes/js/common.js"></script>
        <script src="assets/themes/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript">
            $(function() {
                $(document).ready(function() {
                    $('.flexslider').flexslider({
                        animation: "fade",
                        slideshowSpeed: 4000,
                        animationSpeed: 600,
                        controlNav: false,
                        directionNav: true,
                        controlsContainer: ".flex-container" // the container that holds the flexslider
                    });
             });
            });
        </script>
        <script>
            $(function () {
                $('#myTab a:first').tab('show');
                $('#myTab a').click(function (e) {
                    e.preventDefault();
                    $(this).tab('show');
                })
            })
            $(document).ready(function() {
                $('.thumbnail').fancybox({
                    openEffect  : 'none',
                    closeEffect : 'none'
                });

                $('#myCarousel-2').carousel({
                    interval: 2500
                });
            });
        </script>
        <!--Libs-->
        <script src="libs/js/register.jquery.min.js"></script>
        <script src="libs/js/connect.jquery.min.js"></script>
        <script src="libs/js/footer.jquery.min.js"></script>
        <script src="libs/js/page.jquery.min.js"></script>
    </body>
</html>