<?php
    include "adminHeader.php";
?>
<div class="cms-container">
    <div class="header">
        <div class="header-text">Manage Content</div>
    </div>
    <form action="../includes/cms_inc.php" method="POST" enctype="multipart/form-data">
        <div class="second-section-container">
            <div class="edit-landing-page-section">
                <div class="header-section">Landing Page</div>
                <div class="body-section">
                    <div class="left-con">
                        <div class="input-con">
                            <label for="title">Title</label>
                            <input type="text" value="" name="title">
                        </div>
                        <div class="input-con">
                            <label for="subtitle">Subitle</label>
                            <textarea name="subtitle" id="" cols="10" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="right-con">
                        <div class="input-con">
                            <label for="logo-file">Logo</label>
                            <div class="logo-con"><img id="displaylogo" src="" alt=""></div>
                            <input id="file" type="file" name="logo" accept ="image/*" onchange="showLogo(this);" value="" >
                        </div>
                        <div class="input-con">
                            <label for="image-file">Image</label>
                            <div class="logo-con"><img id="displayimage" src="" alt=""></div>
                            <input id="file" type="file" name="image" accept ="image/*" onchange="showImage(this);" >
                        </div>
                        <div class="input-con">
                            <label for="bg-file">Background</label>
                            <div class="logo-con"><img id="displaybg" src="" alt=""></div>
                            <input id="file" type="file" name="bg" accept ="image/*" onchange="showBg(this);" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="publish-section">
                <div class="header-section">Publish</div>
                <div class="publish-btn">
                    <button class="publish" name="submit" type="submit">Publish</button>
                </div>
            </div>
        </div>

        <div class="third-section-container">
            <div class="about-us-con">
                <div class="header-about">About-us</div>
                <div class="abou-us-info-con">
                    <div class="edit-info">
                        <label for="japcha">What is Japcha?</label>
                        <textarea name="japcha" id="" cols="20" rows="7"></textarea>
                    </div>
                    <div class="edit-info">
                        <label for="order">How to Order?</label>
                        <textarea name="order" id="" cols="20" rows="7"></textarea>
                    </div>
                    <div class="edit-info">
                        <label for="social">Our Socials</label>
                        <textarea name="social" id="" cols="20" rows="7"></textarea>
                    </div>
                    <div class="edit-info">
                        <label for="policy">Our Policy</label>
                        <textarea name="policy" id="" cols="20" rows="7"></textarea>
                    </div>
                    <div class="edit-info">
                        <label for="loc">Our Location</label>
                        <textarea name="loc" id="" cols="20" rows="7"></textarea>
                    </div>
                    <div class="edit-info">
                        <label for="contact">Contact Us</label>
                        <textarea name="contact" id="" cols="20" rows="7"></textarea>
                    </div>
                </div>
            </div>
            <div class="top-sellers-con">

            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function showLogo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#displaylogo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function showImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#displayimage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function showBg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#displaybg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php
    include "adminFooter.php";

?>