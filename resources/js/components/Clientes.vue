
<script>
import {ClientTable, Event} from 'vue-tables-2';
Vue.use(VueTables.ClientTable);
import daterangepicker from 'daterangepicker';
//This is very important to used with the window object
window.moment = require('moment');
export default {
    
        data(){
            return{
                columns: [ 'id', 'name','birth','year','number'],
                rows:[],
                options: {
                    filterByColumn: true,
                    perPage:2,
                    texts: {
                        filter: "Filtrar:",
                        filterBy: 'Filtrar por {column}',
                        count:' '
                    },
                    dateColumns:['birth'],
                    dateFormat: 'YYYY-MM-DD',
                    datepickerOptions: {
                        showDropdowns: true,
                        autoUpdateInput: true,
                    },
                    pagination: { chunk:10,dropdown:false },
                    filterable:['name','birth','year'],
                    headings: {
                        name: 'Student Name',
                        year: 'Year in School',
                        number: 'Number ID',
                        id: 'ID',
                      },
                }
            }
            
        },
    mounted(){
    rows:[
      {id:1, name:"John",birth:moment("2004-05-19"), year:"5", number:"17"},
      {id:2, name:"Jane",birth:moment("2004-05-19"), year:"6", number:"18"},
      {id:3, name:"Susan",birth:moment("2004-05-19"), year:"7", number:"19"},
      {id:4, name:"Chris",birth:moment("2004-05-19"), year:"8", number:"20"},
      {id:5, name:"Dan",birth:moment("2004-05-19"), year:"9", number:"21"}
    ]
    }
}
</script>
<!--
<script>
    export default {
        props: ['clientes'],
        data: function() {
            return {
                cliente: [],
                currentSort:'data_cad',
                currentSortDir:'desc',
                pageSize:100,
                currentPage:1,
                filter:'',
                startDate: null,
                endDate: null,
            }
        },
        methods:{
            sort:function(s) {
            //if s == current sort, reverse
            if(s === this.currentSort) {
                this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
            }
            this.currentSort = s;
            },
            nextPage:function() {
                if((this.currentPage*this.pageSize) < this.cliente.length) this.currentPage++;
            },
            prevPage:function() {
                if(this.currentPage > 1) this.currentPage--;
            },
            loadPage:function(n) {
                this.currentPage = n;
            }
        },

computed:{
    sortedClientes:function() {
      var vm = this;
      var startDate = vm.startDate;
      var endDate = vm.endDate;
     let _cats = this.cliente;
      // first filter
      if(this.filter !== '') {
        _cats = _cats.filter(c => c.nome.toLowerCase().indexOf(this.filter.toLowerCase()) >= 0 || c.parte_contraria.toLowerCase().indexOf(this.filter.toLowerCase()) >= 0);
      }
  
      

      
      return _cats.sort((a,b) => {
        let modifier = 1;
        if(this.currentSortDir === 'desc') modifier = -1;
        if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
        if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
        return 0;
      }).filter((row, index) => {
        let start = (this.currentPage-1)*this.pageSize;
        let end = this.currentPage*this.pageSize;
        if(index >= start && index < end) return true;
       
      });
    },
                pages:function() {
                // how many pages do we have?
                let p = [];
                let totalPages = Math.ceil(this.cliente.length / this.pageSize);
                console.log('totalPages',totalPages);
                for(let i=0;i<totalPages;i++) p.push(i+1);
                return p;
            }
  },        
        mounted(){
            this.cliente = JSON.parse(this.clientes)
        }
    }
</script>
-->