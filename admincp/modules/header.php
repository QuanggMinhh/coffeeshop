<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <link rel="stylesheet" href="css/styleadmincp.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .sidebar {
            min-width: 200px;
            max-width: 200px;
            background-color: #f8f9fa;
            padding: 15px;
        }

        .coffee-bg {
            background-color: #6F4E37;
            /* Màu nâu cà phê */
        }

        .sidebar .nav-link {
            margin-bottom: 10px;
        }

        .content {
            flex: 1;
            padding: 15px;
        }

        .table-container {
            margin-top: 20px;
        }

        .custom-form {
        background-color: #6F4E37; /* Màu nâu nhạt */
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    <?php
        if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
            unset($_SESSION['dangnhap']);
            header('Location:login.php');
        }
    ?>

    </style>
</head>