( function( api ) {

	// Extends our custom "hotel-inn-upgrade" section.
	api.sectionConstructor['hotel-inn-upgrade'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
