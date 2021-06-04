$(document).ready( function () {
    $('.datatable').DataTable({
        ajax: './includes/route.php?type=get',
        columns: [
            {data : 'id'},
            {data : 'name'},
            {data : 'date'},
            {data : 'price'},
            {data : 'id',
        fnCreatedCell: function(td,id){
            $(td).html('<td><a href="update.php?id='+id+'">Update </a><a href="delete.php?id='+id+'" class="text-danger">Delete </a></td>');
        }
        }
        ],
    });


    $('.form').validate({
        rules:{
            name: {
                required: true
            },
            date: {
                required: true
            },
            price: {
                required: true
            }
        }
    });
} );

