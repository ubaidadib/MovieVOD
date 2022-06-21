function delete_from_table(table_name,name_id,id){
  //  alert();
     jQuery.ajax({
                type: "POST",
                url: "pages/admin_page/calling_actions.php?action=delete_from_table",
                data: {table_name:table_name,
                        del_id:id,
                        name_id:name_id,
                       },
                success: function(data) {
               location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
});

}