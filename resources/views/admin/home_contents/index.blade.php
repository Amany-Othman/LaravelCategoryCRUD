@extends('admin.layouts.app')


@section('title', 'Home Content')


@section('page-heading', 'Home Content')


@section('content')


<div class="card shadow mb-4">


    {{-- Card Header --}}
    <div class="card-header py-3 products-card-header">


        <div class="d-flex justify-content-between align-items-center">


            <div>


                <h6 class="m-0">
                    <i class="fas fa-home mr-2"></i>
                    Home Content
                </h6>


                <p class="header-subtitle mb-0">
                    Manage your home page content
                </p>


            </div>


        </div>


    </div>



    <div class="card-body">


        {{-- Home Content Count --}}
        <div class="products-count">
            <i class="fas fa-file-alt"></i>
            Total Content:
            <strong>{{ $homeContents->count() }}</strong>
        </div>



        {{-- Home Content Table --}}
        <div class="table-responsive">


            <table class="table table-bordered products-table">


                <thead>


                    <tr>
                        <th>ID</th>
                        <th>Content</th>
                        <th>English</th>
                        <th>Arabic</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>


                </thead>



                <tbody>


                    @forelse ($homeContents as $content)


                    <tr>


                        {{-- ID --}}
                        <td>
                            {{ $content->id }}
                        </td>



                        {{-- Content --}}
                        <td>
                            {{ ucfirst(str_replace('_', ' ', $content->field)) }}
                        </td>



                        {{-- English --}}
                        <td>
                            <span class="description-cell" title="{{ $content->value_en }}">
                                {{ $content->value_en }}
                            </span>
                        </td>



                        {{-- Arabic --}}
                        <td dir="rtl">
                            <span class="description-cell" title="{{ $content->value_ar }}">
                                {{ $content->value_ar }}
                            </span>
                        </td>



                        {{-- Link --}}
                        <td>
                            {{ $content->link ?? '-' }}
                        </td>



                        {{-- Action --}}
                        <td>


                            <div class="action-group">


                                {{-- Edit --}}
                                <a href="{{ route('admin.home-contents.edit', $content) }}"
                                    class="btn btn-warning btn-sm" title="Edit Content">
                                    <i class="fas fa-edit"></i>
                                </a>


                            </div>


                        </td>


                    </tr>


                    @empty


                    <tr>


                        <td colspan="6" class="empty-state">


                            <i class="fas fa-home"></i>


                            <p>No home content found.</p>


                        </td>


                    </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>


@endsection