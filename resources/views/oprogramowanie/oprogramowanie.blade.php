@extends('layouts.appjqwidgets')

@section('content')

<script type='text/javascript'>
      // console.log("dfdf");
        $(document).ready(function () {
        // prepare the data
        var source ={
            datatype: "json",
 			//datafields: [{ name: 'id' },{ name: 'url' },{ name: 'description', type: 'string' }],
            datafields: [
                {name: 'id'},
                {name: 'nr_inw'},
                {name: 'lok_us'},
                {name: 'nazwa'},
                {name: 'opis'},
                {name: 'data_lik'},
                {name: 'nazwadns'},
                {name: 'adr_ip'},
                {name: 'zestaw'},
                {name: 'id_gr'},
                {name: 'num_fabr'},
                {name: 'inwold'},
                {name: 'status'},
                {name: 'notatka'},
                {name: 'data_zak'},
                {name: 'lokalizacja'},
                {name: 'lok_out'},
                {name: 'stat_przek'},            
            ],
            url: '{{ url("/getOprogramowanieData") }}',
            root: 'Rows',
            beforeprocessing: function (data) {
                source.totalrecords = data[0].TotalRows;
            },
            sort: function () {        
              $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
            },
            filter: function () {
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata', 'filter');
                }
        };
        
       
            
        
        $("#jqxgrid").jqxGrid({
            localization: localizationobj,
            source: source,
            width:'100%',
            theme: 'classic',
            filterable: true,
            sortable: true,
            sorttogglestates: 1,
            autoheight: true,
            autorowheight:true,
            columnsautoresize:true,
            columnsresize:true,
            pageable: true,
            pagesize: 20,
            pagesizeoptions: ['10', '20', '50'],
            virtualmode: true,
            rendergridrows: function (params) {
                return params.data;
            },
    
            columns: [ 
                //{text:'id', datafield:'id'},
                {text:'US', datafield:'lok_us'},
                {text:'Lokalizacja', datafield:'lokalizacja'},
                {text:'Nr inw', datafield:'nr_inw'}, 
                {text:'Klucz', datafield:'num_fabr'},
                {text:'Nazwa', datafield:'nazwa'},
                
                {text:'Data zakupu', datafield:'data_zak'},
                {text:'notatka', datafield:'notatka'},
                
//                {text:'opis', datafield:'opis'},
//                {text:'data_lik', datafield:'data_lik'},
//                {text:'nazwadns', datafield:'nazwadns'},
//                {text:'adr_ip', datafield:'adr_ip'},
//                {text:'zestaw', datafield:'zestaw'},
//                {text:'id_gr', datafield:'id_gr'},
//               
//                {text:'inwold', datafield:'inwold'},
//                {text:'status', datafield:'status'},
//              
//                
//                
//                {text:'lok_out', datafield:'lok_out'},
//                {text:'stat_przek', datafield:'stat_przek'},

         
            ]
        });
        
        
        
        
        });
    </script>


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div id="jqxgrid" style="width: 100%"></div>

        </div>
    </div>
</div>
@endsection