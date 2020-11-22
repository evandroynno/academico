<template>
<div>
	<div class="row">
		<a v-if="criar" v-bind:href="criar">Criar</a>
		<div class="form-group mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7">
			<input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
		</div>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th v-for="titulo in titulos" :key="titulo">{{titulo}}</th>
				<th v-if="detalhe || editar || deletar">Ação</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(item, index) in lista" :key="index">
				<td v-for="i in item" :key="i.matricula">{{i}}</td>
				<td v-if="detalhe || editar || deletar">
					<a v-if="editar" v-bind:href="editar+item.matricula"> <i class="fas fa-check-circle text-success icone"></i></a>
					<a v-if="detalhe" v-bind:href="detalhe"><i class="fas fa-info-circle text-info icone"></i></a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</template>
<script>
export default {
	props:['titulos','itens','criar','detalhe','editar','deletar','token'],
	data: function(){
		return {buscar:''}
	},
	computed:{
		lista:function(){
			// return this.itens;
			return this.itens.filter(res=>{
				for(var x in res){
					if((res[x]+"").toLowerCase().indexOf(this.buscar.toLowerCase())>=0){
						return true;
					}
				}
				return false;
				// return true;
			});
		}
	}

}
</script>
