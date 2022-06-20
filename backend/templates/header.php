<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKijelző</title>
    <link rel="stylesheet" href="https://unpkg.com/marx-css/css/marx.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/elte-fi/www-assets@19.10.16/styles/mdss.min.css">
    <style>
        :root {
            --primary: #517d81;
            --base-layer: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        body {
            background-color: hsl(45, 29%, 97%);
        }

        p.error {
            color: red;
        }

        p.success {
            color: green;
        }

        h1 {
            text-transform: none;
        }

        details {
            padding: 1em;
            /* transition: ease-in 0.2s; */
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            border-radius: 2px;
            box-shadow: var(--base-layer);
            background-color: #fff;
        }

        details:hover,
        details[open]:hover {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        }

        details[open] {
            /* transition: ease-in 0.2s; */
            box-shadow: var(--base-layer);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        }

        summary {
            width: 100%;
            cursor: pointer;
            margin-bottom: 0;
        }


        summary::marker {
            font-weight: 700;
            font-size: 1.5em;
            color: #7a8174
        }

        summary h2 {
            display: inline;
        }


        input[type=file] {
            background-color: var(--primary);
            border: 1px solid transparent;
            border-radius: var(--br);
            color: var(--white);
            display: inline-block;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            padding: var(--sm-pad) var(--md-pad);
            text-align: center;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            vertical-align: middle;
            white-space: nowrap;
            cursor: pointer;
        }

        input[type=submit] {
            cursor: pointer;
        }
        form.confirm-delete{
            display: inline-block;
        }
        input.confirm-delete-btn{
            background-color: hsl(5, 59%, 57%);
            text-transform: uppercase;
            font-weight: 700;
        }
    </style>
    <script defer>
        document.querySelectorAll("button").forEach(b => b.addEventListener(e => {
            e.preventDefault();
            console.log("puff")
        }));
    </script>
</head>