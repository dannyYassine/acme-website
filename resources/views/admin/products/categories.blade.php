@extends('admin.layout.base')
@section('title', 'Product Category')
@section('data-page-id', 'adminCategories')

@section('content')

    <div class="categories">
        <div class="row expanded">
            <h2>Product Categories</h2>
        </div>
    </div>

    @include('includes.message')

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
                    <table class="hover" data-form="deleteForm">
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category['name'] }}</td>
                                <td>{{ $category['slug'] }}</td>
                                <td>{{ $category['added'] }}</td>
                                <td width="100" class="text-right">
                                    <span>
                                        <a data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
                                    </span>
                                    <span style="display: inline-block;">
                                        <form method="POST" action="/admin/product/categories/{{$category['id']}}/delete" class="delete-item">
                                            <input hidden name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                                            <button type="submit"><i class="fa fa-times delete"></i></button>
                                        </form>
                                    </span>


                                    <!-- Edit Category Moal -->
                                    <div class="reveal"
                                         id="item-{{$category['id']}}"
                                         data-reveal
                                         data-close-on-click="false"
                                         data-close-on-esc="false"
                                         data-animation-in="scale-in-up"
                                         data-animation-out="scale-out-down">
                                        <div class="notification callout primary">

                                        </div>
                                        <h2>Edit Category</h2>
                                        <form>
                                            <div class="input-group">
                                                <input id="item-name-{{$category['id']}}" type="text" name="name" value="{{$category['name']}}" placeholder="Search by name" name="name"/>
                                                <div>
                                                    <input id="{{$category['id']}}"
                                                           type="submit"
                                                           data-token="{{\App\Classes\CSRFToken::_token()}}"
                                                           class="button update-category"
                                                           value="Update">
                                                </div>
                                            </div>
                                        </form>
                                        <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
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

    @include('includes.deletemodel')
@endsection