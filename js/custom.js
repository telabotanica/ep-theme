jQuery( function( $ ) {


	var inputPlaceholder = 'placeholder' in document.createElement('input');


	// CSS
	$( '.image-gallery .one_third:nth-child(3n)' ).addClass( 'last' );
	$( '#nav ul.menu > li:last' ).addClass( 'last' );
	$( '#billboard .column:first' ).addClass( 'first' );
	$( '#sidebar-home .widget:nth-child(3n)' ).addClass( 'last' );
	$( '#sidebar-footer .widget:nth-child(3n)' ).addClass( 'last' );
	$( '.widget-twitter li:last-child' ).addClass( 'last' );
	$( '.widget-flickr .flickr_badge_image:nth-child(7n)' ).addClass( 'last' );
	$( '#members-list' ).rdy( function() {
		$( '#members-list .' + $( '#members-list li:last' ).attr( 'rel' ) ).addClass( 'row-last' );
	} );
	$( '#groups-dir-list' ).rdy( function() {
		$( '#groups-dir-list .' + $( '#groups-dir-list li:last' ).attr( 'rel' ) ).addClass( 'row-last' );
	} );
	$( '.widget_bp_core_members_widget li:nth-child(6n)' ).addClass( 'last' );
	$( '.widget_bp_groups_widget li:nth-child(6n)' ).addClass( 'last' );
	$( '#activity-stream > li:even' ).addClass( 'odd' );
	$( '#activity-stream li:first' ).addClass( 'first' );
	$( '#activity-stream li:last' ).addClass( 'last' );
	$( '#activity-stream li .activity-header a:first' ).addClass( 'first' );
	$( '#group-create-tabs li.current' ).prevAll().addClass( 'done' );
	$( '#group-create-tabs li:last' ).addClass( 'last' );
	$( '.groups table.forum tr:even' ).addClass( 'odd' );
	$( '.bp-profile #item-body #groups-list li:nth-child(odd), .bp-profile #item-body #members-list li:nth-child(odd), .bp-profile #item-body #friend-list li:nth-child(odd)' ).addClass( 'odd' );
	$( '.bp-profile #item-body #groups-list li:nth-child(even), .bp-profile #item-body #members-list li:nth-child(even), .bp-profile #item-body #friend-list li:nth-child(even)' ).addClass( 'even' );
	$( 'body.forums table.forum tr:nth-child(odd)' ).addClass( 'odd' );
	$('[placeholder]').each(function(i, el) {
		if( 'text' == $( el ).attr( 'type' ) || ! inputPlaceholder ) $(el).placeHolder();
	});
	$( '#item-body form input[type="submit"], #item-body form button' ).addClass( 'btn-gray' );
	$( '.action .generic-button a, .dir-form h2 a, .generic-button a' ).addClass( 'btn-gray' );
	$( '#item-body .item-list li:even' ).addClass( 'odd' );
	$( '#item-actions .btn-gray.remove' ).removeClass( 'btn-gray' );



	// Drop Down Menu
	$("#nav ul.menu").superfish({
		delay:			200,
		animation:		{
			opacity:	'show',
			height:		'show'
		},
		speed:			'fast',
		autoArrows:		false
	});


	// Frame pages
	$( '.quick-register' ).colorbox( {
		iframe: 	true,
		width: 		680,
		height: 	580
	} );
	$( '.quick-create-blog' ).colorbox( {
		iframe: 	true,
		width: 		680,
		height: 	590
	} );
	$( '.groups .subtitle a.btn-gray, .quick-create-group' ).colorbox( {
		iframe: 	true,
		width: 		660,
		height: 	580
	} );


	// Tabs
	$('.tabs').each(function(i, tabs) {
		tabs = $(tabs);
		tabs.find('a').click(function() {
			panes = $(this).parent().parent().next().next();
			$(this).addClass('btn-small').parent().siblings().find('a').removeClass('btn-small').find('span').css('background', 'none');
			panes.find('.pane').hide().eq($(this).parent().index()).fadeIn();
			return false;
		}).eq(0).trigger('click');
		
	});


	// BuddyPress Members & Groups sorting
	$( '#members-order-select' ).rdy( function() {
		var current = $( this ).hide().find( 'select' ).val();
		$( '.sort-' + current ).addClass( 'active' );
		$( '.loader' ).hide();

		$( '.members-sort-link' ).click( function() {
			$( '.loader' ).show();
			$( '.members-sort-link' ).removeClass( 'active' );
			$( this ).addClass( 'active' );
			current = $( this ).attr( 'href' ).replace( '#', '' );

			var search_terms = jq("#members_search").val();

			bp_filter_request( 'members', current, 'order', 'div.members', search_terms, 1, jq.cookie('bp-members-extras') );

			return false;
		} );
	} );

	$( '#groups-order-select' ).rdy( function() {
		var current = $( this ).hide().find( 'select' ).val();
		$( '.sort-' + current ).addClass( 'active' );
		$( '.loader' ).hide();

		$( '.groups-sort-link' ).click( function() {
			$( '.loader' ).show();
			$( '.groups-sort-link' ).removeClass( 'active' );
			$( this ).addClass( 'active' );
			current = $( this ).attr( 'href' ).replace( '#', '' );

			var search_terms = jq("#groups_search").val();

			bp_filter_request( 'groups', current, 'order', 'div.groups', search_terms, 1, jq.cookie('bp-groups-extras') );

			return false;
		} );
	} );

	$( '#blogs-order-select' ).rdy( function() {
		var current = $( this ).hide().find( 'select' ).val();
		$( '.sort-' + current ).addClass( 'active' );
		$( '.loader' ).hide();

		$( '.blogs-sort-link' ).click( function() {
			$( '.loader' ).show();
			$( '.blogs-sort-link' ).removeClass( 'active' );
			$( this ).addClass( 'active' );
			current = $( this ).attr( 'href' ).replace( '#', '' );

			var search_terms = jq("#blogs_search").val();

			bp_filter_request( 'blogs', current, 'order', 'div.blogs', search_terms, 1, jq.cookie('bp-blogs-extras') );

			return false;
		} );
	} );


	// BuddyPress Members/Groups Widget
	$( 'body' ).ajaxComplete( function( e, xhr, options ) {
		if( options.data.indexOf( 'action=widget_members' ) != -1 || options.data.indexOf( 'action=widget_groups' ) != -1 ) {
			setTimeout( function() {
				$( '.widget_bp_core_members_widget li:nth-child(6n)' ).addClass( 'last' );
			}, 300 );
		}
	} );
	
	

} );

