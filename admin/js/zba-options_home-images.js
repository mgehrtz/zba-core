jQuery( function($){
	// on upload button click
	$( 'body' ).on( 'click', '.zba-upload', function( event ){
		event.preventDefault();
		
		const mediaSelector = wp.media({
			title: 'Choose image', 
			library : {
				type : 'image'
			},
			button: {
				text: 'Select images'
			},
			multiple: true
		}).on( 'select', function() { 
			const attachments = mediaSelector.state().get( 'selection' ).toJSON();
      console.warn(attachments);
      for (let attachment of attachments){
        let image = `    
          <div class="image-wrap">
            <a href="#" class="zba-upload" data-image-id="${attachment.id}">
              <div class='zba-image' style="background-image: url(${attachment.sizes.medium.url})"></div>
            </a>
            <a href="#" data-image-id="${attachment.id}" class="zba-remove">Remove image</a>
            <input type="hidden" name="zba_options[zba_splash_image_ids][]" value="${attachment.id}">
          </div>`;

        $('.gallery-wrap').append(image);
      }
		})

		mediaSelector.open()
	
	});
	// on remove button click
	$( 'body' ).on( 'click', '.zba-remove', function( event ){
		event.preventDefault();
    const target = $(event.target).parent('.image-wrap');
    target.detach();
	});
});