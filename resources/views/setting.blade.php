@extends('layout.auth')
@section('body')
<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .title {
            font-size: 20px;
            color: #343a40;
        }
        .header .user {
            font-size: 14px;
            color: #343a40;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        .container h2 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #343a40;
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            background-color: #dee2e6;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .profile-pic img {
            width: 100%;
            height: 100%;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            color: #343a40;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: calc(100% - 20px);
            padding: 8px 10px;
            font-size: 14px;
            color: #495057;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .form-group input[type="file"] {
            display: inline-block;
            font-size: 14px;
            color: #495057;
        }
        .form-group .file-info {
            display: inline-block;
            font-size: 14px;
            color: #495057;
            margin-left: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
  </style>
  <div class="flex justify-between mb-4 items-start">
    <div class="header">
        <div class="title">
     Settings
    </div>
 </div>
 <div class="container">
    <div class="form-group">
      
     </div>
 <form action="{{ route('profile.setting') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <div>
    <div class="form-group">
     <label for="old-password">
      Old Password
     </label>
     <input id="old-password" name="password" type="password"/>
    </div>
    <div class="form-group">
     <label for="new-password">
      New Password
     </label>
     <input id="new-password" name="new_password" type="password"/>
    </div>
    <div class="form-group">
     <label for="confirm-password">
      Confirm Password
     </label>
     <input id="confirm-password" name="new_password_confirmation" type="password"/>
    </div>
            <button type="submit" class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
   </form>
  </div>
 @endsection