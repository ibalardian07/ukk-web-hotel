<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Not Found</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body,
        html {
            font-family: Arial, Helvetica;
            color: #ffffff;
            background-color: #ffffff;
        }

        section.error {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        h1 {
            font-size: 48px;
            font-weight: 500;
            color: #262626;
        }

        p {
            font-size: 16px;
            line-height: 160%;
            margin-top: 6px;
            color: #262626;
        }
    </style>
</head>

<body>

    <section class="error">
        <div>
            <h1>404 - Not Found</h1>
            <p><?= $data['msg']; ?></p>
        </div>
    </section>

</body>

</html>