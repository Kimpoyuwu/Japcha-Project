
</div>

<script type="text/javascript">
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
<script src="../assets/js/cms-buttonFunction.js"></script>

<script src="../assets/js/summerNote.js"></script>
<?php
    include "adminFooter.php";

?>