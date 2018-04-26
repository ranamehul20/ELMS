$('#select_all').on('click',function(e){
	if($(this).is(':checked',true)){
		$("").prop('checked',true);
	}
	else
	{
		$(".chk").prop('checked',false);
	}
});

	<script>
		$(document).ready(function(){
$("#selectall").click(function(){
        //alert("just for check");
        if(this.checked){
            $('.chk').each(function(){
                this.checked = true;
            })
        }else{
            $('.chk').each(function(){
                this.checked = false;
            })
        }
    });
});
		</script>    
		
		
		<script>		
		$(document).ready(function(){
$('#selectall').click(function(event) {	
            if($(this).is(":checked")) {
				alert();
                $('#checkboxid').each(function(){
                    $(this).prop("checked",true);
                });
            }
            else{
                $('#checkboxid').each(function(){
                    $(this).prop("checked",false);
                });
            }   
    }); 
    });
		
		</script>
		
		
		<script language="JavaScript">
	function selectAll(){
				var items=document.getElementsByName('acs');
				for(var i=0; i<items.length; i++){
					if(items[i].type=='checkbox')
						items[i].checked=true;
				}
			}
</script>
