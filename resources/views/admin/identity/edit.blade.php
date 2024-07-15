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
    <title>Admin Site | Identity</title>
</head>

<body>
    <form action="{{ route('identity.update', $identity->identity_id) }}" method="post">
        @csrf
        @method('PUT')

        {{ session()->get('success') }}

        @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
        @endforeach
        <div class="input group mb-3">
            <input type="text" name="male_fullname" placeholder="male_fullname"
                value="{{ $identity->male_fullname }}" id="">
        </div>
        <div class="input group mb-3">
            <input type="text" name="male_nickname" placeholder="male_nickname"
                value="{{ $identity->male_nickname }}" id="">
        </div>
        <div class="input group mb-3">
            <input type="text" name="male_description" placeholder="male_description"
                value="{{ $identity->male_description }}" id="">

        </div>
        <div class="input group mb-3">
            <input type="text" name="male_socmed" placeholder="male_socmed" value="{{ $identity->male_socmed }}"
                id="">

        </div>
        <div class="input group mb-3">
            <input type="text" name="female_fullname" placeholder="female_fullname"
                value="{{ $identity->female_fullname }}" id="">

        </div>
        <div class="input group mb-3">
            <input type="text" name="female_nickname" placeholder="female_nickname"
                value="{{ $identity->female_nickname }}" id="">

        </div>
        <div class="input group mb-3">
            <input type="text" name="female_description" placeholder="female_description"
                value="{{ $identity->female_description }}" id="">

        </div>
        <div class="input group mb-3">
            <input type="text" name="female_socmed" placeholder="female_socmed"
                value="{{ $identity->female_socmed }}" id="">

        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
</body>

</html>