jQuery.fn.rdy = function( func ) {
  this.length && func.apply( this );
  return this;
};

jQuery.fn.placeHolder = function( default_value ) {
	var el = jQuery(this);
	default_value = default_value || el.attr( 'placeholder' );
	
	if( default_value && default_value.length ) {
		el.focus(function() {
			if(el.val() == el.data('default_value')) el.val('').removeClass('empty');
		});

		el.blur(function() {
			if(!el.val().length) el.val(el.data('default_value')).addClass('empty');
		});

		el.closest('form').submit(function() {
			if(el.val() == el.data('default_value')) el.val('');
		});

		el.data('default_value', default_value).attr('title', default_value).trigger('blur');
	}
	
	return this;
};





/*----------------------------
---- Ajouts Tela-Botanica ----
----------------------------*/


/*-- Détection du navigateur --*/
function idNavigateur(){
    c=navigator.userAgent.search("Chrome");
    f=navigator.userAgent.search("Firefox");
    m8=navigator.userAgent.search("MSIE 8.0");
    m9=navigator.userAgent.search("MSIE 9.0");
    if (c > -1){ nav = "Chrome"; }
    else if(f > -1){ nav = "Firefox"; }
    else if (m9 > -1){ nav = "MSIE 9.0"; }
    else if (m8 > -1){ nav ="MSIE 8.0"; }
    return nav;
}


