@extends('admin.layout.base')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard">
    <div class="row expanded">
        <h2>Dashboard</h2>
    </div>
    <form action="/admin" method="post" enctype="multipart/form-data">
        <input name="product" value="testing">
        <input type="file" name="image">
        <input type="submit" value="GO" name="submit">
    </form>
</div>

@endsection