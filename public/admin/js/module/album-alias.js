function to_alias(e){return e=e.toLowerCase(),e=e.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g,"a"),e=e.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g,"e"),e=e.replace(/(ì|í|ị|ỉ|ĩ)/g,"i"),e=e.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g,"o"),e=e.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g,"u"),e=e.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g,"y"),e=e.replace(/(đ)/g,"d"),e=e.replace(/([^0-9a-z-\s])/g,""),e=e.replace(/(\s+)/g,"-"),e=e.replace(/^-+/g,""),e=e.replace(/-+$/g,"")}$("#album_name").keyup(function(){var e=$(this).val();e=to_alias(e),$("#album_alias").val(e)});