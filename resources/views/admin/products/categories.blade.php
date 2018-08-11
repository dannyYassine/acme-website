@extends('admin.layout.base')
@section('title', 'Product Category')
@section('data-page-id', 'adminCategories')

@section('content')

    <div class="categories">

        <div class="categories">
            <div class="row expanded column">
                <div class="column medium-11">
                    <h2>Product Categories</h2>
                    <hr/>
                </div>
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
                        <table class="hover unstriped" data-form="deleteForm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Data Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['slug'] }}</td>
                                    <td>{{ $category['added'] }}</td>
                                    <td width="100" class="text-right">
                                    <span class="has-tip top" data-tooltip tabindex="1" title="Add Sub-category">
                                        <a data-open="add-subcategory-{{$category['id']}}"><i class="fa fa-plus"></i></a>
                                    </span>
                                        <span class="has-tip top" data-tooltip tabindex="1" title="Edit Category">
                                        <a data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
                                    </span>
                                        <span style="display: inline-block;" class="has-tip top" data-tooltip tabindex="1" title="Delete Category">
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

                                        <!-- Add Sub-Category Moal -->
                                        <div class="reveal"
                                             id="add-subcategory-{{$category['id']}}"
                                             data-reveal
                                             data-close-on-click="false"
                                             data-close-on-esc="false"
                                             data-animation-in="scale-in-up"
                                             data-animation-out="scale-out-down">
                                            <div class="notification callout primary">

                                            </div>
                                            <h2>Add Subcategory</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input id="subcategory-name-{{$category['id']}}"
                                                           type="text"/>
                                                    <div>
                                                        <input id="{{$category['id']}}"
                                                               type="submit"
                                                               data-token="{{\App\Classes\CSRFToken::_token()}}"
                                                               class="button add-subcategory"
                                                               value="Create">
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
    </div>

    <div class="subcategories">

        <div class="categories">
            <div class="row expanded">
                <div class="column medium-11">
                    <h2>SubCategories</h2>
                    <hr/>
                </div>
            </div>
        </div>


        <div class="row expanded">
            <div class="small-12 medium-11 column">
                @if(count($subcategories))
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Data Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory['name'] }}</td>
                                <td>{{ $subcategory['slug'] }}</td>
                                <td>{{ $subcategory['added'] }}</td>
                                <td width="100" class="text-right">
                                    <span class="has-tip top" data-tooltip tabindex="1" title="Edit SubCategory">
                                        <a data-open="item-subcategory-{{$subcategory['id']}}"><i class="fa fa-edit"></i></a>
                                    </span>
                                    <span style="display: inline-block;" class="has-tip top" data-tooltip tabindex="1" title="Delete SubCategory">
                                        <form method="POST" action="/admin/product/subcategory/{{$subcategory['id']}}/delete" class="delete-item">
                                            <input hidden name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                                            <button type="submit"><i class="fa fa-times delete"></i></button>
                                        </form>
                                    </span>


                                    <!-- Edit SubCategory Moal -->
                                    <div class="reveal"
                                         id="item-subcategory-{{$subcategory['id']}}"
                                         data-reveal
                                         data-close-on-click="false"
                                         data-close-on-esc="false"
                                         data-animation-in="scale-in-up"
                                         data-animation-out="scale-out-down">
                                        <div class="notification callout primary">

                                        </div>
                                        <h2>Edit SubCategory</h2>
                                        <form>
                                            <div class="input-group">
                                                <input id="item-subcategory-name-{{$subcategory['id']}}" type="text" value="{{$subcategory['name']}}" placeholder="Search by name" name="name"/>

                                                <label>Change Category</label>
                                                <select id="item-category-{{ $subcategory['category_id'] }}">
                                                    @foreach(\App\Models\Category::all() as $category)
                                                        @if($category->id === $subcategory['category_id'])
                                                            <option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @else
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endif

                                                    @endforeach
                                                </select>

                                                <div>
                                                    <input id="{{$subcategory['id']}}"
                                                           type="submit"
                                                           data-category-id="{{$subcategory['category_id']}}"
                                                           data-token="{{\App\Classes\CSRFToken::_token()}}"
                                                           class="button update-subcategory"
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
                    {!! $subcategory_links !!}
                @else
                    <h3>You don't have any subcategories</h3>
                @endif
            </div>
        </div>
    </div>

    @include('includes.deletemodel')
@endsection