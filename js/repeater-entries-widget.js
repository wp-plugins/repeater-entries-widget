var image_field1, image_field2, image_field3;

function selectImage(count){
  image_field1 = jQuery('input.select-img'+count).siblings('.img'+count);
  image_field2 = jQuery('input.select-img'+count).siblings('.block-image');
  image_field3 = jQuery('input.select-img'+count).siblings('#remove-img');
  tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
  window.send_to_editor = function(html) {
    if(image_field1 != undefined){
      imgurl = jQuery("<div>" + html + "</div>").find('img').attr('src');
      image_field1.val(imgurl);
      image_field2.attr('src',imgurl);
      image_field2.show();
      image_field3.show();
      tb_remove();
    }
  }  
  return false;
}
function selectSize(value,count){
  if ( value == 'custom' ) {
    jQuery( '.widget-content #custom_size'+count).slideDown();
  } else {
    jQuery( '.widget-content #custom_size'+count).slideUp();
  }
}
function getDescription(count){  
  if(jQuery('#full-desc-half'+count).hasClass('half'))
  {
    var fulldesc = jQuery('#full-desc-full'+count).html();
    jQuery( '#full-desc-half'+count).html(fulldesc);
    jQuery( '#full-desc-half'+count).addClass('full');
    jQuery( '#full-desc-half'+count).removeClass('half'); 
  } else {
    var fulldesc = jQuery('#full-desc-half'+count).html();
    jQuery( '#full-desc-half'+count).html(fulldesc.substr(0, 200) + '...');
    jQuery( '#full-desc-half'+count).addClass('half');
    jQuery( '#full-desc-half'+count).removeClass('full');
  }   
}
function removeImage(count){
  image_field1 = jQuery('input.select-img'+count).siblings('.img'+count);
  image_field2 = jQuery('input.select-img'+count).siblings('.block-image');
  image_field2.hide();
  image_field1.val('');
  return false;
}

function slider(element){
  if(jQuery(element).hasClass("active")){
		jQuery(element).removeClass("active");
		jQuery(element).next(".entry-desc").slideUp();
	}else{
		jQuery("#entries .entry-title").removeClass("active");
		jQuery(element).addClass("active");
		jQuery("#entries .entry-desc").slideUp();
		jQuery(element).next(".entry-desc").slideDown();
	}
}
