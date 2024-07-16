<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Admin Site | love_story</title>
</head>

<body>
    <form action="{{ route('love_story.update', ['identity_id' => $identity, 'love_story' => $love_story->id]) }}"
        method="post">
        @csrf
        @method('PUT')

        {{ session()->get('success') }}

        @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
        @endforeach
        <div class="input group mb-3">
            <input type="text" name="story" placeholder="story" value="{{ $love_story->story }}" id="">
        </div>
        <div class="input group mb-3">
            <input type="date" name="date" placeholder="date" value="{{ $love_story->date }}" id="">
        </div>

        <button class="btn btn-success" type="submit">Submit</button>
    </form>
</body>

</html>
