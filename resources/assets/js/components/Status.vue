<template>
	<div class="row alert alert-info alert-dismissible fade show" role="alert">
		<strong>{{msg}}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
</template>
<script>
export default {
	props:['msg']
}
</script>
