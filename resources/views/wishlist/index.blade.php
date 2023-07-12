<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Wishlist</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>
<body>
    <div class="container mt-5">
        <h1>My Wishlist</h1>

        <h2>
            <a href="{{ url('/products') }}" class="btn btn-primary">Go to Books</a>
        </h2>
        <h2>
            <a href="{{ route('cart.index') }}" class="btn btn-primary">Go to Cart</a>
        </h2>
        <div class="row">
            @foreach ($wishlist as $book)
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="{{ route('singleProducts', $book->slug) }}">
                        <img src="{{ asset('/images/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}" />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('singleProducts', $book->slug) }}">{{ $book->title }}</a>
                        </h5>
                        <p class="card-text">{{ $book->author }}</p>
                        <form method="post" action="{{ route('wishlist.destroy', $book->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove from Wishlist</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
