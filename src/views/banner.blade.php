@if ( !empty( $page->banner_image ) )
	<div class="page-banner">
		<img src="{{ Config::get('laravel-pages::banner_image_resized_dir') }}{{ $page->banner_image }}"
		alt="{{ $page->banner_image_alt }}" width="{{ Config::get('laravel-pages::banner_image_width') }}"
		height="{{ Config::get('laravel-pages::banner_image_height') }}" />
	</div>
@endif