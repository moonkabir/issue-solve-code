<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>jQuery Loading Local JSON File</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <?php
    // $json = file_get_contents('product-list.json');
    // $json_datas = json_decode($json,true);
    // foreach($json_datas as $json_data){
    //     print_r($json_data);
    // }
    ?>
    <script>
        // $(document).ready(function(){
        //     $.getJSON("./product-list.json", function(data){
        //         console.log(data);
        //     }).fail(function(){
        //         console.log("An error has occurred.");
        //     });
        // });
        ;
        jQuery(function($) {
            "use strict";
            $(window).on('load', function() {
                $.ajax({
                    url: "product-list.json",
                    success: function(result) {
                        // $("#div1").html(result);
                        console.log(result);
                    }
                });
            });
        });
    </script>
</body>

</html>