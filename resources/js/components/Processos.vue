<template>
  <div>
            <div v-if="show">
            <v-server-table url="http://laravel.local:8080/admin/processo/lista" :columns="columns" :options="options">
                <span slot="uri" slot-scope="props"> 
                      <button class="btn btn-primary" @click="edit(props.row.id_processo, props.row.tipo)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                      <button class="btn btn-danger" @click="deletar(props.row.id_processo, props.row.tipo)"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
                  </span>
            </v-server-table>
        </div>
  </div>
</template>

<script>

export default {
  name: 'app',
  data() {
    return {
      columns: ['id_processo','nome', 'parte_contraria', 'num_processo', 'data_cadastro', 'uri'], 
      options: {  
        filterByColumn: true,
        filterable: ['nome', 'parte_contraria', 'num_processo', 'data_cadastro'],
        texts: {
            filter: "Filtrar:",
            filterBy: 'Filtrar por {column}',
            count:' ',
            limit:"Número de itens:",
            noResults:"Nenhum resultado encontrado.",
        },              
        headings: {
          id_processo: 'ID',
          nome: 'Nome',
          parte_contraria: 'Parte Contrária',
          num_processo: 'Número do processo',
          data_cadastro: 'Data de cadastro',
          uri: 'Ações',

        },
        orderBy: { ascending:false, column:'data_cadastro' },
        pagination: { chunk:10,dropdown:false },        
        sortable: ['id_processo','nome', 'parte_contraria', 'data_cadastro'],
        dateColumns:['data_cadastro'],
        datepickerOptions: {
           
            showDropdowns: true,
            autoUpdateInput: true,
        } 
      },
      show: true
    }
  },
      methods: {
        edit(a, b) {
            window.location.href = "/admin/processo/"+ a +"/editar";
        },
        deletar(a, b) {
          var result = confirm("Voce tem certeza que quer excluir?");
          if (result) {
                      
                      window.location.href = "/admin/processo/"+ a +"/deletar";
          }          

        }        
    },

}
</script>

<style>
.VueTables__child-row-toggler--closed::before {
  content: "+";
}

.VueTables__child-row-toggler--open::before {
  content: "-";
}
</style>
