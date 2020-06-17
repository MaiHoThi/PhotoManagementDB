<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <title>Insert Photo</title>
</head>

<body>
    <div class="container">

        <form action="/photos/insert" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <legend>Insert</legend>

            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" name="title" placeholder="Input title">
            </div>
            <div class="form-group">
                <label for="category">category</label> @csrf
                <select name="category" class="form-control" required="required">
                    @foreach ($category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="tags">tag</label> @csrf
                <select name="tags[]" class="form-control" required="required" multiple>
                    @foreach ($tags as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group">
                <label for="description">description</label>
                <textarea type="text" class="form-control" name="description"></textarea>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

       
    </div>
</body>

</html>