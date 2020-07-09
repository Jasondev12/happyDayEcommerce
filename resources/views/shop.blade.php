@extends('layouts.master')

@section('content')

<!-- Start Banner Area -->
{!! Breadcrumbs::render('shop') !!}
<!-- End Banner Area -->
<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-4 col-md-5">
			<div class="sidebar-categories">
				<div class="head">Parcourir les catégories</div>
				<ul class="main-categories">
					@foreach($categories as $category)
					<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable">
							{{ $category->name }} <span class="number">({{ count($category->products) }})</span>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="col-xl-9 col-lg-8 col-md-7">
			<!-- Start Filter Bar -->
			<div class="filter-bar d-flex flex-wrap align-items-center">
				<div class="sorting">
					<select>
						<option value="1">Default sorting</option>
						<option value="1">Default sorting</option>
						<option value="1">Default sorting</option>
					</select>
				</div>
				<div class="pagination ml-auto">
					<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<a href="#" class="active">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
					<a href="#">6</a>
					<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<!-- End Filter Bar -->
			<!-- Start Best Seller -->
			<section class="lattest-product-area pb-40 category-list">
				<div class="row">
					@foreach($products as $product)
					<!-- single product -->
					<div class="col-lg-4 col-md-6">
						<div class="single-product">
							<a href="{{ route('shop.show', $product->slug) }}">
								<img class="img-fluid" src="{{ Voyager::image($product->image) }}" alt="">
							</a>
							<div class="product-details">
								<h6>{{ $product->name }}</h6>
								<div class="price">
									<h6>{{ $product->price }}€</h6>
								</div>
								<div class="prd-bottom">
									<!-- Add -->
								<form id="{{ $product->slug }}" action="{{ route('cart.store') }}" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="id" value="{{ $product->id }}">
									<input type="hidden" name="name" value="{{ $product->name }}">
									<input type="hidden" name="price" value="{{ $product->price }}">

									<a href="#" onclick="document.getElementById('{{ $product->slug }}').submit()" class="social-info"><span class="ti-bag-shop"></span>
										<p class="hover-text">Ajouter</p>
									</a>
								</form>
									<!-- Save -->
								<form id="{{ $product->id }}" action="{{ route('cart.save', $product->id) }}" method="POST">
									{{ csrf_field() }}
									<a href="#" onclick="document.getElementById('{{ $product->id }}').submit()" class="social-info"><span class="lnr lnr-heart"></span>
										<p class="hover-text">Enregistrer</p>
									</a>
								</form>
									<a href="{{ route('shop.show', $product->slug) }}" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">Voir plus</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</section>
			<!-- End Best Seller -->
			<!-- Start Filter Bar -->
			<div class="filter-bar d-flex flex-wrap align-items-center">
				<div class="sorting mr-auto">
					<select>
						<option value="1">Show 12</option>
						<option value="1">Show 12</option>
						<option value="1">Show 12</option>
					</select>
				</div>
				<div class="pagination">
					<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<a href="#" class="active">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
					<a href="#">6</a>
					<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<!-- End Filter Bar -->
		</div>
	</div>
</div>



@stop