<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aggregator</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <x-header></x-header>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <x-form />
                </div>
                <div class="col-10">
                    <x-feed :feed='$feed' />
                </div>
            </div>
        </div>
    </body>
</html>