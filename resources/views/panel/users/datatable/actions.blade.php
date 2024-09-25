<div class="d-flex">
	<a href="{{ route('panel.users.edit', $user) }}" class="btn btn-icon btn-primary">
		<i class="fas fa-edit"></i>
	</a>
	<form action="{{ route('panel.users.destroy', $user) }}" method="post"
				onsubmit="return confirm('Are you sure?');"
				class="d-inline-block ms-2">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-danger btn-icon">
			<i class="fas fa-trash-alt"></i>
		</button>
	</form>
</div>
