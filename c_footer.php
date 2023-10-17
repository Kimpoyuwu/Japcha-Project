<?php
    require_once 'classes/dbh.classes.php';
     require 'classes/save_note_Model.php';
     require_once 'classes/save_note_View.php';
     $AboutUsInfo = new SampleView();
?>
<footer>
        <div id="footer-container">
            <div id="social-media-footer">
                <ul>
                    <li>
                        <a href="<?php echo $data['fbLink']; ?>">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $data['ytLink']; ?>">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $data['instagramLink']; ?>">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="visitUs">
                <h3>VISIT AND CONTACT US</h3>
            </div>
        </div>
     </footer>
     <script src="customer.js"></script> 
</body>
</html>