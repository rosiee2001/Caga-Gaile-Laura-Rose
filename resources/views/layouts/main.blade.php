<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.style')
@livewireStyles
</head>

<body>
	<div class="wrapper">
		@include('layouts.sidebar')

		<div class="main">
		 @include('layouts.nav')

			<main class="content">
				<div class="container-fluid p-0">

				@yield('content')

				</div>
			</main>
			@include('layouts.footer')

		</div>
	</div>

	@include('layouts.scripts')
	@livewireScripts

</body>

</html>