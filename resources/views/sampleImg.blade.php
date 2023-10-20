<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Laravel 10 Image Upload</h2>
            </div>
            <div class="panel-body">
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    <img src="images/{{ \Session::get('valImage')}}" alt="">
                    <img src="images/profiles/{{ \Session::get('userProfile')}}" alt="">
                @else
                    <img src="images/valUser.png" alt="">
                    <img src="images/profiles/userProfile.png" alt="">
                @endif
                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Image here:</label>
                            <input type="file" name="valImage" class="form-control @error('valImage') is-invalid @enderror">

                            @error('valImage')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image here:</label>
                            <input type="file" name="userProfile" class="form-control @error('userProfile') is-invalid @enderror">

                            @error('userProfile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </body>
</html>