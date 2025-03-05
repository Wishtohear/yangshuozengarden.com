( function( api ) {

	// Extends our custom "resort-hotel-inn" section.
	api.sectionConstructor['resort-hotel-inn'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );