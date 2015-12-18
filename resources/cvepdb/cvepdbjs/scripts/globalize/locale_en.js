(function ($) {
	cvepdb.debug('locale_en.js > success : Start');

	cvepdb.globalize.loadDictionary({
		CLOSE            : "Close",
		CONFIRMATION     : "Confirmation",
		NAVIGATION       : "Navigation",
		FIELD_REQUIRED   : "This field is required",
		FIELD_VALID_EMAIL: "This field have to be a valid email",
		FIELD_MINLENGTH  : "This field must be at least %text% characters long",
		FIELD_MAXLENGTH  : "This field must be at maximum %text% characters long",
		FIELD_CONFIRM    : 'Please enter the same "%text%" as above'
	}, "en");

	cvepdb.debug('locale_en.js > success : End');
})(jQuery);