/*-- Options --*/
$('.tuile-options').on('mouseover', function() {
	$('.titre-options', this).css('opacity','1');
});
$('.tuile-options').on('mouseleave', function() {
	$('.titre-options', this).css('opacity','0.8');
});


/*-- Panneau latéral --*/
$('#masquer-panneau-lateral').on('click', function() {
	if (idNavigateur() != 'Firefox') {
		$('#panneau-lateral').animate({ width: 'toggle' }, 200);
		$('#groups-list').animate({ marginLeft: '-20px' }, 200);
		$('#afficher-panneau-lateral').animate({ width: 'toggle' }, 200);
		$('#masquer-panneau-lateral').animate({ width: 'toggle' }, 0);
	}
	else {
		$('#panneau-lateral').hide();
		$('#groups-list').css('margin-left','-20px');
		$('#afficher-panneau-lateral').show()
		$('#masquer-panneau-lateral').hide();	
	}
});
$('#afficher-panneau-lateral').on('click', function() {
	if (idNavigateur() != 'Firefox') {
		$('#panneau-lateral').animate({ width: 'toggle' }, 200);
		$('#groups-list').animate({ marginLeft: '20px' }, 200);
		$('#afficher-panneau-lateral').animate({ width: 'toggle' }, 200);
		$('#masquer-panneau-lateral').animate({ width: 'toggle' }, 0);
	}
	else {
		$('#panneau-lateral').show();
		$('#groups-list').css('margin-left','20px');
		$('#afficher-panneau-lateral').hide()
		$('#masquer-panneau-lateral').show();	
	}
});


/*-- Tuiles --*/
$('.generic-button .btn-gray').hide();

$('.tb-encart-projet').on('mouseenter', function() {
	if (idNavigateur() != 'Firefox') {
		$(this).animate({
			opacity: 1
		},
		200);
	}
});

$('.tb-encart-projet').on('mouseleave', function() {
	if (idNavigateur() != 'Firefox') {
		$(this).animate({
			opacity: 0.95
		},
		100);
	}
});



/*-- Animation tuile projet (Mouse Enter)--*/
$('.dir-list .item-list .tuile-projet').on('mouseenter', function() {
  	$('.resume-projet', this).toggle();
  	$('.activite-projet', this).toggle();
  	$('.membres-projet', this).toggle();
  	$('.confidentialite-projet', this).toggle();
  	$('.gtags-item-tags a', this).toggle();	
  	/*if (idNavigateur() != 'Firefox') {
		$('.avatar-projet img', this).animate({
			borderRadius: '100%',
			height: '140px',
			width: '140px',
			margin: '30px',
			opacity: 1
		},
		200);
			$(this).animate({
			opacity: 1
		}, 
		200);
	}*/
});
/*-- Animation tuile projet (Mouse Leave)--*/
$('.dir-list .item-list .tuile-projet').on('mouseleave', function() {
  	$('.resume-projet', this).toggle();
  	$('.activite-projet', this).toggle();
  	$('.membres-projet', this).toggle();
  	$('.confidentialite-projet', this).toggle();
  	$('.gtags-item-tags a', this).toggle();
  	$('.avatar-projet img', this)
  	/*if (idNavigateur() != 'Firefox') {
		$('.avatar-projet img', this).animate({
			borderRadius: 0,
			height: '100%',
			width: '100%',
			margin: 0,
			opacity: 0.8
		},
		100);
		$(this).animate({
			opacity: 0.8
		}, 
		100);
	}*/
});


$('.on-off').on('change', function() {
	var val = ($(this).val()=="1" ? 'actif' : 'inactif');
	$(this).after('<span class="val-temp"> ' + val + '</span>');
	$('.val-temp').fadeOut(2000);
});

