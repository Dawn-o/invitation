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
    <a href="{{ route('agenda.index', $identity->identity_id) }}" class="btn btn-info text-white">Agenda</a>
    <table class="table">
        <thead>
            <tr>
                <th>identity_id</th>
                <th>male_fullname</th>
                <th>male_nickname</th>
                <th>male_description</th>
                <th>male_socmed</th>
                <th>female_fullname</th>
                <th>female_nickname</th>
                <th>female_description</th>
                <th>female_socmed</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $identity->identity_id }}</td>
                <td> {{ $identity->male_fullname }}</td>
                <td> {{ $identity->male_nickname }}</td>
                <td> {{ $identity->male_description }}</td>
                <td> {{ $identity->male_socmed }}</td>
                <td> {{ $identity->female_fullname }}</td>
                <td> {{ $identity->female_nickname }}</td>
                <td> {{ $identity->female_description }}</td>
                <td> {{ $identity->female_socmed }}</td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('identity.destroy', $identity->identity_id) }}" method="POST">
                        <a href="{{ route('identity.edit', $identity->identity_id) }}"
                            class="btn btn-info text-white">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
