<script>

$(document).ready(function(){
    $("table").DataTable();
});
 $(".trigger a").click(function(e){
	 $(this).children("span:nth-child(2)").toggleClass("fa-rotate-90");
	 $(this).siblings("ul").slideToggle("fast");
 });
 
 $(".drop").first().parent("a").click(function(e){
	 e.preventDefault();
 });
 
  function slug(a){return a.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();}
  
   function delete_record(id,mod)
 {
   if (confirm("Do you really want to delete the record: "+id))
   {
     window.location.href="/home/"+mod+"?delete="+id;
   }
 }

</script>