<template>
<tr>
	<form @submit.prevent="submit">
		@csrf
		<td>
			<input type="hidden" name="id" value="teste">
		</td>
		<td>
			<input class="form-control" type="number" min="0.00" max="10.00" maxlength="5" step='0.01' name="nota_1" id="nota_1" v-model="fields.nota_1">
			<div v-if="errors && errors.name" class="text-danger">{{ errors.nota_1[0] }}</div>
		</td>
		<td>
			<input class="form-control" type="number" min="0.0" max="10.0" maxlength="5" step='0.01' name="nota_2" id="nota_2" v-model="fields.nota_2">
			<div v-if="errors && errors.name" class="text-danger">{{ errors.nota_2[0] }}</div>
		</td>
		<td>
			<input class="form-control" type="number" min="0.0" max="10.0" maxlength="5" step='0.01' name="nota_final" id="nota_final" v-model="fields.nota_final">
			<div v-if="errors && errors.name" class="text-danger">{{ errors.nota_final[0] }}</div>
		</td>
		<td>
			<button type="submit" class="btn btn-primary">Gravar</button>
		</td>
	</form>
</tr>

</template>

<script>
export default {
	data() {
		return {
		fields: {},
		errors: {},
		success: false,
    	loaded: true,
		}
	},
	methods: {
		submit() {
			if (this.loaded) {
				this.loaded = false;
				this.success = false;
				this.errors = {};
				axios.post('/lancar_Notas_Ok', this.fields).then(response => {
					this.fields = {}; //Clear input fields.
					this.loaded = true;
					this.success = true;
				}).catch(error => {
					this.loaded = true;
					if (error.response.status === 422) {
						this.errors = error.response.data.errors || {};
					}
				});
			}
		},
	},
}
</script>

<style>

</style>
