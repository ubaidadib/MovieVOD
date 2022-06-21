<?php

class contact_us {

    public function display_contact_us($page) {
        ?>   <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="img/contact-us.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <div class="bt-option">
                                <a href="index.php?p=home">Home</a>
                                <span>Contact us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Contact Section Begin -->
        <section class="contact-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title contact-title">
                            <span>Contact Us</span>
                            <h2>GET IN TOUCH</h2>
                        </div>
                        <div class="contact-widget">
                            <div class="cw-text">
                                <i class="fa fa-map-marker"></i>
                                <p>Al Badawi Camp<br/>North Lebanon</p>
                            </div>
                            <div class="cw-text">
                                <i class="fa fa-mobile"></i>
                                <ul>
                                    <li>06-369852</li>
                                    <li>06-147852</li>
                                </ul>
                            </div>
                            <div class="cw-text email">
                                <i class="fa fa-envelope"></i>
                                <p>support.moviesvod@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3290.3422530139064!2d35.86650461522534!3d34.44345898050134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1521f43376349b8f%3A0xe50b77daae47c2f1!2sBaddawi%20Camp!5e0!3m2!1sen!2slb!4v1586847740840!5m2!1sen!2slb" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Contact Section End -->
        <?php
    }

}
?>