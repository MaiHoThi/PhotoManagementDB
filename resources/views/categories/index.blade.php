<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <title>index</title>
</head>
<body>
    <div class="container">
        <table class="table table-bordered">
            @csrf
           
                
            
            <thead>
                <tr>
                    <th>title</th>
                    <th>category</th>
                    <th>description</th>
                    <th>tag</th>
                    <th>image</th>
                    <th><button class="btn btn-danger">Sửa</button></th>
                    <th><button  class="btn btn-danger">Xóa</button></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                <tr>
                    <td>{{$photo->title}}</td>
                    
                    <td>{{$photo->category->name}}</td>
                    
                    
                    <td>
                        {{$photo->description->content}}
                    </td>

                    <td>
                        @foreach( $photo->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    </td> 
                   
                   
             
                    
                    <td><img src="{{'/storage/'.$photo->image}}" alt="avata"></td>
                <th><form action="{{'edit/'.$photo->id}}">
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger">Sửa</button></th>
                    </form>
                    <th>
                    <form action="{{'photo/'.$photo->id}}">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button></th>
                </tr>
                @endforeach
            </tbody>
        
        </table>

    </div>
</body>
</html>