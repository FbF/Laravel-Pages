<div class="page-content">
	<h1 class="page-heading">{{ $page->heading }}</h1>
	@if ( !empty( $page->you_tube_video_id ) )
		<div class="page-youtube-video">
			{{
				str_replace('%YOU_TUBE_VIDEO_ID%', $page->you_tube_video_id,
					Config::get('laravel-pages::you_tube_embed_code'))
			}}
		</div>
	@elseif ( !empty( $page->main_image ) )
		<div class="main-image">
			<img src="{{ Config::get('laravel-pages::main_image_resized_dir') }}{{ $page->main_image }}"
			alt="{{ $page->main_image_alt }}" width="{{ $page->main_image_width }}"
			height="{{ $page->main_image_height }}" />
		</div>
	@endif
	{{ $page->content }}
</div>