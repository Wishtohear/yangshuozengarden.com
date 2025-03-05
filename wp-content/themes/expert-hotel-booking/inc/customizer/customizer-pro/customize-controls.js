( function( api ) {

	// Extends our custom "expert-hotel-booking" section.
	api.sectionConstructor['expert-hotel-booking'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );