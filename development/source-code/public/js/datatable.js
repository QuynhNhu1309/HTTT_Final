
function profile_edit_single()
{
      $('.profile_content_table .edit').liveeditor();
      alert

}





function search_function() {
  var input, filter, table, tr, td, i;
  input = document.getElementsByName("search_input")[0].value;
  console.log(input);
  filter = input.toUpperCase();
  console.log(filter);
  table = document.getElementById("datatable");
  console.log("table0 =" .table);
  table1 = document.getElementsByName("datatable")[0];
   console.log("table = ".table1);
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


