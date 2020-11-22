<template>
<div>
	<div class="row">
		<a v-if="criar" v-bind:href="criar" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar Movimentação</a>
		<div class="form-group mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7">
			<input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
		</div>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th style="cursor:pointer" v-on:click="ordenaColuna(titulo)" v-for="titulo in titulos" :key="titulo">{{titulo}}</th>
				<th v-if="detalhe || editar || deletar">Ação</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(item, index) in lista" :key="index">
				<td v-for="i in item" :key="i">{{i}}</td>
				<td v-if="detalhe || editar || deletar">
					<a v-if="editar" v-bind:href="editar+item.id">Editar</a>
					<a v-if="detalhe" v-bind:href="detalhe">Detalhes</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</template>
<script>
export default {
	props:['titulos','itens','ordem','ordemCol','criar','detalhe','editar','deletar','token'],
	data: function(){
			return {
				buscar:'',
				ordemAux: this.ordem || 'asc',
				ordemAuxCol: this.ordemCol || 'id'
				}
			},
	methods:{
		ordenaColuna:function(coluna){
			this.ordemAuxCol = coluna;
			if(this.ordemAux.toLowerCase() == 'asc'){
				this.ordemAux = "desc";
			}else{
				this.ordemAux = "asc";
			}
		},
		buscarMovimentos:function(){
			axios.get()
		},
	},
	computed:{
		lista:function(){
			let ordem = this.ordem || 'asc';
			let ordemCol = this.ordemCol || 'id';

			ordem = this.ordemAux.toLowerCase();
			ordemCol = this.ordemAuxCol.toLowerCase();

			if (ordem == "asc"){
				this.itens
				this.itens.sort(function(a,b){
					if (a[ordemCol] > b[ordemCol]) {return 1;}
					if (a[ordemCol] < b[ordemCol]) {return -1;}
					return 0
				});
			}else{
				this.itens.sort(function(a,b){
					if (a[ordemCol] < b[ordemCol]) {return 1;}
					if (a[ordemCol] > b[ordemCol]) {return -1;}
					return 0
				});
			}
			// return this.itens;
			return this.itens.filter(res=>{
				for(let x in res){
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
