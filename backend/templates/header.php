<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKijelző</title>
    <link rel="stylesheet" href="https://unpkg.com/marx-css/css/marx.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/elte-fi/www-assets@19.10.16/styles/mdss.min.css">
    <style>
        :root{
            --primary: #517d81;
        }
        p.error{
            color: red;
        }
        h1{
            text-transform: none;
        }
        details{
            background-color: #517d81;
            color: white;
            padding: 1em;
            border: 10px solid #517d81;
            transition: ease-in 0.2s;
        }

        details[open]{
            background-color: initial;
            color: black;
            padding: 1em;
            border: 10px solid #517d81;
            transition: ease-in 0.2s;
        }

        summary{
            width: 100%;
            cursor: pointer;
            margin-bottom: 0;
        }

        summary h3{
            display: inline;
        }

    </style>
</head>