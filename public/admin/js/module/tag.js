$(".quickedit").click(function(){var t=$(this).attr("data-id");swal({title:title,text:inputname,type:"input",showCancelButton:!0,closeOnConfirm:!1,animation:"slide-from-top",inputValue:$("#name"+t).text()},function(n){if(!1===n)return!1;if(""===n)return swal.showInputError(errorinputvalue),!1;var e=configs.admin_site+configs.controller+"/ajaxQuickedit";$.ajax({type:"get",data:{name:n,id:t},cache:!1,url:e,success:function(e){var a=$.parseJSON(e);1==a.status?($("#name"+t).html("<b style='color: #27ae60'>"+n+"</b>"),$("#alias"+t).html(a.alias),swal(success,a.message,"success")):swal(error,a.message,"warning")}})})}),$(".delete").click(function(){var t=$(this).attr("data-id"),n=$(this).attr("data-name"),e="Bạn muốn xóa "+n+" này!";"english"==configs.lang&&(e="Do you want delete this "+n+"!"),swal({title:e,type:"warning",showCancelButton:!0,confirmButtonColor:"#DD6B55",confirmButtonText:"Yes!"},function(){window.location.href=configs.admin_site+configs.controller+"/delete/"+t})});