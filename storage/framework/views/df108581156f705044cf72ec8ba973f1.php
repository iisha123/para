<style>
footer {
    width: 100%;
    margin: 0;
    padding: 0;
    background-color: #fcf2f7; /* Soft pink background */
    color: #6d6875; /* Muted purple-gray text */
    font-family: 'Montserrat', sans-serif;
    border-top: 3px solid #f8c8dc; /* Light pink border */
}

footer h5 {
    font-family: 'Playfair Display', serif;
    letter-spacing: 1px;
    color: #b56576; /* Dusty rose */
    font-weight: 600;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

footer h5::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 2px;
    background-color: #e7a9bc; /* Light rose */
}

footer p {
    color: #6d6875;
    line-height: 1.8;
    font-size: 14px;
}

footer ul li a {
    color: #6d6875;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 14px;
}

footer ul li a:hover {
    color: #b56576;
    padding-left: 5px;
}

footer ul li {
    margin-bottom: 12px;
}

footer .table {
    color: #6d6875;
    font-size: 14px;
}

footer .table tr td {
    border-color: #f8e1eb; /* Very light pink */
    padding: 8px 0;
}

footer .copyright {
    background-color: #f8e1eb; /* Very light pink */
    padding: 15px 0;
    font-size: 13px;
}

footer .social-icons a {
    display: inline-block;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #e7a9bc; /* Light rose */
    color: white;
    text-align: center;
    line-height: 36px;
    margin-right: 10px;
    transition: all 0.3s ease;
}

footer .social-icons a:hover {
    background-color: #b56576;
    transform: translateY(-3px);
}

.flower-divider {
    height: 20px;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="%23e7a9bc"><path d="M12,2 C13.1,2 14,2.9 14,4 C14,5.1 13.1,6 12,6 C10.9,6 10,5.1 10,4 C10,2.9 10.9,2 12,2 M12,7 C14.8,7 18,8.7 18,12 C18,15.3 14.8,17 12,17 C9.2,17 6,15.3 6,12 C6,8.7 9.2,7 12,7 M12,9 C9.8,9 8,10.2 8,12 C8,13.8 9.8,15 12,15 C14.2,15 16,13.8 16,12 C16,10.2 14.2,9 12,9 Z"/></svg>');
    background-repeat: repeat-x;
    background-position: center;
    margin: 0;
    padding: 0;
}
</style>

<footer class="mt-5">
    <div class="flower-divider"></div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5>Para4You</h5>
                <p>
                    Découvrez Para4You, votre boutique en ligne dédiée aux produits de soin de la peau. Nous sélectionnons avec soin des marques reconnues pour leur qualité afin de vous offrir des solutions adaptées à vos besoins.
                </p>
                <p>Prenez soin de vous, naturellement, avec Para4You.</p>
                <div class="social-icons mt-4">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-pinterest"></i></a>
                    <a href="#"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5>Liens Utiles</h5>
                <ul class="list-unstyled">
                    <li><a href="#!"><i class="bi bi-chevron-right small me-2"></i>Questions Fréquentes</a></li>
                    <li><a href="#!"><i class="bi bi-chevron-right small me-2"></i>Livraison</a></li>
                    <li><a href="#!"><i class="bi bi-chevron-right small me-2"></i>Tarifs</a></li>
                    <li><a href="#!"><i class="bi bi-chevron-right small me-2"></i>Zones de Livraison</a></li>
                    <li><a href="#!"><i class="bi bi-chevron-right small me-2"></i>Politique de Retour</a></li>
                </ul>
            </div>
            
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5>Mon Compte</h5>
                <ul class="list-unstyled">
                    <li><a href="#!"><i class="bi bi-chevron-right small me-2"></i>Se Connecter</a></li>
                    <li><a href="#!"><i class="bi bi-chevron-right small me-2"></i>Mon Panier</a></li>
                    <li><a href="#!"><i class="bi bi-chevron-right small me-2"></i>Mes Commandes</a></li>
                    <li><a href="#!"><i class="bi bi-chevron-right small me-2"></i>Wishlist</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5>Heures d'Ouverture</h5>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Lundi - Vendredi:</td>
                            <td>8h - 21h</td>
                        </tr>
                        <tr>
                            <td>Samedi - Dimanche:</td>
                            <td>8h - 1h</td>
                        </tr>
                    </tbody>
                </table>
                <p class="mt-3">
                    <i class="bi bi-headset me-2"></i> Service Client: +212 123-456-789
                </p>
            </div>
        </div>
    </div>
    
    <div class="copyright text-center py-3">
        &copy; 2024 Para4You. Tous droits réservés.
        <a href="#" class="ms-2 text-decoration-none" style="color: #b56576;">Para4You.ma</a>
    </div>
</footer><?php /**PATH C:\xampp\htdocs\para\resources\views/footer.blade.php ENDPATH**/ ?>