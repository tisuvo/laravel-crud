<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crud Project</title>
          
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    h2 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid #ccc;
    }

    th, td {
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #f4f4f4;
    }

    img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 5px;
    }

    button {
      padding: 6px 12px;
      margin: 2px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .edit-btn {
      background-color: #4CAF50;
      color: white;
    }

    .delete-btn {
      background-color: #f44336;
      color: white;
    }

     .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 20px;
      background-color: #f5f5f5;
      border-bottom: 1px solid #ddd;
    }

    .header button {
      padding: 10px 18px;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .home-btn {
      background-color: #3498db;
      color: white;
    }

    .add-btn {
      background-color: #2ecc71;
      color: white;
    }

    .home-btn {
  background-color: #3498db;
  color: white;
  padding: 10px 18px;
  font-size: 16px;
  border: none;
  border-radius: 6px;
  text-decoration: none;
  display: inline-block;
}

 .add-btn {
  background-color: #3498db;
  color: white;
  padding: 10px 18px;
  font-size: 16px;
  border: none;
  border-radius: 6px;
  text-decoration: none;
  display: inline-block;
}

  </style>


</head>
<body>

<div class="header">
   <a href="index.html" class="home-btn">Home</a>
<a href="/create" class="add-btn">Add New</a>

    
  </div>
 @if(session('success'))
 <h2>{{session('success')}}</h2>

 @endif

 <h2>Item List</h2>

  <form>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

      @foreach ($posts as $post)
    <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->name}}</td>
          <td>{{$post->description}}</td>
          <td><img src="images/{{$post->image}}" alt="Apple"></td>
          <td>


            <a href="{{route('edit',$post->id)}}">Edit</a>
            <a href="{{route('delete',$post->id)}}">Delete</a>
          
          </td>
        </tr>        
@endforeach


       
      </tbody>
    </table>
{{ $posts->links() }}


    
  </form>
</body>
</html>