<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta story="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Admin Site | quote</title>
</head>

<body>
    <p class="text-success"> {{ session()->get('success') }} </p>
    <a href="{{ route('quote.create', $identity) }}" class="btn btn-success text-white">Add Data</a>
    <table class="table">
        <thead>
            <tr>
                <th>story</th>
                <th>date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quotes as $quote)
                <tr>
                    <td> {{ $quote->quote }}</td>
                    <td> {{ $quote->source }}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('quote.destroy', ['identity_id' => $identity, 'quote' => $quote->id]) }}"
                            method="POST">
                            <a href="{{ route('quote.edit', ['identity_id' => $identity, 'quote' => $quote->id]) }}"
                                class="btn btn-info text-white">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
