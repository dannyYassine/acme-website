@extends('admin.layout.base')

@section('title', 'Product Category')

@section('content')

    <div class="categories">
        <div class="row expanded">
            <h2>Product Categories</h2>
        </div>
    </div>

    @if(isset($message))
        <p>{{$message}}</p>
    @endif

    <div class="row expanded">
        <div class="small-12 medium-6 column">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="input-group-field" placeholder="Search by name">
                    <div class="input-group-field">
                        <input type="submit" class="button" value="Search">
                    </div>
                </div>
            </form>
        </div>

        <div class="small-12 medium-5 column end">
            <form action="/admin/product/categories" method="post">
                <div class="input-group">
                    <input hidden name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                    <input type="text" class="input-group-field" placeholder="Search by name" name="name" placeholder="Category name">
                    <div class="input-group-field">
                        <input type="submit" class="button" value="Create">
                    </div>
                </div>
            </form>
        </div>

        <div class="row expanded">
            <div class="small-12 medium-11 column">
                @if(count($categories))
                    <table class="hover">
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['slug'] }}</td>
                                    <td>{{ $category['added'] }}</td>
                                    <td width="100" class="text-right">
                                        <a href="#"><i class="fa fa-edit"></i></a>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $links !!}
                @else
                    <h3>You don't have any categories</h3>
                @endif
            </div>
        </div>
    </div>
@endsection