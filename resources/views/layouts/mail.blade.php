<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        html, body {
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
        }
        body {
            background: #ffffff;
            font-size: 16px;
            line-height: 1.3;
            font-family: Helvetica, Arial, sans-serif;
            padding: 20px;
        }
        .page-wrapper {
            max-width: 800px;
            margin: 0px auto;
            background: #fff;
        }

        a, a:link, a:visited {
            color: #00447C;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        .page-letter {

            width: auto;
            padding: 40px;
            margin-top: 0px;
            display: block;
            overflow: hidden;
            word-wrap: break-word;

        }
        .section-title {

            color: #00447C;
            font-size: 38px;
            line-height: 1.1;
            font-weight: 500;
            margin: 0px 0 25px 0;
        }

        table.statistic th, table.statistic td {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <div class="page-letter">
        @yield('content')
    </div>
</div>
</body>
</html>