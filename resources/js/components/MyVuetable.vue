<template>
  <div>
            <div v-if="show">
            <v-server-table url="http://laravel.local:8080/admin/cliente/lista" :columns="columns" :options="options">
                <span slot="uri" slot-scope="props"> 
                      <button class="btn btn-primary" @click="edit(props.row.id_cliente, props.row.tipo)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                      <button class="btn btn-danger" @click="deletar(props.row.id_cliente, props.row.tipo)"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
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

      
      columns: ['id_cliente','nome', 'parte_contraria', 'num_processo', 'data_cad', 'uri'],
     
      options: {
        
        filterByColumn: true,
        filterable: ['nome', 'parte_contraria', 'num_processo', 'data_cad'],
        texts: {
            filter: "Filtrar:",
            filterBy: 'Filtrar por {column}',
            count:' ',
            limit:"Número de itens:",
            noResults:"Nenhum resultado encontrado.",
        },              
        headings: {
          id_cliente: 'ID',
          nome: 'Nome',
          parte_contraria: 'Parte Contrária',
          num_processo: 'Número do processo',
          data_cad: 'Data de cadastro',
          uri: 'Ações',

        },
        orderBy: { ascending:false, column:'data_cad' },
        pagination: { chunk:10,dropdown:false },        
        sortable: ['id_cliente','nome', 'parte_contraria', 'data_cad'],
        dateColumns:['data_cad'],
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
          console.log(a);
          var res = b.toLowerCase();
            window.location.href = "/admin/cliente/"+ a +"/editar"+res;
        },
        deletar(a, b) {
          var result = confirm("Voce tem certeza que quer excluir?");
          if (result) {
                      var res = b.toLowerCase();
                      window.location.href = "/admin/cliente/"+ a +"/deletar"+res;
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
