<?php global $jamal_admin; ?>
<footer class="mt-5">
    <div class="container-fluid bg-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="footer-widget">
                                    <div class="title-f-widget">رسالة دارالجمال:</div>
                                    <div class="footer-c-widget">
                                        <p>
                                            <?php echo $jamal_admin['opt-footer-about'] ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="footer-widget fsocial">
                                    <div class="title-f-widget">دارالجمال في مواقع التواصل الاجتماعي</div>
                                    <div class="footer-c-widget">
                                        <ul class="social">
                                            <li><a href="<?php echo $jamal_admin['opt-instagram'] ?>"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="footer-widget">
                                    <div class="title-f-widget mt-xxs-3">التواصل معنا:</div>
                                    <div class="footer-c-widget">
                                        <span><?php echo $jamal_admin['opt-contact-text'] ?></span>
                                        <div class="contact d-flex">
                                            <div class="address">
                                                <?php echo $jamal_admin['opt-address'] ?>
                                                <i class="fa fa-location-arrow"></i></div>
                                            <div class="email"><a
                                                    href="mailto: <?php echo $jamal_admin['opt-email'] ?>">
                                                    <?php echo $jamal_admin['opt-email'] ?>
                                                    <i class="fa fa-mail-bulk"></i></a></div>
                                            <div class="tel"><a href="tel:<?php echo $jamal_admin['opt-phone'] ?>">
                                                    <?php echo $jamal_admin['opt-phone'] ?>
                                                    <i class="fa fa-phone-alt"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bottom-footer">
        <div class="container">
            <div class="row"><div class="social-footer">
<!--                    <div class="footer-widget">-->
<!--                        <div class="title-f-widget">مواقع التواصل الإجتماعي</div>-->
<!--                        <div class="footer-c-widget">-->
<!--                            <ul class="social">-->
<!--                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>-->
<!--                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="copyright">
                    <?php echo $jamal_admin['opt-crtpersian'] ?>
                    <span><?php echo $jamal_admin['opt-crt'] ?></span>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>