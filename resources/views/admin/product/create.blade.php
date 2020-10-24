@extends('admin.templates.default')

@section('title', 'Create a Product')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 text-center">Create Product</h4>
                    <hr>

                    <form class="" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control @error('name')
                                is-invalid
                            @enderror" placeholder="Enter Product Name" value="{{ old('name') }}"/>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea name="description" class="form-control @error('description')
                                is-invalid
                            @enderror" cols="5" rows="5" placeholder="Enter Product Description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" name="image" class="form-control @error('image')
                                is-invalid
                            @enderror"/>
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Product Categories</label>
                            <select name="categories[]" id="" class="form-control select2bs4" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" name="price" class="form-control @error('price')
                                is-invalid
                            @enderror" placeholder="Enter Product Price" value="{{ old('price') }}"/>
                            @error('price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Product Qty</label>
                            <input type="text" name="qty" class="form-control @error('qty')
                                is-invalid
                            @enderror" placeholder="Enter Product Qty" value="{{ old('qty') }}"/>
                            @error('qty')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Save
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function(){
            $('.select2bs4').select2();
            $('.select2bs4').select2({
                theme: "bootstrap4",
                placeholder: "Product Categories"
            });
        })
    </script>
@endpush