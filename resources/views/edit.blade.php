<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simple Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 40px;
    }

    .form-container {
      background: #fff;
      padding: 20px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      max-width: 400px;
      margin: auto;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical;
      height: 100px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #007BFF;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Submit Info</h2>
  <form action="{{ route('update', $ourPost->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{$ourPost->name}}">
      </div>

      @error('name')
           <p>{{$message}}</p>
      @enderror

      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $ourPost->description }}</textarea>

      </div>
 @error('description')
           <p>{{$message}}</p>
      @enderror
      <div class="form-group">
        <label for="image">Image File:</label>
        <input type="file" id="image" name="image">

      </div>
@if ($ourPost->image)
    <p>Current image:</p>
    <img src="{{ asset('images/' . $ourPost->image) }}" alt="Current Image" width="150">
@endif


 @error('image')
           <p>{{$message}}</p>
      @enderror
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
