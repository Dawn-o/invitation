<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Site | Identity</title>
</head>

<body>
    <form action="{{ route('dashboard.store') }}" method="post">
        @csrf
        
        {{ session()->get('success') }}

        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <br>
        <br>
        <input type="text" name="male_fullname" id="">
        <br>
        <br>
        <input type="text" name="male_nickname" id="">
        <br>
        <br>
        <input type="text" name="male_description" id="">
        <br>
        <br>
        <input type="text" name="male_socmed" id="">
        <br>
        <br>
        <input type="text" name="female_fullname" id="">
        <br>
        <br>
        <input type="text" name="female_nickname" id="">
        <br>
        <br>
        <input type="text" name="female_description" id="">
        <br>
        <br>
        <input type="text" name="female_socmed" id="">
        <br>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
