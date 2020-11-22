<template>
	<div v-bind:class="defineCor">
		<div class="card-header"><i v-bind:class="i"></i> {{titulo}}</div>
		<div class="card-body">
			<slot></slot>
		</div>
		<div v-if="voltar || submit" class="card-footer">
			<div class="row">
				<div class="col-md-6 offset-md-4">
					<a v-if="voltar" :href="voltar" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					<button v-if="submit" type="submit" class="btn btn-primary">
						{{ submit }}
					</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	props:['titulo','i','cor','voltar','submit'],
	computed: {
		defineCor: function(){
			return "card "+ this.cor
		}
	}
}
</script>
