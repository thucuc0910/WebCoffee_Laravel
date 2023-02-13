@extends('main')

<!-- <section class="item-slick1" style="background-image: url('/template/admin/dist/img/background4.png');">
</section> -->


@section('content')

<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			{{-- <div class="p-b-10">
				<h3 class="ltext-102" style="color: black; font-size: 40px" >
					<b>KẾT QUẢ TÌM KIẾM</b>
				</h3>
			</div> --}}

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="ltext-102" style="color: gray; font-size: 20px">
						<u>KẾT QUẢ TÌM KIẾM</u>
					</button>
				</div>		
			</div>
			<div id="loadProduct">
				@include('products.list_search')
			</div>
			<!-- Load more -->
			{{-- <div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
				<input type="hidden" value="1" id="page">
				<a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> --}}
		</div>
	</section>

@endsection