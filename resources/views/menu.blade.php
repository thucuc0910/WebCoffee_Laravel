@extends('main')

@section('content')
<div class="bg0 m-t-23 p-b-140 p-t-80">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <h1>{{ $title }}</h1>
            </div>

            <div class="flex-w flex-c-m m-tb-10">

            </div>


            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">



                </div>
            </div>
        </div>

        @include('products.list')

        {!! $products->links() !!}
    </div>
</div>
@endsection