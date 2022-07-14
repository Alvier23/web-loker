<!-- ======= Footer ======= -->
<footer id="footer" class="section-bg">
    <div class="footer-top">
        <div class="container">

            <div class="row">

                <div class="col-lg-6">

                    <div class="row">

                        <div class="col-sm-6">

                            <div class="footer-info">
                                <h3>PT UTM</h3>
                                <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                            </div>

                            <div class="footer-newsletter">
                                <h4>Our Newsletter</h4>
                                <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem.</p>
                                <form action="" method="post">
                                    <input type="email" name="email"><input type="submit" value="Subscribe">
                                </form>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="footer-links">
                                <h4>Useful Links</h4>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#about">About us</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Terms of service</a></li>
                                    <li><a href="#">Privacy policy</a></li>
                                </ul>
                            </div>

                            <div class="footer-links">
                                <h4>Contact Us</h4>
                                <p>
                                    Perumahan Bundaran Graha Kamal <br>
                                    Bangkalan, 61151<br>
                                    Indonesia <br>
                                    <strong>Phone:</strong> +62 872987212<br>
                                    <strong>Email:</strong> ptutmantap@gmail.com<br>
                                </p>
                            </div>

                            <div class="social-links">
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="form">

                        <h4>Send us a message</h4>
                        <p>Eos ipsa est voluptates. Nostrum nam libero ipsa vero. Debitis quasi sit eaque numquam similique commodi harum aut temporibus.</p>

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>

                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>

                            <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>PT Usaha Teknologi Mantap</strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End  Footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/user/vendor/jquery.easing/jquery.easing.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/vendor/php-email-form/validate.js'); ?>"></script>
<script src="<?= base_url('assets/user/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/vendor/counterup/counterup.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/vendor/venobox/venobox.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/vendor/owl.carousel/owl.carousel.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/vendor/waypoints/jquery.waypoints.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/vendor/aos/aos.js'); ?>"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets/user/js/main.js'); ?>"></script>
<script>
    // modal edit dokumen
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const id_user = $(this).data('userid');
            const filecv = $(this).data('filecv');
            const fileskck = $(this).data('fileskck');
            const filelamaran = $(this).data('filelamaran');
            const foto = $(this).data('foto');
            $('.id').val(id);
            $('.userid').val(id_user);
            $('.cv').text(filecv);
            $('.skck').text(fileskck);
            $('.lamaran').text(filelamaran);
            $('.foto').text(foto);
            $('#editModal').modal('show');
        });
    });

    // preview file edit modal dokumen
    function previewFile() {
        const filecv = document.querySelector('#filecv');
        const filecvLabel = document.querySelector('.cv');

        const fileskck = document.querySelector('#fileskck');
        const fileskckLabel = document.querySelector('.skck');

        const filelamaran = document.querySelector('#filelamaran');
        const filelamaranLabel = document.querySelector('.lamaran');

        const filefoto = document.querySelector('#foto');
        const filefotoLabel = document.querySelector('.foto');

        filecvLabel.textContent = filecv.files[0].name;
        fileskckLabel.textContent = fileskck.files[0].name;
        filelamaranLabel.textContent = filelamaran.files[0].name;
        filefotoLabel.textContent = filefoto.files[0].name;
    }
</script>


</body>

</html>