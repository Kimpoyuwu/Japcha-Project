
</div>

<script type="text/javascript">
    // function showLogo(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('#displaylogo').attr('src', e.target.result);
    //         }

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // function showImage(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('#displayimage').attr('src', e.target.result);
    //         }

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // function showBg(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('#displaybg').attr('src', e.target.result);
    //         }

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    
</script>

<script>
    function initializeSummernote(elementId) {
    const toolbar = [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      
    ];

    const fontSizes = ['8', '9', '10', '12', '14', '16', '18', '20', '22', '24', '26', '28', '36', '48',
        '72'
    ];

    const fontNames = ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'];
    
    $(elementId).summernote({
        height: 300,
        maxheight: 300,
        toolbar: toolbar,
        fontSizes: fontSizes,
        fontNames: fontNames
    });
}
</script>
<?php
    include "adminFooter.php";
?>