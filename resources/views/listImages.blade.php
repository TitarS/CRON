<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="{{ route('image.add') }}" class="btn btn-group-lg btn-success">ADD</a>

<div class="container">
    <h2>Image Gallery</h2>
    <div class="row">
        @if($images->isNotEmpty())
            @foreach($images as $image)
{{--                <div class="col-md-3">
                    <h1>Origin</h1>
                    <div class="thumbnail">
                        <a href="{{ $image->getImage() }}" target="_blank">
                            <img src="{{ $image->getImage() }}" alt="Lights" >
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h1>Big</h1>
                    <div class="thumbnail">
                        <a href="{{ $image->getBigImage() }}" target="_blank">
                            <img src="{{ $image->getBigImage() }}" alt="Lights">
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h1>Small</h1>
                    <div class="thumbnail">
                        <a href="{{ $image->getSmallImage() }}" target="_blank">
                            <img src="{{ $image->getSmallImage() }}" alt="Lights">
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h1>Small</h1>
                    <div class="thumbnail">
                        <a href="{{ $image->getWatermarkImage() }}" target="_blank">
                            <img src="{{ $image->getWatermarkImage() }}" alt="Lights">
                        </a>
                    </div>
                </div>--}}

                @if($image->hasName())
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="{{ route('image.show', [$image->name, 1000, 1000]) }}" target="_blank">
                                <img src="{{ route('image.show', [$image->name, 500, 500]) }}" alt="Lights">
                            </a>
                        </div>
                    </div>
                @endif
{{--                <div class="col-md-12">
                    <hr>
                </div>--}}
            @endforeach
        @endif
    </div>
</div>

</body>
</html>
