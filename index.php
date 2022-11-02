
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">File Submit</h2>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <table class="table table-success table-striped table-bordered">
                        <tr>
                        <th>Name: </th>
                        <td><input type="text" name="username" placeholder="Enter Your Name "></td>
                        </tr>
                        <tr>
                        <th>Email: </th>
                        <td><input type="email" name="email" placeholder="Enter Your Email "></td>
                        </tr><tr>
                        <th>Password: </th>
                        <td><input type="password" name="password" placeholder="Enter Your Pasword "></td>
                        </tr> 
                        <tr>
                            <th>UploadFile</th>
                            <td><input type="file" name="files"></td>
                        </tr>
                        <tr>
                            <th>SubmitFile</th>
                            <td><input type="submit" name="submit" class="btn btn-success" value="upload"></td>
                        </tr>
                </table>
            </form>
            <?php
            
                if(isset($_POST['submit'])){
                    $name = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $fileUp = $_FILES['files'];
                    $imageName = $fileUp['name'];
                    $type = $fileUp['type'];
                    $tmp_name = $fileUp['tmp_name'];
                    $size = $fileUp['size'];
                    if(!empty($name && $email && $password && $imageName)){
                        $locations = "upload/";
                        if(move_uploaded_file($tmp_name, $locations.$imageName)){
                            $displayImg =$locations.$imageName;
                        echo "<img src='$displayImg' style='weight:150px;height:200px'>";
                        echo "<br>";
                        echo "<span style='color:green; font-weight:bold;'>File Uploded...</span>";
                        echo floor($size/1024).".KB";

                
                        }else{
                            echo "File Not Uploded...";
                        }
                    }else{
                        echo "<span style='color:red; font-weight:bold;'>Please Enter All Input Box Data...</span>";
                    }
            }
    
            ?>

            </div>

        </div>
        

    </div>

</body>
</html>