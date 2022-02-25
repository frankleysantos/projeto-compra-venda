<template lang="">
    <div>
        <!-- <b-form-select v-model="produto.selected" :options="produto.options"></b-form-select> -->
        <!-- <Select2 v-model="produto.selected" 
                        :options="produto.options" 
                        :settings="{ multiple: false, placeholder: 'Selecione os produtos'}"
                    /><button @click="inputValor">+</button> -->
        <!-- <div v-for="item in produto.produto" :key="item">
            <input @keyup="inputValor($event, item)">
        </div> -->
        <div class="row form-group">
            <div class="col-md d-flex justify-content-end">
                <!-- <button @click="add()" class="btn btn-info">+</button> -->
                    <span class="btn btn-info icon text-white-100" @click="add()">
                        <i class="fas fa-plus"></i>
                    </span>
                
            </div>
        </div>
        
        <div class="row form-group" v-for="(prod, index) in produto.produto">
            <div class="col-md-7">
                <Select2 v-model="prod.produto_id" 
                        :options="produto.options" 
                        :settings="{ multiple: false, placeholder: 'Selecione os produtos'}"
                    />
            </div>
            <div class="col-md">
                <div class="input-group mb-3">
                    <input type="number"  v-model="prod.valor" class="form-control" @keyup="enviarPai" placeholder="Valor do Produto" step="0.01"/>
                    <div class="input-group-prepend" v-if="produto.produto.length > 1">
                        <span class="btn btn-danger icon text-white-100" @click="remove(index)">
                            <i class="fas fa-trash"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md">
                <div class="form-group">
                  <textarea class="form-control" v-model="prod.descricao" rows="3" placeholder="Insira informações sobre o produto"></textarea>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {
        this.produtosCadastrados();
    },
    data() {
      return {
          produto: {
            selected: null,
            options: [],
            produto: [
                {
                    produto_id: null, 
                    valor: '', 
                    descricao: ''
                }
            ],
            prod_key: [],
            valor: []
          },
      }
    },
    methods: {
        add: function() {
            // console.log(this.produto.produto.length)
            this.produto.produto.push({ produto_id: null, valor: "" });
            this.$emit('envia-para-form-pai', { 
                dados: this.produto.produto
            })    
        },
        remove: function(index) {
            this.produto.produto.splice(index, 1);
            this.$emit('envia-para-form-pai', { 
                dados: this.produto.produto
            })   
        },
        enviarPai: function() {
            return this.$emit('envia-para-form-pai', { 
                dados: this.produto.produto
            })
        },
        produtosCadastrados: function() {
            return this.$store.dispatch('showProdutos')
                .then((resp) => {
                    var vm = this;
                    let produtos = vm.$store.state.produto.produtos;
                    produtos.forEach(function(item, key){
                        vm.produto.options.push({id: item.produto_id, text: item.produto})
                    })
                })
        }
    },
    computed: {
        
    },
}
</script>
<style lang="">
    
</style>