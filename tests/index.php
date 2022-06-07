<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Container */
        .container {
            margin: 0 auto;
            border: 0px solid black;
            width: 50%;
            height: 250px;
            border-radius: 3px;
            background-color: ghostwhite;
            text-align: center;
        }

        /* Preview */
        .preview {
            width: 100px;
            height: 100px;
            border: 1px solid black;
            margin: 0 auto;
            background: white;
        }

        .preview img {
            display: none;
        }

        /* Button */
        .button {
            border: 0px;
            background-color: deepskyblue;
            color: white;
            padding: 5px 15px;
            margin-left: 10px;
        }
    </style>
    <script src="../script/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#but_upload").click(function() {

                var fd = new FormData();
                var files = $('#file')[0].files;

                // Check file selected or not
                if (files.length > 0) {
                    // fd.append('file', files[0]);

                    var data = {
                        'name': 'asa',
                        'file': files[0]
                    }

                    $.ajax({
                        url: 'upload.php',
                        type: 'post',
                        data: data,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response != 0) {
                                $("#img").attr("src", response);
                                $(".preview img").show(); // Display image element
                            } else {
                                alert('file not uploaded');
                            }
                        },
                    });
                } else {
                    alert("Please select a file.");
                }
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data" id="myform">
            <div class='preview'>
                <img src="" id="img" width="100" height="100">
            </div>
            <div>
                <input type="file" id="file" name="file" multiple />
                <input type="button" class="button" value="Upload" id="but_upload">
            </div>
        </form>
    </div>
</body>

</html>