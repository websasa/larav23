<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!--Add Bootstrap styles (you can download them or use a CDN)-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>   
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FFF4F2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        .container {
           width: 1200px;
           height:400px ;
            background-color: #3B3A39;
            color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        #showTotalImagesBtn {
            margin-top: 150px;
        }

        #totalImages {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body> <a href="{{ route('login') }}" id="loginLink" class="btn btn-success"> Login</a>
<a href="{{ route('registration') }}" id="registrationLink" class="btn btn-info"> Registration</a>

    <div class="container">
        <h1>Welcome</h1>
        <p>
        Get ready for a unique image uploading experience
        </p>   
        

        <button id="showTotalImagesBtn" class="btn btn-primary">total number of images</button>
        <p id="totalImages" class="mt-3"></p>
    </div>

    <!-- Add Bootstrap styles (you can download them or use a CDN)) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#showTotalImagesBtn').click(function () {
                // Ajax request to retrieve the total number of images
                $.ajax({
                    url: '/getTotalImages',  // Replace with the appropriate URL
                    type: 'GET',
                    success: function (data) {
                        $('#totalImages').text('Ukupan broj slika: ' + data.totalImages);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>
</html>






