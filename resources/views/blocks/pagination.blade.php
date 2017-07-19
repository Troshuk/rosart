<ul class="paginations">
	@if (!empty($blog))
	{{ $blog->links() }}
	@endif

</ul>