<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feedback</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="antialiased">
<div class="content">
    <div class="content-block">

        <div class="card" style="width: 28rem;">
            <div class="card-body">
                <form action="{{url('/feedback')}}" method="post">
                    @csrf
                    @if(Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                               id="full_name" name="full_name"
                               aria-describedby="name">
                        @error('full_name')
                        <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               name="email" aria-describedby="emailHelp">
                        @error('email')
                        <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Feedback Description</label>
                        <textarea class="form-control @error('feedback_msg') is-invalid @enderror"
                                  id="feedback_msg" name="feedback_msg"
                                  rows="3"></textarea>
                        @error('feedback_msg')
                        <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedback">
                        Send
                    </button>
                </form>

            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>
</body>
</html>
