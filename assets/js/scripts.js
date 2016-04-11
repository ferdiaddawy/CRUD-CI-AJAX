jQuery(function($) {
    "use strict";

    var example = $('#example').DataTable({
    responsive: true,
    'fnDrawCallback': function(oSettings) {
    $('#example_paginate ul').addClass('pagination-active-success');
    },
    "ajax": ""+base_url+"crud/get_all",
    'columns': [
    { 'data': 'nama' },
    { 'data': 'email' },
    { 'data': 'telp' },
    { 'data': 'foto' },
    { 'data': 'aksi' },
    ],
    'order': [[1, 'asc']]
    });

	
    $('body').on('click', '.edit', function(e) {
        e.preventDefault();
        var id = this.id;
        
        $.ajax({
            type : "POST",
            url  : ""+base_url+"crud/get_data_id",
            data : {id : id} ,
            success : function(data){
                $("#txtid").val(data.id);
                $("#txtnama").val(data.nama);
                $("#txtemail").val(data.email);
                $("#txthp").val(data.telp);
            }
        });
    });

   
    $('body').on('click', '.delete', function(e) {
        e.preventDefault();
        var id = this.id;

        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          closeOnConfirm: false
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
                type : "POST",
                url  : ""+base_url+"crud/delete",
                data : {id : id} ,
                success : function(data){
					swal(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    );
                    $('#example').DataTable().ajax.reload(null, false);
                }
            });
          }
        })        
    });

	$('#MyForm').ajaxForm({
		beforeSend:function(){
		
		},
		success:function(){
		},
		complete:function(data)
		{	
			$('.modal').modal('hide');
			
			$('#example').DataTable().ajax.reload(null, false);
			swal("Good job!", "You clicked the button!", "success");
		}
	});


});